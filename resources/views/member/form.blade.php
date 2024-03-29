@extends('layouts.my-app')
@section('title', 'Form Tambah Anggota')

@section('content')
    <div class="px-2 mb-6 mt-3">
        <form action="{{ route('members.store') }}" method="POST">
            @csrf

            <div class="flex flex-col mb-2">
                <label class="font-bold" for="kepala_keluarga">Nama Kepala Keluarga:</label>
                <input class="rounded" type="text" name="kepala_keluarga">
            </div>

            <div class="flex flex-col mb-2">
                <label class="font-bold" for="alamat">Alamat:</label>
                <textarea class="rounded" type="text" name="alamat" rows="2"></textarea>
            </div>

            <div class="flex flex-col mb-2">
                <label class="font-bold" for="phone">Telepon Kepala Keluarga:</label>
                <input class="rounded" type="text" name="phone">
            </div>

            <div class="flex flex-row my-3 justify-around">
                <div onclick="showAnggota()">
                    <input class="rounded" type="radio" id="radio-keluarga" name="status" value="1" checked>
                    <label class="font-bold mr-2" for="radio-keluarga">Berkeluarga</label>
                </div>
                <div onclick="hideAnggota()">
                    <input class="rounded" type="radio" id="radio-lajang" name="status" value="0">
                    <label class="font-bold mr-2" for="radio-lajang">Lajang</label>
                </div>
            </div>
            <hr>

            <div id="anggota">
                <div class="flex flex-col mb-2">
                    <label class="font-bold" for="istri">Nama Istri:</label>
                    <input class="rounded" type="text" name="istri">
                </div>
                <div class="flex flex-col mb-2">
                    <label class="font-bold" for="phone">Telepon Istri:</label>
                    <input class="rounded" type="text" name="phone-istri">
                </div>
                <hr>

                <div class="flex flex-col mb-2">
                    <label class="font-bold">Anak-1:</label>
                    <input class="rounded" type="text" name="anak[]">
                    <div class="flex flex-row justify-start items-center mt-1">
                        <input type="hidden" name="is_pay_1" value="0">
                        <input type="checkbox" name="is_pay_1">
                        <p class="ml-2 text-sm">Centang jika sudah wajib iuran</p>
                    </div>
                </div>
                <hr>

                <div class="flex flex-col mb-2">
                    <label class="font-bold">Anak-2:</label>
                    <input class="rounded" type="text" name="anak[]">
                    <div class="flex flex-row justify-start items-center mt-1">
                        <input type="hidden" name="is_pay_2" value="0">
                        <input type="checkbox" name="is_pay_2">
                        <p class="ml-2 text-sm">Centang jika sudah wajib iuran</p>
                    </div>
                </div>
                <hr>

                <div class="flex flex-col mb-2">
                    <label class="font-bold">Anak-3:</label>
                    <input class="rounded" type="text" name="anak[]">
                    <div class="flex flex-row justify-start items-center mt-1">
                        <input type="hidden" name="is_pay_3" value="0">
                        <input type="checkbox" name="is_pay_3">
                        <p class="ml-2 text-sm">Centang jika sudah wajib iuran</p>
                    </div>
                </div>
                <hr>

                <div class="flex flex-col mb-2">
                    <label class="font-bold">Anak-4:</label>
                    <input class="rounded" type="text" name="anak[]">
                    <div class="flex flex-row justify-start items-center mt-1">
                        <input type="hidden" name="is_pay_4" value="0">
                        <input type="checkbox" name="is_pay_4">
                        <p class="ml-2 text-sm">Centang jika sudah wajib iuran</p>
                    </div>
                </div>
                <hr>

                <div class="flex flex-col mb-2">
                    <label class="font-bold">Anak-5:</label>
                    <input class="rounded" type="text" name="anak[]">
                    <div class="flex flex-row justify-start items-center mt-1">
                        <input type="hidden" name="is_pay_5" value="0">
                        <input type="checkbox" name="is_pay_5">
                        <p class="ml-2 text-sm">Centang jika sudah wajib iuran</p>
                    </div>
                </div>
                <hr>

                <div class="flex flex-col mb-2">
                    <label class="font-bold">Anak-6:</label>
                    <input class="rounded" type="text" name="anak[]">
                    <div class="flex flex-row justify-start items-center mt-1">
                        <input type="hidden" name="is_pay_6" value="0">
                        <input type="checkbox" name="is_pay_6">
                        <p class="ml-2 text-sm">Centang jika sudah wajib iuran</p>
                    </div>
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

@section('script')
    <script>
        function hideAnggota() {
            let anggota = document.getElementById('anggota');
            anggota.classList.add('hidden');
        }

        function showAnggota() {
            let anggota = document.getElementById('anggota');
            anggota.classList.remove('hidden');
        }

    </script>
@endsection
