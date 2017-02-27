<?php
session_start();
session_unset();
session_destroy();
header( 'Location: https://dev.gios.asu.edu/greenroofcalculator/grcalc_v2.php#retain' ) ;

?>

