<?php

include("header.php");
include("conection.inc.php");//import
$reuniaoDescricao = "";
$data ="";

if (isset($_REQUEST['REUNIAO'])) 
{
	$_SESSION['REUNIAO']= $_REQUEST['REUNIAO'];
	
	$sql = "SELECT * FROM reuniao WHERE CODIGO = ".$_REQUEST['REUNIAO'];
	$result = $conn->query($sql);
	
	$row = $result->fetch_assoc();
	$reuniaoDescricao = $row["descricao"];
	$data =  date("d/m/Y", strtotime($row["data"])) ;

?>
              
<script>
   $(document).ready(function() {
      $("#codBarras").focus();
	   
	$( "#buscarNomeVoluntario" ).click(function() {
		pesquisarVoluntario();
	});
	
		jQuery('#frmBuscaNome').submit(function(){
			var dados = jQuery( this ).serialize();

			jQuery.ajax({
				type: "POST",
				url: "busca_voluntario_presenca.php",
				data: dados,
				success: function( data )
				{
					$( "#result" ).html( data );
				}
			 });
			
			return false;
		});
   
   });
  
   
</script>
			  
<!-- BEGIN PAGE CONTENT INNER -->
<div class="page-content-inner portlet light">
    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-gift"></i>REGISTRAR PRESENÇA - <?php echo $reuniaoDescricao. " - ".$data?>
             </div>
        </div>
    </div>
	
									<div class="page-content-inner">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="tabbable-line boxless tabbable-reversed">
                                                    <ul class="nav nav-tabs">
                                                        <li>
                                                            <a href="#tab_0" data-toggle="tab"> Carteirinha</a>
                                                        </li>
                                                        <li class="active">
                                                            <a href="#tab_1" data-toggle="tab"> Pesquisa por Nome </a>
                                                        </li>
                   
                                                        
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="tab-pane" id="tab_0">
											
															<!-- BEGIN FORM-->
															<form action="reuniao.php" class="horizontal-form" method="POST">
																<div class="form-body">
																	<div class="row">
																		<div class="col-md-6">
																			<div class="form-group">
																				<label class="control-label">Leitor </label>
																				<input type="text" id="codBarras" name="codBarras" class="form-control" placeholder="Utilizar Leitor de código de barras	">
																				<span class="help-block"></span>
																			</div>
																		</div>
							
															
																	</div>
																</div>
																<div class="form-actions right">
																	<button type="submit" class="btn blue">
																		<i class="fa fa-check"></i>Pesquisar</button>												
																		<button type="button" class="btn default">Cancelar</button>
																</div>
																<input type="hidden" name="reuniao" value="<?php echo $_SESSION['REUNIAO']?>">
															</form>
															<!-- END FORM-->
														</div>
													    <div class="tab-pane active" id="tab_1">
															<!-- BEGIN FORM-->
															<form id="frmBuscaNome" action="" class="horizontal-form" method="POST">
																<div class="form-body">
																	<div class="row">
																		<div class="col-md-6">
																			<div class="form-group">
																				<label class="control-label">Nome do Participante </label>
																				<input type="text" id="buscanome" name="buscanome" class="form-control" placeholder="Nome do participante">
																				<span class="help-block"></span>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="form-actions right">
																	<button type="submit" class="btn blue" id="buscarNomeVoluntario">
																		<i class="fa fa-check"></i>Pesquisar</button>												
																		<button type="button" class="btn default">Cancelar</button>
																</div>
																<input type="hidden" name="reuniao" value="<?php echo $_SESSION['REUNIAO']?>">
															</form>
															<!-- END FORM-->
															<div id="result"></div>
															
														</div>
																										
													</div>
												</div>
											</div>
										</div>
										</div>

								
<?php	
include("footer.php");

}
else 
{
	echo "Selecione uma reunião"; 
}

?>