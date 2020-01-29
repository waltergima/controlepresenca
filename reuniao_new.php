<?php
include("header.php");



?>
 <script>
			$( function() {
				$( "#datareuniao" ).datepicker({
                    format: 'dd/mm/yyyy',
                    todayBtn: "linked",
                    autoclose: true,
                    todayHighlight: true
                });
			} );

            $( function() {
                $('#horainicio').timepicker({ showMeridian:false });
                $('#horatermino').timepicker({ showMeridian:false });
            });
		</script>	             

<!-- BEGIN PAGE CONTENT INNER -->
<div class="page-content-inner portlet light">
    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-gift"></i>Nova Reunião
             </div>
        </div>
    </div>
	<!-- BEGIN FORM-->
                                <form action="reuniao.php" class="horizontal-form" method="POST">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Descrição</label>
                                                    <input type="text" id="descricao" name="descricao" class="form-control" style="text-transform: uppercase;" placeholder="Descrição/Motivo da Reunião">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                             <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Data da Reunião</label>
                                                    <input type="text"  id="datareuniao" name="datareuniao" class="form-control" placeholder="dd/mm/yyyy"> 
												</div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Hora início Reunião</label>
                                                    <input type="text" id="horainicio" name="horainicio" class="form-control" placeholder="HH:MM"> 
												</div>
                                            </div>
                                            <!--/span-->                                                                                
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Hora término Reunião</label>
                                                    <input type="text" id="horatermino" name="horatermino" class="form-control" placeholder="HH:MM"> 
												</div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Cidades:</label>
                                                    <select multiple class="form-control" data-placeholder="Escolha a cidade da reuniao" tabindex="1" id="cidade" name="cidade">
                                                        <option value="0">TODAS AS CIDADES</option>
                                                        <option value="350330">ARARAS</option>
                                                        <option value="351080">CASA BRANCA</option>
                                                        <option value="351370">DESCALVADO</option>
                                                        <option value="352380">ITOBI</option>
                                                        <option value="352670">LEME</option>
                                                        <option value="352760">LUIS ANTONIO</option>
                                                        <option value="353050">MOCOCA</option>
                                                        <option value="353930">PIRASSUNUNGA</option>
                                                        <option value="354070">PORTO FERREIRA</option>
                                                        <option value="354620">SANTA CRUZ DA CONCEICAO</option>
                                                        <option value="354630">SANTA CRUZ DAS PALMEIRAS</option>
                                                        <option value="354750">SANTA RITA DO PASSA QUATRO</option>
                                                        <option value="354760">SANTA ROSA DO VITERBO</option>
                                                        <option value="355090">SAO SIMAO</option>
                                                        <option value="355330">TAMBAU</option>
                                                    </select>
                                                    <!-- <label class="control-label">Cidade da reunião:</label>
                                                    <input type="text" id="cidadedescricao" name="cidadedescricao" class="form-control" placeholder="Nome da Cidade"> -->
                                                </div>
                                            </div>
                                            <!--/span-->                                                                                
                                            <div class="col-md-6">
                                                <div class="form-group">
													<label class="control-label">Igreja da reunião:</label>
                                                    <input type="text" id="igrejadescricaoreuniao" name="igrejadescricaoreuniao" class="form-control" placeholder="Ex: Central">
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>																			
																											
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Participantes da reunião:</label>
													<?php include("selectCargoJson.php");?>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">

                                            </div>
                                            <!--/span-->
                                        </div>

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

<script>
  $( function() {
    $( "#datareuniao" ).datepicker();
  } );
  </script>
<?php
include("footer.php");
?>