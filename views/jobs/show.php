<!-- head -->
<?php require_once VIEW_PATH . "partials/head.php" ?>

<!-- navigation -->
<?php require_once VIEW_PATH . "partials/navbar.php" ?>

<main class="container max-w-[1135px] mx-auto mt-24">
  <!-- top heading -->
  <section class="flex items-center flex-col md:flex-row">
    <img src="<?= url_asset('/assets/images/64b58be71c095default-company-image.png') ?>" alt="">
    <div class="">
        <h1 class="text-2xl font-bold mb-3"><?= htmlspecialchars($job->title) ?></h1>
        <div>
        <span class="bg-white text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 border border-gray-500 rounded-full">
            <?= htmlspecialchars($job->company_name) ?>
          </span>
          <span class="bg-white text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 border border-gray-500 rounded-full">
            <?= htmlspecialchars($job->location) ?>
          </span>
          <span class="bg-white text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 border border-gray-500 rounded-full">
            Full time
          </span>
        </div>
    </div>
    </section>
  <!-- job description -->

  <section class="grid md:grid-cols-2 space-y-12 p-12 md:p-6">
    <div>
        <h3 class="text-2xl mb-6">Job Description</h3>
        <p class="text-gray-800">
            <?= $job->description ?>
        </p>
    </div>
    <div class="flex-3 bg-gray-100 p-6 md:mx-auto shadow rounded-md">
        <h5 class="text-gray-700 text-2xl mb-6">Summary</h5>
        <p class="font-bold mb-3">Posted: <span class="font-light text-sm"><?= date('d M, Y', strtotime($job->created_at)) ?></span></p>
        <p class="font-bold mb-3">Employment Status: 
            <?php if((int)$job->job_status === 1) : ?>
                <span class="font-light text-sm">Part Time</span>
            <?php elseif((int)$job->job_status === 2) : ?>
                <span class="font-light text-sm">Full Time</span>
            <?php endif; ?>
        </p>
        <p class="font-bold mb-3">Salary: <span class="font-light text-sm">$<?= htmlspecialchars($job->salary_from) ?></span> - <span class="font-light text-sm">$<?= htmlspecialchars($job->salary_to) ?></span></p>

    </div>
  </section>
</main>

<!-- footer -->
<?php require_once VIEW_PATH . "partials/footer.php" ?>
