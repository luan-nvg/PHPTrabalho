<?php


class Pesquisar {

   
  
    private $vchCPF;

    
    public function __construct(){
        //echo "Acabei de criar uma classe!!";
    
    }
    
    
   public function getCPF(){
        return $this->vchCPF;
    }
    
 
    public function setCPF($pCPF){
        $this->vchCPF = $pCPF;
    }         

         

    
}



?>