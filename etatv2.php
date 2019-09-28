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
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Etat des réservations
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />                                 
  <!-- CSS Files -->
  <link href="./assets/css/blk-design-system.css?v=1.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="./assets/demo/demo.css" rel="stylesheet" />
  <?php
      $currentDateTime = date('m/d/Y g:i A');
      
      $currentDateTimeT=substr($currentDateTime,0,10);
      $currentDateTimeA=substr($currentDateTime,16);
     $connect = mysql_connect("localhost", "root", "", "PRC");
      mysql_select_db("PRC");
      $r="SELECT * FROM chambres_s";
      $res = mysql_query($r);
      while($row = mysql_fetch_assoc($res))
  {   
      
      
      $A = substr($row['date_fin'],17);
      $T = substr($row['date_fin'],0,10);
 
      if (($currentDateTimeT==$T) && ($currentDateTimeA=='PM')) 
      {
       $key=$row['idcs'];

        $r1="UPDATE  `prc`.`chambres_s` SET
        `np` =  '',
        `cin` =  '',
        `date_debut` =  '',
        `date_fin` =  '',
        `status` =  '0' WHERE  `chambres_s`.`idcs` ='$key';";
        $res1 = mysql_query($r1);

      }
      else
      {
        echo "";
      }
}

$r2="SELECT * FROM chambres_d";
      $res2 = mysql_query($r2);
      while($row2 = mysql_fetch_assoc($res2))
  {   
      
      
      $A2 = substr($row2['date_fin'],17);
      $T2 = substr($row2['date_fin'],0,10);
 
      if (($currentDateTimeT==$T2) && ($currentDateTimeA=='PM')) 
      {
       $key1=$row2['idcd'];
      
        $r3="UPDATE  `prc`.`chambres_d` SET
        `np` =  '',
        `cin` =  '',
        `date_debut` =  '',
        `date_fin` =  '',
        `status` =  '0' WHERE  `chambres_d`.`idcd` ='$key1';";
        $res3 = mysql_query($r3);

      }
      else
      {
        echo "";
      }
}

?>
<script type="text/javascript">
  
  function date_time(id)
{

        date = new Date;
        year = date.getFullYear();
        month = date.getMonth();
        months = new Array('Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Decembre');
        d = date.getDate();
        day = date.getDay();
        days = new Array('Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');
        result = ''+days[day]+' '+d+' '+months[month]+' '+year;
        document.getElementById(id).innerHTML = result;
        setTimeout('date_time("'+id+'");','1000');
        return true;
}

</script>
</head>

<body class="profile-page">
  <!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top navbar-transparent " color-on-scroll="100">
              <div class="container">
                <div class="navbar-translate">
                  <a class="navbar-brand" href="#pablo">Etat des réservations</a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#example-navbar-primary" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                  </button>
                </div>
                <div class="collapse navbar-collapse" id="example-navbar-primary">
                  <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                      <a class="nav-link" href="./res_formv4.php">
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
                    <a class="nav-link btn btn-default d-none d-lg-block" href="logout.php">
                    <i class="tim-icons icon-user-run"></i> Déconnexion
                      </a>
                    </ul>
                </div>
              </div>
            </nav>
  <!-- End Navbar -->  
