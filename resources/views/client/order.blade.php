@extends('client.layout.master')
@section('content')
    <style>
        /* styles.css */

        /* Thiết lập font và màu nền chung cho trang */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        /* Header của trang */
        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        header h1 {
            margin: 0;
        }

        /* Phần chính của trang */
        main {
            max-width: 960px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Phần Lịch sử Đặt Phòng */
        .booking-history {
            margin-bottom: 20px;
        }

        .booking-history h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        table th {
            background-color: #333;
            color: #fff;
        }

        table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tbody tr:hover {
            background-color: #e0e0e0;
        }

    </style>
    <section class="section-sub-banner bg-16">

        <div class="awe-overlay"></div>

        <div class="sub-banner">
            <div class="container">
                <div class="text text-center">
                    <h2>Lịch sử Đặt HomeStay</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing</p>
                </div>
            </div>

        </div>

    </section>
    <div class="container-fluid">
        <section class="booking-history">
            <h2>Lịch sử Đặt HomeStay</h2>
            <table class="table">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>HomeStay</th>
                    <th>Quận</th>
                    <th>Ngày đến</th>
                    <th>Ngày đi</th>
                    <th>Tổng tiền</th>
                    <th colspan="2">Thao tác</th>
                </tr>
                </thead>
                <tbody>

                @foreach($transactions as $transaction)
                    <tr>
                        <th>{{$transaction->id}}
                        </th>
                        <td>{{ $transaction->room->number }}</td>
                        <td>{{ $transaction->room->type->name}}</td>
                        <td>{{ Helper::dateFormat($transaction->check_in) }}</td>
                        <td>{{ Helper::dateFormat($transaction->check_out) }}</td>
                        <td>{{ Helper::convertToRupiah($transaction->sum_money) }}
                        </td>
                        <td><a style="font-weight: bold" class="btn btn-light btn-sm rounded shadow-sm border"
                               href="/payment/{{$transaction->id}}/invoice"
                               data-bs-toggle="tooltip" data-bs-placement="top"
                            >
                                Chi tiết
                            </a></td>
                        @php
                            date_default_timezone_set('Asia/Ho_Chi_Minh');
                        @endphp
                        @if(Helper::getDateDifference(now(),$transaction->check_in)>=1)
                            <td><form action="{{route('cancelHomestay', $transaction->id)}}" id="form" method="post">
                                    @csrf
                                    <button class="btn-danger" onclick="if(confirm('Bạn có muốn hủy')){
                                document.getElementById('#form').submit();
                            }">Hủy phòng</button>
                                </form></td>
                        @endif



                    </tr>
                @endforeach

                </tbody>
            </table>
        </section>
    </div>

@endsection
