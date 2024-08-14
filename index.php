<!DOCTYPE html>
<?php
include 'config.php';

$sql = "SELECT * FROM students";
$result = $conn->query($sql);
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>emerge website prototype </title>
    <meta name="description" content="Free open source Tailwind CSS Store template">
    <meta name="keywords" content="tailwind,tailwindcss,tailwind css,css,starter template,free template,store template, shop layout, minimal, monochrome, minimalistic, theme, nordic">
    
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>
	
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:200,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="stylesheet.css">

</head>

<body class="bg-white text-gray-600 work-sans leading-normal text-base tracking-normal">

    <!--Navigation-->
    <nav id="header" class="w-full z-30 top-0 py-1">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-6 py-3">

        <div class="flex justify-center mb-6">
<button onclick="window.location.href='test.php'" class="px-4 py-2 m-1 bg-blue-500 text-white rounded">Virtual Tour</button>
</div>

            <div class="order-1 md:order-2">
                <a class="flex items-center tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl " href="#">
					
                    < Emerge >
					
                </a>
            </div>

            <!-- Logo Image and Login Button -->
            <div class="order-3 md:order-3 flex items-center space-x-4" id="nav-content">
                <img src="images/araLogo.png" class="fill-current text-gray-800" width="45" height="45" alt="Ara Logo">
            </div>



            </div>
        </div>
    </nav>
	
	<!-- The login popup -->
    <div id="loginModal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
        <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all max-w-md w-full p-6">
            <div class="flex justify-between items-center pb-3">
                <h3 class="text-lg font-medium text-gray-900">Admin Login</h3>
                <button id="closeBtn" class="text-gray-400 hover:text-gray-600">
                    <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M18.3 5.71a1 1 0 0 0-1.41 0L12 10.59 7.11 5.7a1 1 0 0 0-1.42 1.42L10.59 12l-4.9 4.88a1 1 0 1 0 1.42 1.42L12 13.41l4.88 4.89a1 1 0 0 0 1.42-1.42L13.41 12l4.89-4.88a1 1 0 0 0 0-1.41z"/>
                    </svg>
                </button>
            </div>
            <form>
                <div class="mb-4">
                    <label class="block text-gray-700">Username</label>
                    <input type="text" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500" placeholder="Username">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Password</label>
                    <input type="password" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500" placeholder="Password">
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">Login</button>
                </div>
            </form>
        </div>
    </div>

    <div class="carousel relative container mx-auto" style="max-width:1600px;">
        <div class="carousel-inner relative overflow-hidden w-full">
            <!--Slide 1-->
            <input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden="" checked="checked">
            <div class="carousel-item absolute opacity-0" style="height:50vh;">
                <div class="block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-right" style="background-image: url('images/emerge.png');">



                </div>
            </div>
            <label for="carousel-3" class="prev control-1 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
            <label for="carousel-2" class="next control-1 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

            <!--Slide 2-->
            <input class="carousel-open" type="radio" id="carousel-2" name="carousel" aria-hidden="true" hidden="">
            <div class="carousel-item absolute opacity-0 bg-cover bg-right" style="height:50vh;">
                <div class="block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-right" style="background-image: url('images/car2.jpg');">


                </div>
            </div>
            <label for="carousel-1" class="prev control-2 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900  leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
            <label for="carousel-3" class="next control-2 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900  leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

            <!--Slide 3-->
            <input class="carousel-open" type="radio" id="carousel-3" name="carousel" aria-hidden="true" hidden="">
            <div class="carousel-item absolute opacity-0" style="height:50vh;">
                <div class="block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-bottom" style="background-image: url('images/car3.jpg');">



                </div>
            </div>
            <label for="carousel-2" class="prev control-3 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900  leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
            <label for="carousel-1" class="next control-3 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900  leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

            <!-- indicators for each slide-->
            <ol class="carousel-indicators">
                <li class="inline-block mr-3">
                    <label for="carousel-1" class="carousel-bullet cursor-pointer block text-4xl text-gray-400 hover:text-gray-900">•</label>
                </li>
                <li class="inline-block mr-3">
                    <label for="carousel-2" class="carousel-bullet cursor-pointer block text-4xl text-gray-400 hover:text-gray-900">•</label>
                </li>
                <li class="inline-block mr-3">
                    <label for="carousel-3" class="carousel-bullet cursor-pointer block text-4xl text-gray-400 hover:text-gray-900">•</label>
                </li>
            </ol>

        </div>
    </div>

	<section class="bg-white py-8">

        <div class="container py-8 px-6 mx-auto">
		
		<div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">About < Emerge ></h2>
            <p class="font-light text-gray-500 lg:mb-16 sm:text-xl dark:text-gray-400">Celebrating the success of our Bachelor of ICT and Graduate Diploma in ICT students. Capstone projects play an important part in preparing our IT students for the workplace. Industry contributes significantly to this, by providing innovative real-world project opportunities, and by providing supportive mentorship. Throughout their projects students are gaining valuable workplace skills, they are expanding their knowledge in business operations, and they are encouraged and motivated to think about the future and what their part will be in designing technologies for the future.</p>
