<?php
  ini_set('display_errors', 0);
  ini_set('display_startup_errors', 0);
  error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../style.css" />
  </head>
  <body class="bg-gray-100">
    <!-- Navbar Section Start -->
    <section class="shadow-lg font-poppins bg-white mb-16 max-lg:mb-8">
      <div class="max-w-6xl px-4 mx-auto" x-data="{open:false}">
        <div class="relative flex items-center justify-between py-4">
          <a href="#" class="text-2xl font-semibold leading-none"
            >Club Management</a
          >
          <div class="lg:hidden">
            <button
              class="flex items-center px-3 py-2 text-teal-600 border border-teal-200 rounded navbar-burger hover:text-teal-800 hover:border-teal-300 lg:hidden"
              @click="open =true"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                fill="currentColor"
                class="bi bi-list"
                viewBox="0 0 16 16"
              >
                <path
                  fill-rule="evenodd"
                  d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"
                />
              </svg>
            </button>
          </div>
          <ul class="hidden lg:w-auto lg:space-x-12 lg:items-center lg:flex">
            <li>
              <a href="../index.html" class="text-sm text-gray-700 hover:text-teal-700"
                >Home</a
              >
            </li>
            <li>
              <a href="" class="text-sm text-gray-700 hover:text-teal-700"
                >Clubs</a
              >
            </li>
            <li>
              <a href="" class="text-sm text-gray-700 hover:text-teal-700"
                >Events</a
              >
            </li>
            <li>
              <a href="../aboutus/index.html" class="text-sm text-gray-700 hover:text-teal-700"
                >About Us</a
              >
            </li>
          </ul>
          <div class="hidden lg:block">
            <a
              href="./index.php"
              class="inline-block px-4 py-3 mr-2 text-xs font-semibold leading-none text-teal-600 border border-teal-200 rounded hover:text-teal-700 hover:border-teal-300"
              >Log In</a
            >
            <a
              href="../registration/index.php"
              class="inline-block px-4 py-3 mr-2 text-xs font-semibold leading-none text-gray-100 bg-teal-600 border border-teal-200 rounded hover:bg-teal-700"
              >SignUp</a
            >
          </div>
        </div>

        <!-- Mobile Sidebar -->

        <div
          class="fixed inset-0 w-full bg-gray-900 opacity-25 lg:hidden"
          :class="{'translate-x-0 ease-in-opacity-100' :open===true, '-translate-x-full ease-out opacity-0' : open===false}"
        ></div>
        <div
          class="absolute inset-0 z-10 h-screen p-3 text-gray-400 duration-500 transform bg-teal-50 w-80 lg:hidden lg:transform-none lg:relative"
          :class="{'translate-x-0 ease-in-opacity-100' :open===true, '-translate-x-full ease-out opacity-0' : open===false}"
        >
          <div class="flex justify-between lg:">
            <a class="p-2 text-2xl font-bold text-gray-700" href="../index.html"
              >Club Management</a
            >
            <button
              class="p-2 text-gray-700 rounded-md hover:text-teal-300 lg:hidden"
              @click="open=false"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                fill="currentColor"
                class="bi bi-x-circle"
                viewBox="0 0 16 16"
              >
                <path
                  d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                />
                <path
                  d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"
                />
              </svg>
            </button>
          </div>
          <ul class="px-4 text-left mt-7">
            <li class="pb-3">
              <a href="" class="text-sm text-gray-700 hover:text-teal-400"
                >Home</a
              >
            </li>
            <li class="pb-3">
              <a href="" class="text-sm text-gray-700 hover:text-teal-400"
                >Clubs</a
              >
            </li>
            <li class="pb-3">
              <a href="" class="text-sm text-gray-700 hover:text-teal-400"
                >Events</a
              >
            </li>
            <li class="pb-3">
              <a href="../aboutus/index.html" class="text-sm text-gray-700 hover:text-teal-400"
                >About Us</a
              >
            </li>
          </ul>
          <div class="block mt-5 lg:hidden">
            <a
              href="./index.php"
              class="inline-block w-full px-4 py-3 mb-4 mr-2 text-xs font-semibold leading-none text-center text-teal-600 border border-teal-400 rounded hover:text-teal-700 hover:border-teal-300"
              >Log In</a
            >
            <a
              href="../registration/index.php"
              class="inline-block w-full px-4 py-3 mr-2 text-xs font-semibold leading-none text-center text-gray-100 bg-teal-600 rounded hover:bg-teal-700"
              >Sign Up
            </a>
          </div>
        </div>
      </div>
    </section>
    <!-- Navbar Section End -->
    <!-- Login Section Start -->
    <section class="">
      <div
        class="flex items-center p-4 bg-gray-100 lg:justify-center "
      >
        <div
          class="flex flex-col overflow-hidden bg-white rounded-md shadow-lg max md:flex-row md:flex-1 lg:max-w-screen-md"
        >
          <div
            class="p-4 py-6 text-white bg-teal-600 md:w-80 md:flex-shrink-0 md:flex md:flex-col md:items-center md:justify-evenly"
          >
            <div class="my-3 text-4xl font-bold tracking-wider text-center">
              <a href="#">Club Forum</a>
            </div>
            <p class="mt-6 font-normal text-center text-gray-300 md:mt-0">
              With the power of K-WD, you can now focus only on functionaries
              for your digital products, while leaving the UI design on us!
            </p>
            <p
              class="flex flex-col items-center justify-center mt-10 text-center"
            >
              <span>Don't have an account?</span>
              <a href="../registration/index.html" class="underline"
                >Get Started!</a
              >
            </p>
            <p class="mt-6 text-sm text-center text-gray-300">
              Read our <a href="#" class="underline">terms</a> and
              <a href="#" class="underline">conditions</a>
            </p>
          </div>
          <div class="p-5 bg-white md:flex-1">
            <h3 class="my-4 text-2xl font-semibold text-gray-700">
              Account Login
            </h3>
            <form
              action="./loginProcess.php"
              class="flex flex-col space-y-5"
              method="POST"
            >
              <div class="flex flex-col space-y-1">
                <label for="email" class="text-sm font-semibold text-gray-500"
                  >Email address</label
                >
                <input
                  type="email"
                  name="email"
                  id="email"
                  autofocus
                  class="px-4 py-2 transition duration-300 border border-gray-300 rounded focus:border-transparent focus:outline-none focus:ring-4 focus:ring-blue-200"
                  required
                />
              </div>
              <div class="flex flex-col space-y-1">
                <div class="flex items-center justify-between">
                  <label
                    for="password"
                    class="text-sm font-semibold text-gray-500"
                    >Password</label
                  >
                  <a
                    href="#"
                    class="text-sm text-teal-600 hover:underline focus:text-teal-600"
                    >Forgot Password?</a
                  >
                </div>
                <input
                  type="password"
                  name="password"
                  id="password"
                  class="px-4 py-2 transition duration-300 border border-gray-300 rounded focus:border-transparent focus:outline-none focus:ring-4 focus:ring-blue-200"
                  required
                />
              </div>
              <div class="flex justify-between">
                <div class="flex items-center space-x-2">
                  <input
                    type="checkbox"
                    id="remember"
                    class="w-4 h-4 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200"
                  />
                  <label
                    for="remember"
                    class="text-sm font-semibold text-gray-500"
                    >Remember me</label
                  >
                </div>
                <div class="text-red-600">
                  <?php
                  $message = $_GET['error'];
                ?>
                  <p class=""><?php echo $message; ?></p>
                </div>
              </div>
              <div>
                <button
                  type="submit"
                  class="w-full px-4 py-2 text-lg font-semibold text-white transition-colors duration-300 bg-teal-500 rounded-md shadow hover:bg-teal-600 focus:outline-none focus:ring-blue-200 focus:ring-4"
                >
                  Log in
                </button>
              </div>
              <div class="flex flex-col space-y-5">
                <span class="flex items-center justify-center space-x-2">
                  <span class="h-px bg-gray-400 w-14"></span>
                  <span class="font-normal text-gray-500">or login with</span>
                  <span class="h-px bg-gray-400 w-14"></span>
                </span>
                <div class="flex flex-col space-y-4">
                  <a
                    href="#"
                    class="flex items-center justify-center px-4 py-2 space-x-2 transition-colors duration-300 border border-gray-800 rounded-md group hover:bg-gray-800 focus:outline-none"
                  >
                    <span>
                      <svg
                        class="w-5 h-5 text-gray-800 fill-current group-hover:text-white"
                        viewBox="0 0 16 16"
                        version="1.1"
                        aria-hidden="true"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z"
                        ></path>
                      </svg>
                    </span>
                    <span
                      class="text-sm font-medium text-gray-800 group-hover:text-white"
                      >Github</span
                    >
                  </a>
                  <a
                    href="#"
                    class="flex items-center justify-center px-4 py-2 space-x-2 transition-colors duration-300 border border-teal-500 rounded-md group hover:bg-teal-500 focus:outline-none"
                  >
                    <span>
                      <svg
                        class="text-teal-500 group-hover:text-white"
                        width="20"
                        height="20"
                        fill="currentColor"
                      >
                        <path
                          d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84"
                        ></path>
                      </svg>
                    </span>
                    <span
                      class="text-sm font-medium text-teal-500 group-hover:text-white"
                      >Twitter</span
                    >
                  </a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- Login Section End -->
    <footer>
      <?php
        include('../footer/footer.php');
      ?>
    </footer>

    <!-- Script Section -->
    <script
      defer
      src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"
    ></script>
  </body>
</html>
