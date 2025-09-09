<style>
    .suma-main {
        padding-right: 20px;
    }

    .wp-list-table {
        margin-top: 15px;
    }
</style>

<main class="suma-main">
    <h1 class="page-title"> 用户浏览日志 </h1>
    <form method="GET" action="<?php echo admin_url('admin.php'); ?>">
        <input type="hidden" name="page" value="<?php echo esc_attr($_GET['page']); ?>" />

        <label for="start_date">起始日期:</label>
        <input type="date" name="start_date" id="start_date" value="<?php echo $start_date; ?>">

        <label for="end_date">结束日期:</label>
        <input type="date" name="end_date" id="end_date" value="<?php echo $end_date; ?>">

        <input type="submit" class="button" value="筛选">

        <input type="button" class="button" id="btn-export" value="导出">
    </form>

    <table class="wp-list-table widefat striped">
        <thead>
            <tr>
                <th scope="col">记录ID</th>
                <th scope="col">用户</th>
                <th scope="col">页面标题</th>
                <th scope="col">页面链接</th>
                <th scope="col">浏览时间</th>
                <th scope="col">浏览时长(秒)</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($results as $record) : ?>
                <tr>
                    <td><?php echo $record['id']; ?></td>
                    <td>
                        <strong>(ID:<?php echo $record['user_id']; ?>)</strong>
                        <?php echo $record['user_email']; ?>
                    </td>
                    <td><?php echo $record['page_title']; ?></td>
                    <td><?php echo $record['page_url']; ?></td>
                    <td><?php echo $record['visit_time']; ?></td>
                    <td><?php echo $record['duration']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php
    // 显示分页导航
    if ($total_pages > 1) {
        $page_links = paginate_links(array(
            'base' => add_query_arg('paged', '%#%'),
            'format' => '',
            'prev_text' => __('&laquo; Previous'),
            'next_text' => __('Next &raquo;'),
            'total' => $total_pages,
            'current' => $current_page
        ));

        if ($page_links) {
            echo '<div class="tablenav"><div class="tablenav-pages">' . $page_links . '</div></div>';
        }
    }
    ?>
</main>

<script>
    // (function($) {
    //     $("#btn-export").on("click", function() {
    //         // 创建input标签
    //         var $input = $('<input>', {
    //             type: 'hidden',
    //             name: 'action',
    //             value: 'download_view_log_csv',
    //             id: 'action_input'
    //         });

    //         $(this).after($input);
    //         $(this).parent('form').submit();

    //         $("#action_input").remove();
    //     })
    // })(jQuery);
</script>