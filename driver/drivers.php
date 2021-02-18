<?php
require_once('../load.php');
get_header();
$conn = db_conn();

is_driver();
$driver = get_driver();

$sql = 'SELECT covered_zone as zone, COUNT(*) as counts 
        FROM `driver` 
        WHERE status="available"
        GROUP BY covered_zone';
$res = mysqli_query($conn, $sql);
$drivers = mysqli_fetch_all($res, MYSQLI_ASSOC);
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
                        Drivers
                    </h1>
                    <hr/>
                    <?php if($drivers): ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Zone</th>
                                <th>Available Drivers</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach($drivers as $item){
                            $i++;    
                            ?>
                                <tr>
                                    <td><?=$item['zone'];?></td>
                                    <td><?=$item['counts'];?></td>
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