<?php 

/* Init page */
require('../ui.php');
begin_document('');

/* EULA */
show_info('To estimate 5-year aneurysm rupture risk by risk factor status.', 'Greving, J. P., Wermer, M. J. H., Brown, R. D., Morita, A., Juvela, S., Yonekura, M., et al. (2014). Development of the PHASES score for prediction of risk of rupture of intracranial aneurysms: a pooled analysis of six prospective cohort studies. Lancet Neurology, 13(1), 59-66. doi:10.1016/S1474-4422(13)70263-1');

/* Content */
begin_page_content('start', 'Select risk items');

    begin_form('index_ra.php');
    
    	// Population
        begin_form_elements('Population:');
            add_radiobutton('us_eu', 'North American / European (other than Finnish)', 'population');
            add_radiobutton('jap', 'Japanese', 'population');
            add_radiobutton('fin', 'Finnish', 'population');
        end_form_elements();
        
        // Hypertension
        begin_form_elements('Hypertension:');
            add_radiobutton('no', 'No', 'hypertension');
            add_radiobutton('yes', 'Yes', 'hypertension');
        end_form_elements();
        
        // Age
        begin_form_elements('Age:');
            add_radiobutton('under_70', '&lt; 70 years', 'age');
            add_radiobutton('70_or_more', '&#8805; 70 years', 'age');
        end_form_elements();
        
        // Size
        begin_form_elements('Size of aneurysm:');
            add_radiobutton('under_7.0', '&lt; 7.0 mm', 'size');
            add_radiobutton('7.0-9.9', '7.0 - 9.9 mm', 'size');
            add_radiobutton('10.0-19.9', '10.0 - 19.9 mm', 'size');
            add_radiobutton('over_20.0', '&#8805; 20 mm', 'size');
        end_form_elements();
        
        // Earlier SAH
        begin_form_elements('Earlier SAH from another aneurysm:');
            add_radiobutton('no', 'No', 'earlier_sah');
            add_radiobutton('yes', 'Yes', 'earlier_sah');
        end_form_elements();
        
        // Site
        begin_form_elements('Site of aneurysm:');
            add_radiobutton('ica', 'Internal Carotid Artery', 'site');
            add_radiobutton('mca', 'Medial Cerebral Artery', 'site');
            add_radiobutton('aca', 'Anterior Cerebral Artery', 'site');
            add_radiobutton('pcom_post', 'Posterior Cerebral / Communicating Artery', 'site');
        end_form_elements();
        
        add_submit_button('Submit');
    end_form();
end_page_content();


/* Finish */
end_document();

?>