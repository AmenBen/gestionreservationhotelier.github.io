<?php
session_start();

if(isset($_SESSION['uname']))
{
$cle2=$_SESSION['uname'];
?>
<?php 
extract($_POST);

$connect = mysql_connect("localhost", "root", "", "PRC");
        mysql_select_db("PRC");

$r="UPDATE  `prc`.`chambres_s` SET  `np` =  '$np',
`cin` =  '$cin',
`date_debut` =  '$date_debut',
`date_fin` =  '$date_fin',
 `status` =  '1' WHERE  `chambres_s`.`idcs` ='$selected_s' LIMIT 1 ;";

  $res=mysql_query($r);
  mysql_close($connect);
?>
  <script type="text/javascript">

  document.location.replace('etatv2.php');
	
</script>
<?php
}
else
{
header("location:index.php");
}

?>