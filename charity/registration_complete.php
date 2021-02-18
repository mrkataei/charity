<?php
require_once('../load.php');
get_header();
is_charity();

$conn = db_conn();

$sql = 'SELECT username FROM charity WHERE username="'.$_SESSION['USER_USERNAME'].'" LIMIT 1';
$res = mysqli_query($conn, $sql);
if(mysqli_num_rows($res) > 0){
    redirect(ROOT_URL . '/charity');
} 
?>

<?php
$errors = [];
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $year = $_POST['year'];
    $number = $_POST['number'];

    $city = $_POST['city'];
    $zone = $_POST['zone'];
    $street = $_POST['street'];
    $no = $_POST['no'];
    $lat = $_POST['lat'];
    $long = $_POST['long'];
    
    $sql = 'INSERT INTO address (city, zone, street, no, lat, lng)
        VALUES ("'.$city.'", "'.$zone.'", "'.$street.'", "'.$no.'", "'.$lat.'", "'.$long.'")
    ';
    $res = mysqli_query($conn, $sql);
    if(!$res){
        $errors[] = "Error: ". mysqli_error($conn);
    }
    else{
        $address_id = mysqli_insert_id($conn);
        $sql = 'INSERT INTO charity (username, daily_food_count, name, address, people_covered, established_year) VALUES(
            "'.$_SESSION['USER_USERNAME'].'",
            "'.$number.'",
            "'.$name.'",
            "'.$address_id.'",
            "'.$number.'",
            "'.$year.'"
        )';
        $res = mysqli_query($conn, $sql);
        if(!$res){
            $errors[] = "Error: ". mysqli_error($conn);
        }
        else redirect(ROOT_URL . '/charity');
    }
}

?>
<div class="container">
    <div class="w-50 mx-auto card card-body">
        <h1 class="card-title">Registration Complete</h1>
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
        <form method="POST" action="registration_complete.php">
            <div class="form-group">
                <label for="name">Charity Name*:</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Charity Name" required>
            </div>
            <div class="form-group">
                <label for="year">Established Year*:</label>
                <input type="number" class="form-control" name="year" id="year" placeholder="Enter Established Year" required>
            </div>
            <div class="form-group">
                <label for="number">Number of people covered*:</label>
                <input type="number" class="form-control" name="number" id="number" placeholder="Enter number of people covered" required>
            </div>
            <h3>Address</h3>
            <div class="form-group">
                <label for="city">City*:</label>
                <input type="text" class="form-control" name="city" id="name" placeholder="Enter City" required>
            </div>
            <div class="form-group">
                <label for="zone">Zone:</label>
                <input type="text" class="form-control" name="zone" id="zone" placeholder="Enter Zone">
            </div>
            <div class="form-group">
                <label for="st">Street:</label>
                <input type="text" class="form-control" name="street" id="st" placeholder="Enter Street">
            </div>
            <div class="form-group">
                <label for="no">No:</label>
                <input type="text" class="form-control" name="no" id="no" placeholder="Enter No">
            </div>
            <div class="form-group">
                <label for="lat">Lat:</label>
                <input type="number" class="form-control" name="lat" id="lat" placeholder="Enter Lat">
            </div>
            <div class="form-group">
                <label for="long">Long:</label>
                <input type="number" class="form-control" name="long" id="long" placeholder="Enter Long">
            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-block">Complete Registration</button>
        </form>
    </div>
</div>

<?php get_footer(); ?>