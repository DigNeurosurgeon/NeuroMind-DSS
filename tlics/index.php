<?php 

/* Init page */
require('../ui.php');
begin_document('');

/* EULA */
show_info('Classification system for thoracolumbar spine injury', 'Vaccaro, A. R., Lehman, R. A., Hurlbert, R. J., Anderson, P. A., Harris, M., Hedlund, R., et al. (2005). A new classification of thoracolumbar injuries: the importance of injury morphology, the integrity of the posterior ligamentous complex, and neurologic status. Spine, 30(20), 2325-2333.');

/* Content */
begin_page_content('start', 'Select risk items');

    begin_form('index_ra.php');
    
    	// Morphology
        begin_form_elements('Morphology:');
            add_radiobutton('no_abnormality', 'No abnormality', 'morphology');
            add_radiobutton('compression', 'Compression', 'morphology');
            add_radiobutton('burst', 'Compression with burst', 'morphology');
            add_radiobutton('rotation_translation', 'Rotation / translation', 'morphology');
            add_radiobutton('distraction', 'Distraction', 'morphology');
        end_form_elements();
        
        // DLC
        begin_form_elements('Posterior ligamentous complex:');
            add_radiobutton('intact', 'Intact', 'plc');
            add_radiobutton('indeterminate', 'Suspected / indeterminate', 'plc');
            add_radiobutton('injured', 'Injured', 'plc');
        end_form_elements();
        
        // Neurology
        begin_form_elements('Neurological status:');
            add_radiobutton('intact', 'Intact', 'neurol');
            add_radiobutton('root_injury', 'Root injury', 'neurol');
            add_radiobutton('complete_cord_injury', 'Complete cord injury', 'neurol');
            add_radiobutton('incomplete_cord_injury', 'Incomplete cord injury', 'neurol');
            add_radiobutton('cauda', 'Cauda equina', 'neurol');
        end_form_elements();
     
        
        add_submit_button('Submit');
    end_form();
end_page_content();


/* Finish */
end_document();

?>