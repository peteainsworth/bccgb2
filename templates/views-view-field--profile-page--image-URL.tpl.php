<?php
 /**
  * This template is used to print a single field in a view. It is not
  * actually used in default Views, as this is registered as a theme
  * function which has better performance. For single overrides, the
  * template is perfectly okay.
  *
  * Variables available:
  * - $view: The view object
  * - $field: The field handler object that can process the input
  * - $row: The raw SQL result that can be used
  * - $output: The processed output that will normally be used.
  *
  * When fetching output from the $row, this construct should be used:
  * $data = $row->{$field->field_alias}
  *
  * The above will guarantee that you'll always get the correct data,
  * regardless of any changes in the aliasing that might happen if
  * the view is modified.
  */
  
	$output = ''; if($row->civicrm_contact_image_url) {
	$fileNameArray = explode("/",$row->civicrm_contact_image_url);
	// get last item in array
	$filename = end($fileNameArray);
	$filename = urldecode($filename);
	// set path to your drupal default files civicrm directory
	$drupalDefaultPath = "webform/civicrm/custom/".$filename;
	// Set image styles
	$output = theme('image_style',
		array(
			'style_name' => 'profile-picture',
			'path' => $drupalDefaultPath,
			'attributes' => array(
				'class' => 'profile-picture',
			)
		)
	);
}
print $output;
?>
