@extends('admin.dashboard')

@section('container')
    <h1 class="text-xl font-medium">categories</h1>

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
