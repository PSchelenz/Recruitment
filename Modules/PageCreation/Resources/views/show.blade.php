<x-layout>
    <x-slot name="title">
        <title>{{ $page->title }}</title>
    </x-slot>

    <div class="w-1/2 mx-auto">
        <div class="text-center">
            <div class="my-20">
                <span id="keep" class="text-5xl font-semibold">{{ $page->head_title }}</span>
            </div>
        </div>
        <div>
            <span id="keep" class="text-justify">{!! $page->body !!}</span>
        </div>
    </div>

    <x-slot name="scripts"></x-slot>
</x-layout>
