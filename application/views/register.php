<!DOCTYPE html>
<html lang="en">
<body id="register_bg">
<?php include('header.php')?>
	<div id="login">
		<aside>
			<figure>
                <h2>REGISTER</h2>
			</figure>
			<?php
				if($this->session->flashdata('message'))
				{
					echo '<div class="alert alert-success">'.$this->session->flashdata("message").'</div>';
				}
			?>
			<form autocomplete="on" method="post" action="register/validation">
				<div class="form-group">
					<label>Your Full Name</label>
					<input class="form-control" type="text" name="fname" value="<?php echo set_value('fname');?>">
					<span class="text-danger"><?php echo form_error('fname');?></span>
					<i class="ti-user"></i>
				</div>
				<div class="form-group">
					<label>Your Username</label>
					<input class="form-control" type="text" name="username" value="<?php echo set_value('username');?>">
					<span class="text-danger"><?php echo form_error('username');?></span>
					<i class="ti-user"></i>
				</div>
				<div class="form-group">
					<label>Your Email</label>
					<input class="form-control" type="email" name="email" value="<?php echo set_value('email');?>">
					<span class="text-danger"><?php echo form_error('email');?></span>
					<i class="icon_mail_alt"></i>
				</div>
				<div class="form-group">
					<label>Your password</label>
					<input class="form-control" type="password" name="password" value="<?php echo set_value('password');?>">
					<span class="text-danger"><?php echo form_error('password');?></span>
					<i class="icon_lock_alt"></i>
				</div>
				<div class="form-group">
					<label>Confirm password</label>
					<input class="form-control" type="password" name="passwordConf" value="<?php echo set_value('passwordConf');?>">
					<span class="text-danger"><?php echo form_error('passwordConf');?></span>
					<i class="icon_lock_alt"></i>
				</div>
                <div class="form-group">
                    <label>Profile Pic</label>
                    <div class="custom-file mb-3">
                        <input type="file" class="custom-file-input" id="customFile" name="ProFileName">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>

                <div class="form-group">
                    <label>User Type</label>
                    <select class="browser-default custom-select" id="UT_SELECT" name="Utype" value="<?php echo set_value('Utype');?>">
                        <option value="GP">General Public</option>
                        <option value="DF">Department Official</option>
                        <option value="CA">CA / Agency</option>
                    </select>
					<span class="text-danger"><?php echo form_error('password');?></span>
                </div>

                <div class="form-group">
                    <label>Upload Your ID</label>
                    <div class="custom-file mb-3">
                        <input type="file" class="custom-file-input" id="customFile" name="IDFileName">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>



				<div id="pass-info" class="clearfix"></div>
				<input type="submit" class="btn_1 rounded full-width add_top_30" name="register" value="Register Now">
				<div class="text-center add_top_10">Already have an acccount? <strong><a href="login.html">Sign In</a></strong></div>
			</form>

            <script>
                // Add the following code if you want the name of the file appear on select
                $(".custom-file-input").on("change", function() {
                    var fileName = $(this).val().split("\\").pop();
                    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                });

                //combo_box
                $(document).ready(function() {
                    var valName = document.getElementById("UT_SELECT");
                    var strVal = valName.value;
                    console.log(strVal);

                    if (strVal=="DF") {
                        idFile.style.display = "block";
                    } else {
                        idFile.style.display = "none";
                    }
                });

            </script>



			<div class="copy">© 2021 GST 360</div>
		</aside>
	</div>
	<!-- /login -->
	<!-- COMMON SCRIPTS -->
    <script src="js/common_scripts.js"></script>
	<script src="js/functions.js"></script>
	<script src="assets/validate.js"></script>
	
	<!-- SPECIFIC SCRIPTS -->
	<script src="js/pw_strenght.js"></script>
	
	
  
</body>
</html>
