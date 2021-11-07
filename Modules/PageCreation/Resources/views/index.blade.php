<x-layout>
    <x-slot name="title">
        <title>All pages</title>
    </x-slot>

    <div class="flex justify-center">
        <div class="sm:w-3/4 w-full sm:mt-16 mt-10 shadow-lg rounded-xl pb-5">
            <div class="text-5xl font-semibold p-6 text-center">Twoja lista stron</div>
            @if($pages->count())
            <ul class="border border-indigo-300 sm:w-3/4 w-5/6 mx-auto my-4 rounded-xl">
                @foreach($pages as $page)
                    <li class="li-item list-none flex rounded-md py-4 mx-1 text-sm border">
                        <div class="list-item-content">
                            {{ $page->title }}
                        </div>
                        <div class="divider hidden sm:block"></div>
                        <div class="list-item-content hide">
                            {{ $page->slug }}
                        </div>
                        <div class="divider hidden sm:block"></div>
                        <div class="list-item-content hide">
                            {{ $page->creator->email }}
                        </div>
                        <div class="divider"></div>
                        <div class="sm:w-1/5 w-1/3 text-center">
                            <a href="/{{ $page->slug }}" class="text-indigo-500">Przejdź do strony</a>
                        </div>
                    </li>
                @endforeach
            </ul>
            @else
                <p class="text-center">You don't have any pages yet. <a href="/pagecreation" class="text-indigo-500">Create One!</a></p>
            @endif
        </div>
    </div>
    <x-slot name="scripts"></x-slot>
</x-layout>
