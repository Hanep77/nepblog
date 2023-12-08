@extends('admin.dashboard')

@section('container')
    <div class="px-5 py-4 border border-slate-800 rounded-sm bg-opacity-30 bg-slate-700 inline-block">
        <h1 class="text-xl font-medium mb-2">Add new user</h1>
        <form action="/dashboard/auth/store" method="post" class="flex flex-col gap-2">
            @csrf
            <div>
                @error('name')
                    <div class="px-2 py-1 border border-slate-800 rounded-sm bg-opacity-30 bg-red-500 text-red-300 italic mb-2">
                        <p>{{ $message }}</p>
                    </div>
                @enderror
                <input type="text" name="name" placeholder="Name" class="w-80 px-2 py-1 rounded-sm bg-slate-700"
                    value="{{ old('name') }}" required autocomplete="off">
            </div>
            <div>
                @error('email')
                    <div class="px-2 py-1 border border-slate-800 rounded-sm bg-opacity-30 bg-red-500 text-red-300 italic mb-2">
                        <p>{{ $message }}</p>
                    </div>
                @enderror
                <input type="email" name="email" placeholder="Email" class="w-80 px-2 py-1 rounded-sm bg-slate-700"
                    value="{{ old('email') }}" required autocomplete="off">
            </div>
            <div>
                @error('password')
                    <div class="px-2 py-1 border border-slate-800 rounded-sm bg-opacity-30 bg-red-500 text-red-300 italic mb-2">
                        <p>{{ $message }}</p>
                    </div>
                @enderror
                <input type="text" name="password" placeholder="Password" class="w-80 px-2 py-1 rounded-sm bg-slate-700"
                    required autocomplete="off">
            </div>
            <div>
                <button type="submit"
                    class="px-4 py-1 bg-blue-700 hover:bg-blue-800 active:bg-blue-900 rounded-sm">Save</button>
            </div>
        </form>
    </div>
@endsection
