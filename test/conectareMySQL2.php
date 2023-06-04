<?php
$host = 'localhost';
$user = 'root';
$pass = '123456';
$dbname = 'COMPOZITORI';
//if (!mysql_select_db($dbname)) echo "EROARE DE CONECTARE LA ".$dbname;
//GLOBAL $con_id;
$con_id = @mysqli_connect($host, $user, $pass, $dbname)or die ('Eroare conectare');


if (!$con_id) {
    echo "Eroare: Nu a fost posibil� conectarea la MySQL." . PHP_EOL;
    echo "Valoarea errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Valoarea error: " . mysqli_connect_error() . PHP_EOL;
    exit;
} else {
    echo "Succes: Conexiunea la MySQL a fost stabilita! </br>Baza de date ".$dbname." este conectata si accesibila!.</br>" . PHP_EOL;
    echo "Informatii despre host: " . mysqli_get_host_info($con_id) . PHP_EOL;

}

echo "Succes: Conexiunea la MySQL a fost stabilita! </br>Baza de date ".$dbname." este conectata si accesibila!.</br>" . PHP_EOL;
echo "Informatii despre host: " . mysqli_get_host_info($con_id) . PHP_EOL;
    $interogare="SELECT * FROM ".$dbname;
        $rez_id=mysqli_query($con_id,$interogare);
        while($inreg=mysqli_fetch_row ($rez_id)) {
            echo "<br/>".$inreg[0]." | ";
            echo $inreg[1]." | ";
            echo $inreg[2]." | ";
            echo $inreg[3]." | ";
        }
        $mysqli_free_result = mysqli_free_result($rez_id);
      
       
?>

