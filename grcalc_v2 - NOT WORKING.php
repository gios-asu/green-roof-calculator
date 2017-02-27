<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en"><!-- InstanceBegin template="/Templates/sitepages.dwt.php" codeOutsideHTMLIsLocked="true" -->
<head>
<!-- Portland State University Identity Standards Dreamweaver Template -->
<!-- Version 1.1 01 Feb 2007 -->
<!-- More info: http://www.pdx.edu/ucomm/ -->

<!-- InstanceParam name="PSUHeaderImage" type="boolean" value="true" -->
<!-- InstanceParam name="PSUHeaderGreen" type="boolean" value="false" -->
<!-- InstanceParam name="RandomImageSiteHeader" type="boolean" value="false" -->
<!-- InstanceParam name="ColumnLeft" type="boolean" value="false" -->
<!-- InstanceParam name="ColumnRight" type="boolean" value="true" -->
<!-- InstanceParam name="QuickLinks" type="boolean" value="true" -->
<!-- InstanceParam name="Sitemap" type="boolean" value="false" -->
<!-- InstanceParam name="WindletsHorizontal" type="boolean" value="false" -->
<!-- InstanceBeginEditable name="doctitle" -->
<title>GBRL | Green Roof Energy Savings Calculator</title>
<script src="Scripts/Calculator.js" type="text/javascript"></script><!-- InstanceEndEditable -->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="description" content="Put your site description here." />
<meta name="keywords" content="put, your, keywords, here" />
<!-- ULTIMATE DROP DOWN MENU Version 4.5 by Brothercake -->
<!-- http://www.udm4.com/ -->
<script type="text/javascript" src="http://webdev.pdx.edu/js/udm4_5/udm-custom.js"></script>
<script type="text/javascript" src="http://webdev.pdx.edu/js/udm4_5/udm-control.js"></script>
<link rel="shortcut icon" href="http://webdev.pdx.edu/favicon.ico" />
<link rel="stylesheet" href="http://webdev.pdx.edu/css/psu.css" type="text/css" media="screen,projection" />
<link rel="stylesheet" href="http://webdev.pdx.edu/css/print.css" type="text/css" media="print" />
<link rel="stylesheet" href="http://webdev.pdx.edu/css/udm.css" type="text/css" media="screen,projection" />
<!-- local stylesheet to override global stylesheets above -->
<link rel="stylesheet" href="../css/local.css" type="text/css" media="screen,projection" />
<!-- override global PSU header random image directory -->
<script type="text/javascript" language="JavaScript">
<!--
var ImageDir = 'http://webdev.pdx.edu/images/header/';
//-->
</script>
<!-- /override global PSU header random image directory -->

<?php
/* toggle for home page elements
   (see if statements for $IsHomepage throughout)
   compare PHP_SELF to absolute local path for site's home page */
if ($_SERVER["PHP_SELF"] === "/templates/dreamweaver/index.php") {$IsHomepage = true;}
/* /toggle for home page elements */
?>
<style type="text/css">
<!--
.style1 {	font-size: x-small;
	font-style: italic;
}
.style4 {
	font-size: 1.2em;
	font-family: garamond, georgia, serif;
}
-->
</style>
</head>
<body bgcolor="#FFFFFF" text="#000000">

<!-- ULTIMATE DROP DOWN MENU Version 4.5 by Brothercake -->
<!-- http://www.udm4.com/ -->
<!-- menu script -->
<script type="text/javascript" src="http://webdev.pdx.edu/js/udm4_5/udm-dom.js"></script>
<!-- keyboard navigation module -->
<script type="text/javascript" src="http://webdev.pdx.edu/js/udm4_5/udm-mod-keyboard.js"></script>

<!-- page -->
<table border="0" cellpadding="0" cellspacing="0" id="PSUPage">
<tbody>
<tr valign="top">

<!-- body -->
<td id="PSUBody">


<!-- psu header -->
<?php
/* include PSU header */
include_once("http://webdev.pdx.edu/includes/header_psu.inc");
?>
<!-- /psu header -->




<!-- site header -->
<div id="SiteHeaderBackground">
<table border="0" cellpadding="0" cellspacing="0" id="SiteHeader" width="100%">
<tbody>
<tr>
<td id="SiteHeaderTitle">
<div id="SiteHeaderName"><!-- InstanceBeginEditable name="PageTitle" -->
  <?php if (!$IsHomepage) {echo('<a href="./" title="GBRL | Home">');} ?>
  Green Roof Energy Calculator Information
  <?php if (!$IsHomepage) {echo('</a>');} ?>
<!-- InstanceEndEditable --></div>
<div id="SiteHeaderParent">Green Building Research Laboratory</div>
</td>
<td id="SiteHeaderLinks"><a href="/Contact.php">Contact Us</a></td>
</tr>
</tbody>
</table>
</div>
<!-- /site header -->

<!-- navigation static level 1 -->
<div id="Nav1Background">
<div id="Nav1">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
<tr>
<td width="14%"><a href="/index.php">GBRL Home</a></td>
<td width="13%"><a href="/Facilities.php">Facilities</a></td>
<td width="21%"><a href="/Resources.php">Results and Resources</a></td>
<td width="17%"><a href="/Faculty_Staff.php">Faculty &amp; Staff</a></td>
<td width="16%"><a href="/News.php">News</a></td>
<td width="19%"><a href="/Contact.php">Contact</a></td>
</tr>
</tbody>
</table>
</div>
</div>
<!-- /navigation static level 1 -->

<!-- columns -->
<div id="PSUContentBackground">
<div id="PSUContent">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
<tr>



<!-- column main -->
<td id="PSUColumnMain">


<!-- quick links -->
<!-- /quick links -->

<!-- content -->
<!-- InstanceBeginEditable name="Content" --><strong>GREEN ROOF ENERGY CALCULATOR -- IS BEING REVISED AND MAY BE DOWN MUCH OF OCT/NOV 2013...</strong><!-- InstanceEndEditable -->
<!-- /content -->



<br clear="all" /></td>
<!-- /column main -->


<!-- column right -->
<td id="PSUColumnRight">

<!-- windlets vertical --><!-- /windlets vertical --></td>
<!-- /column right -->
</tr>
</tbody>
</table>
</div>
</div>
<!-- /columns -->


<div id="WindletsHorizontalBackground"></div>


<!-- site footer -->
<div id="SiteFooterBackground">
<div id="SiteFooter"><a href="/Contact.php">Contact Us</a></div>
</div>
<!-- /site footer -->

<!-- psu footer -->
<?php
/* include psu footer */
include_once("http://webdev.pdx.edu/includes/footer_psu.inc");
?>
<!-- /psu footer -->

</td>
<!-- /body -->

<!-- margin right -->
<td id="PSUMarginRight"><img alt="" border="0" src="http://webdev.pdx.edu/images/PSUMarginRight.png" width="72" /></td>
<!-- /margin right -->

</tr>
</tbody>
</table>
<!-- /page -->

<!-- navigation dynamic -->
<?php
$NavigationStyle = "udm";
include("../includes/navigation.php");
?>
<!-- /navigation dynamic -->

</body>
<!-- InstanceEnd --></html>
