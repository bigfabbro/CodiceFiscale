<?php

class CodiceFiscale
{
    public function __construct(){
        
    }
     
    private function first3($surname){
        $surname=str_replace(array(" ","'"), "", $surname);
        $f3="";     
        $vocali=array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U");
        $soloconsonanti=str_replace($vocali,"", $surname);
        $soloconsonanti=str_split($soloconsonanti);
        for($i=0; $i<3&&$i<count($soloconsonanti); $i++){
            $f3=$f3.$soloconsonanti[$i];
        }
        $n=3-strlen($f3);
        if($n>0){
            $lettere=str_split($surname);
            for($i=0; $i<count($lettere)&&strlen($f3)<3; $i++){
                if($lettere[$i]=="a"||$lettere[$i]=="A"||$lettere[$i]=="e"||$lettere[$i]=="E"||$lettere[$i]=="i"||$lettere[$i]=="I"||$lettere[$i]=="o"||$lettere[$i]=="O"||$lettere[$i]=="u"||$lettere[$i]=="U"){
                    $f3=$f3.$lettere[$i];
                }
            }
            if(strlen($f3)<3){
                for($i=0; $i<=(3-strlen($f3)); $i++){
                    $f3=$f3."X";
                }
            }
        }
        return strtoupper($f3);
    }
    
    private function second3($name){
        $name=str_replace(array(" ","'"), "", $name);
        $s3="";
        $vocali=array("a", "e", "i", "o", "u", "A", "E", "I", "O","U");
        $soloconsonanti=str_replace($vocali,"", $name);
        $soloconsonanti=str_split($soloconsonanti);
        
        if(count($soloconsonanti)>3){
           $s3=$soloconsonanti[0].$soloconsonanti[2].$soloconsonanti[3];
        }
        else if(count($soloconsonanti)==3){
            $s3=implode("",$soloconsonanti);
        }
        else if(count($soloconsonanti)<3){
            for($i=0; $i<3&&$i<count($soloconsonanti); $i++){
                $s3=$s3.$soloconsonanti[$i];
            }
            $n=3-strlen($s3);
            if($n>0){
                $lettere=str_split($name);
                for($i=0; $i<count($lettere)&&strlen($s3)<3; $i++){
                    if($lettere[$i]=="a"||$lettere[$i]=="A"||$lettere[$i]=="e"||$lettere[$i]=="E"||$lettere[$i]=="i"||$lettere[$i]=="I"||$lettere[$i]=="o"||$lettere[$i]=="O"||$lettere[$i]=="u"||$lettere[$i]=="U"){
                        $s3=$s3.$lettere[$i];
                    }
                }
                if(strlen($s3)<3){
                    for($i=0; $i<=(3-strlen($s3));$i++){
                        $s3=$s3."X";
                    }
                }
            }
        }
        return strtoupper($s3);
    }
    
    private function year2($data){
        $anno=$data->format('Y');
        $cifre=str_split($anno); 
        return ($cifre[2].$cifre[3]);
    }
    
    private function month1($data){
        $mese=$data->format('m');
        if($mese=="01") $lett="A";
        elseif($mese=="02") $lett="B";
        elseif($mese=="03") $lett="C";
        elseif($mese=="04") $lett="D";
        elseif($mese=="05") $lett="E";
        elseif($mese=="06") $lett="H";
        elseif($mese=="07") $lett="L";
        elseif($mese=="08") $lett="M";
        elseif($mese=="09") $lett="P";
        elseif($mese=="10") $lett="R";
        elseif($mese=="11") $lett="S";
        elseif($mese=="12") $lett="T";
        return $lett;
    }
    
    private function day2($data,$sex){
        $giorno=$data->format('d');
        if($sex=="F"){
            $giorno=(string)((int)$giorno+40);
        }
        return $giorno;
    }
    private function codCom($luogo){
        return $luogo->getCodice();
    }
    
