<header id="header" class="header-v2">

    <!-- HEADER TOP -->
    <div class="header_top">
        <div class="container">
            <div class="header_left float-left">
                <span><i class="lotus-icon-cloud"></i> 24 °C</span>
                <span><i class="lotus-icon-location"></i> Việt Nam</span>
                <span><i class="lotus-icon-phone"></i> (+84) 989999999</span>
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
                    {{-- <li class="current-menu-item"> --}}
                        <li class=" ">
                        <a href="{{ route('home') }}">Trang Chủ </a>
                        
                    </li>

                    <li>
                        <a href="#">Homestay<span class="fa fa-caret-down"></span></a>
                        <ul class="sub-menu">
                            <li><a href="room-1.html">Homestay 1</a></li>
                            <li><a href="room-2.html">Homestay 2</a></li>
                            <li><a href="room-3.html">Homestay 3</a></li>
                            <li><a href="room-4.html">Homestay 4</a></li>
                            <li><a href="room-5.html">Homestay 5</a></li>
                            <li><a href="room-6.html">Homestay 6</a></li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="#">Đặt Homestay </a>
                    </li>
                    

                            <li>
                                <a href="{{ route('event') }}">Sự Kiện </a>
                                
                            </li>
                            
                            
                    <li>
                        <a href="{{ route('gallery') }}">Triển Lãm </a>
                        
                    </li>
                    
                    <li><a href="{{ route('about') }}">Thông Tin</a></li>
                    <li><a href="{{ route('contact') }}">Liên Hệ</a></li>

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
