@extends('admin.dashboard')

@section('container')
    <div class="px-5 py-4 border border-slate-800 rounded-sm bg-opacity-30 bg-slate-700 inline-block">
        <h1 class="text-xl font-medium mb-2">Create Categories</h1>
        <form action="/dashboard/categories/store" method="post" class="flex flex-col gap-2">
            @csrf
            <div>
                <input type="text" name="name" placeholder="Category Name" class="w-80 px-2 py-1 rounded-sm bg-slate-700"
                    value="{{ old('name') }}" required autocomplete="off">
                @error('name')
                    <p class="text-red-600 italic">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <input type="text" name="slug" placeholder="Slug" class="w-80 px-2 py-1 rounded-sm bg-slate-700"
                    value="{{ old('slug') }}" required autocomplete="off">
                @error('slug')
                    <p class="text-red-600 italic">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <button type="submit"
                    class="px-4 py-1 bg-blue-700 hover:bg-blue-800 active:bg-blue-900 rounded-sm">Save</button>
            </div>
        </form>
    </div>
@endsection
