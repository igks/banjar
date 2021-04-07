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
    <div class="py-3 px-4 md:w-4/12 md:m-auto">
        <div class="mb-1">
            <div id="menu" class="flex flex-row justify-between items-center mb-2" onclick="showMenu()">
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
            </div>

            <div id="menu-list" class="p-3 rounded-md w-full hidden">
                <ul>
                    <li class="border-b px-4 mb-2 ">
                        <a href="{{ url('/') }}">
                            <div class="flex flex-row justify-between">
                                <p>Home</p>
                                <i data-feather="chevrons-right"></i></i>
                            </div>
                        </a>
                    </li>

                    <li class="border-b px-4 mb-2 ">
                        <a href="{{ route('members.index') }}">
                            <div class="flex flex-row justify-between">
                                <p>Daftar Anggota</p>
                                <i data-feather="chevrons-right"></i></i>
                            </div>
                        </a>
                    </li>

                    <li class="border-b px-4 mb-2 ">
                        <a href="{{ route('laporan.index') }}">
                            <div class="flex flex-row justify-between">
                                <p>Laporan Pembayaran</p>
                                <i data-feather="chevrons-right"></i></i>
                            </div>
                        </a>
                    </li>

                    <li class="border-b px-4 mb-2 ">
                        <a href="{{ route('kas.banjar') }}">
                            <div class="flex flex-row justify-between">
                                <p>Pembayaran Kas Banjar</p>
                                <i data-feather="chevrons-right"></i></i>
                            </div>
                        </a>
                    </li>

                    <li class="border-b px-4 mb-2 ">
                        <a href="{{ route('kas.bop') }}">
                            <div class="flex flex-row justify-between">
                                <p>Pembayaran Kas BOP</p>
                                <i data-feather="chevrons-right"></i></i>
                            </div>
                        </a>
                    </li>

                    <li class="border-b px-4 mb-2 ">
                        <a href="{{ route('kas.whdi') }}">
                            <div class="flex flex-row justify-between">
                                <p>Pembayaran Kas WHDI</p>
                                <i data-feather="chevrons-right"></i></i>
                            </div>
                        </a>
                    </li>

                    <li class="border-b px-4 mb-2 ">
                        <a href="{{ route('kas.nyepi') }}">
                            <div class="flex flex-row justify-between">
                                <p>Pembayaran Kas Nyepi</p>
                                <i data-feather="chevrons-right"></i></i>
                            </div>
                        </a>
                    </li>

                    <li class="border-b px-4 mb-2 ">
                        <a href="{{ route('kas.piodalan') }}">
                            <div class="flex flex-row justify-between">
                                <p>Pembayaran Kas Piodalan</p>
                                <i data-feather="chevrons-right"></i></i>
                            </div>
                        </a>
                    </li>

                    <li class="border-b px-4 mb-2 ">
                        <a href="{{ route('kas.banten') }}">
                            <div class="flex flex-row justify-between">
                                <p>Pembayaran Kas Banten</p>
                                <i data-feather="chevrons-right"></i></i>
                            </div>
                        </a>
                    </li>

                    <li class="border-b px-4 mb-2 ">
                        <a href="{{ route('kas.operasional') }}">
                            <div class="flex flex-row justify-between">
                                <p>Pembayaran Kas Operasional</p>
                                <i data-feather="chevrons-right"></i></i>
                            </div>
                        </a>
                    </li>






                    <li class="border-b px-4 mb-2 ">
                        <a href="{{ url('/') }}">
                            <div class="flex flex-row justify-between">
                                <p>Login</p>
                                <i data-feather="chevrons-right"></i></i>
                            </div>
                        </a>
                    </li>

                    <li class="border-b px-4 mb-2 ">
                        <a href="{{ url('/') }}">
                            <div class="flex flex-row justify-between">
                                <p>Login</p>
                                <i data-feather="chevrons-right"></i></i>
                            </div>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
        <hr>
        @yield('content')
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

    </script>
    @yield('script')
</body>

</html>
