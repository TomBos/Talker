<?php
require '../dbOperations - OLD/IninitalizeDB.php';

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
