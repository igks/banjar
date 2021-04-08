@extends('layouts.my-app')

@section('content')
<div class="mt-3">
    <h2 class="font-bold text-center mb-4">Daftar Pembayaran {{App\Helpers\Enums\Laporan::getString($iuran)}} - {{$tahun}}</h2>
    @if (count($laporan) == 0)
    <h2 class="text-center">Tidak ada data...</h2>
    @endif
    @foreach ($laporan as $key => $data)
    <div class="bg-green-200 p-3 mb-3 rounded-md">
        <h2 class="mb-2 font-bold">{{ App\Models\MemberMaster::getName($key) }}</h2>
        @foreach ($data as $item)
        <div class="flex flex-row justify-between items-center px-2 py-1 mb-1 rounded bg-green-100">
            <p>{{ App\Models\Pembayaran::getBulan($item->bulan) }}</p>
            <div class="flex flex-row items-center">
                <p>Rp.
                    {{ number_format($item->jumlah, 0, ',', '.') }}
                </p>
                <div class="ml-6 flex flex-row text-white">
                    <a class="bg-yellow-400 p-1 rounded" href="{{ route('laporan.edit', [$item->id]) }}">
                        <i data-feather="edit"></i>
                    </a>
                    <a class="bg-red-400 p-1 rounded ml-2" href="javascript:void(0);" onclick="deleteData({{ $item['id'] }})">
                        <i data-feather="trash"></i>
                        <form id="deleteindex-{{ $item['id'] }}" action="{{ url('laporan', [$item->id]) }}" method="POST">
                            @csrf
                            @method("DELETE")

                            <input type="hidden" name="_method" value="DELETE">
                        </form>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endforeach
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