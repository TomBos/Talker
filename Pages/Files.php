<?php
require '../dbOperations/IninitalizeDB.php';

$curentDate = date_create()->format('Y-m-d H:i:s');

$dataBaseName = '20ic01';
$usersIdentification = $_SESSION['userID'];

if ($usersIdentification == "") {
    header("location: ../index.php");
}

if (!file_exists('../FileShare/DontDeleteMe.md')) {
    mkdir('../FileShare', 0777, true);
}












?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="../input.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Talker - Files</title>
</head>

<div class="too-small2">
    <header class="header" id="header">
        <nav class="nav container">


            <?php
            print("<a href='#' class='nav__logo'>" . ucfirst($_SESSION['userName']) . "</a>");
            ?>

            <div class="nav__menu " id="nav-menu">
                <ul class="nav__list grid">
                    <li class="nav__item">
                        <a href="Chat.php" class="nav__link">
                            <i class="uil uil-message nav__icon"></i>Chat
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
            <h2 class="section__title">Welcome To Talker <i class="uil uil-file-upload-alt"></i></h2>
            <span class="span section__subtitle">Share Files as You Please</span>


           








        </section>


        <section class="move-down">
            <div class="contact__container container grid">
                <form id="form" action="../ServerSidePageOperations/Upload.php" enctype="multipart/form-data" method="POST" class="contact__form grid">

                    <label for="fileInput" class="contact__content">
                        <label  class="contact__label"> Click Me To Upload Files <i class="uil uil-file-plus-alt"></i>
                            <input type="file" id="fileInput" name="file" class="contact__input" required></input>
                        </label>
                    </label>

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


</body>

</html>