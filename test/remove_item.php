<?php
session_start();//incepe o sesiune

if (isset($_POST['remove_item'])) {
    $key = $_POST['key'];//se returneaza valoarea cheii din POST

    if (isset($_SESSION['cart'][$key])) {//daca in cart exista un obiect $key
        unset($_SESSION['cart'][$key]);//obiectul de tipul $key
        $_SESSION['cart'] = array_values($_SESSION['cart']);//se reinitializeaza
    }
}


header("Location: cart_page.php");//face refresh paginii
exit();//se incheie sesiunea
?>
