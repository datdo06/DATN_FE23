@extends('client.layout.master')
@section('content')

<!-- BANNER SLIDER -->
<section class="section-slider">
    <h1 class="element-invisible">Slider</h1>
    <div id="slider-revolution">
        <ul>
            <li data-transition="fade">
                <img src="img/slider/img-5.jpg" data-bgposition="left center" data-duration="14000"
                    data-bgpositionend="right center" alt="">

                <div class="tp-caption sft fadeout slider-caption-sub slider-caption-1" data-x="center" data-y="100"
                    data-speed="700" data-start="1500" data-easing="easeOutBack">
                    <img src="img/slider/hom1-slide1.png" alt="icons">
                </div>

                <div class="tp-caption sft fadeout slider-caption-sub slider-caption-1" data-x="center" data-y="240"
                    data-speed="700" data-start="1500" data-easing="easeOutBack">
                    WELCOME TO
                </div>

                <div class="tp-caption sfb fadeout slider-caption slider-caption-sub-1" data-x="center" data-y="280"
                    data-speed="700" data-easing="easeOutBack" data-start="2000">KING THE LAND</div>

                <a href="#" class="tp-caption sfb fadeout awe-btn awe-btn-12 awe-btn-slider" data-x="center"
                    data-y="380" data-easing="easeOutBack" data-speed="700" data-start="2200">ĐẶT HOMESTAY NGAY</a>
            </li>

            <li data-transition="fade">
                <img src="img/slider/img-4.jpg" data-bgposition="left center" data-duration="14000"
                    data-bgpositionend="right center" alt="">

                <div class="tp-caption sft fadeout" data-x="center" data-y="195" data-speed="700" data-start="1300"
                    data-easing="easeOutBack">
                    <img src="img/icon-slider-1.png" alt="">
                </div>

                <div class="tp-caption sft fadeout slider-caption-sub slider-caption-sub-3" data-x="center" data-y="220"
                    data-speed="700" data-start="1500" data-easing="easeOutBack">
                    Ưu đãi lên đến 60%

                </div>

                <div class="tp-caption sfb fadeout slider-caption slider-caption-3" data-x="center" data-y="260"
                    data-speed="700" data-easing="easeOutBack" data-start="2000"> HÃY ĐẶT NGAY
                </div>

                <div class="tp-caption sfb fadeout slider-caption-sub slider-caption-sub-3" data-x="center" data-y="365"
                    data-easing="easeOutBack" data-speed="700" data-start="2200"> và còn rất nhiều ưu đãi khác</div>

                <div class="tp-caption sfb fadeout slider-caption-sub slider-caption-sub-3" data-x="center" data-y="395"
                    data-easing="easeOutBack" data-speed="700" data-start="2400"><img src="img/icon-slider-2.png"
                        alt=""></div>
            </li>

        </ul>
    </div>

</section>
<!-- END / BANNER SLIDER -->

<!-- CHECK AVAILABILITY -->
<section class="section-check-availability">
    <div class="container">
        <div class="check-availability">
            <div class="row v-align">
                <div class="col-lg-3">
                    <h2 class="title-room">HOMESTAY & GIÁ PHÒNG</h2>
                </div>

                <div class="col-lg-9">
                    <div class="availability-form">
                        <form action="chooseRoom" method="GET">
                            <input type="text" class="awe-calendar from  @error('check_in') is-invalid @enderror"
                                id="check_in" name="check_in" value="{{ old('check_in') }}" placeholder="Ngày đến"
                                required>

                            <input type="text" class="awe-calendar to @error('check_out') is-invalid @enderror"
                                id="check_out" name="check_out" value="{{ old('check_out') }}" placeholder="Ngày đi"
                                required>

                            <input type="text" class="awe-input @error('count_person') is-invalid @enderror"
                                id="count_person" name="count_person" value="{{ old('count_person') }}"
                                placeholder="Số người" required>

                            <select class="awe-select @error('type_id') is-invalid @enderror" name="type_id"
                                id="type_id" required>
                                @foreach ($room_type as $rt)
                                <option value="{{ $rt->id }}">{{ $rt->name }}</option>
                                @endforeach
                            </select>

                            <div class="vailability-submit">
                                <button class="awe-btn awe-btn-13" type="submit">Tìm Kiếm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END / CHECK AVAILABILITY -->

