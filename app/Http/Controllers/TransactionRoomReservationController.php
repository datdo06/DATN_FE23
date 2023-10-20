<?php

namespace App\Http\Controllers;

use App\Events\NewReservationEvent;
use App\Events\RefreshDashboardEvent;
use App\Helpers\Helper;
use App\Http\Requests\ChooseRoomRequest;
use App\Http\Requests\StoreCustomerRequest;
use App\Models\Customer;
use App\Models\Payment;
use App\Models\Room;
use App\Models\Transaction;
use App\Models\Type;
use App\Models\User;
use App\Notifications\NewRoomReservationDownPayment;
use App\Repositories\Interface\CustomerRepositoryInterface;
use App\Repositories\Interface\ReservationRepositoryInterface;
use App\Repositories\Interface\PaymentRepositoryInterface;
use App\Repositories\Interface\TransactionRepositoryInterface;
use Illuminate\Http\Request;

class TransactionRoomReservationController extends Controller
{
    private $reservationRepository;

    public function __construct(ReservationRepositoryInterface $reservationRepository)
    {
        $this->reservationRepository = $reservationRepository;
    }

    public function pickFromCustomer(Request $request, CustomerRepositoryInterface $customerRepository)
    {
        $customers = $customerRepository->get($request);
        $customersCount = $customerRepository->count($request);
        return view('transaction.reservation.pickFromCustomer', compact('customers', 'customersCount'));
    }

    public function createIdentity()
    {
        return view('transaction.reservation.createIdentity');
    }

    public function storeCustomer(StoreCustomerRequest $request, CustomerRepositoryInterface $customerRepository)
    {
        $customer = $customerRepository->store($request);
        return redirect()
            ->route('transaction.reservation.viewCountPerson', ['customer' => $customer->id])
            ->with('success', 'Customer ' . $customer->name . ' created!');
    }

    public function viewCountPerson(Customer $customer)
    {
        $room_type = Type::query()->get();
        return view('transaction.reservation.viewCountPerson', compact('customer', 'room_type'));
    }

    public function chooseRoom(ChooseRoomRequest $request, Customer $customer)
    {
        $stayFrom = $request->check_in;
        $stayUntil = $request->check_out;
        $type = Type::query()->get();

        $occupiedRoomId = $this->getOccupiedRoomID($request->check_in, $request->check_out);

        $rooms = $this->reservationRepository->getUnocuppiedroom($request, $occupiedRoomId);
        $roomsCount = $this->reservationRepository->countUnocuppiedroom($request, $occupiedRoomId);

        return view('transaction.reservation.chooseRoom', compact(
            'customer',
            'rooms',
            'stayFrom',
            'stayUntil',
            'roomsCount',
            'type',
        ));
    }

    public function confirmation(Customer $customer, Room $room, $stayFrom, $stayUntil)
    {
        $price = $room->price;
        $dayDifference = Helper::getDateDifference($stayFrom, $stayUntil);
        $downPayment = ($price * $dayDifference) * 0.15;
        return view('transaction.reservation.confirmation', compact(
            'customer',
            'room',
            'stayFrom',
            'stayUntil',
            'downPayment',
            'dayDifference'
        ));
    }

    public function payOnlinePayment(
        Customer $customer,
        Room     $room,
        Request  $request,
    )
    {
        $dayDifference = Helper::getDateDifference($request->check_in, $request->check_out);
        $minimumDownPayment = ($room->price * $dayDifference) * 0.15;

        $request->validate([
            'downPayment' => 'required|numeric|gte:' . $minimumDownPayment
        ]);
        $occupiedRoomId = $this->getOccupiedRoomID($request->check_in, $request->check_out);
        $occupiedRoomIdInArray = $occupiedRoomId->toArray();

        if (in_array($room->id, $occupiedRoomIdInArray)) {
            return redirect()->back()->with('failed', 'Sorry, room ' . $room->number . ' already occupied');
        }
        session(['customer' => $customer]);
        session(['room' => $room]);
        session(['request' => $request->all()]);
        $this->pay();
    }

