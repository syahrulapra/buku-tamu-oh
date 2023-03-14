@extends('app')

@section('content')
    <section>
        <div class="flex flex-col items-center justify-center h-screen overflow-hidden relative">
            <video autoplay loop muted class="w-screen absolute">
                <source src="{{ asset('Comp 1.mp4') }}" type="video/mp4" />
            </video>
            <img src="{{ asset('../image/2.png') }}" alt="" draggable="false" class="relative mb-96 w-8/12 bottom-8">
            <div class="w-4/12 rounded-lg shadow absolute mt-20">
                <div class="space-y-0">
                    <form action="/tambah" method="POST">
                        @csrf
                        <div class="py-10 px-8 bg-black bg-opacity-75 rounded-md">
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