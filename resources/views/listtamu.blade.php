@extends('app')

@section('content')
<div class="relative w-full flex items-center justify-center flex-col p-5 overflow-hidde">
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
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="my-4 mx-52">
    {{ $data->links('components/pagination-custom') }}
</div>
@endsection