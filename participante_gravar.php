<?php
include("header.php");

//recebe dados do formulario	
if (isset($_POST["nome"])) 
{
		extract($_POST);
		include("conection2.inc.php");


		$datanascimentoformatada = date("Y-m-d", strtotime(str_replace('/', '-', $datanascimento)));
		
		try 
		{
			if (isset($casaoracao)) 
			{
				$sql2 = "INSERT INTO voluntarios (nome, created_at, id_cidade, cod_relatorio, data_nascimento, codigo_carteirinha) 
				values ('".strtoupper($nome)."', now(), $cidade,'$casaoracao', '$datanascimentoformatada', null)";
			}
			else 
			{
				$sql2 = "INSERT INTO voluntarios (nome, created_at, id_cidade, data_nascimento, codigo_carteirinha) 
				values ('".strtoupper($nome)."', now(), $cidade, '$datanascimentoformatada', null)";
			}

			$conn2->query($sql2);

			$sql2 = "SELECT ID voluntario_id from voluntarios 
				where nome = '".strtoupper($nome) ."' AND 
				id_cidade = $cidade and cod_relatorio = '$casaoracao' and data_nascimento = '$datanascimentoformatada'";

			$result2 = $conn2->query($sql2);		
		
			$row2 = $result2->fetch_assoc();

			foreach ($cargo as $cargoSelecionado) 
			{
				$sql2 = "INSERT INTO voluntarios_ministeriocargos (id, id_ministeriocargo) 
					values (".$row2["voluntario_id"].", $cargoSelecionado)";
				$conn2->query($sql2);
			}

			echo "Participante cadastrado com sucesso!";

		} catch (Exception $e) {
    		echo 'Exceção capturada: ',  $e->getMessage(), "\n";
			echo "Não foi possivel gravar voluntário!";
		}
}



include("footer.php");
$conn->close();
?>