<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo c_projectName ?></title>
    <link rel="stylesheet" href="<?=STATIC_ROOT ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=STATIC_ROOT ?>/css/styles.css">
    <nav class="w-100 bg-white px-5 mb-5" style="border-radius:5px; box-shadow: 0 4px 2px -2px rgba(0,0,0,.2);">
        <form method="post" style="display:flex;align-items:center">
            <select id="main_language" name ="main_language" class="btn btn-primary py-2 px-2 my-1" onchange="this.form.submit();">
                <option value=""><?php echo language ?></option>
                <option value="FA">FA</option>
                <option value="EN">EN</option>
            </select>
        </form>
    </nav>
</head>

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
<body>
