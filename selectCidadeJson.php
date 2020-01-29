<?php
include("globalValue.inc.php");

if ($getDataDB)
	getCidadeDB();
else 
	getCidadeServico($urlLocal);


function getCidadeServico($urlLocal = false) {
	try
	{
		if ($urlLocal) 
			$json_file = file_get_contents("http://192.168.0.1:8080/CAGEF/servicos/cidades/estado/SP");	
		else
			$json_file = file_get_contents("http://187.121.212.50:8080/CAGEF/servicos/cidades/estado/SP");    
		
		if (empty($json_file)) {
			throw new Exception("Não foi possivel carregar cidade."); 
		}

		$json_str = json_decode($json_file, true);
		$itens = $json_str['response'];
	
		$json_str = json_decode($json_file, true);
		$itens = $json_str['response'];
	
		echo '<label class="control-label">Cidades:</label>';
		echo '<select class="form-control" data-placeholder="Escolha a cidade da reuniao" tabindex="1" id="cidade" name="cidade">';
			foreach ( $itens["cidades"] as $e ) 
			{
				echo "<option value='".$e["@id"]."'>".$e["nome"]."</option>";
			}
		echo '</select>';
	}
	catch (Exception $e) {
		
		getCidadeDB();
		//echo "Não foi possível carregar Cidades	";
		//echo 'Exceção capturada: ',  $e->getMessage(), "\n";
	}
}


function getCidadeDB($urlLocal = false) 
{
	include("conection2.inc.php");
	$sql = "select id_cidade id, nome from cidades where estado = 'SP' order by nome ASC";
	$result2 = $conn2->query($sql);	

	echo '<label class="control-label">Cidades:</label>';
	echo '<select class="form-control" data-placeholder="Escolha a cidade da reuniao" tabindex="1" id="cidade" name="cidade">';
	while($row = $result2->fetch_assoc()) 
	{
			echo "<option value='".$row["id"]."'>".strtoupper(utf8_encode( $row["nome"]))."</option>";
	}
	
	echo '</select>';
}
