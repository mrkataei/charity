<?php
require_once('../load.php');
get_header();
$conn = db_conn();

is_resturant();
$resturant = get_resturant();

$sql = 'SELECT resturant.name as resturant_name FROM `resturant_charity` 
        INNER JOIN resturant ON resturant_charity.resturant=resturant.username
        WHERE charity in (
            SELECT charity.username FROM `resturant_charity`
            INNER JOIN charity ON resturant_charity.charity=charity.username
            WHERE resturant="'.$resturant['username'].'"
        )

';
$res = mysqli_query($conn, $sql);
$resturants = mysqli_fetch_all($res, MYSQLI_ASSOC);
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
                            <?php echo c_restaurants ?>
                        </h1>
                        <hr/>
                        <h3><?php echo c_ContractedWithYourContractedCharities ?></h3>
                        <?php if($resturants): ?>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Resturant</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i = 0;
                                foreach($resturants as $item){
                                    $i++;
                                    ?>
                                    <tr>
                                        <td><?=$i?></td>
                                        <td><?=$item['resturant_name'];?></td>
                                    </tr>
                                <?php } ?>
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