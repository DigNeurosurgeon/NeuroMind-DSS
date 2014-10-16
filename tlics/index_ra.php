<?php

/* Init page */
require('../ui.php');
begin_document('');

/* Content */
begin_page_content('tlics_score', 'TLICS score');

	/* First check if all parameters are set */
	if ( isset($_POST['morphology']) && isset($_POST['plc']) && isset($_POST['neurol'])  ) { 

		/* Process input from form */	
		switch ($_POST['morphology']) {
			case 'no_abnormality':
				$morphology = 0;
				break;
			case 'compression':
				$morphology = 1	;
				break;
			case 'burst':
				$morphology = 2;
				break;
			case 'rotation_translation':
				$morphology = 3;
				break;
			case 'distraction':
				$morphology = 4;
				break;
		} 
		
		switch ($_POST['plc']) {
			case 'intact':
				$plc = 0;
				break;
			case 'indeterminate':
				$plc = 2;
				break;
			case 'injured':
				$plc = 3;
				break;	
		}
		
		switch ($_POST['neurol']) {
			case 'intact':
				$neurol = 0;
				break;
			case 'root_injury':
				$neurol = 2;
				break;
			case 'complete_cord_injury':
				$neurol = 2;
				break;
			case 'incomplete_cord_injury':
				$neurol = 3;
				break;
			case 'cauda':
				$neurol = 3;
				break;
		}		
		
		
		/* generate sum score */
		$sum_score = $morphology + $plc + $neurol;
		
		/* calculate risk */
		if ($sum_score < 4) {
			// conservative treatment
			$treatment = 'non-operative';
			
		} else if ($sum_score > 4) {
			// surgical treatment
			$treatment = 'operative';
			
		} else {
			// indeterminate
			$treatment = 'indeterminate';
			
		}
		
		/* give output to user */
		add_paragraph('<h3>The treatment suggestion is: ' . $treatment . '</h3>');
		add_paragraph('<h4>SLIC score is: ' . $sum_score . '</h4>');
		
		/* summarize input */
		$riskFactors  = '<p>based on these parameters: <ul>'; 
		$riskFactors .= '<li>Morphology: ' . $_POST['morphology'] . '</li>';
		$riskFactors .= '<li>PLC: ' . $_POST['plc'] . '</li>';
		$riskFactors .= '<li>Neurol status: ' . $_POST['neurol'] . '</li>';
		$riskFactors .= '</ul></p>';
		echo $riskFactors;
		
	} else {
		// Not all parameters set, so refuse to continue
		add_paragraph('Not all parameters have been set. Please answer all items.');
		add_button('javascript:history.go(-1)', 'false', 'Return to questions');
	}

end_page_content();

/* Finish */
end_document();

?>