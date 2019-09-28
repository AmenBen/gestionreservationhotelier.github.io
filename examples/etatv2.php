<!--
=========================================================
* BLK Design System- v1.0.0
=========================================================

* Product Page: https://www.creative-tim.com/product/blk-design-system
* Copyright 2019 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Etat des réservations
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />                                 
  <!-- CSS Files -->
  <link href="../assets/css/blk-design-system.css?v=1.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="profile-page">
  <!-- Navbar -->
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
                      <a class="nav-link" href="../res_formv4.php">
                        <i class="tim-icons icon-key-25"></i> Réserver
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="etat.php">
                        <i class="tim-icons icon-paper"></i> Etat des réservations
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#pablo">
                        <i class="tim-icons icon-zoom-split"></i> Rechercher
                      </a>
                    </li>
                    <a class="nav-link btn btn-default d-none d-lg-block" href="" onclick="">
                    <i class="tim-icons icon-user-run"></i> Déconnexion
                      </a>
                    </ul>
                </div>
              </div>
            </nav>
  <!-- End Navbar -->  

  <div class="col-lg-8 col-lg-10 ml-auto mr-auto" style="margin: 100px;;margin-bottom: 150px;">
            <div class="tab-content tab-space">
              <form class="form" method="POST" action="res_s_savev2.php">
              <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="tim-icons icon-calendar-60"></i>
                        </div>
                      </div>
                      <input type="text" id="datepicker" class="form-control datepicker" name="date_debut" value="09/30/2019" data-datepicker-color="primary">
                    </div>
            </div>
          </div>

      <img src="../assets/img/dots.png" class="dots">
      <img src="../assets/img/path4.png" class="path">


            <div class="container align-items-center">
        <div class="col-lg-8 col-lg-10 ml-auto mr-auto" style="margin: 100px;;margin-bottom: 150px;">
            <div class="card card-coin card-plain">
              <div class="card-header">
                <img src="../assets/img/mike.jpg" class="img-center img-fluid rounded-circle">
                <h2 class="title">Etat des réservations</h2>
              </div>
              <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-primary justify-content-center">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#linka">
                        <i class="tim-icons icon-single-02"></i> Chambres Simple
                      </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#linkb">
                       <i class="tim-icons icon-single-02"></i><i class="tim-icons icon-single-02"></i> Chambres Double
                    </a>
                  </li>
                </ul>
                <div class="tab-content tab-subcategories">
                  <div class="tab-pane active" id="linka">
                    <div class="table-responsive">
                      <?php 

                      $connect = mysql_connect("localhost", "root", "", "PRC");
                        mysql_select_db("PRC");

                        $r="SELECT * FROM chambres_s;";
                        $res = mysql_query($r);
      
                    ?>
                <table class="table tablesorter ">
                  <thead class=" text-primary">
                          <tr>
                            <th class="header">
                              chambre
                            </th>
                            <th class="header">
                              idres
                            </th>
                            <th class="header">
                              nom et prenom
                            </th>
                            <th class="header">
                              cin
                            </th>
                            <th class="header">
                              date debut
                            </th>
                             <th class="header">
                              date fin
                            </th>
                            <th class="header">
                              Status
                            </th>
                          </tr>
                        </thead>
                         <tbody>
        <?php
        while($row = mysql_fetch_assoc($res))
  { 
        if (($row['date_debut']=='0000-00-00')and($row['date_fin']=='0000-00-00')) { 
            $f='-';
            $row['date_debut']=$f;
              $row['date_fin']=$f;
        }
        if ($row['status']=='1'){ 
            $m='<button class="btn btn-link btn-danger" disabled>Indisponible</button>';
        }
        if ($row['status']=='0'){ 
            $m='<a href="../spec_res_form_s.php?key='. $row['idcs']  .'"><button class="btn btn-link btn-success">Disponible</button></a>';  
        }
        echo'<tr>';
          echo'<td>'.$row['idcs'].'</td>';
          echo'<td>'.$row['idr'].'</td>';
          echo'<td>'.$row['np'].'</td>';
          echo'<td>'.$row['cin'].'</td>';
          echo'<td>'.$row['date_debut'].'</td>';
          echo'<td>'.$row['date_fin'].'</td>';
          echo'<td>'. $m .'</td>';
      
  }?>   

                        </tbody>
                      </table>
                    </div>
                  </div>               
                  <div class="tab-pane" id="linkb">
                    <div class="table-responsive">
                      <?php 

                      $connect = mysql_connect("localhost", "root", "", "PRC");
                        mysql_select_db("PRC");

                        $r="SELECT * FROM chambres_d;";
                        $res = mysql_query($r);
      
                    ?>
                <table class="table tablesorter ">
                  <thead class=" text-primary">
                          <tr>
                            <th class="header">
                              chambre
                            </th>
                            <th class="header">
                              idres
                            </th>
                            <th class="header">
                              nom et prenom
                            </th>
                            <th class="header">
                              cin
                            </th>
                            <th class="header">
                              date debut
                            </th>
                             <th class="header">
                              date fin
                            </th> 
                            <th class="header">
                              Status
                            </th>       
                          </tr>
                        </thead>
                         <tbody>
        <?php
        while($row = mysql_fetch_assoc($res))
  { 
        if (($row['date_debut']=='0000-00-00')and($row['date_fin']=='0000-00-00')) { 
            $f='-';
            $row['date_debut']=$f;
              $row['date_fin']=$f;
        }
        if ($row['status']=='1'){ 
            $m1='<button class="btn btn-link btn-danger" disabled>Indisponible</button>';
        }
        if ($row['status']=='0'){ 
            $m1='<a href="../spec_res_form_d.php?key='. $row['idcd']  .'"><button class="btn btn-link btn-success">Disponible</button></a>';  
        }
        
        echo'<tr>';
          echo'<td>'.$row['idcd'].'</td>';
          echo'<td>'.$row['idr'].'</td>';
          echo'<td>'.$row['np'].'</td>';
          echo'<td>'.$row['cin'].'</td>';
          echo'<td>'.$row['date_debut'].'</td>';
          echo'<td>'.$row['date_fin'].'</td>';
          echo'<td>'.$m1.'</td>';
      
  }?>   

                        </tbody>
                      </table>
                    
                    </div>
                  </div>
                </div>

 


  <!--   Core JS Files   -->
  <script src="./assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="./assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="./assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="./assets/js/plugins/bootstrap-switch.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="./assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!-- Chart JS -->
  <script src="./assets/js/plugins/chartjs.min.js"></script>
  <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
  <script src="./assets/js/plugins/moment.min.js"></script>
  <script src="./assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!-- Black Dashboard DEMO methods, don't include it in your project! -->
  <script src="./assets/demo/demo.js"></script>
  <!-- Control Center for Black UI Kit: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/blk-design-system.min.js?v=1.0.0" type="text/javascript"></script>
</body>

</html>
