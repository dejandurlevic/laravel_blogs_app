<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new AD</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-lg p-6">
        <div class="mb-4">
            <button class="w-full bg-green-500 text-white py-2 px-4 rounded-lg font-semibold">
                Deposit: {{ (Auth::user()->deposit) ? Auth::user()->deposit : 0}} RSD
            </button>
        </div>
        <nav class="space-y-2">
            <a href="#" class="block py-2 px-4 bg-gray-200 rounded-lg text-gray-800 hover:bg-gray-300">All Ads</a>
            <a href="#" class="block py-2 px-4 bg-gray-300 rounded-lg text-gray-900 font-semibold">Add Deposit</a>
            <a href="#" class="block py-2 px-4 bg-gray-200 rounded-lg text-gray-800 hover:bg-gray-300">Messages</a>
            <a href="#" class="block py-2 px-4 bg-gray-200 rounded-lg text-gray-800 hover:bg-gray-300">New Ad</a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6 flex items-center justify-center">
        <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">New AD</h2>
            <form action="{{ route('ads.storeAd') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label class="block mb-2 text-gray-700 font-medium" for="title">Ad Title:</label>
                <input type="text" id="title" name="title" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-indigo-300 focus:outline-none" placeholder="Enter title" required>
            
                <label class="block mt-4 mb-2 text-gray-700 font-medium" for="description">Description:</label>
                <textarea id="body" name="body" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-indigo-300 focus:outline-none" placeholder="Enter description" rows="4" required></textarea>
            
                <label class="block mt-4 mb-2 text-gray-700 font-medium" for="price">Price:</label>
                <input type="text" id="price" name="price" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-indigo-300 focus:outline-none" placeholder="Enter price" required>
            
                <label class="block mt-4 mb-2 text-gray-700 font-medium" for="image">Upload Image:</label>
                <input type="file" id="image1" name="image1" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-indigo-300 focus:outline-none" accept="image/*">

                <label class="block mt-4 mb-2 text-gray-700 font-medium" for="image">Upload Image:</label>
                <input type="file" id="image2" name="image2" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-indigo-300 focus:outline-none" accept="image/*">

                <label class="block mt-4 mb-2 text-gray-700 font-medium" for="image">Upload Image:</label>
                <input type="file" id="image3" name="image3" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-indigo-300 focus:outline-none" accept="image/*">

                <select id="category_id" name="category_id" class="w-full px-4 py-2 border rounded-lg bg-white focus:ring focus:ring-indigo-300 focus:outline-none" required>
                    <option value="" disabled selected>Select a category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            
                <button type="submit" class="w-full mt-4 bg-indigo-600 text-white py-2 px-4 rounded-lg font-semibold hover:bg-indigo-700 transition duration-200">
                    Submit Ad
                </button>
            </form>
        </div>
    </main>

</body>
</html>
