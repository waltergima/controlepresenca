<?php
include("header.php");
                                    
?>
              
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
                                                    <input type="text" id="descricao" name="descricao" class="form-control" placeholder="Descrição/Motivo da Reunião">
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
                                                    <label class="control-label">Cidade da reunião:</label>
                                                    <select class="form-control" data-placeholder="Escolha uma Cidade" tabindex="1" id="cidade" name="cidade">
                                                        <option value="1">Cidade 1</option>
														<option value="2">Cidade 2</option>
														<option value="3">Cidade 3</option>
														<option value="4">Cidade 4</option>
														<option value="5">Cidade 5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--/span-->                                                                                
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Igreja reunião:</label>
                                                    <select class="form-control" data-placeholder="Escolha uma Igreja" tabindex="1" id="igrejareuniao" name="igrejareuniao">
                                                        <option value="1">Igreja 1</option>
														<option value="2">Igreja 2</option>
														<option value="3">Igreja 3</option>
														<option value="4">Igreja 4</option>
														<option value="5">Igreja 5</option>
														<option value="6">Igreja 6</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>																			
																											
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
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
                                        <button type="button" class="btn default">Cancel</button>
                                        <button type="submit" class="btn blue">
                                            <i class="fa fa-check"></i> Save</button>
                                    </div>
                                </form>
                                <!-- END FORM-->
<?php
include("footer.php");
?>