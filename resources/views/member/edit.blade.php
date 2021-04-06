@extends('layouts.my-app')

@section('content')
    <div class="px-2 mb-10">
        <div class="bg-purple-500 p-1 mb-3">
            <h2 class="font-bold my-2 text-center text-white">Ubah Data KK</h2>
        </div>
        <form action="{{ route('members.store') }}" method="POST">
            @csrf

            <div class="flex flex-col mb-2">
                <label class="font-bold" for="kepala_keluarga">Nama Kepala Keluarga:</label>
                <input class="h-6 rounded" type="text" name="kepala_keluarga" value="{{ $data->name }}">
            </div>

            <div class="flex flex-col mb-2">
                <label class="font-bold" for="kepala_keluarga">Alamat:</label>
                <textarea class="rounded" type="text" name="alamat" rows="2">{{ $data->address }}</textarea>
            </div>

            <div class="flex flex-col mb-2">
                <label class="font-bold" for="kepala_keluarga">Nomor Telephone:</label>
                <input class="h-6 rounded" type="text" name="phone" value="{{ $data->phone }}">
            </div>

            @foreach ($data->detail as $detail)
                @if ($detail->status == App\Helpers\Enums\MemberRole::getValue('istri'))
                    <div class="flex flex-col mb-2">
                        <label class="font-bold" for="istri">Nama Istri:</label>
                        <input class="h-6 rounded" type="text" name="istri" value="{{ $detail->name }}">
                    </div>
                    <hr>
                @endif

                @if ($detail->status == App\Helpers\Enums\MemberRole::getValue('anak'))
                    <div class="flex flex-col mb-2">
                        <label class="font-bold">Anak-1:</label>
                        <input class="h-6 rounded" type="text" name="anak[]">
                        <div class="flex flex-row justify-start items-center mt-1">
                            <input type="hidden" name="is_pay_1" value="0">
                            <input type="checkbox" name="is_pay_1">
                            <p class="ml-2 text-sm">Centang jika sudah wajib iuran</p>
                        </div>
                    </div>
                    <hr>
                @endif

            @endforeach


            <div class="flex flex-col mb-2">
                <label class="font-bold">Anak-1:</label>
                <input class="h-6 rounded" type="text" name="anak[]">
                <div class="flex flex-row justify-start items-center mt-1">
                    <input type="hidden" name="is_pay_1" value="0">
                    <input type="checkbox" name="is_pay_1">
                    <p class="ml-2 text-sm">Centang jika sudah wajib iuran</p>
                </div>
            </div>
            <hr>

            <div class="flex flex-col mb-2">
                <label class="font-bold">Anak-2:</label>
                <input class="h-6 rounded" type="text" name="anak[]">
                <div class="flex flex-row justify-start items-center mt-1">
                    <input type="hidden" name="is_pay_2" value="0">
                    <input type="checkbox" name="is_pay_2">
                    <p class="ml-2 text-sm">Centang jika sudah wajib iuran</p>
                </div>
            </div>
            <hr>

            <div class="flex flex-col mb-2">
                <label class="font-bold">Anak-3:</label>
                <input class="h-6 rounded" type="text" name="anak[]">
                <div class="flex flex-row justify-start items-center mt-1">
                    <input type="hidden" name="is_pay_3" value="0">
                    <input type="checkbox" name="is_pay_3">
                    <p class="ml-2 text-sm">Centang jika sudah wajib iuran</p>
                </div>
            </div>
            <hr>

            <div class="flex flex-col mb-2">
                <label class="font-bold">Anak-4:</label>
                <input class="h-6 rounded" type="text" name="anak[]">
                <div class="flex flex-row justify-start items-center mt-1">
                    <input type="hidden" name="is_pay_4" value="0">
                    <input type="checkbox" name="is_pay_4">
                    <p class="ml-2 text-sm">Centang jika sudah wajib iuran</p>
                </div>
            </div>
            <hr>

            <div class="flex flex-col mb-2">
                <label class="font-bold">Anak-5:</label>
                <input class="h-6 rounded" type="text" name="anak[]">
                <div class="flex flex-row justify-start items-center mt-1">
                    <input type="hidden" name="is_pay_5" value="0">
                    <input type="checkbox" name="is_pay_5">
                    <p class="ml-2 text-sm">Centang jika sudah wajib iuran</p>
                </div>
            </div>
            <hr>

            <div class="flex flex-col mb-2">
                <label class="font-bold">Anak-6:</label>
                <input class="h-6 rounded" type="text" name="anak[]">
                <div class="flex flex-row justify-start items-center mt-1">
                    <input type="hidden" name="is_pay_6" value="0">
                    <input type="checkbox" name="is_pay_6">
                    <p class="ml-2 text-sm">Centang jika sudah wajib iuran</p>
                </div>
            </div>
            <hr>



            <div class="flex flex-row justify-between mt-4 px-3">
                <a class="bg-gray-300 py-1 px-3 rounded font-bold" href="{{ route('members.index') }}">Kembali</a>
                <button class="bg-green-500 py-1 px-3 rounded text-white font-bold" type="submit">Simpan</button>
            </div>

        </form>
    </div>
@endsection
