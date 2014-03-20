<?php 

/* Init page */
require('../ui.php');
begin_document('');

/* EULA */
show_info('A risk chart for prediction of delayed cerebral ischemia after aneurysmal subarachnoid hemorrhage based on admission characteristics.', 'de Rooij, N. K., Greving, J. P., Rinkel, G. J. E., & Frijns, C. J. M. (2013). Early Prediction of Delayed Cerebral Ischemia After Subarachnoid Hemorrhage: Development and Validation of a Practical Risk Chart. Stroke; a Journal of Cerebral Circulation, 44(5), 1288-1294.');

/* Content */
begin_page_content('start', 'Select risk items');

    begin_form('index_ra.php');
    
    	// GCS
        begin_form_elements('Glasgow Coma Scale:');
            add_radiobutton('15', '15', 'gcs');
            add_radiobutton('13_14', '13 - 14', 'gcs');
            add_radiobutton('7_12', '7 - 12', 'gcs');
            add_radiobutton('3_6', '3 - 6', 'gcs');
        end_form_elements();
        
        // Age 55+
        begin_form_elements('Age:');
	        add_radiobutton('lessthan55', '&lt; 55 years', 'age');
            add_radiobutton('55plus', '&#8805; 55 years', 'age');
        end_form_elements();
        
        // IVH
        begin_form_elements('Intraventricular hemorrhage thickness:');
        	$def_ivh = 	'Thick IVH: in case at least 1 of the 4 ventricles was completely filled with blood; ' .
        				'or in case at least 3 of the 4 ventricles contained a spot/sedimentation of blood; ' .
        				'or at least 1 of the 4 ventricles was partly filled with blood and another contained sedimentation';
        	add_hint($def_ivh);
            add_radiobutton('thin', 'Thin', 'ivh');
            add_radiobutton('thick', 'Thick', 'ivh');
        end_form_elements();
        
        // SAH
        begin_form_elements('Subarachnoid hemorrhage thickness:');
        	add_hint('Thick SAH: modified Fisher scale 3 or 4');
            add_radiobutton('thin', 'Thin', 'sah');
            add_radiobutton('thick', 'Thick', 'sah');
        end_form_elements();
     
        
        add_submit_button('Submit');
    end_form();
end_page_content();


/* Finish */
end_document();

?>