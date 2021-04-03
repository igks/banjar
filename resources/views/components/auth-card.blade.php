<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div class="flex flex-col justify-center items-center">
        <img src={{url('images/omkara.jpg')}} alt="OmKara" width="80" class="rounded-xl" />
        <h2 class="text-center mt-2 text-xl font-bold">Banjar Batu Aji Barat</h2>
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>