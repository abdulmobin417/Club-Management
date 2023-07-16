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
    <style>
      input::file-selector-button {
        font-weight: bold;
        color: white;
        padding: 0.9em;
        border: 2px solid #242424;
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;
        background-color: #242424;
        margin-right: 10px;
      }
    </style>
  </head>
  <body>
    <!-- Navbar Section Start -->
    <section class="shadow-lg font-poppins bg-white">
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
              <a
                href="../index.html"
                class="text-sm text-gray-700 hover:text-teal-700"
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
              href="../login/index.php"
              class="inline-block px-4 py-3 mr-2 text-xs font-semibold leading-none text-teal-600 border border-teal-200 rounded hover:text-teal-700 hover:border-teal-300"
              >Log In</a
            >
            <a
              href="./index.php"
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
            <a class="p-2 text-2xl font-bold text-gray-700" href="#"
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
              href="../login/index.php"
              class="inline-block w-full px-4 py-3 mb-4 mr-2 text-xs font-semibold leading-none text-center text-teal-600 border border-teal-400 rounded hover:text-teal-700 hover:border-teal-300"
              >Log In</a
            >
            <a
              href="./index.php"
              class="inline-block w-full px-4 py-3 mr-2 text-xs font-semibold leading-none text-center text-gray-100 bg-teal-600 rounded hover:bg-teal-700"
              >Sign Up
            </a>
          </div>
        </div>
      </div>
    </section>
    <!-- Navbar Section End -->

    <!-- Registration Section Start -->
    <section class="bg-teal-500 max-w-7xl mx-auto">
      <div class="flex justify-center min-h-screen">
        <div
          class="hidden bg-cover lg:block lg:w-2/5"
          style="
            background-image: url('https://www.uiu.ac.bd/wp-content/uploads/2021/03/Banner-3.jpg');
          "
        ></div>

        <div class="flex items-center w-full max-w-3xl mx-auto lg:w-3/5">
          <div class="w-full border border-white p-8 mx-4 rounded-lg">
            <h1
              class="text-3xl font-semibold text-white tracking-wider capitalize"
            >
              Get your free account now.
            </h1>

            <p class="mt-4 text-gray-200">
              Let’s get you all set up so you can verify your personal account
              and begin setting up your profile.
            </p>

            <div class="mt-6 text-white text-center text-2xl font-bold">
              Sign Up Form
            </div>

            <form
              action="./signUpProcess.php"
              method="POST"
              enctype="multipart/form-data"
              class="grid grid-cols-1 gap-6 mt-4 md:grid-cols-2"
            >
              <div class="col-span-2">
                <label class="block mb-2 text-lg font-semibold text-gray-200" for="small_size">Upload File</label>
                <input class="block w-full text-xs text-gray-900 rounded-lg cursor-pointer bg-gray-50" id="small_size" type="file" name="file">
              </div>

              <div>
                <label class="block mb-2 text-sm text-gray-200"
                  >First Name</label
                >
                <input
                  type="text"
                  name="firstName"
                  placeholder="John"
                  class="block w-full px-5 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                />
              </div>

              <div>
                <label class="block mb-2 text-sm text-gray-200"
                  >Last name</label
                >
                <input
                  type="text"
                  name="lastName"
                  placeholder="Snow"
                  class="block w-full px-5 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                />
              </div>

              <div>
                <label class="block mb-2 text-sm text-gray-200"
                  >Phone number</label
                >
                <input
                  type="text"
                  name="phone"
                  placeholder="XXX-XX-XXXX-XXX"
                  class="block w-full px-5 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                />
              </div>

              <div>
                <label class="block mb-2 text-sm text-gray-200"
                  >Email address</label
                >
                <input
                  type="email"
                  name="email"
                  placeholder="johnsnow@example.com"
                  class="block w-full px-5 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                />
              </div>

              <div>
                <label class="block mb-2 text-sm text-gray-200">Password</label>
                <input
                  type="password"
                  name="password"
                  placeholder="Enter your password"
                  class="block w-full px-5 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                />
              </div>

              <div>
                <label class="block mb-2 text-sm text-gray-200"
                  >Confirm password</label
                >
                <input
                  type="password"
                  name="confirmPassword"
                  placeholder="Enter your password"
                  class="block w-full px-5 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                />
              </div>

              <button
                class="flex items-center justify-between w-full px-6 py-3 text-sm tracking-wide text-gray-100 capitalize transition-colors duration-300 transform bg-black rounded-md hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50"
              >
                <span>Sign Up </span>

                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="w-5 h-5 rtl:-scale-x-100"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                >
                  <path
                    fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd"
                  />
                </svg>
              </button>
              <div class="text-red-600">
                <?php
                  $message = $_GET['error'];
                ?>
                <p class=""><?php echo $message; ?></p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- Registration Section End -->

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
