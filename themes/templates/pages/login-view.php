<?php
$parameters = require $_SERVER['DOCUMENT_ROOT'] . '/app/config/appParameters.php';
$controller_dir = $parameters['controller_dir'];

$router = new Dispatcher();
?>

<div class="too-small">
    <main class="main">
        <section class="contact section" id="contact">
            <h2 class="section__title">User Login</h2>
            <span class="span section__subtitle">log in to continue to the website</span>
            <div class="contact__container container grid">
                <form id="form" action="<?php echo $router->getRelativeControllerPath("loginController") ?>" method="POST" class="contact__form grid">
                    <div class="contact__inputs grid">
                        <div class="contact__content">
                            <label for="name" class="contact__label"> User Name </label>
                            <input id="name" type="text" name="name" class="contact__input">
                        </div>
                        <div class="contact__content">
                            <label for="password" class="contact__label"> Password </label>
                            <input id="password" type="password" name="password" class="contact__input">
                        </div>
                    </div>
                    <div class="button__group">
                        <button type="submit" name="user" class="button button--flex">
                            Log In As an User
                            <i class="uil uil-user button__icon"></i>
                        </button>
                        <a href="/sign-up" class="button button--flex">
                            Create A New Account
                            <i class="uil uil-user-plus button__icon"></i>
                        </a>
                    </div>
                </form>
            </div>
        </section>
    </main>
</div>