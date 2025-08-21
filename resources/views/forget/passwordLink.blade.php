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
            <h1 class="mt-10 text-[#4f46e5] text-center text-2xl/9 font-bold tracking-tight ">Change your password</h1>
        </div>
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="{{ url('reset-password') }}" method="POST">
            @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                @if (Session::has('error'))
                    <div class="error" style="color:red">
                        {{ Session::get('error') }}
                    </div>
                @endif
                <div class="sm:col-span-2">
                <label for="email_address" class="col-md-4 col-form-label text-md-right">Email Address</label>
                    <div class="mt-2">
                        <input type="text" id="email_address" value="{{ old('email') }}" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" name="email" required autofocus>
                    @if ($errors->has('email'))
                        <span class="error" style="color:red">{{ $errors->first('email') }}</span>
                    @endif
                    </div>
                </div>

                <div class="sm:col-span-2">
                <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
                    <div class="mt-2">
                        <input type="password" id="password" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" name="password" required autofocus>
                    @if ($errors->has('password'))
                        <span class="error" style="color:red">{{ $errors->first('password') }}</span>
                    @endif
                    </div>
                </div>

                <div class="sm:col-span-2">
                <label for="password-confirm" class="block text-sm/6 font-medium text-gray-900">Confirm Password</label>
                    <div class="mt-2">
                    <input type="password" id="password-confirm" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" name="password_confirmation" required autofocus>
                    @if ($errors->has('password_confirmation'))
                        <span class="error" style="color:red">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-center gap-x-6 pb-6">
                    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                      	Reset Password
                    </button>
                </div>
            </form>
            <p class="mt-10 text-center text-sm/6 text-gray-500">
                Not a member?
                <a href="./create" class="font-semibold text-indigo-600 hover:text-indigo-500">Create new account</a>
            </p>
            <p class="mt-10 text-center text-sm/6 text-gray-500">
                Would you like to log in?
                <a href="./" class="font-semibold text-indigo-600 hover:text-indigo-500">Log in</a>
            </p>
        </div>
    </div>
</body>
</html>
