<?php 
require_once ("db.php");
require_once("models/users.php");
$link = db_connect();
$users = users_all($link);
include ("views/users.php");

// if(isset($_GET['action']))
//   $action = $_GET['action'];
// else
//   $action = "";

// if ($action == "edit"){
//   if(!isset($_GET['id']))
//       header("Location: index.php");
//   $id = (int)$_GET['id'];

//   if(!empty($_POST) && $id > 0){
//       users_edit($link, $id, $_POST['first_name'], $_POST['last_name'], $_POST['role'], $_POST['status']);
//       header("Location: index.php");
//   }

//   $users = users_get($link, $id);
//   include("../views/users.php");

//   } else if($action == "delete") {
//   $id = $_POST['id'];
//   $user = users_delete($link, $id);
//   header('Location: index.php');
// } else {
//   $users = users_all($link);
//   include("views/users.php");
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  	$website_title = 'Fomenko Task 3';
  	require 'blocks/head.php';
	?>
</head>
<body>
<hr>
<?include 'modal.php';?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<?include 'script.js';?>
</body>
</html>