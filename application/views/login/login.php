<div class="form-login">

    <div class="form-structor">
        <div class="signup">
            <h2 class="form-title" id="signup">Baron Living Studio</h2>
            <!-- <div class="form-holder">
                <input type="text" class="input" placeholder="Name" />
                <input type="email" class="input" placeholder="Email" />
                <input type="password" class="input" placeholder="Password" />
            </div> -->
            <!-- <button class="submit-btn">Sign up</button> -->
        </div>
        <form action="<?php echo site_url('login'); ?>/login" method="POST">
        <div class="login slide-up">
            <div class="center">
                <h2 class="form-title" id="login"><span>or</span>Log in</h2>
                <div class="form-holder">
                    <input type="username" class="input" id="nm-user" name="nm-user" placeholder="nm-user" />
                    <input type="password" class="input" id="password" name="password" placeholder="Password" />
                </div>
                <button type="submit" class="submit-btn">Log in</button>
            </div>
        </div>
        </form>
    </div>
</div>