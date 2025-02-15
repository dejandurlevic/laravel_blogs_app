<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Messages</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex min-h-screen">

    @extends('partials.header')

    <!-- Main Content -->
    <main class="flex-1 p-6">
        <h1 class="text-2xl font-bold text-gray-800">All Messages</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-6">
            @foreach($messages as $message)
            <div class="bg-white shadow-lg rounded-lg p-4 border border-gray-200">
                <p class="text-sm text-gray-500">Blog: <span class="font-medium text-gray-800">{{ $message->ad->title }}</span></p>
                <p class="text-sm text-gray-500">From: <span class="font-medium text-gray-800">{{ $message->sender->name }}</span></p>
                <p class="text-sm text-gray-500">Message: <span class="font-medium text-gray-800">{{ $message->text }}</span></p>
                <a class="text-sm text-blue-500" href="">Reply</a>
            @endforeach
        </div>
    </main>

</body>
</html>
