<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{ $title }}

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
</head>
<body class="antialiased">
<div class="relative flex items-top justify-center min-h-screen bg-indigo-600 items-center">
    <div class="max-w-xl mx-auto flex justify-center flex-col items-center text-center">
        <span class="iconify mx-auto text-white" data-icon="fa-solid:mail-bulk" data-width="50px"></span>
        <p class="text-6xl font-bold text-white py-5">Account blocked</p>
        <form method="POST" action="/users/logout">
            @csrf
            <button type="submit" class="mx-auto mt-5 p-3 bg-indigo-300 rounded hover:text-white">Stay anonymous...</button>
        </form>
    </div>
</div>
</body>
</html>
