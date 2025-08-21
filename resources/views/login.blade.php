<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-white">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Correspondence Register</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="h-full">
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto w-auto" src="{{ url('img/envelope.jpg') }}" alt="Correspondence register">
            <h1 class="mt-10 text-[#4f46e5] text-center text-2xl/9 font-bold tracking-tight ">Correspondence register</h1>
            @if (Session::get('denied'))
                <div class="bg-red-100 border-t border-b border-red-500 text-red-700 px-4 py-3 mt-10" role="alert">
                    <p class="font-bold">Access denied!</p>
                    <p class="text-sm">{{ Session::get('denied') }}</p>
                </div>
            @endif
            @if (Session::get('message'))
                <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3 mt-10" role="alert">
                    <p class="font-bold">Good job!</p>
                    <p class="text-sm">{{ Session::get('message') }}</p>
                </div>
            @endif
            @if ($errors->has('message'))
                <div class="bg-red-100 border-t border-b border-red-500 text-red-700 px-4 py-3 mt-10" role="alert">
                    <p class="font-bold">Errors occurred!</p>
                    <p class="text-sm">{{ $errors->first('message') }}</p>
                </div>
            @endif
    </div>
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" action="{{url('login')}}" method="POST">
        {{ csrf_field() }}
            <div>
            @if ($errors->has('email'))
                <span class="error" style="color:red">{{ $errors->first('email') }}</span>
            @endif
            <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
                <div class="mt-2">
                    <input id="email" name="email" type="email" value="" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                </div>
            </div>

            <div>
            @if ($errors->has('password'))
                <span class="error" style="color:red">{{ $errors->first('password') }}</span>
            @endif
                <div class="flex items-center justify-between">
                    <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
                        <div class="text-sm">
                            <a href="./forget" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
                        </div>
                </div>
                <div class="mt-2">
                    <input id="password" name="password" type="password" value="" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                </div>
            </div>

            <div>
                <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
            </div>
        </form>
        <p class="mt-10 text-center text-sm/6 text-gray-500">
            Not a member?
            <a href="./account" class="font-semibold text-indigo-600 hover:text-indigo-500">Create new account</a>
        </p>
    </div>
</div>
</body>
</html>
