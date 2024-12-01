<div class="too-small">
    <main class="main">
        <section class="contact section" id="contact">
            <h2 class="section__title">Create New Account</h2>
            <span class="span section__subtitle">Please select username and strong password</span>

            <div class="contact__container container grid">
                <form id="form" action="" method="POST" class="contact__form grid">
                    <div class="contact__inputs grid">
                        <div class="contact__content">
                            <label for="username" class="contact__label"> User Name </label>
                            <input id="username" type="text" maxlength="10" minlength="3" required name="name" class="contact__input">
                        </div>

                        <div class="contact__content">
                            <label for="psswd" class="contact__label"> Password </label>
                            <input id="psswd" type="password" maxlength="15" minlength="4" required name="password" class="contact__input">
                        </div>

                        <div class="contact__content">
                            <label for="confirm_psswd" class="contact__label"> Confirm Password </label>
                            <input id="confirm_psswd" type="password" maxlength="15" minlength="4" required name="retyped_password" class="contact__input">
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