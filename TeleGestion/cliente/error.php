
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Verificacion</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link rel="stylesheet" href="../cliente/css/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../cliente/dataTables.bootstrap.css">
    <link rel="stylesheet" href="../cliente/css/AdminLTE.css">
    <link rel="stylesheet" href="../cliente/css/_all-skins.css">
  </head>
  <body background="../cliente/images/fondo.jpg">
            <div class="container-fluid">
              <div class="modal modal-primary" class="modal fade" id="modalinser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="false">&times;</span> </button>
                        <h4 class="modal-title" align="center"><i class="fa fa-graduation-cap"></i> SOLICITUD DE CITAS</h4>
                    </div>
                    <div class="modal-body"> 
                      <div class="box-body">
                        <?php
                            session_start();
                              echo $_SESSION["error"];
                              
                        ?>
                        <div class="box box-primary box-solid">
                          <div class="box-header">
                              <h3 class="box-title"></h3>
                          </div>
                          <div class="box-body">
                          
                          </div>
               
                          <div class="overlay">
                             <i class="fa fa-refresh fa-spin"></i>
                          </div>
                
                        </div>
                      </div><!-- /.box-body -->
                      <div class="box-footer" >
                          <center>
                            <a href="../cliente/index.php" class="btn btn-primary btn-xs"><i class="fa fa-arrow-left"> </i> Salir</a>
                          </center>
                      </div><!-- /.box-footer -->
                    </div>  <!-- /.modal-body -->
                    <div class="modal-footer"> 
                        <p> </p>
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
            </div> <!-- /.contenedor -->
        
    
            <script src="../cliente/js/jQuery-2.1.4.min.js"></script>
            <script src="../cliente/js/bootstrap.js"></script>
            <script src="../cliente/js/jquery.dataTables.js"></script>
            <script src="../cliente/js/dataTables.bootstrap.js"></script>
            <script src="../cliente/js/jquery.slimscroll.js"></script>
            <script src="../cliente/js/fastclick.js"></script>
            <script src="../cliente/js/app.js"></script>
            <script src="../cliente/js/demo.js"></script>
   
            <script type="text/javascript">
                   $(window).load(function(){
                                             $("#modalinser").modal('show');
                                            });
            </script>

  </body>
</html>
