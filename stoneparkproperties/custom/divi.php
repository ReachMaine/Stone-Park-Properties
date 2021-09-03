<?php /* divi */
// add do_shortcode to footer credits
if ( ! function_exists( 'et_get_footer_credits' ) ) {
  function et_get_footer_credits() {
  	$original_footer_credits = et_get_original_footer_credits();

  	$disable_custom_credits = et_get_option( 'disable_custom_footer_credits', false );

  	if ( $disable_custom_credits ) {
  		return '';
  	}

  	$credits_format = '<%2$s id="footer-info">%1$s</%2$s>';

  	$footer_credits = et_get_option( 'custom_footer_credits', '' );

  	if ( '' === trim( $footer_credits ) ) {
  		return et_get_safe_localization( sprintf( $credits_format, $original_footer_credits, 'p' ) );
  	}
    $footer_credits = do_shortcode($footer_credits);
  	return et_get_safe_localization( sprintf( $credits_format, $footer_credits, 'div' ) );
  }
}

/*hide buttons for return to standard editor or default editor
founder here... https://www.peeayecreative.com/how-to-hide-the-gutenberg-and-standard-editor-buttons-in-divi/*/

/*hide the Return To Standard Editor button and adjust button left margin*/
add_action('admin_head', 'pa_hide_standard_editor_button');
function pa_hide_standard_editor_button() {

  echo '<style>
       .et-db #et-boc .et-l #et_pb_toggle_builder.et_pb_builder_is_used { display: none; }
       .et-db #et-boc .et-l #et_pb_fb_cta { margin-left: 0; }
    </style>';
}
/*hide the Return To Default Editor button nad hide the Use Default Editor button*/
add_action('admin_head', 'pa_hide_default_editor_button');
function pa_hide_default_editor_button() {

  echo '<style>
    .block-editor__container .editor-post-switch-to-gutenberg.components-button.is-default {display: none; }
    .block-editor__container #et-switch-to-gutenberg, .block-editor__container #et-switch-to-gutenberg.components-button.is-default {   display: none; }
  </style>';
}
