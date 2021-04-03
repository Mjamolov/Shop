<?php
    include_once __DIR__ . "/../../common/src/Service/UserService.php";

    $currentUser = UserService::getCurrentUser();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Shop</title>
    <link rel="stylesheet" href="/php/Shop(stream13)/frontend/css/styles.css">
    <link rel="stylesheet" href="/php/Shop(stream13)/frontend/css/shop-style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="/php/Shop(stream13)/frontend/js/scripts.js"></script>
</head>
<body>
<header>
    <div id="head">
        <div class="top">
            <div  class="width1024">
                <ul class="desktop-element">
                    <li> <?=!empty($currentUser['login'])
                            ? ' <span style="color: #fff">Hello, ' . $currentUser['login'] . '!'
                            : '<a href="http://localhost/php/Shop(stream13)/frontend/index.php?model=register&action=form">Register</a>'?></li>
                    <li><a href="http://localhost/php/Shop(stream13)/frontend/index.php/?model=site&action=login">Sign in </a></li>
                    <li><a href="http://localhost/php/Shop(stream13)/frontend/index.php/?model=auth&action=logout">Sign out</a></li>
                    <?=!empty($currentUser['login']) ? '<li><a href="http://localhost/php/Shop(stream13)/frontend/index.php?model=basket&action=view">Basket</a></li>' : ' '?>
                    <li><a href="">Help</a></li>
                </ul>
                <div id="mobile-logo" class="mobile-element">BOOKS</div>
                <select id="top-link" onchange="document.local='#' + this.value"  class="mobile-element form-control">
                    <option disabled selected></option>
                    <option value="http://localhost/php/Shop(stream13)/frontend/index.php?model=register&action=form">Register</option>
                    <option value="http://localhost/php/Shop(stream13)/frontend/index.php?model=site&action=login">Sign in</option>
                    <option value="#order">Order Status</option>
                    <option value="#help">Help</option>
                </select>
            </div>
        </div>
        <div class="header-panel">
            <div class="width1024 flex">
                <div id="logo">
                    <a href="http://localhost/php/Shop(stream13)/frontend/index.php?model=product&action=all"><img src="/php/Shop(stream13)/frontend/imgs/logo.png" ></a>
                </div>
                <div id="search-field">
                    <form action="#">
                        <input type="text" name="search_text">
                        <button>Search</button>
                    </form>
                </div>
                <div id="basket-container">
                    <div>Your card <span>(2 items)</span></div>
                    <div><b>$125.0</b><a href="#">Checkout</a></div>
                </div>
                <div id="favor">
                    <div>Wish list</div>
                </div>
            </div>
        </div>
    </div>
    <nav>
        <ul class="width1024">
            <li><a href="#">Computers</a></li>
            <li><a href="#">Cooking</a></li>
            <li><a href="#">Education</a></li>
            <li><a href="#">Fiction</a></li>
            <li class="active"><a href="#">Health</a></li>
            <li><a href="#">Medical</a></li>
            <li><a href="#">Reference</a></li>
            <li><a href="#">Science</a></li>
        </ul>
        <select onchange="document.location=this.value" class="mobile-element">
            <option disabled selected></option>
            <option value="#Computers">Computers</option>
            <option value="#Cooking">Cooking</option>
            <option value="#Education">Education</option>
            <option value="#Health">Health</option>
            <option value="#Medical">Medical</option>
            <option value="#Reference">Reference</option>
            <option value="#Science">Science</option>
        </select>
    </nav>
</header>

<div class="body">