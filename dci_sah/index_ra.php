<?php

/* Init page */
require('../ui.php');
begin_document('');

/* Content */
begin_page_content('risk_assessment', 'Risk estimation');

	/* First check if all parameters are set */
	if ( isset($_POST['gcs']) && isset($_POST['age']) && isset($_POST['ivh']) && isset($_POST['sah'])  ) { 

		// Store risk in variable for final advise
		$dci_risk; // percentage
		
		// Determine upper or lower half of Fig 2
		if ($_POST['age'] == '55plus') { 						// upper half
			
			// Determine left or right quadrant
			if ($_POST['sah'] == 'thick') {						// up-right quarter
				
				// Determine left or right column
				if ($_POST['ivh'] == 'thick') {					// up-right, right column
				
					// Determine which row
					switch ($_POST['gcs']) {
						case '15':									// GCS 15
							$dci_risk = 27;
							break;
						case '13_14':								// GCS 13-14
							$dci_risk = 33;
							break;
						case '7_12':								// GCS 7-12
							$dci_risk = 36;
							break;
						case '3_6':									// GCS 3-6
							$dci_risk = 54;
							break;
					}
				
				} else {										// up-right, left column
					
					// Determine which row
					switch ($_POST['gcs']) {
						case '15':									// GCS 15
							$dci_risk = 19;
							break;
						case '13_14':								// GCS 13-14
							$dci_risk = 24;
							break;
						case '7_12':								// GCS 7-12
							$dci_risk = 26;
							break;
						case '3_6':									// GCS 3-6
							$dci_risk = 42;
							break;
					}
				}
				
			} else {											// up-left quarter
			
				// Determine left or right column
				if ($_POST['ivh'] == 'thick') {					// up-left, right column
				
					// Determine which row
					switch ($_POST['gcs']) {
						case '15':									// GCS 15
							$dci_risk = 17;
							break;
						case '13_14':								// GCS 13-14
							$dci_risk = 22;
							break;
						case '7_12':								// GCS 7-12
							$dci_risk = 24;
							break;
						case '3_6':									// GCS 3-6
							$dci_risk = 39;
							break;
					}
				
				} else {										// up-left, left column
					
					// Determine which row
					switch ($_POST['gcs']) {
						case '15':									// GCS 15
							$dci_risk = 12;
							break;
						case '13_14':								// GCS 13-14
							$dci_risk = 15;
							break;
						case '7_12':								// GCS 7-12
							$dci_risk = 17;
							break;
						case '3_6':									// GCS 3-6
							$dci_risk = 29;
							break;
					}
				}
			
			}
			
		} else { 												// lower half
			// Determine left or right quadrant
			if ($_POST['sah'] == 'thick') {						// low-right quarter
				
				// Determine left or right column
				if ($_POST['ivh'] == 'thick') {					// low-right, right column
				
					// Determine which row
					switch ($_POST['gcs']) {
						case '15':									// GCS 15
							$dci_risk = 33;
							break;
						case '13_14':								// GCS 13-14
							$dci_risk = 41;
							break;
						case '7_12':								// GCS 7-12
							$dci_risk = 43;
							break;
						case '3_6':									// GCS 3-6
							$dci_risk = 61;
							break;
					}
				
				} else {										// low-right, left column
					
					// Determine which row
					switch ($_POST['gcs']) {
						case '15':									// GCS 15
							$dci_risk = 24;
							break;
						case '13_14':								// GCS 13-14
							$dci_risk = 30;
							break;
						case '7_12':								// GCS 7-12
							$dci_risk = 33;
							break;
						case '3_6':									// GCS 3-6
							$dci_risk = 50;
							break;
					}
				}
				
			} else {											// low-left quarter
			
				// Determine left or right column
				if ($_POST['ivh'] == 'thick') {					// low-left, right column
				
					// Determine which row
					switch ($_POST['gcs']) {
						case '15':									// GCS 15
							$dci_risk = 22;
							break;
						case '13_14':								// GCS 13-14
							$dci_risk = 28;
							break;
						case '7_12':								// GCS 7-12
							$dci_risk = 30;
							break;
						case '3_6':									// GCS 3-6
							$dci_risk = 47;
							break;
					}
				
				} else {										// low-left, left column
					
					// Determine which row
					switch ($_POST['gcs']) {
						case '15':									// GCS 15
							$dci_risk = 15;
							break;
						case '13_14':								// GCS 13-14
							$dci_risk = 20;
							break;
						case '7_12':								// GCS 7-12
							$dci_risk = 22;
							break;
						case '3_6':									// GCS 3-6
							$dci_risk = 36;
							break;
					}
				}
			
			}
		}
		
		
		// Determine risk category for final advise
		$dci_risk_category;
		
		if ($dci_risk < 20) {					// Low risk
			$dci_risk_category = 'Low';
			
		} else if ($dci_risk > 40) {			// High risk
			$dci_risk_category = 'High';
			
		} else {								// Average risk
			$dci_risk_category = 'Average';
			
		}
		
		/* give output to user */
		add_paragraph('<h3>'. $dci_risk_category .' risk</h3>');
		add_paragraph('<h4>There is a ' . $dci_risk . '% probability of delayed cerebral ischemia after subarachnoid hemorrhage.</h4>');
		
		/* summarize input */
		$risk_factors  = '<p>based on these parameters: <ul>'; 
		$risk_factors .= '<li>GCS: ' . $_POST['gcs'] . '</li>';
		$risk_factors .= '<li>Age: ' . $_POST['age'] . '</li>';
		$risk_factors .= '<li>IVH: ' . $_POST['ivh'] . '</li>';
		$risk_factors .= '<li>SAH: ' . $_POST['sah'] . '</li>';
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