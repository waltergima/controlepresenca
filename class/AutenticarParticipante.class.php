<?php
include 'Participante.class.php'; 

 class AutenticarParticipante {
   
     public $dados = '[{ "id": 1, "nome": "Walter Gima",  "Cargo": "Departamento Informatica", "cidadeId": 1, "cidadeDes": "Araras"},
           { "id": 2, "nome": "Luis Inacio Lula da Silva",  "Cargo": "Departamento Degustacao", "cidadeId": 2, "cidadeDes": "Santo Andre"},
           { "id": 5, "nome": "Walter Gama",  "Cargo": "Departamento Degustacao", "cidadeId": 2, "cidadeDes": "Santo Andre"},
           { "id": 3, "nome": "Dilma Rousseff",  "Cargo": "Departamento Armazenamento Vento", "cidadeId": 3, "cidadeDes": "Brasilia"},
           { "id": 4, "nome": "Michel Temer",  "Cargo": "Departamento Transilvania", "cidadeId": 4, "cidadeDes": "Brasilia"}]';
     
    //  function  validarParticipante($id) {
    //      try 
    //      {


    //      }
    //      catch(Exception $e) 
    //      {
    //          echo "<b> Ops..ocorreu algo inesperado: ". $e->getMessage(). "\n";
    //          return false;
    //      }

    //  }


     function retornaPartipantePorId($id) 
     {
         //chamar serviço
         $dado = $this->preparaDados();
         $key = $this->buscarPorId($id, $dado);

         if ($key > -1)
            return $dado[$key];
         else
            return false;
         
     }

     function retornaPartipantePorNomes($nome) 
     {
         //chamar serviço
         $dado = $this->preparaDados();
         $key = $this->buscarPorNome($nome, $dado);

         if ($key > -1)
            return $dado[$key];
         else
            return false;
     }

     function preparaDados()
     {
        
         $array = json_decode($this->dados, TRUE);
         return $array;
     }

    function buscarPorId($id, $array) {
        foreach ($array as $key => $val) {
            if ($val['id'] === $id) {
                return $key;
            }
        }
        return null;
    }


    function buscarPorNome($nome, $array) {
        foreach ($array as $key => $val) 
        {
            if (strpos(strtoupper($val['nome']), strtoupper($nome)) !== false) 
            {
                return $key;
            }
        }
        return null;
    }

} 


$objAut = new AutenticarParticipante;

$retorno = $objAut->retornaPartipantePorNomes("Walter");
//$retorno = $objAut->retornaPartipantePorId(1);

if ($retorno) {

    echo "<br />";
    echo $retorno["nome"];    
} 
else 
    echo "não encontrado";


?>