<?php
/**
 * Created by PhpStorm.
 * User: Samurai
 * Date: 21.11.2017
 * Time: 16:42
 */
?>

<?php
$cpt_name = 'any';

if (!empty($_GET['pag']) && is_numeric($_GET['pag'])) {
    $paged = $_GET['pag'];
} else {
    $paged = 1;
}
$posts_per_page = (get_option('posts_per_page')) ? get_option('posts_per_page') : 10;

$args = array(
    'posts_per_page' => -1,
    'orderby' => 'title',
    'order' => 'ASC',
    'fields' => 'ids',
    'post_type' => $cpt_name
);

$all_posts = get_posts($args);
$post_count = count($all_posts);

$num_pages = ceil($post_count / $posts_per_page);

if ($paged > $num_pages || $paged < 1) {
    $paged = $num_pages;
}

$args = array(
    'posts_per_page' => $posts_per_page,
    'orderby' => 'title',
    'order' => 'ASC',
    'post_type' => $cpt_name,
    'paged' => $paged
);

$my_posts = get_posts($args);
?>

<div class="wrap">
    <h1>Post icons</h1>

    <form method="post" action="options.php">
        <?php settings_fields('my-cool-plugin-settings-group'); ?>
        <?php do_settings_sections('my-cool-plugin-settings-group'); ?>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">New Option Name</th>
                <?php if (!empty($my_posts)) {

                    echo '<div id="my-posts-wrapper">';
                    foreach ($my_posts as $key => $my_post) {
                        echo '<tr><td><input type="checkbox" name="post_icon_meta[postlink]" id="' . $my_post->ID . '" ';
                        checked($my_post->post_icon_meta);
                        echo '"></td>
                            <td><div class="my-post">' . $my_post->post_title . '</div></td></tr>';

                    }

                    echo '</div>';

                    if ($post_count > $posts_per_page) {

                        echo '<tr><td><div class="pagination">
                        <td>';
                        if ($paged > 1) {
                            echo '<a class="first" href="?page=post-icons&pag=1">&laquo;</a>';
                        } else {
                            echo '<span class="first">&laquo;</span>';
                        }
                        echo '</td><td>';
                        for ($p = 1; $p <= $num_pages; $p++) {
                            echo '</td><td>';
                            if ($paged == $p) {
                                echo '<span class="current">' . $p . '</span>';
                            } else {
                                echo '<a href="?page=post-icons&pag=' . $p . '">' . $p . '</a>';
                            }
                        }
                        echo '</td><td>';
                        if ($paged < $num_pages) {
                            echo '<a class="last" href="?page=post-icons&pag=' . $num_pages . '">&raquo;</a>';
                        } else {
                            echo '<span class="last">&raquo;</span>';
                        }
                        echo '</td>';
                        echo '</div></td></tr>';
                    }
                } ?>
            </tr>

            <tr valign="top">
                <th scope="row">Icon</th>
                <td><input type='text' id='dashicons_picker_1' name='post_title_icon'
                           value='<?php echo esc_attr(get_option('post_title_icon')); ?>'>
                    <input type='button' data-target='#dashicons_picker_1' class='button dashicons-picker'
                           value='Choose Icon'></td>
            </tr>

            <tr valign="top">
                <th scope="row">Position</th>
                <?php $options = get_option('post_title_icon_position'); ?>
                <td>left <input type="radio" name="post_title_icon_position"
                                value="left"<?php checked('left' == $options); ?> />
                    right <input type="radio" name="post_title_icon_position"
                                 value="right"<?php checked('right' == $options); ?> /></td>
            </tr>
        </table>

        <?php submit_button(); ?>

    </form>
</div>



