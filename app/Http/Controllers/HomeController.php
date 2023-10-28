<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoomRequest;
use App\Models\Customer;
use App\Models\Image;
use App\Models\Room;
use App\Models\Transaction;
use App\Models\User;
use App\Repositories\Interface\RoomRepositoryInterface;
use Carbon\Carbon;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Requests\ChooseRoomRequest;
use App\Repositories\Interface\ReservationRepositoryInterface;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    private $reservationRepository;

    public function __construct(ReservationRepositoryInterface $reservationRepository)
    {
        $this->reservationRepository = $reservationRepository;
    }


    public function chooseRoomU(ChooseRoomRequest $request)
    {
        $stayFrom = $request->check_in;
        $stayUntil = $request->check_out;
        $type = Type::query()->get();
        $checkin = date_create($request->check_in);
        $checkout = date_create($request->check_out);
        $stayFrom = date_format($checkin,"Y-m-d");
        $stayUntil = date_format($checkout,"Y-m-d");
        $occupiedRoomId = $this->getOccupiedRoomID($stayFrom, $stayUntil);

        $rooms = $this->reservationRepository->getUnocuppiedroom($request, $occupiedRoomId);
        $roomsCount = $this->reservationRepository->countUnocuppiedroom($request, $occupiedRoomId);

        return view('chooseRoomU', compact(
            'rooms',
            'stayFrom',
            'stayUntil',
            'roomsCount',
            'type',
        ));
    }
    private function getOccupiedRoomID($stayFrom, $stayUntil)
    {
        return Transaction::where([['check_in', '<=', $stayFrom], ['check_out', '>=', $stayUntil]])
            ->orWhere([['check_in', '>=', $stayFrom], ['check_in', '<=', $stayUntil]])
            ->orWhere([['check_out', '>=', $stayFrom], ['check_out', '<=', $stayUntil]])
            ->pluck('room_id');
    }

    public function show(Room $room)
    {
        $room_type = Type::query()->get();
        $roomImage = Image::query()
            ->get();
    
        $transactions = Transaction::pluck('room_id')->toArray();

        $rooms = Room::whereNotIn('id', $transactions)->get();
        $users = Customer::query()
            ->join('users', 'customers.user_id', '=', 'users.id')
            ->where('role', '=', 'super')
            ->get();

        return view('home', compact('roomImage', 'rooms', 'users', 'room_type'));
    }

}
