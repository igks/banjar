@extends('layouts.my-app')
@section('title', 'Rangkuman')

@section('content')
    <div class="px-2">
        <div class="">
            <div class="w-full mt-3">
                <div class="bg-blue-200 rounded-md p-2">
                    <div class="flex flex-row justify-between mb-2">
                        <p class="font-bold text-md">Kas Banjar</p>
                    </div>
                    <hr>
                    <div class="flex flex-row justify-end mt-2">
                        <p class="font-bold text-xl">Rp. {{ number_format($banjar, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <div class="w-full mt-3">
                <div class="bg-green-200 rounded-md p-2">
                    <div class="flex flex-row justify-between mb-2">
                        <p class="font-bold text-md">Tabungan Nyepi</p>
                    </div>
                    <hr>
                    <div class="flex flex-row justify-end mt-2">
                        <p class="font-bold text-xl">Rp. {{ number_format($nyepi, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <div class="w-full mt-3">
                <div class="bg-yellow-200 rounded-md p-2">
                    <div class="flex flex-row justify-between mb-2">
                        <p class="font-bold text-md">Tabungan Piodalan</p>
                    </div>
                    <hr>
                    <div class="flex flex-row justify-end mt-2">
                        <p class="font-bold text-xl">Rp. {{ number_format($piodalan, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <div class="w-full mt-3">
                <div class="bg-red-200 rounded-md p-2">
                    <div class="flex flex-row justify-between mb-2">
                        <p class="font-bold text-md">Kas Banten</p>
                    </div>
                    <hr>
                    <div class="flex flex-row justify-end mt-2">
                        <p class="font-bold text-xl">Rp. {{ number_format($banten, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
        </div>

        @include('components.informasi')

        @include('components.riwayat')

    </div>
@endsection

@section('script')

@endsection
