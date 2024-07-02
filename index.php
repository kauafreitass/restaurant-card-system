<?php
require_once 'Controller/Cart.php';
require_once 'Controller/Order.php';
require_once './php_action/db_connect.php';
session_start();

if (!isset($_SESSION['carrinho'])) {
  $_SESSION['carrinho'] = new Cart();
}
?>


<!doctype html>
<html class="" lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://kit.fontawesome.com/904bf533d7.js" crossorigin="anonymous"></script>
  <title>Menu - Sanvi</title>
</head>

<body>

  <nav class="menu">
    <div class="logo">
      <a href="index.php"><img src="img/logo.png" alt="logo" width="120px"></a>
    </div>
    <div class="menu-links">
      <a href="menu.html"><i class="fa-solid fa-clipboard"></i></a>
      <a href="cartPage.php"><i class="fa-solid fa-cart-shopping"></i></a>
      <?php
      $counter = $_SESSION['carrinho']->getCounter();

      if ($counter > 0) {
        $tens = floor($counter / 10);
        $units = $counter % 10;

        echo '<div class="cart-counter">';
        echo '<span>';

        if ($tens > 0) {
          echo '<i class="fa-regular fa-' . $tens . '"></i>';
        }

        if ($units >= 0) {
          echo '<i class="fa-regular fa-' . $units . '"></i>';
        }

        if ($counter > 99) {
          $_SESSION['carrinho']->cartCounter = 0;
        }

        echo '</span>';
        echo '</div>';
      }
      ?>
    </div>
  </nav>

  <?php

  $pratos = [
    "Macarrão à carbonara",
    "Macarrão ao alho e óleo",
    "Macarrão ao molho vermelho",
  ];

  $pratosPrecos = [
    15.90,
    10.00,
    12.00,
  ];

  require_once 'Controller/FormatarPreco.php';

  for ($i = 0; $i < count($pratos); $i++) {
    echo '<div class="container-card">
    <div class="card">
      <div class="product-image">
        <img src="img/' . $i . '.jpg" alt="product" width="100px">
      </div>
      <div class="product-info">
        <h2>' . $pratos[$i] . '</h2>
        <!-- <p>Descrição do produto</p> -->
        <div class="product-price">
          <span>R$ ' . FormatarPreco($pratosPrecos[$i]) . '</span>
        </div>
        <div class="product-quantity">
        </div>
        <div class="product-form-button">
          <form method="POST" action="addToCart.php">
            <input type="number" min="1" max="99" step="1" value="1" name="qntItem">
            <input type="hidden" name="id" value="' . $i . '">
            <button class="add-to-cart" type="submit" name="item" value="'.$pratos[$i].'"><i class="fa-solid fa-cart-shopping" ></i> Adicionar ao carrinho</button>
          </form>
        </div>
      </div>
    </div>
  </div>';
  }

  ?>

  <script src="js/app.js"></script>

</body>

</html>