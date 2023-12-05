<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NepBlog | Login</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gradient-to-r from-stone-950 to-slate-950 text-slate-200 h-screen flex justify-center items-center">

    <div class="w-80 bg-slate-700 bg-opacity-30 p-4 rounded-sm border border-slate-800">
        <h2 class="text-center text-lg font-semibold">Login</h2>
        <form action="/attempt" method="post">
            @csrf
            <div class="flex flex-col gap-1 mt-2">
                <label for="email">Email</label>
                <input type="email" name="email" id="email"
                    class="h-9 px-2 rounded-sm outline-none focus:outline-white outline-1 text-slate-800"
                    placeholder="example@example.com" required>
            </div>
            <div class="flex flex-col gap-1 mt-2">
                <label for="password">Password</label>
                <input type="password" name="password" id="password"
                    class="h-9 px-2 rounded-sm outline-none focus:outline-white outline-1 m-0 text-slate-800"
                    placeholder="Password" required>
            </div>
            <div class="mt-4">
                <button class="h-9 bg-green-600 w-full rounded-sm hover:bg-green-700 active:bg-green-800">login</button>
            </div>
        </form>
    </div>

</body>

</html>
