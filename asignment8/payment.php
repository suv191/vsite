

		<?php 	
			$Amount = $_POST["data"];

			list($Principal, $Interest) = explode('|', $Amount);

			$monthly_payment = ($Principal * ($Interest / 100)) / 12 ;
			
			$msg = "ERROR: ";
			$errCount = 0;

			if (empty($Principal)) {
				$msg .= "<br><span class='errmsg'>You must enter a Amount<span>";
				$errCount++;
			}
			else {
				if (!is_numeric($Principal)) {
					$msg .= "<br><span class='errmsg'>The Amount must be numeric<span>";
					$errCount++;
				}
			}

			if (empty($Interest)) {
				$msg .= "<br><span class='errmsg'>You must enter a Interest<span>";
				$errCount++;
			}
			elseif (!is_numeric($Interest)) {
				$msg .= "<br><span class='errmsg'>The Interest must be numeric<span>";
				$errCount++;
			}

		if ($errCount>0) {
			# code...
			print $msg;
		} else {
			# code...
			$final = number_format($monthly_payment,2); 
			print $final;
		
		}
		
		
		?>
