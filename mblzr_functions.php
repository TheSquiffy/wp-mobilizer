<?php

/**
 * @package WP-Mobilizer
 * @link http://www.wp-mobilizer.com
 * @copyright Copyright &copy; 2013, Kilukru Media
 * @version: 1.0.1
 */

if (!function_exists('mblzr_activate')) {
	function mblzr_activate() {
	  global $mblzr_activation;
	  $mblzr_activation = true;
	}
}

if (!function_exists('_print_r')) {
	function _print_r( $var ) {
		echo '<pre>';
		print_r( $var );
		echo '</pre>';
	}
}

if (!function_exists('mblzr_update_settings_check')) {
	function mblzr_update_settings_check() {

		//Set migrate function @todo
		//if(isset($_POST['mblzr_migrate'])) mblzr_migrate();

		//Set migrate options function @todo
		//if ( ( isset( $_POST['mblzr_migrate_options'] ) )  ||
		//	 ( !get_option('mblzr_options') ) ) {
		//}
	}
}

if (!function_exists('mblzr_class_defined_error')) {
	function mblzr_class_defined_error() {
		$mblzr_class_error = "The WP-Mobilizer class is already defined";
		if ( class_exists( 'ReflectionClass' ) ) {
			$r = new ReflectionClass( 'WP_Mobilizer' );
			$mblzr_class_error .= " in " . $r->getFileName();
		}
		$mblzr_class_error .= ", preventing WP-Mobilizer from loading.";
		echo mblzr_show_essage($mblzr_class_error, true);
	}
}

/**
 * Generic function to show a message to the user using WP's
 * standard CSS classes to make use of the already-defined
 * message colour scheme.
 *
 * @param $message The message you want to tell the user.
 * @param $errormsg If true, the message is an error, so use
 * the red message style. If false, the message is a status
  * message, so use the yellow information message style.
 */
if (!function_exists('mblzr_show_essage')) {
	function mblzr_show_essage($message, $errormsg = false)
	{
		$html = '';
		if ($errormsg) {
			$html .= '<div id="message" class="error">';
		}
		else {
			$html .= '<div id="message" class="updated fade">'; //highlight
		}

		$html .= "<p><strong>$message</strong></p></div>";

		return $html;
	}
}

if (!function_exists('mblzr_get_version')) {
	function mblzr_get_version(){
		return MBLZR_VERSION;
	}
}


if (!function_exists('mblzr_option_isset')) {
	function mblzr_option_isset( $option ) {
		global $mblzr_options;
		return ( ( isset( $mblzr_options[$option] ) ) && $mblzr_options[$option] );
	}
}


if (!function_exists('mblzr_load_mobile_style')) {
	function mblzr_load_mobile_style(){
		global $mobile_browser;
		$mobileTheme =  $mobile_browser;
		$themeList = wp_get_themes();
		foreach ($themeList as $theme) {
		  if ($theme['Name'] == $mobileTheme) {
		      return $theme['Stylesheet'];
		  }
		}
	}
}

if (!function_exists('mblzr_load_mobile_theme')) {
	function mblzr_load_mobile_theme(){
		global $mobile_browser;
		$mobileTheme =  $mobile_browser;
		$themeList = wp_get_themes();
		foreach ($themeList as $theme) {
		  if ($theme['Name'] == $mobileTheme) {
		      return $theme['Template'];
		  }
		}
	}
}


if ( ! function_exists( 'shortcode_exists' ) ){
/**
 * Check if a shortcode is registered in WordPress.
 *
 * Examples: shortcode_exists( 'caption' ) - will return true.
 *           shortcode_exists( 'blah' )    - will return false.
 */
function shortcode_exists( $shortcode = false ) {
	global $shortcode_tags;

	if ( ! $shortcode )
		return false;

	if ( array_key_exists( $shortcode, $shortcode_tags ) )
		return true;

	return false;
}
}

if ( ! function_exists( 'mblzr_end_option_separator' ) ){ function mblzr_end_option_separator( $desc = '' ){
	$html = '';

	if( !empty($desc) ){
		$html .= '<tr>';
			$html .= '<th scope="row"></th>';
			$html .= '<td><small>' . $desc . '</small></td>';
		$html .= '</tr>';
	}

	$html .= '<tr>';
		$html .= '<th scope="row" style="margin-bottom:5px;border-bottom:1px dotted #c3c3c3;padding:0;">&nbsp;</th>';
		$html .= '<td style="margin-bottom:5px;border-bottom:1px dotted #c3c3c3;padding:0;">&nbsp;</td>';
	$html .= '</tr><tr>';
		$html .= '<th scope="row"></th>';
		$html .= '<td>&nbsp;</td>';
	$html .= '</tr>';

	return $html;
}}

/**
 * Recognized background repeat
 *
 * Returns an array of all recognized background repeat values.
 *
 * @uses      apply_filters()
 *
 * @return    array
 *
 * @access    public
 */
if ( ! function_exists( 'mblzr_returns_background_repeat' ) ) {

  function mblzr_returns_background_repeat( $field_value = '' ) {

    return apply_filters( 'mblzr_returns_background_repeat', array(
      'no-repeat' 	=> __('No Repeat', 'wp_mobilizer'),
      'repeat' 		=> __('Repeat All', 'wp_mobilizer'),
      'repeat-x'  	=> __('Repeat Horizontally', 'wp_mobilizer'),
      'repeat-y' 	=> __('Repeat Vertically', 'wp_mobilizer'),
      'inherit'   	=> __('Inherit', 'wp_mobilizer')
    ), $field_value );

  }

}

/**
 * Recognized background attachment
 *
 * Returns an array of all recognized background attachment values.
 *
 * @uses      apply_filters()
 *
 * @return    array
 *
 * @access    public
 */
if ( ! function_exists( 'mblzr_returns_background_attachment' ) ) {

  function mblzr_returns_background_attachment( $field_value = '' ) {

    return apply_filters( 'mblzr_returns_background_attachment', array(
      "fixed"   	=> __("Fixed", 'wp_mobilizer'),
      "scroll"  	=> __("Scroll", 'wp_mobilizer'),
      "inherit"		=> __("Inherit", 'wp_mobilizer')
    ), $field_value );

  }

}

/**
 * Recognized background position
 *
 * Returns an array of all recognized background position values.
 *
 * @uses      apply_filters()
 *
 * @return    array
 *
 * @access    public
 */
if ( ! function_exists( 'mblzr_returns_background_position' ) ) {

  function mblzr_returns_background_position( $field_value = '' ) {

    return apply_filters( 'mblzr_returns_background_position', array(
		"left top"      	=> __("Left Top", 'wp_mobilizer') 		. ' [0 0]',
		"left center"   	=> __("Left Center", 'wp_mobilizer') 	. ' [0 50%]',
		"left bottom"   	=> __("Left Bottom", 'wp_mobilizer') 	. ' [0 100%]',
		"center top"    	=> __("Center Top", 'wp_mobilizer') 	. ' [50% 0]',
		"center center" 	=> __("Center Center", 'wp_mobilizer') 	. ' [50% 50%]',
		"center bottom" 	=> __("Center Bottom", 'wp_mobilizer') 	. ' [50% 100%]',
		"right top"     	=> __("Right Top", 'wp_mobilizer') 		. ' [100% 0]',
		"right center"  	=> __("Right Center", 'wp_mobilizer') 	. ' [100% 50%]',
		"right bottom"  	=> __("Right Bottom", 'wp_mobilizer') 	. ' [100% 100%]'
    ), $field_value );

  }

}

/**
 * Measurement Units
 *
 * Returns an array of all available unit types.
 *
 * @uses      apply_filters()
 *
 * @return    array
 *
 * @access    public
 */
