<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" >
<!--<![endif]-->

<!-- BEGIN HEAD -->
<head>
	
	<meta charset="utf-8"/>
	
	<title>Cartas para Exames - Regional Porto Ferreira/SP</title>

	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<!--<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>-->
	<link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
	<link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="../assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
	
	<!-- END GLOBAL MANDATORY STYLES -->

	<!-- BEGIN PAGE STYLES -->
	<link href="../assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
	<!-- END PAGE STYLES -->

	<!-- BEGIN THEME STYLES -->
	<link href="../assets/global/css/components.css" rel="stylesheet" type="text/css"/>
	<link href="../assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
	<link href="../assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
	<link id="style_color" href="../assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css"/>
	<link href="../assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
	<!-- END THEME STYLES -->

	<style type="text/css">
		label.error { float: none; color: red; margin: 0 .5em 0 0; vertical-align: top; font-size: 17px }
	</style>


</head>
<!-- END HEAD -->

<body class="page-header-fixed page-full-width">

	<div class="page-container">
		
		<div class="page-content-wrapper">
			
			<div class="page-content">
			
				<div class="row">
					<div class="col-md-12">
						<h3 class="page-title">Regional Porto Ferreira/SP  <small>Formulário para geração de cartas para exames/testes para músicos e organistas</small></h3>
						<ul class="page-breadcrumb breadcrumb">
							<li>
								<i class="fa fa-home"></i>
								<a href="index.html">Home</a>
								<i class="fa fa-angle-right"></i>
							</li>
							
						</ul>
					</div>
				</div>
			
				<div class="portlet box blue">
					<div class="portlet-title">
						<div class="caption">INFORMAÇÕES PARA A CARTA</div>										
					</div>
					
					<div class="portlet-body form">
					
					<!-- BEGIN FORM-->
						<form id="frmCarta" action="makedoc.php" class="horizontal-form" method="post">
					
							<div class="form-body">
																
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">SELECIONE A CIDADE:</label>
											<select class="form-control" name="txtCidade" id="txtCidade">																								
												<option value="Pirassununga">Pirassununga</option>
												<option value="Leme">Leme</option>
												<option value="Santa Cruz da Conceição">Santa Cruz da Conceição</option>
												<option value="Araras">Araras</option>
											</select>
											<!--<input type="text" class="form-control" name="txtCidade" id="txtCidade">-->
											<span class="help-block">Cidade do candidato(a)</span>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">COMUM CONGREGAÇÃO:</label>
											<input type="text" class="form-control" name="txtComum" id="txtComum">
											<span class="help-block">Comum onde o candidato(a) irá tocar</span>
										</div>
									</div>
								
								</div>
								<!--/row-->

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">ESCOLHA O TIPO DE EXAME:</label>
											<select class="form-control" name="cbTipoExame" id="cbTipoExame">												
												<option value="RJM_ORG">REUNIÃO DE JOVENS PARA ORGANISTA</option>												
												<option value="CUL_ORG">CULTO OFICIAL PARA ORGANISTA</option>
												<option value="OFI_ORG">OFICIALIZAÇÃO PARA ORGANISTA</option>
												<option value="CUL_MUS">CULTO OFICIAL PARA MÚSICOS</option>
												<option value="OFI_MUS">OFICIALIZAÇÃO PARA MÚSICOS</option>
												<option value="TROCA">TROCA DE INSTRUMENTO</option>
											</select>
										</div>
									</div>
									
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">NOME DO ANCIÃO:</label>
											<input type="text" class="form-control" name="txtNomeAnciao" id="txtNomeAnciao">
											<span class="help-block">Insira aqui o nome do ancião que atende a cidade</span>
										</div>
									</div>
									
								
								</div>
								<!--/row-->
								
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">NOME DO CANDIDATO(A):</label>
											<input type="text" class="form-control" name="txtNomeCandidato" id="txtNomeCandidato">
											<span class="help-block">Insira o nome completo</span>
										</div>
									</div>
									

									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">NOME DO COOPERADOR DO OFICÍO MINISTERIAL</label>
											<input type="text" class="form-control" name="txtNomeCoopera" id="txtNomeCoopera">
											<span class="help-block">Cooperador da comum onde o canditado(a) irá tocar.</span>
										</div>
									</div>
								</div>										
								<!--/row-->

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Instrumento:</label>
											<input type="text" class="form-control" name="txtInstrumento" id="txtInstrumento">
											<span class="help-block">Quando organista NÃO preencher</span>				
										</div>
									</div>
									

									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">NOME DO ENCARREGADO LOCAL DE ORQUESTRA:</label>
											<input type="text" class="form-control" name="txtNomeEncarregado" id="txtNomeEncarregado">
											<span class="help-block">Encarregado da comum onde o canditado(a) irá tocar.</span>
										</div>
									</div>
								</div>										
								<!--/row-->
												
							</div>
						
						</div>
											
							<div class="form-actions right">								
								<input type="submit"  value="GERAR CARTA" class="btn blue">
								<input type="reset"  value="Limpar" class="btn grey">
							</div>
										
					</form>
					<!-- END FORM-->
				</div>
			</div>

		</div>

	</div>

<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="page-footer-inner">Departamento de Informática | Regional Porto Ferreira/SP - 2019</div>	
</div>
<!-- END FOOTER -->

<!--[if lt IE 9]>
<script src="../assets/global/plugins/<respond class="m"></respond>in.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->

<script src="../libs/jquery-1.11.1.js" type="text/javascript"></script>
<script src="../libs/jquery.validate.min.js" type="text/javascript"></script>

<script type="text/javascript">

	$(document).ready( function() {

		$("#frmCarta").validate({
			rules:{
				txtCidade:{
					required: true, minlenght:3
				},
				txtComum:{
					required: true, minlenght:3
				},
				txtNomeAnciao:{
					required: true, minlenght:3
				},
				txtNomeCandidato:{
					required: true, minlenght:3
				},
				txtNomeCoopera:{
					required: true, minlenght:3
				},
				txtNomeEncarregado:{
					required: true, minlenght:3
				}
			},
			messages:{
				txtCidade:{
					required: "Digite a cidade"
				},
				txtComum:{
					required: "Digite a comum do canditado(a)"
				},
				txtNomeAnciao:{
					required: "Digite o nome do Irmão Ancião"
				},
				txtNomeCandidato:{
					required: "Digite o nome do canditado(a)"
				},
				txtNomeCoopera:{
					required: "Digite o nome do Cooperador"
				},
				txtNomeEncarregado:{
					required: "Digite o nome do Encarregado Local de orquestra"
				}
			}
		});

	});
	

</script>

</body>

</html>