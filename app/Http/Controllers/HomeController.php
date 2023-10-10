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
use Illuminate\Http\Request;

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

    public function index()
    {
        return view('home');
    }

    public function show(Room $room)
    {
        $roomImage = Image::query()
            ->get();
        $rooms = Room::query()
//            ->join('images', 'rooms.id', '=', 'images.room_id')
//            ->select('rooms.*', 'images.url')
            ->get();
        $users = Customer::query()
            ->join('users', 'customers.user_id', '=', 'users.id')
            ->where('role', '=', 'super')
            ->get();

        return view('home', compact('roomImage', 'rooms', 'users'));
    }
}
