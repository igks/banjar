@extends('layouts.my-app')

@section('content')
    <div class="mt-3">
        <h2 class="font-bold text-center mb-4">Daftar Pembayaran Warga</h2>
        @if (count($laporan) == 0)
            <h2 class="text-center">Tidak ada data...</h2>
        @endif
        @foreach ($laporan as $key => $data)
            <div class="bg-green-200 p-3 mb-3 rounded-md">
                <h2 class="mb-2 font-bold">{{ App\Models\MemberMaster::getName($key) }}</h2>
                @foreach ($data as $item)
                    <div class="flex flex-row justify-between items-center px-2 py-1 mb-1 rounded bg-green-100">
                        <p>{{ $item->id }}</p>
                        <p>{{ App\Models\Pembayaran::getBulan($item->bulan) }}</p>
                        <p>Rp.
                            {{ number_format($item->jumlah, 0, ',', '.') }}</p>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
@endsection
