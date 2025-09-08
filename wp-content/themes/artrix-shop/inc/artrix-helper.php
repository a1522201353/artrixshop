<?php

/**
 * artrix Helper functions
 */

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (! function_exists('artrix_url_default')) {
    function artrix_url_default($url = '')
    {
        if (filter_var($url, FILTER_VALIDATE_URL) !== false) {
            return $url;
        }

        return "javascript:;";
    }
}

if (! function_exists('artrix_object_to_array')) {

    /**
     * Object To Array
     *
     * @param object $obj
     * @return array
     */
    function artrix_object_to_array($obj)
    {
        $obj = (array)$obj;
        foreach ($obj as $k => $v) {
            if (gettype($v) == 'resource') {
                return;
            }
            if (gettype($v) == 'object' || gettype($v) == 'array') {
                $obj[$k] = (array)artrix_object_to_array($v);
            }
        }

        return $obj;
    }
}

if (! function_exists('artrix_get_attachment_image_src')) {
    function artrix_get_attachment_image_src($image_data)
    {
        return $image_data[0] ?? '';
    }
}

if (! function_exists('artrix_build_tree')) {
    function artrix_build_tree(&$elements, $parentId = 0)
    {
        if (!is_array($elements)) {
            return false;
        }

        $branch = array();
        foreach ($elements as &$element) {
            if ($element->menu_item_parent == $parentId) {
                $children = artrix_build_tree($elements, $element->ID);
                if ($children)
                    $element->suma_children = $children;

                $branch[$element->ID] = $element;
                unset($element);
            }
        }
        return $branch;
    }
}


if (! function_exists('artrix_build_trem_tree')) {
    function artrix_build_trem_tree(&$elements, $parentId = 0)
    {
        if (!is_array($elements)) {
            return false;
        }

        $branch = array();
        foreach ($elements as &$element) {
            if ($element->parent == $parentId) {
                $children = artrix_build_trem_tree($elements, $element->term_id);
                if ($children)
                    $element->suma_children = $children;

                $branch[$element->term_id] = $element;
                unset($element);
            }
        }
        return $branch;
    }
}

if (! function_exists('wp_is_mobile')) {
    function wp_is_mobile()
    {
        if (empty($_SERVER['HTTP_USER_AGENT'])) {
            $is_mobile = false;
        } elseif (
            strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false // Many mobile devices (all iPhone, iPad, etc.)
            || strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false
            || strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false
            || strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false
            || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false
            || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false
            || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mobi') !== false
        ) {
            $is_mobile = true;
        } else {
            $is_mobile = false;
        }

        return $is_mobile;
    }
}


if (! function_exists('csv_export')) {

    /**
     * 导出文件为excel
     *
     * @Author Feng
     * @DateTime 2020-10-17
     * @version 2.0
     * @param array $data
     * @param array $headlist
     * @param string $fileName
     * @return void
     */
    function csv_export($data = array(), $headlist = array(), $fileName)
    {
        header_remove();
        ob_end_clean();

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $fileName . '.xlsx"');
        header('Cache-Control: max-age=0'); // ember cache
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $i = 65;
        if (count($headlist) > 26) {
            return '';
        }
        foreach ($headlist as $key => $head) {
            $excelKey = strtoupper(chr($i)) . '1';
            $spreadsheet->setActiveSheetIndex(0)->setCellValue($excelKey, $head);
            $sheet->getColumnDimension(strtoupper(chr($i)))->setAutoSize(true);
            $i++;
        }

        $startColumn  = 65;
        $startRow = 2;
        foreach ($data as $key => $value) {
            $currentColumn = $startColumn;
            foreach ($value as $k => $v) {
                $str = strtoupper(chr($currentColumn));
                $sheet->setCellValue($str . $startRow, $v);
                $currentColumn++;
            }
            $startRow++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');

        // var_dump(file_get_contents('php://output'));
        // exit;

        ob_end_clean();
        exit;
    }
}


