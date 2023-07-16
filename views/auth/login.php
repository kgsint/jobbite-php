<!-- head -->
<?php require_once VIEW_PATH . "partials/head.php" ?>

<!-- navigation -->
<?php require_once VIEW_PATH . "partials/navbar.php" ?>


<main class="container max-w-2xl mx-auto py-10 mt-24">
    <div class="flex flex-col justify-center px-4 py-6 rounded-md shadow-lg">
        <h1 class="text-center text-2xl">Login</h1>

        <form action="/login" method="POST">
            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                <input type="email" id="email" class="bg-gray-50 border border-gray-300 focus:outline-none focus:border  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="your@email.com" required>
            </div>
            <div class="mb-6">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                <input type="password" id="password" placeholder="********" class="bg-gray-50 border border-gray-300 focus:outline-none focus:border  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
            </div>

            <div class="flex justify-between items-center">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>

            <a href="/register" class="underline text-blue-500">Don't have an account?</a>
            </div>
        </form>
    </div>

</main>

<!-- footer -->
<?php require_once VIEW_PATH . "partials/footer.php" ?>