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
            <a href="{{ route('home.showMessage') }}" class="block py-2 px-4 bg-gray-200 rounded-lg text-gray-800 hover:bg-gray-300">Messages</a>
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