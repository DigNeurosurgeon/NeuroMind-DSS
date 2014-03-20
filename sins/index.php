<?php 

/* Init page */
require('../ui.php');
begin_document('');

/* EULA */
$descr = 'The Spine Instability Neoplastic Score (SINS) is a comprehensive classification system with ' .
		'content validity that can guide clinicians in identifying when patients with neoplastic disease ' .
		'of the spine may benefit from surgical consultation. It can also aid surgeons in assessing the ' .
		'key components of spinal instability due to neoplasia and may become a prognostic tool for ' .
		'surgical decision-making when put in context with other key elements such as neurologic symptoms, ' .
		'extent of disease, prognosis, patient health factors, oncologic subtype, and radiosensitivity of the tumor.';
		
$ref = 	'1. Fisher CG, DiPaola CP, Ryken TC, Bilsky MH, Shaffrey CI, Berven SH, et al. A novel classification system for ' . 
		'spinal instability in neoplastic disease: an evidence-based approach and expert consensus from the ' . 
		'Spine Oncology Study Group. Spine 2010; 35:E1221-9.<br/>' .
		'2. Fourney DR, Frangou EM, Ryken TC, DiPaola CP, Shaffrey CI, Berven SH, et al. Spinal instability neoplastic score: ' . 
		'an analysis of reliability and validity from the spine oncology study group. J Clin Oncol 2011; 29:3072-3077.';
		
show_info($descr, $ref);

/* Content */
begin_page_content('start', 'Select risk items');

    begin_form('index_ra.php');
    
    	// Location
        begin_form_elements('Location in spine:');
            add_radiobutton('junctional', 'Junctional (occiput-C2, C7-T2, T11-L1, L5-S1)', 'location');
            add_radiobutton('mobile', 'Mobile spine (C3-C6, L2-L4)', 'location');
            add_radiobutton('semirigid', 'Semirigid (T3-T10)', 'location');
            add_radiobutton('rigid', 'Rigid (S2-S5)', 'location');
        end_form_elements();
        
        // Pain
        begin_form_elements('Pain:');
        	add_hint('pain improvement with recumbency and/or pain with movement/loading of spine');
            add_radiobutton('yes', 'Yes', 'pain');
            add_radiobutton('occasional', 'Occasional pain but not mechanical', 'pain');
            add_radiobutton('no', 'Pain-free lesion', 'pain');
        end_form_elements();
        
        // Bone
        begin_form_elements('Bone lesion:');
            add_radiobutton('lytic', 'Lytic', 'bone');
            add_radiobutton('mixed', 'Mixed (lytic/blastic)', 'bone');
            add_radiobutton('blastic', 'Blastic', 'bone');
        end_form_elements();
        
        // Alignment
        begin_form_elements('Radiographic spinal aligment:');
            add_radiobutton('sublux_trans', 'Subluxation/translation present', 'alignment');
            add_radiobutton('kyph_scol', 'De novo deformity (kyphosis/scoliosis)', 'alignment');
            add_radiobutton('normal', 'Normal alignment', 'alignment');
        end_form_elements();
        
        // Vertebral body
        begin_form_elements('Vertebral body collapse:');
            add_radiobutton('50_', '&gt; 50% collapse', 'vertebral_body');
            add_radiobutton('_50', '&lt; 50% collapse', 'vertebral_body');
            add_radiobutton('no_collapse', 'No collapse with &gt; 50% body involved', 'vertebral_body');
            add_radiobutton('none', 'None of the above', 'vertebral_body');
        end_form_elements();
        
        // Other
        begin_form_elements('Posterolateral involvement of spinal elements:');
        	add_hint('facet, pedicle, or costovertebral joint fracture or replacement with tumor');
            add_radiobutton('bilateral', 'Bilateral', 'other');
            add_radiobutton('unilateral', 'Unilateral', 'other');
            add_radiobutton('none', 'None of the above', 'other');
        end_form_elements();
     
        
        add_submit_button('Submit');
    end_form();
end_page_content();


/* Finish */
end_document();

?>