<?php

/**
 * 注册自定义分类法 - Product
 * 单个产品URL: products/产品名称
 * 分类URL: products-category/分类名称
 */

// 注册产品分类法
function register_product_taxonomy()
{
    // 设置标签
    $labels = array(
        'name'                       => 'Product Categories',
        'singular_name'              => 'Product Category',
        'menu_name'                  => 'Product Categories',
        'all_items'                  => 'All Product Categories',
        'parent_item'                => 'Parent Category',
        'parent_item_colon'          => 'Parent Category:',
        'new_item_name'              => 'New Category Name',
        'add_new_item'               => 'Add New Category',
        'edit_item'                  => 'Edit Category',
        'update_item'                => 'Update Category',
        'view_item'                  => 'View Category',
        'separate_items_with_commas' => 'Separate categories with commas',
        'add_or_remove_items'        => 'Add or remove categories',
        'choose_from_most_used'      => 'Choose from the most used',
        'popular_items'              => 'Popular Categories',
        'search_items'               => 'Search Categories',
        'not_found'                  => 'No categories found',
        'no_terms'                   => 'No categories',
        'items_list'                 => 'Categories list',
        'items_list_navigation'      => 'Categories list navigation',
    );

    // 设置参数
    $args = array(
        'labels'                => $labels,
        'hierarchical'          => true,  // 设置为层级结构（类似分类）
        'public'                => true,  // 公开可见
        'show_ui'               => true,  // 在后台显示界面
        'show_admin_column'     => true,  // 在管理列表中显示列
        'show_in_nav_menus'     => true,  // 在导航菜单中显示
        'show_tagcloud'         => true,  // 在标签云中显示
        'show_in_rest'          => true,  // 在REST API中显示（Gutenberg编辑器需要）
        'show_in_quick_edit'    => true,  // 在快速编辑中显示
        'query_var'             => true,  // 启用查询变量
        'rewrite'               => array(
            'slug'         => 'products-category',  // 分类URL slug
            'with_front'   => false,                // 不使用前缀
            'hierarchical' => true,                 // 启用层级URL
        ),
        'capabilities'          => array(
            'manage_terms' => 'manage_categories',
            'edit_terms'   => 'manage_categories',
            'delete_terms' => 'manage_categories',
            'assign_terms' => 'edit_posts',
        ),
    );

    // 注册分类法（关联到产品文章类型）
    register_taxonomy('product_category', array('product'), $args);
}
add_action('init', 'register_product_taxonomy', 0);

// 注册自定义文章类型 - Product
function register_product_post_type()
{
    // 设置标签
    $labels = array(
        'name'                  => 'Products',
        'singular_name'         => 'Product',
        'menu_name'             => 'Products',
        'name_admin_bar'        => 'Product',
        'archives'              => 'Product Archives',
        'attributes'            => 'Product Attributes',
        'parent_item_colon'     => 'Parent Product:',
        'all_items'             => 'All Products',
        'add_new_item'          => 'Add New Product',
        'add_new'               => 'Add New',
        'new_item'              => 'New Product',
        'edit_item'             => 'Edit Product',
        'update_item'           => 'Update Product',
        'view_item'             => 'View Product',
        'view_items'            => 'View Products',
        'search_items'          => 'Search Products',
        'not_found'             => 'Not found',
        'not_found_in_trash'    => 'Not found in Trash',
        'featured_image'        => 'Featured Image',
        'set_featured_image'    => 'Set featured image',
        'remove_featured_image' => 'Remove featured image',
        'use_featured_image'    => 'Use as featured image',
        'insert_into_item'      => 'Insert into product',
        'uploaded_to_this_item' => 'Uploaded to this product',
        'items_list'            => 'Products list',
        'items_list_navigation' => 'Products list navigation',
        'filter_items_list'     => 'Filter products list',
    );

    // 设置参数
    $args = array(
        'label'                 => 'Product',
        'description'           => 'Product Post Type',
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail', 'excerpt', 'comments', 'custom-fields'),
        'taxonomies'            => array('product_category'),  // 关联产品分类
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 20,
        'menu_icon'             => 'dashicons-products',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => 'products',  // 产品归档页面
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'show_in_rest'          => true,  // Gutenberg编辑器支持
        'rewrite'               => array(
            'slug'       => 'products',     // 产品URL slug
            'with_front' => false,
        ),
        'capability_type'       => 'post',
    );

    // 注册文章类型
    register_post_type('product', $args);
}
add_action('init', 'register_product_post_type', 0);
