<?php 

/* Init page */
require('../ui.php');
begin_document('');

/* EULA */
show_info('Classification system for subaxial cervical spine injury', 'Vaccaro, A. R., Hulbert, R. J., Patel, A. A., Fisher, C., Dvorak, M., Lehman, R. A., et al. (2007). The subaxial cervical spine injury classification system: a novel approach to recognize the importance of morphology, neurology, and integrity of the disco-ligamentous complex. Spine, 32(21), 2365-2374.');

/* Content */
begin_page_content('start', 'Select risk items');

    begin_form('index_ra.php');
    
    	// Morphology
        begin_form_elements('Morphology:');
            add_radiobutton('no_abnormality', 'No abnormality', 'morphology');
            add_radiobutton('compression', 'Compression', 'morphology');
            add_radiobutton('burst', 'Compression with burst', 'morphology');
            add_radiobutton('distraction', 'Distraction', 'morphology');
            add_radiobutton('rotation_translation', 'Rotation / translation', 'morphology');
        end_form_elements();
        
        // DLC
        begin_form_elements('Disco-ligamentous complex:');
            add_radiobutton('intact', 'Intact', 'dlc');
            add_radiobutton('indeterminate', 'Indeterminate', 'dlc');
            add_radiobutton('disrupted', 'Disrupted', 'dlc');
        end_form_elements();
        
        // Neurology
        begin_form_elements('Neurological status:');
            add_radiobutton('intact', 'Intact', 'neurol');
            add_radiobutton('root_injury', 'Root injury', 'neurol');
            add_radiobutton('complete_cord_injury', 'Complete cord injury', 'neurol');
            add_radiobutton('incomplete_cord_injury', 'Incomplete cord injury', 'neurol');
            add_checkbox('continous_compression', 'Continious cord compression in setting of neuro deficit');
        end_form_elements();
     
        
        add_submit_button('Submit');
    end_form();
end_page_content();


/* Finish */
end_document();

?>