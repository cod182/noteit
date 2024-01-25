<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<main>
  <div class="mx-auto max-w-7xl px-2 py-6 sm:px-6 lg:px-8 ">


    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
      <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Register a new account</h2>
      </div>

      <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" action="/register" method="POST">
          <div>
            <div class="">
              <!-- Email Field -->
              <input placeholder='Email Address' id="email" name="email" type="email" autocomplete="email" value="<?php echo $_POST['email'] ?? '' ?>" class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              <?php
              if (!empty($errors['email'])) : ?>
                <p class="text-red-500 text-xs italic"><?php echo $errors['email'] ?></p>
              <?php endif ?>
            </div>
          </div>
          <div>
            <div class="">
              <!-- Password Field -->
              <input id="password" name="password" type="password" autocomplete="current-password" placeholder='Password' value="<?php echo $_POST['password'] ?? '' ?>" class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              <?php
              if (!empty($errors['password'])) : ?>


                <p class="text-red-500 text-xs italic"><?php echo $errors['password'] ?></p>

              <?php endif ?>
            </div>
          </div>



          <div>
            <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Register</button>
          </div>
        </form>
      </div>
    </div>



  </div>
</main>
<?php include(__DIR__ . '/../partials/footer.php') ?>