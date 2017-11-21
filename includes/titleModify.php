<?php
/**
 * Created by PhpStorm.
 * User: Samurai
 * Date: 21.11.2017
 * Time: 16:45
 */

function picons_title($title, $id)
{
    $position = get_option('post_title_icon_position');
    $icon = get_option('post_title_icon');
    $show = get_post_meta($id, 'post_icon_meta');
    if ($show) {
        if ($position == 'left') {
            $title = '<p class="dashicons ' . $icon . '"></p>' . $title;
        } else {
            $title = $title . '<p class="dashicons ' . $icon . '"></p>';
        }
    }
    return $title;
}

add_filter('the_title', 'picons_title', 10, 2);
