<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guri buruz</title>
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <!-- TODO: hemen ere layout top jarri -->
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            background-color: #f9f9f9; /* Optional: Set a background color for the body */
        }

        .container {
            max-width: 800px;
            margin: 40px auto; /* Adjust the top and bottom margin as needed */
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Adjust the shadow properties as needed */
            border-radius: 8px; /* Optional: Add border radius for rounded corners */
            margin-bottom: 20px; /* Add some space between containers */
        }

        p {
            color: #555;
        }

        footer {
            text-align: center;
            padding: 10px;
            background-color: #f2f2f2;
            margin-top: auto; /* Push the footer to the bottom */
        }
    </style>
</head>

<body>
    <?php
    require_once("../../require/header.php");
    require_once("../../require/sidebar.php");
    ?>

    <div class="container">
        <h2>Hack-ovo</h2>
        <p><?= itzuli("hack-ovo"); ?></p>
    </div>

    <div class="container">
        <h2><?= itzuli("Helburuak1"); ?></h2>
        <p><?= itzuli("helburuak2"); ?></p>
    </div>

    <div class="container">
        <h2><?= itzuli("Bereizi"); ?></h2>
        <h3><?= itzuli("Kali"); ?></h3>
        <p><?= itzuli("beherakoa"); ?></p>
    </div>

        <!-- TODO: hemen APP DIR ERABILI layoutBottom dagoen hoietan -->

    <?php
    require_once("../../require/layoutBottom.php");
    ?>
