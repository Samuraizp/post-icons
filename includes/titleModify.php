<?php
/**
 * Created by PhpStorm.
 * User: Samurai
 * Date: 21.11.2017
 * Time: 16:45
 */

add_filter( 'the_title', 'my_modify_title', 10, 2 );

function my_modify_title( $title, $id ) {
	$position = get_option('post_title_icon_position');
	$icon = get_option('post_title_icon');
	if (isset($icon)){
		if ($position == 'left'){
			$title = '<span class="dashicons '.$icon.'"></span>'.$title;
		}else{
			$title = $title.'<span class="dashicons '.$icon.'"></span>' ;
		}
	}
	return $title;
}
