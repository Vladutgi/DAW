<?php

require "Composer.php";//sunt incluse filele
require_once('conectareMySQL.php');

class ComposerData {

    public $composers;

    function __construct() {
        GLOBAL $con_id;
        $this->composers = array();//composers este initializat cu o lista goala
        $interogare="SELECT * FROM COMPOZITORI";//se selecteza totul din baza de date
        $rez_id=mysqli_query($con_id,$interogare); //con_id este conexiunea la baza de date
        while($inreg=mysqli_fetch_row ($rez_id)) {//inreg va fi o lista cu toate valorile din interogarea bazei de date
            $id=$inreg[0]; //id-ul va fi prima inregistrare din baza de date
            $produs=$inreg[1];//produsul va fi inregistrarea a doua din baza de date
            $pret=$inreg[2];//pretul va fi inregistrarea a treia din baza de date
            $categoria=$inreg[3];//categoria va fi inregistrarea a patra din baza de date
			$poza=$inreg[4];//poza va fi inregistrarea a cincea din baza de date
			
			
			
            array_push($this->composers, new Composer($id, $produs, $pret, $categoria,$poza));//se adauga un nou obiect Composer si se adauga in lista composers
            
        }
        
            
    }

}

?>