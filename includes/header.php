<!-- the head section -->
<head>
<title>My PHP CRUD App</title>
<link rel="stylesheet" type="text/css" href="css/mystyle.css">

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
<script language="JavaScript" src="scripts/gen_validatorv31.js" type="text/javascript"></script>
</head>

<!-- the body section -->
<body>

<header><h1>English Teams</h1>
<div class="topnav">
  <a class="active" href="index.php">Home</a>
  <?php
  session_start();
  if(isset($_SESSION['user_id']) && ($_SESSION['user_id']) == 1){
    echo'  
  <a href="add_team_form.php">Add Team</a>
  <a href="league_list.php">Manage Leagues</a>
  <a href="manage_teams.php">Manage Teams</a>
  <a href="manage_users.php">Manage Users</a>
  ';
  }?>

  <a href="contact.php">Contact</a>
  <?php
if(!isset($_SESSION['user_id'])){
  echo'
  <a href="login.php">Login</a>
  <a href="register.php">Register</a>
  ';
}?>
<?php
if(isset($_SESSION['user_id'])){
  echo'
  <a href="logout.php">Logout</a>';
}?>
</div>
</header>
</body>