<!-- head -->
<?php require_once VIEW_PATH . "partials/head.php" ?>

<!-- navigation -->
<?php require_once VIEW_PATH . "partials/navbar.php" ?>


<main class="container max-w-2xl mx-auto py-10 mt-24">
    <div class="flex flex-col justify-center px-4 py-6 rounded-md shadow-lg">
        <h1 class="text-center text-2xl">Register</h1>


        <form action="/register" method="POST">
            <div class="mb-6">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                <input 
                    type="text" id="name" name="name"
                    value="<?= old('name') ?>" 
                    class="bg-gray-50 border border-gray-300 focus:outline-none focus:border  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="e.g John Doe">

                <!-- validation message -->
                <?php if(!empty(error('name'))) : ?>
                    <div class="text-sm text-red-500">
                        <?= error('name') ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                <input 
                    type="email" 
                    value="<?= old('email') ?>"
                    id="email" name="email" class="bg-gray-50 border border-gray-300 focus:outline-none focus:border  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="your@email.com">

                <?php if(!empty(error('email'))) : ?>
                    <div class="text-sm text-red-500">
                        <?= error('email') ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="mb-6">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                <input type="password" id="password" name="password" placeholder="********" class="bg-gray-50 border border-gray-300 focus:outline-none focus:border  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                <!-- validation message -->
                <?php if(!empty(error('password'))) : ?>
                    <div class="text-sm text-red-500">
                        <?= error('password') ?>
                    </div>
                <?php endif; ?>
            </div>


            <div class="mb-6">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Confirm password</label>
                <input type="password" id="password" placeholder="********" name="confirm_password" class="bg-gray-50 border border-gray-300 focus:outline-none focus:border  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>

            <div class="flex justify-between items-center">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>

            <a href="/login" class="underline text-blue-500">Already registered?</a>
            </div>
        </form>
    </div>

</main>

<!-- footer -->
<?php require_once VIEW_PATH . "partials/footer.php" ?>