<!-- ACCOMMODATIONS -->
<section class="section-accommo_1 bg-white">
    <div class="container">

        <div class="accomd-modations_1">

            <h2 class="heading"> HOMESTAY</h2>

            <div class="accomd-modations-content_1">

                <div class="accomd-modations-slide_1">

                    {{-- @foreach($rooms as $rooms) --}}
                    <div class="accomd-modations-room_1">

                        <div class="img ">
                            <a href="#"><img class="" src="img/homestay/homestay-11.jpg" alt=""></a>
                        </div>

                        <div class="text">
                            <h2><a href="#">Căn 1 phòng ngủ</a></h2>
                            <p class="desc">
                                Căn hộ này có 1 phòng ngủ, bếp với tủ lạnh và bếp nấu, TV màn hình phẳng, khu vực ghế ngồi cũng như 2 phòng tắm được trang bị chậu rửa vệ sinh.
                                 Du khách có thể thưởng thức bữa ăn trên khu vực ăn uống ngoài trời trong khi ngắm nhìn quang cảnh thành phố. Để tăng thêm sự riêng tư, chỗ ở này có lối vào riêng.
                            </p>
                            <p class="desc">Tối đa : 2 người lớn và 1 trẻ em</p>

                            <h2><a href="#"><b>Các tiện nghi được ưa chuộng nhất </b></a></h2>
                            <p class="desc">
                                <i class="fa fa-long-arrow-up" aria-hidden="true"></i> <i class="fa fa-long-arrow-down" aria-hidden="true"></i>  Thang máy <br>
                                <i class="fa fa-smile-o" aria-hidden="true"></i>  Điều hòa không khí  <br>
                                <i class="fa fa-wifi" aria-hidden="true"></i>  WiFi miễn phí <br>
                                <i class="fa fa-sun-o" aria-hidden="true"></i>  Ban công <br>
                                <i class="fa fa-users" aria-hidden="true"></i>  Phòng gia đình <br>
                                <i class="fa fa-paw" aria-hidden="true"></i>  Cho phép mang theo vật nuôi <br>
                                <i class="fa fa-ban"></i>  Khu vực không cho phép hút thuốc</p>
                            <div class="wrap-price">
                                <p class="price">
                                    <span class="amout">700.000</span> / Ngày
                                </p>
                                <a href="{{ route('roomdetail') }}" class="awe-btn awe-btn-default">CHI TIẾT </a>
                            </div>
                        </div>

                    </div>
                    {{-- @endforeach --}}
                    <!-- END / ITEM -->

                    <!-- ITEM -->
                    <div class="accomd-modations-room_1">
                        <div class="img">
                            <a href="#"><img src="img/homestay/homestay-2.jpg" alt=""></a>
                        </div>
                        <div class="text">
                            <h2><a href="#">Căn 2 phòng ngủ</a></h2>
                            <p class="desc">Căn hộ này có 2 phòng ngủ, bếp với tủ lạnh và bếp nấu, TV màn hình phẳng, khu vực ghế ngồi cũng như 2 phòng tắm được trang bị chậu rửa vệ sinh.
                                Du khách có thể thưởng thức bữa ăn trên khu vực ăn uống ngoài trời trong khi ngắm nhìn quang cảnh thành phố. Để tăng thêm sự riêng tư, chỗ ở này có lối vào riêng.</p>
                            <p class="desc">Tối đa : 4 người lớn và 1 trẻ em</p>
                                <h2><a href="#"><b>Các tiện nghi được ưa chuộng nhất </b></a></h2>
                            <p class="desc">
                                <i class="fa fa-long-arrow-up" aria-hidden="true"></i> <i class="fa fa-long-arrow-down" aria-hidden="true"></i>  Thang máy <br>
                                <i class="fa fa-smile-o" aria-hidden="true"></i>  Điều hòa không khí  <br>
                                <i class="fa fa-wifi" aria-hidden="true"></i>  WiFi miễn phí <br>
                                <i class="fa fa-sun-o" aria-hidden="true"></i>  Ban công <br>
                                <i class="fa fa-users" aria-hidden="true"></i>  Phòng gia đình <br>
                                <i class="fa fa-paw" aria-hidden="true"></i>  Cho phép mang theo vật nuôi <br>
                                <i class="fa fa-ban"></i>  Khu vực không cho phép hút thuốc</p>
                            <div class="wrap-price">
                                <p class="price">
                                    <span class="amout">1.400.000</span> / Ngày
                                </p>
                                <a href="#" class="awe-btn awe-btn-default">CHI TIẾT</a>
                            </div>
                        </div>
                    </div>
                    <!-- END / ITEM -->

                    <!-- ITEM -->
                    <div class="accomd-modations-room_1">
                        <div class="img">
                            <a href="#"><img src="img/homestay/homestay-8.jpg" alt=""></a>
                        </div>
                        <div class="text">
                            <h2><a href="#">Căn 3 phòng ngủ</a></h2>
                            <p class="desc">Căn hộ này có 2 phòng ngủ, bếp với tủ lạnh và bếp nấu, TV màn hình phẳng, khu vực ghế ngồi cũng như 2 phòng tắm được trang bị chậu rửa vệ sinh.
                                Du khách có thể thưởng thức bữa ăn trên khu vực ăn uống ngoài trời trong khi ngắm nhìn quang cảnh thành phố. Để tăng thêm sự riêng tư, chỗ ở này có lối vào riêng.</p>
                            <p class="desc">Tối đa : 6 người lớn và 1 trẻ em</p>

                                <h2><a href="#"><b>Các tiện nghi được ưa chuộng nhất </b></a></h2>
                            <p class="desc">
                                <i class="fa fa-long-arrow-up" aria-hidden="true"></i> <i class="fa fa-long-arrow-down" aria-hidden="true"></i>  Thang máy <br>
                                <i class="fa fa-smile-o" aria-hidden="true"></i>  Điều hòa không khí  <br>
                                <i class="fa fa-wifi" aria-hidden="true"></i>  WiFi miễn phí <br>
                                <i class="fa fa-sun-o" aria-hidden="true"></i>  Ban công <br>
                                <i class="fa fa-users" aria-hidden="true"></i>  Phòng gia đình <br>
                                <i class="fa fa-paw" aria-hidden="true"></i>  Cho phép mang theo vật nuôi <br>
                                <i class="fa fa-ban"></i>  Khu vực không cho phép hút thuốc</p>
                            <div class="wrap-price">
                                <p class="price">
                                    <span class="amout">2.100.000</span> / Ngày
                                </p>
                                <a href="#" class="awe-btn awe-btn-default">VIEW DETAIL</a>
                            </div>
                        </div>
                    </div>
                    <!-- END / ITEM -->

                    <!-- ITEM -->
                    <div class="accomd-modations-room_1">
                        <div class="img">
                            <a href="#"><img src="img/homestay/homestay-20.jpg" alt=""></a>
                        </div>
                        <div class="text">
                            <h2><a href="#">Căn 4 phòng ngủ</a></h2>
                            <p class="desc">Căn hộ này có 2 phòng ngủ, bếp với tủ lạnh và bếp nấu, TV màn hình phẳng, khu vực ghế ngồi cũng như 2 phòng tắm được trang bị chậu rửa vệ sinh.
                                Du khách có thể thưởng thức bữa ăn trên khu vực ăn uống ngoài trời trong khi ngắm nhìn quang cảnh thành phố. Để tăng thêm sự riêng tư, chỗ ở này có lối vào riêng.</p>
                            <p class="desc">Tối đa : 8 người lớn và 1 trẻ em</p>

                                <h2><a href="#"><b>Các tiện nghi được ưa chuộng nhất </b></a></h2>
                            <p class="desc">
                                <i class="fa fa-long-arrow-up" aria-hidden="true"></i> <i class="fa fa-long-arrow-down" aria-hidden="true"></i>  Thang máy <br>
                                <i class="fa fa-smile-o" aria-hidden="true"></i>  Điều hòa không khí  <br>
                                <i class="fa fa-wifi" aria-hidden="true"></i>  WiFi miễn phí <br>
                                <i class="fa fa-sun-o" aria-hidden="true"></i>  Ban công <br>
                                <i class="fa fa-users" aria-hidden="true"></i>  Phòng gia đình <br>
                                <i class="fa fa-paw" aria-hidden="true"></i>  Cho phép mang theo vật nuôi <br>
                                <i class="fa fa-ban"></i>  Khu vực không cho phép hút thuốc</p>
                            <div class="wrap-price">
                                <p class="price">
                                    <span class="amout">2.800.000</span> / Ngày
                                </p>
                                <a href="#" class="awe-btn awe-btn-default">VIEW DETAIL</a>
                            </div>
                        </div>
                    </div>
                    <!-- END / ITEM -->

                </div>

            </div>
        </div>

    </div>
