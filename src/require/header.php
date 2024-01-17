<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hack-Ovo</title>
    <link rel="icon" href="../../../public/Hack-OvoLogo.PNG" type="image/png">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <script src="https://kit.fontawesome.com/7f605dc8fe.js" crossorigin="anonymous"></script>

    <style>
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
    </style>
</head>

<body>
    <div class="header">

        <div class="p15">
            <button id="menuToggle">
                &#9776; Menua
            </button>
        </div>
        <div></div>

        <div class="p15 menu-header">
            <button id="button-header-favorite">
                <i class="fa-solid fa-heart"></i>
                <span class="counter-favorite">0</span>
            </button>
        </div>

        
        <div class="container-list-favorites">
                <div class="header-favorite">
                    <h3>Gustokoenak</h3>
                    <i class="fa-solid fa-xmark" id="btn-close"></i>
                </div>
                <hr />
                <div class="list-favorites">
                    <div class="card-favorite">
                    </div>
                </div>
            </div>

    </div>

</body>