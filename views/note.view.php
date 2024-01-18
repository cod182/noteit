<?php include 'partials/head.php' ?>

<?php include 'partials/nav.php' ?>

<?php include 'partials/banner.php' ?>
<main>
  <div class="w-full h-[50px] flex justify-start items-center px-4">
    <a href="/noteit/notes" class='hover:underline'>Go Back</a>
  </div>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8 ">
    <div class="overflow-scroll aspect-square mx-auto bg-yellow-200 p-4 rounded-md shadow-md max-w-md min-w-[60%] min-h-[150px] mx-auto">
      <p class="text-xl sm:text-lg text-gray-600 font-semibold mb-2">
        <?php echo htmlspecialchars($note['title']) ?>
      </p>
      <p class="text-lg sm:text-md text-gray-600 font-normal mb-2">
        <?php echo htmlspecialchars($note['post']) ?>
      </p>
    </div>
  </div>
</main>
<?php include 'partials/footer.php' ?>