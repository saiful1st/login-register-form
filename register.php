<?php
    include 'header.php';
    include 'lib/User.php';
    ?>
<?php
    $user = new User();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
        $userRegistration = $user->userRegistration($_POST);
    }

?>
 <div class="container">
  <h2>Stacked form</h2>
  <?php
    if (isset($userRegistration)) {
        echo $userRegistration;
    }
?>
  <form class="" action="" method="post">
    <div class="form-group">
      <label for="name">First Name :</label>
      <input type="text" class="form-control" id="firstname" placeholder="Enter Your First Name" name="firstname">
    </div>
    <div class="form-group">
      <label for="name">Last Name :</label>
      <input type="text" class="form-control" id="lastname" placeholder="Enter Your Name" name="lastname">
    </div>
    <div class="form-group">
      <label for="name">User Name:</label>
      <input type="text" class="form-control" id="username" placeholder="Enter Your Name" name="username">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
    </div>
    <div class="form-group">
      <label for="role">Role:</label>
        <select class="custom-select" id="inputGroupSelect02" name="role">
          <option>Choose...</option>
          <option value="User">User</option>
          <option value="Moderator">Moderator</option>
          <option value="Administrator">Administrator</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary" name="register">Register</button>
  </form>
</div>
  <script type="text/javascript" src="../inc/assets/js/modernizr.min.js"></script>
  <script type="text/javascript" src="../inc/assets/js/tether.min.js"></script>
  <script type="text/javascript" src="../inc/assets/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../inc/assets/js/jquery.min.js"></script>
</body>
</html>
