<?php
function LoginForm(){
    ?>
     <div class="container mt-5">
        <div class="row align-items-center">
            <div class="col-md-6 mx-auto">
                <h2 class="mb-4 text-center">Sign In</h2>
                <form name="loginFrm" id="login-frm" action="../../BE/Controllers/userController.php" method="POST">
                    <input type="hidden" name="action" value="LOGIN">
                    <div class="form-group">
                        <label for="tfun">Username</label>
                        <input id="tfun" type="text" class="form-control" name="tfun" placeholder="Enter username">
                    </div>
                    <div class="form-group">
                        <label for="tfpass">Password</label>
                        <input id="tfpass" type="password" class="form-control" name="tfpass" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input type="button" class="btn btn-primary btn-block" value="Login" onclick="LoginFrm()">
                    </div>
                    <div class="form-group">
                        <input type="button" class="btn btn-secondary btn-block" value="Cancel" onclick="ResetFrm()">
                    </div>
                </form>
                <div class="text-center">
                    <span><a href="fe/pages/signup.php">Sign Up</a></span>
                </div>
            </div>
            <div class="col-md-6">
                <img src="../assets/images/banner-image.jpg" alt="" class="img-fluid">
            </div>
        </div>
    </div>
    <?php include_once("../controllers/userController.php"); ?>
        
    <?php
}
?>
<?php
function SignUpForm(){
    ?>
    <div class="container mt-5">
        <div class="row align-items-center">
            <div class="col-md-8 mx-auto">
                <form name="signup" action="../../BE/Controllers/userController.php" method="POST">
                    <input type="hidden" name="action" value="SIGNUP">
                    <div class="form-group">
                        <label for="tfun" class="font-weight-bold">Username</label>
                        <input id="tfun" type="text" class="form-control" name="tfun" placeholder="Enter username">
                    </div>
                    <div class="form-group">
                        <label for="tffn" class="font-weight-bold">First Name</label>
                        <input id="tffn" type="text" class="form-control" name="tffn" placeholder="Enter first name">
                    </div>
                    <div class="form-group">
                        <label for="tfln" class="font-weight-bold">Last Name</label>
                        <input id="tfln" type="text" class="form-control" name="tfln" placeholder="Enter last name">
                    </div>
                    <div class="form-group">
                        <label for="tfemail" class="font-weight-bold">Email</label>
                        <input id="tfemail" type="email" class="form-control" name="tfemail" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="tfpass" class="font-weight-bold">Password</label>
                        <input id="tfpass" type="password" class="form-control" name="tfpass" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="tfconfpass" class="font-weight-bold">Confirm Password</label>
                        <input id="tfconfpass" type="password" class="form-control" name="tfconfpass" placeholder="Confirm password">
                    </div>
                    <div class="form-group">
                        <label for="sex" class="font-weight-bold">Sex</label>
                        <select id="sex" class="form-control" name="sex">
                            <option value="m">Male</option>
                            <option value="f">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-block" value="Sign Up">
                    </div>
                    <div class="form-group">
                        <input type="reset" class="btn btn-secondary btn-block" value="Cancel">
                    </div>
                </form>
                <div class="text-center mt-3">
                    <span><a href="fe/pages/login.php" class="text-primary">Sign In</a></span>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>