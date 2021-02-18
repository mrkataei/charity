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
        $errors[] = "Username exists. choose another one.";
    if($password != $password2)
        $errors[] = "Passwords not match.";
    if (strlen($password) < 8) {
        $errors[] = "Password too short!";
    }
    if (!preg_match("#[0-9]+#", $password)) {
        $errors[] = "Password must include at least one number!";
    }
    if (!preg_match("#[a-zA-Z]+#", $password)) {
        $errors[] = "Password must include at least one letter!";
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
        <h1 class="card-title">Sign Up</h1>
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
                <label for="username">Username*:</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" required>
            </div>
            <div class="form-group">
                <label for="pass">Password*:</label>
                <input type="password" class="form-control" id="pass" name="password" placeholder="Enter Password" required>
            </div>
            <div class="form-group">
                <label for="pass2">Password Confirmation*:</label>
                <input type="password" class="form-control" id="pass2" name="password2" placeholder="Enter Password Confirmation" required>
            </div>
            <div class="form-group">
                <label for="role">Select Role*:</label>
                <select name="role" id="role" class="custom-select" required>
                    <option value="charity">Charity</option>
                    <option value="resturant">Resturant</option>
                    <option value="driver">Driver</option>
                </select>
            </div>
            <div class="form-group">
                <label for="ques">Security Question:</label>
                <select name="question" id="ques" class="custom-select" required>
                    <?=$SELECT_questions?>
                </select>
            </div>
            <div class="form-group">
                <label for="answ">Answer:</label>
                <input type="text" name="answer" class="form-control" id="answ" placeholder="Enter Question Answer" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-block">Sign Up</button>
            <div class="mt-2">
                Already have account? <a href="login.php">Login.</a>
            </div>
        </form>
    </div>
</div>

<?php get_footer(); ?>