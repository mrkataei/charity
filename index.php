<?php
require_once('load.php');
get_header();
get_footer();
?>
<html>
<header>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="static/js/main.js"></script>
    <link rel="stylesheet" href="static/css/main.css">
</header>
<body class="demo">
<div id="demo-content">
    <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <div id="content" class="dashboard welcome">
        <div id="redirect-div">
            <h1 style="text-align:center"><?php echo c_welcomeMessage?></a></h1>
            <button id="redirect"  class="btn btn-primary btn-change welcome" onclick="redirect()" ><?php echo c_login?></button>
        </div>
    </div>
</div>

</body>
</html>

