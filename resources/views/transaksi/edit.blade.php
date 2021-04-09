@extends('layouts.my-app')

@section('content')
<div class="px-2 mb-10">
    <div class="bg-purple-500 p-1 mb-3">
        <h2 class="font-bold my-2 text-center text-white">Ubah Data Transaksi</h2>
    </div>
    <form action="{{ route('transaksi.update', [$transaksi->id]) }}" method="POST">
        @csrf
        @method("PUT")

        <div class="flex flex-col mb-3">
            <label class="font-bold" for="member_master_id">Tanggal:</label>
            <input class="rounded" type="date" name="tanggal" value="{{$transaksi->tanggal}}">
        </div>

        <div class="flex flex-col mb-3">
            <label class="font-bold" for="jenis">Pilih Jenis Transaksi:</label>
            <select class="rounded" name="jenis">
                @foreach ($jenis as $key => $value)
                <option value="{{ $key }}" {{$key == $transaksi->jenis ? "selected" : ""}}>{{ $value }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex flex-col mb-3">
            <label class="font-bold" for="jenis">Pilih Kategori Transaksi:</label>
            <select class="rounded" name="kategori">
                @foreach ($kategori as $key => $value)
                <option value="{{ $key }}" {{$key == $transaksi->kategori ? "selected" : ""}}>{{ $value }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex flex-col mb-3">
            <label class="font-bold" for="tahun">Nama Transaksi:</label>
            <input class="rounded" type="text" name="judul" value="{{$transaksi->judul}}">
        </div>

        <div class="flex flex-col mb-3">
            <label class="font-bold" for="jumlah">Jumlah:</label>
            <input class="rounded" type="number" name="jumlah" value="{{$transaksi->jumlah}}">
        </div>

        <div class="flex flex-col mb-5">
            <label class="font-bold" for="jumlah">Keterangan:</label>
            <textarea class="rounded" name="keterangan" rows="2">{{$transaksi->keterangan}}</textarea>
        </div>

        <div class="flex flex-row justify-between mt-4 px-3">
            <a class="bg-gray-300 py-1 px-3 rounded font-bold" href="{{ route('transaksi.index') }}">Kembali</a>
            <button class="bg-green-500 py-1 px-3 rounded text-white font-bold" type="submit">Simpan</button>
        </div>

    </form>
</div>
@endsection