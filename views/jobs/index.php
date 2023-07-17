<!-- head -->
<?php require_once VIEW_PATH . "partials/head.php" ?>

<!-- navigation -->
<?php require_once VIEW_PATH . "partials/navbar.php" ?>

<main class="container max-w-[1135px] mx-auto py-10">
  <h2 class="text-center text-2xl mb-2">Latest Jobs</h2>
  <div class="grid place-items-center md:space-y-12">
    
  <?php foreach($jobs as $job) :?>
    <a href="#" class="flex items-center jusify-between w-full bg-white border border-gray-200 rounded-lg shadow flex-row max-w-3xl hover:bg-gray-100">
      <img class="object-cover rounded-t-lg h-24 md:h-32 w-48 rounded-none rounded-l-lg" src="https://impactspace.com/images/uploads/company-default.png" alt="">
      <div class="flex flex-col justify-between p-4 leading-normal">
          <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900"><?= htmlspecialchars($job->title) ?></h5>
          <div class="flex space-x-3">
          <span class="bg-white text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 border border-gray-500 rounded-full">
            <?= htmlspecialchars($job->location) ?>
          </span>
          <span class="text-xs bg-white text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 border border-gray-500 rounded-full">
            $<?= htmlspecialchars($job->salary_from) ?> - <?= htmlspecialchars($job->salary_to) ?> 
          </span>
          <?php if($job->job_status == 1) : ?>
            <span class="text-xs bg-white text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 border border-gray-500 rounded-full">Part Time</span>
          <?php endif; ?>

          <?php if($job->job_status == 2) : ?>
            <span class="text-xs bg-white text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 border border-gray-500 rounded-full">Full Time</span>
          <?php endif; ?>
        </div>
      </div>
    </a>
  <?php endforeach; ?>

  </div>
</main>

<!-- footer -->
<?php require_once VIEW_PATH . "partials/footer.php" ?>
