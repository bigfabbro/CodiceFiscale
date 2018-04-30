<?php

include 'Persona.php';
class InputPersone
{
    private $NomeFile="Persone.txt";
    
    public function __construct(){
        
    }
    
    public function InputFile($Comuni){
        $format='d/m/Y';
        foreach ($Comuni as $com ){
            $colonna[]=$com->getNome();
        }
        array_unshift($colonna, "");
        if(file_exists($this->NomeFile)){
            $f=fopen($this->NomeFile,'r');
            $righe=explode("\n",rtrim(fread($f,filesize($this->NomeFile))));
            for($i=0; $i<count($righe); ++$i){
                $dati=explode(";",$righe[$i]);
                $data=DateTime::createFromFormat($format, $dati[3]);
                $kcom=array_search(strtoupper(rtrim($dati[4])), $colonna);
                if($kcom!=NULL){
                   $a[]=new Persona($dati[0], $dati[1], $dati[2], $data, $Comuni[$kcom-1]);
                }
                else throw new Exception("Comune inesistente");
            }
            print_r($a);
        }
        else throw new Exception("File Inesistente");
        fclose($f);
        return $a;
    }
}