<br/>
<br/>
  <div class="container align-items-center">
    <img src="assets/img/path1.png" class="path">
        <div class="col-lg-7 col-lg-6 ml-auto mr-auto" style="margin: 180px;;margin-bottom: 180px;">
            <div class="card card-coin card-plain">
              <div class="card-header">
                <h3 class="title"><span id="date_time"></span>
                 <script type="text/javascript">window.onload = date_time('date_time'); </script><span id="clock">00:00:00 AM</span>
                  <script type="text/javascript">
                    function getTime( ) {
                    var d = new Date( ); 
                    d.setHours( d.getHours()); // offset from local time
                    var h = (d.getHours() % 12) || 12; // show midnight & noon as 12
                    return (
                    ( h < 10 ? '0' : '') + h +
                    ( d.getMinutes() < 10 ? ':0' : ':') + d.getMinutes() +
                    // optional seconds display
                    // ( d.getSeconds() < 10 ? ':0' : ':') + d.getSeconds() + 
                    ( d.getHours() < 12 ? ' AM' : ' PM' )
                    );
                            }
                      var clock = document.getElementById('clock');
                     setInterval( function() { clock.innerHTML = getTime(); }, 1000);
                </script>
              </h3>
            </div>
              <div class="card-body">
                 <?php
                 $chambres_simple = 0;
                 $chambres_double = 0;
                      //db_chmbres_s
                       $connect = mysql_connect("localhost", "root", "", "PRC");
                        mysql_select_db("PRC");
                        $r1="SELECT * FROM chambres_s;";
                        $res1 = mysql_query($r1);
                      //db_chmbres_d
                        $r2="SELECT * FROM chambres_d;";
                        $res2 = mysql_query($r2);
 
                        
                        $c1=$_POST['c1'];
                        if (isset($_POST['rechercher']) && ($c1 == 'option1')) 
                         {
                           
                           $date_rech=$_POST['date_rech'];
                           $r1="select * from chambres_s where date_fin = '$date_rech'";
                           $res1 = mysql_query($r1);
                           $chambres_simple=1;
                           $chambres_double = 0;                  
                          }
                          if (isset($_POST['rechercher']) && ($c1 == 'option2')) 
                         {
                          
                           $date_rech=$_POST['date_rech'];
                           $r2="select * from chambres_d where date_fin = '$date_rech'";
                           $res2 = mysql_query($r2);
                           $chambres_double=1;
                           $chambres_simple=0;                
                          }
                          if (isset($_POST['rechercher']) && ($c1 == 'option3')) 
                          {
                            $r1="select * from chambres_s where status = 0";
                            $res1 = mysql_query($r1); 
                            $r2="select * from chambres_d where status = 0";
                            $res2 = mysql_query($r2);               
                          }    

                          if (isset($_POST['rechercher']) && ($c1 == 'option4')) 
                          {
                            $r1="select * from chambres_s";
                            $res1 = mysql_query($r1); 
                            $r2="select * from chambres_d";
                            $res2 = mysql_query($r2);               
                          }                    
                ?>
                <form class="form" method="POST" enctype="multipart/form-data">
                 <div class="col-md-10">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="tim-icons icon-calendar-60"></i>
                        </div>
                      </div>
                      <input type="text" id="datepicker" class="form-control datepicker col-md-7" name="date_rech" data-datepicker-color="primary" value=<?php echo $currentDateTime;?>>
                    </div>
                    <div class="input-group">
                    <div class="form-check form-check-radio">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="c1" id="exampleRadios1" value="option1" checked>
                  <span class="form-check-sign"></span>
                   Chambres Simple
                </label>
              </div> 
            </div>
            <div class="input-group">
               <div class="form-check form-check-radio">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="c1" id="exampleRadios1" value="option2" unchecked>
                  <span class="form-check-sign"></span>
                   Chambres Double
                </label>
              </div>
            </div>
            <hr style="border: 0;box-shadow: 0 10px 10px -10px #8c8b8b inset;">
             <div class="input-group">
               <div class="form-check form-check-radio">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="c1" id="exampleRadios1" value="option3" unchecked>
                  <span class="form-check-sign"></span>
                   Tout les chambres disponible
                </label>
              </div>
            </div>
            <div class="input-group">
              <div class="form-check form-check-radio">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="c1" id="exampleRadios1" value="option4" unchecked>
                  <span class="form-check-sign"></span>
                   Afficher Tout
                </label>
              </div>
                    <div class="card-footer">
                                 <input type="submit" class="btn btn-info btn-round btn-lg" style="margin-left: 200px;"  name="rechercher" value="Rechercher">
                              </div>
                  </div> 
          </div>
      </div>
  </div>
