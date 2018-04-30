<?php

class Comune
{
    //attributi
    private $Codice;
    private $Nome;
    private $Provincia;
    //metodi
    public function __construct($Cod,$Name,$Prov){
        $this->Nome=$Name;
        $this->Provincia=$Prov;
        $this->Codice=$Cod;
    }
    
    public function getCodice(){
        return $this->Codice;
    }
    
    public function getNome(){
        return $this->Nome;
    }
    
    public function getProv(){
        return $this->Provincia;
    }
    
    public function getContents(){
        return $this;
    }
    
    public function toString(){
        $stringa="$this->Nome,($this->Provincia)";
        return $stringa;
    }
}

