<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document | {{ $title }}</title>
    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/5b8ff677c4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
    <link rel="stylesheet" href="/css/dashboard.css">
</head>

<body class="bg-gradient-to-r from-stone-950 to-slate-950 text-slate-200">

    <main class="min-h-screen">
        <div
            class="w-72 bg-slate-700 bg-opacity-30 border border-slate-800 h-[calc(100vh-32px)] m-4 rounded-md fixed overflow-y-auto">
            <div class="border-b border-slate-700 py-6">
                <h1 class="text-xl font-bold text-center">NepBlog Dashboard</h1>
            </div>
            <ul class="my-4 px-4 flex-col text-slate-300">
                <li @class([
                    'rounded mt-1 hover:bg-slate-700',
                    'bg-blue-800 hover:bg-blue-800' => $title == 'Home',
                ])>
                    <a href="/dashboard" class="block p-3"><i class="fa-solid fa-house mr-2"></i>Dashboard</a>
                </li>
                <li @class([
                    'rounded mt-1 hover:bg-slate-700',
                    'bg-blue-800 hover:bg-blue-800' => $title == 'Posts',
                ])>
                    <a href="/dashboard/posts" class="block p-3"><i class="fa-solid fa-table mr-2"></i> Posts</a>
                </li>
                <li @class([
                    'rounded mt-1 hover:bg-slate-700',
                    'bg-blue-800 hover:bg-blue-800' => $title == 'Upload',
                ])>
                    <a href="/dashboard/posts/create" class="block p-3"><i class="fa-regular fa-square-plus mr-2"></i>
                        Create
                        Posts</a>
                </li>
                <li @class([
                    'rounded mt-1 hover:bg-slate-700',
                    'bg-blue-800 hover:bg-blue-800' => $title == 'Categories',
                ])>
                    <a href="/dashboard/categories" class="block p-3"><i class="fa-solid fa-layer-group mr-2"></i></i>
                        Categories</a>
                </li>
                <li @class([
                    'rounded mt-1 hover:bg-slate-700',
                    'bg-blue-800 hover:bg-blue-800' => $title == 'Create Category',
                ])>
                    <a href="/dashboard/categories/create" class="block p-3"><i
                            class="fa-regular fa-square-plus mr-2"></i> Create
                        Category</a>
                </li>
            </ul>

            <h3 class="ml-8 text-lg font-semibold">Auth</h3>

            <ul class="my-4 px-4 flex-col text-slate-300">

                <li @class([
                    'rounded mt-1 hover:bg-slate-700',
                    'bg-blue-800 hover:bg-blue-800' => $title == 'Profile',
                ])>
                    <a href="/dashboard/users" class="block p-3"><i class="fa-solid fa-user mr-2"></i> Users</a>
                </li>
                <li @class([
                    'rounded mt-1 hover:bg-slate-700',
                    'bg-blue-800 hover:bg-blue-800' => $title == 'Register',
                ])>
                    <a href="/dashboard/register" class="block p-3"><i class="fa-solid fa-user-plus mr-2"></i> Add
                        User</a>
                </li>
                <li class="hover:bg-slate-700 rounded mt-1">
                    <form action="/logout" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit" class="w-full text-start p-3"><i
                                class="fa-solid fa-right-from-bracket mr-2"></i>
                            Sign Out</button>
                    </form>
                </li>
            </ul>
        </div>
        <div class="ml-80 p-4">
            @yield('container')
        </div>
    </main>

    <script src="/js/dashboard.js"></script>

</body>

</html>
