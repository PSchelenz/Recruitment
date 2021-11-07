<!DOCTYPE html>
<html lang="pl">
@include('components._head')
<body>
<header>
    <nav class="flex justify-center bg-indigo-600">
        <div class="flex justify-around sm:block items-center nav-wrapper sm:w-3/5 w-4/5">
            <div class="items-center inline-flex order-1">
                <span class="iconify text-white" data-icon="cib:mail-ru"></span>
                <div class="logo py-4 text-white font-bold text-lg">
                    GreatMail
                </div>
            </div>
            @auth
                <div class="inline-flex float-right items-center h-full xl:mr-10 md:mr-7 sm:mr-4 mr-0 order-3">
                    <form method="POST" action="/users/logout">
                        @csrf
                        <button type="submit" class="bg-white px-2 py-1 rounded-md text-indigo-600 font-bold hover:translate-y-1">
                            Log Out
                        </button>
                    </form>
                </div>
                <x-dropdown>
                    <x-slot name="trigger">
                        <button class="text-xs text-white font-bold uppercase">Actions</button>
                    </x-slot>

                    <x-dropdown-item href="/pagecreation/list" :active="request()->is('pagecreation/list')">All Pages</x-dropdown-item>
                    <x-dropdown-item href="/pagecreation" :active="request()->is('pagecreation')">Create page</x-dropdown-item>
                    <x-dropdown-item href="/emailmessages/create" :active="request()->is('emailmessages/create')">Create email</x-dropdown-item>

                    <form id="logout-form" method="POST" action="/logout" class="hidden">
                        @csrf
                    </form>
                </x-dropdown>
            @endauth
        </div>
    </nav>
</header>
<main>
    {{ $slot }}
</main>
<footer>
    <div class="flex text-sm justify-center mt-2">
        Created by <strong class="pl-1">Piotr Schelenz</strong>
    </div>
</footer>

<x-flash />

<script type="text/javascript">
    const message = document.querySelector('#message')
    if (message !== null) {
        setTimeout(function () {
            message.style.setProperty('display', 'none');
        }, 4000)
    }
</script>
<script>
    const item_list = document.querySelector('#item_list')
    const trigger = document.querySelector('#trigger')

    trigger.addEventListener('click', function() {
        if(item_list.style.display === 'none') {
            item_list.style.setProperty('display', 'block')
        } else {
            item_list.style.setProperty('display', 'none')
        }
    })
</script>

{{ $scripts }}
</body>
</html>
