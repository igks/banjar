@extends('layouts.my-app')

@section('content')
<div>
    @if (!Auth::check())
    <div class="bg-blue-500 p-2 rounded-md w-full text-center mt-2">
        <a href="{{ route('members.create') }}" class="text-white">+ Tambah Data Anggota</a>
    </div>
    @endif
    @if (isset($members))
    @foreach ($members as $member)
    <div class="bg-blue-200 rounded-md p-2 mb-3 mt-2">
        <div class="flex flex-row justify-between">
            <p class="font-bold text-md">Keluarga {{ $member->name }}</p>

        </div>
        <div class="bg-blue-100 rounded-md p-2 text-sm">
            <div class="mb-2">
                <p class="font-bold">Anggota:</p>
                @foreach ($member->detail as $detail)
                <p class="ml-4">{{ $detail->name }} -
                    {{ App\Helpers\Enums\MemberRole::getString($detail->status) }}</p>
                @endforeach

            </div>
            <hr>
            <div class="mb-2">
                <p class="font-bold">Alamat:</p>
                <p class="ml-4">{{ $member->address }}</p>

            </div>
            <div>
                <p class="font-bold">Telephone:</p>
                <p class="ml-4">{{ $member->phone }}</p>

            </div>
        </div>
        <div class="my-3 flex flex-row justify-end items-center text-white">
            <a class="bg-yellow-400 px-3 py-1 mr-3 rounded" href="{{ route('members.edit', [$member]) }}">
                <i data-feather="edit"></i>
            </a>
            <a class="bg-red-400 px-3 py-1 rounded" href="javascript:void(0);" onclick='deleteData({{ $member['id'] }})'>
                <i data-feather="trash"></i>
                <form id="deleteindex-{{ $member['id'] }}" action="{{ url('members', [$member]) }}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input type="hidden" name="_method" value="DELETE">
                </form>
            </a>
        </div>
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