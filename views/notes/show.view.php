<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>
<main>
  <!-- Back Button -->
  <div class="w-full h-[50px] flex justify-start items-center px-4">
    <a href="/notes" class='group flex select-none justify-center items-center flex-row w-fit h-fit py-1 px-2 rounded bg-purple-300 text-black hover:bg-purple-600 hover:text-white hover:shadow-md transition-all duration-200 ease-in'>
      <svg fill="#000000" class='w-[15px] h-[15px] group-hover:fill-white transition-all duration-200 ease-in' version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 490 490" xml:space="preserve">
        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
        <g id="SVGRepo_iconCarrier">
          <g>
            <g>
              <polygon points="332.668,490 82.631,244.996 332.668,0 407.369,76.493 235.402,244.996 407.369,413.507 "></polygon>
            </g>

          </g>
        </g>
      </svg>
      Go Back</a>
  </div>

  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8 ">

    <!-- Note Container -->
    <div class="overflow-scroll aspect-square mx-auto bg-yellow-200 p-4 rounded-md shadow-md max-w-md min-w-[60%] min-h-[150px] mx-auto">

      <!-- Top Area -->
      <div class="flex flex-row justify-between items-center">

        <!-- Title -->
        <p class="text-xl sm:text-lg text-gray-600 font-semibold mb-2">
          <?php echo htmlspecialchars($note['title']) ?>
        </p>
        <div class='flex flex-row justify-spec items-center'>
          <!-- Edit Button -->
          <a href="/note/edit?id=<?php echo $note['id'] ?>" class='p-1 mx-1 flex flex-col justify-center items-center aspect-square h-[30px] text-xl rounded bg-gray-300/0 border-2 text-gray-400 border-gray-400/60 focus:bg-blue-600 hover:text-gray-800 hover:bg-blue-300 hover:border-gray-800 transition-all duration-200 ease-in''>
<svg class="feather feather-edit" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
        </a>

          <!-- Delete Button -->
          <form method=' POST' action='/note'>
            <input type="hidden" name="_method" value='DELETE'>
            <input type="hidden" name=' id' value='<?php echo $note['id'] ?>'>
            <button type='submit' class='mx-1 flex flex-col justify-center items-center aspect-square h-[30px] text-xl rounded bg-gray-300/0 border-2 text-gray-400 border-gray-400/60 focus:bg-red-600 hover:text-gray-800 hover:bg-red-300 hover:border-gray-800 transition-all duration-200 ease-in'>X</button>
            </form>
        </div>
      </div>

      <!-- Post Body -->
      <p class="text-lg sm:text-md text-gray-600 font-normal mb-2">
        <?php echo htmlspecialchars($note['post']) ?>
      </p>
    </div>
  </div>
</main>
<?php include(__DIR__ . '/../partials/footer.php') ?>