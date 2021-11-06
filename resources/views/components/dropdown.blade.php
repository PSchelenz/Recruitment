@props(['trigger'])
<div class="relative inline-block float-right h-full flex sm:mr-7 mr-2 w-1/6 justify-center order-2">
    {{-- Trigger --}}
    <div id="trigger" class="my-auto">
        {{ $trigger }}
    </div>

    {{-- Dropdown --}}
    <div id="item_list" class="py-2 absolute bg-gray-100 w-full mt-2 rounded-xl z-50 overflow-auto max-h-52 top-full" style="display: none">
        {{ $slot }}
    </div>
</div>
