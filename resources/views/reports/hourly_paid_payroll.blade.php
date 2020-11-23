<?php
$query = $_GET['query'];
$query2 = $_GET['query2'];

header("Content-Type: application/vnd.ms-excel");
header("Content-disposition: attachment; filename=Hourly_Paid_Payroll.xls");

echo '<html>';
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">";
echo '<br /><br />';
echo '<body style="background-color: #eeeeee;">';
echo '<br><br><table border="1" style="font-family: tahoma, sans-serif; font-size:12px;">';
echo '<tr bgcolor="#dddddd">';
echo '<td style="width:60px; vertical-align:middle;" align="center"><b>Job Ref</b></td>';
echo '<td style="width:100px; vertical-align:middle;"align="center"><b>Project</b></td>';
echo '<td style="width:100px; vertical-align:middle;"align="center"><b>Client</b></td>';
echo '<td style="width:150px; vertical-align:middle;" align="center"><b>Location</b></td>';
echo '<td style="width:60px; vertical-align:middle;"align="center"><b>Postcode</b></td>';
echo '<td style="width:75px; vertical-align:middle;"align="center"><b>WC Date</b></td>';
//echo '<td style="width:100px; vertical-align:middle;"align="center"><b>Telephone</b></td>';
echo '<td style="width:150px; vertical-align:middle;"align="center"><b>Name</b></td>';
echo '<td style="width:60px; vertical-align:middle;"align="center"><b>Status</b></td>';
echo '<td style="width:65px; vertical-align:middle;"align="center"><b>Company</b></td>';
echo '<td style="width:50px; vertical-align:middle;" align="center"><b>Rate</b></td>';
echo '<td style="width:50px; vertical-align:middle;" align="center"><b>Shift</b></td>';
echo '<td style="width:50px; vertical-align:middle;" align="center"><b>Mon</b></td>';
echo '<td style="width:50px; vertical-align:middle;" align="center"><b>Tue</b></td>';
echo '<td style="width:50px; vertical-align:middle;" align="center"><b>Wed</b></td>';
echo '<td style="width:50px; vertical-align:middle;" align="center"><b>Thu</b></td>';
echo '<td style="width:50px; vertical-align:middle;" align="center"><b>Fri</b></td>';
echo '<td style="width:50px; vertical-align:middle;" align="center"><b>Sat</b></td>';
echo '<td style="width:50px; vertical-align:middle;" align="center"><b>Sun</b></td>';
echo '<td style="width:100px; vertical-align:middle;" align="center"><b>Total Hours</b></td>';
echo '<td style="width:100px; vertical-align:middle;" align="center"><b>Total Pay</b></td>';



echo '<br />';
echo '</tr>';
require_once ('cast_db_connect.php'); // Connect to the db.

		$q = "SELECT * FROM schedule 
		LEFT JOIN scores ON concat(schedule.pid, schedule.job_no) = scores.chk
		LEFT JOIN agency_uplift ON schedule.company = agency_uplift.agency
		WHERE schedule.wc_date like '%$query%' && schedule.job_no like '%$query2%' && schedule.status <>'' && schedule.visibility='1' ORDER BY schedule.rec_ord";
		$r = @mysqli_query ($dbc, $q); // Run the query
		
		
		while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		
		
		$a = $row['job_no'];
		$b = $row['project'];
		$c = $row['client'];
		$d = $row['location'];
		$e = $row['postcode'];
		$ff = $row['wc_date'];
		$h = $row['name'];
		$i = $row['status'];
		$j = $row['company'];
		$k = number_format((float)($row['rate']), 2);
		$m = $row['shift'];


		$n = $row['mon'];
		$o = $row['tue'];
		$p = $row['wed'];
		$s = $row['thu'];
		$t = $row['fri'];
		$u = $row['sat'];
		$v = $row['sun'];
		
		$hours = number_format((float)($n + $o + $p + $s + $t + $u + $v), 2);
		
		
		
		$ag = $row['agency'];
		
		$pay = number_format((float)($hours * $k),2);
		
		
		
		
		
		
		
		
		
		
		
		
		
echo '<tr>';
		echo '<td align="left">' . $a . '</td><td align="left">' . $b . '</td><td>' . $c . '</td><td align="left">' . $d . '</td><td align="left">' . $e . '</td>';
		echo '<td align="left">' . $ff . '</td><td align="left">' . $h . '</td><td align="left">' . $i . '</td><td align="left">' . $j . '</td>';
		echo '<td align="center" style="vnd.ms-excel.numberformat:0.00">' . $k . '</td><td align="center">' . $m . '</td><td align="center">' . $n . '</td><td align="center">' . $o . '</td>';
		echo '<td align="center">' . $p . '</td><td align="center">' . $s . '</td><td align="center">' . $t . '</td><td align="center">' . $u . '</td><td align="center">' . $v . '</td>';
		echo '<td align="center" style="vnd.ms-excel.numberformat:0.00">' . $hours . '</td><td align="center" style="vnd.ms-excel.numberformat:0.00">£' . $pay . '</td>'; // Revenue / Payroll 
		echo '<br />';
echo '</tr>';
		}
echo '</table>';
echo '</body>';
echo '</html>';