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
  <title>360 Image with Zoomable Posters</title>
  <script src="https://aframe.io/releases/1.2.0/aframe.min.js"></script>
  <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Work+Sans:200,400&display=swap" rel="stylesheet">
  <style>
    /* Additional styles to handle the responsiveness */
    @media (max-width: 768px) {
      #menuAside {
        transition: transform 0.3s ease-in-out;
        z-index: 50; /* Ensure it's above other content */
      }
    }
  </style>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
  <nav id="header" class="fixed w-full z-30 top-0 py-1 bg-white shadow-lg">
    <div class="container mx-auto flex flex-wrap items-center justify-between mt-0 px-6 py-3">
      <!-- Toggle Button for Mobile -->
      <button id="toggleMenu" class="md:hidden text-gray-800 hover:text-gray-600 focus:outline-none focus:text-gray-600" aria-label="Toggle navigation">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
      <div class="flex justify-center mb-6">
        <button onclick="window.location.href='index.php'" class="px-4 py-2 m-1 bg-blue-500 text-white rounded">Home</button>
      </div>
      <div class="order-1 md:order-2">
        <a class="flex items-center tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl" href="index.html">
          <span>&lt; Emerge &gt;</span>
        </a>
      </div>
      <div class="order-2 md:order-3 flex items-center" id="nav-content">
        <a class="inline-block no-underline hover:text-black" href="#">
          <img src="images/araLogo.png" class="fill-current text-gray-800 mr-2" width="24" height="24" alt="ARA Logo">
        </a>
      </div>
    </div>
  </nav>


  <div id="popupMessage" class="fixed inset-0 bg-gray-600 bg-opacity-75 flex items-center justify-center z-50">
    <div class="bg-white p-6 rounded-lg shadow-lg text-center">
      <h2 class="text-lg font-bold mb-4">Welcome to Emerge Virtual Tour!</h2>
      <p class="mb-4">Click the burger line above to view individual posters.</p>
      <button id="closePopup" class="px-4 py-2 bg-blue-500 text-white rounded">Got it!</button>
    </div>
  </div>

  <!-- Aside navigation for posters -->
  <aside id="menuAside" class="fixed top-16 left-0 w-60 bg-gray-200 h-screen p-4 overflow-y-auto transform -translate-x-full md:translate-x-0 md:block z-40">
    <h2 class="text-lg font-bold mb-4">Posters</h2>
    <ul>
      <li><button onclick="window.location.href='test.php'" class="block py-2 px-4 bg-blue-500 text-white rounded mb-2 w-full text-left">Main</button></li>
      <?php
        $result->data_seek(0);
        while ($row = $result->fetch_assoc()) {
          echo '<li><button onclick="navigateToPoster(\'#poster' . $row['id'] . '\')" class="block py-2 px-4 bg-blue-500 text-white rounded mb-2 w-full text-left">' . htmlspecialchars($row['name']) . '</button></li>';
        }
      ?>
    </ul>
  </aside>

  <!-- A-Frame scene container -->
  <div class="ml-0 md:ml-60 mt-16 h-screen relative z-10">
    <a-scene embedded style="height: calc(100vh - 4rem);">
      <!-- 360° Image -->
      <a-sky src="images/s_room_without_posters.jpg"></a-sky>

      <!-- Posters -->
      <?php
        $positions = [
          ['x' => 2, 'y' => 1.5, 'z' => -3],
          ['x' => -2, 'y' => 1.5, 'z' => -3],
          ['x' => 2, 'y' => 1.5, 'z' => -5],
          ['x' => -2, 'y' => 1.5, 'z' => -5]
        ];
        $i = 0;
        $result->data_seek(0); // Reset result pointer to the beginning
        while ($row = $result->fetch_assoc()) {
          $position = $positions[$i % count($positions)];
          echo '<a-plane id="poster' . $row['id'] . '" src="' . htmlspecialchars($row['poster']) . '" position="' . $position['x'] . ' ' . $position['y'] . ' ' . $position['z'] . '" width="1" height="1.5" class="clickable" 
                event-set__mouseenter="_event: mouseenter; scale: 1.1 1.1 1.1" 
                event-set__mouseleave="_event: mouseleave; scale: 1 1 1" 
                event-set__click="_event: click; _target: #zoomedPoster; visible: true; src: ' . htmlspecialchars($row['poster']) . ';"></a-plane>';
          $i++;
        }
      ?>

      <!-- Zoomed Poster (Initially Hidden) -->
      <a-plane id="zoomedPoster" position="0 1.5 -1" width="3" height="4" visible="false"></a-plane>

      <!-- Camera -->
      <a-camera wasd-controls="enabled: true">
        <a-cursor></a-cursor>
      </a-camera>
    </a-scene>
  </div>

  <script>
    function navigateToPoster(posterId) {
      const poster = document.querySelector(posterId);
      const position = poster.getAttribute('position');
      document.querySelector('a-camera').setAttribute('position', {
        x: position.x,
        y: position.y,
        z: position.z + 1.5
      });
    }

    // Add event listener for zooming
    document.addEventListener('wheel', function(event) {
      const zoomedPoster = document.querySelector('#zoomedPoster');
      if (!zoomedPoster.getAttribute('visible')) return;

      event.preventDefault();
      const currentWidth = parseFloat(zoomedPoster.getAttribute('width'));
      const currentHeight = parseFloat(zoomedPoster.getAttribute('height'));

      // Adjust the size based on scroll direction
      const newWidth = event.deltaY < 0 ? currentWidth * 1.1 : currentWidth * 0.9;
      const newHeight = event.deltaY < 0 ? currentHeight * 1.1 : currentHeight * 0.9;

      zoomedPoster.setAttribute('width', newWidth);
      zoomedPoster.setAttribute('height', newHeight);
    });


    document.getElementById('toggleMenu').addEventListener('click', function() {
      const menuAside = document.getElementById('menuAside');
      menuAside.classList.toggle('-translate-x-full'); 
    });

   
    document.getElementById('closePopup').addEventListener('click', function() {
      const popupMessage = document.getElementById('popupMessage');
      popupMessage.style.display = 'none'; 
    });

    // Show popup modal on page load
    window.addEventListener('load', function() {
      const popupMessage = document.getElementById('popupMessage');
      popupMessage.style.display = 'flex'; // Show the popup
    });
  </script>
</body>
</html>
