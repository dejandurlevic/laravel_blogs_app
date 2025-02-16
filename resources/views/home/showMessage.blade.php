<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Messages</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function toggleReplyForm(messageId) {
            const form = document.getElementById('reply-form-' + messageId);
            form.classList.toggle('hidden');
        }
    </script>
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

                    <button onclick="toggleReplyForm({{ $message->id }})" class="text-blue-500 underline mt-2">Reply</button>

                    <!-- Hidden Reply Form -->
                    <div id="reply-form-{{ $message->id }}" class="hidden mt-4">
                        <form action="{{ route('home.addReplay') }}" method="POST">
                            @csrf
                            <input type="hidden" name="sender_id" value="{{ $message->sender_id }}">
                            <input type="hidden" name="ad_id" value="{{ $message->ad_id }}">
                            <textarea name="text" rows="3" class="w-full p-2 border rounded-md" placeholder="Write your reply..."></textarea>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 mt-2 rounded-md">Send Reply</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </main>

</body>
</html>
