@extends('app')

@section('content')
<section class="bg-gray-50 light:bg-gray-900 h-screen flex justify-center items-center">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto w-4/12 md:h-screen lg:py-0">
        <div class="w-full bg-white rounded-lg shadow light:border md:mt-0 sm:max-w-md xl:p-0 light:bg-gray-800 light:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <div class=""><a href="{{ url('list') }}">Back</a></div>
                <h1 class="text-3xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl light:text-white">
                    Input Data Rombongan
                </h1>
                <form class="space-y-4 md:space-y-6" action="{{ url('rombongan/aksi') }}" method="post">
                    {{ csrf_field() }}
                    <div class="mt-4">
                        <label for="nama" class="block mb-2 text-sm font-medium text-blue-500 light:text-white">Nama</label>
                        <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-blue-500 light:focus:border-blue-500" placeholder="Nama" required autocomplete="off">
                    </div>
                    <div class="mt-4">
                        <label for="alamat" class="block mb-2 text-sm font-medium text-blue-500 light:text-white">Alamat</label>
                        <input type="text" name="alamat" id="alamat" placeholder="Alamat" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-blue-500 light:focus:border-blue-500" required autocomplete="off">
                    </div>
                    <div class="mt-4">
                        <input type="number" name="jumlah" placeholder="Jumlah Orang" class="text-lg bg-gray-50 border border-gray-300 text-gray-900 p-2">
                    </div>
                    <button type="submit" class="w-full text-white bg-black font-medium rounded-lg text-sm px-5 py-2.5 text-center mt-4">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection