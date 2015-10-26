<?php


class Excluir {

    private $idAluno;
    private $vchNome;
    private $vchEmail;
    private $vchTel;
    private $vchCPF;
    private $bolSexo;    
    private $tnyEstadoCivil;
    private $intMatricula;
    
    public function __construct(){
        //echo "Acabei de criar uma classe!!";
    
    }
    
    public function getId(){
        return $this->idAluno;
    }
    
    public function getNome(){
        return $this->vchNome;
    }

    public function getEmail(){
        return $this->vchEmail;
    }    

    public function getTelefone(){
        return $this->vchTel;
    }
    
   public function getCPF(){
        return $this->vchCPF;
    }
    
   public function getSexo(){
        return $this->bolSexo;
    }
    
   public function getEstadoCivil(){
        return $this->tnyEstadoCivil;
    }
    
   public function getMatricula(){
        return $this->intMatricula;
    }
    
    public function setTel($pTel){
        $this->vchTel = $pTel;
    } 
    
    public function setEmail($pEmail){
        $this->vchEmail = $pEmail;
    } 
    
    public function setNome($pNome){
        $this->vchNome = $pNome;
    } 
    
    public function setId($pId){
        $this->idAluno = $pId;
    }     
 
    public function setCPF($pCPF){
        $this->vchCPF = $pCPF;
    }         

    public function setSexo($pSexo){
        $this->bolSexo = $pSexo;
    }    
    
    public function setEstadoCivil($pEstadoCivil){
        $this->tnyEstadoCivil = $pEstadoCivil;
    }
    
    public function setMatricula($pMatricula){
        $this->intMatricula = $pMatricula;
    }           

    
}



?>