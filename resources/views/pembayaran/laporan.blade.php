@extends('layouts.my-app')
@section('title')
    {{ App\Helpers\Enums\Laporan::getString($iuran) }} - {{ $tahun }}
@endsection

@section('content')
    <div class="mt-3">
        @if ($update ?? '')
            <div class="update"></div>
        @endif

        @if (count($laporan) == 0)
            <h2 class="text-center">Tidak ada data...</h2>
        @else
            @foreach ($laporan as $key => $data)
                @if (App\Models\MemberMaster::getName($key) != null)
                    <div class="bg-green-200 p-3 mb-3 rounded-md">
                        <div class="flex flex-row justify-between items-baseline mb-3">
                            <h2 class="mb-2 font-bold">{{ App\Models\MemberMaster::getName($key) }}</h2>
                            @if (Auth::check())
                                <a class="bg-blue-300 rounded-full w-8 h-8 flex justify-center items-center"
                                    href="{{ route('laporan.create') }}">
                                    <i class="text-white" data-feather="plus"></i>
                                </a>
                            @endif
                        </div>
                        @foreach ($data as $item)
                            <div class="flex flex-row justify-between items-center px-2 py-1 mb-1 rounded bg-green-100">
                                <p>{{ App\Models\Pembayaran::getBulan($item->bulan) }}</p>
                                <div class="flex flex-row items-center">
                                    <p>Rp.
                                        {{ number_format($item->jumlah, 0, ',', '.') }}
                                    </p>
                                    @if (Auth::check())
                                        <div class="ml-6 flex flex-row text-white">
                                            <a class="bg-yellow-400 p-1 rounded"
                                                href="{{ route('laporan.edit', [$item->id]) }}">
                                                <i data-feather="edit"></i>
                                            </a>
                                            <a class="bg-red-400 p-1 rounded ml-2" href="javascript:void(0);"
                                                onclick="deleteData({{ $item['id'] }})">
                                                <i data-feather="trash"></i>
                                                <form id="deleteindex-{{ $item['id'] }}"
                                                    action="{{ url('laporan', [$item->id, $tahun, $iuran]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method("DELETE")

                                                    <input type="hidden" name="_method" value="DELETE">
                                                </form>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            @endforeach
        @endif
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

        function deleteData(id) {
            if (confirm('Anda ingin menghapus data?') == true) {
                document.getElementById('deleteindex-' + id).submit();
            }
        }

    </script>
@endsection
