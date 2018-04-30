<?php
class Persona
{
    //attributi
    private $Nome;
    private $Cognome;
    private $Sesso;
    private $DataNascita;
    private $LuogoNascita;
    private $CodFisc;
    //metodi
    public function __construct($name,$surname,$sex,$date,$place){
        $this->Nome=$name;
        $this->Cognome=$surname;
        $this->Sesso=$sex;
        $this->DataNascita=$date;
        $this->LuogoNascita=$place;
    }
    public function setCodFisc($codicefisc){
        $this->CodFisc=$codicefisc;
    }
    
    public function getNome(){
        return $this->Nome;
    }
    
    public function getCognome(){
        return $this->Cognome;
    }
    
    public function getSesso(){
        return $this->Sesso;
    }
    
    public function getDataN(){
        return $this->DataNascita;
    }
    
    public function getLuogoN(){
        return $this->LuogoNascita;
    }
    
    public function toString(){
        $data=($this->DataNascita)->format('d-m-Y');
        $luogo=$this->LuogoNascita->toString();
        $stringa="$this->Nome $this->Cognome,$this->Sesso,$data,$luogo,$this->CodFisc";
        return $stringa;
    }
}

