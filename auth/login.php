
<?php
require_once('../load.php');
get_header();
$conn = db_conn();
$errors = [];
redirect_user();

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $log = login($username, $password);
    switch($log){
        case -1:
            $errors[] = c_passwordIncorrect;
            break;
        case -2:
            $errors[] = c_usernameDoesntExist;
            break;
    }

}

?>

<div class="container">
    <div class="w-50 mx-auto card card-body my-5">
        <h1 class="card-title" ><?php echo c_login ?></h1>
        <?php
        if(isset($_GET['password_reset'])){?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Password updated.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times</span>
                </button>
            </div>
            <?php
        }
        foreach($errors as $err){ ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?=$err?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php }
        ?>
        <form method="POST" action="login.php">
            <div class="form-group">
                <label for="username"><?php echo c_login ?></label>
                <input type="text" class="form-control" id="username"  name="username" placeholder="<?php echo c_enterUsername ?>" required>
            </div>
            <div class="form-group">
                <label for="pass"><?php echo c_password ?></label>
                <input type="password" class="form-control" id="pass" name="password" placeholder="<?php echo c_enterPassword ?>" required>
            </div>
            <div class="g-recaptcha" data-sitekey="6LfL0WgaAAAAAA1stDAANHf5vpBUgnT5PkTjH0J-" data-callback="enableBtn"></div>
            <div>
                <input class="btn btn-success" name="submit" type="submit" value="<?php echo c_login ?>" id="recaptcha-btn" style="width: 100%"  disabled="disabled">
            </div>
            <div class="mt-2 row">
                <div class="col-6">
                    <a href="register.php"s><?php echo c_signupnow ?></a>
                </div>
                <div class="col-6 text-right">
                    <a href="reset_password.php"><?php echo c_resetPassword ?></a>
                </div>

            </div>

        </form>
    </div>
</div>
<script>
    function enableBtn(){
        document.getElementById("recaptcha-btn").disabled = false;
    }
</script>

<?php get_footer(); ?>