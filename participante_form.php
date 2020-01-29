<?php
include("header.php");
                                    
?>

 <script>



 $(function(){
	$('#cidade').change(function(){
		if( $(this).val() ) {
           
			$.get('selectCasaOracaoJson.php?cidade='+$(this).val(), function(result){	
                
                if (result)
				    $('#div_casaoracao').html(result).show();
                else
                    $('#div_casaoracao').html(' Escolha uma cidade'); 
			});
		} else {
			$('#div_casaoracao').html(' Escolha uma cidade');
		}
	});
});
</script>

<!-- BEGIN PAGE CONTENT INNER -->
<div class="page-content-inner portlet light">
    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-gift"></i>Novo Participante
             </div>
        </div>
    </div>
	<!-- BEGIN FORM-->
                                <form action="participante_gravar.php" class="horizontal-form" method="POST">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Nome</label>
                                                    <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome participante">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                             <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Data de Nascimento</label>
                                                    <input type="text"  id="datanascimento" name="datanascimento" class="form-control" placeholder="dd/mm/yyyy"> 
												</div>
                                            </div>
                                            <!--/span-->
                                        </div>  
                                      <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
													<?php include("selectCidadeJson.php");?>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                   <div class="form-group" id="div_casaoracao">
                                                   </div>     
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                           <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Ministério/Cargo:</label>
													<?php include("selectCargoJson.php");?>
                                                </div>
                                            </div>
                                            <!--/span-->                                                                                
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>																			
										 <!--/row-->																	
                                   
                                        </div>
                                    </div>
                                    <div class="form-actions right">
                                      <button type="submit" class="btn blue">
                                            <i class="fa fa-check"></i> Cadastrar</button>
                                        <button type="button" class="btn default">Cancelar</button>
                                      
                                    </div>
                                </form>
                                <!-- END FORM-->

   <script type="text/javascript">
  // run pre selected options
  $('#cargo').multiSelect();
  </script>
<?php
include("footer.php");
?>