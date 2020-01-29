<?php
include("conection.inc.php");

//recebe dados do formulario	
if (isset($_REQUEST["participante"])) 
{
	try {

		extract($_REQUEST);
		
		//procura participante na tabela reuniaoparticipante
		$sql = "select * from reuniaoparticipantes where participantecodigo = $participante and reuniaocodigo = $reuniao";
		//echo $sql;

		$result = $conn->query($sql);
		$row = $result->fetch_assoc();

		//participante encontrado
		if ($row["codigo"] != 0) 
		{
			//registra presenca
			
			$sql = "update reuniaoparticipantes set presenca = 1, horachegada = now() where participantecodigo = $participante and reuniaocodigo = $reuniao";
			$result = $conn->query($sql);
			echo "Autenticação realizada com sucesso";
		}
		else
		{	
	 		//recupera participante
			include("conection2.inc.php");
				
		 		$sql2 = "SELECT v.id participanteid, v.nome participante, c.id_ministeriocargo, c.descricao as CARGO, v.bairro, cid.id_cidade, cid.nome cidade, cid.estado, v.cod_relatorio, cs.bairro as COMUM
		 				FROM voluntarios v 
		 					left outer join voluntarios_ministeriocargos vc on v.id = vc.id
		 					left outer join ministeriocargos c on vc.id_ministeriocargo = c.id_ministeriocargo
		 					left outer join cidades cid on v.id_cidade = cid.id_cidade
		 					left outer join casasoracao cs on v.cod_relatorio = cs.cod_relatorio
		 			where v.id = $participante
		 			order by cid.nome, cargo, v.nome ASC";
				//echo $sql2;	

		 		$result2 = $conn2->query($sql2);
				
		 		$row2 = $result2->fetch_assoc();
				
		 		$sqlParticipante = "			
		 						INSERT INTO reuniaoparticipantes (
		 						reuniaocodigo,
		 						participantecodigo,
		 						participantenome,
		 						participantecidadecodigo,
		 						participantecidadenome,
		 						participanteestado,
		 						participantecomumcodigo,
		 						participantecomundescricao,
		 						participantecargocodigo,
		 						participantecargodescricao,
								presenca,
								horachegada 
								 ) VALUES (
		 						$reuniao,
		 						".$row2["participanteid"].",
		 						'".$row2["participante"]."',
		 						0,
		 						'".$row2["cidade"]."',
		 						'".$row2["estado"]."',
		 						'".$row2["cod_relatorio"]."',
		 						'".$row2["COMUM"]."',
		 						".$row2["id_ministeriocargo"].",
								'".$row2["CARGO"]."',
		 						 1, 
								 now())";
							    $conn->query($sqlParticipante);			
								echo "Autenticação realizada com sucesso";
								//echo $sqlParticipante;	
		 } 
		
	} catch (Exception $e) {
    	echo 'Exceção capturada: ',  $e->getMessage(), "\n";
		echo "Autenticação não realizada";
	}
}
else
{
	echo "Autenticação não realizada";
	
}

$conn->close();
?>