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
  $memberQuery = "SELECT * FROM `clubmember` WHERE clubId = '$clubId';";
  $memberClubQuery = mysqli_query($conn, $memberQuery);

  $pendingMemberQuery = "SELECT * FROM `clubmember` WHERE clubId = '$clubId' AND status = 'pending';";
  $pendingMemberClubQuery = mysqli_query($conn, $pendingMemberQuery);
  $pendingMemberData = mysqli_fetch_array($pendingMemberClubQuery);

  $postQuery = "SELECT * FROM `clubevent` WHERE clubId = '$clubId';";
  $clubPostQuery = mysqli_query($conn, $postQuery);
  // $postData = mysqli_fetch_array($clubPostQuery);

  $clubQuery = "SELECT * FROM `clubs` WHERE clubId = '$clubId';";
  $execute = mysqli_query($conn, $clubQuery);
  $clubData = mysqli_fetch_array($execute);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Club</title>
  <link rel="stylesheet" href="../../style.css">
  <link
    href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css"
    rel="stylesheet"
  />
  <script
    src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
    defer
  ></script>
  <style>
    .disabled-link {
      pointer-events: none;
    }
    /* modal css */
		.animated {
			-webkit-animation-duration: 1s;
			animation-duration: 1s;
			-webkit-animation-fill-mode: both;
			animation-fill-mode: both;
		}

		.animated.faster {
			-webkit-animation-duration: 500ms;
			animation-duration: 500ms;
		}

		.fadeIn {
			-webkit-animation-name: fadeIn;
			animation-name: fadeIn;
		}

		.fadeOut {
			-webkit-animation-name: fadeOut;
			animation-name: fadeOut;
		}

		@keyframes fadeIn {
			from {
				opacity: 0;
			}

			to {
				opacity: 1;
			}
		}

		@keyframes fadeOut {
			from {
				opacity: 1;
			}

			to {
				opacity: 0;
			}
		}
    input::file-selector-button {
      font-weight: bold;
      color: white;
      padding: 0.5rem;
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

  <!-- component -->
  <div>
    <div
      class="flex overflow-y-hidden bg-white border-t border-b"
      x-data="setup()"
      x-init="$refs.loading.classList.add('hidden')"
    >
      <!-- Loading screen -->
      <div
        x-ref="loading"
        class="fixed inset-0 z-50 flex items-center justify-center text-white bg-black bg-opacity-50"
        style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)"
      >
        Loading.....
      </div>

      <!-- Sidebar backdrop -->
      <div
        x-show.in.out.opacity="isSidebarOpen"
        class="fixed inset-0 z-10 bg-black bg-opacity-20 lg:hidden"
        style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)"
      ></div>

      <!-- Sidebar -->
      <aside
        x-transition:enter="transition transform duration-300"
        x-transition:enter-start="-translate-x-full opacity-30  ease-in"
        x-transition:enter-end="translate-x-0 opacity-100 ease-out"
        x-transition:leave="transition transform duration-300"
        x-transition:leave-start="translate-x-0 opacity-100 ease-out"
        x-transition:leave-end="-translate-x-full opacity-0 ease-in"
        class="fixed inset-y-0 z-10 flex flex-col flex-shrink-0 w-64 max-h-screen overflow-hidden transition-all transform bg-white border-r shadow-lg lg:z-auto lg:static lg:shadow-none"
        :class="{'-translate-x-full lg:translate-x-0 lg:w-20': !isSidebarOpen}"
      >
        <!-- sidebar header -->
        <div
          class="flex items-center justify-between flex-shrink-0 p-2 mt-4"
          :class="{'lg:justify-center': !isSidebarOpen}"
        >
        <?php if($clubData['userId'] == $userId){ ?>
          <span
            class="p-2 text-xl font-semibold leading-8 tracking-wider uppercase whitespace-nowrap"
          >
            A<span :class="{'lg:hidden': !isSidebarOpen}">DMIN</span>
          </span>
          <?php }else{ ?>
          <span
            class="p-2 text-xl font-semibold leading-8 tracking-wider uppercase whitespace-nowrap"
          >
            M<span :class="{'lg:hidden': !isSidebarOpen}">EMBER</span>
          </span>
          <?php } ?>
          <button @click="toggleSidbarMenu()" class="p-2 rounded-md lg:hidden">
            <svg
              class="w-6 h-6 text-gray-600"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M6 18L18 6M6 6l12 12"
              />
            </svg>
          </button>
        </div>  
        <div
          class="flex items-center justify-between flex-shrink-0 p-2 mt-4"
          :class="{'lg:justify-center': !isSidebarOpen}"
        >
          <button
            class="p-2 font-medium leading-8 tracking-wider flex gap-2 items-center focus:outline-none hover:bg-gray-300 rounded-lg"
            onclick="openModal('main-modal')"
          >
            <span>
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
              </svg>
            </span>
            <span :class="{'lg:hidden': !isSidebarOpen}">Create Event</span>
          </button>          
        </div> 
      </aside>

      <div class="flex flex-col flex-1 h-full overflow-hidden">
        <!-- Modal -->
        <div class="main-modal fixed w-full inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster" style="background: rgba(0,0,0,.7);">
          <div class="border border-blue-500 shadow-lg modal-container bg-white w-4/12 md:max-w-11/12 mx-auto rounded-xl z-50 overflow-y-auto">
            <div class="modal-content py-4 text-left px-6">
              <!--Title-->
              <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold text-black">Event Post</p>
                <div class="modal-close cursor-pointer z-50" onclick="modalClose('main-modal')">
                  <svg class="fill-current text-gray-500" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                    viewBox="0 0 18 18">
                    <path
                      d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                    </path>
                  </svg>
                </div>
              </div>
              <!--Body-->
              <form action="./postUpload.php?clubId=<?php echo $clubId;?>" method="POST">
                <div class="my-5 mr-5 ml-5 flex justify-center">
                  <div class="w-full">
                    <div class="">
                      <div class="">
                        <label for="names" class="text-md text-Black">Event Name</label>
                      </div>
                      <div class="">
                        <input type="text" id="names" name="name" class="h-3 px-2 py-6 w-full border-2 border-gray-300 mb-5 rounded-md" placeholder="Event Name">
                      </div>
                      <div class="">
                        <label for="phone" class="text-md text-black">Event Title</label>
                      </div>
                      <div class="">
                        <input type="text" name="title" class="h-3 px-2 py-6 w-full border-2 border-gray-300 mb-5 rounded-md" placeholder="Event Title">
                      </div>
                      <div class="">
                        <label for="id_number" class="text-md text-black">
                          Event Date
                        </label>
                      </div>
                      <div class="">
                        <input type="date" name="date" class="h-3 px-2 py-6 w-full border-2 border-gray-300 mb-5 rounded-md">
                      </div>
                      <div class="">
                        <label for="id_number" class="text-md text-black">
                          Event Image
                        </label>
                      </div>
                      <div class="">
                        <input type="file" name="img" class="w-full border-2 border-gray-300 mb-5 rounded-md">
                      </div>
                      <div class="">
                        <label for="event_description" class="text-md text-black">
                          Event Description
                        </label>
                      </div>
                      <div class="">
                        <textarea name="description" rows="10" class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border-2 border-gray-300 placeholder-gray-400" placeholder="Your message...">
                        </textarea>
                      </div>
                    </div>
                  </div>
                </div>
                <!--Footer-->
                <div class="flex justify-end pt-2 space-x-14">
                  <button
                    class="px-4 bg-gray-200 p-3 rounded text-black hover:bg-gray-300 font-semibold" onclick="modalClose('main-modal')">Cancel</button>
                  <input type="submit" class="px-4 bg-blue-500 p-3 ml-3 rounded-lg text-white hover:bg-teal-400" value="Submit" />
                </div>
              </form>
            </div>
          </div>
        </div>

        <!-- Main content -->
        <main class="flex-1 max-h-full p-5 overflow-hidden overflow-y-scroll">
          <!-- Main content header -->
          <div
            class="flex flex-col items-center gap-x-3 pb-6 border-b lg:space-y-0 lg:flex-row"
          >
            <!-- Toggle sidebar button -->
              <button
                @click="toggleSidbarMenu()"
                class="p-2 rounded-md focus:outline-none focus:ring"
              >
                <svg
                  class="w-4 h-4 text-gray-600"
                  :class="{'transform transition-transform -rotate-180': isSidebarOpen}"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M13 5l7 7-7 7M5 5l7 7-7 7"
                  />
                </svg>
              </button>
            <h1 class="text-2xl font-semibold whitespace-nowrap">
              Dashboard of <?php echo $clubData['clubName'] ?>
            </h1>
          </div>

          <!-- Start Content -->
          <div class="grid grid-cols-1 gap-5 mt-6 sm:grid-cols-2 lg:grid-cols-4">
            <template x-for="i in 1" :key="i">
              <div class="p-4 transition-shadow border rounded-lg shadow-lg">
                <div class="flex items-start justify-between">
                  <div class="flex flex-col space-y-2">
                    <span class="text-black">Total Members</span>
                    <span class="text-lg font-semibold"><?php echo $memberClubQuery->num_rows; ?></span>
                  </div>
                  <div class="h-20 w-20 rounded-md">
                    <img src="../../images/member-logo.png" alt="">
                  </div>
                </div>
                <div>
                  <span
                    class="inline-block px-2 text-sm text-white bg-green-300 rounded"
                    >14%</span
                  >
                  <span>from 2019</span>
                </div>
              </div>
            </template>
            <template x-for="i in 1" :key="i">
              <div class="p-4 transition-shadow border rounded-lg shadow-lg">
                <div class="flex items-start justify-between">
                  <div class="flex flex-col space-y-2">
                    <span class="text-black">Total Requests</span>
                    <span class="text-lg font-semibold"><?php echo $pendingMemberClubQuery->num_rows; ?></span>
                  </div>
                  <div class="h-20 w-20 rounded-md">
                    <img src="../../images/request-logo.jpg" alt="">
                  </div>
                </div>
                <div>
                  <span
                    class="inline-block px-2 text-sm text-white bg-green-300 rounded"
                    >14%</span
                  >
                  <span>from 2019</span>
                </div>
              </div>
            </template>
            <template x-for="i in 1" :key="i">
              <div class="p-4 transition-shadow border rounded-lg shadow-lg">
                <div class="flex items-start justify-between">
                  <div class="flex flex-col space-y-2">
                    <span class="text-black">Total Events</span>
                    <span class="text-lg font-semibold"><?php echo $clubPostQuery->num_rows; ?></span>
                  </div>
                  <div class="h-20 w-20 rounded-md">
                    <img src="../../images/events-logo.jpg" alt="">
                  </div>
                </div>
                <div>
                  <span
                    class="inline-block px-2 text-sm text-white bg-green-300 rounded"
                    >14%</span
                  >
                  <span>from 2019</span>
                </div>
              </div>
            </template>
            <template x-for="i in 1" :key="i">
              <div class="p-4 transition-shadow border rounded-lg shadow-lg">
                <div class="flex items-start justify-between">
                  <div class="flex flex-col space-y-2">
                    <span class="text-black">Total Events Completed</span>
                    <span class="text-lg font-semibold"><?php echo "23"; ?></span>
                  </div>
                  <div class="h-20 w-20 rounded-md">
                    <img src="../../images/complete-event-logo.png" alt="">
                  </div>
                </div>
                <div>
                  <span
                    class="inline-block px-2 text-sm text-white bg-green-300 rounded"
                    >14%</span
                  >
                  <span>from 2019</span>
                </div>
              </div>
            </template>
          </div>

          <?php if($clubData['userId'] == $userId){ ?>
          <!-- Table see (members) -->
          <h3 class="mt-6 text-xl">Members</h3>
          <div class="flex flex-col mt-6">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div
                class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8"
              >
                <div
                  class="overflow-hidden border-b border-gray-200 rounded-md shadow-md"
                >
                  <table
                    class="min-w-full overflow-x-scroll divide-y divide-gray-200"
                  >
                    <thead class="bg-gray-50">
                      <tr>
                        <th
                          scope="col"
                          class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                        >
                          Name
                        </th>
                        <th
                          scope="col"
                          class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                        >
                          Title
                        </th>
                        <th
                          scope="col"
                          class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                        >
                          Status
                        </th>
                        <th
                          scope="col"
                          class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                        >
                          Role
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                          <span class="sr-only">Edit</span>
                        </th>
                      </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                      <?php
                        if($memberClubQuery->num_rows>0){
                          while($row = mysqli_fetch_assoc($memberClubQuery)){
                            $queryMember = "SELECT * FROM users WHERE userId = ".$row['userId'].";";
                            $createQueryMember = mysqli_query($conn, $queryMember);
                            $memberData = mysqli_fetch_array($createQueryMember);
                      ?>
                      <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                              <div class="flex-shrink-0 w-10 h-10">
                                <img
                                  class="w-10 h-10 rounded-full"
                                  src="https://avatars0.githubusercontent.com/u/57622665?s=460&u=8f581f4c4acd4c18c33a87b3e6476112325e8b38&v=4"
                                  alt=""
                                />
                              </div>
                              <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                  <?php echo $memberData['FirstName'].' '.$memberData['LastName']; ?>
                                </div>
                                <div class="text-sm text-gray-500">
                                  <?php echo $memberData['email']; ?>
                                </div>
                              </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                              Event Manager
                            </div>
                            <div class="text-sm text-gray-500">Optimization</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <?php if($row['status'] == 'approved'){ ?>
                            <span
                              class="inline-flex px-2 text-xs font-semibold leading-5 text-black bg-green-100 rounded-full uppercase"
                            >
                              <?php echo $row['status']; ?>
                            </span>
                          <?php }else{ ?>
                            <span
                              class="inline-flex px-2 text-xs font-semibold leading-5 text-black bg-red-100 rounded-full uppercase"
                            >
                              <?php echo $row['status']; ?>
                            </span>
                          <?php } ?>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                          <?php echo $row['clubRole']; ?>
                        </td>
                        <td class="px-6 py-4 text-sm font-medium text-right">
                          <a href="./approval.php?clubId=<?php echo $clubId; ?>&userId=<?php echo $row['userId']; ?>" class="text-indigo-600 hover:text-indigo-900 mr-2 <?php if($row['status'] == 'approved'){ echo 'disabled-link'; }?>">
                            Add
                          </a>
                          <a href="./remove.php?clubId=<?php echo $clubId; ?>&userId=<?php echo $row['userId']; ?>" class="text-indigo-600 hover:text-indigo-900">
                            Remove
                          </a>
                        </td>
                      </tr>
                      <?php
                          }
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>

          <!-- Table see (events) -->
          <h3 class="mt-6 text-xl">Events</h3>
          <div class="flex flex-col mt-6">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div
                class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8"
              >
                <div
                  class="overflow-hidden border-b border-gray-200 rounded-md shadow-md"
                >
                  <table
                    class="min-w-full overflow-x-scroll divide-y divide-gray-200"
                  >
                    <thead class="bg-gray-50">
                      <tr>
                        <th
                          scope="col"
                          class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                        >
                          Event Name
                        </th>
                        <th
                          scope="col"
                          class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                        >
                          Event Title
                        </th>
                        <th
                          scope="col"
                          class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                        >
                          Status
                        </th>
                        <th
                          scope="col"
                          class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                        >
                          Event Date
                        </th>
                        <th
                          scope="col"
                          class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase text-center"
                        >
                          Participant
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                          <span class="sr-only">Edit</span>
                        </th>
                      </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                      <?php
                        if($clubPostQuery->num_rows>0){
                          while($row = mysqli_fetch_assoc($clubPostQuery)){
                            $queryMember = "SELECT * FROM users WHERE userId = ".$row['userId'].";";
                            $createQueryMember = mysqli_query($conn, $queryMember);
                            $memberData = mysqli_fetch_array($createQueryMember);
                      ?>
                      <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                              <div class="flex-shrink-0 w-10 h-10">
                                <img
                                  class="w-10 h-10 rounded-full"
                                  src="<?php echo $row['eventIamge']; ?>"
                                  alt=""
                                />
                              </div>
                              <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                  <?php echo $row['eventName']; ?>
                                </div>
                                <div class="text-sm text-gray-500">
                                  <?php echo $memberData['FirstName'].' '.$memberData['LastName']; ?>
                                </div>
                              </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="text-sm text-gray-900">
                            <?php echo $row['eventTitle']; ?>
                          </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <?php if($row['status'] == 'approved'){ ?>
                            <span
                              class="inline-flex px-2 text-xs font-semibold leading-5 text-black bg-green-100 rounded-full uppercase"
                            >
                              <?php echo $row['status']; ?>
                            </span>
                          <?php }else{ ?>
                            <span
                              class="inline-flex px-2 text-xs font-semibold leading-5 text-black bg-red-100 rounded-full uppercase"
                            >
                              <?php echo $row['status']; ?>
                            </span>
                          <?php } ?>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">
                          <?php echo $row['eventDate']; ?>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500 text-center">
                          <?php echo $row['participant']; ?>
                        </td>
                        <td class="px-6 py-4 text-sm font-medium text-right">
                          <?php if($clubData['userId'] == $userId){ ?>
                            <a href="./postApprove.php?postId=<?php echo $row['eventId'].'&clubId='.$clubId; ?>" class="text-indigo-600 hover:text-indigo-900 mr-2">
                              Add
                            </a>
                          <?php } ?>
                            <a href="../eventDetails/index.php?eventId=<?php echo $row['eventId'] ?>" class="text-indigo-600 hover:text-indigo-900">
                              See Post
                            </a>
                        </td>
                      </tr>
                      <?php
                          }
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </main>        
      </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js"
      defer
    ></script>
    <script>
      const setup = () => {
        return {
          loading: true,
          isSidebarOpen: false,
          toggleSidbarMenu() {
            this.isSidebarOpen = !this.isSidebarOpen;
          },
          isSettingsPanelOpen: false,
          isSearchBoxOpen: false,
        };
      };
    </script>
  </div>
  <!-- Footer Section Start -->
  <footer>
    <?php
      include('../../footer/footer.php');
    ?>
  </footer>

  <script>
        all_modals = ['main-modal']
        all_modals.forEach((modal)=>{
            const modalSelected = document.querySelector('.'+modal);
            modalSelected.classList.remove('fadeIn');
            modalSelected.classList.add('fadeOut');
            modalSelected.style.display = 'none';
        })
        const modalClose = (modal) => {
            const modalToClose = document.querySelector('.'+modal);
            modalToClose.classList.remove('fadeIn');
            modalToClose.classList.add('fadeOut');
            setTimeout(() => {
                modalToClose.style.display = 'none';
            }, 500);
        }

        const openModal = (modal) => {
            const modalToOpen = document.querySelector('.'+modal);
            modalToOpen.classList.remove('fadeOut');
            modalToOpen.classList.add('fadeIn');
            modalToOpen.style.display = 'flex';
        }
    
	</script>
</body>
</html>
