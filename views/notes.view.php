<?php include 'partials/head.php' ?>

<?php include 'partials/nav.php' ?>

<?php include 'partials/banner.php' ?>
<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8 ">
    <div class='grid md:grid-cols-4 sm:grid-cols-2 grid-cols-1 gap-2 mx-auto'>
      <?php
      foreach ($notes as $note) : ?>
        <a href="/noteit/note?id=<?php echo $note['id'] ?>" class="hover:bg-yellow-300 bg-yellow-200 p-4 rounded-md shadow-md max-w-md max-w-full min-w-[80%] mx-auto min-h-[150px]">
          <p class="text-lg font-semibold mb-2">
            <?php echo $note['post'] ?>
          </p>
        </a>

      <?php endforeach;
      ?>
    </div>
  </div>
</main>
<?php include 'partials/footer.php' ?>