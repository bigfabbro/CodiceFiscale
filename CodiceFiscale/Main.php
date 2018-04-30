<?php
include 'InputPersone.php';
include 'InputComuni.php';
include 'CodiceFiscale.php';
include 'Output.php';
 
 
 $c=new InputComuni();
 $Comuni=$c->InputFile();
 $p=new InputPersone();
 $Persone=$p->InputFile($Comuni);
 $cf=new CodiceFiscale();
 $cf->CalcoloCodiceFiscale($Persone,$Comuni);
 $o=new Output();
 $o->outputFile($Persone);
 
 