</section>

<!-- ACCOMMODATIONS -->

<!-- HEADING GUEST -->
<div class="container-fluid bg-white mt-4">
<div class="container bg-white"> <br><br>
    <p>
        <h2 class=" heading ">Đánh giá</h2>
    </p>
</div>
</div>
<!-- END HEADING GUEST -->

<!-- SECTION GUESTBOOK - EVENT DEAD -->
<section class="section-guestbook-event bg-white"> 

    <div class="container">
 
        <div class="guestbook-event">
            
            <div class="row">

                <div class="col-md-6">
                    
                    <div class="img hover-zoom text-center">
                        <img class="rounded" src="img/homestay/homestay-1.jpg" alt="" width="450" height="450">
                    </div>
                    <!-- START / ITEM -->
                    <div class="guestbook-content_1 owl-single">
                        @foreach($users as $user)
                        <div class="guestbook-item_1">
                            <div class="img">
                                <img src="{{ $user -> user -> getAvatar() }}" alt="">
                                <span><strong>{{ $user -> name }} </strong>{{ $user -> address }}, {{ $user -> job
                                    }}</span>
                            </div>

                            <div class="text">
                                <p> {{ $user -> description }}</p>
                            </div>
                        </div>
                        @endforeach
                        <p></p>
                    </div>
                </div>
                <!-- END / ITEM -->

                <!-- ITEM -->
                <div class="guestbook-item_1">
                    <div class="img">
                        <img src="img/avatar/img-6.jpg" alt="">
                        <span><strong>Hoang Nguyen</strong>Ha Noi, Viet Nam</span>
                    </div>

                    <div class="text">
                        <p>KingTheLand là khu căn hộ cao cấp. Phòng kiểu căn hộ khá rộng, đẹp về đêm.
                             Nội thất trong phòng ở mức tốt , có đầy đủ đồ bếp để nấu ăn nếu cần. Ngoài ra có cả bể bơi ngoài trời, siêu thị, rạp chiếu phim. Rất thuận tiện.
                              Ăn sáng khá đông nhiều món Hàn Quốc. Khu trung tâm thương mại ở các tầng dưới của tòa nhà cung cấp đủ thứ các bạn cần,
                               gần tòa nhà cũng có nhiều nhà hàng với đủ món nhậu đặc sản.Phù hợp đi du lịch cả gia đình.
                            Ngoài ra tôi rất cảm thấy rất hài lòng về thái độ của nhân viên. Nhân viên rất thân thiện nhiệt tình. Cảm thấy an toàn vì an ninh được đảm bảo.</p>
                    </div>
                </div>
                <!-- END / ITEM -->

            </div>

        </div>

            <div class="">
                <div class="">
                <h2 class="heading">hoạt động </h2> <br>
                </div>
            </div>

        <div class="col-md-6">
            
            <div class="event-slide owl-single">
                <!-- ITEM 1/1-->
                <div class="event-item">
                    <div class="img hover-zoom">
                        <a href="#">
                            <img style="width: 550px; height: 350px;"  class="" src="img/home/eventdeal/img-1.jpg" alt="">
                        </a>
                    </div>
                </div>
                <!-- END / ITEM 1/1 -->

                <!-- ITEM 1/2 -->
                <div class="event-item">
                    <div class="img hover-zoom ">
                        <a href="#">
                            <img style="width: 550px; height: 350px;" class="" src="img/home/eventdeal/img-2.jpg" alt="">
                        </a>
                    </div>
                </div>
                <!-- END / ITEM 1/2 -->

                <!-- ITEM 1/3 -->
                <div class="event-item">
                    <div class="img hover-zoom">
                        <a href="#">
                            <img style="width: 550px; height: 350px;" class="" src="img/home/eventdeal/img-3.jpg" alt="">
                        </a>
                    </div>
                </div>
                <!-- END / ITEM 1/3 -->


            </div>
        </div>

        <div class="col-md-6">
            
            <div class="event-slide owl-single">
                <!-- ITEM 2/1 -->
                <div class="event-item">
                    <div class="img hover-zoom">
                        <a href="#">
                            <img style="width: 550px; height: 350px;" src="img/home/eventdeal/img-4.jpg" alt="">
                        </a>
                    </div>
                </div>
                <!-- END / ITEM 2/1 -->

                <!-- ITEM 2/2 -->
                <div class="event-item">
                    <div class="img hover-zoom">
                        <a href="#">
                            <img style="width: 550px; height: 350px;" src="img/home/eventdeal/img-5.webp" alt="">
                        </a>
                    </div>
                </div>
                <!-- END / ITEM 2/2 -->

                <!-- ITEM 2/2 -->
                <div class="event-item">
                    <div class="img hover-zoom">
                        <a href="#">
                            <img style="width: 550px; height: 350px;" src="img/home/eventdeal/img-6.webp" alt="">
                        </a>
                    </div>
                </div>
                <!-- END / ITEM 2/2 -->


            </div>
        </div>

    </div>
    </div>

    </div>
