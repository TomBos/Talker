<?php
// Define the base directory for your CSS files
$parameters = require_once $_SERVER['DOCUMENT_ROOT'] . '/app/config/appParameters.php';

$css_dir = $parameters['css_dir'];
$js_dir = $parameters['js_dir'];
$icon_cdn = $parameters['icon_cdn'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Dynamically include the CSS file -->
    <link rel="stylesheet" href="<?php echo "$css_dir/styles.css"; ?>">
    <link rel="stylesheet" href="<?php echo "$icon_cdn"; ?>">

    <!-- Dynamically include the JS file -->
    <script type="text/javascript" src="<?php echo "$js_dir/index.js"; ?>"></script>

    <title>Talker</title>
</head>