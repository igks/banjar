@extends('layouts.my-app')

@section('content')
<div>
    @if (Auth::check())
    <div class="bg-blue-500 p-2 rounded-md w-full text-center mt-2 mb-6">
        <a href="{{ route('laporan.create') }}" class="text-white">+ Pembayaran</a>
    </div>
    @endif

    <div class="px-4">
        <form action="{{ route('laporan.view') }}" method="POST">
            @csrf

            <div class="flex flex-col mb-8">
                <label class="font-bold" for="laporan">Pilih Jenis Iuran:</label>
                <select class="rounded" name="iuran">
                    @foreach ($laporan as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-col mb-8">
                <label class="font-bold" for="laporan">Pilih Tahun:</label>
                <select class="rounded" name="tahun">
                    @foreach ($tahun as $item)
                    <option value="{{ $item }}">{{ $item }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <button class="bg-blue-400 p-2 rounded w-full text-white font-bold" type="submit">Lihat Laporan</button>
            </div>
        </form>
    </div>
</div>
@endsection