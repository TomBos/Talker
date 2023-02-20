<?php
session_start();
$_SESSION['userName'] = "";
$_SESSION['userID'] = "";

require 'dbOperations/IninitalizeDB.php';



if (isset($_POST['user'])) {
    $userSubmittedName = strtolower(trim($_POST['name']));
    $verifyPassword = sha1(strtolower(trim($_POST['password'])));


    $selectUserQuery = "SELECT `id`,`username`,`password` FROM `$dataBaseName`.`Users`";
    $result = mysqli_query($connection, $selectUserQuery);
    if (!$result) {
        consolelog("Failed To Get Data From Users Table!");
    }
    while ($row = mysqli_fetch_row($result)) {
        $databaseUserId = $row[0];
        $databaseUsername =  $row[1];
        $databasePassword =  $row[2];

        if ($databaseUsername != $userSubmittedName || $verifyPassword != $databasePassword) {
            consolelog("Wrong Password Or Username!");
        } else {
            $_SESSION['userName'] = $databaseUsername;
            $_SESSION['userID'] = $databaseUserId;
            header("location: Pages/Chat.php");
        }
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Talker - Login</title>
</head>

<body>

    <div class="too-small">
        <main class="main">
            <section class="contact section" id="contact">
                <h2 class="section__title">User Login</h2>
                <span class="span section__subtitle">log in to continue to the website</span>

                <div class="contact__container container grid">


                    <form id="form" action="index.php" method="POST" class="contact__form grid">
                        <div class="contact__inputs grid">
                            <div class="contact__content">
                                <label for="" class="contact__label"> User Name </label>
                                <input type="text" name="name" class="contact__input">
                            </div>

                            <div class="contact__content">
                                <label for="" class="contact__label"> Password </label>
                                <input type="password" name="password" class="contact__input">
                            </div>
                        </div>

                        <div class="button__group">
                            <button type="submit" name="user" class="button button--flex">
                                Log In As an User
                                <i class="uil uil-user button__icon"></i>
                            </button>
                            <a href="Pages/UserAuth.php" class="button button--flex">
                                Create A New Account
                                <i class="uil uil-user-plus button__icon"></i>
                            </a>
                        </div>
                    </form>
                </div>
            </section>
        </main>
    </div>

    <div class="main resolution__text">
        <section class="section">
            <h2 class="section__title">Resolution Too Small</h2>
            <span class="span section__subtitle">Please Swap To a Device With Bigger Resolution</span>
            <span class="span section__subtitle"> Sorry for the inconvenience, I'm not getting paid enough for this<br> (I'm not getting paid at all) </span>
        </section>
    </div>

</body>

</html>