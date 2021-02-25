<?php

?>
<?php
require_once('../load.php');
get_header();
$conn = db_conn();

is_driver();
$driver = get_driver();

$sql = 'SELECT resturant.name as resturant_name, SUM(send_request.number) as number FROM `driver` 
        INNER JOIN send_request ON driver.national_id=send_request.driver
        INNER JOIN resturant ON send_request.resturant=resturant.username
        WHERE driver.national_id="'.$driver['national_id'].'"
        GROUP BY send_request.resturant
        ORDER BY SUM(send_request.number)
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
                        <?php if($resturants): ?>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo c_restaurant ?></th>
                                    <th><?php echo c_number ?></th>
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
                                        <td><?=$item['number'];?></td>
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