    public function pay()
    {
        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        if (session()->has('request')) {
            $data = session()->get('request');
            $request = session()->get('request');
            $customer = session()->get('customer');
            $room = session()->get('room');
            session(['customer' => $customer]);
            session(['room' => $room]);
            session(['request' => $request]);
        }




        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";

        $vnp_TmnCode = "LLWJITYZ";//Mã website tại VNPAY
        $vnp_HashSecret = "EZNGMRKORWXAHBPAJWRNZIMHXIVQQOAF"; //Chuỗi bí mật

        $vnp_TxnRef = rand(1, 10000); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY


        $vnp_Locale = "vn";

        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
//Add Params of 2.0.1 Version


        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $data['downPayment'] * 100,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => "Thanh toan GD:" . $vnp_TxnRef,
            "vnp_OrderType" => "other",
            "vnp_ReturnUrl" => route('transaction.reservation.vnpay'),
            "vnp_TxnRef" => $vnp_TxnRef,

        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }


        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;

        }
        $returnData = array('code' => '00'
        , 'message' => 'success'
        , 'data' => $vnp_Url);

        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();

        } else {
            echo json_encode($returnData);

        }
        // vui lòng tham khảo thêm tại code demo
    }

    public function vnpay()
    {

        if (session()->has('request')&&session()->has('customer')&&session()->has('room')&&$_GET['vnp_ResponseCode']=="00") {
            $request = session()->get('request');
            $customer = session()->get('customer');
            $room = session()->get('room');
            $transaction = Transaction::create([
                'user_id' => auth()->user()->id,
                'customer_id' => $customer->id,
                'room_id' => $room->id,
                'check_in' => $request['check_in'],
                'check_out' => $request['check_out'],
                'status' => 'Reservation'
            ]);
            $status = 'Down Payment';
            $payment = Payment::create([
                'user_id' => Auth()->user()->id,
                'transaction_id' => $transaction->id,
                'price' => !empty($request['downPayment']) ? $request['downPayment'] : 0,
                'status' => $status
            ]);

            $superAdmins = User::where('role', 'Super')->get();

            foreach ($superAdmins as $superAdmin) {
                $message = 'Reservation added by ' . $customer->name;
                event(new NewReservationEvent($message, $superAdmin));
                $superAdmin->notify(new NewRoomReservationDownPayment($transaction, $payment));
            }

            event(new RefreshDashboardEvent("Someone reserved a room"));

            return redirect()->route('transaction.index')
                ->with('success', 'Room ' . $room->number . ' has been reservated by ' . $customer->name);
        }
        else{
            return 'Giao dịch không thành công';
        }



    }

    public function payDownPayment(
        Customer                       $customer,
        Room                           $room,
        Request                        $request,
        TransactionRepositoryInterface $transactionRepository,
        PaymentRepositoryInterface     $paymentRepository
    )
    {
        $dayDifference = Helper::getDateDifference($request->check_in, $request->check_out);
        $minimumDownPayment = ($room->price * $dayDifference) * 0.15;

        $request->validate([
            'downPayment' => 'required|numeric|gte:' . $minimumDownPayment
        ]);

        $occupiedRoomId = $this->getOccupiedRoomID($request->check_in, $request->check_out);
        $occupiedRoomIdInArray = $occupiedRoomId->toArray();

        if (in_array($room->id, $occupiedRoomIdInArray)) {
            return redirect()->back()->with('failed', 'Sorry, room ' . $room->number . ' already occupied');
        }

        $transaction = $transactionRepository->store($request, $customer, $room);
        $status = 'Down Payment';
        $payment = $paymentRepository->store($request, $transaction, $status);

        $superAdmins = User::where('role', 'Super')->get();

        foreach ($superAdmins as $superAdmin) {
            $message = 'Reservation added by ' . $customer->name;
            event(new NewReservationEvent($message, $superAdmin));
            $superAdmin->notify(new NewRoomReservationDownPayment($transaction, $payment));
        }

        event(new RefreshDashboardEvent("Someone reserved a room"));

        return redirect()->route('transaction.index')
            ->with('success', 'Room ' . $room->number . ' has been reservated by ' . $customer->name);
    }

    private function getOccupiedRoomID($stayFrom, $stayUntil)
    {
        return Transaction::where([['check_in', '<=', $stayFrom], ['check_out', '>=', $stayUntil]])
            ->orWhere([['check_in', '>=', $stayFrom], ['check_in', '<=', $stayUntil]])
            ->orWhere([['check_out', '>=', $stayFrom], ['check_out', '<=', $stayUntil]])
            ->pluck('room_id');
    }
}
