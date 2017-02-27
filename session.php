<?php
session_start();
session_unset();
session_destroy();
header( 'Location: http://greenbuilding.pdx.edu/GR_CALC_v2/grcalc_v2.php#reset' ) ;

?>

