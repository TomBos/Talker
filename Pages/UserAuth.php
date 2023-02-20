<?php
require '../dbOperations/IninitalizeDB.php';


if (isset($_POST['submit'])) {
    $userName = strtolower(trim($_POST['name']));
    $userPassword = strtolower(trim($_POST['password']));
    $userVerificationPassword = strtolower(trim($_POST['retyped_password']));

    $insertIntoUsersQuery = "INSERT INTO `$dataBaseName`.`Users` (`username`,`password`)VALUES ('$userName','" . sha1($userPassword) . "')";

    if ($userPassword != $userVerificationPassword) {
        consolelog("Wrong Password");
    } else {
        $result = mysqli_query($connection, $insertIntoUsersQuery);
        if (!$result) {
            consolelog("Uh Oh ! Something Went Wrong!");
        } else {
            header("location: ../index.php");
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
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Talker - New Account</title>
</head>

<body>
    <div class="too-small">
        <main class="main">
            <section class="contact section" id="contact">
                <h2 class="section__title">Create New Account</h2>
                <span class="span section__subtitle">Please select username and strong password</span>

                <div class="contact__container container grid">
                    <form id="form" action=" " method="POST" class="contact__form grid">
                        <div class="contact__inputs grid">
                            <div class="contact__content">
                                <label for="" class="contact__label"> User Name </label>
                                <input type="text" minlength="3" required name="name" class="contact__input">
                            </div>

                            <div class="contact__content">
                                <label for="" class="contact__label"> Password </label>
                                <input type="password" minlength="4" required name="password" class="contact__input">
                            </div>

                            <div class="contact__content">
                                <label for="" class="contact__label"> Confirm Password </label>
                                <input type="password" minlength="4" required name="retyped_password" class="contact__input">
                            </div>
                        </div>

                        <div class="button__group_CreateUsers">
                            <button type="submit" name="submit" class="button button--flex">
                                Create a Brand new Account
                                <i class="uil uil-check-circle button__icon"></i>
                            </button>
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