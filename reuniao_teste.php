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
                                
                                        </div>
                                    </div>
                                    <div class="form-actions right">
                                       
                                        <button type="submit" class="btn blue">
                                            <i class="fa fa-check"></i> Cadastrar</button>
                                        <button type="button" class="btn default">Cancelar</button>
                                    </div>
                                </form>
                                <!-- END FORM-->

<script>
  $( function() {
    $( "#datareuniao" ).datepicker();
  } );
  </script>
<?php
    include("footer.php");
?>