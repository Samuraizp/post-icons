<?php
/**
 * Created by PhpStorm.
 * User: Samurai
 * Date: 21.11.2017
 * Time: 16:42
 */

?>

<div class="wrap">
	<h1>Post icons</h1>

	<form method="post" action="options.php">
		<?php settings_fields( 'my-cool-plugin-settings-group' ); ?>
		<?php do_settings_sections( 'my-cool-plugin-settings-group' ); ?>
		<table class="form-table">
			<tr valign="top">
			<th scope="row">New Option Name</th>
			<td><input type="text" name="new_option_name" value="<?php echo esc_attr( get_option('new_option_name') ); ?>" /></td>
			</tr>

			<tr valign="top">
			<th scope="row">Icon</th>
			<td><input type='text' id='dashicons_picker_1' name='post_title_icon' value='<?php echo esc_attr( get_option('post_title_icon') ); ?>'>
				<input type='button' data-target='#dashicons_picker_1' class='button dashicons-picker' value='Choose Icon'></td>
			</tr>

			<tr valign="top">
			<th scope="row">Position</th>
			<?php $options = get_option( 'post_title_icon_position' ); ?>
			<td>left <input type="radio" name="post_title_icon_position" value="left"<?php checked( 'left' == $options ); ?> />
				right <input type="radio" name="post_title_icon_position" value="right"<?php checked( 'right' == $options ); ?> /></td>
			</tr>
		</table>

		<?php submit_button();?>

	</form>
</div>