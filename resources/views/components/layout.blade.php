<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0722d56e11.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://kit.fontawesome.com/0722d56e11.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&display=swap" rel="stylesheet">
    @vite('resources/css/layout.css')
    @vite('resources/js/app.js')
    <title>{{ $title ?? 'WeatherApp' }}</title>
</head>

<body>
    <div>
        <!-- Page Content -->
        <header class="header">
            <nav class="nav">
            </nav>
        </header>
        @if (session('success'))
        <div class="px-5 alert alert-success" role="alert">
            <b class="alert-success"> {{ session('success') }}</b>
        </div>
        @endif
        @if (session('warning'))
        <div class="px-5 alert alert-warning" role="alert">
            <b class="alert-warning"> {{ session('warning') }}</b>
        </div>
        @endif
        @if (session('error'))
        <div class="px-5 alert alert-danger" role="alert">
            <b class="alert-danger"> {{ session('error') }}</b>
        </div>
        @endif
        @if ($errors->any())
        <div class="px-5 alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li><b class="alert-danger">{{ $error }}</b></li>
                @endforeach
            </ul>
        </div>
        @endif
        @php
            $authUser = Auth::user();
        @endphp
        <main class="px-4 mt-3">
            <div class="title__wrapper">
                <div class="title__container">
                    <h2 class="title__main smooth">{{ $h2 ?? 'WeatherApp' }}</h2>
                    <div class="title__time">
                        <i class="text-left d-block smooth"> {{Carbon\Carbon::now()->isoFormat('M月DD日 H:mm') }}時点</i>
                        @if(!is_null($authUser) && !request()->routeIs('likes.index',['userId' => $authUser->id]) )
                            <a href="{{ route('likes.index', ['userId' => $authUser->id] )}}" class="text-left d-block">いいねした地域</a>
                        @else
                            <a href="{{ route('home.index') }}" class="text-left d-block">全国のいまの天気</a>
                        @endif
                    </div>
                </div>
                <!-- ./title__container -->
                <div class="auth__container">
                    @if(!is_null($authUser))
                        <div class="text-right">
                            <span class="d-block">
                                <a href="">{{ $authUser->name }}</a>
                                さん
                            </span>
                            <form class="form-inline my-2 my-lg-0 d-block" method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link class="logout" :href="route('logout')" onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                    {{ __('ログアウト') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    @else
                        <div class="text-right">
                            <span>
                                <a href="{{route('login')}}">ログイン</a>
                                するといいね登録ができます。
                                <br>
                                <!-- <a href="/">ゲストログイン</a>
                                もできます。 -->
                            </span>
                        </div>
                    @endif
                </div>
                <!-- ./auth__container -->
            </div>
            <!-- ./title__wrapper -->
            <hr class="my-0 mb-4" size="10" color="orange">
            <div class="mb-5">
                <form class="search-wrapper" action="{{ route('search') }}" method="get" id="search">
                    <input id="search-input" class="search__input mr-1 py-1" type="text" name="hurigana" placeholder="都道府県名を入力">
                    <ul id="suggestions-list" class="suggestions-list"></ul>
                    <button class="search__btn btn btn-primary" type="submit">検索</button>
                </form>
            </div>
            {{ $slot }}
        </main>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
</html>
