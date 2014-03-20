<?php

/*
 *  Global variables
 */
// $themeTintColor = '#188A10';

/* 
 * Begin and end document 
 */
function begin_document($local_js_file) {
    if ($local_js_file != '') {
        $local_js = '<script src="' . $local_js_file . '"></script>'; // in same dir
    }
    
    // Create HTMl header
    $header_code = 
    '<!DOCTYPE html>' . 
    '<html>' .
    '<head>' .
    	'<title>Decision support</title>' .
    	'<meta name="viewport" content="width=device-width, initial-scale=1" />' .
    	'<link rel="stylesheet" href="../ui_jquery.min.css" />' .
    	'<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.1/jquery.mobile.structure-1.4.1.min.css" />'.
		'<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>'.
		'<script src="http://code.jquery.com/mobile/1.4.1/jquery.mobile-1.4.1.min.js"></script>'.
		'<style type=\'text/css\'>a:link, a:visited {color: #188A10;}</style>' .
    	$local_js . // if applicable, otherwise empty string
    '</head>' .
    '<body>';
    
    echo $header_code;
}


function end_document() {
    $footer_code = 
    '</body>' .
    '</html>';
    
    echo $footer_code;
}


/*
 * Begin and end page
 */
function begin_page_content($page_id, $header_title) {
    // Create div with page role including header
    echo '<!-- start new page -->' . 
        '<div data-role="page" id="' . $page_id . '">' .
            '<div data-role="header" data-theme="a">' .
                '<h1>' . $header_title . '</h1>' .
            '</div>' .
            
            '<div data-role="content">'; // end here, content comes from separate functions
}


function end_page_content() {
    // End content div
    echo '</div>';
    
    // End page div
    echo '</div> <!-- end page -->';
}


function add_hint($text) {
    echo '<h5><em>[' . $text . ']</em></h5>';
}


function add_paragraph($text) {
    echo '<p>' . $text . '</p>';
}


function add_paragraph_with_header($header_size, $header_text, $text) {
    echo '<h' . $header_size . '>' . $header_text . '</h' . $header_size . '>';
    echo '<p>' . $text . '</p>';
}


function add_button($url_link, $data_ajax_setting, $url_text) {
    echo '<p><a href="' . $url_link . '" data-ajax="' . $data_ajax_setting . '" data-role="button">' . $url_text . '</a></p>';
}



/*
 *  Show information & EULA
 */ 
function show_info($background_text, $reference_text) {
	begin_page_content('eula', 'Info');
		add_paragraph_with_header('4', 'Background', $background_text);
		add_paragraph_with_header('4', 'Reference', $reference_text);
		add_paragraph_with_header('4', 'Programming', 'The source code of this module is <a href="https://github.com/DigNeurosurgeon/NeuroMind-DSS">available online</a>.');
		add_paragraph_with_header('4', 'Disclaimer', 'You can use this module if you agree with the <a href="http://dign.eu/eula">end-user license agreement</a>.');
		add_button('#start', 'true', 'Agree &amp; continue');  // so next page must have "start" as id !!
	end_page_content();
} 


/*
 *  Show risk factors in separate view using a button
 */
function show_risk_factors($risk_factors_array) {
	add_button('#risk_factors', 'true', 'Show risk factors');
	begin_page_content('risk_factors', 'Risk factors');
		// use array to load unordered list for display
		// step 1: header text
		// step 2: list items from array
		// step 3: back button to Hide risk factors (do we need anchor or does go(-1) work as well... it's more independent)
	end_page_content();
}


/*
 *  Listview
 */
function begin_listview($list_divider_text) {
    echo '<ul data-role="listview" data-inset="false">'.
         '<li data-role="list-divider" data-theme="a">' . $list_divider_text . '</li>';
}


function end_listview() {
    echo '</ul>';
}


function add_listitem($url_link, $data_ajax_setting, $url_text) {
    // Use data-ajax = true for internal link, data-ajax = false for external (non-jQuery) link 
    echo '<li><a href="' . $url_link . '" data-ajax="' . $data_ajax_setting . '">' . $url_text . '</a></li>';
}



/*
 *  Begin and end form (belongs to content div)
 */ 
function begin_form($form_action_file) {
    echo '<form method="post" data-ajax="false" action="' . $form_action_file . '">';
}


function end_form() {
    echo '</form>';
}


/*
 *  Form items
 */
function begin_form_elements($legend_text) {
    echo '<fieldset data-role="controlgroup">'. 
         '<legend>' . $legend_text . '</legend>';
}


function end_form_elements() {
    echo '</fieldset><br/>';
}


function add_checkbox($id, $label_text) {
    echo '<label for="' . $id . '">' . $label_text . '</label>' .
         '<input type="checkbox" name="' . $id . '" id="' . $id . '" value = "' . $id . '">'; //$id . '">'; 
}


function add_radiobutton($id, $label_text, $group_name) {
    echo '<label for="' . $id . '">' . $label_text . '</label>' .
         '<input type="radio" name="' . $group_name . '" id="' . $id . '" value = "' . $id . '">';
}


function add_textarea($id) {
    echo '<textarea rows="5" cols="10" id="' . $id . '"></textarea>';
}


function add_submit_button($button_text) {
    echo '<input type="submit" data-theme="d" name="submit" id="submit" value="' . $button_text . '">';
}



?>