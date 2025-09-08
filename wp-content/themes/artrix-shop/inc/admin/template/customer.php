<style>
    .suma-main {
        padding-right: 20px;
    }

    .customer-table {
        margin-top: 15px;
    }
</style>

<main class="suma-main">
    <h1 class="page-title"> 用户登录日志 </h1>
    <form method="GET" action="<?php echo admin_url('admin.php'); ?>">
        <input type="hidden" name="page" value="<?php echo esc_attr($_GET['page']); ?>" />

        <label for="start_date">起始日期:</label>
        <input type="date" name="start_date" id="start_date" value="<?php echo $start_date; ?>">

        <label for="end_date">结束日期:</label>
        <input type="date" name="end_date" id="end_date" value="<?php echo $end_date; ?>">

        <input type="submit" class="button" value="筛选">
    </form>

    <table class="customer-table wp-list-table widefat striped">
        <thead>
            <tr>
                <th scope="col">记录ID</th>
                <th scope="col">用户</th>
                <th scope="col">登录时间</th>
                <th scope="col">IP</th>
                <th scope="col">地区</th>
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
                    <td><?php echo $record['login_time']; ?></td>
                    <td><?php echo $record['ip_address']; ?></td>
                    <td><?php echo $record['region']; ?></td>
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