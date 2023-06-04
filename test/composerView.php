<?php
session_start();

$id = $_SESSION ["id"];
$produs = $_SESSION ["produs"];
$pret = $_SESSION ["pret"];
$categoria = $_SESSION ["categoria"];
$poza	= $_SESSION ["poza"];
?>

<html>
    <head>
        <title>Informatii despre produs</title>
		
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
    </head>
    <body style="background-color:#bcbcbc">
	<div class="u"></div>
	<div class="asezare">
        <table>
            <tr>
                <th colspan="2">Informatii despre produs</th>
            </tr>
            <tr>
                <td>Produs: </td>
                <td><?php echo $produs; ?></td>
            </tr>
            <tr>
                <td>Pret: </td>
                <td><?php echo $pret; ?></td>
            </tr>
            <tr>
                <td>ID=index in lista: </td>
                <td><?php echo $id; ?></td>
            </tr>
            <tr>
                <td>Categoria: </td>
                <td><?php echo $categoria; ?></td>
            </tr>
			<tr>
                
                <td>
				<img src="imagini/<?php echo $poza; ?>" alt="Image" class="pz">
				</td>
            </tr>
			<tr>
			<form action="cart.php" method="post">
				<td>
					<input type="submit" name="add_to_cart" value="Adauga in cos">
				</td>
				</form>
			</tr>
        </table>
	</div>
        <p font="White" class="back"> <a href="index.html" class="link"> <- Back</a></p>
    <br><br>
	
    </body>
</html>