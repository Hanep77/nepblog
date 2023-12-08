@extends('admin.dashboard')

@section('container')
    <h1 class="text-xl font-medium">users</h1>

    <div class="border border-slate-700 inline-block rounded mt-5">
        <table class="table-auto">
            <thead>
                <tr class="bg-opacity-30 bg-slate-700 text-left">
                    <th class="px-4 py-2">name</th>
                    <th class="px-4 py-2">email</th>
                    <th class="px-4 py-2">action</th>
                </tr>
            </thead>
            @foreach ($users as $user)
                <tr class="border-t border-slate-700">
                    <td class="px-4 py-2">{{ $user->name }}</td>
                    <td class="px-4 py-2">{{ $user->email }}</td>
                    <td class="px-4 py-2">
                        <form action="/dashboard/auth/delete/{{ $user->id }}" method="post">
                            @method('delete')
                            @csrf
                            @if ($user->id == auth()->user()->id)
                                <button type="button" class="px-2 py-1 bg-red-900 rounded cursor-default"><i
                                        class="fa-solid fa-trash" disabled></i></button>
                            @else
                                <button type="submit"
                                    class="px-2 py-1 bg-red-700 hover:bg-red-800 active:bg-red-900 rounded"><i
                                        class="fa-solid fa-trash"></i></button>
                            @endif
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
