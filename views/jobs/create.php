<!-- head -->
<?php require_once VIEW_PATH . "partials/head.php" ?>

<!-- navigation -->
<?php require_once VIEW_PATH . "partials/navbar.php" ?>


<main class="container max-w-2xl mx-auto py-10 mt-24">
    <div class="flex flex-col justify-center px-4 py-6 rounded-md shadow-lg">

        <h2 class="text-2xl font-bold text-center">Post a Job</h2>
        <form action="/job/new" method="POST" enctype="multipart/form-data" class="mt-6">
            <!-- Job Details -->
            <h2 class="text-xl font-semibold mb-6">Job Details</h2>
            <hr>

            <div class="my-6">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Job Title</label>
                <input type="text" id="title" value="<?= old('title') ?>" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Product Manager etc">
                <!-- validation message -->
                <?php if(!empty(error('title'))) : ?>
                    <div class="text-sm text-red-500">
                        <?= error('title') ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="mb-6">
                <label for="location" class="block mb-2 text-sm font-medium text-gray-900">Location</label>
                <input type="text" name="location" value="<?= old('location') ?>" id="location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <!-- validation message -->
                <?php if(!empty(error('location'))) : ?>
                    <div class="text-sm text-red-500">
                        <?= error('location') ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="mb-6">
                <label for="job_status" class="block mb-2 text-sm font-medium text-gray-900">Select Job Type</label>
                <select id="job_status" name="job_status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:outline-none focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="">Choose Job Type</option>
                    <option value="1" <?= old('job_status') == 1 ? 'selected' : '' ?> >Part Time</option>
                    <option value="2" <?= old('job_status') == 2 ? 'selected' : '' ?>>Full Time</option>
                </select>
                <!-- validation message -->
                <?php if(!empty(error('job_status'))) : ?>
                    <div class="text-sm text-red-500">
                        <?= error('job_status') ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="grid grid-cols-2 gap-3 mb-6">
                <div>
                    <label for="salary_from" class="block mb-2 text-sm font-medium text-gray-900">Salary Range (from)</label>
                    <input type="number" name="salary_from" id="salary_from" value="<?= old('salary_from') ?>" class="w-3/4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <!-- validation message -->
                    <?php if(!empty(error('salary_from'))) : ?>
                        <div class="text-sm text-red-500">
                            <?= error('salary_from') ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div>
                    <label for="salary_from" class="block mb-2 text-sm font-medium text-gray-900">Salary Range (to)</label>
                    <input type="number" name="salary_to" id="salary_from" value="<?= old('salary_to') ?>" class="w-3/4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <!-- validation message -->
                    <?php if(!empty(error('salary_to'))) : ?>
                        <div class="text-sm text-red-500">
                            <?= error('salary_to') ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- editor -->
            <div class="mb-6">
                <label for="block mb-2 text-sm font-medium text-gray-900">Job Description</label>
                <textarea name="description" id="editor" cols="30" rows="10"><?= old('description') ?></textarea>
                <!-- validation message -->
                <?php if(!empty(error('description'))) : ?>
                    <div class="text-sm text-red-500">
                        <?= error('description') ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Company Details  -->
            <h2 class="text-xl font-semibold mb-3">Company Details</h2>

            <div class="mb-6">
                <label for="company_name" class="block mb-2 text-sm font-medium text-gray-900">Company Name</label>
                <input type="text" value="<?= old('company_name') ?>" name="company_name" id="company_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <!-- validation message -->
                <?php if(!empty(error('company_name'))) : ?>
                    <div class="text-sm text-red-500">
                        <?= error('company_name') ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="mb-6">
                <label for="company_email" class="block mb-2 text-sm font-medium text-gray-900">Company Email</label>
                <input type="email" value="<?= old('company_email') ?>" name="company_email" id="company_email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                
                <!-- validation message -->
                <?php if(!empty(error('company_email'))) : ?>
                    <div class="text-sm text-red-500">
                        <?= error('company_email') ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900" for="user_avatar">Upload company logo (optional)</label>
                <input class="block w-full p-6 focus:outline-none text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" type="file" name="company_logo" accept="image/png, image/gif, image/jpeg">
            </div>

            <div class="mb-6">
                <label for="apply_url" class="block mb-2 text-sm font-medium text-gray-900">Apply url</label>
                <input type="text" value="<?= old('apply_url') ?>" placeholder="https://yourcompanywebsite.com" name="apply_url" id="apply_url" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                <!-- validation message -->
                <?php if(!empty(error('apply_url'))) : ?>
                    <div class="text-sm text-red-500">
                        <?= error('apply_url') ?>
                    </div>
                <?php endif; ?>
            </div>

            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>

    </div>

</main>

<!-- footer -->
<?php require_once VIEW_PATH . "partials/footer.php" ?>

<script>
    // froara editor
    let edior = new FroalaEditor('#editor', {
        toolbarButtons: {
            // only text specify buttons
            moreText: {
                buttons: ['bold', 'italic', 'underline', 'strikeThrough'],
                buttonsVisible: 4,
            },
            moreParagraph: {
                buttons: ['alignLeft', 'alignCenter', 'formatOL', 'formatUL'],
                buttonsVisible: 4,
            },
        },
        quickInsertEnabled: false,
    })
</script>