<?php

/* Init page */
require('../ui.php');
begin_document('');

/* Content */
begin_page_content('risk_assessment', 'Success rate');

	/* First check if all parameters are set */
	if ( isset($_POST['age']) && isset($_POST['etiology']) && isset($_POST['previous_shunt'])  ) { 

		/* Process input from form */	
		switch ($_POST['age']) {
			case 'lessthan1month':
				$age = 0;
				break;
			case 'lessthan1month':
				$age = 10;
				break;
			case 'lessthan1month':
				$age = 30;
				break;
			case 'lessthan1month':
				$age = 40;
				break;
			case 'lessthan1month':
				$age = 50;
				break;
			
		} 
		
		switch ($_POST['etiology']) {
			case 'post_infect':
				$etiology = 0;
				break;
			case 'mmc':
			case 'ivh':
			case 'non_tectal_tumor':
				$etiology = 20;
				break;
			case 'aqueduct':
			case 'tectal_tumor':
			case 'other':
				$etiology = 30;
				break;
							
		} 
		
		switch ($_POST['previous_shunt']) {
			case 'yes':
				$previous_shunt = 0;
				break;
			case 'no':
				$previous_shunt = 10;
				break;
		} 
		
		
		/* generate sum score */
		$sum_score = $age + $etiology + $previous_shunt;
		
		/* generate advise */
		if ($sum_score <= 30) {					// lowest
			$etv_success_rate = '0 - 0.25';
			
		} else if ($sum_score >= 70) {			// highest
			$etv_success_rate = '0.7 - 0.9';
			
		} else {								// middle
			$etv_success_rate = '0.45 - 0.55';
		}
		
		/* give output to user */
		add_paragraph('<h3>Estimated ETV success rate is: ' . $etv_success_rate . '%</h3>');

		
		/* summarize input */
		$risk_factors  = '<p>based on these parameters: <ul>'; 
		$risk_factors .= '<li>Age: ' . $_POST['age'] . '</li>';
		$risk_factors .= '<li>Etiology: ' . $_POST['etiology'] . '</li>';
		$risk_factors .= '<li>Previous shunt: ' . $_POST['previous_shunt'] . '</li>';
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