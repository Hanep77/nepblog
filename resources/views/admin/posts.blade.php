@extends('admin.dashboard')

@section('container')
    <h1 class="text-xl font-medium">Posts</h1>

    <div class="border border-slate-700 inline-block rounded mt-5">
        <table class="table-auto">
            <thead>
                <tr class="bg-opacity-30 bg-slate-700 text-left">
                    <th class="px-4 py-2">no</th>
                    <th class="px-4 py-2">title</th>
                    <th class="px-4 py-2">category</th>
                    <th class="px-4 py-2">action</th>
                </tr>
            </thead>
            @foreach ($posts as $post)
                <tr class="border-t border-slate-700">
                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2">{{ $post->title }}</td>
                    <td class="px-4 py-2">{{ $post->category->name }}</td>
                    <td class="px-4 py-2 flex gap-1">
                        <a href="/posts/{{ $post->slug }}"
                            class="px-2 py-1 border border-blue-700 hover:bg-blue-800 active:bg-blue-900 text-blue-800 hover:text-white rounded"><i
                                class="fa-solid fa-eye"></i></a>
                        <a href="/dashboard/posts/edit"
                            class="px-2 py-1 border border-yellow-700 hover:bg-yellow-800 active:bg-yellow-900 text-yellow-800 hover:text-white rounded"><i
                                class="fa-solid fa-pen-to-square"></i></a>
                        <form action="/dashboard/posts/delete{{ $post->slug }}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit"
                                class="px-2 py-1 border border-red-700 hover:bg-red-800 active:bg-red-900 text-red-800 hover:text-white rounded"><i
                                    class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
