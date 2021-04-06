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
                    <div>
                    <a href="{{route('members.edit',[$member])}}">Edit</a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection

@section('script')
    <script>


    </script>
@endsection
