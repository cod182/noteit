<?php include 'partials/head.php' ?>

<?php include 'partials/nav.php' ?>

<div class="bg-gradient-to-r from-purple-300 to-blue-200">
  <div class="w-9/12 m-auto py-16 min-h-screen flex items-center justify-center">
    <div class="bg-white shadow overflow-hidden sm:rounded-lg pb-8">
      <div class="border-t border-gray-200 text-center pt-8">
        <h1 class="text-9xl font-bold text-purple-400"><?php echo $statusCode ?></h1>
        <?php switch ($statusCode):
          case 400: ?>
            <h1 class="text-6xl font-medium py-8">Bad Request!</h1>
            <p class="text-2xl pb-8 px-12 font-medium">The server cannot or will not process the request due to an apparent client error.</p>
            <a href="/noteit/" class="bg-gradient-to-r from-purple-400 to-blue-500 hover:from-pink-500 hover:to-orange-500 text-white font-semibold px-6 py-3 rounded-md mr-6">
              HOME
              </button>
            <?php
            die();

          case 401: ?>
              <h1 class="text-6xl font-medium py-8">Unauthorized</h1>
              <p class="text-2xl pb-8 px-12 font-medium">You are not authorised to access this page.</p>
              <a href="/noteit/" class="bg-gradient-to-r from-purple-400 to-blue-500 hover:from-pink-500 hover:to-orange-500 text-white font-semibold px-6 py-3 rounded-md mr-6">
                HOME
                </button>
              <?php
              die();



            case 403: ?>
                <h1 class="text-6xl font-medium py-8">Forbidden</h1>
                <p class="text-2xl pb-8 px-12 font-medium">The request contained valid data and was understood by the server, but the server is refusing action.</p>
                <a href="/noteit/" class="bg-gradient-to-r from-purple-400 to-blue-500 hover:from-pink-500 hover:to-orange-500 text-white font-semibold px-6 py-3 rounded-md mr-6">
                  HOME
                  </button>
                <?php
                die();

              case 404: ?>
                  <h1 class="text-6xl font-medium py-8">oops! Page not found</h1>
                  <p class="text-2xl pb-8 px-12 font-medium">Oops! The page you are looking for does not exist. It might have been moved or deleted.</p>
                  <a href="/noteit/" class="bg-gradient-to-r from-purple-400 to-blue-500 hover:from-pink-500 hover:to-orange-500 text-white font-semibold px-6 py-3 rounded-md mr-6">
                    HOME
                    </button>

                  <?php
                  die();
                case 500: ?>
                    <h1 class="text-6xl font-medium py-8">Internal Server Error</h1>
                    <p class="text-2xl pb-8 px-12 font-medium">Looks like something is wrong with the server.</p>
                    <a href="/noteit/" class="bg-gradient-to-r from-purple-400 to-blue-500 hover:from-pink-500 hover:to-orange-500 text-white font-semibold px-6 py-3 rounded-md mr-6">
                      HOME
                      </button>
                  <?php
                  die();

              endswitch ?>


      </div>
    </div>
  </div>
</div>
<?php include 'partials/footer.php' ?>