<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Deposit</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex min-h-screen">

    @extends('partials.header')

    <!-- Main Content -->
    <main class="flex-1 p-6 flex items-center justify-center">
        <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Add Deposit</h2>
            <form action="{{ route('home.addDeposit') }}" method="POST">
                @csrf
                <label class="block mb-2 text-gray-700 font-medium" for="amount">Enter Amount:</label>
                <input type="number" id="deposit" name="deposit" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-green-300 focus:outline-none" placeholder="Enter amount" required>

                <button type="submit" class="w-full mt-4 bg-green-500 text-white py-2 px-4 rounded-lg font-semibold hover:bg-green-600 transition duration-200">
                    Add Deposit
                </button>
            </form>
        </div>
    </main>

</body>
</html>
