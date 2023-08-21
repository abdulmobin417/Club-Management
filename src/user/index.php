<?php
  require_once('../db/db.php');
	session_start();
	if (!isset($_SESSION['userId'])){
		header('location:../login/index.php');
	}
  $userId = $_SESSION['userId'];
  $query = "SELECT * FROM `users` WHERE userId = '$userId';";
  $createQuery = mysqli_query($conn, $query);
  $userData = mysqli_fetch_array($createQuery);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../style.css" />
    <link
      href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css"
      rel="stylesheet"
    />
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
  </head>
  <body>
    <!-- Navbar Section Start -->
    <section class="shadow-lg font-poppins">
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
              <a href="" class="text-sm text-gray-700 hover:text-teal-700"
                >Home</a
              >
            </li>
            <li>
              <a href="./clubList/index.php" class="text-sm text-gray-700 hover:text-teal-700"
                >Clubs</a
              >
            </li>
            <li>
              <a href="./eventList/index.php" class="text-sm text-gray-700 hover:text-teal-700"
                >Events</a
              >
            </li>
            <li>
              <a href="" class="text-sm text-gray-700 hover:text-teal-700"
                >About Us</a
              >
            </li>
          </ul>
          <div class="hidden lg:block z-10">
            <div class="max-w-6xl px-4 mx-auto">
              <div
                x-data="{ open: false }"
                class="relative inline-block text-left"
              >
                <div>
                  <button
                    x-on:click="open = true"
                    type="button"
                    class="inline-flex justify-center items-center w-full px-4 py-2 text-sm font-medium text-teal-700 border border-teal-300 rounded-md shadow-sm bg-gray-50 hover:bg-teal-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-teal-500"
                  >
                    <div>
                      <a
                        href="#"
                        class="flex px-4 py-2 text-sm text-gray-700 hover:text-teal-500"
                      >
                        <span class="mr-2">
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="16"
                            height="16"
                            fill="currentColor"
                            class="w-4 h-4 bi bi-person-circle"
                            viewBox="0 0 16 16"
                          >
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path
                              fill-rule="evenodd"
                              d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"
                            />
                          </svg> </span
                        ><?php echo $userData['LastName']; ?></a
                      >
                    </div>
                    <svg
                      class="w-4 h-4 fill-current hover:text-teal-500"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 20 20"
                      :class="{'rotate-180': open, 'rotate-0': !open}"
                    >
                      <path
                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                      />
                    </svg>
                  </button>
                </div>
                <div
                  x-show="open"
                  x-on:click.away="open = false"
                  class="absolute right-0 w-56 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                >
                  <div class="py-1">
                    <a
                      href="./clubCreate/index.php"
                      class="flex px-4 py-2 text-sm text-gray-700 hover:text-teal-500"
                    >
                      <span class="mr-2">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="16"
                          height="16"
                          viewBox="0 0 24 24"
                          fill="none"
                          stroke="#000000"
                          stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        >
                          <path
                            d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"
                          ></path>
                          <polygon
                            points="18 2 22 6 12 16 8 16 8 12 18 2"
                          ></polygon>
                        </svg> </span
                      >Create Club</a
                    >
                  </div>
                  <div class="py-1">
                    <a
                      href="./profile/index.php"
                      class="flex px-4 py-2 text-sm text-gray-700 hover:text-teal-500"
                    >
                      <span class="mr-2">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="16"
                          height="16"
                          fill="currentColor"
                          class="w-4 h-4 bi bi-gear"
                          viewBox="0 0 16 16"
                        >
                          <path
                            d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"
                          />
                          <path
                            d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"
                          />
                        </svg> </span
                      >View Profile</a
                    >
                  </div>
                  <div class="py-1">
                    <a
                      href="../logout/logout.php"
                      class="flex px-4 py-2 text-sm text-gray-700 hover:text-teal-500"
                    >
                      <span class="mr-2">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="16"
                          height="16"
                          fill="currentColor"
                          class="w-4 h-4 hover:text-teal-500 bi bi-box-arrow-right"
                          viewBox="0 0 16 16"
                        >
                          <path
                            fill-rule="evenodd"
                            d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"
                          />
                          <path
                            fill-rule="evenodd"
                            d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"
                          />
                        </svg> </span
                      >Logout</a
                    >
                  </div>
                </div>
              </div>
            </div>
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
              <a href="" class="text-sm text-gray-700 hover:text-teal-400"
                >About Us</a
              >
            </li>
          </ul>
          <div class="block mt-5 lg:hidden">
            <div class="max-w-6xl px-4 mx-auto">
              <div
                x-data="{ open: false }"
                class="relative inline-block text-left"
              >
                <div>
                  <button
                    x-on:click="open = true"
                    type="button"
                    class="inline-flex justify-center items-center w-full px-4 py-2 text-sm font-medium text-teal-700 border border-teal-300 rounded-md shadow-sm bg-gray-50 hover:bg-teal-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-teal-500"
                  >
                    <div>
                      <a
                        href="#"
                        class="flex px-4 py-2 text-sm text-gray-700 hover:text-teal-500"
                      >
                        <span class="mr-2">
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="16"
                            height="16"
                            fill="currentColor"
                            class="w-4 h-4 bi bi-person-circle"
                            viewBox="0 0 16 16"
                          >
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path
                              fill-rule="evenodd"
                              d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"
                            />
                          </svg> </span
                        >Profile</a
                      >
                    </div>
                    <svg
                      class="w-4 h-4 fill-current hover:text-teal-500"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 20 20"
                      :class="{'rotate-180': open, 'rotate-0': !open}"
                    >
                      <path
                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                      />
                    </svg>
                  </button>
                </div>
                <div
                  x-show="open"
                  x-on:click.away="open = false"
                  class="absolute right-0 left-0 w-56 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                >
                  <div class="py-1">
                    <a
                      href="#"
                      class="flex px-4 py-2 text-sm text-gray-700 hover:text-teal-500"
                    >
                      <span class="mr-2">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="16"
                          height="16"
                          viewBox="0 0 24 24"
                          fill="none"
                          stroke="#000000"
                          stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        >
                          <path
                            d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"
                          ></path>
                          <polygon
                            points="18 2 22 6 12 16 8 16 8 12 18 2"
                          ></polygon>
                        </svg> </span
                      >Create Club</a
                    >
                  </div>
                  <div class="py-1">
                    <a
                      href="#"
                      class="flex px-4 py-2 text-sm text-gray-700 hover:text-teal-500"
                    >
                      <span class="mr-2">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="16"
                          height="16"
                          fill="currentColor"
                          class="w-4 h-4 bi bi-gear"
                          viewBox="0 0 16 16"
                        >
                          <path
                            d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"
                          />
                          <path
                            d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"
                          />
                        </svg> </span
                      >Edit Profile</a
                    >
                  </div>
                  <div class="py-1">
                    <a
                      href="../logout/logout.php"
                      class="flex px-4 py-2 text-sm text-gray-700 hover:text-teal-500"
                    >
                      <span class="mr-2">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="16"
                          height="16"
                          fill="currentColor"
                          class="w-4 h-4 hover:text-teal-500 bi bi-box-arrow-right"
                          viewBox="0 0 16 16"
                        >
                          <path
                            fill-rule="evenodd"
                            d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"
                          />
                          <path
                            fill-rule="evenodd"
                            d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"
                          />
                        </svg> </span
                      >Logout</a
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Navbar Section End -->

    <!-- Header Section Start -->
    <header class="relative overflow-hidden max-w-7xl mx-auto my-10 z-0">
      <div
        class="relative flex items-center justify-center w-full text-center bg-center bg-cover xl:rounded-xl"
        style="
          background-image: url(https://wp-media.petersons.com/blog/wp-content/uploads/2019/11/04133514/Student-Club-2.jpg);
          height: 600px;
        "
      >
        <div class="mx-4">
          <div class="z-10 max-w-3xl p-6 bg-gray-900 md:p-16 opacity-80">
            <div class="text-center">
              <h2
                class="mb-6 text-4xl font-medium leading-10 tracking-tight text-gray-50 md:text-6xl"
              >
                Community, Growth, Excellence
              </h2>
              <p
                class="mb-6 tracking-wide text-gray-300 sm:mt-5 sm:text-md sm:max-w-xl sm:mx-auto md:mt-5"
              >
                Clubs provide a valuable platform for students to engage,
                explore, and collaborate, fostering a holistic learning
                environment beyond the classroom.
              </p>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- Header Section End -->

    <main>
      <!-- Club Section Start -->
      <section class="max-w-7xl mx-auto">
        <div class="flex items-center py-16 font-poppins">
          <div class="container p-4 mx-auto">
            <h2 class="pb-4 text-4xl font-bold text-center text-teal-500">
              Clubs
            </h2>
            <div class="mx-auto mb-10 border-b border-red-700 w-12"></div>
            <div
              class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-8 gap-5"
            >
              <a href="#" class="relative overflow-hidden shadow-lg group">
                <img
                  src="../images/comc.png"
                  class="group-hover:origin-center group-hover:scale-105 transition inset-0 object-cover object-center duration-500 w-full h-[350px]"
                  alt=""
                />
                <div
                  class="absolute inset-0 z-0 group-hover:bg-black opacity-60"
                ></div>
                <div
                  class="absolute hidden p-4 text-center content left-4 bottom-4 right-4 group-hover:block"
                >
                  <h1 class="mb-2 text-2xl font-semibold text-gray-200">
                    Computer Club
                  </h1>
                  <h2 class="mb-0 text-sm font-light text-gray-300">
                    UIU Computer Club is a prestigious club of UIU. It offers
                    diverse and exciting events throughout the year.
                  </h2>
                </div>
              </a>
              <a href="#" class="relative overflow-hidden shadow-lg group">
                <img
                  src="../images/dc.png"
                  class="group-hover:origin-center group-hover:scale-105 transition inset-0 object-cover object-center duration-500 w-full h-[350px]"
                  alt=""
                />
                <div
                  class="absolute inset-0 z-0 group-hover:bg-black opacity-60"
                ></div>
                <div
                  class="absolute hidden p-4 text-center content left-4 bottom-4 right-4 group-hover:block"
                >
                  <h1 class="mb-2 text-2xl font-semibold text-gray-200">
                    Debate Club
                  </h1>
                  <h2 class="mb-0 text-sm font-light text-gray-300">
                    Debate Club fosters critical thinking and persuasive skills,
                    shaping articulate leaders of tomorrow.
                  </h2>
                </div>
              </a>
              <a href="#" class="relative overflow-hidden shadow-lg group">
                <img
                  src="../images/culc.jpg"
                  class="group-hover:origin-center group-hover:scale-105 transition inset-0 object-cover object-center duration-500 w-full h-[350px]"
                  alt=""
                />
                <div
                  class="absolute inset-0 z-0 group-hover:bg-black opacity-60"
                ></div>
                <div
                  class="absolute hidden p-4 text-center content left-4 bottom-4 right-4 group-hover:block"
                >
                  <h1 class="mb-2 text-2xl font-semibold text-gray-200">
                    Cultural Club
                  </h1>
                  <h2 class="mb-0 text-sm font-light text-gray-300">
                    The Cultural Club celebrates diversity, promoting
                    cross-cultural understanding and appreciation through
                    vibrant experiences.
                  </h2>
                </div>
              </a>
              <a href="#" class="relative overflow-hidden shadow-lg group">
                <img
                  src="../images/mc.jpg"
                  class="group-hover:origin-center group-hover:scale-105 transition inset-0 object-cover object-center duration-500 w-full h-[350px]"
                  alt=""
                />
                <div
                  class="absolute inset-0 z-0 group-hover:bg-black opacity-60"
                ></div>
                <div
                  class="absolute hidden p-4 text-center content left-4 bottom-4 right-4 group-hover:block"
                >
                  <h1 class="mb-2 text-2xl font-semibold text-gray-200">
                    Model United Nation Club
                  </h1>
                  <h2 class="mb-0 text-sm font-light text-gray-300">
                    Model United Nations Club empowers students to simulate
                    global diplomacy, fostering collaboration and
                    problem-solving for a better world.
                  </h2>
                </div>
              </a>
              <a href="#" class="relative overflow-hidden shadow-lg group">
                <img
                  src="../images/bc.jpg"
                  class="group-hover:origin-center group-hover:scale-105 transition inset-0 object-cover object-center duration-500 w-full h-[350px]"
                  alt=""
                />
                <div
                  class="absolute inset-0 z-0 group-hover:bg-black opacity-60"
                ></div>
                <div
                  class="absolute hidden p-4 text-center content left-4 bottom-4 right-4 group-hover:block"
                >
                  <h1 class="mb-2 text-2xl font-semibold text-gray-200">
                    Business Club
                  </h1>
                  <h2 class="mb-0 text-sm font-light text-gray-300">
                    The Business Club cultivates entrepreneurial spirit and
                    business acumen, empowering future leaders to thrive in the
                    world of commerce.
                  </h2>
                </div>
              </a>
              <a href="#" class="relative overflow-hidden shadow-lg group">
                <img
                  src="../images/pc.jpg"
                  class="group-hover:origin-center group-hover:scale-105 transition inset-0 object-cover object-center duration-500 w-full h-[350px]"
                  alt=""
                />
                <div
                  class="absolute inset-0 z-0 group-hover:bg-black opacity-60"
                ></div>
                <div
                  class="absolute hidden p-4 text-center content left-4 bottom-4 right-4 group-hover:block"
                >
                  <h1 class="mb-2 text-2xl font-semibold text-gray-200">
                    Photography Club
                  </h1>
                  <h2 class="mb-0 text-sm font-light text-gray-300">
                    The Photography Club captures moments, sparks creativity,
                    and paints a vivid tapestry of the world through the lens.
                  </h2>
                </div>
              </a>
              <a href="#" class="relative overflow-hidden shadow-lg group">
                <img
                  src="../images/sc.jpg"
                  class="group-hover:origin-center group-hover:scale-105 transition inset-0 object-cover object-center duration-500 w-full h-[350px]"
                  alt=""
                />
                <div
                  class="absolute inset-0 z-0 group-hover:bg-black opacity-60"
                ></div>
                <div
                  class="absolute hidden p-4 text-center content left-4 bottom-4 right-4 group-hover:block"
                >
                  <h1 class="mb-2 text-2xl font-semibold text-gray-200">
                    Sports Club
                  </h1>
                  <h2 class="mb-0 text-sm font-light text-gray-300">
                    The Sports Club ignites passion, promotes teamwork, and
                    embraces the pursuit of physical excellence for a healthy
                    and spirited community.
                  </h2>
                </div>
              </a>
              <a href="#" class="relative overflow-hidden shadow-lg group">
                <img
                  src="../images/rc.jpg"
                  class="group-hover:origin-center group-hover:scale-105 transition inset-0 object-cover object-center duration-500 w-full h-[350px]"
                  alt=""
                />
                <div
                  class="absolute inset-0 z-0 group-hover:bg-black opacity-60"
                ></div>
                <div
                  class="absolute hidden p-4 text-center content left-4 bottom-4 right-4 group-hover:block"
                >
                  <h1 class="mb-2 text-2xl font-semibold text-gray-200">
                    Robotics Club
                  </h1>
                  <h2 class="mb-0 text-sm font-light text-gray-300">
                    The Robotics Club sparks innovation and engineering prowess,
                    inspiring students to push the boundaries of technology and
                    automation.
                  </h2>
                </div>
              </a>
            </div>
          </div>
        </div>
        <div class="flex justify-center">
          <a href="./clubList/index.php">
            <button
              class="py-3 px-12 rounded-md bg-teal-200 hover:bg-teal-300 text-lg font-bold"
            >
              View All
            </button>
          </a>
        </div>
      </section>
      <!-- Club Section End -->

      <!-- Features Section Start -->
      <section class="flex items-center font-poppins max-w-7xl mx-auto my-20">
        <div
          class="justify-center flex-1 max-w-6xl px-4 py-4 mx-auto lg:py-6 md:px-6"
        >
          <h2
            class="pb-2 text-xl font-bold text-center text-gray-800 md:text-3xl"
          >
            Our Features
          </h2>
          <div class="w-20 mx-auto mb-8 border-b border-red-700"></div>
          <div class="flex flex-wrap justify-center -mx-4">
            <div class="w-full px-4 mb-6 md:w-1/2 lg:w-1/3">
              <div
                class="h-full p-6 text-center transition duration-200 rounded-md shadow bg-gray-50 hover:bg-white hover:shadow-xl"
              >
                <div
                  class="inline-flex items-center justify-center w-16 h-16 mx-auto mb-6 bg-teal-500 rounded-lg text-gray-50"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="16"
                    height="16"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="#ffffff"
                    class="w-5 h-5 bi bi-bank2"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  >
                    <path
                      d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"
                    ></path>
                    <polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon>
                  </svg>
                </div>
                <h2 class="mb-4 text-xl font-bold leading-tight md:text-2xl">
                  Create Club
                </h2>
                <p class="font-medium text-gray-600">
                  Creating a club in club management involves envisioning a
                  collective passion, assembling like-minded individuals, and
                  orchestrating a platform for collaboration, growth, and shared
                  accomplishments.
                </p>
              </div>
            </div>
            <div class="w-full px-4 mb-6 md:w-1/2 lg:w-1/3">
              <div
                class="h-full p-6 text-center transition duration-200 rounded-md shadow bg-gray-50 hover:bg-white hover:shadow-xl"
              >
                <div
                  class="inline-flex items-center justify-center w-16 h-16 mx-auto mb-6 bg-teal-500 rounded-lg text-gray-50"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="16"
                    height="16"
                    class="w-5 h-5 bi bi-bar-chart"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="#ffffff"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  >
                    <circle cx="12" cy="12" r="3"></circle>
                    <path
                      d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"
                    ></path>
                  </svg>
                </div>
                <h2 class="mb-4 text-xl font-bold leading-tight md:text-2xl">
                  Manage Club
                </h2>
                <p class="font-medium text-gray-600">
                  Managing a club entails coordinating activities, fostering a
                  sense of community, facilitating effective communication, and
                  nurturing the growth and development of members to create a
                  thriving and engaging club experience.
                </p>
              </div>
            </div>
            <div class="w-full px-4 mb-6 md:w-1/2 lg:w-1/3">
              <div
                class="h-full p-6 text-center transition duration-200 rounded-md shadow bg-gray-50 hover:bg-white hover:shadow-xl"
              >
                <div
                  class="inline-flex items-center justify-center w-16 h-16 mx-auto mb-6 bg-teal-500 rounded-lg text-gray-50"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="16"
                    height="16"
                    class="w-5 h-5 bi bi-map"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="#ffffff"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  >
                    <path
                      d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"
                    ></path>
                    <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                  </svg>
                </div>
                <h2 class="mb-4 text-xl font-bold leading-tight md:text-2xl">
                  Event Organize
                </h2>
                <p class="font-medium text-gray-600">
                  Event organized by a club involves the club members
                  collaborating and leveraging their skills, creativity, and
                  resources to plan, execute, and deliver a well-structured and
                  engaging event that aligns with the club's objectives, caters
                  to the interests of the target audience, and leaves a positive
                  impact on the attendees.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Features Section End -->

      <!-- Event Section Start -->
      <section>
        <div class="flex items-center font-poppins mb-16">
          <div class="justify-center max-w-6xl px-4 py-4 mx-auto lg:py-0">
            <h2
              class="pb-2 text-xl font-bold text-center text-gray-800 md:text-3xl"
            >
              Events
            </h2>
            <div class="w-20 mx-auto mb-8 border-b border-red-700"></div>
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-3 md:grid-cols-2">
              <div class="relative shadow-md">
                <img
                  src="https://i.postimg.cc/s2tvtrPF/first.jpg"
                  alt=""
                  class="object-cover w-full h-64"
                />
                <div class="absolute top-0 p-2 m-2 bg-red-600">
                  <a href="" class="text-sm text-white">Computer Club</a>
                </div>
                <a href="#" class="p-3 block">
                  <div class="mb-2 text-xs text-gray-600">
                    Posted in <span class="font-bold">Jan 16,2023</span>
                  </div>
                  <h3 class="text-xl font-bold tracking-tight text-gray-900">
                    The team of professionals Lorem ipsum dolor sit amet
                    consectetur adipisicing elit.
                  </h3>
                  <p class="py-2 font-normal text-gray-600">
                    lorem ipsum dor amit isoeirspus soiduitrsas orem ipsum dor
                    ami
                  </p>
                  <div class="flex items-center gap-3">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="16"
                      height="16"
                      class="w-5 h-5 bi bi-bank2"
                      viewBox="0 0 24 24"
                      fill="none"
                      stroke="#14b8a6"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    >
                      <rect
                        x="3"
                        y="4"
                        width="18"
                        height="18"
                        rx="2"
                        ry="2"
                      ></rect>
                      <line x1="16" y1="2" x2="16" y2="6"></line>
                      <line x1="8" y1="2" x2="8" y2="6"></line>
                      <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                    <span class="text-base font-bold"
                      >Jun 17, 2023 - Jun 17, 2023</span
                    >
                  </div>
                </a>
              </div>
              <div class="relative shadow-md">
                <img
                  src="https://i.postimg.cc/Qdhgyp8g/second.jpg"
                  alt=""
                  class="object-cover w-full h-64"
                />
                <div class="absolute top-0 p-2 m-2 bg-red-600">
                  <a href="" class="text-sm text-white">Sports Club</a>
                </div>
                <a href="#" class="p-3 block">
                  <div class="mb-2 text-xs text-gray-600">
                    Posted in <span class="font-bold">Oct 16,2023</span>
                  </div>
                  <h3 class="text-xl font-bold tracking-tight text-gray-900">
                    The team of professionals
                  </h3>
                  <p class="py-2 font-normal text-gray-600">
                    lorem ipsum dor amit isoeirspus soiduitrsas orem ipsum dor
                    ami
                  </p>
                  <div class="flex items-center gap-3">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="16"
                      height="16"
                      class="w-5 h-5 bi bi-bank2"
                      viewBox="0 0 24 24"
                      fill="none"
                      stroke="#14b8a6"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    >
                      <rect
                        x="3"
                        y="4"
                        width="18"
                        height="18"
                        rx="2"
                        ry="2"
                      ></rect>
                      <line x1="16" y1="2" x2="16" y2="6"></line>
                      <line x1="8" y1="2" x2="8" y2="6"></line>
                      <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                    <span class="text-base font-bold"
                      >Jun 17, 2023 - Jun 17, 2023</span
                    >
                  </div>
                </a>
              </div>
              <div class="relative shadow-md">
                <img
                  src="https://i.postimg.cc/fW3hVdhv/pexels-rodnae-productions-7648047.jpg"
                  alt=""
                  class="object-cover w-full h-64"
                />
                <div class="absolute top-0 p-2 m-2 bg-red-600">
                  <a href="" class="text-sm text-white">Debate Club</a>
                </div>
                <a href="#" class="p-3 block">
                  <div class="mb-2 text-xs text-gray-600">
                    Posted in <span class="font-bold">Apl 16,2023</span>
                  </div>
                  <h3 class="text-xl font-bold tracking-tight text-gray-900">
                    The team of professionals
                  </h3>
                  <p class="py-2 font-normal text-gray-600">
                    lorem ipsum dor amit isoeirspus soiduitrsas orem ipsum dor
                    ami
                  </p>
                  <div class="flex items-center gap-3">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="16"
                      height="16"
                      class="w-5 h-5 bi bi-bank2"
                      viewBox="0 0 24 24"
                      fill="none"
                      stroke="#14b8a6"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    >
                      <rect
                        x="3"
                        y="4"
                        width="18"
                        height="18"
                        rx="2"
                        ry="2"
                      ></rect>
                      <line x1="16" y1="2" x2="16" y2="6"></line>
                      <line x1="8" y1="2" x2="8" y2="6"></line>
                      <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                    <span class="text-base font-bold"
                      >Jun 17, 2023 - Jun 17, 2023</span
                    >
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="flex justify-center">
          <button
            class="py-3 px-12 rounded-md bg-teal-200 hover:bg-teal-300 text-lg font-bold"
          >
            View All
          </button>
        </div>
      </section>
      <!-- Event Section End -->

      <!-- Testimonial Section Start -->
      <section class="flex items-center bg-gray-100 my-16 max-w-7xl mx-auto">
        <div class="p-4 mx-auto max-w-7xl">
          <div class="text-center mb-14">
            <h1 class="mb-4 text-3xl font-bold">Testimonials</h1>
            <p class="max-w-xl mx-auto text-gray-500">
              The university club management website provided a user-friendly
              online platform where members could effortlessly register for
              events, access club resources, and stay connected with the club
              community, making club management a seamless and enjoyable
              experience.
            </p>
          </div>
          <div class="flex">
            <div
              class="grid grid-cols-1 gap-4 lg:gap-4 sm:gap-4 sm:grid-cols-2 lg:grid-cols-3"
            >
              <div class="mb-8 text-center bg-white rounded shadow">
                <div class="relative z-20 -mt-14">
                  <div class="p-8">
                    <span
                      class="inline-block p-3 mb-3 text-xs text-white bg-teal-500 rounded-full"
                    >
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="30"
                        height="30"
                        fill="currentColor"
                        class="bi bi-quote"
                        viewBox="0 0 16 16"
                      >
                        <path
                          d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 9 7.558V11a1 1 0 0 0 1 1h2Zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 3 7.558V11a1 1 0 0 0 1 1h2Z"
                        />
                      </svg>
                    </span>
                    <p class="mb-4 text-base leading-7 text-gray-400">
                      Thanks to the university club's online management system,
                      members could easily stay updated on upcoming events,
                      communicate with fellow members, and access important
                      resources at their convenience
                    </p>
                  </div>
                  <div
                    class="flex flex-col items-center pb-5 bg-teal-500 gap-x-4"
                  >
                    <svg
                      class="wave-top"
                      viewBox="0 0 1439 147"
                      version="1.1"
                      xmlns="http://www.w3.org/2000/svg"
                      xmlns:xlink="http://www.w3.org/1999/xlink"
                    >
                      <g
                        stroke="none"
                        stroke-width="1"
                        fill="none"
                        fill-rule="evenodd"
                      >
                        <g
                          transform="translate(-1.000000, -14.000000)"
                          fill-rule="nonzero"
                        >
                          <g class="wave fill-white" fill="#fff">
                            <path
                              d="M1440,84 C1383.555,64.3 1342.555,51.3 1317,45 C1259.5,30.824 1206.707,25.526 1169,22 C1129.711,18.326 1044.426,18.475 980,22 C954.25,23.409 922.25,26.742 884,32 C845.122,37.787 818.455,42.121 804,45 C776.833,50.41 728.136,61.77 713,65 C660.023,76.309 621.544,87.729 584,94 C517.525,105.104 484.525,106.438 429,108 C379.49,106.484 342.823,104.484 319,102 C278.571,97.783 231.737,88.736 205,84 C154.629,75.076 86.296,57.743 0,32 L0,0 L1440,0 L1440,84 Z"
                            ></path>
                          </g>
                          <g
                            transform="translate(1.000000, 15.000000)"
                            fill="#FFFFFF"
                          >
                            <g
                              transform="translate(719.500000, 68.500000) rotate(-180.000000) translate(-719.500000, -68.500000) "
                            >
                              <path
                                d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496"
                                opacity="0.100000001"
                              ></path>
                              <path
                                d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                                opacity="0.100000001"
                              ></path>
                              <path
                                d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z"
                                opacity="0.200000003"
                              ></path>
                            </g>
                          </g>
                        </g>
                      </g>
                    </svg>
                    <div
                      class="relative w-24 h-24 -mt-16 overflow-hidden border-4 border-white rounded-full"
                    >
                      <img
                        class="object-cover w-full h-full transition-all hover:scale-110"
                        src="https://i.postimg.cc/PrtMyZwD/austin-wade-X6-Uj51n5-CE8-unsplash.jpg"
                        alt=""
                      />
                    </div>
                    <div class="mt-3 text-center info">
                      <h2 class="text-lg font-bold text-white">James King</h2>
                    </div>
                  </div>
                </div>
              </div>
              <div class="mb-8 text-center bg-white rounded shadow">
                <div class="relative z-20 -mt-14">
                  <div class="p-8">
                    <span
                      class="inline-block p-3 mb-3 text-xs text-white bg-teal-500 rounded-full"
                    >
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="30"
                        height="30"
                        fill="currentColor"
                        class="bi bi-quote"
                        viewBox="0 0 16 16"
                      >
                        <path
                          d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 9 7.558V11a1 1 0 0 0 1 1h2Zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 3 7.558V11a1 1 0 0 0 1 1h2Z"
                        />
                      </svg>
                    </span>
                    <p class="mb-4 text-base leading-7 text-gray-400">
                      Thanks to the university club's online management system,
                      members could easily stay updated on upcoming events,
                      communicate with fellow members, and access important
                      resources at their convenience
                    </p>
                  </div>
                  <div
                    class="flex flex-col items-center pb-5 bg-teal-500 gap-x-4"
                  >
                    <svg
                      class="wave-top"
                      viewBox="0 0 1439 147"
                      version="1.1"
                      xmlns="http://www.w3.org/2000/svg"
                      xmlns:xlink="http://www.w3.org/1999/xlink"
                    >
                      <g
                        stroke="none"
                        stroke-width="1"
                        fill="none"
                        fill-rule="evenodd"
                      >
                        <g
                          transform="translate(-1.000000, -14.000000)"
                          fill-rule="nonzero"
                        >
                          <g class="wave fill-white" fill="#f8fafc">
                            <path
                              d="M1440,84 C1383.555,64.3 1342.555,51.3 1317,45 C1259.5,30.824 1206.707,25.526 1169,22 C1129.711,18.326 1044.426,18.475 980,22 C954.25,23.409 922.25,26.742 884,32 C845.122,37.787 818.455,42.121 804,45 C776.833,50.41 728.136,61.77 713,65 C660.023,76.309 621.544,87.729 584,94 C517.525,105.104 484.525,106.438 429,108 C379.49,106.484 342.823,104.484 319,102 C278.571,97.783 231.737,88.736 205,84 C154.629,75.076 86.296,57.743 0,32 L0,0 L1440,0 L1440,84 Z"
                            ></path>
                          </g>
                          <g
                            transform="translate(1.000000, 15.000000)"
                            fill="#FFFFFF"
                          >
                            <g
                              transform="translate(719.500000, 68.500000) rotate(-180.000000) translate(-719.500000, -68.500000) "
                            >
                              <path
                                d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496"
                                opacity="0.100000001"
                              ></path>
                              <path
                                d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                                opacity="0.100000001"
                              ></path>
                              <path
                                d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z"
                                opacity="0.200000003"
                              ></path>
                            </g>
                          </g>
                        </g>
                      </g>
                    </svg>
                    <div
                      class="relative w-24 h-24 -mt-16 overflow-hidden border-4 border-white rounded-full"
                    >
                      <img
                        class="object-cover w-full h-full transition-all hover:scale-110"
                        src="https://i.postimg.cc/Y9K6Wm7h/alexander-aguero-VGE4-S8-ZWg-unsplash.jpg"
                        alt=""
                      />
                    </div>
                    <div class="mt-3 text-center info">
                      <h2 class="text-lg font-bold text-white">Jori William</h2>
                    </div>
                  </div>
                </div>
              </div>
              <div class="mb-8 text-center bg-white rounded shadow">
                <div class="relative z-20 -mt-14">
                  <div class="p-8">
                    <span
                      class="inline-block p-3 mb-3 text-xs text-white bg-teal-500 rounded-full"
                    >
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="30"
                        height="30"
                        fill="currentColor"
                        class="bi bi-quote"
                        viewBox="0 0 16 16"
                      >
                        <path
                          d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 9 7.558V11a1 1 0 0 0 1 1h2Zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 3 7.558V11a1 1 0 0 0 1 1h2Z"
                        />
                      </svg>
                    </span>
                    <p class="mb-4 text-base leading-7 text-gray-400">
                      Thanks to the university club's online management system,
                      members could easily stay updated on upcoming events,
                      communicate with fellow members, and access important
                      resources at their convenience
                    </p>
                  </div>
                  <div
                    class="flex flex-col items-center pb-5 bg-teal-500 gap-x-4"
                  >
                    <svg
                      class="wave-top"
                      viewBox="0 0 1439 147"
                      version="1.1"
                      xmlns="http://www.w3.org/2000/svg"
                      xmlns:xlink="http://www.w3.org/1999/xlink"
                    >
                      <g
                        stroke="none"
                        stroke-width="1"
                        fill="none"
                        fill-rule="evenodd"
                      >
                        <g
                          transform="translate(-1.000000, -14.000000)"
                          fill-rule="nonzero"
                        >
                          <g class="wave fill-white" fill="#f8fafc">
                            <path
                              d="M1440,84 C1383.555,64.3 1342.555,51.3 1317,45 C1259.5,30.824 1206.707,25.526 1169,22 C1129.711,18.326 1044.426,18.475 980,22 C954.25,23.409 922.25,26.742 884,32 C845.122,37.787 818.455,42.121 804,45 C776.833,50.41 728.136,61.77 713,65 C660.023,76.309 621.544,87.729 584,94 C517.525,105.104 484.525,106.438 429,108 C379.49,106.484 342.823,104.484 319,102 C278.571,97.783 231.737,88.736 205,84 C154.629,75.076 86.296,57.743 0,32 L0,0 L1440,0 L1440,84 Z"
                            ></path>
                          </g>
                          <g
                            transform="translate(1.000000, 15.000000)"
                            fill="#FFFFFF"
                          >
                            <g
                              transform="translate(719.500000, 68.500000) rotate(-180.000000) translate(-719.500000, -68.500000) "
                            >
                              <path
                                d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496"
                                opacity="0.100000001"
                              ></path>
                              <path
                                d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                                opacity="0.100000001"
                              ></path>
                              <path
                                d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z"
                                opacity="0.200000003"
                              ></path>
                            </g>
                          </g>
                        </g>
                      </g>
                    </svg>
                    <div
                      class="relative w-24 h-24 -mt-16 overflow-hidden border-4 border-white rounded-full"
                    >
                      <img
                        class="object-cover w-full h-full transition-all hover:scale-110"
                        src="https://i.postimg.cc/J0RjTVG8/ospan-ali-6xv4-A1-VA1r-U-unsplash.jpg"
                        alt=""
                      />
                    </div>
                    <div class="mt-3 text-center info">
                      <h2 class="text-lg font-bold text-white">
                        Oliver Kiyara
                      </h2>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Testimonial Section End -->
    </main>

    <!-- Footer Section Start -->
    <footer>
      <?php
        include('../footer/footer.php');
      ?>
    </footer>
    <!-- Footer Section End -->

    <!-- Script Section -->
    <script
      defer
      src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"
    ></script>
    <script src="../js/sweetalert.js"></script>
    <?php if(isset($_SESSION['login_Status']) && $_SESSION['login_Status'] != ''){ ?>
    
    <script>
      swal({
        title: "<?php echo $_SESSION['message']; ?>",
        text: "<?php echo $_SESSION['login_Status']; ?>",
        icon: "<?php echo $_SESSION['Status']; ?>",
        button: "OK. Done!",
      });
    </script>

    <?php 
        unset($_SESSION['login_Status']); 
        unset($_SESSION['Status']); 
        unset($_SESSION['message']); 
      } 
    ?>
  </body>
</html>
