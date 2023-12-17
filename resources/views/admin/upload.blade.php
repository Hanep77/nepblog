@extends('admin.dashboard')

@section('container')
    <h2 class="text-2xl font-semibold mb-5">Create new post</h2>

    <form action="/dashboard/posts/store" method="post" enctype="multipart/form-data">
        @csrf
        <div class="w-96">
            <input type="text" name="title"
                class="w-full h-8 rounded bg-slate-700 bg-opacity-30 border border-slate-800 px-2" placeholder="Title"
                id="title" required>
        </div>
        <div class="w-96 mt-3">
            <input type="text" name="slug"
                class="w-full h-8 rounded bg-slate-700 bg-opacity-30 border border-slate-800 px-2" placeholder="Slug"
                id="slug" required>
        </div>
        <div class="w-96 mt-3">
            <select name="category_id" class="w-full h-8 rounded bg-slate-700 bg-opacity-30 border border-slate-800 pr-2"
                required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" class="bg-slate-800">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="w-96 mt-3">
            <input type="file" name="image"
                class="w-full h-8 rounded bg-slate-700 bg-opacity-30 border border-slate-800 pr-2">
        </div>
        <div class="mt-3 w-[768px] text-lg text-white">
            <input id="x" type="hidden" name="content" required>
            <trix-editor input="x" class="bg-slate-700 bg-opacity-30 border border-slate-800 h-60 overflow-auto">
            </trix-editor>
        </div>
        <div class="mt-3">
            <button type="submit" class="py-1 px-4 bg-green-600 hover:bg-green-700 rounded">Save</button>
        </div>
    </form>
@endsection
