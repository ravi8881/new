<?php
require_once '../includes/global.inc.php';
if (!isset($_POST['action'])) { // if page is not submitted to itself echo the form
 	include( "header.php");
 ?>

<tr>

<td style="background-color:rgb(255, 255, 255);height:600px;width:300px;vertical-align:middle;">
	<?php

 	include( "navigationo.php");

 	$account_id=$_SESSION['staff_account_id'];
		$result=$db->getReferrals($account_id, '1');
 ?>
</td>
<td style="background-color:white;width:900px;text-align:top;float:left;">
<table style="margin: 40px 50px 40px;width:800px" cellpadding="0px" cellspacing="0px;" >
<tr><td >

                                    <span class="left-box"></span><span class="cent-box" style="width:758px;">View Referral to be sent</span><span class="right-box"></span>

                                </td></tr>

<tr><td>



<table class="main" style="width:100%;">

<!--

<tr >

<td><p>

<table style="width:100%;border-collapse:collapse" border="1" cellspacing="0" cellpadding="0" 	>

<tr class="bold">

<td>Status</td><td>Date Received</td><td>Patient Name</td><td>Referred By</td><td>Sex</td><td>DOB</td><td>Referral Info</td><td>Select</td></tr>

<tr><td>Pending</td><td>10/24/12</td><td>JONES, Mary</td><td>MARKIN, Dr. Laurie</td><td>F</td><td>01/26/67</td><td>MRI</td><td><input type="radio" name="type" value="practice"></td></tr>

<tr><td>Pending</td><td>10/23/12</td><td>WILLIAMS, Jennifer</td><td>BRODY, Dr. Joyce</td><td>F</td><td>04/21/72</td><td>Scan</td><td><input type="radio" name="type" value="practice"></td></tr>

<tr><td>Processing</td><td>10/22/12</td><td>BRADY, Bob</td><td>FUCHS, Dr. Glenn</td><td>M</td><td>03/04/65</td><td>Knee</td><td><input type="radio" name="type" value="practice"></td></tr>

<tr><td>Verified</td><td>10/21/12</td><td>WAGNER, Tom</td><td>KLETZ, Dr. Michael</td><td>M</td><td>10/12/73</td><td>Ankle</td><td><input type="radio" name="type" value="practice"></td></tr>

<tr><td>Appt Set</td><td>10/21/12</td><td>HODSOLL, Francis</td><td>FUCHS, Dr. Glenn</td><td>M</td><td>09/13/65</td><td>X-Ray</td><td><input type="radio" name="type" value="practice"></td></tr>

<tr><td>Closed</td><td>10/20/12</td><td>FRANKLIN, Teresa</td><td>AMIRY, Dr. Syed</td><td>T</td><td>11/14/53</td><td>Radiation</td><td><input type="radio" name="type" value="practice"></td></tr>

</table>

</p>

</td>

</tr>

 -->

 <tr >

<td><p>

<table class="viewRecords" style="width:100%;border-collapse:collapse" border="1" cellspacing="0" cellpadding="0" 	>

<tr class="bold">

<td>Status</td><td>Date sent</td><td>Patient Name</td><td>Referred To</td><td>Sex</td><td>DOB</td><td>Referral Info</td><td>Select</td></tr>

<?php

 while($row = mysql_fetch_array($result)){

 	echo "<tr>";

 	echo "<td>" . $row['description'] . "</td>";

 	echo "<td>" . $row['rfrng_date'] . "</td>";

 	echo "<td>" . $row['first_name'] .  $row['last_name'] . "</td>";

 	echo "<td>" . $row['fn'] . $row['ln'] . "</td>";

 	echo "<td>" . $row['gender_cd'] . "</td>";

 	echo "<td>" . $row['date_of_birth'] . "</td>";

 	echo "<td>" .  "</td>";



 	echo "<td><input type=\"radio\" name=\"dv_account_id\" value=\"" . $row['referral_id']. "\"><td>";

 	echo "</tr>";

 	}

?>

</table>

</p>

</td>

</tr>

<tr>

<td style="text-align:center" >

<div>

<p> <input type="submit" name="action" value="View Details" style="background-color: #4682B4;border-radius:5px;height: 35px; width: 100px"/>

</p>

</div>







</td></tr>

</table>

</td></tr></table>

</td>

</tr>





	<?php

 	include( "footer.php");

 ?>



</table>



</form>

</body>

</html>

<?php

} else {



	if(isset($_POST['action']))

	{

		if( $_POST['action']=='View Details') {

			$_SESSION['referral_id']=$_POST['dv_account_id'];

			$nextpage='viewreferral.php';

		}

		else if( $_POST['action']=='Cancel')

			$nextpage='organizationprofile.php';

	}

	header("location:".$nextpage);

	exit;

}

?>