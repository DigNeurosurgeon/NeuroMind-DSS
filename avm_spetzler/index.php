<?php 

/* Init page */
require('../ui.php');
begin_document('');

/* EULA */
show_info('A 3-tier grading system for AVM classification and treatment.', 'Spetzler RF, Ponce FA. A 3-tier classification of cerebral arteriovenous malformations. Clinical article. J Neurosurg 2011; 114:842-849.');

/* Content */
begin_page_content('start', 'Select risk items');

    begin_form('index_ra.php');
    
    	// Size
        begin_form_elements('AVM size:');
            add_radiobutton('_3', '&lt; 3 cm', 'size');
            add_radiobutton('3_6', '3 - 6 cm', 'size');
            add_radiobutton('6_', '&gt; 6 cm', 'size');
        end_form_elements();
        
        // Eloquence
        begin_form_elements('Eloquent location:');
            add_radiobutton('yes', 'Yes', 'eloquence');
            add_radiobutton('no', 'No', 'eloquence');
        end_form_elements();
        
        // Drainage
        begin_form_elements('Deep venous drainage:');
            add_radiobutton('yes', 'Yes', 'drainage');
            add_radiobutton('no', 'No', 'drainage');
        end_form_elements();
     
        
        add_submit_button('Submit');
    end_form();
end_page_content();


/* Finish */
end_document();

?>