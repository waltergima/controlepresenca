<?php
include("conection.inc.php");

//recebe dados do formulario	
if (isset($_POST["descricao"])) 
{
		extract($_POST);
		
		$dataformatada = date("Y-m-d", strtotime(str_replace('/', '-', $datareuniao)));
		$datacadastro = date("Y-m-d H:i:s");
		$cargosConsulta = "";
		$tamanhoArrayCargos = count($cargo);
		$contadorAuxCargo=0;
		
		foreach ($cargo as $selectedOption) {
			$cargosConsulta .= (++$contadorAuxCargo < $tamanhoArrayCargos? $selectedOption."," : $selectedOption) ;
		}
		//echo "cargo consulta: ".$cargosConsulta;
		
		 $sql = "insert into reuniao (descricao, data, horainicio, horatermino,igrejadescricaoreuniao, igrejadescricaolocal, cidadecodigo, cidadedescricao, usuario, datacadastro) values 
		            ('".strtoupper($descricao)."', 
					 '$dataformatada', 
					 '$horainicio', 
					 '$horatermino', 
					 '".strtoupper($igrejadescricaoreuniao)."', 
					 'SALAO',
					  0, 
					  '',
					  1, 
					  '$datacadastro')";
					  //'".strtoupper($cidadedescricao)."',
		$isReunicaoCadastrada = $conn->query($sql);			
		if ($isReunicaoCadastrada) 
		{
			//recupera reunicao
			$sql = "SELECT codigo CODIGOREUNIAO FROM reuniao WHERE descricao = '$descricao' AND data = '$dataformatada' AND horainicio = '$horainicio' AND datacadastro = '$datacadastro'";
			$result = $conn->query($sql);
			
			while($row = $result->fetch_assoc()) 
			{
				include("conection2.inc.php");
				
				//  $sql2 = "SELECT v.id participanteid, v.nome participante, c.id_ministeriocargo, c.descricao as CARGO, v.bairro, cid.id_cidade, cid.nome cidade, cid.estado
				// 		FROM voluntarios v 
				// 			LEFT OUTER join voluntarios_ministeriocargos vc on v.id = vc.id
				// 			LEFT OUTER join ministeriocargos c on vc.id_ministeriocargo = c.id_ministeriocargo
				// 			LEFT OUTER join cidades cid on v.id_cidade = cid.id_cidade
				// 	where c.id_ministeriocargo in ($cargosConsulta)
				// 	order by cid.nome, cargo, v.nome ASC";
					

				  $sql2 = "SELECT participanteid, participante, participante, group_concat(CARGO order by CARGO ASC) CARGO, bairro,  id_cidade, cidade, estado 
					FROM (
					SELECT 
						   v.id        participanteid, 
						   v.nome      participante, 
						   c.descricao AS CARGO, 
						   v.bairro, 
						   cid.id_cidade, 
						   cid.nome    cidade, 
						   cid.estado 
					FROM   voluntarios v 
						   LEFT OUTER JOIN voluntarios_ministeriocargos vc 
										ON v.id = vc.id 
						   LEFT OUTER JOIN ministeriocargos c 
										ON vc.id_ministeriocargo = c.id_ministeriocargo 
						   LEFT OUTER JOIN cidades cid 
										ON v.id_cidade = cid.id_cidade 
					WHERE c.id_ministeriocargo in ($cargosConsulta) ";
					
					if ($cidade != 0)
						$sql2.= " AND v.id_cidade in ($cidade) ";
					
					$sql2.= "	ORDER  BY  
							  CARGO ASC
							  ) AS A   
					GROUP BY A.PARTICIPANTEID
					ORDER BY A.PARTICIPANTE ASC";




			    //echo $sql2;
				$result2 = $conn2->query($sql2);
				
				
				while($row2 = $result2->fetch_assoc()) 
				{
					$sqlParticipante = "			
								INSERT INTO reuniaoparticipantes (
								reuniaocodigo,
								participantecodigo,
								participantenome,
								participantecidadecodigo,
								participantecidadenome,
								participanteestado,
								participantecargocodigo,
								participantecargodescricao,
								convocado) VALUES (
								$row[CODIGOREUNIAO],
								".$row2["participanteid"].",
								'".$row2["participante"]."',
								0,
								'".$row2["cidade"]."',
								'".$row2["estado"]."',
								0,
								'".$row2["CARGO"]."', 1)";
							    $conn->query($sqlParticipante);
				}
			}				  
					  
		}
		
		
		if ($isReunicaoCadastrada == TRUE) 
		{	
			echo "<center>Registro Cadastro com Sucesso </center>";
		} 
		else 
		{
			echo "<center>Erro: " . $sql . "<br>" . $conn->error."</center>";
		}					  

}					  

					  

//lista reuniões
$sql = "SELECT * FROM reuniao WHERE DATA >= CURDATE() ORDER BY DATA, HORAINICIO DESC LIMIT 10";
$result = $conn->query($sql);

include("header.php");


// ?>
 <!-- BEGIN SAMPLE TABLE PORTLET-->
                                                <div class="portlet box blue">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-cogs"></i>Reuniões mais recentes</div>
                                                    </div>
													<?php
													if ($result->num_rows > 0) {
													?>
                                                    <div class="portlet-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th> Descrição </th>
                                                                        <th> Data Reunião </th>
                                                                        <th> Hora Início </th>
                                                                        <th> Data Cadastro </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
																<?php
																
																	while($row = $result->fetch_assoc()) {
																		echo "<tr> ";
                                                                        echo "<td>".$row["descricao"]."</td>";
																		echo "<td>". date("d/m/Y", strtotime($row["data"]))."</td>";
                                                                        echo "<td>".$row["horainicio"]."</td>";
																		echo "<td>".date("d/m/Y", strtotime($row["datacadastro"]))."</td>";
                                                                    echo "</tr>";
																	}											
																?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END SAMPLE TABLE PORTLET-->
												<?php
												} 
												else 
												{
													echo "Não foram encontrados resultados";
												}
											



include("footer.php");
$conn->close();
?>