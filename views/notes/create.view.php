<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>

<main>
  <div class="w-full h-[50px] flex justify-start items-center px-4">
    <a href="/notes" class='hover:underline'>Go Back</a>
  </div>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">


    <!-- Form -->

    <!--
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
    <form class='mx-auto max-w-2xl' method='POST' action=''>
      <div class="space-y-12">

        <div class="border-b border-gray-900/10 pb-12">

          <div class="mt-10 mx-auto flex flex-col justify-center items-center">
            <!-- Hidden input for user_id -->
            <input type="hidden" value="<?php echo $userId ?>" name="user_id" id="user_id" required />

            <div class="flex flex-col justify-center items-center w-full sm:max-w-[70%] aspect-square h-fit bg-yellow-200 p-4 rounded-md shadow-md block border-0 py-1.5">
              <div class="h-fit w-full">
                <input type="text" name="title" id="title" value="<?php echo $_POST['title'] ?? '' ?>" placeholder="Note Title (optional)" class="w-full py-2 px-2 text-lg placeholder:text-gray-400 font-semibold bg-yellow-200">
              </div>
              <hr class='border-gray-300 border-dashed' />
              <div class="mt-2 h-full w-full">
                <textarea placeholder='What do you want to note down?' id="post" name="post" class="w-full h-full px-2 resize-none border-0 overflow-scroll bg-yellow-200 font-normal text-gray-600 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><?php echo $_POST['post'] ?? '' ?></textarea>
              </div>

            </div>
            <div class="w-[70%] mt-6 flex flex-col items-center justify-end gap-x-6">
              <?php
              if (isset($errors['post'])) : ?>
                <div class="bg-gray-500/40 border-2 border-gray-800 rounded my-2 flex justify-center items-center text-sm italic w-full">

                  <p class="text-red-500 font-bold"><?php echo $errors['post'] ?></p>
                </div>
              <?php endif ?>
              <button type="submit" class="rounded-md bg-pink-500 w-full px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-pink-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-pink-600">Create Note</button>
            </div>


          </div>
        </div>

    </form>

  </div>
</main>
<?php include(__DIR__ . '/../partials/footer.php') ?>