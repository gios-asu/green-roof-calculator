<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<title>GBRL | Green Roof Calculator Results</title>

<script language="javascript" src="./scripts/chainedselects.js">
	/***********************************************
	* Chained Selects script- By Xin Yang (http://www.yxscripts.com/)
	* Script featured on/available at http://www.dynamicdrive.com/
	* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
	***********************************************/
</script>

<style type="text/css">
<!--
.style8 {color: #666666}
-->
</style>
<style type="text/css">
<!--
.style12 {color: #339900}
-->
</style>
<style type="text/css">
<!--
.style13 {color: #666666;
	font-size: 1.3em;
	font-family: garamond, georgia, serif;
}
-->
</style>
<style type="text/css">
<!--
-->
</style>
<style type="text/css">
<!--
.style14 {font-size: 0.8em}
-->
</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="description" content="Put your site description here." />
<meta name="keywords" content="put, your, keywords, here" />

<style type="text/css">
<!--
.style2 {
	font-size: 1.2em
}
.style3 {font-size: 0.35em}
.style4 {
	color: #336699;
	font-style: italic;
}
-->
</style>
</head>
<body bgcolor="#FFFFFF" text="#000000">

<!-- content -->

<?php
// create short variable names from HTML form data

$selected_units = $_POST['Units'];
$user_rates = $_POST['utilityrates'];
$soildepth_input =trim($_POST['soildepth']);
$lai = trim($_POST['lai']);
$btype = $_POST['btype'];
$state = substr($_POST['city'],0,2);
$city = substr($_POST['city'],3);
$statecity = $_POST['city'];
$area_input = trim($_POST['area']);
$rpercent = trim($_POST['rpercent']);
$rfraction = $rpercent / 100;
$irr = $_POST['irr'];
$rest = $_POST['rest'];

$Cities = array("AK_ANCH" => "Anchorage, AK","AK_JUNE" => "Juneau, AK","AL_BIRM" => "Birmingham, AL","AL_MONT" => "Montgomery, AL","AZ_FLAG" => "Flagstaff, AZ","AZ_PHOE" => "Phoenix, AZ","AZ_PRES" => "Prescott, AZ","AR_LITT" => "Little Rock, AR","CA_BAKE" => "Bakersfield, CA","CA_FRES" => "Fresno, CA","CA_LOS_" => "Los Angeles, CA","CA_SACR" => "Sacramento, CA","CA_SAN_" => "San Francisco, CA","CO_BOUL" => "Boulder, CO","CO_DENV" => "Denver, CO","CO_GRAN" => "Grand Junction, CO","CT_BRID" => "Bridgeport, CT","CT_HART" => "Hartford, CT","DE_WILM" => "Wilmington, DE","FL_JACK" => "Jacksonville, FL","FL_MIAM" => "Miami, FL","FL_TALL" => "Tallahassee, FL","GA_ATHE" => "Athens, GA","GA_ATLA" => "Atlanta, GA","HI_HONO" => "Honolulu, HI","ID_BOIS" => "Boise, ID","IA_DES_" => "Des Moines, IA","IL_CHIC" => "Chicago, IL","IL_SPRI" => "Springfield, IL","IN_INDI" => "Indianopolis, IN","KS_TOPE" => "Topeka, KS","KS_WICH" => "Wichita, KS","KY_LEXI" => "Lexington, KY","KY_LOUI" => "Louisville, KY","LA_BATO" => "Baton Rouge, LA","LA_NEW_" => "New Orleans, LA","ME_PORT" => "Portland, ME","MD_BALT" => "Baltimore, MD","MA_BOST" => "Boston, MA","MI_DETR" => "Detroit, MI","MI_LANS" => "Lansing, MI","MN_DULU" => "Duluth, MN","MN_MINN" => "Minneapolis, MN","MS_JACK" => "Jackson, MS","MO_KANS" => "Kansas City, MO","MO_ST_L" => "St. Louis, MO","MT_HELE" => "Helena, MT","MT_MISS" => "Missoula, MT","NE_OMAH" => "Omaha, NE","NV_LAS_" => "Las Vegas, NV","NV_RENO" => "Reno, NV","NH_CONC" => "Concord, NH","NJ_NEWA" => "Newark, NJ","NJ_ANTL" => "Atlantic City, NJ","NM_ALBU" => "Albuquerque, NM","NY_ALBA" => "Albany, NY","NY_BUFF" => "Buffalo, NY","NY_NEW_" => "New York City, NY","NC_CHAR" => "Charlotte, NC","NC_RALE" => "Raleigh, NC","ND_BISM" => "Bismarck, ND","ND_FARG" => "Fargo, ND","OH_CLEV" => "Cleveland, OH","OH_COLU" => "Columbus, OH","OK_OKLA" => "Oklahoma City, OK","OK_TULS" => "Tulsa, OK","OR_ASTO" => "Astoria, OR","OR_BEND" => "Bend, OR","OR_PORT" => "Portland, OR","PA_PHIL" => "Philadelphia, PA","PA_PITT" => "Pittsburgh, PA","RI_PROV" => "Providence, RI","SC_CHAR" => "Charleston, SC","SD_SIOU" => "Sioux Falls, SD","TN_MEMP" => "Memphis, TN","TN_0SH" => "Nashville, TN","TX_AUST" => "Austin, TX","TX_DALL" => "Dallas, TX","TX_EL_P" => "El Paso, TX","TX_HOUS" => "Houston, TX","TX_SAN_" => "San Antonio, TX","VA_RICH" => "Richmond, VA","VA_ROAN" => "Roanoke, VA","VT_BURL" => "Burlington, VT","WA_OLYM" => "Olympia, WA","WA_SEAT" => "Seattle, WA","WA_SPOK" => "Spokane, WA","WV_CHAR" => "Charleston, WV","WI_GREE" => "Green Bay, WI","WI_MADI" => "Madison, WI","WI_MILW" => "Milwaukie, WI","WY_CHEY" => "Cheyenne, WY","CN_CALG" => "Calgary, Alberta","CN_MONT" => "Montreal, Quebec","CN_OTTA" => "Ottawa, Ontario","CN_TORO" => "Toronto, Ontario","CN_VANC" => "Vancouver, BC");
$Buildings = array("O_1980" => "an Old Office Building", "O_2004" => "a New Office Building", "L_1980" => "an Old Residential Building", "L_2004" => "a New Residential Building");

// DJS SEPT 2011 - for Canadian cities it appears that the latest database refers to them by
// 2-letter designation "CN" rather than by Provence. So, I had to replace QC, AB, ON, BC
// with CN above (and in the citiesconfig.js script)
// DJS July 20 2012 - it was noted that Nashville was missing on line. Turns out it was a typo in database "0SH"
// instead of "NASH". Had to fix in two places -- savings_v2.php and citiesconfig.js. If I was confident I could
// reload the database I would simply have done that and changed the city name from 0SH to NASH !!!

if ($selected_units == "ip") {
	$soildepth = round($soildepth_input * 2.54,2);
	$soildepth_units ='inches';
	$area_units = 'ft';
	$area = round($area_input/10.76);
}
else {
	$soildepth = $soildepth_input;
	$soildepth_units = 'cm';
	$area_units = 'm';
	$area = $area_input;
}


// User Input Validation Section -------------------------------------------------------------------//

// input for soil depth must be of the form ##, #.#, ##.#, or ##.##
$pattern_sd='/^([0-9]{1,2}$)|([0-9]{1,2}+\.[0-9]{1,2}$)/';

// input for leaf area index must be of the form .##, #.##, or #.#
$pattern_lai='/^([0-3]{0,1})|([0-3]{0,1}+\.[0-9]{1,2}$)/';

// input for total area must be of the form #### or #,###
$pattern_area='/^([0-9]{1,6}$)|([0-9]{1,3}+\,[0-9]{3}$)/';

// input for Percentage of roof covered  must be of the form # ## or ###
$pattern_rpercent='/^([0-9]{1,3}$)/';


// Check to see that the area is an integer value and that the field is not left blank
if (preg_match($pattern_area,$area) and $area >=1);
else {
	echo "<p><b>Total roof area</b> must be an integer value such as 20000 or 20,000.</p>";
	echo "<p>Please return to the <a href=\"grcalc_v2.php\" target=\"_self\">previous page</a> and try again.</p>";
		exit;
}

//Check to see if either Office or Residential is selected, if not it returns an error
if (!$btype){
	echo "<p><b>Building Type</b> must be selected. </p>";
	echo "<p>Please return to the <a href=\"grcalc_v2.php\" target=\"_self\">previous page</a> and try again.</p>";
	exit;
}

//Check to see if the soil depth is between 2 and 11.5 inches.  Note that the validation range is in cm NOT inches.
if (preg_match($pattern_sd,$soildepth) and $soildepth <=30 and $soildepth >=5);
else {
	echo "<p><b>Growing Media depth</b> must be a numerical value from 2 to 11.5 inches with a maximum of two decimal places.</p>";
	echo "<p>Please return to the <a href=\"grcalc_v2.php\" target=\"_self\">previous page</a> and try again.</p>";
	exit;
}

//Check to see if the LAI is between .5 and 5
if (preg_match($pattern_lai,$lai) and $lai <=5 and $lai >=.5);
else {
	echo "<p><b>Leaf Area Index</b> must be a decimal value between 0.5 (sparse vegetation) and 5 (dense vegetation) with a maximum of two decimal places.</p>";
	echo "<p>Please return to the <a href=\"grcalc_v2.php\" target=\"_self\">previous page</a> and try again.</p>";
	exit;
}

//Check to see if the percentage of roof covered is between 1 and 100
if (preg_match($pattern_rpercent,$rpercent) and $rpercent <=100 and $rpercent >=1);
else {
	echo "<p><b>Percentage of roof covered</b> must be an integer value between 0 (no part of the roof covered) and 100 (100% of the roof covered)</p>";
	echo "<p>Please return to the <a href=\"grcalc_v2.php\" target=\"_self\">previous page</a> and try again.</p>";
	exit;
}

// End User Input Validation Section -------------------------------------------------//


//Connect to greenroof_calc LIVE MySQL database
$db = mysql_connect('mysql.oit.pdx.edu', 'greenroof_calc_l', '0pAgorl0j')
	or die("Unable to connect to MySQL");
$selected = mysql_select_db("greenroof_calc_v2",$db)
	or die("Could not select greenroof_calc_v2");

//Connect to greenroof_calc TEST MySQL database
//$db = mysql_connect('localhost','root','password')
//	or die("Unable to connect to MySQL");
//$selected = mysql_select_db("greenroof_calc_v2",$db)
//	or die("Could not select greenroof_calc_v2");

// Establish which values of LAI and soil depth we have data for
$lai_values = array(0.5, 2.0, 5.0);
$sdepth_values = array(0.0, 5.0, 15.0, 30.0);

// Find which values of LAI and soil depth to interpolate between, and to what degree
for ($i=0;$i<count($lai_values);$i++) {
	if ($lai == $lai_values[$i]) {
		$lai_lo = $lai; $lai_hi = $lai; $lai_interp = 1; }
	if ($lai > $lai_values[$i] and $lai < $lai_values[$i+1]) {
		$lai_lo = $lai_values[$i]; $lai_hi = $lai_values[$i+1]; $lai_interp = ($lai-$lai_lo)/($lai_hi-$lai_lo); }
}

for ($i=0;$i<count($sdepth_values);$i++) {
	if ($soildepth == $sdepth_values[$i]) {
		$sdepth_lo = $soildepth; $sdepth_hi = $soildepth; $sdepth_interp = 1; }
	if ($soildepth > $sdepth_values[$i] and $soildepth < $sdepth_values[$i+1]) {
		$sdepth_lo = $sdepth_values[$i]; $sdepth_hi = $sdepth_values[$i+1]; $sdepth_interp = ($soildepth-$sdepth_lo)/($sdepth_hi-$sdepth_lo); }
}

$interp = ($lai_interp+$sdepth_interp)/2.0;

// Extract GR energy data from database
$gr_lo_vals = mysql_query("SELECT elec_use, elec_cost, gas_use, gas_cost FROM test WHERE state='$state' AND city='$city' AND building='$btype' AND irr='$irr' AND sdepth='$sdepth_lo' AND lai='$lai_lo'") or die(mysql_error());
$gr_hi_vals = mysql_query("SELECT elec_use, elec_cost, gas_use, gas_cost FROM test WHERE state='$state' AND city='$city' AND building='$btype' AND irr='$irr' AND sdepth='$sdepth_hi' AND lai='$lai_hi'") or die(mysql_error());
$gr_lo_vals = mysql_fetch_array($gr_lo_vals,MYSQL_ASSOC);
$gr_hi_vals = mysql_fetch_array($gr_hi_vals,MYSQL_ASSOC);

$gr_elec_use = $interp*($gr_hi_vals['elec_use']-$gr_lo_vals['elec_use'])+$gr_lo_vals['elec_use'];
$gr_elec_cost = $interp*($gr_hi_vals['elec_cost']-$gr_lo_vals['elec_cost'])+$gr_lo_vals['elec_cost'];
$gr_gas_use = $interp*($gr_hi_vals['gas_use']-$gr_lo_vals['gas_use'])+$gr_lo_vals['gas_use'];
$gr_gas_cost = $interp*($gr_hi_vals['gas_cost']-$gr_lo_vals['gas_cost'])+$gr_lo_vals['gas_cost'];

// Extract conventional roof energy data from database
$br_vals = mysql_query("SELECT elec_use, elec_cost, gas_use, gas_cost FROM test WHERE state='$state' AND city='$city' AND building='$btype' AND roof='BR'") or die(mysql_error());
$wr_vals = mysql_query("SELECT elec_use, elec_cost, gas_use, gas_cost FROM test WHERE state='$state' AND city='$city' AND building='$btype' AND roof='WR'") or die(mysql_error());
$br_vals = mysql_fetch_array($br_vals,MYSQL_ASSOC);
$wr_vals = mysql_fetch_array($wr_vals,MYSQL_ASSOC);

$br_elec_use = $br_vals['elec_use'];
$br_elec_cost = $br_vals['elec_cost'];
$br_gas_use = $br_vals['gas_use'];
$br_gas_cost = $br_vals['gas_cost'];
$wr_elec_use = $wr_vals['elec_use'];
$wr_elec_cost = $wr_vals['elec_cost'];
$wr_gas_use = $wr_vals['gas_use'];
$wr_gas_cost = $wr_vals['gas_cost'];



// DJS SEPT 2011 - need to convert output for gas to Therms if SI

if ($selected_units == "ip") {
}
else {
	$br_gas_use= $br_gas_use*29.3;
	$wr_gas_use= $wr_gas_use*29.3;
	$gr_gas_use= $gr_gas_use*29.3;

}

//Define TOTAL building gas and elect use by multiplying these per unit area numbers by the area (already converted as appropriate
	$gr_gas_total= $gr_gas_use*$area;
	$gr_elec_total=$gr_elec_use*$area;

// DJS END convert for SI

// Calculate GR vs BR energy data
// DJS SEPT 2011 - this originally assumed that the non-green part of the roof was "black"
// DJS I added the if-then statement to allow for the option of the non-planted area being "white"

if ($rest=="BR") { // rest of roof is "black"
$savBR_elec_use = ($br_elec_use-($gr_elec_use*$rfraction+$br_elec_use*(1-$rfraction)))*$area;
$savBR_gas_use = ($br_gas_use-($gr_gas_use*$rfraction+$br_gas_use*(1-$rfraction)))*$area;
$savBR_cost = (($br_elec_cost-($gr_elec_cost*$rfraction+$br_elec_cost*(1-$rfraction)))+($br_gas_cost-($gr_gas_cost*$rfraction+$br_gas_cost*(1-$rfraction))))*$area;
// 
$savWR_elec_use = ($wr_elec_use-($gr_elec_use*$rfraction+$br_elec_use*(1-$rfraction)))*$area;
$savWR_gas_use = ($wr_gas_use-($gr_gas_use*$rfraction+$br_gas_use*(1-$rfraction)))*$area;
$savWR_cost = (($wr_elec_cost-($gr_elec_cost*$rfraction+$br_elec_cost*(1-$rfraction)))+($wr_gas_cost-($gr_gas_cost*$rfraction+$br_gas_cost*(1-$rfraction))))*$area; }

else {  //rest of roof is white
$savBR_elec_use = ($br_elec_use-($gr_elec_use*$rfraction+$wr_elec_use*(1-$rfraction)))*$area;
$savBR_gas_use = ($br_gas_use-($gr_gas_use*$rfraction+$wr_gas_use*(1-$rfraction)))*$area;
$savBR_cost = (($br_elec_cost-($gr_elec_cost*$rfraction+$wr_elec_cost*(1-$rfraction)))+($br_gas_cost-($gr_gas_cost*$rfraction+$wr_gas_cost*(1-$rfraction))))*$area;
// 
$savWR_elec_use = ($wr_elec_use-($gr_elec_use*$rfraction+$wr_elec_use*(1-$rfraction)))*$area;
$savWR_gas_use = ($wr_gas_use-($gr_gas_use*$rfraction+$wr_gas_use*(1-$rfraction)))*$area;
$savWR_cost = (($wr_elec_cost-($gr_elec_cost*$rfraction+$wr_elec_cost*(1-$rfraction)))+($wr_gas_cost-($gr_gas_cost*$rfraction+$wr_gas_cost*(1-$rfraction))))*$area; }

// Extract GR sensible heat flux data from database
$gr_lo_vals = mysql_query("SELECT soil_sflux_annavg, soil_sflux_sumavg, soil_sflux_sumdaypeak, veg_sflux_annavg, veg_sflux_sumavg, veg_sflux_sumdaypeak FROM test WHERE state='$state' AND city='$city' AND building='$btype' AND irr='$irr' AND sdepth='$sdepth_lo' AND lai='$lai_lo'") or die(mysql_error());
$gr_hi_vals = mysql_query("SELECT soil_sflux_annavg, soil_sflux_sumavg, soil_sflux_sumdaypeak, veg_sflux_annavg, veg_sflux_sumavg, veg_sflux_sumdaypeak FROM test WHERE state='$state' AND city='$city' AND building='$btype' AND irr='$irr' AND sdepth='$sdepth_hi' AND lai='$lai_hi'") or die(mysql_error());
$gr_lo_vals = mysql_fetch_array($gr_lo_vals,MYSQL_ASSOC);
$gr_hi_vals = mysql_fetch_array($gr_hi_vals,MYSQL_ASSOC);

$gr_soil_sflux_annavg = $interp*($gr_hi_vals['soil_sflux_annavg']-$gr_lo_vals['soil_sflux_annavg'])+$gr_lo_vals['soil_sflux_annavg'];
$gr_soil_sflux_sumavg = $interp*($gr_hi_vals['soil_sflux_sumavg']-$gr_lo_vals['soil_sflux_sumavg'])+$gr_lo_vals['soil_sflux_sumavg'];
$gr_soil_sflux_sumdaypeak = $interp*($gr_hi_vals['soil_sflux_sumdaypeak']-$gr_lo_vals['soil_sflux_sumdaypeak'])+$gr_lo_vals['soil_sflux_sumdaypeak'];
$gr_veg_sflux_annavg = $interp*($gr_hi_vals['veg_sflux_annavg']-$gr_lo_vals['veg_sflux_annavg'])+$gr_lo_vals['veg_sflux_annavg'];
$gr_veg_sflux_sumavg = $interp*($gr_hi_vals['veg_sflux_sumavg']-$gr_lo_vals['veg_sflux_sumavg'])+$gr_lo_vals['veg_sflux_sumavg'];
$gr_veg_sflux_sumdaypeak = $interp*($gr_hi_vals['veg_sflux_sumdaypeak']-$gr_lo_vals['veg_sflux_sumdaypeak'])+$gr_lo_vals['veg_sflux_sumdaypeak'];

$gr_sflux_annavg = $gr_soil_sflux_annavg + $gr_veg_sflux_annavg;
$gr_sflux_sumavg = $gr_soil_sflux_sumavg + $gr_veg_sflux_sumavg;
$gr_sflux_sumdaypeak = $gr_soil_sflux_sumdaypeak + $gr_veg_sflux_sumdaypeak;

// DJS SEPT 2011 - The original variable extraction from EnergyPlus took all Green Roof fluxes
// DJS as negative if they are INTO the environment. This is the wrong sign convention, so as I
// DJS do not have ready access to the db I have multiplied by -1.0 accordingly.
$gr_sflux_annavg = -1.0* $gr_sflux_annavg;
$gr_sflux_sumavg = -1.0* $gr_sflux_sumavg;
$gr_sflux_sumdaypeak = -1.0* $gr_sflux_sumdaypeak;
// END DJS MODIFICATION SEPT 2011

// Extract conventional roof sensible heat flux data from database
$br_vals = mysql_query("SELECT cr_flux_annavg, cr_flux_sumavg, cr_flux_sumdaypeak FROM test WHERE state='$state' AND city='$city' AND building='$btype' AND roof='BR'") or die(mysql_error());
$wr_vals = mysql_query("SELECT cr_flux_annavg, cr_flux_sumavg, cr_flux_sumdaypeak FROM test WHERE state='$state' AND city='$city' AND building='$btype' AND roof='WR'") or die(mysql_error());
$br_vals = mysql_fetch_array($br_vals,MYSQL_ASSOC);
$wr_vals = mysql_fetch_array($wr_vals,MYSQL_ASSOC);

$br_flux_annavg = $br_vals['cr_flux_annavg'];
$br_flux_sumavg = $br_vals['cr_flux_sumavg'];
$br_flux_sumdaypeak = $br_vals['cr_flux_sumdaypeak'];
$wr_flux_annavg = $wr_vals['cr_flux_annavg'];
$wr_flux_sumavg = $wr_vals['cr_flux_sumavg'];
$wr_flux_sumdaypeak = $wr_vals['cr_flux_sumdaypeak'];

// Modify GR sensible heat flux data to account for fractional coverage
if ($rest=="BR") { // rest of roof is "black"
	$gr_sflux_annavg = $gr_sflux_annavg*$rfraction + $br_flux_annavg*(1-$rfraction);
	$gr_sflux_sumavg = $gr_sflux_sumavg*$rfraction + $br_flux_sumavg*(1-$rfraction);
	$gr_sflux_sumdaypeak = $gr_sflux_sumdaypeak*$rfraction + $br_flux_sumdaypeak*(1-$rfraction); }

else { // rest of roof is "white"
	$gr_sflux_annavg = $gr_sflux_annavg*$rfraction + $wr_flux_annavg*(1-$rfraction);
	$gr_sflux_sumavg = $gr_sflux_sumavg*$rfraction + $wr_flux_sumavg*(1-$rfraction);
	$gr_sflux_sumdaypeak = $gr_sflux_sumdaypeak*$rfraction + $wr_flux_sumdaypeak*(1-$rfraction); }

// Extract GR latent heat flux data from database
$gr_lo_vals = mysql_query("SELECT soil_lflux_annavg, soil_lflux_sumavg, soil_lflux_sumdaypeak, veg_lflux_annavg, veg_lflux_sumavg, veg_lflux_sumdaypeak FROM test WHERE state='$state' AND city='$city' AND building='$btype' AND irr='$irr' AND sdepth='$sdepth_lo' AND lai='$lai_lo'") or die(mysql_error());
$gr_hi_vals = mysql_query("SELECT soil_lflux_annavg, soil_lflux_sumavg, soil_lflux_sumdaypeak, veg_lflux_annavg, veg_lflux_sumavg, veg_lflux_sumdaypeak FROM test WHERE state='$state' AND city='$city' AND building='$btype' AND irr='$irr' AND sdepth='$sdepth_hi' AND lai='$lai_hi'") or die(mysql_error());
$gr_lo_vals = mysql_fetch_array($gr_lo_vals,MYSQL_ASSOC);
$gr_hi_vals = mysql_fetch_array($gr_hi_vals,MYSQL_ASSOC);

$gr_soil_lflux_annavg = $interp*($gr_hi_vals['soil_lflux_annavg']-$gr_lo_vals['soil_lflux_annavg'])+$gr_lo_vals['soil_lflux_annavg'];
$gr_soil_lflux_sumavg = $interp*($gr_hi_vals['soil_lflux_sumavg']-$gr_lo_vals['soil_lflux_sumavg'])+$gr_lo_vals['soil_lflux_sumavg'];
$gr_soil_lflux_sumdaypeak = $interp*($gr_hi_vals['soil_lflux_sumdaypeak']-$gr_lo_vals['soil_lflux_sumdaypeak'])+$gr_lo_vals['soil_lflux_sumdaypeak'];
$gr_veg_lflux_annavg = $interp*($gr_hi_vals['veg_lflux_annavg']-$gr_lo_vals['veg_lflux_annavg'])+$gr_lo_vals['veg_lflux_annavg'];
$gr_veg_lflux_sumavg = $interp*($gr_hi_vals['veg_lflux_sumavg']-$gr_lo_vals['veg_lflux_sumavg'])+$gr_lo_vals['veg_lflux_sumavg'];
$gr_veg_lflux_sumdaypeak = $interp*($gr_hi_vals['veg_lflux_sumdaypeak']-$gr_lo_vals['veg_lflux_sumdaypeak'])+$gr_lo_vals['veg_lflux_sumdaypeak'];

$gr_lflux_annavg = $gr_soil_lflux_annavg + $gr_veg_lflux_annavg;
$gr_lflux_sumavg = $gr_soil_lflux_sumavg + $gr_veg_lflux_sumavg;
$gr_lflux_sumdaypeak = $gr_soil_lflux_sumdaypeak + $gr_veg_lflux_sumdaypeak;
// DJS SEPT 2011 - The original variable extraction from EnergyPlus took all Green Roof fluxes
// DJS as negative if they are INTO the environment. This is the wrong sign convention, so as I
// DJS do not have ready access to the db I have multiplied by -1.0 accordingly.
$gr_lflux_annavg = -1.0* $gr_lflux_annavg;
$gr_lflux_sumavg = -1.0* $gr_lflux_sumavg;
$gr_lflux_sumdaypeak = -1.0* $gr_lflux_sumdaypeak;
// END DJS MODIFICATION SEPT 2011

// Modify GR latent heat flux data to account for fractional coverage
// This simply assumes zero latent flux from the portion of roof that is conventional
$gr_lflux_annavg = $gr_lflux_annavg*$rfraction;
$gr_lflux_sumavg = $gr_lflux_sumavg*$rfraction;
$gr_lflux_sumdaypeak = $gr_lflux_sumdaypeak*$rfraction;

// Extract GR water balance data from database
$gr_lo_vals = mysql_query("SELECT cumu_precip, cumu_et, cumu_irr, cumu_ro FROM test WHERE state='$state' AND city='$city' AND building='$btype' AND irr='$irr' AND sdepth='$sdepth_lo' AND lai='$lai_lo'") or die(mysql_error());
$gr_hi_vals = mysql_query("SELECT cumu_precip, cumu_et, cumu_irr, cumu_ro FROM test WHERE state='$state' AND city='$city' AND building='$btype' AND irr='$irr' AND sdepth='$sdepth_hi' AND lai='$lai_hi'") or die(mysql_error());
$gr_lo_vals = mysql_fetch_array($gr_lo_vals,MYSQL_ASSOC);
$gr_hi_vals = mysql_fetch_array($gr_hi_vals,MYSQL_ASSOC);

$gr_cumu_precip = ($interp*($gr_hi_vals['cumu_precip']-$gr_lo_vals['cumu_precip'])+$gr_lo_vals['cumu_precip']);
$gr_cumu_et = ($interp*($gr_hi_vals['cumu_et']-$gr_lo_vals['cumu_et'])+$gr_lo_vals['cumu_et']);
$gr_cumu_irr = ($interp*($gr_hi_vals['cumu_irr']-$gr_lo_vals['cumu_irr'])+$gr_lo_vals['cumu_irr']);
$gr_cumu_ro = ($interp*($gr_hi_vals['cumu_ro']-$gr_lo_vals['cumu_ro'])+$gr_lo_vals['cumu_ro']);

// Establish conventional roof water balance
$cr_cumu_precip = $gr_cumu_precip;
$cr_cumu_ro = $cr_cumu_precip;
// DJS SEPT 2011 - need to convert output for water balance to inches if SI

if ($selected_units == "ip") // nothing special if SI because SI is default for water balance numbers
{
  $gr_cumu_precip= $gr_cumu_precip/25.4;
  $gr_cumu_et= $gr_cumu_et/25.4;
  $gr_cumu_irr=$gr_cumu_irr/25.4;
  $gr_cumu_ro= $gr_cumu_ro/25.4;

  $cr_cumu_precip= $cr_cumu_precip/25.4;
  $cr_cumu_et= $cr_cumu_et/25.4;
  $cr_cumu_irr=$cr_cumu_irr/25.4;
  $cr_cumu_ro= $cr_cumu_ro/25.4;

}

// DJS END convert for SI

//Disconnect from database
mysql_close($db);


//Checks to see if the user provided their own utility rate info and uses it to calculate costs if provided
//if ($user_rates == "yes") {
//  	$electricrate = trim($_POST['electricrate']);
//	$gasrate = trim($_POST['gasrate']);
//	$user_CostElectBR = round($kWhSaveBR * $electricrate,2);
//	$user_CostGasBR = round($ThermSaveBR * $gasrate,2);
//	$user_CostSaveBR = $user_CostElectBR + $user_CostGasBR;
//
//	$user_CostElectWR = round($kWhSaveWR * $electricrate,2);
//	$user_CostGasWR = round($ThermSaveWR * $gasrate,2);
//	$user_CostSaveWR = $user_CostElectWR + $user_CostGasWR;
//
//	$disp_CostSaveBR = $user_CostSaveBR;
//	$disp_CostSaveWR = $user_CostSaveWR;
//	}
//	else {
//	$disp_CostSaveBR = $CostSaveBR;
//	$disp_CostSaveWR = $CostSaveWR;
//	}

if ($user_rates == "yes") {
	$electricrate = trim($_POST['electricrate']);
	$gasrate = trim($_POST['gasrate']);
	$gr_elec_cost = $gr_elec_use*$electricrate;
	$gr_gas_cost = $gr_gas_use*$gasrate;
	$br_elec_cost = $br_elec_use*$electricrate;
	$br_gas_cost = $br_gas_use*$gasrate;
	$wr_elec_cost = $wr_elec_use*$electricrate;
	$wr_gas_cost = $wr_gas_use*$gasrate;
	$savBR_cost = (($br_elec_cost-($gr_elec_cost*$rfraction+$br_elec_cost*(1-$rfraction)))+($br_gas_cost-($gr_gas_cost*$rfraction+$br_gas_cost*(1-$rfraction))))*$area;
	$savWR_cost = (($wr_elec_cost-($gr_elec_cost*$rfraction+$wr_elec_cost*(1-$rfraction)))+($wr_gas_cost-($gr_gas_cost*$rfraction+$wr_gas_cost*(1-$rfraction))))*$area;
}


?>

<!--Display Results  -->
<!--Passes PHP variables into the HTML output -->
<h2><span class="style8"><strong>Impact of a Green Roof</strong></span></h2>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>

    <td class="style8">You specified
  <?php echo "<b>$Buildings[$btype]</b>"; ?>
  in <?php echo "<strong>$Cities[$statecity]</strong>";?> with a total roof area of <span class="style12"><?php echo "$area_input $area_units";?><SUP>2</SUP></span>.




The Green Roof you specified for this building has a <strong>Growing Media Depth</strong> of <span class="style12"><?php echo"$soildepth_input $soildepth_units";?></span>, a <strong>Leaf Area Index</strong> of <span class="style12"><?php echo"$lai";?></span>, covers approximately <span class="style12"><?php echo"$rpercent%";?></span> of the total roof area<?php if ($rfraction!=1) { echo" (the rest being a "; if ($rest=="BR") echo"dark roof)"; else echo"white roof)";}; ?>, and is <strong><?php if ($irr=="N") echo"not "; ?>irrigated. </strong> For reference, the annual whole building electricity consumption for the specified green roof was <?php printf("%.0f",$gr_elec_total); ?> kWh and the annual gas consumption of this green roof was <?php printf("%.0f",$gr_gas_total); if ($selected_units=="ip") echo " Therms"; else echo " kWh"; ?>  </br>
</td>
    <td>&nbsp;</td>
  </tr>
</table>

<!-- ENERGY SAVINGS -->

<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td width="48%" height="60" valign="bottom">
      <h5 class="style13">Annual Energy Savings compared to a Dark Roof (albedo = 0.15)</h5></td>
    <td width="3%">&nbsp;</td>
    <td width="49%" valign="bottom">
      <h5 class="style13">Annual Energy Savings compared to a White Roof (albedo = 0.65)</h5></td>
  </tr>
  <tr>
    <td>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="63%" class="style8">Electrical Savings:</td>
          <td width="37%">
          <?php if ($savBR_elec_use <=0) printf("<span class=\"style10\">%.1f kWh</span>",$savBR_elec_use); //this displays results in green if positive and in red if negative
				else {
				printf("<span class=\"style12\">%.1f kWh</span>",$savBR_elec_use);
				}
			?>
		  </td>
        </tr>
      </table></td>
    <td></td>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="63%" class="style8">Electrical Savings:</td>
          <td width="37%"><?php if ($savWR_elec_use <=0) printf("<span class=\"style10\">%.1f kWh</span>",$savWR_elec_use);//this displays results in green if positive and in red if negative
				else {
				printf("<span class=\"style12\">%.1f kWh</span>",$savWR_elec_use);
				}
			?>
            </td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="63%" class="style8">Gas Savings:</td>

    <td width="37%"><?php if ($savBR_gas_use <=0) //this displays results in green if positive and in red if negative
	     if ($selected_units=="ip") { printf("<span class=\"style10\">%.1f Therms</span>",$savBR_gas_use); // check for IP units
		 }
		 else
		 {
		 printf("<span class=\"style10\">%.1f kWh</span>",$savBR_gas_use);
		 }

		else {
		if ($selected_units=="ip") { printf("<span class=\"style12\">%.1f Therms</span>",$savBR_gas_use); // check for IP units
		 }
		 else
		 {
		 printf("<span class=\"style12\">%.1f kWh</span>",$savBR_gas_use);
				}
		 }

				?>
	</td>

  </tr>
</table></td>
    <td>&nbsp;</td>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="63%" class="style8">Gas Savings:</td>
    <td width="37%"><?php if ($savWR_gas_use <=0) //this displays results in green if positive and in red if negative
	     if ($selected_units=="ip") { printf("<span class=\"style10\">%.1f Therms</span>",$savWR_gas_use); // check for IP units
		 }
		 else
		 {
		 printf("<span class=\"style10\">%.1f kWh</span>",$savWR_gas_use);
		 }

		else {
		if ($selected_units=="ip") { printf("<span class=\"style12\">%.1f Therms</span>",$savWR_gas_use); // check for IP units
		 }
		 else
		 {
		 printf("<span class=\"style12\">%.1f kWh</span>",$savWR_gas_use);
				}
		 }


		?></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="63%" class="style8">Total Energy Cost Savings(1): </td>
          <td width="37%"><?php if ($savBR_cost <=0) printf("<span class=\"style10\">$%01.2f</span>",$savBR_cost);//this displays results in green if positive and in red if negative
				else {
				printf("<span class=\"style12\">$%01.2f</span>",$savBR_cost);
				}
		?>
        </td>
        </tr>
      </table></td>
    <td>&nbsp;</td>
    <td> <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="63%" class="style8">Total Energy Cost Savings(1):</td>
          <td width="37%"><?php if ($savWR_cost <=0) printf("<span class=\"style10\">$%01.2f</span>",$savWR_cost);//this displays results in green if positive and in red if negative
				else {
				printf("<span class=\"style12\">$%01.2f</span>",$savWR_cost);
				}
		?></td>
        </tr>
      </table></td>
  </tr>
</table>

<!-- HEAT FLUX -->

<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr><th colspan="4" height="60" valign="bottom"><h5 class="style13">Average Sensible Heat Flux to the Urban Environment (W/m<sup>2</sup>)</h5></th></tr>
  <tr>
  	<td></td>
  	<td class="style8">Dark Roof</td>
  	<td class="style8">White Roof</td>
  	<td class="style8"><?php echo"$rpercent%";?> Green Roof System</td>
  </tr>
  <tr>
  	<td class="style8">Annual Average:</td>
  	<td><?php if($br_flux_annavg <=0) echo "<span class=\"style10\">"; else { echo "<span class=\"style12\">"; } printf("%.1f",$br_flux_annavg); ?></td>
  	<td><?php if($wr_flux_annavg <=0) echo "<span class=\"style10\">"; else { echo "<span class=\"style12\">"; } printf("%.1f",$wr_flux_annavg); ?></td>
  	<td><?php if($gr_sflux_annavg <=0) echo "<span class=\"style10\">"; else { echo "<span class=\"style12\">"; } printf("%.1f",$gr_sflux_annavg); ?></td>
  </tr>
  <tr>
  	<td class="style8">Summer Average:</td>
  	<td><?php if($br_flux_sumavg <=0) echo "<span class=\"style10\">"; else { echo "<span class=\"style12\">"; } printf("%.1f",$br_flux_sumavg);  ?></td>
  	<td><?php if($wr_flux_sumavg <=0) echo "<span class=\"style10\">"; else { echo "<span class=\"style12\">"; } printf("%.1f",$wr_flux_sumavg);  ?></td>
  	<td><?php if($gr_sflux_sumavg <=0) echo "<span class=\"style10\">"; else { echo "<span class=\"style12\">"; } printf("%.1f",$gr_sflux_sumavg);  ?></td>
  </tr>
  <tr>
  	<td class="style8">Summer Daily Peak Avg.:</td>
  	<td><?php if($br_flux_sumdaypeak <=0) echo "<span class=\"style10\">"; else { echo "<span class=\"style12\">"; } printf("%.1f",$br_flux_sumdaypeak);  ?></td>
  	<td><?php if($wr_flux_sumdaypeak <=0) echo "<span class=\"style10\">"; else { echo "<span class=\"style12\">"; } printf("%.1f",$wr_flux_sumdaypeak);  ?></td>
  	<td><?php if($gr_sflux_sumdaypeak <=0) echo "<span class=\"style10\">"; else { echo "<span class=\"style12\">"; } printf("%.1f",$gr_sflux_sumdaypeak);  ?></td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr><th colspan="4" height="60" valign="bottom"><h5 class="style13">Average Latent Heat Flux to the Urban Environment (W/m<sup>2</sup>)</h5></th></tr>
  <tr>
  	<td></td>
  	<td class="style8">Conventional Roof</td>
  	<td class="style8"><?php echo"$rpercent%";?> Green Roof System</td>
  </tr>
  <tr>
  	<td class="style8">Annual Average:</td>
  	<td>-</td>
  	<td><?php if($gr_lflux_annavg <=0) echo "<span class=\"style10\">"; else { echo "<span class=\"style12\">"; } printf("%.1f",$gr_lflux_annavg); ?></td>
  </tr>
  <tr>
  	<td class="style8">Summer Average:</td>
  	<td>-</td>
  	<td><?php if($gr_lflux_sumavg <=0) echo "<span class=\"style10\">"; else { echo "<span class=\"style12\">"; } printf("%.1f",$gr_lflux_sumavg); ?></td>
  </tr>
  <tr>
  	<td class="style8">Summer Daily Peak Avg.:</td>
  	<td>-</td>
  	<td><?php if($gr_lflux_sumdaypeak <=0) echo "<span class=\"style10\">"; else { echo "<span class=\"style12\">"; } printf("%.1f",$gr_lflux_sumdaypeak); ?></td>
  </tr>
</table>

<!-- WATER BALANCE -->

<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr><th colspan="4" height="60" valign="bottom"><h5 class="style13">Annual Roof Water Balance <?php if ($selected_units=="ip") echo "(in)"; else echo"(mm)"; ?> </h5></th></tr>
  <tr>
  	<td></td>
  	<td class="style8">Conventional Roof</td>
  	<td class="style8"><?php echo"$rpercent%";?> Green Roof System</td>
  </tr>
  <tr>
  	<td class="style8">Precipitation:</td>
  	<td><?php printf("%.1f",$cr_cumu_precip);  ?></td>
  	<td><?php printf("%.1f",$gr_cumu_precip);  ?></td>
  </tr>
  <tr>
  	<td class="style8">Evapotranspiration:</td>
  	<td>&ndash;</td>
  	<td><?php printf("%.1f",$rfraction*$gr_cumu_et);  ?></td>
  </tr>
    <tr>
  	<td class="style8">Irrigation:</td>
  	<td>&ndash;</td>
  	<td><?php printf("%.1f",$rfraction*$gr_cumu_irr);  ?></td>
  </tr>
  <tr>
  	<td class="style8">Net Runoff (2):</td>
  	<td><?php printf("%.1f",$cr_cumu_ro);  ?></td>
  	<td><?php printf("%.1f",(1.-$rfraction)*$cr_cumu_ro+$rfraction*$gr_cumu_ro);  ?></td>
  </tr>
</table>
<p class="style14"><strong>NOTES: </strong>1. due to time of day pricing the apparent financial savings/costs may not APPEAR to reconcile with the total energy savings/costs; 2. Over the course of a simulation year the net water inflow may not balance outflow due to changes in soil moisture. Also, water balance dynamics are sensitive to growing media composition, compaction, etc. As these variations are not captured in the present tool, the runoff results should be considered as order-of-magnitude estimates. </p>
<p><form>
<input type="button" value="Start Over"

onclick="window.location.href='http://greenbuilding.pdx.edu/GR_CALC_v2/grcalc_v2.php#reset'">
</form></p>
<p><a href="../GR_CALC_v2/CalculatorInfo_v2.php" class="style12">More background on Calculator.</a><br />


</p>

<!-- /content -->

</body>
</html>
