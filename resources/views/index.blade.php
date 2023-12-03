@extends('layouts.main')

@section('container')
    <div class="hidden lg:grid grid-cols-2 h-96 gap-2 mt-8">
        <div class="bg-slate-700 bg-opacity-30 border border-slate-800"></div>
        <div class="grid grid-cols-2 gap-2">
            <div class="bg-slate-700 bg-opacity-30 border border-slate-800"></div>
            <div class="bg-slate-700 bg-opacity-30 border border-slate-800"></div>
            <div class="bg-slate-700 bg-opacity-30 border border-slate-800"></div>
            <div class="bg-slate-700 bg-opacity-30 border border-slate-800"></div>
        </div>
    </div>

    <div class="mt-5 px-4 md:px-0">
        <h2 class="text-lg">Semua Artikel</h2>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4 my-3">
            @foreach ($posts as $post)
                <a href="/posts/{{ $post->slug }}">
                    <div class="border border-slate-800 h-96 rounded-sm bg-opacity-30 bg-slate-700">
                        <div class="bg-stone-950 h-3/5 flex justify-center items-center">ceritanya disini ada gambar
                        </div>
                        <div class="p-3">
                            <h3 class="text-xl font-semibold">{{ $post->title }}</h3>
                            <p class="text-slate-400">{{ $post->excerpt }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
