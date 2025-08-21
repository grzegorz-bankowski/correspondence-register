@php
include(app_path() . '/countries.php');
@endphp
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
                            <div class="md:block">
                                <div class="ml-1 flex items-baseline space-x-4">
                                    <a href="/incoming/add" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Add incoming post</a>
                                    <a href="/incoming/browse" class="rounded-md bg-gray-700 px-3 py-2 text-sm font-medium text-white" aria-current="page">Browse incoming post</a>
                                    <a href="/outgoing/add" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Add outgoing post</a>
                                    <a href="/outgoing/browse" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Browse outgoing post</a>
                                @if (Auth()->user()->admin == 'yes')
                                    <a href="/user/add" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Add user</a>
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
                                    </div>
                                </div>
                                <div class="relative ml-3">
                                    <div>
                                        <a href="/logout" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Log out</a>
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
                        <a href="/incoming/add" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Add incoming post</a>
                        <a href="/incoming/browse" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white" aria-current="page">Browse incoming post</a>
                        <a href="/outgoing/add" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Add outgoing post</a>
                        <a href="/outgoing/browse" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Browse outgoing post</a>
                        @if (Auth()->user()->admin == 'yes')
                        <a href="/user/add" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Add user</a>
                        @endif
                        <a href="/logout" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Log out</a>
                    </div>
                </div>
            </nav>
            <main>
            @if (Session::get('info'))
                <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
                    <p class="font-bold">Hey {{ ucfirst(Auth()->user()->name) }}!</p>
                    <p class="text-sm">{{ Session::get('message') }}</p>
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
            <form action="{{ url('../incoming/update', $letter->id) }}" method="post">
            @csrf
            {{ method_field('put') }}
            <section class="antialiased bg-gray-100 text-gray-600 px-4 pt-10 pb-10">
                <div class="flex flex-col justify-center">
                    <div class="w-full mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
                        <header class="px-5 py-5 border-b border-gray-100">
                            <h1 class="font-semibold text-indigo-600">Edit incoming post <span class="text-gray-400">#{{ $letter->id }}</span></h1>
                        </header>
                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 px-5 py-5">

                        <div class="sm:col-span-2">
                        <label for="date" class="block text-sm/6 font-medium text-gray-900">Date of receipt:</label>
                            <div class="mt-2">
                                <input type="date" name="date" id="date" value="{{ $letter->date }}" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                            </div>
                            @if ($errors->has('date'))
                                <span class="error" style="color:red">{{ $errors->first('date') }}</span>
                            @endif
                        </div>

                        <div class="sm:col-span-2">
                        <label for="number" class="block text-sm/6 font-medium text-gray-900">Letter number:</label>
                            <div class="mt-2">
                                <input type="text" name="number" id="number" value="{{ $letter->number }}" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                            </div>
                            @if ($errors->has('number'))
                                <span class="error" style="color:red">{{ $errors->first('number') }}</span>
                            @endif
                        </div>

                        <div class="sm:col-span-2">
                        <label for="sender" class="block text-sm/6 font-medium text-gray-900">Sender's name:</label>
                            <div class="mt-2">
                                <input id="sender" name="sender" type="text" value="{{ $letter->sender }}" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                            </div>
                            @if ($errors->has('sender'))
                                <span class="error" style="color:red">{{ $errors->first('sender') }}</span>
                            @endif
                        </div>

                        <div class="sm:col-span-2">
                        <label for="street" class="block text-sm/6 font-medium text-gray-900">Street adress:</label>
                            <div class="mt-2">
                                <input id="street" name="street" type="text" value="{{ $letter->street }}" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                            </div>
                            @if ($errors->has('street'))
                                <span class="error" style="color:red">{{ $errors->first('street') }}</span>
                            @endif
                        </div>

                        <div class="sm:col-span-2">
                        <label for="city" class="block text-sm/6 font-medium text-gray-900">City:</label>
                            <div class="mt-2">
                                <input id="city" name="city" type="text" value="{{ $letter->city }}" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                            </div>
                            @if ($errors->has('city'))
                                <span class="error" style="color:red">{{ $errors->first('city') }}</span>
                            @endif
                        </div>

                        <div class="sm:col-span-2">
                        <label for="code" class="block text-sm/6 font-medium text-gray-900">Postal code</label>
                            <div class="mt-2">
                                <input type="text" name="code" id="code" value="{{ $letter->code }}" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                            </div>
                            @if ($errors->has('code'))
                                <span class="error" style="color:red">{{ $errors->first('code') }}</span>
                            @endif
                        </div>

                        <div class="sm:col-span-2">
                        <label for="country" class="block text-sm/6 font-medium text-gray-900">Country</label>
                            <div class="mt-2 grid grid-cols-1">
                                <select id="country" name="country" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                @php
                                $country = '';
                                    foreach($countries as $country) {
                                        if ($country == $letter->country) {
                                            echo "<option value=$country selected>$country</option>";
                                        } else {
                                            echo "<option value=$country>$country</option>";
                                        }

                                    }
                                @endphp
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 flex items-center justify-center gap-x-6 pb-6">
                        <a href="../browse" class="rounded-md px-3 py-2 text-sm font-semibold text-white bg-red-500 hover:bg-red-700">Back</a>
                        <button type="submit" class="rounded-md bg-orange-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-orange-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update letter</button>
                    </div>
                </div>
            </div>
            </section>
            </form>
            </main>
        </div>
    </div>
</body>
</html>
