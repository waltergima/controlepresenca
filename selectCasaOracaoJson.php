<?php
include("globalValue.inc.php");

$cidade = $_REQUEST["cidade"];

if ($getDataDB)
	getCasaOracaoDB($cidade);
else 
	getCasaOracaoServico($cidade, $urlLocal);

function getCasaOracaoServico($cidade, $urlLocal = false) 
{
	try
	{	
		if (isset($cidade) && ($cidade !="")) 
		{
			if ($urlLocal) 
				$json_file = file_get_contents("http://192.168.0.1:8080/CAGEF/servicos/casasDeOracao/cidade/".$cidade); 	
			else
				$json_file = file_get_contents("http://187.121.212.50:8080/CAGEF/servicos/casasDeOracao/cidade/".$cidade);  
	 
			if (empty($json_file))
	    	{
				throw new Exception("Não foi possivel carregar Casas de Oracao."); 
			}	

			$json_str = json_decode($json_file, true);
			$itens = $json_str['response'];
	
			echo '<label class="control-label">Casa de Oração:</label>';
			echo '<select class="form-control" data-placeholder="Escolha a cidade da reuniao" tabindex="1" id="casaoracao" name="casaoracao">';
				foreach ( $itens["casasDeOracao"] as $e ) 
				{
					echo "<option value='".$e["@codigoRelatorio"]."'>".$e["bairro"]."</option>";
				}
			echo '</select>';
		}
		else 
			echo "Não foi possível carregar Casas de Oracao";
	}
	catch (Exception $e) 
	{
		getCasaOracaoDB($cidade);
		//echo 'Exceção capturada: ',  $e->getMessage(), "\n";
	}
}


function getCasaOracaoDB($cidade, $urlLocal = false) 
{
	if (isset($cidade) && ($cidade !="")) 
	{
		try
	    {
			include("conection2.inc.php");
			$sql = "select cod_relatorio id, bairro from casasoracao where id_cidade = '".$cidade."'";
			$result2 = $conn2->query($sql);	

			echo '<label class="control-label">Casa de Oração:</label>';
			echo '<select class="form-control" data-placeholder="Escolha a cidade da reuniao" tabindex="1" id="casaoracao" name="casaoracao">';
			
			while($row = $result2->fetch_assoc()) 
			{
				echo "<option value='".$row["id"]."'>".utf8_encode(strtoupper( $row["bairro"]))."</option>";
			}
		
			echo '</select>';
		}
		catch (Exception $e) {
			echo "Não foi possível carregar Casas de Oracao";
			//echo 'Exceção capturada: ',  $e->getMessage(), "\n";
		}
	}
	else 
		echo "Não foi possível carregar Casas de Oracao";
} 
