<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menú Lateral</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
    }

    #menu {
      width: 250px;
      height: 100%;
      background-color: #333;
      position: fixed;
      left: -250px;
      transition: left 0.3s ease;
      position: fixed;
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

    #menuToggle {
      display: block;
      position: fixed;
      left: 10px;
      top: 10px;
      cursor: pointer;
      z-index: 2;
      color: #fff;
    }
  </style>
</head>
<body>

  <div id="menu">
    <ul>
      <li><a href="../Hasiera/index.php">Hasiera</a></li>
      <li><a href="../GureInformazia/OurInfo.php">Gure Informazioa</a></li>
      <li><a href="../Katalogo/katalogoa.php">Katalogoa</a></li>
      <li><a href="../Notiziak/notiziak.php">Notiziak</a></li>
      <li><a href="../Hornitzaileak/hornitzaileak.php">Hornitzaileak</a></li>
      <li><a href="../Login/login.php">Saioa hasi</a></li>
      <li><a href="../Erregistratu/registratu.html">Erregistratu</a></li>
    </ul>
  </div>

  <div id="menuToggle">&#9776; Menua</div>

  <script>
    document.getElementById('menuToggle').addEventListener('click', function() {
      var menu = document.getElementById('menu');
      if (menu.style.left === '0px') {
        menu.style.left = '-250px';
      } else {
        menu.style.left = '0px';
      }
    });
  </script>

</body>
</html>
