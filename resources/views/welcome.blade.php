<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-lg p-6 flex flex-col justify-between">
        <div>
            <!-- Prikaz depozita i nav samo ako je korisnik prijavljen -->
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
        </div>
            @endauth

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
        <h1 class="text-2xl font-bold text-gray-800">Welcome to Home Page</h1>
        <p class="text-gray-600 mt-2">Here you can register or login to see blogs.</p>
    </main>

</body>
</html>
