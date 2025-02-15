<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Ads</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex min-h-screen">

    @extends('partials.header')

    <!-- Main Content -->
    <main class="flex-1 p-6">
        <h1 class="text-2xl font-bold text-gray-800">All Ads</h1>
        <p class="text-gray-600 mt-2">Browse all available ads.</p>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-6">
            @foreach($allAds as $ad)
                <a href="{{ route('ads.showSingleAd', ['id'=>$ad->id]) }}" class="block bg-white shadow-lg rounded-lg overflow-hidden transition-transform transform hover:scale-105">
                    <img src="/ad_images/{{$ad->image1}}" alt="{{ $ad->title }}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h2 class="text-lg font-semibold text-gray-800">{{ $ad->title }}</h2>
                        <p class="text-gray-600 mt-1">{{ Str::limit($ad->body, 80) }}</p>
                        <div class="mt-3 flex justify-between items-center">
                            <span class="text-green-600 font-bold">{{ number_format($ad->price, 2) }} EUR</span>
                            <span class="text-green-600 font-bold">VIEWS: {{ number_format($ad->views) }}</span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </main>

</body>
</html>
