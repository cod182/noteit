<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>

<main>
  <!-- Back Button -->
  <div class="w-full h-[50px] flex justify-start items-center px-4">
    <a href='/note?id=<?php echo $note['id'] ?>' class='group flex select-none justify-center items-center flex-row w-fit h-fit py-1 px-2 rounded bg-purple-300 text-black hover:bg-purple-600 hover:text-white hover:shadow-md transition-all duration-200 ease-in'>
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
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

    <form class='mx-auto max-w-2xl' method='POST' action='/note'>
      <input type="hidden" name="_method" value='PATCH'>
      <input type="hidden" name="id" value="<?php echo $note['id'] ?>">
      <div class="space-y-12">

        <div class="border-b border-gray-900/10 pb-12">

          <div class="mt-10 mx-auto flex flex-col items-center">
            <!-- Hidden input for user_id -->
            <input type="hidden" value="<?php echo $userId ?>" name="user_id" id="user_id" required />

            <div class="flex flex-col w-full sm:max-w-[70%] aspect-square h-fit bg-yellow-200 p-4 rounded-md shadow-md block border-0 py-1.5">
              <!-- Top Area -->
              <div class="flex flex-row justify-between items-center">

                <input type="text" name="title" id="title" value="<?php echo $note['title'] ?? '' ?>" placeholder="Note Title (optional)" class="w-full py-2 px-2 text-lg placeholder:text-gray-400 font-semibold bg-yellow-200 text-xl sm:text-lg text-gray-600 font-semibold mb-2">
              </div>





              <hr class='border-gray-300 border-dashed' />
              <div class="mt-2 h-full w-full">
                <textarea placeholder='What do you want to note down?' id="post" name="post" class="w-full h-full px-2 resize-none border-0 overflow-scroll bg-yellow-200 font-normal text-gray-600 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><?php echo $note['post'] ?? '' ?></textarea>
              </div>

            </div>
            <div class="w-[70%] mt-6 flex flex-col items-center justify-end gap-x-6">
              <?php
              if (isset($errors['post'])) : ?>
                <div class="bg-gray-500/40 border-2 border-gray-800 rounded my-2 flex justify-center items-center text-sm italic w-full">

                  <p class="text-red-500 font-bold"><?php echo $errors['post'] ?></p>
                </div>
              <?php endif ?>
              <!-- Buttons -->

              <button type="submit" class="m-1 rounded-md bg-blue-500 w-full px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-pink-600">Update Note</button>
              <a href='/note?id=<?php echo $note['id'] ?>' class="m-1 text-center rounded-md bg-gray-500/0 w-full px-3 py-1 border-2 text-gray-400 border-gray-400/60 hover:border-black hover:text-black text-sm font-semibold text-black shadow-sm hover:bg-gray-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-pink-600 transition-all duration-200 ease-in">Cancel</a>

            </div>


          </div>
        </div>

    </form>

    <div class="mx-auto max-w-md">
      <form method="POST" action="/note">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name=' id' value='<?php echo $note['id'] ?>'>
        <button type='submit' class='flex flex-col justify-center items-center aspect-square h-[30px] w-full text-xl rounded bg-gray-300/0 border-2 text-gray-400 border-gray-400/60 focus:bg-red-600 hover:text-gray-800 hover:bg-red-300 hover:border-gray-800 transition-all duration-200 ease-in'>Delete</button>
      </form>
    </div>

  </div>
</main>
<?php include(__DIR__ . '/../partials/footer.php') ?>