if ( ! function_exists( 'mblzr_measurement_unit_types' ) ) {

  function mblzr_measurement_unit_types( $field_value = '' ) {

    return apply_filters( 'ot_measurement_unit_types', array(
      'px' => 'px',
      '%'  => '%',
      'em' => 'em',
      'pt' => 'pt'
    ), $field_value );

  }

}



/**
 * Radio Images default array.
 *
 * Returns an array of all available radio images.
 * You can filter this function to change the images
 * on a per option basis.
 *
 * @uses      apply_filters()
 *
 * @return    array
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'mblzr_layout_radio_images' ) ) {

  function mblzr_layout_radio_images( $field_value = '' ) {

    return apply_filters( 'mblzr_layout_radio_images', array(
		array(
			'value'   => 'left-sidebar',
			'label'   => 'Left Sidebar',
			'src'     => MBLZR_PLUGIN_IMAGES_URL . 'admin/layout/left-sidebar.png'
		  ),
		array(
			'value'   => 'right-sidebar',
			'label'   => 'Right Sidebar',
			'src'     => MBLZR_PLUGIN_IMAGES_URL . 'admin/layout/right-sidebar.png'
		  ),
		array(
			'value'   => 'full-width',
			'label'   => 'Full Width (no sidebar)',
			'src'     => MBLZR_PLUGIN_IMAGES_URL . 'admin/layout/full-width.png'
		),
		array(
			'value'   => 'dual-sidebar',
			'label'   => __( 'Dual Sidebar', 'option-tree' ),
			'src'     => MBLZR_PLUGIN_IMAGES_URL . 'admin/layout/dual-sidebar.png'
		),
		array(
			'value'   => 'left-dual-sidebar',
			'label'   => __( 'Left Dual Sidebar', 'option-tree' ),
			'src'     => MBLZR_PLUGIN_IMAGES_URL . 'admin/layout/left-dual-sidebar.png'
		),
		array(
			'value'   => 'right-dual-sidebar',
			'label'   => __( 'Right Dual Sidebar', 'option-tree' ),
			'src'     => MBLZR_PLUGIN_IMAGES_URL . 'admin/layout/right-dual-sidebar.png'
		)
    ), $field_value );

  }

}


if ( ! function_exists( 'mblzr_display_form_elements' ) ){ function mblzr_display_form_elements( $field, $themename = '' ) {

	$default_args = array(
		'type' 						=> 'text',
		'label' 					=> '',
		'name' 						=> '',
		'options' 					=> array(),
		'options_key_value' 		=> false,
		'std' 						=> '',
		'std_value' 				=> '',
		'desc' 						=> '',
		'id' 						=> '',

		'title' 					=> 'Click to toggle',

		'label_yes' 				=> __('Yes','wp_mobilizer'),
		'value_yes' 				=> 'yes',
		'label_no' 					=> __('No','wp_mobilizer'),
		'value_no' 					=> 'no',

	);

	// Set up blank or default values for empty ones
	if ( 'file' == $field['type'] && !isset( $field['allow'] ) ) $field['allow'] = array( 'url', 'attachment' );
	if ( 'file' == $field['type'] && !isset( $field['save_id'] ) )  $field['save_id']  = false;
	if ( 'multicheck' == $field['type'] ) $field['multiple'] = true;

	// Set default value
	$field = array_merge( $default_args, $field );

	// Get value of the settings / options
	$get_value = get_option( $field['id'], ( isset($field['std']) ? isset($field['std']) : '' ) );

	// Init toggle element
	if( isset($field['toggle']) /*&& ( $field['toggle'] == 'closed' || $field['toggle'] == 'yes' || $field['toggle'] == true  || $field['toggle'] !== false )*/ ){
		switch ( $field['type'] ) {
			case "title":
			case "open":
			case "close":
			case "open_option":
			case "close_options":
				$field['type'] = $field['type'] . '_toggle';
				break;
		}
	}

	// Check if options are be choices
	if( isset($field['choices']) && !isset($field['options']) ){
		$field['options'] = $field['choices'];
	}

	// Check if field label exist
	if( isset($field['id']) && ( !isset($field['label']) || empty($field['label']) ) ){
		$field['label'] = $field['id'];
	}

	// Check if field name exist
	if( isset($field['id']) && ( !isset($field['name']) || empty($field['name']) ) ){
		$field['name'] = $field['id'];
	}

	// Implode Class name if have many Class
	if( isset($field['class']) ){
		if( !is_array($field['class']) ){
			$field['class'] = array($field['class']);
		}

		$field['class'] = implode(' ', $field['class']);
	}

	// Change type file
	switch ( $field['type'] ) {
		case 'radio_image_layout':
			$field['type'] = 'radio-image-layout';
			break;

		case 'radio_image':
			$field['type'] = 'radio-image';
			break;

		case 'on_off':
			$field['type'] = 'on-off';
			break;

		case 'wpeditor':
		case 'wp_editor':
			$field['type'] = 'wp-editor';
			break;

		case 'input-upload':
		case 'input_upload':
		case 'file-upload':
		case 'file_upload':
		case 'file-uploader':
		case 'file_uploader':
			$field['type'] = 'file';
			break;

	}

	// Set default value for laytout elements
	if( $field['type'] == 'radio-image-layout' && ( !isset($field['options']) || !is_array($field['options']) || count($field['options']) <= 0 ) ){
		$field['options'] = mblzr_layout_radio_images( $field['id'] );
	}

	// Set default sign
	if( !isset($field['sign']) ){
		$field['sign'] = '$';
	}

	// Set default position for text or element (money)
	if( isset($field['text-dir']) ){$field['text_dir'] = $field['text-dir'];}
	if( isset($field['text-sign_direction']) ){$field['text_dir'] = $field['text-sign_direction'];}
	if( isset($field['sign_dir']) ){$field['text_dir'] = $field['sign_dir'];}
	if( isset($field['sign-dir']) ){$field['text_dir'] = $field['sign-dir'];}
	if( isset($field['sign_direction']) ){$field['text_dir'] = $field['sign_direction'];}
	if( isset($field['sign-direction']) ){$field['text_dir'] = $field['sign-direction'];}
	if( isset($field['sign_position']) ){$field['text_dir'] = $field['sign_position'];}
	if( isset($field['sign-position']) ){$field['text_dir'] = $field['sign-position'];}
	if( isset($field['sign_pos']) ){$field['text_dir'] = $field['sign_pos'];}
	if( isset($field['sign-pos']) ){$field['text_dir'] = $field['sign-pos'];}

	if( !isset($field['text_dir']) ){
		$field['text_dir'] = 'ltr';
	}

	switch( $field['text_dir'] ){
		case 'l':
		case 'lft':
		case 'left':
		case 'gauche':
		case 'ga':
			$field['text_dir'] = 'ltr';
			break;

		case 'r':
		case 'rgt':
		case 'right':
		case 'droite':
		case 'dr':
			$field['text_dir'] = 'rtl';
			break;

	}

	switch( $field['text_dir'] ){
		case 'ltr':
		case 'rtl':
			break;

		default:
			$field['text_dir'] = 'ltr';
	}

/**
 * Start Options for file type
 */
