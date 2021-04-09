@extends('layouts.my-app')

@section('content')
<div class="px-2 mb-10">
    <div class="bg-purple-500 p-1 mb-3">
        <h2 class="font-bold my-2 text-center text-white">Ubah Data KK</h2>
    </div>
    <form action="{{route('members.update', $data->id) }}" method="POST">
        @csrf
        @method("PUT")

        <div class="flex flex-col mb-2">
            <label class="font-bold" for="kepala_keluarga">Nama Kepala Keluarga:</label>
            <input class="rounded" type="text" name="kepala_keluarga" value="{{ $data->name }}">
        </div>

        <div class="flex flex-col mb-2">
            <label class="font-bold" for="kepala_keluarga">Alamat:</label>
            <textarea class="rounded" type="text" name="alamat" rows="2">{{ $data->address }}</textarea>
        </div>

        <div class="flex flex-col mb-2">
            <label class="font-bold" for="kepala_keluarga">Nomor Telephone:</label>
            <input class="rounded" type="text" name="phone" value="{{ $data->phone }}">
        </div>

        <div class="flex flex-col mb-2">
            <label class="font-bold" for="istri">Nama Istri:</label>
            <input type="hidden" name="istri_id" value="{{isset($data->detail[0]) ? $data->detail[0]->id : ""}}">
            <input class="rounded" type="text" name="istri" value="{{isset($data->detail[0]) ? $data->detail[0]->name : ""}}">
        </div>
        <hr>

        <div class="flex flex-col mb-2">
            <label class="font-bold">Anak-1:</label>
            <input type="hidden" name="anak_1_id" value="{{isset($data->detail[1]) ? $data->detail[1]->id : ""}}">
            <input class="rounded" type="text" name="anak_1" value="{{isset($data->detail[1]) ? $data->detail[1]->name : ""}}">
            <div class="flex flex-row justify-start items-center mt-1">
                <input type="hidden" name="is_pay_1" value="off">
                <input type="checkbox" name="is_pay_1" {{isset($data->detail[1]) && $data->detail[1]->isPay == 0 ? "checked" : ""}}>
                <p class="ml-2 text-sm">Centang jika sudah wajib iuran</p>
            </div>
        </div>
        <hr>

        <div class="flex flex-col mb-2">
            <label class="font-bold">Anak-2:</label>
            <input type="hidden" name="anak_2_id" value="{{isset($data->detail[2]) ? $data->detail[2]->id : ""}}">
            <input class="rounded" type="text" name="anak_2" value="{{isset($data->detail[2]) ? $data->detail[2]->name : ""}}">
            <div class="flex flex-row justify-start items-center mt-1">
                <input type="hidden" name="is_pay_2" value="off">
                <input type="checkbox" name="is_pay_2" {{isset($data->detail[2]) && $data->detail[2]->isPay == 0 ? "checked" : ""}}>
                <p class="ml-2 text-sm">Centang jika sudah wajib iuran</p>
            </div>
        </div>
        <hr>

        <div class="flex flex-col mb-2">
            <label class="font-bold">Anak-3:</label>
            <input type="hidden" name="anak_3_id" value="{{isset($data->detail[3]) ? $data->detail[3]->id : ""}}">
            <input class="rounded" type="text" name="anak_3" value="{{isset($data->detail[3]) ? $data->detail[3]->name : ""}}">
            <div class="flex flex-row justify-start items-center mt-1">
                <input type="hidden" name="is_pay_3" value="off">
                <input type="checkbox" name="is_pay_3" {{isset($data->detail[3]) && $data->detail[3]->isPay == 0 ? "checked" : ""}}>
                <p class="ml-2 text-sm">Centang jika sudah wajib iuran</p>
            </div>
        </div>
        <hr>

        <div class="flex flex-col mb-2">
            <label class="font-bold">Anak-4:</label>
            <input type="hidden" name="anak_4_id" value="{{isset($data->detail[4]) ? $data->detail[4]->id : ""}}">
            <input class="rounded" type="text" name="anak_4" value="{{isset($data->detail[4]) ? $data->detail[4]->name : ""}}">
            <div class="flex flex-row justify-start items-center mt-1">
                <input type="hidden" name="is_pay_4" value="off">
                <input type="checkbox" name="is_pay_4" {{isset($data->detail[4]) && $data->detail[4]->isPay == 0 ? "checked" : ""}}>
                <p class="ml-2 text-sm">Centang jika sudah wajib iuran</p>
            </div>
        </div>
        <hr>

        <div class="flex flex-col mb-2">
            <label class="font-bold">Anak-5:</label>
            <input type="hidden" name="anak_5_id" value="{{isset($data->detail[5]) ? $data->detail[5]->id : ""}}">
            <input class="rounded" type="text" name="anak_5" value="{{isset($data->detail[5]) ? $data->detail[5]->name : ""}}">
            <div class="flex flex-row justify-start items-center mt-1">
                <input type="hidden" name="is_pay_5" value="off">
                <input type="checkbox" name="is_pay_5" {{isset($data->detail[5]) && $data->detail[5]->isPay == 0 ? "checked" : ""}}>
                <p class="ml-2 text-sm">Centang jika sudah wajib iuran</p>
            </div>
        </div>
        <hr>

        <div class="flex flex-col mb-2">
            <label class="font-bold">Anak-6:</label>
            <input type="hidden" name="anak_6_id" value="{{isset($data->detail[6]) ? $data->detail[6]->id : ""}}">
            <input class="rounded" type="text" name="anak_6" value="{{isset($data->detail[6]) ? $data->detail[6]->name : ""}}">
            <div class="flex flex-row justify-start items-center mt-1">
                <input type="hidden" name="is_pay_6" value="off">
                <input type="checkbox" name="is_pay_6" {{isset($data->detail[6]) && $data->detail[6]->isPay == 0 ? "checked" : ""}}>
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