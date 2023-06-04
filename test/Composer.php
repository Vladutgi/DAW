<?php


class Composer {

    public $id;
    public $produs;
    public $pret;
    public $categoria;
	public $poza;

    function __construct($id, $produs, $pret, $categoria,$poza) {
        $this->id = $id;// valoarea id va fi egala cu valoarea id a obiectului
        $this->produs = $produs;
        $this->pret = $pret;
        $this->categoria = $categoria;
		$this->poza = $poza;
    }
}
?>