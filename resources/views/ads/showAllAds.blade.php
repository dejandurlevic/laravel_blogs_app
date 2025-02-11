<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Ads</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-lg p-6 flex flex-col justify-between">
        <div>
            <!-- Prikaz depozita i navigacija samo ako je korisnik prijavljen -->
            @auth
                <div class="mb-4">
                    <button class="w-full bg-green-500 text-white py-2 px-4 rounded-lg font-semibold">
                        Deposit: {{ (Auth::user()->deposit) ? Auth::user()->deposit : 0 }} RSD
                    </button>
                </div>

                <!-- Navigacija -->
                <nav class="space-y-2">
                    <a href="{{ route('ads.showAllAds') }}" class="block py-2 px-4 bg-gray-200 rounded-lg text-gray-800 hover:bg-gray-300">All Ads</a>
                    <a href="{{ route('home.addDeposit') }}" class="block py-2 px-4 bg-gray-200 rounded-lg text-gray-800 hover:bg-gray-300">Add Deposit</a>
                    <a href="#" class="block py-2 px-4 bg-gray-200 rounded-lg text-gray-800 hover:bg-gray-300">Messages</a>
                    <a href="{{ route('ads.showAdForm') }}" class="block py-2 px-4 bg-gray-200 rounded-lg text-gray-800 hover:bg-gray-300">New Ad</a>
                </nav>
            @endauth
        </div>

        <!-- Login/Register ili Logout -->
        <div>
            @auth
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full bg-red-500 text-white py-2 px-4 rounded-lg font-semibold hover:bg-red-600 transition">
                        Logout
                    </button>
                </form>
            @else
                <div class="space-y-2">
                    <a href="{{ route('login') }}" class="block w-full text-center bg-blue-500 text-white py-2 px-4 rounded-lg font-semibold hover:bg-blue-600 transition">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="block w-full text-center bg-gray-500 text-white py-2 px-4 rounded-lg font-semibold hover:bg-gray-600 transition">
                        Register
                    </a>
                </div>
            @endauth
        </div>
    </aside>

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
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </main>

</body>
</html>
