<?php

/**
 * Template Name: Sign-in
 */



$body_class = "font-en page-signin";

get_header();
?>

<main>
    <div class="blank-top h-100"></div>

    <div class="pt-120 pb-160">
        <div class="wrap">
            <div class="max-w-1220 comm-layer-body mx-auto bg-white relative rounded-sm">
                <div class="layer-login flex justify-center">

                    <div class="llogin-right flex items-center">
                        <div class="w-full">
                            <div class="max-w-480 mx-auto">

                                <h1 class="text-68 font-700 text-red text-center leading-1">Login</h1>
                                <form action="<?php echo site_url('/wp-json/artrix-user/v1/user-login') ?>" method="post" id="loginForm">
                                    <?php
                                    $redirect_from = isset($_GET['redirect_from']) ? sanitize_text_field($_GET['redirect_from']) : '';
                                    ?>

                                    <input type="hidden" name="redirect_from" value="<?php echo esc_attr($redirect_from); ?>" class="cform-input text-16">

                                    <div class="flex flex-wrap gap-y-30  mt-60">
                                        <div class="cform-item w-full">
                                            <input type="email" name="username" placeholder="E-mail" class="cform-input text-16">
                                        </div>
                                        <div class="cform-item w-full">
                                            <input type="password" name="password" placeholder="Password" class="cform-input text-16">
                                        </div>
                                    </div>

                                    <div class="llogin-tip flex flex-wrap justify-between mt-30">
                                        <div class="llogint-left">
                                            <a href="/reset-password/" class="text-gray text-16 left-15 hover:text-black hover:underline transition-color">Forget the password</a>
                                        </div>
                                        <div class="lligint-right text-gray text-16">
                                            No account? <a href="/sign-up/" class="text-gray text-16 left-15 hover:text-black transition-color underline">Sign up</a> now.

                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="text-20 mt-60 infobank-link inline-block bg-red text-white text-center">Login</button>
                                    </div>

                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php get_footer() ?>