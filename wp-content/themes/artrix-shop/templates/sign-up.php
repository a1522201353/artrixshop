<?php

/**
 * Template Name: Sign-up
 */

$body_class = "font-en page-sign";

get_header();
?>

<main>
    <div class="blank-top h-100"></div>

    <div class="pt-120 pb-160">
        <div class="wrap">
            <div class="max-w-1100 mx-auto">
                <h1 class="text-68 font-700 text-red text-center leading-1">Sign Up</h1>
                <form action="<?php echo site_url('/wp-json/artrix-user/v1/user-register') ?>" method="post" id="signupForm">
                    <?php wp_nonce_field('artrix-register', 'artrix-register-nonce'); ?>

                    <div class="contact-form flex flex-wrap gap-40 mt-60">
                        <div class="cform-item col-50">
                            <input type="text" name="first_name" placeholder="First Name" class="cform-input text-16">
                        </div>
                        <div class="cform-item col-50">
                            <input type="text" name="last_name" placeholder="Last Name" class="cform-input text-16">
                        </div>
                        <div class="cform-item col-50">
                            <input type="email" name="email" placeholder="Email" class="cform-input text-16">
                        </div>
                        <div class="cform-item relative code col-50">
                            <input type="tel" name="code" id="emailcode" data-id="1" placeholder="Verification code" class="cform-input text-16">
                            <button type="button" class="js-emailcode btn-getcode text-16 absolute top-0 right-0 text-gray underline hover:text-black transition-color" data-url="<?php echo site_url('/wp-json/artrix-user/v1/send-code') ?>" data-type="user_register">Get Verification Code</button>
                        </div>
                        <div class="cform-item col-50">
                            <input type="password" name="pwd" id="pwd" placeholder="Password" class="cform-input text-16">
                        </div>
                        <div class="cform-item col-50">
                            <input type="password" name="check_pwd" placeholder="Password(repeat)" class="cform-input text-16">
                        </div>
                    </div>

                    <div class="cform-agree-box flex flex-wrap text-16 mt-40 text-gray">

                        <input type="checkbox" name="agree" value="1" id="agree" class="cform-agree-input" required>
                        <label for="agree" class="cform-agree-label text-gray">

                        </label>
                        <div class="cform-agree-tip pl-10">
                            Confirm that you have read and agree to abide by the <a href="" class="hover:text-black underline transition-color">"User Registration Agreement"</a>
                        </div>

                    </div>

                    <div class="text-center">
                        <button type="submit" class="text-20 mt-80 infobank-link inline-block bg-red text-white text-center">Create an Account</button>
                    </div>

                    <p class="text-16 leading-15 mt-20 text-gray text-center">Already have an account? Please <a href="/user-login/" class="js-show-layer-signin hover:text-black underline transition-color">Login</a></p>
                </form>
            </div>
        </div>
    </div>

</main>
<?php get_footer() ?>