<?php


$body_class = "font-en has-topbar";

get_header();

$terms = get_terms(array(
    'taxonomy' => 'product_category',
    'hide_empty' => false,
));

// 获取当前分类信息
$current_term = get_queried_object();
$current_term_id = 0;
if (isset($current_term->term_id)) {
    $current_term_id = $current_term->term_id;
}

?>

<div class="drillor-header fixed flex items-center right-0 left-0 z-100 bg-white">
    <div class="w-full">
        <div class="wrap">
            <div class="max-w-1520 mx-auto">
                <div class="text-20 drillor-title text-gray">
                    <a href="<?php echo home_url(); ?>" class="text-red">Home</a>
                    <a class="text-black hover:text-red transition-color">Products</a>
                </div>
            </div>
        </div>
    </div>
</div>

<main>
    <div class="blank-top h-100"></div>
    <div class="bg-lightgray pt-1">
        <div class="wrap">
            <div class="max-w-1520 mx-auto">
                <h1 class="text-68 font-700 text-red text-center mt-120">Products List</h1>

                <div class="products-main flex flex-wrap gap-x-40 mt-70">
                    <div class="pmain-left bg-white pt-70 px-30">
                        <h2 class="text-20 font-700">Product Categories</h2>
                        <ul class="list-pmain-menu flex flex-wrap gap-y-20 text-gray leading-14 mt-20">
                            <li class="w-full">
                                <a href="<?php echo get_post_type_archive_link('product'); ?>" class="text-20 <?php if (!$current_term_id): ?>current<?php endif; ?>">All Products</a>
                            </li>
                            <?php foreach ($terms as $key => $term): ?>
                                <li class="w-full">
                                    <a href="<?php echo get_term_link($term) ?>" class="text-20 <?php if ($current_term_id === $term->term_id): ?>current<?php endif; ?>"><?php echo $term->name ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <?php
                    // 当前页数
                    $current_page = max(1, intval($_GET['page_num'] ?? 1));
                    $next_page = $current_page + 1;

                    // 修改：使用 'product' 文章类型而不是 'page'
                    $args = array(
                        'post_type' => 'product', // 使用正确的文章类型
                        'post_status' => 'publish',
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'posts_per_page' => 4,
                        'paged' => $current_page,
                    );

                    // 如果有当前分类，添加分类查询
                    if ($current_term_id) {
                        $args['tax_query'] = array(
                            array(
                                'taxonomy' => 'product_category',
                                'field'    => 'term_id',
                                'terms'    => $current_term_id,
                            ),
                        );
                    }

                    // 执行查询
                    $query = new WP_Query($args);
                    $max_page = $query->max_num_pages;
                    ?>

                    <div class="pmain-right bg-white pt-70 px-60 pb-100">
                        <!-- 400*480 -->

                        <?php if ($query->have_posts()): ?>
                            <ul class="list-products flex flex-wrap gap-x-40 gap-y-60">
                                <?php while ($query->have_posts()) : $query->the_post(); ?>

                                    <?php
                                    $list_subtitle = carbon_get_the_post_meta('list_subtitle');
                                    $list_image = carbon_get_the_post_meta('list_image');
                                    $buy_link = carbon_get_the_post_meta('buy_link');
                                    ?>
                                    <li>
                                        <div class="pro-item text-20">
                                            <a href="<?php the_permalink() ?>">
                                                <div class="pro-item__img img-box overflow-hidden">
                                                    <?php if ($list_image): ?>
                                                        <img src="<?php echo wp_get_attachment_url($list_image) ?>" alt="<?php the_title(); ?>">
                                                    <?php elseif (has_post_thumbnail()): ?>
                                                        <?php the_post_thumbnail('medium', array('alt' => get_the_title())); ?>
                                                    <?php endif ?>
                                                </div>
                                                <h3 class="font-500 mt-20 line-clamp-1"><?php the_title() ?></h3>
                                                <p class="text-gray font-400"><?php echo $list_subtitle ?></p>
                                            </a>
                                            <div class="flex flex-wrap gap-x-5 mt-5 hidden">
                                                <a href="<?php the_permalink() ?>" class="pro-item__link inline-flex pl-10 pr-5 gap-x-5 items-center text-gray border leading-14 hover:text-red transition-colors">
                                                    <span>More</span>
                                                    <svg>
                                                        <use xlink:href="#icon-more"></use>
                                                    </svg>
                                                </a>
                                                <?php if ($buy_link): ?>
                                                    <a href="<?php echo $buy_link ?>" class="pro-item__link inline-flex pl-10 pr-5 gap-x-5 items-center text-gray border leading-14 hover:text-red transition-colors">
                                                        <span>Buy</span>
                                                        <svg>
                                                            <use xlink:href="#icon-more"></use>
                                                        </svg>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </li>

                                <?php endwhile; ?>
                            </ul>
                        <?php else: ?>
                            <div class="no-products text-center py-60">
                                <p class="text-24 text-gray">No products found.</p>
                            </div>
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