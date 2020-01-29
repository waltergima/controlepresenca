<?php
include("globalValue.inc.php");

if ($getDataDB)
	getCargoDB();
else 
	getCargoServico($urlLocal);


function getCargoServico($urlLocal = false) {
	try
	{
		if ($urlLocal) 
			$json_file = file_get_contents("http://192.168.0.1:8080/CAGEF/servicos/ministerios/");	
		else
			$json_file = file_get_contents("http://187.121.212.50:8080/CAGEF/servicos/ministerios/");  
	 
		if (empty($json_file)) {
			throw new Exception("Não foi possivel carregar Cargos."); 
		}	

		$json_str = json_decode($json_file, true);
		$itens = $json_str['response'];
	
		echo '<select multiple class="form-control" data-placeholder="Escolha os cargos dos participantes" tabindex="1" id="cargo" name="cargo[]">';
	
		foreach ( $itens["ministerioOuCargos"] as $e ) 
		{
			echo "<option value='".$e["@id"]."'>".$e["descricao"]."</option>";
		}
	
		echo '</select>';
	}
	catch (Exception $e)
    {
		getCargoDB();
		//echo "Não foi possível carregar Cidades	";
		//echo 'Exceção capturada: ',  $e->getMessage(), "\n";
	}
}


function getCargoDB($urlLocal = false) 
{
	include("conection2.inc.php");
	$sql = "select id_ministeriocargo id, descricao from ministeriocargos order by descricao";
	$result2 = $conn2->query($sql);	

	echo '<select multiple class="form-control" data-placeholder="Escolha os cargos dos participantes" tabindex="1" id="cargo" name="cargo[]">';
	while($row =  $result2->fetch_assoc() ) 
	{
			echo "<option value='".$row["id"]."'>".utf8_encode(strtoupper( $row["descricao"]))."</option>";
	}
	
	echo '</select>';
}

