@if (session()->has('success'))
    <div id="message"
         class="fixed bottom-3 right-3 bg-indigo-600 text-white text-sm py-2 px-4 rounded-xl">
        <p>
            {{ session()->get('success')  }}
        </p>
    </div>
@endif
