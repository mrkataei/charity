<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo c_projectName ?></title>
    <link rel="stylesheet" href="<?=STATIC_ROOT ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=STATIC_ROOT ?>/css/styles.css">
    <link rel="stylesheet" href="<?=STATIC_ROOT ?>/css/main.css">
    <link rel="shortcut icon" href="<?=STATIC_ROOT ?>/images/charity.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="static/js/main.js"></script>
    <nav class="nav w-100 bg-light px-5 mb-5" id="nav-head" style=" box-shadow: 0 4px 2px -2px rgba(0,0,0,.2);">
        <div class="row" style="width: 100%">
            <div class="col-sm">
                <form class="form-group" method="post" style="align-items:center">
                    <select id="main_language" name ="main_language" class="form-s btn-change8 btn btn-primary py-2 px-2 my-3" onchange="this.form.submit();">
                        <option style="display:none"  value=""><?php echo language ?></option>
                        <option value="FA">FA</option>
                        <option value="EN">EN</option>
                    </select>
                </form>
            </div>
            <div class="col-sm "style="width: 20%; margin-left: 20% ; padding-top: 20px">
                <?php echo get_now();?>
            </div>
        </div>

    </nav>
</head>
<body>
<?php
if(lang == "EN") {
    $textAlign = "left";
    $direction = "ltr";
}
else {
    $textAlign = "right";
    $direction = "rtl";
}
?>
<style>
    * {
        text-align : <?php echo $textAlign; ?>;
        direction : <?php echo $direction; ?>;
    }
</style>