    private function codControllo($codfisc){
        $lettere=str_split($codfisc);
        $somma=0;
        for($i=0; $i<count($lettere);$i++){
            if(($i+1)%2==0){
                if($lettere[$i]=="0") $somma=$somma+0;
                else if($lettere[$i]=="1") $somma=$somma+1;
                else if($lettere[$i]=="2") $somma=$somma+2;
                else if($lettere[$i]=="3") $somma=$somma+3;
                else if($lettere[$i]=="4") $somma=$somma+4;
                else if($lettere[$i]=="5") $somma=$somma+5;
                else if($lettere[$i]=="6") $somma=$somma+6;
                else if($lettere[$i]=="7") $somma=$somma+7;
                else if($lettere[$i]=="8") $somma=$somma+8;
                else if($lettere[$i]=="9") $somma=$somma+9;
                else if($lettere[$i]=="A") $somma=$somma+0;
                else if($lettere[$i]=="B") $somma=$somma+1;
                else if($lettere[$i]=="C") $somma=$somma+2;
                else if($lettere[$i]=="D") $somma=$somma+3;
                else if($lettere[$i]=="E") $somma=$somma+4;
                else if($lettere[$i]=="F") $somma=$somma+5;
                else if($lettere[$i]=="G") $somma=$somma+6;
                else if($lettere[$i]=="H") $somma=$somma+7;
                else if($lettere[$i]=="I") $somma=$somma+8;
                else if($lettere[$i]=="J") $somma=$somma+9;
                else if($lettere[$i]=="K") $somma=$somma+10;
                else if($lettere[$i]=="L") $somma=$somma+11;
                else if($lettere[$i]=="M") $somma=$somma+12;
                else if($lettere[$i]=="N") $somma=$somma+13;
                else if($lettere[$i]=="O") $somma=$somma+14;
                else if($lettere[$i]=="P") $somma=$somma+15;
                else if($lettere[$i]=="Q") $somma=$somma+16;
                else if($lettere[$i]=="R") $somma=$somma+17;
                else if($lettere[$i]=="S") $somma=$somma+18;
                else if($lettere[$i]=="T") $somma=$somma+19;
                else if($lettere[$i]=="U") $somma=$somma+20;
                else if($lettere[$i]=="V") $somma=$somma+21;
                else if($lettere[$i]=="W") $somma=$somma+22;
                else if($lettere[$i]=="X") $somma=$somma+23;
                else if($lettere[$i]=="Y") $somma=$somma+24;
                else if($lettere[$i]=="Z") $somma=$somma+25;
            }
            else{
                if($lettere[$i]=="0") $somma=$somma+1;
                else if($lettere[$i]=="1") $somma=$somma+0;
                else if($lettere[$i]=="2") $somma=$somma+5;
                else if($lettere[$i]=="3") $somma=$somma+7;
                else if($lettere[$i]=="4") $somma=$somma+9;
                else if($lettere[$i]=="5") $somma=$somma+13;
                else if($lettere[$i]=="6") $somma=$somma+15;
                else if($lettere[$i]=="7") $somma=$somma+17;
                else if($lettere[$i]=="8") $somma=$somma+19;
                else if($lettere[$i]=="9") $somma=$somma+21;
                else if($lettere[$i]=="A") $somma=$somma+1;
                else if($lettere[$i]=="B") $somma=$somma+0;
                else if($lettere[$i]=="C") $somma=$somma+5;
                else if($lettere[$i]=="D") $somma=$somma+7;
                else if($lettere[$i]=="E") $somma=$somma+9;
                else if($lettere[$i]=="F") $somma=$somma+13;
                else if($lettere[$i]=="G") $somma=$somma+15;
                else if($lettere[$i]=="H") $somma=$somma+17;
                else if($lettere[$i]=="I") $somma=$somma+19;
                else if($lettere[$i]=="J") $somma=$somma+21;
                else if($lettere[$i]=="K") $somma=$somma+2;
                else if($lettere[$i]=="L") $somma=$somma+4;
                else if($lettere[$i]=="M") $somma=$somma+18;
                else if($lettere[$i]=="N") $somma=$somma+20;
                else if($lettere[$i]=="O") $somma=$somma+11;
                else if($lettere[$i]=="P") $somma=$somma+3;
                else if($lettere[$i]=="Q") $somma=$somma+6;
                else if($lettere[$i]=="R") $somma=$somma+8;
                else if($lettere[$i]=="S") $somma=$somma+12;
                else if($lettere[$i]=="T") $somma=$somma+14;
                else if($lettere[$i]=="U") $somma=$somma+26;
                else if($lettere[$i]=="V") $somma=$somma+10;
                else if($lettere[$i]=="W") $somma=$somma+22;
                else if($lettere[$i]=="X") $somma=$somma+25;
                else if($lettere[$i]=="Y") $somma=$somma+24;
                else if($lettere[$i]=="Z") $somma=$somma+23;
            }
        }
        $alfabeto=range('A','Z');
        $somma=$somma%26;
        return $alfabeto[$somma];
        
    }
    
    
    public function CalcoloCodiceFiscale($Persone,$Comuni){
        for ($i=0; $i<count($Persone); $i++){
            $ccc=$this->first3($Persone[$i]->getCognome());
            $nnn=$this->second3($Persone[$i]->getNome());
            $aa=$this->year2($Persone[$i]->getDataN());
            $m=$this->month1($Persone[$i]->getDataN());
            $gg=$this->day2($Persone[$i]->getDataN(), $Persone[$i]->getSesso());
            $lvvv=$this->codCom($Persone[$i]->getLuogoN());
            $codfisc=$ccc.$nnn.$aa.$m.$gg.$lvvv;
            $k=$this->codControllo($codfisc);
            $codfisc=$codfisc.$k;
            $Persone[$i]->setCodFisc($codfisc);
        }
    }
}

