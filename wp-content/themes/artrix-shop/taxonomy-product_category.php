<?php
$body_class = "font-en has-topbar";

get_header();

$terms = get_terms(array(
    'taxonomy' => 'product_category',
    'hide_empty' => false,
));

$current_term = get_queried_object();
$current_term_id = $current_term->term_id;

?>

<?php if (is_tax('product_category')): ?>
    <?php
    $current_term = get_queried_object();
    ?>
    <div class="drillor-header fixed flex items-center right-0 left-0 z-100 bg-white">
        <div class="w-full">
            <div class="wrap">
                <div class="max-w-1520 mx-auto">
                    <div class="text-20 drillor-title text-gray">
                        <a href="<?php echo home_url(); ?>" class="text-red">Home</a>
                        <a href="<?php echo home_url('/products/'); ?>" class="text-red">Products</a>
                        <span class="text-black hover:text-red transition-color"><?php echo esc_html($current_term->name); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<main>
    <div class="blank-top h-100"></div>
    <div class="bg-lightgray pt-1">
        <div class="wrap">
            <div class="max-w-1520 mx-auto">
                <h1 class="text-68 font-700 text-red text-center mt-120">
                    <?php
                    if (is_tax('product_category')) {
                        // 如果是产品分类页面，显示 "分类名称 Products"
                        echo esc_html($current_term->name);
                    } else {
                        // 如果是所有产品页面，显示 "Products List"
                        echo 'Products List';
                    }
                    ?>
                </h1>

                <div class="products-main flex flex-wrap gap-x-40 mt-70">
                    <div class="pmain-left bg-white pt-70 px-30">
                        <h2 class="text-20 font-700">Product Categories</h2>

                        <?php
                        $page_id = get_page_id_from_template('templates/product-list.php');
                        ?>
                        <ul class="list-pmain-menu flex flex-wrap gap-y-20 text-gray leading-14 mt-20">
                            <li class="w-full">
                                <a href="<?php echo get_page_link($page_id) ?>" class="text-20">All Products</a>
                            </li>
                            <?php foreach ($terms as $term): ?>
                                <li class="w-full">
                                    <a href="<?php echo get_term_link($term) ?>" class="text-20 <?php if ($current_term_id === $term->term_id): ?>current<?php endif; ?>"><?php echo $term->name ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php
                    $current_page = max(1, intval($_GET['page_num'] ?? 1)); //当前第几页
                    $next_page = $current_page + 1;

                    global $product_templates;

                    // WP_Query arguments - 去除了排序功能，使用默认排序
                    $args = array(
                        'post_type' => array('product'),
                        'tax_query' => array(
                            'relation' => 'AND',
                            array(
                                'taxonomy' => 'product_category',
                                'field'    => 'ID',
                                'terms'    => $current_term_id
                            )
                        ),
                        'posts_per_page' => 12,
                        'paged' => $current_page, //当前页
                    );

                    // The Query
                    $query = new WP_Query($args);
                    $max_page = $query->max_num_pages;
                    ?>

                    <div class="pmain-right bg-white pt-70 px-60 pb-100">

                        <!-- 400*480 -->
                        <?php if (isset($query) && $query->have_posts()): ?>
                            <ul class="list-products flex flex-wrap gap-x-40 gap-y-60">
                                <?php while ($query->have_posts()) : $query->the_post(); ?>
                                    <?php
                                    $list_subtitle = carbon_get_the_post_meta('list_subtitle');
                                    $list_image = carbon_get_the_post_meta('list_image');
                                    $buy_link = carbon_get_the_post_meta('buy_link');
                                    $product_category_list = carbon_get_theme_option('product_category_list');
                                    ?>
                                    <li>
                                        <div class="pro-item text-20">
                                            <a href="<?php the_permalink() ?>">
                                                <div class="pro-item__img img-box overflow-hidden">
                                                    <?php if ($list_image): ?>
                                                        <img src="<?php echo wp_get_attachment_url($list_image) ?>" alt="">
                                                    <?php endif; ?>
                                                </div>
                                                <h3 class="font-500 mt-20 line-clamp-1"><?php the_title() ?></h3>
                                                <p class="text-gray"><?php echo $list_subtitle ?></p>
                                            </a>
                                            <div class="flex flex-wrap gap-x-5 mt-5">
                                                <a href="<?php the_permalink() ?>" class="pro-item__link inline-flex pl-10 pr-5 gap-x-5 items-center text-gray border leading-14 hover:text-red transition-colors">
                                                    <span>More</span>

                                                </a>
                                                <?php if ($buy_link): ?>
                                                    <a href="<?php echo $buy_link ?>" class="pro-item__link inline-flex pl-10 pr-5 gap-x-5 items-center text-gray border leading-14 hover:text-red transition-colors">
                                                        <span>Buy</span>

                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>

                        <?php echo artrix_paginate_links();
                        wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php get_footer() ?>