<?php

class Output
{
    //attributi
    private $NomeFile="PersCodFisc.txt";
    //metodi
    public function __construct(){
        
    }
    
    public function outputFile($Persone){
        if(!file_exists($this->NomeFile)){
            $f=fopen($this->NomeFile,'w');
        }
        else throw new Exception("Il file gia' esiste!");
        for($i=0; $i<count($Persone); $i++){
            $p=$Persone[$i]->toString();
            fwrite($f,"$p\r\n");
        }
        fclose($f);
    }
}

