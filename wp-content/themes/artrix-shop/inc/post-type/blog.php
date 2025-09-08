<?php

/**
 * 注册自定义文章类型：博客
 * 这个函数创建一个名为 'blog' 的自定义文章类型
 */
function suma_blog_post_type()
{

    // 定义文章类型的标签（用于后台显示的各种文本）
    $labels = array(
        'name'                  => _x('Blog', 'Post Type General Name', 'text_domain'), // 复数形式的通用名称
        'singular_name'         => _x('blog', 'Post Type Singular Name', 'text_domain'), // 单数形式的名称
        'menu_name'             => __('Blog', 'text_domain'), // 在管理菜单中显示的名称
        'name_admin_bar'        => __('Blog', 'text_domain'), // 在管理栏中显示的名称
        'archives'              => __('Item Archives', 'text_domain'), // 归档页面标题
        'attributes'            => __('Item Attributes', 'text_domain'), // 属性元框标题
        'parent_item_colon'     => __('Parent Item:', 'text_domain'), // 父项目标签（层级结构时使用）
        'all_items'             => __('All Items', 'text_domain'), // "所有项目"菜单文本
        'add_new_item'          => __('Add New Item', 'text_domain'), // "添加新项目"页面标题
        'add_new'               => __('Add New', 'text_domain'), // "添加新"按钮文本
        'new_item'              => __('New Item', 'text_domain'), // "新项目"文本
        'edit_item'             => __('Edit Item', 'text_domain'), // "编辑项目"页面标题
        'update_item'           => __('Update Item', 'text_domain'), // "更新项目"按钮文本
        'view_item'             => __('View Item', 'text_domain'), // "查看项目"链接文本
        'view_items'            => __('View Items', 'text_domain'), // "查看项目"（复数）文本
        'search_items'          => __('Search Item', 'text_domain'), // "搜索项目"按钮文本
        'not_found'             => __('Not found', 'text_domain'), // 没找到项目时的文本
        'not_found_in_trash'    => __('Not found in Trash', 'text_domain'), // 回收站中没找到项目时的文本
        'featured_image'        => __('Featured Image', 'text_domain'), // 特色图片标签
        'set_featured_image'    => __('Set featured image', 'text_domain'), // "设置特色图片"文本
        'remove_featured_image' => __('Remove featured image', 'text_domain'), // "移除特色图片"文本
        'use_featured_image'    => __('Use as featured image', 'text_domain'), // "用作特色图片"文本
        'insert_into_item'      => __('Insert into item', 'text_domain'), // "插入到项目中"文本
        'uploaded_to_this_item' => __('Uploaded to this item', 'text_domain'), // "上传到此项目"文本
        'items_list'            => __('Items list', 'text_domain'), // 项目列表文本
        'items_list_navigation' => __('Items list navigation', 'text_domain'), // 项目列表导航文本
        'filter_items_list'     => __('Filter items list', 'text_domain'), // "过滤项目列表"文本
    );

    // 文章类型的参数配置
    $args = array(
        'label'                 => __('blog', 'text_domain'), // 文章类型的标签
        'description'           => __('Post Type Description', 'text_domain'), // 文章类型的描述
        'labels'                => $labels, // 使用上面定义的标签数组
        'show_in_rest'          => false, // 是否在 REST API 中显示（false = 不支持 Gutenberg 编辑器）
        'supports'              => array('title', 'revisions', 'post-formats', 'editor', 'excerpt', 'page-attributes'), // 支持的功能
        // 'title' - 标题字段
        // 'revisions' - 修订版本
        // 'post-formats' - 文章格式
        // 'editor' - 内容编辑器
        // 'excerpt' - 摘要
        'taxonomies'            => array(''), // 关联的分类法（这里为空）
        'hierarchical'          => false, // 是否为层级结构（false = 类似文章，true = 类似页面）
        'public'                => true, // 是否公开可见
        'show_ui'               => true, // 是否在后台显示管理界面
        'show_in_menu'          => true, // 是否在后台菜单中显示
        'menu_position'         => 6, // 在管理菜单中的位置（5-文章后面，10-媒体后面，15-链接后面等）
        'show_in_admin_bar'     => true, // 是否在管理栏中显示"新建"链接
        'show_in_nav_menus'     => true, // 是否可在导航菜单中选择
        'can_export'            => true, // 是否可以导出
        'has_archive'           => false, // 是否有归档页面
        'exclude_from_search'   => false, // 是否从搜索结果中排除
        'publicly_queryable'    => true, // 是否允许前端查询
        'capability_type'       => 'post', // 权限类型（使用文章的权限设置）
        // 'rewrite'               => array('slug' => 'company/company-news'), // 自定义 URL 重写规则（已注释）
    );

    // 注册文章类型
    register_post_type('blog', $args);
}

