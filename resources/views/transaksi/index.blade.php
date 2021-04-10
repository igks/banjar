@extends('layouts.my-app')
@section('title', 'Pilih Detail Transaksi')

@section('content')
    <div>
        @if (Auth::check())
            <div class="bg-yellow-400 p-2 rounded-md w-full text-center mt-2 mb-6">
                <a href="{{ route('transaksi.create') }}" class="text-white">+ Transaksi</a>
            </div>
        @endif

        <div class="px-4">
            <form action="{{ route('transaksi.view') }}" method="POST">
                @csrf
                <div class="flex flex-col mb-8">
                    <label class="font-bold" for="laporan">Pilih Tahun:</label>
                    <select class="rounded" name="tahun">
                        @foreach ($tahun as $item)
                            <option value="{{ $item }}">{{ $item }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex flex-col mb-8">
                    <label class="font-bold" for="laporan">Pilih Kategori:</label>
                    <select class="rounded" name="kategori">
                        <option value="0">Semua</option>
                        @foreach ($kategori as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <button class="bg-blue-400 p-2 rounded w-full text-white font-bold" type="submit">Lihat Detail
                        Transaksi</button>
                </div>
            </form>
        </div>
    </div>
@endsection