</section>
<!-- END / SECTION GUESTBOOK - EVENT DEAD -->

<!-- ABOUT -->
<section class="section-home-about bg-white">
    <div class="container">
        <div class="home-about owl-single">
            <div class="row">
                <div class="col-md-6">
                    <div class="img">
                        <a href="{{ route('about') }}"><img style="width: 550px; height: 400px;" src="img/home/about/img-1.jpg" alt=""></a>
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="text">
                        <h2 class="heading">Thông tin</h2>
                        <span>( Cập nhật gần đây nhất 24/10/2023 )</span>
                        <h3>Khám phá những món ngon Hà Nội đặc trưng và hấp dẫn – Tuyệt chiêu lựa chọn địa điểm ẩm thực tuyệt vời tại Hà Nội.</h3>
                        <p>Hà Nội, thủ đô văn hóa của Việt Nam, đã trở thành một trong những điểm đến hấp dẫn với những du khách yêu thích ẩm thực. 
                            Với bề dày lịch sử lâu đời, Hà Nội có rất nhiều món ăn đặc trưng và hấp dẫn, mang đậm dấu ấn văn hóa của người dân địa phương. 
                            Hãy cùng tìm hiểu những món ngon Hà Nội nổi tiếng nhất và đừng bỏ lỡ cơ hội thưởng thức khi đến thăm thủ đô nha.</p>
                            <!-- https://bloghomestay.vn/kham-pha-nhung-mon-ngon-ha-noi-dac-trung-va-hap-dan-tuyet-chieu-lua-chon-dia-diem-am-thuc-tuyet-voi-tai-ha-noi/ -->
                        <a href="{{ route('about') }}" class="awe-btn awe-btn-default">READ MORE</a>
                    </div>
                </div>
            </div>

            <div class="home-about ">
                <div class="row">
                    <div class="col-md-6">
                        <div class="img">
                            <a href="{{ route('about') }}"><img style="width: 550px; height: 400px;" src="img/home/about/img-2.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="text">
                            <h2 class="heading">Thông tin</h2>
                            <span>( Cập nhật gần đây nhất 24/10/2023 )</span>
                            <h3>Những Lý Do Bạn Nên Lựa Chọn KingTheLand Để Nghỉ Dưỡng</h3>
                            <p>Cuộc sống tiêu chuẩn quốc tế đang chờ đón bạn tại KingTheLand.
                                 Khu nghỉ dưỡng hầu như đều có thể đáp ứng được các tiện ích nội khu .
                                Đến đây bạn có thể thưởng thức những món ăn thơm ngon mang đậm hương vị Việt Nam. 
                                Các món ăn phương Tây được lựa chọn kỹ lưỡng và chế biến bởi những đầu bếp hàng đầu.
                                 KingTheLand cũng cung cấp dịch vụ phòng và tiện nghi BBQ.</p>
                            <a href="{{ route('about') }}" class="awe-btn awe-btn-default">READ MORE</a>
                            <!-- https://bloghomestay.vn/coral-bay-resort-phu-quoc/ -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
