<?php
session_start();


//recebe dados do formulario	
if (isset($_POST["buscanome"])) 
{
		extract($_POST);

		include("conection2.inc.php");
			
			$sql2 = "SELECT v.id participanteid, UPPER(v.nome) participante, v.bairro, cid.id_cidade, UPPER(cid.nome) cidade, cid.estado, v.cod_relatorio, cs.bairro as COMUM
					FROM voluntarios v 
						left outer join cidades cid on v.id_cidade = cid.id_cidade
						left outer join casasoracao cs on v.cod_relatorio = cs.cod_relatorio
				where  UPPER(v.nome)  like '%".strtoupper($buscanome)."%'
				order by  v.nome, cid.nome ASC";
				
			//echo $sql2;
			$result2 = $conn2->query($sql2);
					  		  
					  

// ?>
<script>


function enviaDados(participante, reuniao) {

	$.ajax({
   	 	url: 'registra_presenca_voluntario.php',
   	 	data: {'participante':participante,'reuniao':reuniao},
   	 	//complete : function(){
        //	alert(this.url)
    	//},
    	success: function(data){
			alert(data);
    	}
	});
}
</script>
 <!-- BEGIN SAMPLE TABLE PORTLET-->
                                                    <div class="portlet-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th> Presença  </th>
                                                                        <th> Nome </th>
                                                                        <th> Cidade </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
																<?php
																
																	while($row2 = $result2->fetch_assoc()) 
																	{
																		echo "<tr> ";
																		//echo "<td><a href='registra_presenca_voluntario.php?participante=".$row2["participanteid"]. "&reuniao=".$_SESSION['REUNIAO']."'>Autorizar</a></td>";
                                                                        echo "<td><a href='#'  onClick='enviaDados(".$row2["participanteid"].", ". $_SESSION['REUNIAO'].")'>Autorizar</a></td>";
																		echo "<td>".strtoupper(utf8_encode($row2["participante"]))."</td>";
                                                                        echo "<td>".strtoupper(utf8_encode($row2["cidade"]))."</td>";
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