switch ( $field['type'] ) {

////////////////////////////////////////////////////////////////////////////

case "open":
?>
<table class="wp-list-table widefat fixed bookmarks">

<?php
break;

////////////////////////////////////////////////////////////////////////////

case "close":
?>

</table>
<br/><br/>

<?php
break;

////////////////////////////////////////////////////////////////////////////

case "open_toggle":
?>
<div class="postbox<?php if( isset($field['toggle']) && ( $field['toggle'] == 'close' || $field['toggle'] == 'closed' || $field['toggle'] == false ) ){ echo ' closed'; } ?>">

<?php
break;

////////////////////////////////////////////////////////////////////////////

case "close_toggle":
?>
		</table>
		<br/>
		<div class="clear"></div>
	</div>
</div>
<br/>

<?php
break;

////////////////////////////////////////////////////////////////////////////

case "title":
?>

<thead>
    <tr>
        <th<?php if( isset($field['class']) && !empty($field['class']) ){ echo ' class="' . $field['class'] . '"'; } ?><?php if( isset($field['name']) && !empty($field['name']) ){ echo ' name="' . $field['name'] . '"'; } ?><?php if( isset($field['id']) && !empty($field['id']) ){ echo ' id="' . $field['id'] . '"'; } ?>><?php echo $field['label']; ?></th>
    </tr>
</thead>

<?php
break;

////////////////////////////////////////////////////////////////////////////

case "title_toggle":
?>

<div class="handlediv" title="<?php echo $field['title']; ?>"<?php if( isset($field['name']) && !empty($field['name']) ){ echo ' name="' . $field['name'] . '"'; } ?><?php if( isset($field['id']) && !empty($field['id']) ){ echo ' id="' . $field['id'] . '"'; } ?>><br /></div><h3 class="hndle"><span><?php echo $field['label']; ?></span></h3>
<div class="inside">
	<table class="form-table">

<?php
break;

////////////////////////////////////////////////////////////////////////////

case "open_options":
case "open_option":
?>
<tbody>
    <tr>
        <td<?php if( isset($field['class']) && !empty($field['class']) ){ echo ' class="' . $field['class'] . '"'; } ?>>

			<table class="form-table mblzr_metabox">

<?php
break;

////////////////////////////////////////////////////////////////////////////

case "close_options":
case "close_option":
?>
			</table>
		<br/>

	</td></tr>
</tbody>
<?php
break;

////////////////////////////////////////////////////////////////////////////

case "open_options_toggle":
case "open_option_toggle":
case "close_options_toggle":
case "close_option_toggle":
break;

////////////////////////////////////////////////////////////////////////////

case 'wysiwyg':
case 'wp-editor':
?>

<tr>
	<th scope="row"><label for="<?php echo $field['id']; ?>"><?php echo $field['label']; ?></label></th>
	<td<?php if( isset($field['class']) && !empty($field['class']) ){ echo ' class="' . $field['class'] . '"'; } ?>><?php

		if( isset($field['options']) && is_array($field['options']) && !isset($field['wp_editor_settings']) ){
			$field['wp_editor_settings'] = $field['options'];
		}

		if( !isset($field['wp_editor_settings']) || ( isset($field['wp_editor_settings']) && !is_array($field['wp_editor_settings']) ) ){
			$field['wp_editor_settings'] = array();
		}

		// Use nonce for verification
		wp_nonce_field( plugin_basename( __FILE__ ), 'wp_mobilizer' );

		// Settings that we'll pass to wp_editor
		/*$field['wp_editor_settings'] = array (
			'tinymce' => false,
			'quicktags' => true,
		);*/

		wp_editor( ( $get_value != "" ? stripslashes($get_value) : stripslashes($field['std']) ), $field['id'], $field['wp_editor_settings'] );

	?></td>
</tr>
<?php echo mblzr_end_option_separator( $field['desc'] ); ?>

<?php
break;

////////////////////////////////////////////////////////////////////////////

case 'textarea':

?>

<tr>
	<th scope="row"><label for="<?php echo $field['id']; ?>"><?php echo $field['label']; ?></label></th>
	<td<?php if( isset($field['class']) && !empty($field['class']) ){ echo ' class="' . $field['class'] . '"'; } ?>><textarea name="<?php echo $field['name']; ?>" id="<?php echo $field['id']; ?>" style="width:400px; height:200px;" cols="" rows=""><?php if ( !is_bool($get_value) && !empty($get_value) ) { echo stripslashes($get_value); } else { echo stripslashes($field['std']); } ?></textarea></td>
</tr>

<?php echo mblzr_end_option_separator( $field['desc'] ); ?>

<?php
break;

////////////////////////////////////////////////////////////////////////////

case 'select':
?>
<tr>
	<th scope="row"><label for="<?php echo $field['id']; ?>"><?php echo $field['label']; ?></label></th>
	<td<?php if( isset($field['class']) && !empty($field['class']) ){ echo ' class="' . $field['class'] . '"'; } ?>><?php

	if( isset($field['options']) && is_array($field['options']) && count($field['options']) > 0 ){

		?><select style="width:240px;" name="<?php echo $field['name']; ?>" id="<?php echo $field['id']; ?>">
			<?php $i = 1; foreach ( $field['options'] as $key => $option ) { ?>
				<option<?php

						// Set the value
						if( isset($field['options_key_value']) && $field['options_key_value'] == true ){
							echo ' value="' . ( $key == $field['std'] ? $field['std_value'] : $key ) . '"';
						}else{
							echo ' value="' . ( $option['value'] == $field['std'] ? $field['std_value'] : $option['value'] ) . '"';
						}

						// Check if selected.
						$checked = false;
						if( isset($field['options_key_value']) && $field['options_key_value'] == true && !is_bool($get_value) && $get_value == $key ){
							echo ' selected="selected"';
						} elseif ( ( $get_value == false || empty($get_value) ) && ( isset($field['options_key_value']) && $field['options_key_value'] == true ? $key : ( isset($option['value']) ? $option['value'] : time() ) ) == $field['std']) {
							echo ' selected="selected"';
						} elseif ( isset($option['value']) && !is_bool($get_value) && $option['value'] == $get_value ) {
							echo ' selected="selected"';
						} elseif ( ( $get_value == false || empty($get_value) ) && isset($option['value']) && $option['value'] == $field['std'] ) {
							echo ' selected="selected"';
						}

					?>><?php
					if( isset($field['options_key_value']) && $field['options_key_value'] == true ){
						echo ( !empty($option) ? $option : $key );
					}else{
						echo ( isset($option['label']) && !empty($option['label']) ? $option['label'] : $option['value'] );
					}
					?></option><?php

					$i++;
				}

			?></select><?php

	}

	?></td>
</tr>

<?php echo mblzr_end_option_separator( $field['desc'] ); ?>
<?php
break;

////////////////////////////////////////////////////////////////////////////

case 'on-off':
?>
<tr>
	<th scope="row"><label><?php echo $field['label']; ?></label></th>
	<td<?php if( isset($field['class']) && !empty($field['class']) ){ echo ' class="' . $field['class'] . '"'; } ?>><?php

	$html = '';
	if ( !is_bool($get_value) && !empty($get_value) ) { $meta = stripslashes($get_value); } else { $meta = stripslashes($field['std']); }


	$no_selected = $yes_selected = ' selected';
	$no_checked = $yes_checked = ' checked="true"';
	if( !empty($meta) && ( $meta == $field['value_yes'] ) ){
		$no_selected = '';
		$no_checked = '';
	}else{
		if( empty($meta) ){

			if( $field['value_yes'] == $field['def_option_value'] ){
				$no_selected = '';
				$no_checked = '';
			}else{
				$yes_selected = '';
				$yes_checked = '';
			}

		}else{
			$yes_selected = '';
			$yes_checked = '';
		}
	}

	$html .= '
	<div class="my_meta_control">
		<p class="field switch">
			<label for="' . $field['id'] . '_' . $field['value_yes'] . '" class="cb-enable' . $yes_selected . '"><span>' . $field['label_yes'] . '</span></label>
			<label for="' . $field['id'] . '_' . $field['value_no'] . '" class="cb-disable' . $no_selected . '"><span>' . $field['label_no'] . '</span></label>
			<span class="radio">
				<input type="radio" id="' . $field['id'] . '_' . $field['value_yes'] . '" name="' . $field['name'] . '"' . $yes_checked . ' value="' . $field['value_yes'] . '" />' . $field['label_yes'] . '
				<input type="radio" id="' . $field['id'] . '_' . $field['value_no'] . '" name="' . $field['name'] . '"' . $no_checked . ' value="' . $field['value_no'] . '" />' . $field['label_no'] . '
			</span>
		</p>
	</div>
	<div class="clear"></div>
	';

	echo $html;


?></td>
</tr>

<?php echo mblzr_end_option_separator( $field['desc'] ); ?>
<?php
break;

////////////////////////////////////////////////////////////////////////////

case "checkbox":
?>
<tr>
	<th scope="row"><label for="<?php echo $field['id']; ?>"><?php echo $field['label']; ?></label></th>
	<td<?php if( isset($field['class']) && !empty($field['class']) ){ echo ' class="' . $field['class'] . '"'; } ?>>
		<?php if( get_option($field['id']) ){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
		<input type="checkbox" name="<?php echo $field['name']; ?>" id="<?php echo $field['id']; ?>" value="true" <?php echo $checked; ?> />
	</td>
</tr>

<?php echo mblzr_end_option_separator( $field['desc'] ); ?>

<?php
break;

////////////////////////////////////////////////////////////////////////////

case "save":
case "save_options":
case "save_option":
?>
<tr valign="top">
	<th scope="row">&nbsp;</th>
	<td<?php if( isset($field['class']) && !empty($field['class']) ){ echo ' class="' . $field['class'] . '"'; } ?>>
		<input name="save" type="submit" class="button button-primary button-large" value="<?php _e('Save Changes') ?>" />
		<input type="hidden" name="action" value="save" />
		<input type="hidden" name="action_save_theme" value="<?php echo $themename; ?>" />
	</td>
</tr>
<?php
break;

////////////////////////////////////////////////////////////////////////////

case 'title_h2':

?>
<tr>
	<th scope="row" colspan="2"<?php if( isset($field['class']) && !empty($field['class']) ){ echo ' class="' . $field['class'] . '"'; } ?>><h2><?php echo $field['label']; ?></h2></th>
</tr>

<?php echo mblzr_end_option_separator( $field['desc'] ); ?>

<?php
break;

////////////////////////////////////////////////////////////////////////////

case 'title_h3':
?>
<tr>
	<th scope="row" colspan="2"<?php if( isset($field['class']) && !empty($field['class']) ){ echo ' class="' . $field['class'] . '"'; } ?>><h3><?php echo $field['label']; ?></h3></th>
</tr>

<?php echo mblzr_end_option_separator( $field['desc'] ); ?>

<?php
break;

////////////////////////////////////////////////////////////////////////////

case 'text':
?>

<tr>
	<th scope="row"><label for="<?php echo $field['id']; ?>"><?php echo $field['label']; ?></label></th>
	<td<?php if( isset($field['class']) && !empty($field['class']) ){ echo ' class="' . $field['class'] . '"'; } ?>><input size="45" name="<?php echo $field['name']; ?>" id="<?php echo $field['id']; ?>" type="<?php echo $field['type']; ?>" value="<?php if ( !is_bool($get_value) && !empty($get_value) ) { echo stripslashes($get_value); } else { echo stripslashes($field['std']); } ?>" /></td>
</tr>

<?php echo mblzr_end_option_separator( $field['desc'] ); ?>

<?php
break;

////////////////////////////////////////////////////////////////////////////

case 'text_small':

	echo '<tr>';
		echo '<th scope="row"><label for="' . $field['id'] . '">' . $field['label'] . '</label></th>';
		echo '<td' . ( isset($field['class']) && !empty($field['class']) ? ' class="' . $field['class'] . '"' : '' ) . '>';

			echo '<input class="mblzr_text_small" type="text" size="15" name="' . $field['name'] . '" id="' . $field['id'] . '" value="' . ( !is_bool($get_value) && !empty($get_value) ? $get_value : $field['std'] ) . '" />';

		echo '</td>';
	echo '</tr>';

	echo mblzr_end_option_separator( $field['desc'] );

break;

////////////////////////////////////////////////////////////////////////////

case 'text_medium':

	echo '<tr>';
		echo '<th scope="row"><label for="' . $field['id'] . '">' . $field['label'] . '</label></th>';
		echo '<td' . ( isset($field['class']) && !empty($field['class']) ? ' class="' . $field['class'] . '"' : '' ) . '>';

			echo '<input class="mblzr_text_medium" size="30" type="text" name="' . $field['name'] . '" id="' . $field['id'], '" value="' . esc_attr( !is_bool($get_value) && !empty($get_value) ? $get_value : $field['std'] ) . '" />';

		echo '</td>';
	echo '</tr>';

	echo mblzr_end_option_separator( $field['desc'] );

break;

////////////////////////////////////////////////////////////////////////////

case 'text_date':
	echo '<tr>';
		echo '<th scope="row"><label for="' . $field['id'] . '">' . $field['label'] . '</label></th>';
		echo '<td' . ( isset($field['class']) && !empty($field['class']) ? ' class="' . $field['class'] . '"' : '' ) . '>';

			echo '<input class="mblzr_text_small mblzr_datepicker" size="45" type="text" name="' . $field['name'] . '" id="' . $field['id'] . '" value="' . esc_attr( !is_bool($get_value) && !empty($get_value) ? $get_value : $field['std'] ) . '" />';

		echo '</td>';
	echo '</tr>';

	echo mblzr_end_option_separator( $field['desc'] );

break;

////////////////////////////////////////////////////////////////////////////

case 'text_date_timestamp':
	echo '<tr>';
		echo '<th scope="row"><label for="' . $field['id'] . '">' . $field['label'] . '</label></th>';
		echo '<td' . ( isset($field['class']) && !empty($field['class']) ? ' class="' . $field['class'] . '"' : '' ) . '>';

			echo '<input class="mblzr_text_small mblzr_datepicker" size="45" type="text" name="' . $field['name'] . '" id="' . $field['id'] . '" value="' . esc_attr( !is_bool($get_value) && !empty($get_value) ? date( 'm\/d\/Y', $get_value ) : $field['std'] ) . '" />';

		echo '</td>';
	echo '</tr>';

	echo mblzr_end_option_separator( $field['desc'] );

break;

////////////////////////////////////////////////////////////////////////////

case 'text_datetime_timestamp':
	echo '<tr>';
		echo '<th scope="row"><label for="' . $field['id'] . '">' . $field['label'] . '</label></th>';
		echo '<td' . ( isset($field['class']) && !empty($field['class']) ? ' class="' . $field['class'] . '"' : '' ) . '>';

			echo '<input size="20" class="mblzr_text_small mblzr_datepicker" type="text" name="' . $field['name'] . '[date]" id="' . $field['id'] . '_date" value="' . esc_attr( !empty($get_value) ? date( 'm\/d\/Y', $get_value ) : date( 'm\/d\/Y', $field['std'] ) ) . '" />';
	echo '<input class="mblzr_timepicker text_time" type="text" name="' . $field['name'] . '[time]" id="' . $field['id'] . '_time" value="' . esc_attr( !is_bool($get_value) && !empty($get_value) ? date( 'h:i A', $get_value ) : date( 'H:i', $field['std'] ) ) . '" />';

		echo '</td>';
	echo '</tr>';

	echo mblzr_end_option_separator( $field['desc'] );

break;

////////////////////////////////////////////////////////////////////////////

case 'text_time':
	echo '<tr>';
		echo '<th scope="row"><label for="' . $field['id'] . '">' . $field['label'] . '</label></th>';
		echo '<td' . ( isset($field['class']) && !empty($field['class']) ? ' class="' . $field['class'] . '"' : '' ) . '>';

			echo '<input class="mblzr_timepicker text_time" type="text" size="45" name="' . $field['name'] . '" id="' . $field['id'] . '" value="' . esc_attr( ( !is_bool($get_value) && !empty($get_value) ? $get_value : $field['std'] ) ) . '" />';

		echo '</td>';
	echo '</tr>';

	echo mblzr_end_option_separator( $field['desc'] );

break;

////////////////////////////////////////////////////////////////////////////

case 'text_money':
	echo '<tr>';
		echo '<th scope="row"><label for="' . $field['id'] . '">' . $field['label'] . '</label></th>';
		echo '<td' . ( isset($field['class']) && !empty($field['class']) ? ' class="' . $field['class'] . '"' : '' ) . '>';

			if( $field['text_dir'] == 'ltr' ){
				echo $field['sign'] . ' ';
			}

			echo '<input class="mblzr_text_money" type="text" size="45" name="' . $field['name'] . '" id="', $field['id'] . '" value="' . esc_attr( ( !is_bool($get_value) && !empty($get_value) ? $get_value : $field['std'] ) ) . '" />';

			if( $field['text_dir'] == 'rtl' ){
				echo ' ' . $field['sign'];
			}

		echo '</td>';
	echo '</tr>';

	echo mblzr_end_option_separator( $field['desc'] );

break;

////////////////////////////////////////////////////////////////////////////

case 'colorpicker':
	$get_value = ( !is_bool($get_value) && !empty($get_value) ? $get_value : $field['std'] );
	$hex_color = '(([a-fA-F0-9]){3}){1,2}$';
	if ( preg_match( '/^' . $hex_color . '/i', $get_value ) ) // Value is just 123abc, so prepend #.
		$get_value = '#' . $get_value;
	elseif ( ! preg_match( '/^#' . $hex_color . '/i', $get_value ) ) // Value doesn't match #123abc, so sanitize to just #.
		$get_value = "#";

	echo '<tr>';
		echo '<th scope="row"><label for="' . $field['id'] . '">' . $field['label'] . '</label></th>';
		echo '<td' . ( isset($field['class']) && !empty($field['class']) ? ' class="' . $field['class'] . '"' : '' ) . '>';

			echo '<input class="mblzr_colorpicker mblzr_text_small" size="20" type="text" name="' . $field['name'] . '" id="' . $field['id'] . '" value="' . ( !is_bool($get_value) && !empty($get_value) ? $get_value : $field['std'] ) . '" />';

		echo '</td>';
	echo '</tr>';

	echo mblzr_end_option_separator( $field['desc'] );

break;

////////////////////////////////////////////////////////////////////////////

case 'textarea_small':
	echo '<tr>';
		echo '<th scope="row"><label for="' . $field['id'] . '">' . $field['label'] . '</label></th>';
		echo '<td' . ( isset($field['class']) && !empty($field['class']) ? ' class="' . $field['class'] . '"' : '' ) . '>';

			echo '<textarea name="' . $field['name'] . '" id="' . $field['id'] . '" cols="60" rows="4">' . ( !is_bool($get_value) && !empty($get_value) ? $get_value : $field['std'] ) . '</textarea>';

		echo '</td>';
	echo '</tr>';

	echo mblzr_end_option_separator( $field['desc'] );

break;

////////////////////////////////////////////////////////////////////////////

case 'textarea_code':
	echo '<tr>';
		echo '<th scope="row"><label for="' . $field['id'] . '">' . $field['label'] . '</label></th>';
		echo '<td' . ( isset($field['class']) && !empty($field['class']) ? ' class="' . $field['class'] . '"' : '' ) . '>';
			echo '<textarea name="' . $field['name'] . '" id="' . $field['id'] . '" cols="60" rows="10" class="mblzr_textarea_code">' . ( !is_bool($get_value) && !empty($get_value) ? $get_value : $field['std'] ) . '</textarea>';

		echo '</td>';
	echo '</tr>';

	echo mblzr_end_option_separator( $field['desc'] );

break;

////////////////////////////////////////////////////////////////////////////

case 'radio-inline':
case 'radio_inline':
	echo '<tr>';
		echo '<th scope="row"><label for="' . $field['id'] . '">' . $field['label'] . '</label></th>';
		echo '<td' . ( isset($field['class']) && !empty($field['class']) ? ' class="' . $field['class'] . '"' : '' ) . '>';

			if( empty( $get_value ) && !empty( $field['std'] ) ) $get_value = $field['std'];
			echo '<div class="mblzr_radio_inline">';
			$i = 1;
			foreach ($field['options'] as $key => $option ) {

				echo '<div class="mblzr_radio_inline_option">';
					// Append `[]` to the name to get multiple values
					// Use in_array() to check whether the current option should be checked

					// Get option value
					$option_value = ( isset($field['std_value']) ? $field['std_value'] : '' );
					if( isset($field['options_key_value']) && $field['options_key_value'] == true ){
						$option_value = $key;
					}else{
						$option_value = ( isset($option['value']) ? $option['value'] : ( isset($field['std_value']) ? $field['std_value'] : '' ) );
					}

					// Get option label
					$option_label = ( isset($field['std_label']) ? $field['std_label'] : '' );
					if( isset($field['options_key_value']) && $field['options_key_value'] == true ){
						$option_label = ( isset($option) && !empty($option) ? $option : $key );
					}else{
						$option_label = ( isset($option['label']) && !empty($option['label']) ? $option['label'] : ( isset($option['value']) ? $option['value'] : ( isset($field['std_value']) ? $field['std_value'] : '' ) ) );
					}

					// Check if checked.
					$checked = false;
					if( isset($field['options_key_value']) && $field['options_key_value'] == true && !is_bool($get_value) && $get_value == $key ){
						$checked = true;
					} elseif ( ( $get_value == false || empty($get_value) ) && ( isset($field['options_key_value']) && $field['options_key_value'] == true ? $key : ( isset($option['value']) ? $option['value'] : time() ) ) == $field['std']) {
						$checked = true;
					} elseif ( isset($option['value']) && !is_bool($get_value) && $option['value'] == $get_value ) {
						$checked = true;
					} elseif ( ( $get_value == false || empty($get_value) ) && isset($option['value']) && $option['value'] == $field['std'] ) {
						$checked = true;
					}

					echo '<input type="radio" name="' . $field['name'] . '" id="' . $field['id'] . $i . '" value="' . $option_value . '"' . checked( $checked, true, false ) . ' />';
					echo '<label for="' . $field['id']  . $i . '">' . $option_label . '</label>';

				echo '</div>';

				$i++;
			}
			echo '</div>';

		echo '</td>';
	echo '</tr>';

	echo mblzr_end_option_separator( $field['desc'] );

break;

////////////////////////////////////////////////////////////////////////////

case 'radio-image':
case 'radio-image-layout':

	$field['type'] = 'radio-image';

	echo '<tr class="type-' . $field['type'] . '">';
		echo '<th scope="row"><label for="' . $field['id'] . '">' . $field['label'] . '</label></th>';
		echo '<td' . ( isset($field['class']) && !empty($field['class']) ? ' class="' . $field['class'] . '"' : '' ) . '>';

			if( empty( $get_value ) && !empty( $field['std'] ) ) $get_value = $field['std'];
			echo '<div class="mblzr_radio_image">';
			$i = 1;

			foreach ( $field['options'] as $key => $option ) {
				// Append `[]` to the name to get multiple values
				// Use in_array() to check whether the current option should be checked

				// Get option value
				$option_value = ( isset($field['std_value']) ? $field['std_value'] : '' );
				if( isset($field['options_key_value']) && $field['options_key_value'] == true ){
					$option_value = $key;
				}else{
					$option_value = ( isset($option['value']) ? $option['value'] : ( isset($field['std_value']) ? $field['std_value'] : '' ) );
				}

				// Get option label
				$option_label = ( isset($field['std_label']) ? $field['std_label'] : '' );
				if( isset($field['options_key_value']) && $field['options_key_value'] == true ){
					$option_label = ( isset($option) && !empty($option) ? $option : $key );
				}else{
					$option_label = ( isset($option['label']) && !empty($option['label']) ? $option['label'] : ( isset($option['value']) ? $option['value'] : ( isset($field['std_value']) ? $field['std_value'] : '' ) ) );
				}

				// Check if checked.
				$checked = false;
				if( isset($field['options_key_value']) && $field['options_key_value'] == true && !is_bool($get_value) && $get_value == $key ){
					$checked = true;
				} elseif ( ( $get_value == false || empty($get_value) ) && ( isset($field['options_key_value']) && $field['options_key_value'] == true ? $key : ( isset($option['value']) ? $option['value'] : time() ) ) == $field['std']) {
					$checked = true;
				} elseif ( isset($option['value']) && !is_bool($get_value) && $option['value'] == $get_value ) {
					$checked = true;
				} elseif ( ( $get_value == false || empty($get_value) ) && isset($option['value']) && $option['value'] == $field['std'] ) {
					$checked = true;
				}

				echo '<div class="mblzr-radio-images_options">';

					echo '<p style="display:none">';
						echo '<input type="radio" name="' . esc_attr( $field['name'] ) . '" id="' . esc_attr( $field['id'] ) . '-' . esc_attr( $option_value ) . '" value="' . esc_attr( $option_value ) . '"' . checked( $checked, true, false ) . ' class="mblzr-radio mblzr_images" />';
						echo '<label for="' . esc_attr( $field['id'] ) . '-' . esc_attr( $option_value ) . '">' . esc_attr( $option_label ) . '</label>';
					echo '</p>';

					echo '<img src="' . esc_url( $option['src'] ) . '" alt="' . esc_attr( $option_label ) .'" title="' . esc_attr( $option_label ) .'" class="mblzr-radio-image ' . ( $checked == true ? ' mblzr-radio-image-selected' : '' ) . '" />';
				echo '</div>';

				$i++;
			}

			echo '</div>';

		echo '</td>';
	echo '</tr>';

	echo mblzr_end_option_separator( $field['desc'] );

break;

////////////////////////////////////////////////////////////////////////////

case 'radio':
	echo '<tr>';
		echo '<th scope="row"><label for="' . $field['id'] . '">' . $field['label'] . '</label></th>';
		echo '<td' . ( isset($field['class']) && !empty($field['class']) ? ' class="' . $field['class'] . '"' : '' ) . '>';

			if( empty( $get_value ) && !empty( $field['std'] ) ) $get_value = $field['std'];
			echo '<ul>';
			$i = 1;
			foreach ( $field['options'] as $key => $option ) {
				// Append `[]` to the name to get multiple values
				// Use in_array() to check whether the current option should be checked

				// Get option value
				$option_value = ( isset($field['std_value']) ? $field['std_value'] : '' );
				if( isset($field['options_key_value']) && $field['options_key_value'] == true ){
					$option_value = $key;
				}else{
					$option_value = ( isset($option['value']) ? $option['value'] : ( isset($field['std_value']) ? $field['std_value'] : '' ) );
				}

				// Get option label
				$option_label = ( isset($field['std_label']) ? $field['std_label'] : '' );
				if( isset($field['options_key_value']) && $field['options_key_value'] == true ){
					$option_label = ( isset($option) && !empty($option) ? $option : $key );
				}else{
					$option_label = ( isset($option['label']) && !empty($option['label']) ? $option['label'] : ( isset($option['value']) ? $option['value'] : ( isset($field['std_value']) ? $field['std_value'] : '' ) ) );
				}

				// Check if checked.
				$checked = false;
				if( isset($field['options_key_value']) && $field['options_key_value'] == true && !is_bool($get_value) && $get_value == $key ){
					$checked = true;
				} elseif ( ( $get_value == false || empty($get_value) ) && ( isset($field['options_key_value']) && $field['options_key_value'] == true ? $key : ( isset($option['value']) ? $option['value'] : time() ) ) == $field['std']) {
					$checked = true;
				} elseif ( isset($option['value']) && !is_bool($get_value) && $option['value'] == $get_value ) {
					$checked = true;
				} elseif ( ( $get_value == false || empty($get_value) ) && isset($option['value']) && $option['value'] == $field['std'] ) {
					$checked = true;
				}

				echo '<li><input type="radio" name="' . $field['name'] . '" id="' . $field['id'] . '_' . $i . '" value="' . $option_value . '"' . checked( $checked, true, false ) . ' /><label for="' . $field['id'] . '_' . $i . '">' . $option_label . '</label></li>';
				$i++;
			}
			echo '</ul>';

		echo '</td>';
	echo '</tr>';

	echo mblzr_end_option_separator( $field['desc'] );

break;

////////////////////////////////////////////////////////////////////////////

case 'multicheck':
	echo '<tr>';
		echo '<th scope="row"><label for="' . $field['id'] . '">' . $field['label'] . '</label></th>';
		echo '<td' . ( isset($field['class']) && !empty($field['class']) ? ' class="' . $field['class'] . '"' : '' ) . '>';

			echo '<ul>';
			$i = 1;
			foreach ( $field['options'] as $key => $option ) {
				// Append `[]` to the name to get multiple values
				// Use in_array() to check whether the current option should be checked

				// Get option value
				$option_value = ( isset($field['std_value']) ? $field['std_value'] : '' );
				if( isset($field['options_key_value']) && $field['options_key_value'] == true ){
					$option_value = $key;
				}else{
					$option_value = ( isset($option['value']) ? $option['value'] : ( isset($field['std_value']) ? $field['std_value'] : '' ) );
				}

				// Get option label
				$option_label = ( isset($field['std_label']) ? $field['std_label'] : '' );
				if( isset($field['options_key_value']) && $field['options_key_value'] == true ){
					$option_label = ( isset($option) && !empty($option) ? $option : $key );
				}else{
					$option_label = ( isset($option['label']) && !empty($option['label']) ? $option['label'] : ( isset($option['value']) ? $option['value'] : ( isset($field['std_value']) ? $field['std_value'] : '' ) ) );
				}

				// Check if checked.
				$checked = false;
				if( isset($field['options_key_value']) && $field['options_key_value'] == true && !is_bool($get_value) && $get_value == $key ){
					$checked = true;
				} elseif ( ( $get_value == false || empty($get_value) ) && ( isset($field['options_key_value']) && $field['options_key_value'] == true ? $key : ( isset($option['value']) ? $option['value'] : time() ) ) == $field['std']) {
					$checked = true;
				} elseif ( isset($option['value']) && !is_bool($get_value) && $option['value'] == $get_value ) {
					$checked = true;
				} elseif ( ( $get_value == false || empty($get_value) ) && isset($option['value']) && $option['value'] == $field['std'] ) {
					$checked = true;
				}

				echo '<li><input type="checkbox" name="' . $field['name'] . '[]" id="' . $field['id'] . '_' . $i . '" value="' . $option_value . '"' . checked( $checked, true, false ) . ' /><label for="' . $field['id'] . '_' . $i . '">' . $option_label . '</label></li>';
				$i++;
			}
			echo '</ul>';

		echo '</td>';
	echo '</tr>';

	echo mblzr_end_option_separator( $field['desc'] );


break;

////////////////////////////////////////////////////////////////////////////

case 'taxonomy_select':
	echo '<tr>';
		echo '<th scope="row"><label for="' . $field['id'] . '">' . $field['label'] . '</label></th>';
		echo '<td' . ( isset($field['class']) && !empty($field['class']) ? ' class="' . $field['class'] . '"' : '' ) . '>';

			if( isset($field['element_id']) && !empty($field['element_id']) ){

				$names= wp_get_object_terms( $field['element_id'], $field['taxonomy'] );
				$terms = get_terms( $field['taxonomy'], 'hide_empty=0' );
				if( is_array($terms) && count($terms) > 0 ){
					echo '<select name="' . $field['name'] . '" id="' . $field['id'] . '">';
					foreach ( $terms as $term ) {
						if (!is_wp_error( $names ) && !empty( $names ) && !strcmp( $term->slug, $names[0]->slug ) ) {
							echo '<option value="' . $term->slug . '" selected>' . $term->name . '</option>';
						} else {
							echo '<option value="' . $term->slug . ' '  . ( $get_value == $term->slug ? $get_value : ' ' ) . '  ">' . $term->name . '</option>';
						}
					}
					echo '</select>';
				}

			}

		echo '</td>';
	echo '</tr>';

	echo mblzr_end_option_separator( $field['desc'] );

break;

////////////////////////////////////////////////////////////////////////////

case 'taxonomy_radio':
	echo '<tr>';
		echo '<th scope="row"><label for="' . $field['id'] . '">' . $field['label'] . '</label></th>';
		echo '<td' . ( isset($field['class']) && !empty($field['class']) ? ' class="' . $field['class'] . '"' : '' ) . '>';

			if( isset($field['element_id']) && !empty($field['element_id']) ){

				$names= wp_get_object_terms( $field['element_id'], $field['taxonomy'] );
				$terms = get_terms( $field['taxonomy'], 'hide_empty=0' );

				if( is_array($terms) && count($terms) > 0 ){
					echo '<ul>';
					foreach ( $terms as $term ) {
						if ( !is_wp_error( $names ) && !empty( $names ) && !strcmp( $term->slug, $names[0]->slug ) ) {
							echo '<li><input type="radio" name="' . $field['name'] . '" value="'. $term->slug . '" checked>' . $term->name . '</li>';
						} else {
							echo '<li><input type="radio" name="' . $field['name'] . '" value="' . $term->slug . '  '  . $get_value == $term->slug ? $get_value : ' ' . '  ">' . $term->name . '</li>';
						}
					}
					echo '</ul>';

				}

			}

		echo '</td>';
	echo '</tr>';

	echo mblzr_end_option_separator( $field['desc'] );

break;

////////////////////////////////////////////////////////////////////////////

case 'taxonomy_multicheck':
	echo '<tr>';
		echo '<th scope="row"><label for="' . $field['id'] . '">' . $field['label'] . '</label></th>';
		echo '<td' . ( isset($field['class']) && !empty($field['class']) ? ' class="' . $field['class'] . '"' : '' ) . '>';

			if( isset($field['element_id']) && !empty($field['element_id']) ){
				$names = wp_get_object_terms( $field['element_id'], $field['taxonomy'] );
				$terms = get_terms( $field['taxonomy'], 'hide_empty=0' );

				if( is_array($terms) && count($terms) > 0 ){
					echo '<ul>';
					foreach ($terms as $term) {
						echo '<li><input type="checkbox" name="' . $field['name'], '[]" id="' . $field['id'] . '" value="' . $term->name  . '"';
						foreach ($names as $name) {
							if ( $term->slug == $name->slug ){ echo ' checked="checked" ';};
						}
						echo' /><label>' . $term->name . '</label></li>';
					}
					echo '</ul>';
				}
			}

		echo '</td>';
	echo '</tr>';

	echo mblzr_end_option_separator( $field['desc'] );

break;

////////////////////////////////////////////////////////////////////////////

case 'file_list':
	echo '<tr>';
		echo '<th scope="row"><label for="' . $field['id'] . '">' . $field['label'] . '</label></th>';
		echo '<td' . ( isset($field['class']) && !empty($field['class']) ? ' class="' . $field['class'] . '"' : '' ) . '>';

			echo '<input class="mblzr_upload_file" type="text" size="36" name="' . $field['name'] . '" id="' . $field['id'] . '" value="" />';
			echo '<input class="mblzr_upload_button button" type="button" value="Upload File" />';
			$args = array(
				'post_type' 		=> 'attachment',
				'numberposts' 		=> null,
				'post_status' 		=> null,
			);
			if( isset($field['element_id']) && !empty($field['element_id']) ){
				$args['post_parent'] = $field['element_id'];
			}

			$attachments = get_posts($args);
			if ( $attachments && is_array($attachments) ) {
				echo '<ul class="attach_list">';
				foreach ($attachments as $attachment) {
					echo '<li>' . wp_get_attachment_link($attachment->ID, 'thumbnail', 0, 0, 'Download');
					echo '<span>';
					echo apply_filters('the_title', '&nbsp;' . $attachment->post_title );
					echo '</span></li>';
				}
				echo '</ul>';
			}

		echo '</td>';
	echo '</tr>';

	echo mblzr_end_option_separator( $field['desc'] );

break;

////////////////////////////////////////////////////////////////////////////

/*case 'input_upload':
?>

<tr>
	<th scope="row"><label for="<?php echo $field['id']; ?>"><?php echo $field['name']; ?></label></th>
	<td><input style="width:400px;" name="<?php echo $field['id']; ?>" id="<?php echo $field['id']; ?>" type="<?php echo $field['type']; ?>" value="<?php if ( $get_value != "") { echo stripslashes($get_value); } else { echo stripslashes($field['std']); } ?>" />

<input class="btn_upload" rel="box_<?php echo $field['id']; ?>" type="button" name="box_<?php echo $field['id']; ?>" value="<?php echo __('Upload','wp_mobilizer'); ?>" id="<?php echo $field['id']; ?>_button" />

</td>
</tr>

<?php echo mblzr_end_option_separator( $field['desc'] ); ?>


<?php
break;*/

////////////////////////////////////////////////////////////////////////////

case 'file':

	echo '<tr>';
		echo '<th scope="row"><label for="' . $field['id'] . '">' . $field['label'] . '</label></th>';
		echo '<td' . ( isset($field['class']) && !empty($field['class']) ? ' class="' . $field['class'] . '"' : '' ) . '>';

			$input_type_url = "hidden";
			if ( 'url' == $field['allow'] || ( is_array( $field['allow'] ) && in_array( 'url', $field['allow'] ) ) )
				$input_type_url="text";
			echo '<input class="mblzr_upload_file" type="' . $input_type_url . '" size="45" id="' . $field['id'] . '" name="' . $field['name'] . '" value="' . ( !is_bool($get_value) && !empty($get_value) ? $get_value : $field['std'] ) . '" />';
			echo '<input class="mblzr_upload_button button" type="button" value="Upload File" />';

			//get_post_meta( $post->ID, $field['id'] . "_id",true)
			echo '<input class="mblzr_upload_file_id" type="hidden" id="' . $field['id'] . '_id" name="' . $field['name'] . '_id" value="' . '' . '" />';
			echo '<div id="' . $field['id'] . '_status" class="mblzr_media_status">';
			if ( $field['allow'] && !is_bool($get_value) && !empty($get_value) ) {

				$check_image = preg_match( '/(^.*\.jpg|jpeg|png|gif|ico*)/i', $get_value );
				if ( $check_image ) {
					echo '<div class="img_status">';
					echo '<img src="' . $get_value . '" alt="" />';
					echo '<a href="#" class="mblzr_remove_file_button" rel="' . $field['id'] . '">Remove Image</a>';
					echo '</div>';
				} else {
					$parts = explode( '/', $get_value );
					for( $i = 0; $i < count( $parts ); ++$i ) {
						$title = $parts[$i];
					}
					echo 'File: <strong>' . $title . '</strong>&nbsp;&nbsp;&nbsp; (<a href="' . $get_value . '" target="_blank" rel="external">Download</a> / <a href="#" class="mblzr_remove_file_button" rel="' . $field['id'] . '">Remove</a>)';
				}
			}
			echo '</div>';


		echo '</td>';
	echo '</tr>';

	echo mblzr_end_option_separator( $field['desc'] );

break;

////////////////////////////////////////////////////////////////////////////

case 'oembed':
	echo '<tr>';
		echo '<th scope="row"><label for="' . $field['id'] . '">' . $field['label'] . '</label></th>';
		echo '<td' . ( isset($field['class']) && !empty($field['class']) ? ' class="' . $field['class'] . '"' : '' ) . '>';

			echo '<input class="mblzr_oembed" size="45" type="text" name="' . $field['name'] . '" id="' . $field['id'] . '" value="' . ( !is_bool($get_value) && !empty($get_value) ? $get_value : $field['std'] ) . '" />';
			echo '<p class="mblzr-spinner spinner"></p>';
			echo '<div id="' . $field['id'] . '_status" class="mblzr_media_status ui-helper-clearfix embed_wrap">';
				if ( !is_bool($get_value) && !empty($get_value) ) {
					$check_embed = $GLOBALS['wp_embed']->run_shortcode( '[embed]' . esc_url( $get_value ) . '[/embed]' );
					if ( $check_embed ) {
						echo '<div class="embed_status">';
						echo $check_embed;
						echo '<a href="#" class="mblzr_remove_file_button" rel="' . $field['id'] . '">Remove Embed</a>';
						echo '</div>';
					} else {
						echo 'URL is not a valid oEmbed URL.';
					}
				}
			echo '</div>';

		echo '</td>';
	echo '</tr>';

	echo mblzr_end_option_separator( $field['desc'] );

break;

////////////////////////////////////////////////////////////////////////////

case 'background':

	$get_value_bg_color = ( isset($get_value['background-color']) ? $get_value['background-color'] : ( isset( $field['std']['background-color'] ) ? $field['std']['background-color'] : '' ) );
	$hex_color = '(([a-fA-F0-9]){3}){1,2}$';
	if ( preg_match( '/^' . $hex_color . '/i', $get_value_bg_color ) ){ // Value is just 123abc, so prepend #.
		$get_value_bg_color = '#' . $get_value_bg_color;
	}elseif ( ! preg_match( '/^#' . $hex_color . '/i', $get_value_bg_color ) ){ // Value doesn't match #123abc, so sanitize to just #.
		$get_value_bg_color = "#";
	}

	echo '<tr>';
		echo '<th scope="row"><label for="' . $field['id'] . '">' . $field['label'] . '</label></th>';
		echo '<td' . ( isset($field['class']) && !empty($field['class']) ? ' class="' . $field['class'] . '"' : '' ) . '>';

			// build background colorpicker
        	echo '<div class="option-tree-ui-colorpicker-input-wrap">';
				echo '<input class="mblzr_colorpicker mblzr_text_small" size="20" type="text" name="' . $field['name'] . '[background-color]" id="' . $field['id'] . '-colorpicker" value="' . $get_value_bg_color . '" />';
			echo '</div>';

			/*echo '<input size="45" name="' . $field['name'] . '" id="' . $field['id'] . '" type="text" value="' . ( $get_value != "" ? stripslashes($get_value) : stripslashes($field['std']) ) . '" />';*/


			echo '<div class="select-group">';


				// build background repeat
				$background_repeat = ( isset( $get_value['background-repeat'] ) ? esc_attr( $get_value['background-repeat'] ) : ( isset( $field['std']['background-repeat'] ) ? $field['std']['background-repeat'] : '' ) );

				?><select name="<?php echo $field['name']; ?>[background-repeat]" id="<?php echo $field['id']; ?>-repeat"><?php

					echo '<option value="">background-repeat</option>';

					foreach ( mblzr_returns_background_repeat( $field['id'] ) as $key => $option ) {
						echo '<option value="' . esc_attr( $key ) . '" ' . selected( $background_repeat, $key, false ) . '>' . esc_attr( $option ) . '</option>';
					}

				?></select><?php


				// build background attachment
				$background_attachment = ( isset( $get_value['background-attachment'] ) ? esc_attr( $get_value['background-attachment'] ) : ( isset( $field['std']['background-attachment'] ) ? $field['std']['background-attachment'] : '' ) );

				?><select name="<?php echo $field['name']; ?>[background-attachment]" id="<?php echo $field['id']; ?>-attachment"><?php

					echo '<option value="">background-attachment</option>';

					foreach ( mblzr_returns_background_attachment( $field['id'] ) as $key => $option ) {
						echo '<option value="' . esc_attr( $key ) . '" ' . selected( $background_attachment, $key, false ) . '>' . esc_attr( $option ) . '</option>';
					}

				?></select><?php


				// build background position
				$background_position = ( isset( $get_value['background-position'] ) ? esc_attr( $get_value['background-position'] ) : ( isset( $field['std']['background-position'] ) ? $field['std']['background-position'] : '' ) );

				?><select name="<?php echo $field['name']; ?>[background-position]" id="<?php echo $field['id']; ?>-position"><?php

					echo '<option value="">background-position</option>';

					foreach ( mblzr_returns_background_position( $field['id'] ) as $key => $option ) {
						echo '<option value="' . esc_attr( $key ) . '" ' . selected( $background_position, $key, false ) . '>' . esc_attr( $option ) . '</option>';
					}

				?></select><?php



			echo '</div>';

			// build background image
			echo '<div class="mblzr-upload-parent">';

				$background_image = ( isset( $get_value['background-image'] ) ? esc_attr( $get_value['background-image'] ) : ( isset( $field['std']['background-image'] ) ? $field['std']['background-image'] : '' ) );

				echo '<input class="mblzr_upload_file" type="text" size="45" id="' . $field['id'] . '" name="' . $field['name'] . '[background-image]" value="' . $background_image . '" />';
				echo '<input class="mblzr_upload_button button" type="button" value="Upload File" />';
				echo '<input class="mblzr_upload_file_id" type="hidden" id="' . $field['id'] . '_id" name="' . $field['name'] . '_id" value="" />';

				echo '<div id="' . $field['id'] . '_status" class="mblzr_media_status">';
				if ( !empty($background_image) ) {
					$check_image = preg_match( '/(^.*\.jpg|jpeg|png|gif|ico*)/i', $background_image );
					if ( $check_image ) {
						echo '<div class="img_status">';
							echo '<img src="' . $background_image . '" style="max-width:600px;height:auto;" alt="" />';
							echo '<div class="clear"></div>';
							echo '<a href="#" class="mblzr_remove_file_button" rel="' . $field['id'] . '">Remove Image</a>';
						echo '</div>';
					} else {
						$parts = explode( '/', $get_value );
						for( $i = 0; $i < count( $parts ); ++$i ) {
							$title = $parts[$i];
						}
						echo 'File: <strong>' . $title . '</strong>&nbsp;&nbsp;&nbsp; (<a href="' . $background_image . '" target="_blank" rel="external">Download</a> / <a href="#" class="mblzr_remove_file_button" rel="' . $field['id'] . '">Remove</a>)';
					}
				}
				echo '</div>';

			echo '</div>';


		echo '</td>';
	echo '</tr>';

	echo mblzr_end_option_separator( $field['desc'] );

break;

////////////////////////////////////////////////////////////////////////////


// Adding your own field types
default:
	do_action('mblzr_render_' . $field['type'] , $field, $get_value);

/*
if( is_admin() ) {
	add_action( 'mblzr_render_custom_field_type', 'custom_theme_mblzr_render_custom_field_type', 10, 2 );
	function custom_theme_mblzr_render_custom_field_type( $field, $get_value ) {

	    echo '<tr>';
			echo '<th scope="row"><label for="' . $field['id'] . '">' . $field['label'] . '</label></th>';
			echo '<td' . ( isset($field['class']) && !empty($field['class']) ? ' class="' . $field['class'] . '"' : '' ) . '>';
				echo '<input type="text" name="' . $field['name'] . '" id="' . $field['id'] . '" value="' . ( isset($get_value) && !empty($get_value) ? $get_value : $field['std'] ) . '" />';
	  		echo '</td>';
	    echo '</tr>';

		echo mblzr_end_option_separator( $field['desc'] );
	}
}

if( is_admin() ) {
	add_filter( 'mblzr_validate_custom_field_type', 'custom_theme_mblzr_validate_custom_field_type' );
	function custom_theme_mblzr_validate_custom_field_type( $string, $field = array() ) {
	    if( empty( $string ) ){ $string = ""; }
	    return $string;
	}
}
*/






















}

}}


