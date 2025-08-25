<?php 
	session_start();
//Create the rating interface.
add_action( 'comment_form_logged_in_after', 'turio_comment_rating_rating_field' );
add_action( 'comment_form_after_fields', 'turio_comment_rating_rating_field' );

function turio_comment_rating_rating_field () {
	$_SESSION["get_post_id"] = get_the_ID();
	$criteria_info = get_post_meta( get_the_ID(), 'turio_criteria_options', true );
	?>
	<?php  
		if (!empty($criteria_info)) { ?>
			<div class="comment-rating-wrapper">
				<?php for ($x = 1; $x <= 5; $x++) { ?>
					<?php if($criteria_info["criteria_{$x}_switcher"] == 1) : ?>
						<div class="comment-rating">
							<?php
								if(!empty($criteria_info['criteria_'.$x.'_text'])) : 
							?>
							<label for="rating"><?php Egns_Helpers::turio_translate_with_escape_( $criteria_info['criteria_'.$x.'_text'] ); ?> <span class="required"><?php echo esc_html('*') ?></span></label>
							<?php endif ?>
							<fieldset class="turio-comments-rating">
								<span class="star-cb-group">
									<?php for ( $i = 5; $i >= 1; $i-- ) : ?>
										<input type="radio" id="rating-criteria-<?php echo esc_attr( $x ); ?>-<?php echo esc_attr( $i ); ?>" name="turio_rating_criteria_<?php echo esc_attr( $x ) ?>" value="<?php echo esc_attr( $i ); ?>" />
										<label for="rating-criteria-<?php echo esc_attr( $x )  ?>-<?php echo esc_attr( $i ); ?>"><?php echo esc_html( $i ); ?> </label>
									<?php endfor; ?>
								</span>
							</fieldset>
						</div>
					<?php endif ?>
			
				<?php	}
				?>
			</div>
			<?php
		}
	?> 
	<?php
}

//Save the rating submitted by the user.
add_action( 'comment_post', 'turio_comment_rating_save_comment_rating' );

function turio_comment_rating_save_comment_rating( $comment_id ) {
	$criteria_info = get_post_meta( $_SESSION["get_post_id"], 'turio_criteria_options', true );
	if( !empty( $criteria_info ) ){
		for ($x=1; $x <= 5; $x++) { 
			if ($criteria_info["criteria_{$x}_switcher"] == 1) {
				if ( ( isset( $_POST["turio_rating_criteria_$x"] ) ) && ( '' !== $_POST["turio_rating_criteria_$x"] ) )
				$rating = intval( $_POST["turio_rating_criteria_$x"] );
				add_comment_meta( $comment_id, "turio_rating_criteria_$x",$rating);
			}else{
				add_comment_meta( $comment_id,"turio_rating_criteria_$x",0);
			}
		}
		session_unset();
		session_destroy();
	}


}

//Display the rating on a submitted comment.
add_filter( 'comment_text', 'turio_comment_rating_display_rating');
function turio_comment_rating_display_rating( $comment_text ){
	$criteria_info = get_post_meta( get_the_ID(), 'turio_criteria_options', true );
	$rating = 0;
	$loop_count = 0;
	for ($x=1; $x <= 5; $x++) { 
		if (isset($criteria_info["criteria_{$x}_switcher"]) == 1) {
			$rating += is_numeric(get_comment_meta(get_comment_ID(),"turio_rating_criteria_$x", true)) ? get_comment_meta(get_comment_ID(),"turio_rating_criteria_$x", true) : 0;
			$loop_count++;
		}
	}
	if(!$loop_count == 0){
		$rating = round($rating/$loop_count);
	}
	if ( $rating > 0 ) {
		$stars = '<p class="stars">';
		for ( $i = 1; $i <= $rating; $i++ ) {
			$stars .= '<i class="bx bxs-star"></i>';
		}
		$stars .= '</p>';
		$comment_text = $comment_text . $stars;
		return $comment_text;
	} else {
		return $comment_text;
	}


}
