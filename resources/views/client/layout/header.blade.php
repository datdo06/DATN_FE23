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
                                <form action="{{route('logout')}}" method="POST" id="logout">
                                    @csrf
                                    <a onclick="document.getElementById('logout').submit();">Logout</a>
                                </form>
                            </li>
                            <li><a href="{{route('order', ['user'=>auth()->user()->id])}}">Lịch sử</a></li>
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

                    </li>
                    <li><a href="{{ route('about') }}">About</a></li>

                    <li>
                        <a href="#">Room <span class="fa fa-caret-down"></span></a>

                    </li>
                    <li>
                        <a href="#">Restaurant <span class="fa fa-caret-down"></span></a>

                    </li>
                    <li>
                        <a href="#">Reservation <span class="fa fa-caret-down"></span></a>

                    </li>
                    <li>
                        <a href="#">Page <span class="fa fa-caret-down"></span></a>

                    </li>
                    <li>
                        <a href="#">Gallery <span class="fa fa-caret-down"></span></a>

                    </li>
                    <li>
                        <a href="#">Blog <span class="fa fa-caret-down"></span></a>

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
