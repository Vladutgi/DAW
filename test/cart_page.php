<html>
<head>
    <title>Cart</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body style="background-color:#bcbcbc">
   
<div class="u"></div>
<p font="White" class="back"> <a href="index.html" class="link"> <- Back</a></p>
<br><br><br>
   <h2>Cosul meu</h2>

    <table>
        <tr>
            <th>Produs</th>
            <th>Pret</th>
            <th>Categoria</th>
           
        </tr>
		
        <?php
        session_start();//incepe o sesiune

        if (isset($_SESSION['cart'])) {//daca exista un cart
            foreach ($_SESSION['cart'] as $key => $cart_item) {//fiecare obiect va avea o cheie
                echo "<tr>";
                echo "<td>" . $cart_item['produs'] . "</td>";//se va afisa numele produsului
                echo "<td>" . $cart_item['pret'] . "</td>";//se va afisa pretul produsului
                echo "<td>" . $cart_item['categoria'] . "</td>";//se va afisa categoria produsului
                echo "<td>";
                echo "<form action='remove_item.php' method='post'>";//form-ul va trimite catre remove_item.php daca bbutonul a fost apasat
                echo "<input type='hidden' name='key' value='$key'>";//obiect ascuns pentru pastrarea unei chei unice, a obiectului 
                echo "<input type='submit' name='remove_item' value='Delete'>";//adaugarea butonului responsabil stergerii produselor din cos
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
</body>
</html>
