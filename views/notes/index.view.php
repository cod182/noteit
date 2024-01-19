<?php include(__DIR__ . '/../partials/head.php') ?>
<?php include(__DIR__ . '/../partials/nav.php') ?>
<?php include(__DIR__ . '/../partials/banner.php') ?>
<main>
  <div class="mx-auto max-w-7xl px-2 py-6 sm:px-6 lg:px-8 ">
    <div class='grid md:grid-cols-4 sm:grid-cols-3 grid-cols-1 gap-2 mx-auto'>
      <?php
      foreach ($notes as $note) : ?>
        <a href="/noteit/note?id=<?php echo $note['id'] ?>" class="overflow-scroll aspect-square rounded-lg bg-yellow-200 hover:bg-yellow-300 py-3 px-6 w-full text-start font-sans text-xs font-bold uppercase text-black shadow-md shadow-yellow-500/20 transition-all hover:shadow-lg hover:shadow-yellow-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none cursor-pointer">
          <p class="text-lg text-gray-600 font-semibold mb-2">
            <?php echo htmlspecialchars($note['title']) ?>
          </p>
          <p class="text-md text-gray-600 font-normal mb-2">
            <?php echo htmlspecialchars($note['post']) ?>
          </p>
        </a>

      <?php endforeach ?>


      <a href='noteit/notes/create' class="flex select-none justify-center items-center gap-3 rounded-lg bg-pink-500 hover:bg-pink-600 py-3 px-6 w-full text-center align-middle font-sans text-md font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" class="h-5 w-5">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z"></path>
        </svg>
        Create Note
      </a>


    </div>
  </div>
</main>
<?php include(__DIR__ . '/../partials/footer.php') ?>