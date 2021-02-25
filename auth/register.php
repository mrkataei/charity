<?php
require_once('../load.php');
get_header();
$conn = db_conn();
?>

<?php
$errors = [];
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $role = $_POST['role'];
    $ques = $_POST['question'];
    $answer = $_POST['answer'];

    $sql = 'SELECT username from users WHERE username="'.$username.'" LIMIT 1';
    $res = mysqli_query($conn, $sql);
    if(mysqli_num_rows($res) > 0)
        $errors[] = c_Username_exists;
    if($password != $password2)
        $errors[] = c_Passwords_not_match;
    if (strlen($password) < 8) {
        $errors[] = c_PasswordTooShort;
    }
    if (!preg_match("#[0-9]+#", $password)) {
        $errors[] = c_PasswordMustIncludeNum;
    }
    if (!preg_match("#[a-zA-Z]+#", $password)) {
        $errors[] = c_PasswordMustIncludeLetter;
    }
    if( !$errors ){
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = '
            INSERT INTO users (username, password, role, question_id, question_answer)
            VALUES ("'.$username.'", "'.$hash.'", "'.$role.'", "'.$ques.'", "'.$answer.'")
        ';
        $res = mysqli_query($conn, $sql);
        if(!$res){
            $errors[] = "ErrorCode: ". mysqli_errno($conn);
        }
        else
            header("Location:". LOGIN_URL);
    }
}

?>


<?php
$sql = "SELECT * FROM `secrity_question`";
$res = mysqli_query($conn, $sql);
if (mysqli_num_rows($res) > 0) {
    $SELECT_questions = '';
    while($row = mysqli_fetch_assoc($res)) {
        $SELECT_questions .= '<option value="'.$row['id'].'">'.$row['question'].'</option>';
    }
}
?>

    <div class="container">
        <div class="w-50 mx-auto card card-body my-5">
            <h1 class="card-title"><?php echo c_signup ?></h1>
            <?php
            foreach($errors as $err){ ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?=$err?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php }
            ?>
            <form method="POST" action="register.php">
                <div class="form-group">
                    <label for="username"><?php echo c_username?>*</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="<?php echo c_enterUsername ?>" required>
                </div>
                <div class="form-group">
                    <label for="pass"><?php echo c_password ?>*</label>
                    <input type="password" class="form-control" id="pass" name="password" placeholder="<?php echo c_enterPassword ?>" required>
                </div>
                <div class="form-group">
                    <label for="pass2"><?php echo c_passwordConfiguration ?>*</label>
                    <input type="password" class="form-control" id="pass2" name="password2" placeholder="<?php echo c_enterPasswordConfiguration ?>" required>
                </div>
                <div class="form-group">
                    <label for="role"><?php echo c_selectRole ?>*</label>
                    <select name="role" id="role" class="custom-select" required>
                        <!--                for insert admin set admin user in db manual
                                            <option value="admin">admin</option>-->
                        <option value="charity"><?php echo c_charity ?></option>
                        <option value="resturant"><?php echo c_restaurant ?></option>
                        <option value="driver"><?php echo c_driver ?></option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="ques"><?php echo c_securityQuestion ?></label>
                    <select name="question" id="ques" class="custom-select" required>
                        <?=$SELECT_questions?>
                    </select>


                </div>
                <div class="form-group">
                    <label for="answ"><?php echo c_answer ?></label>
                    <input type="text" name="answer" class="form-control" id="answ" placeholder="<?php echo c_enterQuestionAswer ?>" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary btn-block"><?php echo c_signup ?></button>
                <div class="mt-2">
                    <?php echo c_alreadyHaveAcount ?><a href="login.php"><?php echo c_login ?></a>
                </div>
            </form>
        </div>
    </div>

<?php get_footer(); ?>