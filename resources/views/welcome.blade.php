@extends('layouts.my-app')

@section('content')
<div class="px-2">
    <div id="content" class="w-full mt-3">
        <div class="bg-blue-200 rounded-md p-2">
            <div class="flex flex-row justify-between mb-2">
                <p class="font-bold text-lg">Kas Banjar</p>
            </div>
            <hr>
            <div class="flex flex-row justify-end mt-2">
                <p class="font-bold text-2xl">Rp. {{ number_format(1000000, 0, ',', '.') }}</p>
            </div>
        </div>
    </div>

    <div id="content" class="w-full mt-3">
        <div class="bg-green-200 rounded-md p-2">
            <div class="flex flex-row justify-between mb-2">
                <p class="font-bold text-lg">Tabungan Nyepi</p>
            </div>
            <hr>
            <div class="flex flex-row justify-end mt-2">
                <p class="font-bold text-2xl">Rp. {{ number_format(1000000, 0, ',', '.') }}</p>
            </div>
        </div>
    </div>

    <div id="content" class="w-full mt-3">
        <div class="bg-yellow-200 rounded-md p-2">
            <div class="flex flex-row justify-between mb-2">
                <p class="font-bold text-lg">Tabungan Piodalan</p>
            </div>
            <hr>
            <div class="flex flex-row justify-end mt-2">
                <p class="font-bold text-2xl">Rp. {{ number_format(1000000, 0, ',', '.') }}</p>
            </div>
        </div>
    </div>

    <div id="content" class="w-full mt-3">
        <div class="bg-red-200 rounded-md p-2">
            <div class="flex flex-row justify-between mb-2">
                <p class="font-bold text-lg">Kas Banten</p>
            </div>
            <hr>
            <div class="flex flex-row justify-end mt-2">
                <p class="font-bold text-2xl">Rp. {{ number_format(1000000, 0, ',', '.') }}</p>
            </div>
        </div>
    </div>

    <div id="content" class="w-full mt-3 text-sm">
        <div class="bg-gray-100 rounded-md p-2">
            <div class="flex flex-row justify-between mb-2">
                <p class="font-bold text-lg">Informasi</p>
            </div>
            <hr>
            <div class="my-2">
                <p class="text-center text-base font-bold">Banjar Bau Aji Barat terdiri dari 29 KK <br> (26 Keluarga dan 3
                    Muda Mudi)</p>
            </div>
            <hr>
            <div class="my-2">
                <p class="text-lg font-bold">Rincian Iuran Banjar</p>
                <div class="mt-2 mb-5">
                    <p>A. Iuran perbulan Banjar Batu Aji Barat adalah <br> <strong>Rp. 100.000</strong>, dibagi
                        menjadi:</p>
                    <table class="w-full">
                        <tr>
                            <td>Kas Banjar</td>
                            <td>Rp. 13.000</td>
                        </tr>
                        <tr>
                            <td>Iuran BOP</td>
                            <td>Rp. 40.000</td>
                        </tr>
                        <tr>
                            <td>Iuran Tabungan Nyepi</td>
                            <td>Rp. 15.000</td>
                        </tr>
                        <tr>
                            <td>Iuran Tabungan Piodalan</td>
                            <td>Rp. 20.000</td>
                        </tr>
                        <tr>
                            <td>Iuran Banten</td>
                            <td>Rp. 8.000</td>
                        </tr>
                        <tr>
                            <td>Iuran WHDI</td>
                            <td>Rp. 2.000</td>
                        </tr>
                        <tr>
                            <td>Operasional Pengurus</td>
                            <td>Rp. 2.000</td>
                        </tr>
                    </table>
                </div>

                <div class="mt-2 mb-5">
                    <p>B. Iuran perbulan Muda Mudi adalah <br> <strong>Rp. 75.000</strong>, dibagi menjadi:</p>
                    <table class="w-full">
                        <tr>
                            <td>Iuran BOP</td>
                            <td>Rp. 40.000</td>
                        </tr>
                        <tr>
                            <td>Iuran Tabungan Nyepi</td>
                            <td>Rp. 15.000</td>
                        </tr>
                        <tr>
                            <td>Iuran Tabungan Piodalan</td>
                            <td>Rp. 20.000</td>
                        </tr>
                    </table>
                </div>

                <div class="mt-2 mb-5">
                    <p>C. Arisan perbulan <br> <strong>Rp. 50.000</strong></p>
                </div>

                <div class="mt-2 mb-5">
                    <p>D. Iuran Pembangunan Pura <br> <strong>Rp. 1.000.000</strong>/KK dan dicicil 10 kali.</p>
                </div>
            </div>
        </div>
    </div>

    <div id="content" class="w-full mt-3">
        <div class="rounded-md p-2 text-sm">
            <div class="flex flex-row justify-between mb-2">
                <p class="font-bold text-lg">Riwayat Pengurus</p>
            </div>
            <hr>
            <table class="my-2">
                <th>Periode 2021 - 2022</th>
                <tr>
                    <td>Ketua</td>
                    <td>: Nyoman Arsanayasa </td>
                </tr>
                <tr>
                    <td>Bendahara</td>
                    <td>: Ni Wayan Yuli Astuti </td>
                </tr>
                <tr>
                    <td>Bendahara Banten</td>
                    <td>: Rini Megasari</td>
                </tr>
            </table>
            <hr>
            <table class="my-2">
                <th>Periode 2020 - 2021</th>
                <tr>
                    <td>Ketua</td>
                    <td>: Made Suardana </td>
                </tr>
                <tr>
                    <td>Bendahara</td>
                    <td>: Ni Wayan Yuli Astuti </td>
                </tr>
                <tr>
                    <td>Bendahara Banten</td>
                    <td>: Sri Soemarni</td>
                </tr>
            </table>
            <hr>
        </div>
    </div>

</div>
@endsection

@section('script')

@endsection