@extends('layouts.my-app')
@section('title')
    Transaksi {{ $kategori == 0 ? 'Keseluruhan' : App\Helpers\Enums\TransaksiCat::getString($kategori) }} -
    {{ $tahun }}
@endsection

@section('content')
    <div class="mt-3">
        @if (count($transaksi) == 0)
            <h2 class="text-center">Tidak ada data...</h2>
        @else
            @foreach ($transaksi as $key => $data)
                <div
                    class="{{ $data->kategori == 1 ? 'bg-blue-200' : ($data->kategori == 2 ? 'bg-green-200' : ($data->kategori == 3 ? 'bg-yellow-200' : ($data->kategori == 4 ? 'bg-red-200' : ''))) }} p-3 mb-3 rounded-md">
                    <p class="font-bold text-sm">
                        {{ App\Helpers\Enums\TransaksiCat::getString($data->kategori) }}
                    </p>
                    <hr class="py-1">
                    <div class="flex flex-row justify-between">
                        <h2 class="mb-2 font-bold text-lg">{{ $data->judul }}</h2>
                        <h2 class="mb-2 font-bold text-lg">{{ \Carbon\Carbon::parse($data->tanggal)->format('d M Y') }}
                        </h2>
                    </div>
                    <p class="mb-2 font-bold text-md">{{ App\Helpers\Enums\TransaksiType::getString($data->jenis) }} - RP.
                        {{ number_format($data->jumlah, 0, ',', '.') }}</p>
                    @if ($data->keterangan != null)
                        <p>
                            {{ $data->keterangan }}
                        </p>
                    @endif
                    @if (Auth::check())
                        <div class="ml-6 flex flex-row justify-end text-white">
                            <a class="bg-yellow-400 p-1 rounded" href="{{ route('transaksi.edit', [$data->id]) }}">
                                <i data-feather="edit"></i>
                            </a>
                            <a class="bg-red-400 p-1 rounded ml-2" href="javascript:void(0);"
                                onclick="deleteData({{ $data['id'] }})">
                                <i data-feather="trash"></i>
                                <form id="deleteindex-{{ $data['id'] }}"
                                    action="{{ route('transaksi.destroy', [$data->id]) }}" method="POST">
                                    @csrf
                                    @method("DELETE")

                                    <input type="hidden" name="_method" value="DELETE">
                                </form>
                            </a>
                        </div>
                    @endif
                </div>
            @endforeach
        @endif
    </div>
@endsection

@section('script')
    <script>
        function deleteData(id) {
            if (confirm('Anda ingin menghapus data?') == true) {
                document.getElementById('deleteindex-' + id).submit();
            }
        }

    </script>
@endsection
