<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header</title>
    <link rel="stylesheet" href="./css.css">  
    <script src="./java.js"></script>
</head>
<body>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <div class="nav-bar">
        <ul class="nav-bar-list">
            <li class="nav-bar-items"><a href="index.php">Home</a></li>
            <li class="nav-bar-items"><a onclick="ab_scroll_to()">About</a></li>
            <li class="nav-bar-items"><a onclick="co_scroll_to()">Contact</a></li>
        </ul>
        <ul class="nav-bar-list-2">
            <li class="nav-bar-items"><a href=""><ion-icon name="cart-outline"></ion-icon></a></li>
            <li class="nav-bar-items"><a href="actions/user-logout.php"><ion-icon name="log-out-outline"></ion-icon></a></li>
            <li class="nav-bar-items"><a href="user-login.php"><ion-icon name="person-outline"></ion-icon></a></li>
        </ul>
    </div>
