<?php
  require_once('../../db/db.php');
	session_start();
	if (!isset($_SESSION['userId'])){
		header('location:../../login/index.php');
	}
  $userId = $_SESSION['userId'];
  $query = "SELECT * FROM `users` WHERE userId = '$userId';";
  $createQuery = mysqli_query($conn, $query);
  $userData = mysqli_fetch_array($createQuery);

  $eventId = $_GET['eventId'];
  $eventQuery = "SELECT * FROM clubevent WHERE eventId = $eventId;";
  $createEvent = mysqli_query($conn, $eventQuery);
  $eventData = mysqli_fetch_array($createEvent);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Event</title>
  <link rel="stylesheet" href="../../style.css">
</head>
<body class="bg-gray-100">
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
              <a
                href="../index.php"
                class="text-sm text-gray-700 hover:text-teal-700"
                >Home</a
              >
            </li>
            <li>
              <a href="../clubList/index.php" class="text-sm text-gray-700 hover:text-teal-700"
                >Clubs</a
              >
            </li>
            <li>
              <a href="" class="text-sm text-gray-700 hover:text-teal-700"
                >Events</a
              >
            </li>
            <li>
              <a href="../../aboutus/index.html" class="text-sm text-gray-700 hover:text-teal-700"
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
                        class="flex items-center px-4 py-2 text-sm text-gray-700 hover:text-teal-500"
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
                      href="../clubCreate/index.php"
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
                      href="../profile/index.php"
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
                      href="../../logout/logout.php"
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
              <a
                href="../index.php"
                class="text-sm text-gray-700 hover:text-teal-400"
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
                      href="../../logout/logout.php"
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
  <main class="max-w-7xl mx-auto">
    <section class="pb-11">
        <div>
            <div class="grid lg:grid-cols-[70%,1fr]  gap-4  pt-9 pb-7">
                <div>
                    <div class="p-4 ">
                        <nav class="flex mb-4">
                            <ol class="inline-flex items-center">
                                <li class="inline-flex items-center">
                                    <a href="#"
                                        class="inline-flex items-center text-sm text-gray-700 hover:text-gray-900  ">
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <div class="flex items-center">
                                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <a href="#"
                                            class="text-sm font-medium text-gray-700 hover:text-gray-900">Events</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex items-center">
                                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <a href="#" class="text-sm font-medium text-teal-500 hover:border-teal-700  ">
                                            View Details
                                        </a>
                                    </div>
                                </li>
                            </ol>
                        </nav>
                        <img src="https://i.postimg.cc/vHR493zf/pexels-pixabay-269077.jpg" alt=""
                            class="object-cover w-full rounded-md h-96">
                        <div class="flex flex-col my-5 gap-5">
                            <div class="flex items-center gap-3 mr-6 no-underline ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="#14b8a6" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <circle cx="12" cy="10" r="3" />
                                    <path d="M12 21.7C17.3 17 20 13 20 10a8 8 0 1 0-16 0c0 3 2.7 6.9 8 11.7z" />
                                </svg>
                                <span class="text-base font-bold">Venue: On Campus</span>
                            </div>
                            <div class="flex items-center gap-3 mr-6 no-underline ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    class="w-5 h-5 bi bi-bank2" viewBox="0 0 24 24" fill="none" stroke="#14b8a6"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                </svg>
                                <span class="text-base font-bold">
                                  <?php echo $eventData['eventDate']; ?>
                                </span>
                            </div>
                            <div class="flex items-center gap-3 mr-6 no-underline ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="#14b8a6" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                                <span class="text-base font-bold">
                                  <?php echo $eventData['eventName']; ?>
                                </span>
                            </div>
                            <div class="flex items-center gap-3 mr-6 no-underline ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" class="w-5 h-5 bi bi-bank2"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="#14b8a6" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                                <span class="text-base font-bold">
                                  <?php echo $eventData['participant']; ?>
                                </span>
                            </div>
                        </div>
                        <h2 class="mb-4 text-2xl font-semibold font-poppins ">
                            <?php echo $eventData['eventTitle']; ?>
                        </h2>
                        <div class=" font-poppins ">
                            <p><?php echo $eventData['eventDescription']; ?></p>
                        </div>
                    </div>
                    <div class="px-4">
                        <h2 class="pb-2 mt-4 text-lg font-semibold text-gray-900  font-poppins">Tags
                        </h2>
                        <div class="w-16 mb-3 border-b-2 border-teal-500  inset-px"></div>
                        <div class="flex flex-wrap gap-2 my-4 font-poppins ">
                            <a class="px-4 py-1 mb-2 text-xs text-black transition bg-gray-200 rounded-md btn btn-sm hover:bg-teal-500    hover:text-white"
                                href="#">
                                Corporate</a>
                            <a class="px-4 py-1 mb-2 text-xs text-black transition bg-gray-200 rounded-md btn btn-sm hover:bg-teal-500 hover:text-white   "
                                href="#">
                                Business</a>
                            <a class="px-4 py-1 mb-2 text-xs text-black transition bg-gray-200 rounded-md btn btn-sm hover:bg-teal-500 hover:text-white   "
                                href="#">
                                Field</a>
                        </div>
                    </div>
                    <div class="p-4">
                        <button class="px-6 py-3 bg-teal-500 font-bold text-xl text-white rounded-md hover:bg-teal-600">I will
                            participate</button>
                    </div>
                </div>
                <div class="px-4 lg:px-0">
                    <div class="px-2 pt-4 lg:px-0 ">
                      <div class="bg-white p-6 rounded-xl shadow-xl">
                        <h2 class="pb-2 text-lg font-semibold leading-5 tracking-tight text-gray-900  ">
                          Events List
                        </h2>
                        <div class="w-16 mb-5 border-b-2 border-teal-400 inset-px "></div>
                          <div class="flex w-full mb-4 border-b border-gray-200 ">
                            <div>
                              <img class="object-cover w-20 h-20 mr-4 rounded" src="https://i.postimg.cc/SKtsKrRX/pexels-marc-mueller-380769.jpg" alt="">
                            </div>
                            <div class="flex-1 mb-5">
                              <h2 class="mb-1 text-base font-medium tracking-tight text-gray-700 hover:text-teal-600 ">
                                <a href="#">Lorem ipsum dolor sit amet, labore et dolore</a>
                              </h2>
                              <a href="#" class="flex items-center mr-6 no-underline ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-3 h-3 text-teal-600  bi bi-calendar" viewBox="0 0 16 16">
                                  <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                </svg>
                                <span class="ml-2 text-xs text-gray-500  hover:text-teal-600">May 10, 2022</span>
                              </a>
                            </div>
                          </div>
                          <div class="flex w-full mb-4 border-b border-gray-200 ">
                            <div>
                              <img class="object-cover w-20 h-20 mr-4 rounded" src="https://i.postimg.cc/63GLBzwc/aqq.jpg" alt="">
                            </div>
                            <div class="flex-1 mb-5">
                              <h2 class="mb-1 text-base font-medium tracking-tight text-gray-700 hover:text-teal-600 ">
                                <a href="#">Lorem ipsum dolor sit amet, labore et dolore</a>
                              </h2>
                              <a href="#" class="flex items-center mr-6 no-underline ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-3 h-3 text-teal-600  bi bi-calendar" viewBox="0 0 16 16">
                                  <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                </svg>
                                <span class="ml-2 text-xs text-gray-500 hover:text-teal-600 ">
                                  May 10, 2022
                                </span>
                              </a>
                            </div>
                          </div>
                          <div class="flex w-full mb-4 ">
                                            <div>
                                                <img class="object-cover w-20 h-20 mr-4 rounded"
                                                    src="https://i.postimg.cc/PqC1MKLH/pexels-pixabay-38271.jpg" alt="">
                                            </div>
                                            <div class="flex-1 mb-5">
                                                <h2
                                                    class="mb-1 text-base font-medium tracking-tight text-gray-700 hover:text-teal-600 ">
                                                    <a href="#">
                                                        Lorem ipsum dolor sit amet, labore et dolore</a>
                                                </h2>
                                                <a href="#" class="flex items-center mr-6 no-underline">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="w-3 h-3 text-teal-600  bi bi-calendar"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                                    </svg>
                                                    <span class="ml-2 text-xs text-gray-500 hover:text-teal-600  ">May
                                                        10, 2022</span>
                                                </a>
                                            </div>
                          </div>
                          <div>
                            <button class="px-6 py-2 text-base font-bold bg-teal-500 hover:bg-teal-600 text-white rounded-md">View All</button>
                          </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  </main>
  <!-- Footer Section Start -->
  <footer><?php include('../../footer/footer.php'); ?></footer>
  <!-- Footer Section End -->
  <!-- Script Section -->
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>