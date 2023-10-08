<?php

namespace App\Http\Controllers;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Requests\ChooseRoomRequest;
use App\Repositories\Interface\ReservationRepositoryInterface;
use App\Models\Transaction;

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

    public function index()
    {
        $room_type = Type::query()->get();
        return view('home', compact( 'room_type'));
    }
    public function chooseRoomU(ChooseRoomRequest $request)
    {
        $stayFrom = $request->check_in;
        $stayUntil = $request->check_out;
        $type  = Type::query()->get();

        $occupiedRoomId = $this->getOccupiedRoomID($request->check_in, $request->check_out);

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
}
