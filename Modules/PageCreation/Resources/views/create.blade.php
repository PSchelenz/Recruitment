<x-layout>
    <x-slot name="title">
        <title>Create page</title>
    </x-slot>

        <div class="sm:flex justify-center xl:justify-start pt-4 sm:mt-10 xl:px-32">
            <div>
                <div>
                    <span class="iconify mx-auto" data-icon="fa-solid:mail-bulk" data-width="50px"></span>
                    <h2 class="mt-6 text-center text-3xl font-bold text-gray-700">
                        Create Page
                    </h2>
                </div>
                <div class="relative max-w-4xl w-full px-10 pb-10 pt-3 mt-6 border rounded-xl shadow-lg">
                    <a id="send-to-preview" href="#preview" class="visible xl:invisible">
                        <div id="show-preview" class="absolute top-5 right-6">
                            <span id="eye" class="input-icon input-icon-right iconify" data-icon="bi:eye-fill" data-width="24"></span>
                        </div>
                    </a>
                    <form method="POST" action="/pagecreation" class="space-y-6" >
                        @csrf
                        <div class="space-y-4 mx-auto w-full xl:w-5/6">
                            <div class="xl:flex relative space-y-4 xl:space-y-0">
                                <label for="prefix" class="text-indigo-500 font-semibold mr-3">Prefix:</label>
                                <input id="prefix" name="prefix" type="text" class="border border-indigo-300 rounded-lg xl:w-1/5 pl-2 py-1 mr-5 focus:placeholder-transparent focus:outline-none xl:float-none" placeholder="/example" required>
                                @error('prefix')
                                    <p>{{ $message }}</p>
                                @enderror
                                <label for="title" class="text-indigo-500 font-semibold mr-3">Title:</label>
                                <input id="title" name="title" type="text" class="border border-indigo-300 rounded-lg xl:w-full pl-2 py-1 focus:placeholder-transparent focus:outline-none" placeholder="My Title" required>
                                @error('title')
                                <p>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="flex relative">
                                <label for="head_title" class="text-indigo-500 font-semibold mr-5 whitespace-nowrap">Head title:</label>
                                <input id="head_title" name="head_title" size="255" type="text" autocomplete="text" class="border border-indigo-300 rounded-lg w-full pl-2 py-1 focus:placeholder-transparent focus:outline-none" placeholder="My head title" required>
                            </div>
                            @error('head_title')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="title" class="text-indigo-500 font-semibold">Body:</label>
                            <div class="relative border border-indigo-300 rounded mt-2">
                                <textarea id="body" name="body"></textarea>
                            </div>
                        </div>
                        @error('body')
                            <p>{{ $message }}</p>
                        @enderror
                        <div>
                            <button type="submit" class="w-full py-2 px-4 border border-transparent text-sm font-medium rounded-xl text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Register page
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="preview" class="xl:fixed w-full xl:w-1/4 right-32 xl:p-10 invisible xl:visible border rounded-xl shadow-lg xl:ml-3 fixed-box overflow-y-auto h-96 xl:h-1/2">
            <div id="preview-head" class="text-2xl font-bold text-center mb-6">

            </div>
            <div id="preview-body" class="mx-6">

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
        <script type="text/javascript">
            const prev_head = document.querySelector('#preview-head');
            const prev_body = document.querySelector('#preview-body');
            const head_title = document.querySelector('#head_title');
            const body = document.querySelector('.ck-content')

            head_title.addEventListener('input', function(event) {
                const target = event.target;

                document.querySelector('#preview-head').innerHTML = target.value;
            });

            body.addEventListener('input', function(event) {
                const target = event.target;

                document.querySelector('#preview-body').innerHTML = target.innerHTML;
            })

        </script>
        <script type="text/javascript">
            const preview = document.querySelector('#preview');
            const send_to_preview = document.querySelector('#send-to-preview');

            document.querySelector('#show-preview').addEventListener('click', function (event) {
                if(document.querySelector('#eye').getAttribute('data-icon') === 'bi:eye-fill') {
                    document.querySelector('#eye').setAttribute('data-icon', 'bi:eye-slash-fill')
                    preview.style.setProperty('visibility', 'visible');
                    send_to_preview.setAttribute('href', '#preview');
                } else {
                    document.querySelector('#eye').setAttribute('data-icon', 'bi:eye-fill')
                    preview.style.setProperty('visibility', 'hidden');
                    send_to_preview.setAttribute('href', '#');
                }
            })
        </script>
    </x-slot>
</x-layout>
