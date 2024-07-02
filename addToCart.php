<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="background-color: #094A34;">
    <?php

    require_once 'Controller/Cart.php';
    session_start();
    $qntItem = $_POST['qntItem'];
    $item = $_POST['item'];
    $id = $_POST['id'];

    require_once 'Controller/Order.php';
    
    $_SESSION['carrinhoItens'] = new Order();
    $_SESSION['carrinhoItens']->addItem($id, $qntItem, $item);


    $_SESSION['carrinho']->incrementCounter($qntItem);
    ?>


    <script>
        window.location.replace('index.php')
    </script>
</body>

</html>