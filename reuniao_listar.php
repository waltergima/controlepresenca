<?php
	
include("conection.inc.php");//import

//recebe dados do formulario	
if (isset($_POST["descricao"])) 
{
	extract($_POST);
 
		$sql = "insert into reuniao (descricao, data, horainicio, horatermino, igrejacodigoreuniao, igrejadescricaoreuniao, igrejadescricaolocal, cidadecodigo, cidadedescricao, usuario, datacadastro) values 
		            ('$descricao', 
					 '$datareuniao', 
					 '$horainicio', 
					 '$horatermino', 
					  $igrejareuniao, 
					 'IGREJA COD: ".$igrejareuniao."', 
					 'CENTRAL',
					  $cidade, 
					  'CIDADE COD: ".$cidade."',
					  1, 
					  '2017/07/30')";
					  
 //foreach ($cargo as $selectedOption)
 //   echo $selectedOption."\n";
					  
		if ($conn->query($sql) == TRUE) 
		{
			echo "<center>Registro Cadastro com Sucesso </center>";
		} 
		else 
		{
			echo "<center>Erro: " . $sql . "<br>" . $conn->error."</center>";
		}
					  
}



$sql = "SELECT * FROM reuniao  ORDER BY DATA DESC, HORAINICIO DESC LIMIT 20"; 
$result = $conn->query($sql);



?>

<?php
include("header.php");


// ?>
 <!-- BEGIN SAMPLE TABLE PORTLET-->
                                                <div class="portlet box blue">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-cogs"></i>Reuniões</div>
                                                    </div>
													<?php
													if ($result->num_rows > 0) {
													?>
                                                    <div class="portlet-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr>
																		
																		<th> Lista Completa </th>
																		<th> Lista Presentes</th>
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
																		echo "<td><a href='lista_presenca_pdf.php?lista=".$row["codigo"]."'>PDF</a></td>";
																			echo "<td><a href='lista_presenca_pdf_presentes.php?lista=".$row["codigo"]."'>PDF</a></td>";
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
												?>




<?php
include("footer.php");
$conn->close();
?>