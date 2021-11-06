<x-layout>
    <x-slot name="title">All pages</x-slot>

    <div class="flex justify-center">
        <div class="w-3/4 mt-16 shadow-lg rounded-xl">
            <div class="text-5xl font-semibold p-6 text-center">Twoja lista stron</div>
            @if($pages->count())
            <ul class="border border-indigo-300 w-3/4 mx-auto my-4 rounded-xl">
                @foreach($pages as $page)
                    <li class="li-item list-none flex rounded-md py-4 mx-1 text-sm border">
                        <div class="list-item-content">
                            {{ $page->title }}
                        </div>
                        <div class="divider"></div>
                        <div class="list-item-content">
                            {{ $page->slug }}
                        </div>
                        <div class="divider"></div>
                        <div class="list-item-content">
                            {{ $page->creator->email }}
                        </div>
                        <div class="divider"></div>
                        <div class="w-1/5 text-center">
                            <a href="/{{ $page->slug }}" class="text-indigo-500">Przejdź do strony</a>
                        </div>
                    </li>
                @endforeach
            </ul>
            @endif
        </div>
    </div>
    <x-slot name="scripts"></x-slot>
</x-layout>
