<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $singleAd->title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <nav class="bg-white shadow-md py-4 px-6 flex justify-between items-center">
        <h1 class="text-xl font-bold text-gray-800">Ad Details</h1>
        <a href="{{ route('ads.showAllAds') }}" class="text-blue-600 hover:underline">Back to Ads</a>
    </nav>

    <!-- Main Container -->
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden mt-8 p-6">

        <!-- Ad Title -->
        <h2 class="text-2xl font-bold text-gray-800">{{ $singleAd->title }}</h2>

        <!-- Ad Images -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
            @if($singleAd->image1)
                <img src="/ad_images/{{$singleAd->image1}}" class="w-full h-64 object-cover rounded-lg shadow-md">
            @endif
            @if($singleAd->image2)
                <img src="/ad_images/{{$singleAd->image2}}" class="w-full h-64 object-cover rounded-lg shadow-md">
            @endif
            @if($singleAd->image3)
                <img src="/ad_images/{{$singleAd->image3}}" class="w-full h-64 object-cover rounded-lg shadow-md">
            @endif
        </div>

        <!-- Ad Description -->
        <div class="mt-6">
            <h3 class="text-xl font-semibold text-gray-800">Description</h3>
            <p class="text-gray-700 mt-2 leading-relaxed">{{ $singleAd->body }}</p>
        </div>

        <!-- Ad Price & CTA -->
        <div class="mt-6 flex justify-between items-center">
            <span class="text-2xl font-bold text-green-600">{{ number_format($singleAd->price, 2) }} EUR</span>
            <a href="{{ route('ads.showAllAds')}}?cat={{$singleAd->category->name}}" class="bg-blue-500 text-white px-6 py-2 rounded-lg font-semibold hover:bg-blue-600 transition">
                {{ $singleAd->category->name }}
            </a>
        </div>
        @if(auth()->check() && auth()->user()->id !== $singleAd->user_id)
            <!-- Ad Owner & Contact Form -->
            <div class="mt-8">
                <h3 class="text-lg font-semibold text-gray-800">Owner</h3>
                <p class="text-gray-700">{{ $singleAd->user->name }}</p>
    
                <h3 class="mt-4 text-lg font-semibold text-gray-800">Send a Message to {{ $singleAd->user->name }}</h3>
                <form action="{{ route('home.contactOwner', ['id'=> $singleAd->id]) }}" method="POST" class="mt-4">
                    @csrf
                    <textarea name="message" rows="4" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Write your message here..."></textarea>
                    <button type="submit" class="mt-4 bg-green-500 text-white px-6 py-2 rounded-lg font-semibold hover:bg-green-600 transition">Send Message</button>
                </form>
                @if(@session()->has('msg'))
                    
                <div>
                    {{session()->get('msg')}}
                </div>

                @endif
            </div>

        @endif
    
    </div>

</body>
</html>
