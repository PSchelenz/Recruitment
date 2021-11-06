<x-layout>
    <x-slot name="title">Register</x-slot>
    <div class="flex justify-center pt-4 sm:mt-10">
        <div class="max-w-md w-full p-10 border rounded-xl shadow-lg">
            <div>
                <span class="iconify mx-auto" data-icon="fa-solid:mail-bulk" data-width="50px"></span>
                <h2 class="mt-6 text-center text-3xl font-bold text-gray-700">
                    Register
                </h2>
                <div class="flex mt-4 text-sm justify-center">
                    Or
                    <a href="/users/login" class="pl-1 text-indigo-600">
                        Sign in
                    </a>
                </div>
            </div>
            <form method="POST" action="/users/register" class="mt-8 space-y-6" >
                @csrf
                <div class="rounded-md shadow-sm space-y-2">
                    <div>
                        <input id="email" name="email" type="email" autocomplete="email" class="border border-indigo-300 rounded-lg w-full pl-2 focus:border-none focus:placeholder-white py-1 focus:text-white focus:outline-none focus:bg-indigo-600" placeholder="Email" required>
                        <label for="email" class="sr-only">Email</label>
                    </div>
                    @error('email')
                        <p>{{ $message }}</p>
                    @enderror
                    <div class="relative">
                        <input id="password" name="password" type="password" autocomplete="current-password" class="border border-indigo-300 rounded-lg w-full pl-2 focus:border-none focus:placeholder-white py-1 focus:text-white focus:outline-none focus:bg-indigo-600" placeholder="Password" required>
                        <label for="password" class="sr-only">Password</label>
                        <div class="i-container absolute top-0 text-2xl right-4 top-1 top-1.5">
                            <span id="eye" class="input-icon input-icon-right iconify" data-icon="bi:eye-fill"></span>
                        </div>
                    </div>
                    @error('password')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="w-full py-2 px-4 border border-transparent text-sm font-medium rounded-xl text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>

    <x-slot name="scripts">
        <script type="text/javascript">
            const password_input = document.querySelector('#password')
            document.querySelector('.i-container').addEventListener('click', function (e) {
                if(password_input.value !== "") {
                    const type = password_input.getAttribute('type') === 'password' ? 'text': 'password';
                    password_input.setAttribute('type', type);
                    if(type === 'password') {
                        document.querySelector('#eye').setAttribute('data-icon', 'bi:eye-fill')
                    } else {
                        document.querySelector('#eye').setAttribute('data-icon', 'bi:eye-slash-fill')
                    }
                }
            })
        </script>
    </x-slot>
</x-layout>
