<x-layout>
    <x-slot name="title">
        <title>Email message</title>
    </x-slot>

    <div class="flex justify-center pt-4 sm:mt-10">
        <div class="max-w-4xl w-full p-10 border rounded-xl shadow-lg">
            <div>
                <span class="iconify mx-auto" data-icon="fa-solid:mail-bulk" data-width="50px"></span>
                <h2 class="mt-6 text-center text-3xl font-bold text-gray-700">
                    Create Message
                </h2>
            </div>
            <form method="POST" action="#" class="mt-8 space-y-6" >
                @csrf
                <div class="rounded-md shadow-sm space-y-4 mx-auto xl:w-2/5">
                    <div class="relative border border-indigo-300 rounded-lg">
                        <input id="email_from" name="email_from" type="email" value="{{ auth()->user()->email}}" class="rounded-lg w-full pl-2 py-1 border-none focus:placeholder-transparent focus:outline-none" placeholder="example@example.com" required>
                        <label for="email_from" class="absolute -top-3 left-4 bg-white text-sm font-bold px-1">From:</label>
                    </div>
                    @error('email_from')
                        <p>{{ $message }}</p>
                    @enderror

                    <div class="relative border border-indigo-300 rounded-lg">
                        <input id="email_to" name="email_to" type="email" autocomplete="email" class="rounded-lg w-full pl-2 py-1 border-none focus:placeholder-transparent focus:outline-none" placeholder="example@example.com" required>
                        <label for="email_to" class="absolute -top-3 left-4 bg-white text-sm font-bold px-1">To:</label>
                    </div>
                    @error('email_to')
                    <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="relative border border-indigo-300 rounded-lg">
                    <input id="title" name="title" type="text" class="rounded-lg w-full pl-2 py-1 border-none focus:placeholder-transparent focus:outline-none" placeholder="example@example.com" required>
                    <label for="title" class="absolute -top-3 left-4 bg-white text-sm font-bold px-1">Title</label>
                </div>
                @error('title')
                    <p>{{ $message }}</p>
                @enderror
                <div id="body-wrapper" class="relative border border-indigo-300 rounded">
                    <textarea id="body" name="body"></textarea>
                    <label for="body" class="absolute -top-3 left-4 bg-white text-sm font-bold px-1">Write your message here</label>
                </div>
                @error('body')
                    <p>{{ $message }}</p>
                @enderror
                <div>
                    <button type="submit" class="w-full py-2 px-4 border border-transparent text-sm font-medium rounded-xl text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Send message
                    </button>
                </div>
            </form>
        </div>
    </div>

    <x-slot name="scripts">
        <script type="text/javascript">
            ClassicEditor
                .create(document.querySelector('#body'))
                .then(editor => {
                    console.log(editor)
                })
                .catch(error => {
                    console.error(error)
                })
        </script>
    </x-slot>
</x-layout>
