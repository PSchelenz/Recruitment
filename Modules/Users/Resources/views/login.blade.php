<x-layout>
    <x-slot name="title">
        <title>Login</title>
    </x-slot>
    <div class="flex justify-center pt-4 mt-10">
        <div class="max-w-md w-full p-10 border rounded-xl shadow-lg">
            <div>
                <span class="iconify mx-auto" data-icon="fa-solid:mail-bulk" data-width="50px"></span>
                <h2 class="mt-6 text-center text-3xl font-bold text-gray-700">
                    Sign in
                </h2>
                <div class="flex mt-4 text-sm justify-center">
                    Or
                    <a href="/users/register" class="pl-1 text-indigo-600">
                        Create an account
                    </a>
                </div>
            </div>
            <form method="POST" action="/users/login" class="mt-8 space-y-6" >
                @csrf
                <div class="rounded-md shadow-sm space-y-2">
                    <div>
                        <input id="email" name="email" type="email" autocomplete="email" class="border border-indigo-300 rounded-lg w-full pl-2 focus:border-none focus:placeholder-white py-1 focus:text-white focus:outline-none focus:bg-indigo-600" placeholder="Email" required>
                        <label for="email" class="sr-only">Email</label>
                    </div>
                    <div>
                        <input id="password" name="password" type="password" autocomplete="current-password" class="border border-indigo-300 rounded-lg w-full pl-2 focus:border-none focus:placeholder-white py-1 focus:text-white focus:outline-none focus:bg-indigo-600" placeholder="Password" required>
                        <label for="password" class="sr-only">Password</label>
                    </div>
                </div>
                <div>
                    <button type="submit" class="w-full py-2 px-4 border border-transparent text-sm font-medium rounded-xl text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Sign in
                    </button>
                </div>
            </form>
        </div>
    </div>
    <x-slot name="scripts"></x-slot>
</x-layout>