</section>
<!-- END / ABOUT -->

<!-- OUR BEST -->
<section class="section-our-best bg-white">
    <div class="container">

        <div class="our-best">
            <div class="row">

                <div class="col-md-6 col-md-push-6">
                    <div class="img">
                        <img src="img/home/ourbest/img-1.jpg" alt="">
                    </div>
                </div>

                <div class="col-md-6 col-md-pull-6 ">
                    <div class="text">
                        <h2 class="heading">Our Best</h2>
                        <p>KingTheLand sẽ mang đến cho bạn quãng thời gian lưu trú thư giãn và dễ chịu nhất có thể. 
                            Đây cũng là lý do tại sao nhiều khách du lịch tiếp tục quay trở lại khách sạn sau nhiều năm..</p>
                        <ul>
                            <li><img src="img/home/ourbest/icon-3.png" alt="icon">Đủ tiêu chuẩn 4 sao tại Hà Nội</li>
                            <li><img src="img/home/ourbest/icon-2.png" alt="icon">Đầy đủ tiện nghi trong nhà</li>
                            <li><img src="img/home/ourbest/icon-4.png" alt="icon">Tổ chức các sự kiện quanh năm
                            </li>
                            <li><img src="img/home/ourbest/icon-5.png" alt="icon">Nội thất sang trọng, hiện đại
                            </li>
                            <li><img src="img/home/ourbest/icon-1.png" alt="icon">Phục vụ bữa sáng mỗi ngày</li>
                            <li><img src="img/home/ourbest/icon-6.png" alt="icon">View nhìn ra thành phố</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>
<!-- END / OUR BEST -->
@endsection