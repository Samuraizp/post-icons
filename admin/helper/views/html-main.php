<?php

?>

<div class="wrap">
    <h1>Post icons</h1>

    <form method="post" action="options.php">
		<?php settings_fields('picons-settings-group'); ?>
		<?php do_settings_sections('picons-settings-group'); ?>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Show icon</th>
                <td><input type='checkbox' id='picons_visible' name='picons_visible' value="1"
                           <?php checked(get_option('picons_visible'),1)?>>
            </tr>
            <tr valign="top">
                <th scope="row">New Option Name</th>
				<?php if (!empty($my_posts))
				{

					echo '<div id="my-posts-wrapper">';
					foreach ($my_posts as $key => $my_post)
					{
						echo '<tr><td><input type="checkbox" id="' . $my_post->ID . '" ';
						checked($my_post->post_icon_meta);
						echo '"></td>
                            <td><div class="my-post">' . $my_post->post_title . '</div></td></tr>';

					}

					echo '</div>';

					if ($post_count > $posts_per_page)
					{
						include(PI_Helper::getViewFilename('html-pagination.php'));
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