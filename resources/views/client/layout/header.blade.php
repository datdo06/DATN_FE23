<header id="header" class="header-v2">

    <!-- HEADER TOP -->
    <div class="header_top">
        <div class="container">
            <div class="header_left float-left">
                <span><i class="lotus-icon-cloud"></i> 18 °C</span>
                <span><i class="lotus-icon-location"></i> 225 Beach Street, Australian</span>
                <span><i class="lotus-icon-phone"></i> 1-548-854-8898</span>
            </div>
            <div class="header_right float-right">

                @if(auth()->user())
                    <div class="dropdown currency">
                        <span>{{auth()->user()->name}}</span>
                        <ul>
                            <li>
                                <form action="{{route('logout')}}" method="POST">
                                    @csrf
                                    <a><button style="border: 1px solid #e1bd85; background-color: #e1bd85; " class="dropdown-item" type="submit">Logout</button></a>
                                </form>
                            </li>
                            <li><a href="#">EUR</a></li>
                        </ul>
                    </div>
                @else
                    <span class="login-register">
                            <a href="{{route('login')}}">Login</a>
                            <a href="{{route('register')}}">register</a>
                        </span>
                @endif

                <div class="dropdown currency">
                    <span>USD <i class="fa fa"></i></span>
                    <ul>
                        <li class="active"><a href="#">USD</a></li>
                        <li><a href="#">EUR</a></li>
                    </ul>
                </div>

                <div class="dropdown language">
                    <span>ENG</span>

                    <ul>
                        <li class="active"><a href="#">ENG</a></li>
                        <li><a href="#">FR</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <!-- END / HEADER TOP -->

    <!-- HEADER LOGO & MENU -->
    <div class="header_content" id="header_content">

        <div class="container">
            <!-- HEADER LOGO -->
            <div class="header_logo">
                <a href="#"><img style="width: 150px" src="img/logo/sip.png" alt=""></a>
            </div>
            <!-- END / HEADER LOGO -->

            <!-- HEADER MENU -->
            <nav class="header_menu">
                <ul class="menu">
                    <li class="current-menu-item">
                        <a href="{{ route('home') }}">Home <span class="fa fa-caret-down"></span></a>
                        <ul class="sub-menu">
                            <li><a href="index.html">Home 1</a></li>
                            <li class="current-menu-item"><a href="index-2.html">Home 2</a></li>
                            <li><a href="index-3.html">Home 3</a></li>
                            <li><a href="index-4.html">Home 4</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('about') }}">About</a></li>

                    <li>
                        <a href="#">Room <span class="fa fa-caret-down"></span></a>
                        <ul class="sub-menu">
                            <li><a href="room-1.html">Room 1</a></li>
                            <li><a href="room-2.html">Room 2</a></li>
                            <li><a href="room-3.html">Room 3</a></li>
                            <li><a href="room-4.html">Room 4</a></li>
                            <li><a href="room-5.html">Room 5</a></li>
                            <li><a href="room-6.html">Room 6</a></li>
                            <li><a href="room-detail.html">Room Detail</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Restaurant <span class="fa fa-caret-down"></span></a>
                        <ul class="sub-menu">
                            <li><a href="restaurants-1.html">Restaurant 1</a></li>
                            <li><a href="restaurants-2.html">Restaurant 2</a></li>
                            <li><a href="restaurants-3.html">Restaurant 3</a></li>
                            <li><a href="restaurants-4.html">Restaurant 4</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Reservation <span class="fa fa-caret-down"></span></a>
                        <ul class="sub-menu">
                            <li><a href="reservation-step-1.html">Reservation Step 1</a></li>
                            <li><a href="reservation-step-2.html">Reservation Step 2</a></li>
                            <li><a href="reservation-step-3.html">Reservation Step 3</a></li>
                            <li><a href="reservation-step-4.html">Reservation Step 4</a></li>
                            <li><a href="reservation-step-5.html">Reservation Step 5</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Page <span class="fa fa-caret-down"></span></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="#">Guest Book <span class="fa fa-caret-right"></span></a>
                                <ul class="sub-menu">
                                    <li><a href="guest-book.html">Guest Book 1</a></li>
                                    <li><a href="guest-book-2.html">Guest Book 2</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="#">Event <span class="fa fa-caret-right"></span></a>
                                <ul class="sub-menu">
                                    <li><a href="events.html">Events</a></li>
                                    <li><a href="events-fullwidth.html">Events Fullwidth</a></li>
                                    <li><a href="events-detail.html">Events Detail</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="attractions.html">Attractions</a>
                            </li>
                            <li>
                                <a href="#">Term Condition <span class="fa fa-caret-right"></span></a>
                                <ul class="sub-menu">
                                    <li><a href="term-condition.html">Term Condition 1</a></li>
                                    <li><a href="term-condition-2.html">Term Condition 2</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Activiti <span class="fa fa-caret-down"></span></a>
                                <ul class="sub-menu">
                                    <li><a href="activiti.html">Activiti</a></li>
                                    <li><a href="activiti-detail.html">Activiti Detail</a></li>
                                </ul>
                            </li>
                            <li><a href="check-out.html">Check Out</a></li>
                            <li><a href="shortcode.html">ShortCode</a></li>
                            <li><a href="page-404.html">404 Page</a></li>
                            <li><a href="comingsoon.html">Comming Soon</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Gallery <span class="fa fa-caret-down"></span></a>
                        <ul class="sub-menu">
                            <li><a href="gallery.html">Gallery Style 1</a></li>
                            <li><a href="gallery-2.html">Gallery Style 2</a></li>
                            <li><a href="gallery-3.html">Gallery Style 3</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Blog <span class="fa fa-caret-down"></span></a>
                        <ul class="sub-menu">
                            <li><a href="blog.html">Blog</a></li>
                            <li><a href="blog-detail.html">Blog Detail</a></li>
                            <li><a href="blog-detail-fullwidth.html">Blog Detail Fullwidth</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </nav>
            <!-- END / HEADER MENU -->

            <!-- MENU BAR -->
            <span class="menu-bars">
                        <span></span>
                    </span>
            <!-- END / MENU BAR -->

        </div>
    </div>
    <!-- END / HEADER LOGO & MENU -->

</header>
