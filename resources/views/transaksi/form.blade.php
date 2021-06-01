@extends('layouts.my-app')
@section('title', 'Form Transaksi')

@section('content')
    <div class="px-2 mb-10">
        @if ($update ?? '')
            <div class="update"></div>
        @endif
        <form action="{{ route('transaksi.store') }}" method="POST">
            @csrf

            <div class="flex flex-col mb-3">
                <label class="font-bold" for="member_master_id">Tanggal:</label>
                <input class="rounded" type="date" name="tanggal" value="{{ $cacheData['tanggal'] }}">
            </div>

            <div class="flex flex-col mb-3">
                <label class="font-bold" for="jenis">Pilih Jenis Transaksi:</label>
                <select class="rounded" name="jenis">
                    @foreach ($jenis as $key => $value)
                        <option value="{{ $key }}" {{ $cacheData['jenis'] == $key ? 'selected' : '' }}>
                            {{ $value }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-col mb-3">
                <label class="font-bold" for="jenis">Pilih Kategori Transaksi:</label>
                <select class="rounded" name="kategori">
                    @foreach ($kategori as $key => $value)
                        <option value="{{ $key }}" {{ $cacheData['kategori'] == $key ? 'selected' : '' }}>
                            {{ $value }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-col mb-3">
                <label class="font-bold" for="tahun">Nama Transaksi:</label>
                <input class="rounded" type="text" name="judul">
            </div>

            <div class="flex flex-col mb-3">
                <label class="font-bold" for="jumlah">Jumlah:</label>
                <input class="rounded" type="number" name="jumlah">
            </div>

            <div class="flex flex-col mb-5">
                <label class="font-bold" for="jumlah">Keterangan:</label>
                <textarea class="rounded" name="keterangan" rows="2"></textarea>
            </div>

            <div class="flex flex-row justify-between mt-4 px-3">
                <a class="bg-gray-300 py-1 px-3 rounded font-bold" href="{{ route('transaksi.index') }}">Kembali</a>
                <button class="bg-green-500 py-1 px-3 rounded text-white font-bold" type="submit">Simpan</button>
            </div>

        </form>
    </div>
@endsection

@section('script')
    <script>
        $(function() {
            let update = $('.update');
            if (update.length > 0) {
                alert("Update data berhasil");
            }
        });

    </script>
@endsection
