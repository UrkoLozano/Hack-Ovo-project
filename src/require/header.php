<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hack-Ovo</title>
    <link rel="icon" href="../../../public/Hack-OvoLogo.PNG" type="image/png">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <script src="https://kit.fontawesome.com/7f605dc8fe.js" crossorigin="anonymous"></script>
   
        <style>
       
        .cart{
        position: absolute;
        top: 10;
        right: 50;
            height: 10px;
            width:10px;
            
        }
  
       header a {
           text-decoration: none;
           font-size: 30px;
           color: #fff;
       }
       
       .menu-header {
           position: fixed;
           top: 10;
           right: 10;
       }
       
       .menu-header button {
           border: none;
           background: none;
           outline: none;
           width: 45px;
           height: 45px;
           color: #fff;
           font-size: 22px;
           position: relative;
           cursor: pointer;
       }
       
       .menu-header button:hover {
           transform: scale(1.05);
       }
       
       .counter-favorite {
           font-size: 10px;
           position: absolute;
           background-color: orange;
           color: #000;
           font-weight: 700;
           width: 20px;
           height: 20px;
           display: flex;
           justify-content: center;
           align-items: center;
           bottom: 0;
           right: 0;
           border-radius: 50%;
       }
       
       .container {
           max-width: 1200px;
           margin: 0 auto;
       }
       
       .container-products {
           display: grid;
           grid-template-columns: repeat(3, 1fr);
           margin: 30px 0;
           gap: 30px;
       }
       
       .card-product {
           display: flex;
           flex-direction: column;
           gap: 20px;
           cursor: pointer;
       }
       
       .content-card-product {
           display: flex;
           flex-direction: column;
           gap: 15px;
           padding: 10px 25px;
       }
       
       .container-img {
           height: 200px;
           border-radius: 12px;
           overflow: hidden;
       }
       
       .container-img img {
           width: 100%;
           height: 100%;
           object-fit: cover;
       }
       
       .footer-card-product {
           display: flex;
           align-items: center;
           justify-content: space-between;
           padding: 0px;
       }
       
       .price {
           font-weight: 700;
           font-size: 24px;
           color: #555;
       }
       
       .container-buttons-card {
           display: flex;
           gap: 20px;
       }
       
       .container-buttons-card button {
           border: none;
           background: none;
           outline: none;
           cursor: pointer;
           box-shadow: 0px 0px 15px #00000025;
           width: 40px;
           height: 40px;
           border-radius: 50%;
           font-size: 18px;
       }
       
       /* ************ */
       /*         LISTA DE FAVORITOS         */
       /* ************ */
       .container-list-favorites {
           position: fixed;
           top: 0;
           right: 0;
           transform: translateX(400px);
           background-color: #555;
           opacity: 0;
           width: 400px;
           height: 100vh;
           transition: all 0.5s linear;
       }
       
       .container-list-favorites.show {
           opacity: 1;
           transform: translateX(0);
       }
       
       .header-favorite {
           padding: 15px 30px;
           display: flex;
           justify-content: space-between;
           align-items: center;
       }
       
       .header-favorite i {
           cursor: pointer;
       }
       
       .list-favorites {
           padding: 35px 20px;
           display: flex;
           flex-direction: column;
           gap: 25px;
       }
       
       .list-favorites .card-favorite {
           width: 100%;
           background-color: #fff;
           box-shadow: 0px 0px 20px #00000065;
           padding: 20px;
           border-radius: 10px;
           display: flex;
           align-items: center;
           justify-content: space-between;
           gap: 30px;
       }
       
       .card-favorite .title {
           color: #000;
           flex: 1;
       }
       
       .card-favorite p:last-child {
           font-weight: 700;
           font-size: 22px;
           color: #000;
       }
       </style>
</head>

<body>
    <header>
        <div>
            <img width="300" height="200" src="../../../public/Hack-OvoLogo.PNG" />
        </div>
        <div class="menu-header">
            <button id="button-header-favorite">
                <i class="fa-solid fa-heart"></i>
                <span class="counter-favorite">0</span>
            </button>
        </div>

        <div class="container-list-favorites">
            <div class="header-favorite">
                <h3>Gustukoenak</h3>
                <i class="fa-solid fa-xmark" id="btn-close"></i>
            </div>
            <hr />
            <div class="list-favorites">
                <div class="card-favorite">
                </div>
            </div>
        </div>

        <div class="cart">
            <a href="../Karrito/karrito.php">
                <span class="material-symbols-outlined cart-icon"><i class="fa-solid fa-cart-shopping"></i></span>
            </a>
        </div>
    </header>
</body>