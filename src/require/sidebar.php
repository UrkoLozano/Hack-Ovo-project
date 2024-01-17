<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
    }

    #menu {
      height: 100vh; /* Altura del 100% del viewport */
      width: 170px;
      background-color: black;
      position: fixed;
      top: 0;
      left: 0;
      transition: left 0.5s ease;
      z-index: 1;
      /*position:;*/
    }

    #menu ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    #menu li {
      padding: 15px;
      border-bottom: 1px solid #555;
      color: #fff;
    }

    #menu a {
      text-decoration: none; 
      color: inherit; 
    }
  </style>
</head>
<body>

<div id="menu">
  <ul>
      <li><a href="../Hasiera/index.php">Hasiera      </a><a class="closebtn">X</a></li>
      <li><a href="../GureInformazia/OurInfo.php">Gure Informazioa</a></li>
      <li><a href="../Katalogo/katalogoa.php">Katalogoa</a></li>
      <li><a href="../Notiziak/notiziak.php">Notiziak</a></li>
      <li><a href="../Hornitzaileak/hornitzaileak.php">Hornitzaileak</a></li>

    </ul>
</div>
<script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>
  <script>
    document.getElementById('menuToggle').addEventListener('click', function() {
      openCloseTab();
    });
    
    $(".closebtn").click(function(){
      openCloseTab();
    });

    function openCloseTab(){
      var menu = document.getElementById('menu');
      if (menu.style.left === '0px') {
        menu.style.left = '-250px';
      } else {
        menu.style.left = '0px';
      }
    }
  </script>

</body>
</html>
