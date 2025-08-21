<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-white">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Correspondence Register</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="h-full max-w-7xl my-0 mx-auto">
    <div class="flex min-h-full flex-col justify-center">
        <div class="sm:mx-auto sm:w-full">
        <nav class="bg-gray-800">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 max-[921px]:hidden">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="hidden md:block">
                            <div class="ml-1 flex items-baseline space-x-4">
                                <a href="../incoming/add" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Add incoming post</a>
                                <a href="../incoming/browse" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Browse incoming post</a>
                                <a href="../outgoing/add" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Add outgoing post</a>
                                <a href="../outgoing/browse" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Browse outgoing post</a>
                            @if (Auth()->user()->admin == 'yes')
                                <a href="../user/add" class="rounded-md bg-gray-700 px-3 py-2 text-sm font-medium text-white" aria-current="page">Add user</a>
                            @endif
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6">
                            <div class="relative ml-3">
                                <div>
                                    <span class="text-[#FFD700]">Hi {{ ucfirst(Auth()->user()->name) }}</span>
                                @if (Auth()->user()->admin == 'yes')
                                    <span class="text-orange-500">(Admin)</span>
                                @endif
                                <br>
                                </div>
                            </div>
                            <div class="relative ml-3">
                                <div>
                                    <a href="../logout" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Log out</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="min-[921px]:hidden" id="mobile-menu">
                <div class="space-y-1 px-2 pt-2 pb-3 text-center">
                <span class="text-[#FFD700]">Hi {{ ucfirst(Auth()->user()->name) }}</span>
                @if (Auth()->user()->admin == 'yes')
                    <span class="text-orange-500">(Admin)</span>
                @endif
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <a href="../incoming/add" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Add incoming post</a>
                    <a href="../incoming/browse" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Browse incoming post</a>
                    <a href="../outgoing/add" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Add outgoing post</a>
                    <a href="../outgoing/browse" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Browse outgoing post</a>
                    @if (Auth()->user()->admin == 'yes')
                    <a href="../user/add" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white" aria-current="page">Add user</a>
                    @endif
                    <a href="../logout" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Log out</a>
                </div>
            </div>
        </nav>
        <main>
        @if (Session::get('info'))
            <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
                <p class="font-bold">Hey {{ ucfirst(Auth()->user()->name) }}!</p>
                <p class="text-sm">{{ Session::get('info') }}</p>
            </div>
        @endif
        @if (Session::get('message'))
            <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
                <p class="font-bold">Good job!</p>
                <p class="text-sm">{{ Session::get('message') }}</p>
            </div>
        @endif
        @if (Session::get('denied'))
            <div class="bg-red-100 border-t border-b border-red-500 text-red-700 px-4 py-3" role="alert">
                <p class="font-bold">Access denied!</p>
                <p class="text-sm">{{ Session::get('denied') }}</p>
            </div>
        @endif
        <section class="antialiased bg-gray-100 text-gray-600 px-4 pt-10 pb-10">
        <form action="{{url('user/store')}}" method="POST">
        {{ csrf_field() }}
            <div class="flex flex-col justify-center">
                <div class="w-full mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
                    <header class="px-5 py-5 border-b border-gray-100">
                        <h1 class="font-semibold text-indigo-600">Add new user</h1>
                    </header>
                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 px-5 py-5">

                        <div class="sm:col-span-2">
                        <label for="name" class="block text-sm/6 font-medium text-gray-900">User name</label>
                            <div class="mt-2">
                                <input type="text" name="name" id="name" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                            </div>
                            @if ($errors->has('name'))
                                <span class="error" style="color:red">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="sm:col-span-2">
                        <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
                            <div class="mt-2">
                                <input type="text" name="email" id="email" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                            </div>
                            @if ($errors->has('email'))
                                <span class="error" style="color:red">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="sm:col-span-2">
                        <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
                            <div class="mt-2">
                                <input id="sender" name="password" type="password" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                            </div>
                            @if ($errors->has('password'))
                                <span class="error" style="color:red">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <div class="sm:col-span-2">
                        <label for="admin" class="block text-sm/6 font-medium text-gray-900">Admin</label>
                            <div class="mt-2">
                                <select id="admin" name="admin" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                    <option value="no" selected>No</option>
                                    <option value="yes">yes</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 flex items-center justify-center gap-x-6 pb-6">
                        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add user</button>
                    </div>
                </div>
            </div>
        </form>
        </section>
        </main>
        </div>
    </div>
</body>
</html>
