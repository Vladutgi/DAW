<?php
session_start();//se porneste o sesiune

if (isset($_POST['add_to_cart'])) {//daca metoda post a fost apleata dintr-o pagina a unui produs

    $id = $_SESSION["id"];//se initializeaza cu valoarea din sesiune
    $produs = $_SESSION["produs"];
    $pret = $_SESSION["pret"];
    $categoria = $_SESSION["categoria"];
    $poza = $_SESSION["poza"];


    $cart_item = array(//se adauga o lista cu toate proprietatile obiectului din cart
        'id' => $id,
        'produs' => $produs,
        'pret' => $pret,
        'categoria' => $categoria,
        'poza' => $poza
    );


    if (!isset($_SESSION['cart'])) {//daca sesiunea cartului nu exista
        $_SESSION['cart'] = array();//sesiunea cartului va fi o lista goala
    }


    $_SESSION['cart'][] = $cart_item;//in sesiunea cartului se adauga obiectul 
}


header("Location: cart_page.php");//ne transporta in pagina cart_page.php
exit();//se termina sesiunea
?>