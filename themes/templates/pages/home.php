<?php
// Define the base directory for your CSS files
$parameters = require $_SERVER['DOCUMENT_ROOT'] . '/app/config/appParameters.php';

$css_dir = $parameters['css_dir'];
$js_dir = $parameters['js_dir'];
$icon_cdn = $parameters['icon_cdn'];
$controller_dir = $parameters['controller_dir'];


require $_SERVER['DOCUMENT_ROOT'] . $controller_dir . '/Dispatcher.php';
$router = new Dispatcher("login");
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
<body>
    <!-- include content of desired page -->
    <?php $router->displayPage(); ?>
</body>
</html>