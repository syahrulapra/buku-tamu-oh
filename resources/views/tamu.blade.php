@extends('app')

@section('content')
    <section>
        <div class="md:relative flex flex-col items-center justify-center h-screen overflow-hidden ">
            <video autoplay loop muted class="object-cover w-screen h-screen absolute md:block">
                <source src="{{ asset('Comp 1.mp4') }}" type="video/mp4" />
            </video>
            <img src="{{ asset('../image/2.png') }}" alt="" draggable="false" class="sm:w-8/12 p-2 lg:block relative max-w-full mb-96 bottom-8">
            <div class="w-full absolute md:w-4/12 mt-36">
                <div class="lg:space-y-0">
                    <form action="/tambah" method="POST">
                        @csrf
                        <div class="bg-black bg-opacity-75 sm:h-96 py-10 px-8 lg:rounded-md">
                            <img src="{{ asset('../image/1.png') }}" alt="" draggable="false" class="mb-5">
                            <div class="px-2">
                                <div class="relative z-0 w-full mb-5 group">
                                    <input type="text" name="nama" id="nama" class="block p-2.5 w-full text-sm text-amber-100 bg-transparent border rounded-md appearance-none focus:outline-none focus:ring-0 placeholder-amber-100 placeholder-opacity-70 peer border-amber-300" placeholder="Nama" autocomplete="off"/>
                                    @if($errors->has('nama'))
                                        <p class="text-yellow-500 text-xs italic m-1">{{ $errors->first('nama') }}</p>
                                    @endif
                                </div>
                                <div class="relative z-0 w-full mb-5 group">
                                    <input type="text" name="alamat" id="alamat" class="block p-2.5 w-full text-sm text-amber-100 bg-transparent border rounded-md appearance-none focus:outline-none focus:ring-0 placeholder-amber-100 placeholder-opacity-70 peer border-amber-300" placeholder="Alamat/Instansi" autocomplete="off"/>
                                    @if($errors->has('alamat'))
                                        <p class="text-yellow-500 text-xs italic m-1">{{ $errors->first('alamat') }}</p>
                                    @endif
                                </div>
                                <div class="relative">
                                    <button type="submit" onclick="modalShow()" class="text-white bg-emerald-500 bg-opacity-50 hover:bg-opacity-60 focus:text-white focus:ring-4 focus:outline-none font-medium rounded-md text-sm w-full px-5 py-2.5 text-center border border-teal-900">Masuk</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="flex w-full mt-2 font-medium">
                    <div class="bg-black bg-opacity-75 py-5 px-8 rounded-md w-full justify-center flex">
                        <div class="">
                            <h1 class="text-amber-400 text-3xl text-center mb-4">{{ $tamu_kemarin->count() }}</h1>
                        </div>
                        <p class="text-sm text-amber-400 absolute bottom-0 mb-2 text-center">Tamu Kemarin</p>
                    </div>
                    <div class="bg-black bg-opacity-75 py-5 px-8 rounded-md w-full mx-2 justify-center flex">
                        <p class="text-sm text-amber-400 absolute bottom-0 mb-2 text-center">Tamu Hari Ini</p>
                        <div class="">
                            <h1 class="text-amber-400 text-3xl text-center mb-4">{{ $tamu_today->count() }}</h1>
                        </div>
                    </div>
                    <div class="bg-black bg-opacity-75 py-5 px-8 rounded-md w-full justify-center flex">
                        <div class="">
                            <h1 class="text-amber-400 text-3xl text-center mb-4">{{ $tamu_all->count() }}</h1>
                        </div>
                        <p class="text-sm text-amber-400 absolute bottom-0 mb-2 text-center">Total Tamu</p>
                    </div>
                </div>
            </div>
            <div id="modal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
                <div class="bg-white rounded-md w-3/12 flex flex-col justify-center items-center">
                    <div class="w-full border-b px-8 py-4 text-center">
                        <h2 class="text-lg font-bold">Selamat Menikmati!</h2>
                    </div>
                    <div class="flex p-6">
                        <video autoplay loop muted class="w-8/12">
                            <source src="{{ asset('Rpl.mp4') }}" type="video/mp4" />
                        </video>
                        <div class="flex justify-center items-center flex-col">
                            <p class="text-sm text-gray-700 mb-4">Terima kasih telah bergabung dengan kami.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('footer')
<footer class="absolute bottom-0 w-full flex justify-center bg-black bg-opacity-25">
    <p class="text-amber-400 text-opacity-75 text-sm md:text-md">©2023 Rekayasa Perangkat Lunak. All Rights Reserved.</p>
</footer>
@endsection