</div>
</form>
            <div class="container align-items-center">
        <div class="col-lg-8 col-lg-10 ml-auto mr-auto" style="margin: 180px;;margin-bottom: 180px;">
            <div class="card card-coin card-plain">
              <div class="card-header">
                <h2 class="title">Etat des réservations</h2>
              </div>
              <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-primary justify-content-center">
                  <li class="nav-item">
                    <?php if ($chambres_simple==1) 
                    {
                     echo '<a class="nav-link active" data-toggle="tab" href="#linka">';
                      
                    }
                        else
                        {
                     echo '<a class="nav-link" data-toggle="tab" href="#linka">';
                        }
                    ?>
                        <i class="tim-icons icon-single-02"></i> Chambres Simple
                      </a>
                  </li>
                  <li class="nav-item">
                    <?php if ($chambres_double==1) 
                    {
                     echo '<a class="nav-link active" data-toggle="tab" href="#linkb">';
                    }
                        else
                        {
                     echo '<a class="nav-link" data-toggle="tab" href="#linkb">';
                        }
                    ?>
                    
                       <i class="tim-icons icon-single-02"></i><i class="tim-icons icon-single-02"></i> Chambres Double
                    </a>
                  </li>
                </ul>
                <div class="tab-content tab-subcategories">
                   <?php if ($chambres_simple==1) 
                    {
                     echo '<div class="tab-pane active" id="linka">';
                      
                    }
                        else
                        {
                     echo '<div class="tab-pane" id="linka">';
                        }
                    ?>
                  
                    <div class="table-responsive">     
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
        while($row1 = mysql_fetch_array($res1))
  { 
        if (($row1['np']=='') and ($row1['cin']=='') and ($row1['date_debut']=='') and ($row1['date_fin']=='')) { 
            $f1='-';
            $row1['date_debut']=$f1;
              $row1['date_fin']=$f1;
              $row1['cin']=$f1;
              $row1['np']=$f1;
        }
        if ($row1['status']=='1'){ 
            $m1='<button class="btn btn-link btn-danger" disabled>Indisponible</button>';
        }
        if ($row1['status']=='0'){ 
            $m1='<a href="./spec_res_form_s.php?key='. $row1['idcs']  .'"><button class="btn btn-link btn-success">Disponible</button></a>';  
        }
        echo'<tr>';
          echo'<td>'.$row1['idcs'].'</td>';
          echo'<td>'.$row1['idr'].'</td>';
          echo'<td>'.$row1['np'].'</td>';
          echo'<td>'.$row1['cin'].'</td>';
          echo'<td>'.$row1['date_debut'].'</td>';
          echo'<td>'.$row1['date_fin'].'</td>';
          echo'<td>'. $m1 .'</td>';
      
  }?>   

                        </tbody>
                      </table>
                    </div>
                  </div>               
                  <?php if ($chambres_double==1) 
                    {
                     echo '<div class="tab-pane active" id="linkb">';
                    }
                        else
                        {
                     echo '<div class="tab-pane" id="linkb">';
                        }
                    ?>
                  
                    <div class="table-responsive">
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
        while($row2 = mysql_fetch_assoc($res2))
  { 
        if (($row2['np']=='') and ($row2['cin']=='') and ($row2['date_debut']=='') and ($row2['date_fin']=='')) { 
            $f2='-';
            $row2['date_debut']=$f2;
              $row2['date_fin']=$f2;
              $row2['cin']=$f2;
              $row2['np']=$f2;
        }
        if ($row2['status']=='1'){ 
            $m2='<button class="btn btn-link btn-danger" disabled>Indisponible</button>';
        }
        if ($row2['status']=='0'){ 
            $m2='<a href="./spec_res_form_d.php?key='. $row2['idcd']  .'"><button class="btn btn-link btn-success">Disponible</button></a>';  
        }
        
        echo'<tr>';
          echo'<td>'.$row2['idcd'].'</td>';
          echo'<td>'.$row2['idr'].'</td>';
          echo'<td>'.$row2['np'].'</td>';
          echo'<td>'.$row2['cin'].'</td>';
          echo'<td>'.$row2['date_debut'].'</td>';
          echo'<td>'.$row2['date_fin'].'</td>';
          echo'<td>'.$m2.'</td>';
      
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