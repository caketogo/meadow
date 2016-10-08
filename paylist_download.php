<?php
	mysql_connect("localhost", "webuser", "iTsS3cuR3pIN") or
		die("Could not connect: " . mysql_error());
	mysql_select_db("container");
	
	$result = mysql_query("SELECT a.*, b.first_name, b.sur_name  FROM tbl_payment_history as a JOIN  tbl_customer as b  ON a.customer_id = b.id ");

	$output	   = "";
	$output    ="S.No\tContainer name\tContainer type\tContainer number\tDue date\tRelated period\tDate paid\tLicense\tdeposit\tMiscellaneous\tPenality\tTotalamount due\tPayment type"; 
	$output .="\n";
	$s_no	=	1;	
	$customername	=	'Dony';	
	
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			
			$output				.=	$s_no."\t";
			$output				.=	$row['first_name']."\t";
			$output				.=	$row['container_type']."\t";
			$output				.=	$row['container_number']."\t"; 
			$output				.=	$row['due_date']."\t";
			$output				.=	$row['related_period']."\t";
			$output				.=	$row['date_paid']."\t"; 
			$output				.=	$row['license']."\t";
			$output				.=	$row['deposit']."\t";
			$output				.=	$row['miscellaneous']."\t";
			$output				.=	$row['penality']."\t";
			$output				.=	$row['total_amount_due']."\t";
			$output				.=	$row['payment_type']."\t";
			$output .="\n";
			$s_no++;	
	}
	
	header('Content-type: application/xls');
	header('Content-Disposition: attachment; filename="Payment_Receipts.xls"');
	echo $output;
	exit;
						
	?>

	