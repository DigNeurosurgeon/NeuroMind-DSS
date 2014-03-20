<?php

/* Init page */
require('../ui.php');
begin_document('');

/* Content */
begin_page_content('risk_assessment', 'Treatment suggestion');

	/* First check if all parameters are set */
	if ( isset($_POST['size']) && isset($_POST['eloquence']) && isset($_POST['drainage']) ) { 

		/* Process input from form */	
		switch ($_POST['size']) {
			case '_3':
				$size = 1;
				break;
			case '3_6':
				$size = 2;
				break;
			case '6_':
				$size = 3;
				break;
			
		} 
		
		switch ($_POST['eloquence']) {
			case 'yes':
				$eloquence = 1;
				break;
			default:
				$eloquence = 0;
				break;
		} 
		
		switch ($_POST['drainage']) {
			case 'yes':
				$drainage = 1;
				break;
			default:
				$drainage = 0;
				break;
		} 
		
		
		/* generate sum score */
		$sum_score = $size + $eloquence + $drainage;
		
		/* calculate risk and store in variables */		
		if ($sum_score < 3) {
			// Class A
			$sp_class 	= 'A';
			$treatment 	= 'microsurgical resection';
			$deficit	= '8% (6% - 10%)';
			
		} else if ($sum_score == 3) {
			// Class B
			$sp_class 	= 'B';
			$treatment	= 'multimodality treatment';
			$deficit	= '18% (15% - 22%)';
		
		} else {
			// Class C
			$sp_class 	= 'C';
			$treatment	= 'no treatment, with exception of recurrent hemorrhages, progressive neurological deficits, steal-related symptoms, and AVM-related aneurysms.';
			$deficit	= '32% (27% - 38%)';
			
		}
		
		/* give output to user */
		add_paragraph('<h3>The treatment suggestion is: ' . $treatment . '</h3>');
		add_paragraph('<h4>The Spetzler-Ponce class is: ' . $sp_class . '</h4>');
		add_paragraph('<h4>The Spetzler-Martin grade is: ' . $sum_score . '</h4>');
		
		/* summarize input */
		$risk_factors  = '<p>based on these parameters: <ul>'; 
		$risk_factors .= '<li>Size: ' . $_POST['size'] . '</li>';
		$risk_factors .= '<li>Eloquence: ' . $_POST['eloquence'] . '</li>';
		$risk_factors .= '<li>Deep venous drainage: ' . $_POST['drainage'] . '</li>';
		$risk_factors .= '</ul></p>';
		echo $risk_factors;
		
	} else {
		// Not all parameters set, so refuse to continue
		add_paragraph('Not all parameters have been set. Please answer all items.');
		add_button('javascript:history.go(-1)', 'false', 'Return to questions');
	}

end_page_content();

/* Finish */
end_document();

?>