</p>


    </section>	

  <section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
        <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Our Students</h2>
            <p class="font-light text-gray-500 lg:mb-16 sm:text-xl dark:text-gray-400">See our students' profiles and posters about their projects</p>
        </div> 
<div class="flex justify-center mb-6">
    <button onclick="filterMembers('')" class="px-4 py-2 m-1 bg-blue-500 text-white rounded">All</button>
    <button onclick="filterMembers('Software')" class="px-4 py-2 m-1 bg-blue-500 text-white rounded">Software</button>
    <button onclick="filterMembers('Networking')" class="px-4 py-2 m-1 bg-blue-500 text-white rounded">Networking</button>
    <button onclick="filterMembers('IS')" class="px-4 py-2 m-1 bg-blue-500 text-white rounded">IS</button>
</div>

        <div class="grid gap-8 mb-6 lg:mb-16 md:grid-cols-2">
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="team-member ' . htmlspecialchars($row["category"]) . ' items-center bg-gray-50 rounded-lg shadow sm:flex dark:bg-gray-800 dark:border-gray-700">';
                    echo '<a href="#"><img class="w-full rounded-lg sm:rounded-none sm:rounded-l-lg" src="' . htmlspecialchars($row["image_url"]) . '" alt="' . htmlspecialchars($row["name"]) . ' Avatar"></a>';
                    echo '<div class="p-5">';
                    echo '<h3 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white"><a href="#">' . htmlspecialchars($row["name"]) . '</a></h3>';
                    echo '<span class="text-gray-500 dark:text-gray-400">' . htmlspecialchars($row["category"]) . '</span>';
                    echo '<p class="mt-3 mb-4 font-light text-gray-500 dark:text-gray-400">' . htmlspecialchars($row["description"]) . '</p>';
                    
                    if (!empty($row["poster"])) {
                        echo '<a href="' . htmlspecialchars($row["poster"]) . '" class="text-blue-500 hover:text-blue-700 dark:hover:text-blue-300">View Poster</a>';
						echo '<a href="' . htmlspecialchars($row["poster"]) . '" download class="ml-4 text-blue-500 hover:text-blue-700 dark:hover:text-blue-300">Download Poster</a>';
                    }
                    
                    echo '</div></div>';
                }
            } else {
                echo "No student found.";
            }
            $conn->close();
            ?>
        </div>  
    </div>
</section>
        <div class="flex justify-center mb-6">
<button onclick="window.location.href='test.php'" class="px-4 py-2 m-1 bg-blue-500 text-white rounded">Virtual Tour</button>
</div>


<footer class="container mx-auto bg-white py-8 border-t border-gray-400">
  <div class="container flex px-3 py-8 ">
    <div class="w-full mx-auto flex flex-wrap">
      <div class="flex w-full lg:w-1/2 ">
        <div class="px-3 md:px-0">
          	    <a id="loginBtn" class="inline-block no-underline hover:text-black cursor-pointer">
                    <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <circle fill="none" cx="12" cy="7" r="3" />
                        <path d="M12 2C9.243 2 7 4.243 7 7s2.243 5 5 5 5-2.243 5-5S14.757 2 12 2zM12 10c-1.654 0-3-1.346-3-3s1.346-3 3-3 3 1.346 3 3S13.654 10 12 10zM21 21v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h2v-1c0-2.757 2.243-5 5-5h4c2.757 0 5 2.243 5 5v1H21z" />
                    </svg>
                </a>
		  
		  <h3 class="font-bold text-gray-900">< Emerge ></h3>
          <p class="py-4">
            Copyright © 2023 Ara Institute of Canterbury
          </p>
		  
        </div>
      </div>
</footer>



<script>
/*  
  function filterMembers(category) {
        const members = document.querySelectorAll('.team-member');
        members.forEach(member => {
            if (category === 'all') {
                member.classList.remove('hidden');
            } else if (!member.classList.contains(category)) {
                member.classList.add('hidden');
            } else {
                member.classList.remove('hidden');
            }
        });
    }
	*/
	
function filterMembers(category) {
    var members = document.getElementsByClassName('team-member');
    for (var i = 0; i < members.length; i++) {
        if (category === '' || members[i].classList.contains(category)) {
            members[i].style.display = 'block';
        } else {
            members[i].style.display = 'none';
        }
    }
}


        // Getting the models
        var modal = document.getElementById("loginModal");
        // buttons for models
        var btn = document.getElementById("loginBtn");
        // closing the models login
        var closeBtn = document.getElementById("closeBtn");

        // opening models when it click
        btn.onclick = function() {
            modal.classList.remove("hidden");
        }

        // close the mosels when it click
        closeBtn.onclick = function() {
            modal.classList.add("hidden");
        }

        // when click outside it close
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.classList.add("hidden");
            }
        }
</script>
</body>

</html>
