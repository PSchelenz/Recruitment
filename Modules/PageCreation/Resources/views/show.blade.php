<x-layout>
    <x-slot name="title">{{ $page->title }}</x-slot>

    <div class="w-1/2 mx-auto">
        <div class="text-center">
            <div class="my-20">
                <span class="text-5xl font-semibold">{{ $page->head_title }}</span>
            </div>
        </div>
        <div>
            <p class="text-justify">{!! $page->body !!}</p>
        </div>
    </div>

    <x-slot name="scripts"></x-slot>
</x-layout>
