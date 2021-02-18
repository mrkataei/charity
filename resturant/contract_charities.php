<?php
require_once('../load.php');
get_header();
$conn = db_conn();

is_resturant();
$resturant = get_resturant();

if(isset($_POST['add_charity_submit'])){
    $charity = $_POST['charity'];
    $sql = 'INSERT INTO resturant_charity (resturant, charity) VALUES(
        "'.$resturant['username'].'",
        "'.$charity.'"
    )';
    $res = mysqli_query($conn, $sql);
    if($res){
        $submit_charity_msg = "Charity Added.";
    }
}
if(isset($_GET['action']) AND $_GET['action']=='delete'){
    $charity = $_GET['charity'];
    $sql = 'DELETE FROM resturant_charity WHERE charity="'.$charity.'"';
    $res = mysqli_query($conn, $sql);
    if($res){
        $delete_charity_msg = "Charity removed from list.";
    }
}

$sql = 'SELECT * FROM charity WHERE username NOT IN (SELECT charity FROM resturant_charity WHERE resturant="'.$resturant['username'].'")';
$res = mysqli_query($conn, $sql);
$selectable_charities = mysqli_fetch_all($res, MYSQLI_ASSOC);

$sql = 'SELECT * from resturant_charity, charity WHERE resturant="'.$resturant['username'].'" AND charity=charity.username';
$res = mysqli_query($conn, $sql);
$charities = mysqli_fetch_all($res, MYSQLI_ASSOC);
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
                        Contract Charities
                    </h1>
                    <hr/>
                    <?php
                    if(isset($submit_charity_msg)){?>
                        <div class="alert alert-success" role="alert">
                            <?=$submit_charity_msg?>
                        </div>
                    <?php } ?>
                    <h3>Add New Charity:</h3>
                    <?php if($selectable_charities): ?>
                    <form class="form-inline mt-3" method="POST" action="contract_charities.php">
                        <div class="form-group mb-2">
                            <select name="charity" class="form-control">
                                <?php
                                    foreach($selectable_charities as $ch){
                                        echo '<option value="'.$ch['username'].'">'.$ch['name'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <button name="add_charity_submit" type="submit" class="btn btn-primary ml-3 mb-2">Insert</button>
                    </form>
                    <?php else: ?>
                        <div class="alert alert-secondary" role="alert">
                            No item to add.
                        </div>
                    <?php endif; ?>

                    <h3>All Charities:</h3>
                    <?php
                    if(isset($delete_charity_msg)){?>
                        <div class="alert alert-success" role="alert">
                            <?=$delete_charity_msg?>
                        </div>
                    <?php } ?>
                    <ul class="list-group">
                        <?php 
                        foreach($charities as $ch){
                            echo '<li class="list-group-item">'.$ch['name'].' <a class="text-danger" href="?action=delete&charity='.$ch['charity'].'">delete</a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
?>