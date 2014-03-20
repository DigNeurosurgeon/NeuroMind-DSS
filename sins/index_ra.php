<?php

/* Init page */
require('../ui.php');
begin_document('');

/* Content */
begin_page_content('risk_assessment', 'SINS');

	/* First check if all parameters are set */
	if ( isset($_POST['location']) && isset($_POST['pain']) && isset($_POST['bone']) &&
		 
		 isset($_POST['alignment']) && isset($_POST['vertebral_body']) && isset($_POST['other']) 		) { 

		/* Process input from form */	
		switch ($_POST['alignment']) {
			case 'junctional':
				$alignment = 3;
				break;
			case 'mobile':
				$alignment = 2;
				break;
			case 'semirigid':
				$alignment = 1;
				break;
			case 'rigid':
				$alignment = 0;
				break;
			
		}	
		
		switch ($_POST['pain']) {
			case 'yes':
				$pain = 3;
				break;
			case 'occasional':
				$pain = 1;
				break;
			case 'no':
				$pain = 0;
				break;
			
		}
		
		switch ($_POST['bone']) {
			case 'lytic':
				$bone = 2;
				break;
			case 'mixed':
				$bone = 1;
				break;
			case 'blastic':
				$bone = 0;
				break;
			
		}
		
		switch ($_POST['alignment']) {
			case 'sublux_trans':
				$alignment = 4;
				break;
			case 'kyph_scol':
				$alignment = 2;
				break;
			case 'normal':
				$alignment = 0;
				break;
			
		}
		
		switch ($_POST['vertebral_body']) {
			case '50_':
				$vertebral_body = 3;
				break;
			case '_50':
				$vertebral_body = 2;
				break;
			case 'no_collapse':
				$vertebral_body = 1	;
				break;
			case 'none':
				$vertebral_body = 0;
				break;
			
		}
		
		switch ($_POST['other']) {
			case 'bilateral':
				$other = 3;
				break;
			case 'unilateral':
				$other = 1;
				break;
			case 'none':
				$other = 0;
				break;
			
		}
		
		
		/* generate sum score */
		$sum_score = $location + $pain + $bone + $alignment + $vertebral_body + $other;
		
		/* calculate risk */
		if ($sum_score < 7) {
			// SINS 0-6 is stable
			$conclusion 	= 'stable';
			$surg_consult  	= false;
			
		} else if ($sum_score > 12) {
			// SINS 13 - 18 is instable
			$conclusion = 'instable';
			$surg_consult  	= true;
			
		} else {
			// SINS 7-12 is indeterminate
			$conclusion = 'indeterminate (possibly impending) instability';
			$surg_consult  	= true;
		
		}
		
		/* give output to user */
		add_paragraph('<h3>The conclusion for this lesion is: ' . $conclusion . '</h3>');
		add_paragraph('<h4>Score is: ' . $sum_score . '</h4>');
		
		if ($surg_consult) {
			add_paragraph('<h4>Surgical consultation is warranted.</h4>');
		}
		
		/* summarize input */
		$risk_factors  = '<p>based on these parameters: <ul>'; 
		$risk_factors .= '<li>Location: ' . $_POST['location'] . '</li>';
		$risk_factors .= '<li>Pain: ' . $_POST['pain'] . '</li>';
		$risk_factors .= '<li>Bone lesion: ' . $_POST['bone'] . '</li>';
		$risk_factors .= '<li>Alignment: ' . $_POST['alignment'] . '</li>';
		$risk_factors .= '<li>Vertebral body collapse	: ' . $_POST['vertebral_body'] . '</li>';
		$risk_factors .= '<li>Posterolateral involvement: ' . $_POST['other'] . '</li>';
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