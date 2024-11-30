<!--
<script>
    CheckDateForWipeOut();
</script>


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$_SESSION['userName'] = "";
$_SESSION['userID'] = "";

// require 'dbOperations/IninitalizeDB.php';



if (isset($_POST['user'])) {
    $userSubmittedName = strtolower(trim($_POST['name']));
    $verifyPassword = strtolower(trim($_POST['password']));
    $verifyPassword = crypt($verifyPassword, "salt");


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

-->

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