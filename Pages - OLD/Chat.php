<?php
require '../dbOperations - OLD/IninitalizeDB.php';


$usersIdentification = $_SESSION['userID'];

if ($usersIdentification == "") {
    header("location: ../index.php");
}


if (isset($_POST['submit'])) {
    $message = trim(stripslashes($_POST['message']));
    $message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');

    if (strlen($message) >= 255) {
        header("location: Chat.php");
    }

    $message = preg_replace_callback('/\S{16,}/', 'splitLongWords', $message);


    $insertMessageQuery = "INSERT INTO `$dataBaseName`.`Messages` (`message`,`users_id`,`sended_at`) VALUE ('$message','$usersIdentification','$currentDate')";
    $result = mysqli_query($connection, $insertMessageQuery);
    if (!$result) {
        consolelog("Failed To Insert Data Into Table Containing Messages!");
    } else {
        header("location: Chat.php");
    }
}

$getMessages = "SELECT `M`.`message`, `U`.`username`, `M`.`sended_at`,`U`.`id` FROM `$dataBaseName`.`Messages` AS M
    INNER JOIN `$dataBaseName`.`Users` As U 
    ON `M`.`users_id` = `U`.`id`
ORDER BY `M`.`sended_at`";

$result = mysqli_query($connection, $getMessages);
if (!$result) {
    consolelog("Failed To Get Data From Table Containing Messages!");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../themes/styles.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">


    <script type="text/javascript" src="../JavaScript/Main.js"></script>

    <title>Talker - Chat</title>
</head>

<div class="too-small2">
    <header class="header" id="header">
        <nav class="nav container">


            <?php
            importNavName();
            ?>

            <div class="nav__menu " id="nav-menu">
                <ul class="nav__list grid">

                    <li class="nav__item">
                        <a href="Files.php" class="nav__link">
                            <i class="uil uil-message nav__icon"></i>File Sharing
                        </a>
                    </li>

                    <li class="nav__item">
                        <a href="../index.php" class="nav__link">
                            <i class="uil uil-message nav__icon"></i>Log Out
                        </a>
                    </li>

                </ul>
                <i class="uil uil-times nav__close nav__icon" id="nav-close"></i>
            </div>

        </nav>
    </header>


    <main class="main">
        <section class="section">
            <h2 class="section__title">Welcome To Talker <i class="uil uil-comment-lines"></i></h2>
            <span class="span section__subtitle">Broadcast Messages as You Please</span>


            <div id="result" class="services__container container">
                <?php
                printOutMessages($result, $usersIdentification);
                ?>

                <script>
                    RefreshChat();
                </script>

            </div>
        </section>


        <section class="move-down">
            <div class="contact__container container grid">
                <form id="form" action=" Chat.php#ChatBox" method="POST" class="contact__form grid">

                    <div class="contact__content">
                        <label for="" class="contact__label"> Message </label>
                        <input type="text" name="message" minlength="1" class="contact__input" required></input>
                    </div>

                    <button type="submit" id="ChatBox" name="submit" class="button button--flex">
                        Send Message
                        <i class="uil uil-message button__icon"></i>
                    </button>
                </form>
            </div>

        </section>
    </main>
</div>

<div class="main resolution__text">
    <section class="section">
        <h2 class="section__title">Resolution Too Small</h2>
        <span class="span section__subtitle">Please Swap To a Device With Bigger Resolution</span>
        <span class="span section__subtitle"> Sorry for the inconvenience, I'm not getting paid enough for this<br> (I'm
            not getting paid at all) </span>
    </section>
</div>


<script>
    CheckDateForWipeOut();
</script>


</html>