// 将函数挂载到 WordPress 的 'init' 钩子上，优先级为 0
add_action('init', 'suma_blog_post_type', 0);


/**
 * 注册自定义分类法：博客分类
 * 这个函数为 'blog' 文章类型创建一个名为 'blog-categories' 的分类法
 */
function blog_taxonomy()
{

    // 定义分类法的标签（用于后台显示的各种文本）
    $labels = array(
        'name'                       => _x('Blog Categories', 'Taxonomy General Name', 'text_domain'), // 复数形式的通用名称
        'singular_name'              => _x('blog', 'Category Singular Name', 'text_domain'), // 单数形式的名称
        'menu_name'                  => __('Blog Categories', 'text_domain'), // 在管理菜单中显示的名称
        'all_items'                  => __('All Items', 'text_domain'), // "所有项目"文本
        'parent_item'                => __('Parent Item', 'text_domain'), // 父项目文本
        'parent_item_colon'          => __('Parent Item:', 'text_domain'), // 带冒号的父项目文本
        'new_item_name'              => __('New Item Name', 'text_domain'), // "新项目名称"文本
        'add_new_item'               => __('Add New Item', 'text_domain'), // "添加新项目"文本
        'edit_item'                  => __('Edit Item', 'text_domain'), // "编辑项目"文本
        'update_item'                => __('Update Item', 'text_domain'), // "更新项目"文本
        'view_item'                  => __('View Item', 'text_domain'), // "查看项目"文本
        'separate_items_with_commas' => __('Separate items with commas', 'text_domain'), // "用逗号分隔项目"文本
        'add_or_remove_items'        => __('Add or remove items', 'text_domain'), // "添加或移除项目"文本
        'choose_from_most_used'      => __('Choose from the most used', 'text_domain'), // "从最常用的中选择"文本
        'popular_items'              => __('Popular Items', 'text_domain'), // "热门项目"文本
        'search_items'               => __('Search Items', 'text_domain'), // "搜索项目"文本
        'not_found'                  => __('Not Found', 'text_domain'), // "未找到"文本
        'no_terms'                   => __('No items', 'text_domain'), // "没有项目"文本
        'items_list'                 => __('Items list', 'text_domain'), // 项目列表文本
        'items_list_navigation'      => __('Items list navigation', 'text_domain'), // 项目列表导航文本
    );

    // URL 重写规则配置
    $rewrite = array(
        'slug'                       => 'blog-categories', // URL 中使用的别名
        'with_front'                 => false, // 是否在固定链接前添加前缀
        'hierarchical'               => true, // URL 是否反映层级关系
    );

    // 分类法的参数配置
    $args = array(
        'labels'                     => $labels, // 使用上面定义的标签数组
        'hierarchical'               => true, // 是否为层级结构（true = 类似分类目录，false = 类似标签）
        'public'                     => true, // 是否公开可见
        'show_ui'                    => true, // 是否显示管理界面
        'show_admin_column'          => true, // 是否在文章列表中显示该分类法的列
        'show_in_nav_menus'          => true, // 是否可在导航菜单中选择
        'show_tagcloud'              => true, // 是否可显示为标签云
        'rewrite'                    => $rewrite, // 使用上面定义的重写规则
    );

    // 注册分类法并关联到 'blog' 文章类型
    register_taxonomy('blog-categories', array('blog'), $args);
}

// 将函数挂载到 WordPress 的 'init' 钩子上，优先级为 0
add_action('init', 'blog_taxonomy', 0);
