@extends('app')

@section('content')
<section class="bg-white">
    <div class="relative h-screen flex justify-center p-5 overflow-hidden">
        <div class="w-9/12">
            <div class="w-full bg-blue-600 px-6 py-3 rounded-t-sm flex justify-between">
                <h1 class="text-3xl text-white font-medium">List Tamu</h1>
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
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="flex text-blue-500 mt-2 justify-between">
                <div class="flex">
                    <p class="pr-12">Tamu Hari Ini</p> <p>: {{ $tamu_today->count() }}</p>
                </div>
                <a href="list">
                    <p class="text-3xl">←</p>
                </a>
            </div>
            <div class="mt-5">
                {{ $data->links('components/pagination-custom') }}
            </div>
        </div>
    </div>
</section>
@endsection