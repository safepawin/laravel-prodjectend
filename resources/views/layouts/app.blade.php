<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/js/all.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .font-24{
                font-size: 20px;
                transition: all 0.3s;
                border-bottom: 3px solid #f8fafc;
            }
            .font-24:hover{
                border-bottom: 3px solid red
            }
            .icon{
                font-size: 50px;
            }
            .iconBig{
                font-size: 100px;
                transition: all 0.3s;
            }
            input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
                -webkit-appearance: none;
                 margin: 0;
            }
            @media screen and (max-width:600px){
                .iconBig{
                font-size: 50px;
                transition: all 0.3s;
                }
                .text-small{
                    font-size: 14px;
                }
            }
            .rigisterButtom:hover{
                background-color: grey;
            }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm border-bottom">
            <div class="container">
                {{-- <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a> --}}
                <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            {{-- <li class="nav-item">
                                <a class="nav-link" style="font-size: 16px" href=""></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" style="font-size: 16px" href=""></a>
                            </li> --}}
                            <li class="nav-item text-right">
                                <a class="nav-link" style="font-size: 16px" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item text-right">
                                    <a class="nav-link" style="font-size: 16px" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-right" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="/cart"><i class="fas fa-shopping-cart"></i><span class="badge badge-danger">{{0}}</span></a></li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
            <a class="navbar-brand" href="#"><img class="img-thumbnail" src="https://via.placeholder.com/110x110" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item text-center ml-5">
                            <a class="nav-link font-24" href="/"><i class="fas fa-carrot text-danger icon"></i><p class="text-dark">รายการสินค้า</p></a>
                        </li>
                        <li class="nav-item text-center ml-5">
                            <a class="nav-link font-24" href="/store"><i class="fas fa-store text-danger icon"></i><p class="text-dark">ร้านค้า</p></a>
                        </li>
                        <li class="nav-item text-center ml-5">
                            <a class="nav-link font-24" href="#"><i class="fas fa-id-badge text-danger icon"></i><p class="text-dark">ร่วมธุรกิจกับเรา</p></a>
                        </li>
                        <li class="nav-item text-center ml-5">
                            <a class="nav-link font-24" href="#"><i class="fas fa-bug text-danger icon"></i><p class="text-dark">แจ้งปัญหา</p></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="py-4">
            @yield('content')
        </div>
        <div class="container-fluid ">
            <div class="row bg-dark">
                <div class="col-md-8 ">
                    <div class=" row">
                        <img class="col-md-4 col-sm-12 p-0" src="https://via.placeholder.com/300x200" alt="รูปภาพชุมชน">
                        <div class="col-sm-12 col-md-8 my-auto py-3">
                            <h4 class="text-center">สมัครสมาชิกฟรี</h4>
                            <p class="text-center ">ค้นหาข้อมูลของสินค้าอื่นได้ง่ายๆ แค่ 3 Click</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center my-lg-auto mb-5">
                    <a class="btn btn-danger px-md-5 px-sm-3 py-2 my-auto rigisterButtom" href="">สมัครสมาชิกที่นี่</a>
                </div>
            </div>
            <div class="row bg-danger border-bottom border-dark">
                <div class="col-lg-12 my-3">
                    <h4 class="text-center">ร้านค้าชุมชน</h4>
                    <p class="text-center ">แหล่งกระจายแหละจำหน่ายสินค้าจากชุมชน</p>
                </div>
            </div>
            <div class="row bg-danger">
                <div class="col-3 text-center my-5">
                    <a class="text-center text-decoration-none text-dark" href=""><i class="fas fa-user-shield iconBig"></i><h4 class="py-2 text-white text-small">ความปลอดภัย</h4></a>
                </div>
                <div class="col-3 text-center my-5">
                    <a class="text-center text-decoration-none text-dark" href=""><i class="fas fa-comments-dollar iconBig"></i><h4 class="py-2 text-white text-small">การติดต่อกับผู้ขายโดยตรง</h4></a>
                </div>
                <div class="col-3 text-center my-5">
                    <a class="text-center text-decoration-none text-dark" href=""><i class="fas fa-shipping-fast iconBig"></i><h4 class="py-2 text-white text-small">ตรวจสอบการส่งสินค้าได้ด้วยตนเอง</h4></a>
                </div>
                <div class="col-3 text-center my-5">
                    <a class="text-center text-decoration-none text-dark " href=""><i class="fas fa-user-clock iconBig"></i><h4 class="py-2 text-white text-small">สามารถขายสินค้าได้ตลอด 24 ชั่วโมง</h4></a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
