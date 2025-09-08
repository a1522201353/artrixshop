<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('after_setup_theme', function () {
    \Carbon_Fields\Carbon_Fields::boot();
});
add_action('carbon_fields_register_fields', function () {

    // 产品文章类型的自定义字段
    Container::make('post_meta', '产品详情')
        ->where('post_type', '=', 'product')
        ->add_fields(array(
            Field::make('text', 'list_subtitle', '列表副标题')
                ->set_help_text('在产品列表页显示的副标题'),

            Field::make('image', 'list_image', '列表图片')
                ->set_help_text('在产品列表页显示的图片'),

            Field::make('text', 'buy_link', '购买链接')
                ->set_help_text('产品的购买页面链接'),
        ));
});
