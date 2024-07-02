<?php
require_once 'Controller/Cart.php';
require_once 'Controller/Order.php';
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

  <div class="cart-container">
    <div class="cart-title">
      <h2>Seu pedido</h2>
    </div>
    <div>
      <table class="cart-table">
        <thead>
        <tr class="cart-header">
          <th>Produto</th>
          <th>Quantidade</th>
          <th>Preço</th>
        </tr>
        </thead>

        <?php
        $total = 0;
        $carrinho = $_SESSION['carrinhoItens'];
        foreach ($_SESSION['carrinhoItens']->itens as $item) {
          // $total += $item->getPrice() * $item->getQuantity();
          echo '<tbody>';
          echo '<tr class="item-row">';
          echo '<td>' . $item['name'] . '</td>';
          echo '<td>' . $item['quantity'] . '</td>';
          echo '<td>' . $carrinho->getPrice() . '</td>';
          echo '</tr>';
          echo '</tbody>';
          }
        ?>
        
    </div>
  </div>



  <script src="js/app.js"></script>

</body>

</html>