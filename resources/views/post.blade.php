@extends('layouts.main')

@section('container')
    <div class="md:w-[768px] bg-slate-700 bg-opacity-30 border border-slate-800 mx-auto p-4 text-lg">
        <h5 class="font-medium text-slate-400">Category : <a
                href="/posts/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></h5>
        <h2 class="text-4xl font-medium my-4">{{ $post->title }}
        </h2>
        <small class="text-slate-400"><span class="text-blue-400">{{ $post->user->name }}</span> -
            {{ $post->created_at->format('l, j F Y | H:i') }} WIB</small>
        <div class="bg-stone-950 h-80 mb-4 mt-2 flex justify-center items-center">ceritanya disini ada gambar
        </div>
        <div class="text-slate-300 flex flex-col gap-4">
            {!! $post->content !!}
        </div>
    </div>
@endsection
