@extends('layouts.my-app')

@section('content')
    <div class="px-2 mb-10">
        <div class="bg-purple-500 p-1 mb-3">
            <h2 class="font-bold my-2 text-center text-white">Form Transaksi Pembayaran</h2>
        </div>
        <form action="{{ route('laporan.store') }}" method="POST">
            @csrf

            <div class="flex flex-col mb-3">
                <label class="font-bold" for="member_master_id">Pilih Warga:</label>
                <select class="rounded" name="member_master_id">
                    @foreach ($warga as $data)
                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-col mb-3">
                <label class="font-bold" for="jenis">Pilih Jenis Iuran:</label>
                <select class="rounded" name="jenis">
                    @foreach ($iuran as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-col mb-3">
                <label class="font-bold" for="tahun">Pilih Tahun:</label>
                <select class="rounded" name="tahun">
                    @foreach ($tahun as $value)
                        <option value="{{ $value }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-col mb-3">
                <label class="font-bold" for="bulan">Pilih Bulan:</label>
                <select class="rounded" name="bulan">
                    @foreach ($bulan as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-col mb-3">
                <label class="font-bold" for="jumlah">Jumlah:</label>
                <input class="h-6 rounded" type="number" name="jumlah">
            </div>

            <div class="flex flex-col mb-3">
                <label class="font-bold" for="keterangan">Keterangan:</label>
                <textarea class="rounded" type="text" name="keterangan" rows="2"></textarea>
            </div>

            <div class="flex flex-row justify-between mt-4 px-3">
                <a class="bg-gray-300 py-1 px-3 rounded font-bold" href="{{ route('laporan.index') }}">Kembali</a>
                <button class="bg-green-500 py-1 px-3 rounded text-white font-bold" type="submit">Simpan</button>
            </div>

        </form>
    </div>
@endsection
