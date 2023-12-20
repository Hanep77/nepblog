@extends('admin.dashboard')

@section('container')
    <h1 class="text-xl font-medium">categories</h1>

    @if (session()->has('success'))
        <div class="bg-teal-100 border-t-4 w-96 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md mt-2"
            role="alert">
            <div class="flex">
                <div class="py-1"><i class="fa-regular fa-circle-check text-3xl pr-2"></i></div>
                <div>
                    <div class="font-bold">Success</div>
                    <p>{{ session()->get('success') }}</p>
                </div>
            </div>
        </div>
    @endif

    <div class="border border-slate-700 inline-block rounded mt-5">
        <table class="table-auto">
            <thead>
                <tr class="bg-opacity-30 bg-slate-700 text-left">
                    <th class="px-4 py-2">name</th>
                    <th class="px-4 py-2">slug</th>
                    <th class="px-4 py-2">action</th>
                </tr>
            </thead>
            @foreach ($categories as $category)
                <tr class="border-t border-slate-700">
                    <td class="px-4 py-2">{{ $category->name }}</td>
                    <td class="px-4 py-2">{{ $category->slug }}</td>
                    <td class="px-4 py-2">
                        <form action="/dashboard/categories/{{ $category->slug }}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit"
                                class="px-2 py-1 bg-red-700 hover:bg-red-800 active:bg-red-900 rounded"><i
                                    class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
