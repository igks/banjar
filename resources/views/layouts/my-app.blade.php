<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

<body class="font-sans antialiased" style="font-family: Nunito;">
    <div class="md:w-4/12 md:m-auto">
        <div class="relative">
            <div id="menu"
                class="flex flex-row justify-between items-center bg-gradient-to-r from-purple-500 to-purple-400 px-2 text-white pt-3"
                onclick="showMenu()">
                <div class="flex flex-row">
                    <i data-feather="menu" id="open-menu" class=""></i>
                    <i data-feather="x-circle" id="close-menu" class="hidden"></i>
                    <p class="ml-2 font-bold">Menu</p>
                </div>
                <div class="text-center">
                    <p class="font-bold">
                        Laporan
                    </p>
                    <p class="font-bold">
                        Banjar Batu Aji Barat
                    </p>
                </div>
                {{-- <img src={{ url('images/omkara.jpg') }} alt="OmKara" width="40" class="rounded-xl" /> --}}
            </div>

            <div id="menu-list" class="p-3 rounded-t-3xl w-full absolute bg-yellow-50 z-50  hidden ">
                <ul>
                    <li class="border-b border-gray-300 px-4 mb-2 pb-2 ">
                        <a href="{{ url('/') }}">
                            <div class="flex flex-row justify-start">
                                <i data-feather="home"></i>
                                <p class="ml-4">Home</p>
                            </div>
                        </a>
                    </li>

                    <li class="border-b border-gray-300 px-4 mb-2 pb-2 ">
                        <a href="{{ route('members.index') }}">
                            <div class="flex flex-row justify-start">
                                <i data-feather="user"></i>
                                <p class="ml-4">Daftar Anggota</p>
                            </div>
                        </a>
                    </li>

                    <li class="border-b border-gray-300 px-4 mb-2 pb-2">
                        <a href="{{ route('laporan.index') }}">
                            <div class="flex flex-row justify-start">
                                <i data-feather="file"></i>
                                <p class="ml-4">Catatan Pembayaran</p>
                            </div>
                        </a>
                    </li>

                    <li class="border-b border-gray-300 px-4 mb-2 pb-2">
                        <a href="{{ route('transaksi.index') }}">
                            <div class="flex flex-row justify-start">
                                <i data-feather="dollar-sign"></i>
                                <p class="ml-4">Catatan Transaksi</p>
                            </div>
                        </a>
                    </li>

                    @if (!Auth::check())
                        <li class="border-b border-gray-300 px-4 mb-2 pb-2">
                            <a href="{{ url('/login') }}">
                                <div class="flex flex-row justify-start">
                                    <i data-feather="log-in"></i>
                                    <p class="ml-4">Login</p>
                                </div>
                            </a>
                        </li>
                    @else
                        <li class="border-b border-gray-300 px-4 mb-2 pb-2">
                            <form id="form-logout" method="POST" action="{{ route('logout') }}">
                                @csrf
                            </form>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); logout();">
                                <div class="flex flex-row justify-start">
                                    <i data-feather="log-out"></i>
                                    <p class="ml-4">Logout</p>
                                </div>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
        <div
            class="bg-gradient-to-r from-purple-500 to-purple-400 h-16 rounded-b-3xl flex flex-row justify-center items-center">
            <h2 class="text-white font-bold text-xl">
                @yield('title')
            </h2>
        </div>
        <div class="py-3 px-4 mb-16">
            @yield('content')
        </div>
        <div
            class="bg-gradient-to-r from-purple-500 to-purple-400 h-16 rounded-t-3xl flex flex-row justify-center items-center fixed w-full bottom-0 md:w-4/12 md:m-auto">
            <h2 class="text-white font-bold text-xl">&copy; Banjar Batu Aji Barat - 2021</h2>
        </div>
    </div>

    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script>
        feather.replace();

        function showMenu() {
            let menuList = document.getElementById('menu-list');
            let openMenuIcon = document.getElementById('open-menu');
            let closeMenuIcon = document.getElementById('close-menu');

            menuList.classList.toggle('hidden');
            openMenuIcon.classList.toggle('hidden');
            closeMenuIcon.classList.toggle('hidden');

        }

        function logout() {
            document.getElementById('form-logout').submit();
        }

    </script>
    @yield('script')
</body>

</html>
