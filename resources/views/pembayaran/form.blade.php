@extends('layouts.my-app')
@section('title', 'Form Pembayaran')
@section('content')
    <div class="px-2 mb-10">
        @if ($update ?? '')
            <div class="update"></div>
        @endif

        <form action="{{ route('laporan.store') }}" method="POST">
            @csrf

            <div class="flex flex-col mb-3">
                <label class="font-bold" for="member_master_id">Pilih Warga:</label>
                <select class="rounded" name="member_master_id">
                    @foreach ($warga as $data)
                        <option value="{{ $data->id }}" {{ $cacheData['warga'] == $data->id ? 'selected' : '' }}>
                            {{ $data->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-col mb-3">
                <label class="font-bold" for="jenis">Pilih Jenis Iuran:</label>
                <select class="rounded" name="jenis" id="iuran" onchange="checkIuran()">
                    @foreach ($iuran as $key => $value)
                        <option value="{{ $key }}" {{ $cacheData['jenis'] == $key ? 'selected' : '' }}>
                            {{ $value }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-col mb-3">
                <label class="font-bold" for="tahun">Pilih Tahun:</label>
                <select class="rounded" name="tahun">
                    @foreach ($tahun as $value)
                        <option value="{{ $value }}" {{ $cacheData['tahun'] == $value ? 'selected' : '' }}>
                            {{ $value }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-col mb-3">
                <label class="font-bold" for="bulan">Pilih Bulan:</label>
                <select class="rounded" name="bulan">
                    @foreach ($bulan as $key => $value)
                        <option value="{{ $key }}" {{ $cacheData['bulan'] == $key ? 'selected' : '' }}>
                            {{ $value }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-col mb-3">
                <label class="font-bold" for="jumlah">Jumlah:</label>
                <input class="rounded" type="number" name="jumlah" id="jumlah">
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
@section('script')
    <script>
        $(function() {
            checkIuran();

            let update = $('.update');
            if (update.length > 0) {
                alert("Update data berhasil");
            }
        });

        function checkIuran() {
            let iuran = $("#iuran").val();
            if (iuran == 1) {
                $("#jumlah").val(13000);
            } else if (iuran == 2) {
                $("#jumlah").val(40000);
            } else if (iuran == 3) {
                $("#jumlah").val(2000);
            } else if (iuran == 4) {
                $("#jumlah").val(15000);
            } else if (iuran == 5) {
                $("#jumlah").val(20000);
            } else if (iuran == 6) {
                $("#jumlah").val(8000);
            } else if (iuran == 7) {
                $("#jumlah").val(2000);
            } else if (iuran == 8) {
                $("#jumlah").val(50000);
            } else if (iuran == 9) {
                $("#jumlah").val(100000);
            }
        }

    </script>
@endsection
