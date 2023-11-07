@extends('client.layout.master')
@section('content')
<div class="container">
                    <!-- HEADER MENU -->

                    <!-- END / HEADER MENU -->

                    <!-- MENU BAR -->
                    <span class="menu-bars">
                        <span></span>
                    </span>
                    <!-- END / MENU BAR -->


            <!-- END / HEADER LOGO & MENU -->


        <!-- END / HEADER -->

        <!-- SUB BANNER -->
        <section class="section-sub-banner awe-parallax bg-16">

            <div class="awe-overlay"></div>

            <div class="sub-banner">
                <div class="container">
                    <div class="text text-center">
                        <h2>RESERVATION</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing</p>
                    </div>
                </div>

            </div>

        </section>
        <!-- END / SUB BANNER -->

        <!-- RESERVATION -->
        <section class="section-reservation-page bg-white">

            <div class="container">
                <div class="reservation-page">

                    <!-- STEP -->

                    <!-- END / STEP -->

                    <div class="row">
                        <div class="col-md-2 col-lg-2 ">
                            </div>

                        <!-- SIDEBAR -->
                        <div class=" col-md-8 col-lg-8">


                                <div class="reservation-sidebar">

                                    <!-- RESERVATION DATE -->
                                    <div class="reservation-date bg-gray">

                                        <!-- HEADING -->
                                        <h2 class="reservation-heading">Dates</h2>
                                        <!-- END / HEADING -->

                                        <ul>
                                            <li>
                                                <span>Check-In</span>
                                                <span>{{Helper::dateFormat($data['checkin'])}}</span>
                                            </li>
                                            <li>
                                                <span>Check-Out</span>
                                                <span>{{Helper::dateFormat($data['checkout'])}}</span>
                                            </li>
                                            <li>
                                                <span>Total Day</span>
                                                <span>{{$data['total_day']}}</span>
                                            </li>
                                            <li>
                                                <span>Total Guests</span>
                                                <span>{{$data['person']}}</span>
                                            </li>
                                        </ul>

                                    </div>
                                    <!-- END / RESERVATION DATE -->

                                    <!-- ROOM SELECT -->
                                    <div class="reservation-room-selected bg-gray">

                                        <!-- HEADING -->
                                        <h2 class="reservation-heading">Select Homestay</h2>
                                        <!-- END / HEADING -->

                                        <!-- ITEM -->
                                        <div class="reservation-room-seleted_item">

                                            <h6>{{$room->number}}</h6> <span class="reservation-option">{{$room->capacity}} people</span>

                                            <div class="reservation-room-seleted_name has-package">
                                                <h2><a href="#">{{$room->type->name}}</a></h2>
                                            </div>

                                            <div class="reservation-room-seleted_package">
                                                <h6>Space Price</h6>
                                                <ul>
                                                    <li>
                                                        <span>Price/Day</span>
                                                        <span>{{ Helper::convertToRupiah($room->price) }}"</span>
                                                    </li>

                                                </ul>
                                            </div>
                                            <div class="reservation-room-seleted_total-room">
                                                TOTAL DAY
                                                <span class="reservation-amout">{{ $data['total_day'] }} {{ Helper::plural('Day', $data['total_day']) }}</span>
                                            </div>


                                            <div class="reservation-room-seleted_total-room">
                                                TOTAL {{$room->name}}
                                                <span class="reservation-amout">{{ Helper::convertToRupiah(Helper::getTotalPayment($data['total_day'], $room->price)) }}</span>
                                            </div>
                                        </div>
                                        <!-- END / ITEM -->

                                        <!-- ITEM -->
                                        <!-- END / ITEM -->

                                        <!-- TOTAL -->
                                        <div class="reservation-room-seleted_total bg-blue">
                                            <label>TOTAL</label>
                                            <span class="reservation-total">{{ Helper::convertToRupiah(Helper::getTotalPayment($data['total_day'], $room->price)) }}</span>
                                        </div>
                                        <!-- END / TOTAL -->

                                    </div>
                                    <!-- END / ROOM SELECT -->

                                </div>

                            <form action="{{ route('check-coupon') }}" method="post">
                                @csrf
                                <div class="reservation-room-seleted_total-room">
                                    MÃ giảm giá
                                    <span class="reservation-amout"><input style="margin-bottom: 50px"
                                                                           type="text"
                                                                           name="coupon"></span>
                                </div>

                                <div style="margin-top: 50px">
                                    <button type="submit" name="check_coupon" class="awe-btn awe-btn-13 ">Thêm mã giảm giá
                                    </button>
                                </div>
                            </form>
                            <form method="POST"
                                  action="{{route('transaction.reservation.payOnlinePayment', ['customer' => $customer->id, 'room' => $room->id])}}">
                                @csrf
                                <div>
                                    <input type="hidden" value="{{$data['checkin']}}" name="check_in" >
                                    <input type="hidden" value="{{$data['checkout']}}" name="check_out" >
                                    <input type="hidden" value="{{$data['total_day']}}" name="total_day">
                                    <input type="hidden" value="1" name="cus">
                                </div>
                                <button style="margin-top: 50px" type="submit" class="awe-btn awe-btn-13">THANH TOÁN VNPAY</button>
                            </form>
                            @if(session('coupon'))
                                {{ dd(session('coupon') -> coupon_code )}}
                            @endif

                        </div>
                        <!-- END / SIDEBAR -->

                        <!-- CONTENT -->
                        <div class="col-md-2 col-lg-2 ">
                        </div>

                        <!-- END / CONTENT -->

                    </div>
                </div>
            </div>

        </section>
        <!-- END / RESERVATION -->

        <!-- FOOTER -->
         </div>
@endsection
