<?php 

/* Init page */
require('../ui.php');
begin_document('');

/* EULA */
show_info('A model to predict the probability of endoscopic third ventriculostomy (ETV) success in the treatment for hydrocephalus on the basis of a child\'s individual characteristics', 'Kulkarni, A. V., Drake, J. M., Mallucci, C. L., Sgouros, S., Roth, J., Constantini, S., Canadian Pediatric Neurosurgery Study Group. (2009). Endoscopic third ventriculostomy in the treatment of childhood hydrocephalus. The Journal of Pediatrics, 155(2), 254-9.');

/* Content */
begin_page_content('start', 'Select risk items');

    begin_form('index_ra.php');
    
    	// Age
        begin_form_elements('Age:');
            add_radiobutton('lessthan1month', '&lt; 1 month', 'age');
            add_radiobutton('1month_6months', '1 month - 6 months', 'age');
            add_radiobutton('6months_1year', '6 months - 1 year', 'age');
            add_radiobutton('1year_10years', '1 - 10 years', 'age');
            add_radiobutton('morethan10years', '&gt; 10 years', 'age');
        end_form_elements();
        
        // Etiology
        begin_form_elements('Etiology:');
            add_radiobutton('post_infect', 'Post-infectious', 'etiology');
            add_radiobutton('mmc', 'Myelomeningocele', 'etiology');
            add_radiobutton('ivh', 'Intraventricular hemorrhage', 'etiology');
            add_radiobutton('non_tectal_tumor', 'Non-tectal brain tumor', 'etiology');
            add_radiobutton('aqueduct', 'Aqueductal stenosis', 'etiology');
            add_radiobutton('tectal_tumor', 'Tectal tumor', 'etiology');
            add_radiobutton('other', 'Other', 'etiology');
        end_form_elements();
        
        // Previous shunt
        begin_form_elements('Previous shunt:');
            add_radiobutton('yes', 'Yes', 'previous_shunt');
            add_radiobutton('no', 'No', 'previous_shunt');
        end_form_elements();
     
        
        add_submit_button('Submit');
    end_form();
end_page_content();


/* Finish */
end_document();

?>