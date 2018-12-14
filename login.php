<?php
    include 'header.php';
    include 'lib/User.php';
    Session::checkLogin();
?>

<?php
    $user = new User();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
        $userLogin = $user->userLogin($_POST);
    }

?>
  <div class="container">
  <h2>Stacked form</h2>
  <?php
    if (isset($userLogin)) {
        echo $userLogin;
    }
?>
  <form class="" action="" method="post">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
    </div>
    <button type="submit" class="btn btn-primary" name="login">Submit</button>
  </form>
</div>
  <script type="text/javascript" src="../inc/assets/js/modernizr.min.js"></script>
  <script type="text/javascript" src="../inc/assets/js/tether.min.js"></script>
  <script type="text/javascript" src="../inc/assets/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../inc/assets/js/jquery.min.js"></script>
</body>
</html>
