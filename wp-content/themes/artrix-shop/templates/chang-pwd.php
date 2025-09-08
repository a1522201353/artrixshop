<?php

/**
 * Template Name: Chang pwd
 */

$body_class = "font-en page-changpwd";

get_header();
?>
<main>
    <div class="blank-top h-100"></div>

    <div class="pt-120 pb-160">
        <div class="wrap">
            <div class="max-w-1100 mx-auto">
                <h1 class="text-68 font-700 text-red text-center leading-1">Change Password</h1>
                <form action="<?php echo site_url('/wp-json/artrix-user/v1/reset-password') ?>" method="post" id="changePwdForm">
                    <?php wp_nonce_field('artrix-reset-pwd', 'artrix-reset-pwd-nonce'); ?>

                    <div class="contact-form flex flex-wrap gap-40 mt-60">
                        <div class="cform-item col-50">
                            <input type="email" name="email" placeholder="Email" class="cform-input text-16">
                        </div>
                        <div class="cform-item relative code col-50">
                            <input type="tel" name="code" id="emailcode" data-id="1" placeholder="Verification code" class="cform-input text-16">
                            <button type="button" class="js-emailcode btn-getcode text-16 absolute top-0 right-0 text-gray underline hover:text-black transition-color" data-url="<?php echo site_url('/wp-json/artrix-user/v1/send-code') ?>" data-type="user_reset">Get Verification Code</button>
                        </div>
                        <div class="cform-item col-50">
                            <input type="password" name="pwd" id="pwd" placeholder="New Password" class="cform-input text-16">
                        </div>
                        <div class="cform-item col-50">
                            <input type="password" name="check_pwd" placeholder="Password(repeat)" class="cform-input text-16">
                        </div>
                    </div>


                    <div class="text-center">
                        <button type="submit" class="text-20 mt-80 infobank-link inline-block bg-red text-white text-center">Confirm The Changes</button>
                    </div>

                    <!-- <div class="link-more red flex justify-center items-center text-16 text-red gap-x-10">
                        <span>Read More</span><svg><use xlink:href="#icon-right"></use></svg>
                    </div> -->
                </form>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
