<?php
require_once('../load.php');
get_header();

is_resturant();
$resturant = get_resturant();

$sql = '

'
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
                        <?php echo c_ResturantDashboard ?>
                    </h1>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
?>