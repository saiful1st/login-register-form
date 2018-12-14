<?php include 'header.php'; ?>
<div class="container">
		<div class="col-md-9">
		    <div class="card">
		        <div class="card-body">
		            <div class="row">
		                <div class="col-md-6">
		                    <h4>Your Profile</h4>
		                    <hr>
		                </div>
		                <div class="col-md-6">
		                    <a class="btn btn-primary" href="index.php">Back</a>

		                </div>
		            </div>
		            <div class="row">
		                <div class="col-md-12">
		                    <form action="" method="POST">
                              <div class="form-group row">
                                <label for="username" class="col-4 col-form-label">User Name*</label>
                                <div class="col-8">
                                  <input id="username" name="username" placeholder="Username" class="form-control here" type="text" value="saiful96">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="name" class="col-4 col-form-label">First Name</label>
                                <div class="col-8">
                                  <input id="name" name="name" placeholder="First Name" class="form-control here" type="text" value="Saiful">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="lastname" class="col-4 col-form-label">Last Name</label>
                                <div class="col-8">
                                  <input id="lastname" name="lastname" placeholder="Last Name" class="form-control here" type="text" value="Islam">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="select" class="col-4 col-form-label">Display Your role as</label>
                                <div class="col-8">
                                  <select id="select" name="select" class="custom-select">
                                  	<option>Choose...</option>
                                    <option value="admin">User</option>
                                    <option value="admin">Moderator</option>
                                    <option value="admin">Administrator</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="email" class="col-4 col-form-label">Email*</label>
                                <div class="col-8">
                                  <input id="email" name="email" placeholder="Email" class="form-control here" type="text" value="saifulislam265@gmail.com">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="publicinfo" class="col-4 col-form-label">Public Info</label>
                                <div class="col-8">
                                  <textarea id="publicinfo" name="publicinfo" cols="40" rows="4" class="form-control"></textarea>
                                </div>
                              </div>
                              <div class="form-group row">
                                <div class="offset-4 col-8">
                                  <button name="submit" type="submit" class="btn btn-primary">Update My Profile</button>
                                  <a class="btn btn-primary" href="changePassword.php">Change password</a>
                                </div>
                              </div>
                            </form>
		                </div>
		            </div>

		        </div>
		    </div>
		</div>
	</div>
</div>
