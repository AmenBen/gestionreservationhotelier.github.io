<?php
session_start();

if(isset($_SESSION['uname']))
{
$cle2=$_SESSION['uname'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <title>
    Application De Gestion Des Réservations
  </title>
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="./assets/css/blk-design-system.css?v=1.0.0" rel="stylesheet" />
  <link href="./assets/demo/demo.css" rel="stylesheet" />
   <?php $currentDateTime = date('m/d/Y g:i A'); ?>
</head>

<body class="index-page">
     
            <nav class="navbar navbar-expand-lg fixed-top navbar-transparent " color-on-scroll="100">
              <div class="container">
                <div class="navbar-translate">
                  <a class="navbar-brand" href="#pablo">Formulaire de réservation</a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#example-navbar-primary" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                  </button>
                </div>
                <div class="collapse navbar-collapse" id="example-navbar-primary">
                  <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="#pablo">
                        <i class="tim-icons icon-key-25"></i> Réserver
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="etatv2.php">
                        <i class="tim-icons icon-paper"></i> Etat des réservations
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="a_propos.php">
                        <i class="tim-icons icon-single-02"></i> A propos
                      </a>
                    </li>
                    <a class="nav-link btn btn-default d-none d-lg-block" href="logout.php" >
                    <i class="tim-icons icon-user-run"></i> Déconnexion
                      </a>
                    </ul>
                </div>
              </div>
            </nav>
             <img src="./assets/img/dots.png" class="dots">
             <img src="./assets/img/path4.png" class="path">
            <div class="col-8 m-auto" style="margin: 200px;margin-top: 200px;margin-bottom: 200px;padding: 200px;padding-top: 200px;">
              <div class="card card-register">
                <div class="card-header">
                  <img class="card-img" src="assets/img/square1.png" alt="Card image">
                  <h3 class="card-title">Réserver</h3>
                </div>
                
                <div class="card-header">
                  <ul class="nav nav-tabs nav-tabs-primary" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" data-toggle="tab" href="#link1" role="tablist">
                        <i class="tim-icons icon-single-02"></i> Chambre Simple
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#link2" role="tablist">
                        <i class="tim-icons icon-single-02"></i><i class="tim-icons icon-single-02"></i> Chambre Double
                      </a>
                    </li>
                  </ul>
                </div>
                <div class="card-body">
                  <!-- Tab panes -->
                  <div class="tab-content tab-space">
                    <div class="tab-pane active" id="link1">
                      <div class="card-body">
                  <form class="form" method="POST" action="res_s_savev2.php">
                    <p class="category">Date Début réservation</p>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="tim-icons icon-calendar-60"></i>
                        </div>
                      </div>
                      <input type="text" id="datepicker" class="form-control datepicker" name="date_debut" data-datepicker-color="primary" value=<?php echo $currentDateTime;?>>
                    </div>
                    <p class="category">Date fin réservation</p>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="tim-icons icon-calendar-60"></i>
                        </div>
                      </div>
                      <input type="text" id="datepicker" class="form-control datepicker" name="date_fin" data-datepicker-color="primary" value=<?php echo $currentDateTime;?>>
                    </div>
                    <p class="category">Nom et Prénom</p>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="tim-icons icon-single-02"></i>
                        </div>
                      </div>
                      <input type="text" name="np" class="form-control" placeholder="Nom et Prénom">
                    </div>
                    <p class="category">CIN</p>
                   <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="tim-icons icon-credit-card"></i>
                        </div>
                      </div>
                      <input type="text" name="cin" class="form-control" placeholder="carte d'identité">
                    </div>
                    <p class="category">Chambre</p>
                   <div class="input-group">
                      <div class="input-group-prepend">
                      </div>
                      <div class="col-sm-5">
                      <?php  
                         $connect = mysql_connect("localhost", "root", "", "PRC");
                          mysql_select_db("PRC");
      
                        $r="SELECT * FROM  `chambres_s`";
                            $res = mysql_query($r);
                          echo'<select class="form-control" name="selected_s">';
                         while($data = mysql_fetch_array($res)) 
                        {
                   
                                 if ($data['status']=='0') 
                                {   
                                echo '<option class="bg-default">' . utf8_encode($data['idcs']) . '</option>';
                                $mes=1;
                                }
                       }
                        echo "</select>";
                        
     
                    if($mes==1)
                     {
                          echo'<div class="card-footer">
                                 <input type="submit" class="btn btn-info btn-round btn-lg" value="Valider">
                              </div>';
    
                      }
                        if ($mes!=1) 
                       {
                           echo '
                                     <div class="alert alert-danger alert-with-icon">
                                    <span data-notify="icon" class="tim-icons icon-support-17"></span>
                                    <span>
                                    <b> Tout est réserver!</b></span>
                                    </div>';
                       }
                  ?>
                  </div>
                </div> 
              </form>
                </div>
                    </div>
                    <div class="tab-pane" id="link2">
                      <div class="card-body">
                  <form class="form" method="POST" action="res_d_savev2.php">
                    <p class="category">Date Début réservation</p>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="tim-icons icon-calendar-60"></i>
                        </div>
                      </div>
                      <input type="text" id="datepicker" class="form-control datepicker" name="date_debut" data-datepicker-color="primary" value=<?php echo $currentDateTime;?>> 
                    </div>
                    <p class="category">Date fin réservation</p>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="tim-icons icon-calendar-60"></i>
                        </div>
                      </div>
                      <input type="text" id="datepicker" class="form-control datepicker" name="date_fin" data-datepicker-color="primary" value=<?php echo $currentDateTime;?>>
                    </div>
                    <p class="category">Nom et Prénom</p>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="tim-icons icon-single-02"></i>
                        </div>
                      </div>
                      <input type="text" name="np" class="form-control" placeholder="Nom et Prénom">
                    </div>
                    <p class="category">CIN</p>
                   <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="tim-icons icon-credit-card"></i>
                        </div>
                      </div>
                      <input type="text" name="cin" class="form-control" placeholder="carte d'identité">
                    </div>
                    <p class="category">Chambre</p>
                   <div class="input-group">
                      <div class="input-group-prepend">
                      </div>
                      <div class="col-sm-5">
                      <?php  
                         $connect = mysql_connect("localhost", "root", "", "PRC");
                          mysql_select_db("PRC");
      
                        $r="SELECT * FROM  `chambres_d`";
                            $res = mysql_query($r);
                          echo'<select class="form-control" name="selected_d">';
                         while($data = mysql_fetch_array($res)) 
                        {
                   
                                 if ($data['status']=='0') 
                                {   
                                echo '<option class="bg-default">' . utf8_encode($data['idcd']) . '</option>';
                                $mes=1;
                                }
                       }
                        echo "</select>";
                        
     
                    if($mes==1)
                     {
                          echo'<div class="card-footer">
                                 <input type="submit" class="btn btn-info btn-round btn-lg" value="Valider">
                              </div>';
    
                      }
                        if ($mes!=1) 
                       {
                           echo '
                                     <div class="alert alert-danger alert-with-icon">
                                    <span data-notify="icon" class="tim-icons icon-support-17"></span>
                                    <span>
                                    <b> Tout est réserver!</b></span>
                                    </div>';
                       }
                  ?>
                  </div>
                </div> 
              </form>
                </div>
                   
                    </div>
                  </div>
                </div>        
              </div>
            </div>
          

</body>


  <script src="./assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="./assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="./assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <script src="./assets/js/plugins/bootstrap-switch.js"></script>
  <script src="./assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <script src="./assets/js/plugins/chartjs.min.js"></script>
  <script src="./assets/js/plugins/moment.min.js"></script>
  <script src="./assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <script src="./assets/demo/demo.js"></script>
  <script src="./assets/js/blk-design-system.min.js?v=1.0.0" type="text/javascript"></script>
  <script>
    $(document).ready(function() {
      blackKit.initDatePicker();
      blackKit.initSliders();
    });

    function scrollToDownload() {

      if ($('.section-download').length != 0) {
        $("html, body").animate({
          scrollTop: $('.section-download').offset().top
        }, 1000);
      }
    }
    $(document).ready(function() {
$('.mdb-select').materialSelect();
});
  </script>
</body>
</html>
<?php
}
else
{
header("location:index.php");
}

?>