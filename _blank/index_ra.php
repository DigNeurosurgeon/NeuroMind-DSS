<?php

/* Init page */
require('../ui.php');
begin_document('');

/* Content */
begin_page_content('risk_assessment', 'NAME');

	/* First check if all parameters are set */
	if ( isset($_POST['NAME01']) && isset($_POST['NAME02'])  ) { 

		/* Process input from form */	
		switch ($_POST['NAME']) {
			case 'ITEM01':
				$var1 = 0;
				break;
			
		} 
		
		
		$_POST['ITEM02'] ? $var2 = 1 : $var2 = 0;
		
		
		
		/* generate sum score */
		$sum_score = $var1 + $var2;
		
		/* calculate risk */
		if ($sum_score > 0) {
			// Do something
			$treatment = 1;
		}
		
		/* give output to user */
		add_paragraph('<h3>The treatment suggestion is: ' . $treatment . '</h3>');
		add_paragraph('<h4>Score is: ' . $sum_score . '</h4>');
		
		/* summarize input */
		$risk_factors  = '<p>based on these parameters: <ul>'; 
		$risk_factors .= '<li>TEXT: ' . $_POST['NAME'] . '</li>';
		$risk_factors .= '<li>TEXT: ' . $_POST['NAME'] . '</li>';
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