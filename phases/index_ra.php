<?php

/* Init page */
require('../ui.php');
begin_document('');

/* Content */
begin_page_content('risk', '5yr rupture risk');

	/* First check if all parameters are set */
	if ( isset($_POST['population']) && isset($_POST['hypertension']) && isset($_POST['age']) && 
			isset($_POST['size']) && isset($_POST['earlier_sah']) && isset($_POST['site']) ) { 

		/* Process input from form */	
		switch ($_POST['population']) {
			case 'us_eu':
				$population = 0;
				break;
			case 'jap':
				$population = 3;
				break;
			case 'fin':
				$population = 5;
				break;
		} 
		
		switch ($_POST['hypertension']) {
			case 'no':
				$hypertension = 0;
				break;
			case 'yes':
				$hypertension = 1;
				break;
		}
		
		switch ($_POST['age']) {
			case 'under_70':
				$age = 0;
				break;
			case '70_or_more':
				$age = 1;
				break;
		}
		
		switch ($_POST['size']) {
			case 'under_7.0':
				$size = 0;
				break;
			case '7.0-9.9':
				$size = 3;
				break;
			case '10.0-19.9':
				$size = 6;
				break;
			case 'over_20.0':
				$size = 10;
				break;
		}
		
		switch ($_POST['earlier_sah']) {
			case 'no':
				$earlier_sah = 0;
				break;
			case 'yes':
				$earlier_sah = 1;
				break;
		}
		
		switch ($_POST['site']) {
			case 'ica':
				$site = 0;
				break;
			case 'mca':
				$site = 2;
				break;
			case 'aca':
			case 'pcom_post':
				$site = 4;
				break;
		}
		
		
		/* generate sum score */
		$phasesScore = $population + $hypertension + $age + $size + $earlier_sah + $site;
		
		/* calculate risk */
		switch ($phasesScore) {
			case 0:
			case 1:
			case 2:
				$risk = 0.4;
				break;
			case 3: 
				$risk = 0.7;
				break;
			case 4:
				$risk = 0.9;
				break;
			case 5: 
				$risk = 1.3;
				break;
			case 6:
				$risk = 1.7;
				break;
			case 7:
				$risk = 2.4;
				break;
			case 8:
				$risk = 3.2;
				break;
			case 9:
				$risk = 4.3;
				break;
			case 10:
				$risk = 5.3;
				break;
			case 11:
				$risk = 7.2;
				break;
			default: 			// meaning score 12 or larger
				$risk = 17.8; 
				break;
		}
		
		/* give output to user */
		add_paragraph('<h3>The 5-year risk of aneurysm rupture is: ' . $risk . '%</h3>');
		add_paragraph('<h4>PHASES risk score is: ' . $phasesScore . '</h4>');
		
		/* summarize input */
		$riskFactors  = '<p>based on these parameters: <ul>'; 
		$riskFactors .= '<li>Population: ' . $_POST['population'] . '</li>';
		$riskFactors .= '<li>Hypertension: ' . $_POST['hypertension'] . '</li>';
		$riskFactors .= '<li>Age: ' . $_POST['age'] . '</li>';
		$riskFactors .= '<li>Size: ' . $_POST['size'] . '</li>';
		$riskFactors .= '<li>Earlier SAH: ' . $_POST['earlier_sah'] . '</li>';
		$riskFactors .= '<li>Site: ' . $_POST['site'] . '</li>';
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