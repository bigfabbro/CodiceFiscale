<?php
include 'Comune.php';
class InputComuni
{
    private $NomeFile="Comuni.txt";
    
    public function __construct(){
        
    }
    
    public function InputFile(){
        if(file_exists($this->NomeFile)){
            $f=fopen($this->NomeFile,'r');
            $righe=explode("\n",rtrim(fread($f,filesize($this->NomeFile))));
            for($i=0; $i<count($righe); $i++){
                $dati=explode(";",$righe[$i]);
                $a[]=new Comune($dati[0], $dati[1], $dati[2]);
            }
        }
        else throw new Exception("File Inesistente");
        fclose($f);
        return $a;
    }
}

