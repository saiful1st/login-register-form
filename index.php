<?php
    include 'header.php';
    include 'lib/User.php';
    Session::checkSession();
    $user = new User();

?>
<?php
    $loginMsg = Session::get("loginmsg");
    if (isset($loginMsg)) {
        echo $loginMsg;
    }
    Session::set("loginmsg", NULL);

?>

    <div class="row profile">
    <div class="col-md-3">
      <div class="profile-sidebar">
        <!-- SIDEBAR USERPIC -->
        <div class="profile-userpic">
          <img src="" class="img-responsive" alt="">
        </div>
        <!-- END SIDEBAR USERPIC -->
        <!-- SIDEBAR USER TITLE -->
        <div class="profile-usertitle">
          <div class="profile-usertitle-name">
              <?php
              $fname = Session::get("firstname");
              $lname = Session::get("lastname");
              if (isset($fname) && isset($lname)) {
                  echo $fname." ".$lname;
              }
              ?>
          </div>
          <div class="profile-usertitle-job">
            Developer
          </div>
        </div>
        <!-- END SIDEBAR USER TITLE -->
        <!-- SIDEBAR BUTTONS -->
        <div class="profile-userbuttons">
          <button type="button" class="btn btn-success btn-sm">
        <?php
          $email = Session::get("email");
          if (isset($email)) {
             echo $email;
          }
          ?></button>
          <button type="button" class="btn btn-danger btn-sm">Role:
              <?php
              $role = Session::get("role");
              if (isset($role)) {
                  echo $role;
              }
              ?>
          </button>
        </div>
        <!-- END SIDEBAR BUTTONS -->
        <!-- SIDEBAR MENU -->
        <div class="profile-usermenu">
          <ul class="nav flex-column">
            <li class="active">
              <a href="#">
              <i class="fas fa-home"></i>
              Overview </a>
            </li>
            <li>
              <a href="profile.php?id=<?php echo $id; ?>">
              <i class="fas fa-sliders-h"></i>
              Account Settings </a>
            </li>
          </ul>
        </div>
        <!-- END MENU -->
      </div>
    </div>
  </div>
</div>
<br>
<br>
  <script type="text/javascript" src="inc/assets/js/modernizr.min.js"></script>
  <script type="text/javascript" src="inc/assets/js/tether.min.js"></script>
  <script type="text/javascript" src="inc/assets/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="inc/assets/js/jquery.min.js"></script>
</body>
</html>
