<?php 

/* Init page */
require('../ui.php');
begin_document('');

/* EULA */
show_info('DESCRIPTION', 'REFERENCE');

/* Content */
begin_page_content('start', 'Select risk items');

    begin_form('index_ra.php');
    
    	// RADIOBUTTON_CHECKBOX
        begin_form_elements('GROUP_TEXT:');
            add_radiobutton('NAME', 'DISPLAY_TEXT', 'GROUP_NAME');
            add_checkbox('NAME', 'DISPLAY_TEXT');
        end_form_elements();
     
        
        add_submit_button('Submit');
    end_form();
end_page_content();


/* Finish */
end_document();

?>