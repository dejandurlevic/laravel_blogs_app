<!-- Sidebar -->
<aside class="w-64 bg-white shadow-lg p-6 flex flex-col justify-between rounded-lg">
    <div>
        <!-- Prikaz depozita i nav samo ako je korisnik prijavljen -->
        @auth
            <div class="mb-6">
                <button class="w-full bg-green-600 text-white py-2 px-4 rounded-lg font-semibold shadow-md hover:bg-green-700 transition">
                    Deposit: {{ (Auth::user()->deposit) ? Auth::user()->deposit : 0 }} RSD
                </button>
            </div>

            <!-- Navigacija -->
            <nav class="space-y-3">
                <a href="{{ route('ads.showAllAds') }}" class="flex items-center py-2 px-4 bg-gray-100 rounded-lg text-gray-800 hover:bg-gray-200 transition">
                    📃 All Ads
                </a>
                <a href="{{ route('home.addDeposit') }}" class="flex items-center py-2 px-4 bg-gray-100 rounded-lg text-gray-800 hover:bg-gray-200 transition">
                    💵 Add Deposit
                </a>
                <a href="{{ route('home.showMessage') }}" class="flex items-center py-2 px-4 bg-blue-50 border-l-4 border-blue-400 text-blue-700 rounded-lg hover:bg-blue-100 transition">
                    📩 Messages
                    <span class="ml-auto bg-blue-500 text-white text-xs  font-bold px-2 py-1 rounded-full">
                        {{ Auth::user()->messages->count() }}
                    </span>
                </a>
                <a href="{{ route('ads.showAdForm') }}" class="flex items-center py-2 px-4 bg-gray-100 rounded-lg text-gray-800 hover:bg-gray-200 transition">
                    💼 New Ad
                </a>
            </nav>
        @endauth
    </div>

    <!-- Login/Register ili Logout -->
    <div>
        @auth
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full bg-red-500 text-white py-2 px-4 rounded-lg font-semibold shadow-md hover:bg-red-600 transition">
                    Logout
                </button>
            </form>
        @else
            <div class="space-y-2">
                <a href="{{ route('login') }}" class="block w-full text-center bg-blue-500 text-white py-2 px-4 rounded-lg font-semibold shadow-md hover:bg-blue-600 transition">
                    Login
                </a>
                <a href="{{ route('register') }}" class="block w-full text-center bg-gray-500 text-white py-2 px-4 rounded-lg font-semibold shadow-md hover:bg-gray-600 transition">
                    Register
                </a>
            </div>
        @endauth
    </div>
</aside>