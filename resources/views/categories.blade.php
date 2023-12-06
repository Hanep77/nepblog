@extends('layouts.main')

@section('container')
    <h2 class="text-3xl font-medium my-5 ">Semua Kategori</h2>

    <ul class="text-xl">
        @foreach ($categories as $category)
            <li><a class="text-slate-300 hover:text-slate-200 active:text-white"
                    href="/posts/categories/{{ $category->slug }}">-
                    {{ $category->name }}</a></li>
        @endforeach
    </ul>
@endsection
