<?php

require_once("ComposerDataMySQL.php");//se include

session_start();//se porneste o sesiune

$composerData = new ComposerData();//se creeaza un nou ComposerData
$composers = $composerData->composers;//se initializeaza cu lista de composers din composerData
$results = array();//se vor scrie sub forma de lista
$namesAdded = false;

if (isset($_GET['action']) && $_GET['action'] == "complete") {
    foreach ($composers as $composer) {
        if (!is_numeric($_GET['id']) &&//daca nu este numeric si

                (stripos($composer->produs, $_GET['id']) === 0 ||

                stripos($composer->pret, $_GET['id']) === 0) ||

                stripos($composer->produs . " " . $composer->pret, $_GET['id']) === 0) {

            $results[] = $composer;//composer se adauga in lista de rezultate
        }
    }


    if (sizeof($results) != 0) {//daca s-au gasit rezultate
        header('Content-type: text/xml');
        echo "<composers>";
        foreach ($results as $result) {
            echo "<composer>";
            echo "<id>" . $result->id . "</id>";//se afiseaza rezultatele
            echo "<produs>" . $result->produs . "</produs>";
            echo "<pret>" . $result->pret . "</pret>";
            echo "</composer>";
        }
        echo "</composers>";
    } 
}


if (isset($_GET['action']) && isset($_GET['id']) && $_GET['action'] == "lookup") {
    foreach ($composers as $composer) {
        if ($composer->id == $_GET['id']) {//verifica id-ul si in functie de acesta deschide pagina composerView
            
            $_SESSION ["id"] = $composer->id;
            $_SESSION ["produs"] = $composer->produs;
            $_SESSION ["pret"] = $composer->pret;
            $_SESSION ["categoria"] = $composer->categoria;
			$_SESSION ["poza"]=$composer->poza;

            header("Location: composerView.php");//se deschide fereastra cu pagina composerView
        }
    }
}

?>