<?php
  require_once('../../db/db.php');
  // ini_set('display_errors', 0);
  // error_reporting(E_ALL);
	session_start();
	if (!isset($_SESSION['userId'])){
		header('location:../../login/index.php');
	}
  $userId = $_SESSION['userId'];
  $query = "SELECT * FROM `users` WHERE userId = '$userId';";
  $createQuery = mysqli_query($conn, $query);
  $userData = mysqli_fetch_array($createQuery);

  $clubId = $_GET['clubId'];
  $clubQuery = "SELECT * FROM `clubs` WHERE clubId = '$clubId';";
  $createClubQuery = mysqli_query($conn, $clubQuery);
  $clubData = mysqli_fetch_array($createClubQuery);

  $memberQuery = "SELECT * FROM `clubmember` WHERE clubId = '$clubId' AND userId = '$userId';";
  $memberClubQuery = mysqli_query($conn, $memberQuery);
  $memberData = mysqli_fetch_array($memberClubQuery);

  $clubRole = '';
  if($userData['userId'] == $clubData['userId']){
    $clubRole = 'admin';
  }else if($memberClubQuery->num_rows > 0){
    $clubRole = 'member';
    $roleStatus = $memberData['status'];
  }

  $postQuery = "SELECT * FROM `clubevent` WHERE clubId = '$clubId';";
  $clubPostQuery = mysqli_query($conn, $postQuery);
  // $postData = mysqli_fetch_assoc($clubPostQuery);//->num_rows

  $memberCountQuery = "SELECT * FROM `clubmember` WHERE clubId = '$clubId';";
  $memberCountClubQuery = mysqli_query($conn, $memberCountQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club</title>
    <link rel="stylesheet" href="../../style.css">
    <link
      href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css"
      rel="stylesheet"
    />
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
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
              <a href="" class="text-sm text-gray-700 hover:text-teal-700"
                >Clubs</a
              >
            </li>
            <li>
              <a href="../eventList/index.php" class="text-sm text-gray-700 hover:text-teal-700"
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
        <div class="grid lg:grid-cols-[70%,1fr]  gap-8  pt-9 pb-7">
          <div class="">
            <div class="pt-4 pb-4 pl-4 mb-0 pr-8 border-r border-gray-400">
              <nav class="flex mb-4">
                <ol class="inline-flex items-center">
                  <li class="inline-flex items-center">
                                      <a href="../index.php" class="inline-flex items-center text-sm text-gray-700 hover:text-gray-900  ">
                                        Home
                                      </a>
                  </li>
                  <li>
                                      <div class="flex items-center">
                                          <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                          </svg>
                                          <a href="../clubList/index.php" class="text-sm font-medium text-gray-700 hover:text-gray-900">Clubs</a>
                                      </div>
                  </li>
                  <li>
                                      <div class="flex items-center">
                                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                          <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                        <a href="" class="text-sm font-medium text-teal-500 hover:border-teal-700  ">
                                          Club Details
                                        </a>
                                      </div>
                  </li>
                </ol>
              </nav>
              <img src="../../images/<?php echo $clubData['image']; ?>" alt="" class="object-cover  rounded-md h-96">
              <div class="flex flex-col my-5 gap-5">
                <div class="flex items-center gap-3 mr-6 no-underline ">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#14b8a6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="3" width="18" height="18" rx="2" />
                    <path d="M21 12H3M12 3v18" />
                  </svg>
                  <span class="text-base font-bold">Organized <?php echo $clubPostQuery->num_rows; ?> Events</span>
                </div>
                <div class="flex items-center gap-3 mr-6 no-underline ">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" class="w-5 h-5 bi bi-bank2" height="24" viewBox="0 0 24 24" fill="none" stroke="#14b8a6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                  </svg>
                  <span class="text-base font-bold"><?php echo $memberCountClubQuery->num_rows; ?> Members</span>
                </div>
              </div>
              <div class="flex justify-between">
                <h2 class="mb-4 text-2xl font-semibold font-poppins ">
                  <?php echo $clubData['clubName']; ?>
                </h2>
                <div class="flex justify-between items-center">
                  <p class="text-gray-600 flex mr-10 items-center">
                    <span class="mr-2">
                      <svg class="w-5 h-5 text-gray-600 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path fill="currentColor" d="M8 1V0v1Zm4 0V0v1Zm2 4v1h1V5h-1ZM6 5H5v1h1V5Zm2-3h4V0H8v2Zm4 0a1 1 0 0 1 .707.293L14.121.879A3 3 0 0 0 12 0v2Zm.707.293A1 1 0 0 1 13 3h2a3 3 0 0 0-.879-2.121l-1.414 1.414ZM13 3v2h2V3h-2Zm1 1H6v2h8V4ZM7 5V3H5v2h2Zm0-2a1 1 0 0 1 .293-.707L5.879.879A3 3 0 0 0 5 3h2Zm.293-.707A1 1 0 0 1 8 2V0a3 3 0 0 0-2.121.879l1.414 1.414ZM2 6h16V4H2v2Zm16 0h2a2 2 0 0 0-2-2v2Zm0 0v12h2V6h-2Zm0 12v2a2 2 0 0 0 2-2h-2Zm0 0H2v2h16v-2ZM2 18H0a2 2 0 0 0 2 2v-2Zm0 0V6H0v12h2ZM2 6V4a2 2 0 0 0-2 2h2Zm16.293 3.293C16.557 11.029 13.366 12 10 12c-3.366 0-6.557-.97-8.293-2.707L.293 10.707C2.557 12.971 6.366 14 10 14c3.634 0 7.444-1.03 9.707-3.293l-1.414-1.414ZM10 9v2a2 2 0 0 0 2-2h-2Zm0 0H8a2 2 0 0 0 2 2V9Zm0 0V7a2 2 0 0 0-2 2h2Zm0 0h2a2 2 0 0 0-2-2v2Z"/>
                      </svg>
                    </span>
                    <?php echo $clubData['clubWork']; ?>
                  </p>
                  <p class="text-gray-600 flex mr-10 items-center">
                    <span class="">
                      <svg class="w-5 h-5 text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m2.707 14.293 5.586-5.586a1 1 0 0 0 0-1.414L2.707 1.707A1 1 0 0 0 1 2.414v11.172a1 1 0 0 0 1.707.707Z"/>
                      </svg>
                    </span>
                    <?php echo $clubData['clubGoal']; ?>
                  </p>
                </div>
              </div>
              <div class=" font-poppins text-justify">
                                <?php echo $clubData['clubDescription']; ?>
                                    consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut
                                    labore et dolore magna aliqua. Ut enim ad minim veniam. Lorem ipsum dolor sit amet,
                                    consectetur adipiscing elit, sed do eiusmod
                                    tempor
                                    incididunt ut
                                    labore et dolore magna aliqua. Ut enim ad minim veniam Lorem ipsum dolor sit amet,
                                    consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut
                                    labore et dolore magna aliqua. Ut enim ad minim veniam. Lorem ipsum dolor sit amet,
                                    consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut
                                    labore et dolore magna aliqua. Ut enim ad minim veniam</p>
              </div>
            </div>
            <!-- join button -->
            <div class="p-4 flex gap-4">
              <?php if($clubRole == 'admin'){ ?>
                <p class="px-6 py-3 bg-gray-500 font-bold text-xl text-white rounded-md flex items-center gap-2 uppercase">
                  <span><?php echo $clubRole; ?></span>
                </p>
                <a class="" href="../manageClub/adminManage.php?clubId=<?php echo $clubId; ?>">
                  <button class="px-6 py-3 bg-teal-500 font-bold text-xl text-white rounded-md hover:bg-teal-600 flex items-center gap-2 ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M7 7l9.2 9.2M17 7v10H7" />
                    </svg>
                    <span>Manage Club</span>
                  </button>
                </a>
              <?php }else if($clubRole == 'member'){ ?>
                <p class="px-6 py-3 bg-gray-500 font-bold text-xl text-white rounded-md flex items-center gap-2 uppercase">
                  <span><?php echo $roleStatus; ?></span>
                </p>
                <?php if($roleStatus != 'pending'){?>
                  <a href="../manageClub/adminManage.php?clubId=<?php echo $clubId;?>">
                    <button class="px-6 py-3 bg-teal-500 font-bold text-xl text-white rounded-md hover:bg-teal-600 flex items-center gap-2 ">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M7 7l9.2 9.2M17 7v10H7" />
                      </svg>
                      <span>See Club</span>
                    </button>
                  </a>
                <?php } ?>
              <?php }else{ ?>
                <a href="./clubJoinProcess.php?clubId=<?php echo $clubId; ?>">
                  <button class="px-6 py-3 bg-teal-500 font-bold text-xl text-white rounded-md hover:bg-teal-600 flex items-center gap-2 ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M7 7l9.2 9.2M17 7v10H7" />
                    </svg>
                    <span>Join CLub</span>
                  </button>
                </a>
              <?php } ?>                            
            </div>
            <!-- comment -->
            <div class="p-4">
              <h2 class="pb-4 text-base font-bold">
                Members Feedback
              </h2>
              <div class="flex flex-col gap-5">
                <div class="mb-10 border-b border-red-700 w-24"></div>
                <div class="flex items-center mb-4 space-x-2">
                  <div class="flex self-start flex-shrink-0 cursor-pointer">
                    <img src="https://i.postimg.cc/JzmrHQmk/pexels-pixabay-220453.jpg" alt="" class="object-fill w-16 h-16 rounded-full">
                  </div>
                  <div class="flex items-center justify-center space-x-2 ">
                    <div class="block">
                      <div class="w-auto px-2 pb-2 ">
                        <div class="font-medium">
                          <a href="#" class="text-lg font-semibold hover:underline">
                            <small>John Doe</small>
                          </a>
                        </div>
                        <div class="text-sm text-gray-500">
                                                  Lorem ipsum, dolor sit amet consectetur adipisicing elit. Expedita,
                                                    maiores!
                        </div>
                      </div>
                      <div class="flex items-center justify-start w-full text-xs">
                        <div class="flex items-center justify-center px-2 space-x-1 font-semibold text-gray-700">
                          <a href="#" class="hover:underline">
                            <span>10m ago</span>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="flex items-center mb-4 space-x-2">
                                    <div class="flex self-start flex-shrink-0 cursor-pointer">
                                        <img src="https://i.postimg.cc/RhQYkKYk/pexels-italo-melo-2379005.jpg" alt=""
                                            class="object-fill w-16 h-16 rounded-full">
                                    </div>
                                    <div class="flex items-center justify-center space-x-2 ">
                                        <div class="block">
                                            <div class="w-auto px-2 pb-2 ">
                                                <div class="font-medium">
                                                    <a href="#" class="text-lg font-semibold hover:underline">
                                                        <small>Adam Smith</small>
                                                    </a>
                                                </div>
                                                <div class="text-sm text-gray-500">
                                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Expedita,
                                                    maiores!
                                                </div>
                                            </div>
                                            <div class="flex items-center justify-start w-full text-xs">
                                                <div
                                                    class="flex items-center justify-center px-2 space-x-1 font-semibold text-gray-700">
                                                    <a href="#" class="hover:underline">
                                                        <span>10m ago</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                </div>
                <div class="flex items-center space-x-2">
                                    <div class="flex self-start flex-shrink-0 cursor-pointer">
                                        <img src="https://i.postimg.cc/q7pv50zT/pexels-edmond-dant-s-4342352.jpg" alt=""
                                            class="object-fill w-16 h-16 rounded-full">
                                    </div>
                                    <div class="flex items-center justify-center space-x-2 ">
                                        <div class="block">
                                            <div class="w-auto px-2 pb-2 ">
                                                <div class="font-medium">
                                                    <a href="#" class="text-lg font-semibold hover:underline">
                                                        <small>Sedrina Set</small>
                                                    </a>
                                                </div>
                                                <div class="text-sm text-gray-500">
                                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Expedita,
                                                    maiores!
                                                </div>
                                            </div>
                                            <div class="flex items-center justify-start w-full text-xs">
                                                <div
                                                    class="flex items-center justify-center px-2 space-x-1 font-semibold text-gray-700">
                                                    <a href="#" class="hover:underline">
                                                        <span>10m ago</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                </div>
              </div>
            </div>
            <div class="p-4">
              <div class="p-6 mb-6 bg-white shadow-md my-10">
                <h2 class="mb-6 text-xl font-semibold text-left font-gray-600">
                  Leave a comment
                </h2>
                <form action="" class="">
                  <div class="mb-6 ">
                    <textarea type="message" placeholder="write a comment" required="" class="block w-full resize-none px-4 leading-tight text-gray-700 bg-gray-100 border rounded py-7"></textarea>
                  </div>
                  <div class="">
                                        <button
                                            class="px-4 py-2 text-xs font-medium text-gray-100 bg-teal-500 hover:bg-teal-700">
                                            Submit comment
                                        </button>
                  </div>
                </form>
              </div>
            </div>
            <!-- comment -->
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
  <footer>
    <?php
      include('../../footer/footer.php');
    ?>
  </footer>
  <!-- Footer Section End -->
  <!-- Script Section -->
    <script
      defer
      src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"
    ></script>
    <script src="../../js/sweetalert.js"></script>
    <?php if(isset($_SESSION['join_club']) && $_SESSION['join_club'] != ''){ ?>
    
    <script>
      swal({
        title: "<?php echo $_SESSION['join_club']; ?>",
        text: "<?php echo $_SESSION['message']; ?>",
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