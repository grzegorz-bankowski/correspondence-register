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
                                    <a href="../outgoing/browse" class="rounded-md bg-gray-700 px-3 py-2 text-sm font-medium text-white" aria-current="page">Browse outgoing post</a>
                                @if (Auth()->user()->admin == 'yes')
                                    <a href="../user/add" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Add user</a>
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
                        <a href="../outgoing/browse" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white" aria-current="page">Browse outgoing post</a>
                        @if (Auth()->user()->admin == 'yes')
                        <a href="../user/add" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Add user</a>
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
            <section class="antialiased bg-gray-100 text-gray-600  px-4 pt-10">
                <div class="flex flex-col justify-center">
                    <div class="w-full mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
                        <header class="px-5 py-5 border-b border-gray-100">
                            <h1 class="font-semibold text-indigo-600">Browse outgoing letters</h1>
                        </header>
                        <div class="p-3">
                            <div class="overflow-x-auto">
                                <table class="table-auto w-full">
                                    <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                        <tr>
                                            <th class="p-2 w-12 whitespace-nowrap">
                                                <div class="font-semibold text-center">#</div>
                                            </th>
                                            <th class="p-2 whitespace-nowrap">
                                                <div class="font-semibold text-center">Date of dispatch</div>
                                            </th>
                                            <th class="p-2 whitespace-nowrap">
                                                <div class="font-semibold text-center">Letter number</div>
                                            </th>
                                            <th class="p-2 whitespace-nowrap">
                                                <div class="font-semibold text-center">Recipient's name</div>
                                            </th>
                                            <th class="p-2 whitespace-nowrap">
                                                <div class="font-semibold text-center">Recipient's address</div>
                                            </th>
                                        @if (Auth()->user()->admin == 'yes')
                                            <th class="p-2 whitespace-nowrap">
                                                <div class="font-semibold text-center">Action</div>
                                            </th>
                                        @endif
                                        </tr>
                                    </thead>
                                    <tbody class="text-sm divide-y divide-gray-100">
                                    @foreach($letters as $letter)
                                        <tr>
                                            <td class="p-2 whitespace-nowrap">
                                                    <div class="font-medium text-center text-gray-800">{{ $letter->id }}</div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-center">{{ $letter->date }}</div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-center font-medium text-green-500">{{ $letter->number }}</div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-lg text-center">{{ $letter->recipient }}</div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-center font-medium text-blue-500">{{ $letter->street }} <br>{{ $letter->code }} {{ $letter->city }}<br>{{ $letter->country }}</div>
                                            </td>
                                        @if (Auth()->user()->admin == 'yes')
                                            <th class="p-2 whitespace-nowrap">
                                                <div class="text-center px-2 py-2">
                                                    <a href="/outgoing/edit/{{ $letter->id }}" class="rounded-md px-2 py-1 text-base font-normal text-white bg-orange-500 hover:bg-orange-700">Edit</a>
                                                </div>
                                                </form>
                                                <form action="/outgoing/delete/{{ $letter->id }}" method="post">
                                                    @csrf
                                                    {{ method_field('delete') }}
                                                    <div class="text-center px-2 py-2">
                                                        <button type="submit" class="rounded-md px-2 py-1 text-base font-normal text-white bg-red-500 hover:bg-red-700">Delete</button>
                                                    </div>
                                                </form>
                                            </th>
                                        @endif
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="pt-10 pb-10">
                            {{ $letters->links() }}
                    </div>
                </div>
            </section>
            </main>
        </div>
    </div>
</body>
</html>
