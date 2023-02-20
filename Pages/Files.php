<?php
require '../dbOperations/IninitalizeDB.php';

$usersIdentification = $_SESSION['userID'];

if ($usersIdentification == "") {
    header("location: ../index.php");
}





$getFiles = "SELECT `F`.`files`, `U`.`username`, `F`.`sended_at`,`U`.`id` 
FROM `20ic01`.`Files` AS F
    INNER JOIN `20ic01`.`Users` As U 
    ON `F`.`users_id` = `U`.`id`
ORDER BY `F`.`sended_at`";



$queryResult = mysqli_query($connection, $getFiles);
if (!$queryResult) {
    consolelog("Failed To Get Data From Table Containing Files!");
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
            importNavName();
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


    <main class='main'>
        <section class="section">
            <h2 class="section__title">Welcome To Talker <i class="uil uil-file-upload-alt"></i></h2>
            <span class="span section__subtitle">Share Files as You Please (Max 500KB - Rename the File to .txt Or .jpg)</span>

            <div class="skills__container container grid">
                <div id="fileHolder">

                    <?php
                    printOutFiles($queryResult);
                    ?>


                    <script>
                        setInterval(function() {
                            let xhr = new XMLHttpRequest();
                            xhr.open('GET', '../ServerSidePageOperations/ReloadFiles.php', true);
                            xhr.onload = function() {
                                if (this.status == 200) {
                                    document.getElementById('fileHolder').innerHTML = this.responseText;
                                }
                            };
                            xhr.send();
                        }, 2000);
                    </script>

                </div>
            </div>








        </section>


        <section class="move-down">
            <div class="contact__container container grid">
                <form id="form" action="../ServerSidePageOperations/Upload.php" enctype="multipart/form-data" method="POST" class="contact__form grid">

                    <label for="fileInput" class="contact__content">
                        <label class="contact__label"> Click Me To Upload Files <i class="uil uil-file-plus-alt"></i>
                            <input type="file" id="fileInput" name="file" class="contact__input" required></input>
                        </label>
                    </label>

                    <button type="submit" value="upload" id="FileBox" name="submit" class="button button--flex">
                        Upload File
                        <i class="uil uil-cloud-upload button__icon"></i>
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