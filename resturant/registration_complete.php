<?php
require_once('../load.php');
get_header();
is_resturant();

$conn = db_conn();

$sql = 'SELECT username FROM resturant WHERE username="'.$_SESSION['USER_USERNAME'].'" LIMIT 1';
$res = mysqli_query($conn, $sql);
if(mysqli_num_rows($res) > 0){
    redirect(ROOT_URL . '/resturant');
}
?>

<?php
$errors = [];
if(isset($_POST['submit'])){
    $name = $_POST['name'];
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
        $sql = 'INSERT INTO resturant (username, name, address) VALUES(
            "'.$_SESSION['USER_USERNAME'].'",
            "'.$name.'",
            "'.$address_id.'"
        )';
        $res = mysqli_query($conn, $sql);
        if(!$res){
            $errors[] = "Error: ". mysqli_error($conn);
        }
        else redirect(ROOT_URL . '/resturant');
    }
}

?>
    <div class="container">
        <div class="w-50 mx-auto card card-body">
            <h1 class="card-title"><?php echo c_registrationComplete ?></h1>
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
                    <label for="name"><?php echo c_ResturanName?></label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="<?php echo c_EnterResturantName ?>" required>
                </div>
                <h3><?php echo c_Address ?></h3>
                <div class="form-group">
                    <label for="city"><?php echo c_city ?></label>
                    <input type="text" class="form-control" name="city" id="name" placeholder="<?php echo c_EnterCity ?>" required>
                </div>
                <div class="form-group">
                    <label for="zone"><?php echo c_zone ?></label>
                    <input type="text" class="form-control" name="zone" id="zone" placeholder="<?php echo c_enterZone ?>">
                </div>
                <div class="form-group">
                    <label for="st"><?php echo c_Street ?></label>
                    <input type="text" class="form-control" name="street" id="st" placeholder="<?php echo c_EnterStreet ?>">
                </div>
                <div class="form-group">
                    <label for="no"><?php echo c_No ?></label>
                    <input type="text" class="form-control" name="no" id="no" placeholder="<?php echo c_EnterNo ?>">
                </div>
                <div class="form-group">
                    <label for="lat">Lat:</label>
                    <input type="number" class="form-control" name="lat" id="lat" placeholder="<?php echo c_enterLat ?>">
                </div>
                <div class="form-group">
                    <label for="long">Long:</label>
                    <input type="number" class="form-control" name="long" id="long" placeholder="<?php echo c_enterLong ?>">
                </div>
                <button type="submit" name="submit" class="btn btn-primary btn-block"><?php echo c_registrationComplete ?></button>
            </form>
        </div>
    </div>

<?php get_footer(); ?>