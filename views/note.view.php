<?php include 'partials/head.php' ?>

<?php include 'partials/nav.php' ?>

<?php include 'partials/banner.php' ?>
<main>
  <div class="w-full h-[50px] flex justify-start items-center px-4">
    <a href="/noteit/notes" class='hover:underline'>Go Back</a>
  </div>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8 ">
    <div class="mx-auto bg-yellow-200 p-4 rounded-md shadow-md max-w-md min-w-[60%] min-h-[150px] mx-auto">
      <p class="text-lg font-semibold mb-2">
        <?php echo $note['post'] ?>
      </p>
    </div>
  </div>
</main>
<?php include 'partials/footer.php' ?>