if (!function_exists('get_page_id_from_template')) {
    function get_page_id_from_template($template)
    {
        global $wpdb;

        // 
        $page_id = $wpdb->get_var($wpdb->prepare("SELECT `post_id` 
                                   FROM `$wpdb->postmeta`, `$wpdb->posts`
                                   WHERE `post_id` = `ID`
                                         AND `post_status` = 'publish'
                                         AND `meta_key` = '_wp_page_template'
                                         AND `meta_value` = %s
                                         LIMIT 1;", $template));

        return $page_id;
    }
}


if (!function_exists('artrix_paginate_links')) {
    function artrix_paginate_links($args = '')
    {
        global $wp_rewrite, $query;

        // Setting up default values based on the current URL.
        $pagenum_link = html_entity_decode(get_pagenum_link());
        $url_parts    = explode('?', $pagenum_link);

        // Get max pages and current page out of the current query, if available.
        $total   = isset($query->max_num_pages) ? $query->max_num_pages : 1;
        // $current = isset( $_GET['suma_page'] ) ? (int)$_GET['suma_page'] : 1;
        $current = isset($_GET['page_num']) ? (int)$_GET['page_num'] : 1;

        // Append the format placeholder to the base URL.
        $pagenum_link = trailingslashit($url_parts[0]) . '%_%';

        // URL base depends on permalink settings.
        $format  = $wp_rewrite->using_index_permalinks() && ! strpos($pagenum_link, 'index.php') ? 'index.php/' : '';
        // $format .= '?suma_page=%#%';
        $format .= '?page_num=%#%';
        $defaults = array(
            'base'               => $pagenum_link, // http://example.com/all_posts.php%_% : %_% is replaced by format (below).
            'format'             => $format, // ?page=%#% : %#% is replaced by the page number.
            'total'              => $total,
            'current'            => $current,
            'aria_current'       => 'page',
            'show_all'           => false,
            'prev_next'          => true,
            'prev_text'          => __('&laquo; Previous'),
            'next_text'          => __('Next &raquo;'),
            'end_size'           => 1,
            'mid_size'           => 2,
            'type'               => 'plain',
            'add_args'           => array(), // Array of query args to add.
            'add_fragment'       => '',
            'before_page_number' => '',
            'after_page_number'  => '',
        );

        $args = wp_parse_args($args, $defaults);

        if (! is_array($args['add_args'])) {
            $args['add_args'] = array();
        }

        // Merge additional query vars found in the original URL into 'add_args' array.
        if (isset($url_parts[1])) {
            // Find the format argument.
            $format       = explode('?', str_replace('%_%', $args['format'], $args['base']));
            $format_query = isset($format[1]) ? $format[1] : '';
            wp_parse_str($format_query, $format_args);

            // Find the query args of the requested URL.
            wp_parse_str($url_parts[1], $url_query_args);

            // Remove the format argument from the array of query arguments, to avoid overwriting custom format.
            foreach ($format_args as $format_arg => $format_arg_value) {
                unset($url_query_args[$format_arg]);
            }

            $args['add_args'] = array_merge($args['add_args'], urlencode_deep($url_query_args));
        }

        // Who knows what else people pass in $args.
        $total = (int) $args['total'];
        if ($total < 2) {
            return;
        }
        $current  = (int) $args['current'];
        $end_size = (int) $args['end_size']; // Out of bounds? Make it the default.
        if ($end_size < 1) {
            $end_size = 1;
        }
        $mid_size = (int) $args['mid_size'];
        if ($mid_size < 0) {
            $mid_size = 2;
        }

        $add_args   = $args['add_args'];
        $r          = '';
        $page_links = array();
        $dots       = false;

        if ($args['prev_next'] && $current && 1 < $current) :
            $link = str_replace('%_%', 2 == $current ? '' : $args['format'], $args['base']);
            $link = str_replace('%#%', $current - 1, $link);
            if ($add_args) {
                $link = add_query_arg($add_args, $link);
            }
            $link .= $args['add_fragment'];


            $page_links[] = sprintf(
                '<a href="%s" class="pager-prev">
                <svg>
                    <use xlink:href="#icon-left"></use>
                </svg>
                </a>',
                /**
                 * Filters the paginated links for the given archive pages.
                 *
                 * @since 3.0.0
                 *
                 * @param string $link The paginated link URL.
                 */
                esc_url(apply_filters('paginate_links', $link)),
            );
        endif;
        for ($n = 1; $n <= $total; $n++) :
            if ($n == $current) :
                $page_links[] = sprintf(
                    '<a href="javaScript:void(0);" class="pager-link text-16 current">%s</a>',
                    // esc_attr( $args['aria_current'] ),
                    $args['before_page_number'] . number_format_i18n($n) . $args['after_page_number']
                );
                $dots = true;
            else :
                if ($args['show_all'] || ($n <= $end_size || ($current && $n >= $current - $mid_size && $n <= $current + $mid_size) || $n > $total - $end_size)) :
                    $link = str_replace('%_%', 1 == $n ? '' : $args['format'], $args['base']);
                    $link = str_replace('%#%', $n, $link);
                    if ($add_args) {
                        $link = add_query_arg($add_args, $link);
                    }
                    $link .= $args['add_fragment'];

                    $page_links[] = sprintf(
                        '<a href="%s" class="pager-link text-16">%s</a>',
                        /** This filter is documented in wp-includes/general-template.php */
                        esc_url(apply_filters('paginate_links', $link)),
                        $args['before_page_number'] . number_format_i18n($n) . $args['after_page_number']
                    );

                    $dots = true;
                elseif ($dots && ! $args['show_all']) :
                    // $page_links[] = '<span class="num fz-20 black50 dots">···</span>';
                    $page_links[] = '···';

                    $dots = false;
                endif;
            endif;
        endfor;

        if ($args['prev_next'] && $current && $current < $total) :
            $link = str_replace('%_%', $args['format'], $args['base']);
            $link = str_replace('%#%', $current + 1, $link);
            if ($add_args) {
                $link = add_query_arg($add_args, $link);
            }
            $link .= $args['add_fragment'];

            $page_links[] = sprintf(
                ' <a href="%s" class="pager-next">
                <svg>
                    <use xlink:href="#icon-right"></use>
                </svg>
                </a>',
                /** This filter is documented in wp-includes/general-template.php */
                esc_url(apply_filters('paginate_links', $link)),
            );
        endif;

        $r .= sprintf('<div class="pager flex flex-wrap justify-center items-start mt-80">%s</div>', implode('', $page_links));

        /**
         * Filters the HTML output of paginated links for archives.
         *
         * @since 5.7.0
         *
         * @param string $r    HTML output.
         * @param array  $args An array of arguments. See paginate_links()
         *                     for information on accepted arguments.
         */
        $r = apply_filters('paginate_links_output', $r, $args);

        return $r;
    }
}


if (!function_exists('real_ip')) {
    /**
     * 获得用户的真实IP地址
     *
     * @access  public
     * @return  string
     */
    function real_ip()
    {
        static $realip = null;
        if ($realip !== null) {
            return $realip;
        }
        if (isset($_SERVER)) {
            if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
                /* 取X-Forwarded-For中第一个非unknown的有效IP字符串 */
                foreach ($arr as $ip) {
                    $ip = trim($ip);
                    if ($ip != 'unknown') {
                        $realip = $ip;
                        break;
                    }
                }
            } elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
                $realip = $_SERVER['HTTP_CLIENT_IP'];
            } else {
                if (isset($_SERVER['REMOTE_ADDR'])) {
                    $realip = $_SERVER['REMOTE_ADDR'];
                } else {
                    $realip = '0.0.0.0';
                }
            }
        } else {
            if (getenv('HTTP_X_FORWARDED_FOR')) {
                $realip = getenv('HTTP_X_FORWARDED_FOR');
            } elseif (getenv('HTTP_CLIENT_IP')) {
                $realip = getenv('HTTP_CLIENT_IP');
            } else {
                $realip = getenv('REMOTE_ADDR');
            }
        }
        preg_match("/[\d\.]{7,15}/", $realip, $onlineip);
        $realip = !empty($onlineip[0]) ? $onlineip[0] : '0.0.0.0';
        return $realip;
    }
}
