<?php
require_once('../load.php');
get_header();
$conn = db_conn();

is_driver();
$driver = get_driver();

if(isset($_POST['submit_status'])){
    $status = $_POST['status'];
    $zone = $_POST['zone'];
    $lat = $_POST['lat'];
    $long = $_POST['long'];

    $sql = 'UPDATE driver
            SET status="'.$status.'",
                covered_zone="'.$zone.'",
                lat="'.$lat.'",
                lng="'.$long.'"
            WHERE national_id = "'.$driver['national_id'].'"
        ';
    $res = mysqli_query($conn, $sql);
    if($res){
        $sql2 = 'INSERT INTO driver_trace (driver, status, zone, timestamp)
            VALUES(
                "'.$driver['national_id'].'",
                "'.$status.'",
                "'.$zone.'",
                "'.time().'"
            )';
        if($status != $driver['status'] OR $zone!=$driver['covered_zone'])
            mysqli_query($conn, $sql2);

        $submit_status_msg = c_statusUpdated;
        $driver = get_driver();
    }
}

if(isset($_GET['delivered_id'])){
    $id = $_GET['delivered_id'];
    $sql = 'UPDATE send_request SET done=1 WHERE id="'.$id.'"';
    $res = mysqli_query($conn, $sql);
}

$sql = 'SELECT send_request.id, number, done, resturant.name as resturant_name, food.name as food, charity.name as charity_name
        FROM send_request
        INNER JOIN resturant ON send_request.resturant=resturant.username
        INNER JOIN charity ON send_request.charity=charity.username
        INNER JOIN food ON send_request.food=food.id
        WHERE 
            driver="'.$driver['national_id'].'" 
            AND done="0" 
            ORDER BY timestamp DESC 
            LIMIT 1
        ';
$res = mysqli_query($conn, $sql);
if(mysqli_num_rows($res) > 0){
    $request = mysqli_fetch_array($res);
    if($request['done'] == 1)
        unset($request);
}

?>

    <div class="container">
        <div class="dashboard">
            <div class="row">
                <div class="col-3">
                    <div class="sidebar">
                        <?php include_once('sidebar.php'); ?>
                    </div>
                </div>
                <div class="col-9">
                    <div class="mainbar">
                        <h1>
                            <?php echo c_driverDashboard ?>
                        </h1>
                        <hr/>
                        <?php
                        if(isset($submit_status_msg)){?>
                            <div class="alert alert-success">
                                <?=$submit_status_msg?>
                            </div>
                            <?php
                        }
                        ?>
                        <h3><?php echo c_changeStatusLocationAndZone ?></h3>
                        <form class="mt-4" method="POST" action="index.php">
                            <div class="form-group row">
                                <label class="col-2 col-form-label" for="status"><?php echo c_status ?></label>
                                <div class="col-10">
                                    <select class="form-control" name="status" id="status">
                                        <option value="available" <?=$driver['status']=='available' ? 'selected' : ''?>><?php echo c_available ?></option>
                                        <option value="unavailable" <?=$driver['status']=='unavailable' ? 'selected' : ''?>><?php echo c_unavailable ?></option>
                                        <option value="busy" <?=$driver['status']=='busy' ? 'selected' : ''?> disabled><?php echo c_busy ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label" for="zone"><?php echo c_zone ?></label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="zone" name="zone" placeholder="<?php echo c_enterZone ?>" value="<?=$driver['covered_zone']?>" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label class="col-3 col-form-label" for="lat">Lat:</label>
                                        <div class="col-8">
                                            <input type="number" class="form-control" id="lat" name="lat" placeholder="Latitude" value="<?=$driver['lat']?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label class="col-3 col-form-label" for="long">Long:</label>
                                        <div class="col-8">
                                            <input type="number" class="form-control" id="long" name="long" placeholder="Longitude" value="<?=$driver['lng']?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" name="submit_status" class="btn btn-primary btn-block"><?php echo c_updateStatus ?></button>
                        </form>
                        <?php if(isset($request)):?>
                            <h3 class="mt-5"><?php echo c_currentRequest ?></h3>
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td><b><?php echo c_from ?></b></td>
                                    <td><?=$request['resturant_name']?></td>
                                </tr>
                                <tr>
                                    <td><b><?php echo c_to ?></b></td>
                                    <td><?=$request['charity_name']?></td>
                                </tr>
                                <tr>
                                    <td><b><?php echo c_number ?></b></td>
                                    <td><?=$request['number']?></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><a href="index.php?delivered_id=<?=$request['id']?>" class="btn btn-success btn-block text-white"><?php echo c_delivered ?></a></td>
                                </tr>
                                </tbody>
                            </table>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
get_footer();
?>