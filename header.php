<?php
$filepath = realpath(dirname(__FILE__));
include_once $filepath."/lib/Session.php";
Session::init();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Hello </title>
  <link rel="stylesheet" type="text/css" href="inc/assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="inc/assets/css/style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>

<?php
    if (isset($_GET['action']) && $_GET['action'] == 'logout') {
        Session::destroy();
    }
?>
<body>
    <div class="container">

    <?php
        $id = Session::get("id");
        $userLogin = Session::get("login");
        if ($userLogin == true) {
    ?>
    <h5>Want to logout</h5>
    <a class="btn btn-primary" href="?action=logout">Logout</a>
<?php }else {?>
    <h3>Do not have account? </h3>
    <a class="btn btn-primary"  href="register.php">Please Register</a>
    <h4>Already registered user?</h4>
    <a class="btn btn-primary" href="login.php">Please Log in</a>
    <a class="btn btn-primary" href="index.php">Home</a>
<?php } ?>
