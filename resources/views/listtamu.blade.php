@extends('app')

@section('content')
<section class="bg-white">
    <div class="relative h-screen flex justify-center p-5 overflow-hidden">
        <div class="w-2/12 mr-5">
            <div class="w-full bg-blue-600 p-3 text-white">Hari</div>
            <div class="border border-blue-500">
                <ul>
                    <a href="list/hari/thursday">
                        <li class="p-3 border-b">
                            Thursday
                        </li>
                    </a>
                    <a href="list/hari/friday">
                        <li class="p-3 border-b">
                            Friday
                        </li>
                    </a>
                    <a href="list/hari/saturday">
                        <li class="p-3 border-b">
                            Saturday
                        </li>
                    </a>
                </ul>
            </div>
            <button class="text-lg mt-2">
                <a href="{{ route('logoutaksi') }}">
                    < Logout
                </a>
            </button>   
        </div>
        <div class="w-9/12">
            <div class="w-full bg-blue-600 px-6 py-3 rounded-t-sm flex justify-between">
                <h1 class="text-3xl text-white font-medium">List Tamu</h1>
                <form action="cari" method="GET">
                    <div class="flex">
                        <div class="flex">
                            <input type="text" class="block p-2.5 w-11/12 z-20 text-sm text-gray-900 bg-gray-50 rounded-l-sm outline-none pr-16" placeholder="Cari Nama" name="nama" value="{{ old('cari') ?? (session('error') ? '' : null) }}">
                            <button type="submit" class="p-2.5 text-sm font-medium text-white bg-white rounded-r-sm border border-transparent border-l-blue-700 focus:outline-none px-4">
                                <i class="fa-solid fa-magnifying-glass text-black"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="rounded-b-sm border border-blue-600">
                <table class="w-full text-sm text-left text-gray-500 bg-transparent">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b-2">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nama Tamu
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Alamat/Instansi
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Hari
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $d)
                        <tr class="border-b">
                            <td class="px-6 py-4 w-6/12">
                                {{ $d->nama }}
                            </td>
                            <td class="px-6 py-4 w-6/12">
                                {{ $d->alamat }}
                            </td>
                            <td class="px-6 py-4 w-6/12">
                                {{ $d->hari }}
                            </td>
                            <td class="px-6 py-4 w-6/12">
                                <a href="list/hapus/{{ $d->id }}" class="text-red-600 text-sm">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="flex text-blue-500 mt-2">
                <p class="pr-10">Tamu Kemarin</p> <p>: {{ $tamu_kemarin->count() }}</p>
            </div>
            <div class="flex text-blue-500">
                <p class="pr-12">Tamu Hari Ini</p> <p>: {{ $tamu_today->count() }}</p>
            </div>
            <div class="flex text-blue-500">
                <p class="pr-6">Tamu Total Tamu</p> <p>: {{ $tamu_all->count() }}</p>
            </div>
            <div class="mt-5">
                {{ $data->links('components/pagination-custom') }}
            </div>
        </div>
    </div>
</section>
@endsection