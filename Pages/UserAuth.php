<?php
require '../dbOperations/IninitalizeDB.php';

/* ===================================== WITHOUT USERS TOKENS =========================================================== 
if (isset($_POST['submit'])) {
    $userName = strtolower(trim($_POST['name']));
    $userPassword = strtolower(trim($_POST['password']));
    $userVerificationPassword = strtolower(trim($_POST['retyped_password']));

    $insertIntoUsersQuery = "INSERT INTO `$dataBaseName`.`Users` (`username`,`password`)VALUES ('$userName','" . crypt($userPassword,"salt") . "')";

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
===================================== WITHOUT USERS TOKENS =========================================================== */

/* ===================================== WITHOUT USERS =========================================================== */
if (isset($_POST['submit'])) {
    $userName = strtolower(trim($_POST['name']));
    $userPassword = strtolower(trim($_POST['password']));
    $userVerificationPassword = strtolower(trim($_POST['retyped_password']));
    $userToken = strtolower(trim($_POST['token']));

    $selectTokenTable = "SELECT * FROM `$dataBaseName`.`TokenTable`";
    $result = mysqli_query($connection, $selectTokenTable);
    while ($row = mysqli_fetch_row($result)) {
        $id  = $row[0];
        $databaseUsername =  $row[1];
        $databaseToken =  $row[2];

        if($databaseUsername == $userName && $userPassword == $userVerificationPassword && $userToken == $databaseToken){
            $insertUser = "INSERT INTO `$dataBaseName`.`Users` (`username`,`password`)VALUES ('$userName','" . crypt($userPassword,"salt") . "')";
            mysqli_query($connection, $insertUser);

            $removeUserToken = "DELETE FROM `$dataBaseName`.`TokenTable` WHERE `id`='$id'";
            if(mysqli_query($connection, $removeUserToken)){
                header("location: ../index.php");
            }
        }
    }
}
/* ===================================== WITHOUT USERS TOKENS =========================================================== */
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/styles.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <script type="text/javascript" src="../JavaScript/Main.js"></script>

    <title>Talker - New Account</title>
</head>


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
                            <input type="text" maxlength="10" minlength="3" required name="name" class="contact__input">
                        </div>


                       <!--  Comment this if you want to disable user tokens      -->
                        <div class="contact__content">
                            <label for="" class="contact__label"> Token </label>
                            <input type="text"  required name="token" class="contact__input">
                        </div>
                        <!--  Comment this if you want to disable user tokens      -->


                        <div class="contact__content">
                            <label for="" class="contact__label"> Password </label>
                            <input type="password" maxlength="15" minlength="4" required name="password" class="contact__input">
                        </div>

                        <div class="contact__content">
                            <label for="" class="contact__label"> Confirm Password </label>
                            <input type="password" maxlength="15" minlength="4" required name="retyped_password" class="contact__input">
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

<script>
    CheckDateForWipeOut();
</script>


</html>
