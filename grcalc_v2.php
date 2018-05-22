<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en"><!-- InstanceBegin template="/Templates/sitepages.dwt.php" codeOutsideHTMLIsLocked="true" -->
  <head>
    <a name="1"><title>GBRL | Green Roof Energy Calculator</title></a>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <meta name="description" content="Put your site description here." />
    <meta name="keywords" content="put, your, keywords, here" />
  </head>

  <body bgcolor="#FFFFFF" text="#000000">
    <!-- content -->
    <script language="javascript" type="text/javascript" src="./scripts/chainedselects.js">
      /***********************************************
      * Chained Selects script- By Xin Yang (http://www.yxscripts.com/)
      * Script featured on/available at http://www.dynamicdrive.com/
      * Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
      ***********************************************/
    </script>
    <script language="javascript" type="text/javascript" src="./scripts/citiesconfig.js"></script>

    <script src="./scripts/Calculator.js" type="text/javascript"></script>
    <script src="./scripts/boxover.js" type="text/javascript"></script>

    <style type="text/css">
      <!--
      .tip {border-bottom: 1px dashed;cursor:help;padding: 1px;height:100%;font-weight: bold;}

      .style8 {color: #000000;}

      .style12 {color: #8c1d40;}

      .style13 {font-size: .7em;color: #000000;}

      .style14 {font-size: 0.8em}

      .bold {font-weight: bold;}
      -->
    </style>
    <?php
    $btype_list = array(
        "O_2004" => "New Office Bldg.",
        "L_2004" => "New Residence Bldg.",
        "O_1980" => "Old Office Bldg.",
        "L_1980" => "Old Residence Bldg."
    );

    function dynamic_select($the_array, $element_name, $init_value) {
      $menu = "<select name=\"".$element_name."\" id=\"".$element_name."\">\n";
      if (empty($_SESSION[$element_name])) {
        if ($init_value == "") {
          $menu .= "  <option value=\"\"></option>\n";
          $curr_val = "";
        } else {
          $curr_val = $init_value;
        }
      } else {
        $curr_val = $_SESSION[$element_name];
      }
      foreach ($the_array as $key => $value) {
        $menu .= "  <option value=\"".$key."\"";
        $menu .= ($key == $curr_val) ? ' selected="selected">' : '>';
        $menu .= $value."</option>\n";
      }
      $menu .= "</select>\n";
      return $menu;
    }

    $units_options = array("ip" => "US Units", "si" => "SI Units");
    $toggle = 'toggle()';

    function dynamic_radio_vert($the_array, $element_name, $init_value, $on_click) {
      $menu = "<p>\n";
      if (empty($_SESSION[$element_name])) {
        $curr_val = $init_value;
      }
      else {
        $curr_val = $_SESSION[$element_name];
      }
      foreach ($the_array as $key => $value) {
        $title = $element_name;
        $menu .= "<label>\n";
        $menu .= "<input type=\"radio\" name=\"".$element_name."\" id=\"".$element_name."\" value=\"".$key."\" ";
        $menu .= ($key == $curr_val) ? ' checked="checked"' : '';
        $menu .=  " title=\"".$title."\" onclick=\"".$on_click."\" >\n";
        $menu .=  "$value</label>\n";
        $menu .=  "<br />";
      }
      $menu .= "</p>\n";
      return $menu;
    }

    $yesno_options = array('yes' => 'Yes', 'no' => 'No');
    $hide = 'hide()';

    function dynamic_radio_horiz($the_array, $element_name, $init_value, $on_click) {
      if (empty($_SESSION[$element_name])) {
        $curr_val = $init_value;
      }
      else {
        $curr_val = $_SESSION[$element_name];
      }
      $menu = '';
      foreach ($the_array as $key => $value) {
        $title = $element_name;
        $menu .= "<label>\n";
        $menu .= "<input type=\"radio\" name=\"".$element_name."\" id=\"".$element_name."\" value=\"".$key."\" ";
        $menu .= ($key == $curr_val) ? ' checked="checked"' : '';
        $menu .=  " title=\"".$title."\" onclick=\"".$on_click."\" >\n";
        $menu .=  "$value</label>\n";

      }

      return $menu;
    }
    ?>

    <form action="savings_v2.php" method="post" name="calculator" id="calculator" onsubmit="return CheckFormFields()">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><input type="hidden" name="urlcheck" /></td>
          <td ><h2 class="style8"><strong>Green Roof Energy Calculator</strong> (v. 2.0)</h2></td>
          <td>&nbsp;</td>
        </tr>
      </table>

      <table width="85%" border="0" cellspacing="0" cellpadding="1">
        <tr>
          <td>&nbsp;</td>
          <td colspan="2" class="style8">
            <p>This calculator was developed through a collaboration led by Dr. David Sailor (while he was on the faculty of Portland State University), along with Brad Bass at the University of Toronto, and with input from Steven Peck at Green Roofs for Healthy Cities. The effort was funded by the US Green Building Council with additional financial and in-kind support from University of Toronto, Portland State University, GRHC, and Environment and Climate Change Canada. Ongoing maintenance and support of the calculator is provided by Julie Ann Wrigley Global Institute of Sustainability at Arizona State University.</p>
            <p>The green roof energy calculator allows you to compare the annual energy performance of a building with a vegetative <span class="tip" title="header=[Green Roof] body=[a roof partially or totally covered by a vegetated soil layer]">green roof</span> to the same building with either a <span class="tip" title="header=[Dark Roof] body=[a roof composed of low albedo heat-absorbing materials such as tar and gravel or asphalt shingles. For the calculator, an albedo of 0.15 is used.]"> dark roof </span> or a <span class="tip" title="header=[White Roof] body=[a roof composed of reflective (high albedo) material.  For the calculator, an albedo of 0.65 is used.]"> white roof </span>. At the present time simulations are available for new construction (ASHRAE 90.1-2004) and old construction (pre-ASHRAE 90.1-2004) office and residential buildings driven by typical precipitation and weather data. Representation of an irrigation schedule is optional. <a href="./calculator_info_v2.php" class="style12">Read more about how the Calculator works.</a><br /><br /></p>
            <p></p>
          </td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td width="11%">&nbsp;</td>
          <td colspan="2"><h3 class="style8"><strong>Estimate Annual Green Roof Performance</strong></h3></td>
          <td width="6%">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2" >
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="55%" class="style12">Would you prefer to use <span class="tip" title="header=[US Units] body=[Customary units in the US are primarily IP with some use of SI]">US Customary</span> or SI units?</td>
                <td width="14%" class="style13"><?php echo dynamic_radio_vert($units_options, 'Units', 'ip', $toggle); ?></td>
                <td width="31%" >&nbsp;</td>
              </tr>
            </table>
          </td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td width="11%">&nbsp;</td>
          <td colspan="2"><h3 class="style8"><strong>Building Information</strong></h3></td>
          <td width="6%">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
              <td width="56%" valign="top" class="style12">What State/Province is your building located in?</td>
              <td width="44%" class="style8"><select name="state" style="width:160px;" size="4" ></select>
              <span id="errorstate" style="display:none"><img src="./images/redarrow.png" align="middle" /></span></td>
              </tr>
            </table>
          </td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="56%" valign="top" class="style12">What city is your building located in?</td>
                <td width="44%" class="style8">
                  <select name="city" style="width:160px;"></select>
                  <span id="errorcity" style="display:none"><img src="./images/redarrow.png" /></span>
                </td>
              </tr>
            </table>
          </td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="56%" class="style12">What is the total area of your <strong>roof</strong>?</td>
                <td width="44%">
                  <input name="area" type="text" id="area" size="4" maxlength="7" title="Total roof area must be an integer value such as 20000 or 20,000" value="<?php echo(((isset($_SESSION['area'])) ? $_SESSION['area'] : ''));?>" />
                  <span id = "areaip" style="">ft<sup>2</sup></span><span id = "areasi" style="display:none">m<sup>2</sup></span> (roof area)<span id="errorarea" style="display:none"><img src="./images/redarrow.png" /></span>
                </td>
              </tr>
            </table>
          </td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2">
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="56%" class="style12">Which <span class="tip" title="header=[Building Type] body=[&lsquo;New&rsquo; buildings are those build according to the ASHRAE 90.1-2004 standard, while &lsquo;old&rsquo; buildings predate this standard. Residence buildings are multi-family apartment-style buildings.]">Type</span> is your building?</td>
                <td width="44%" class="style8"><?php echo dynamic_select($btype_list, 'btype', '');?></td>
              </tr>
            </table>
          </td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2"><h3 class="style8"><strong>Green Roof Information</strong></h3></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="56%" height="22" class="style12">What is your <span class="tip" title="header=[Growing Media] body=[The term &lsquo;growing media&rsquo; is used to describe a soil replacement used for growing plants.]">Growing Media</span> Depth? <span class="style13" id="rangeip" style="">(2 to 11.5)</span><span class="style13" id="rangesi" style="display:none">(5 to 30)</span></td>
                <td width="44%">
                  <input name="soildepth" type="text" id="soildepth" size="2" maxlength="5" title="Growing Media Depth must be a numerical value from 2 to 11.5 inches." value="<?php echo(((isset($_SESSION['soildepth'])) ? $_SESSION['soildepth'] : ''));?>"/>
                  <span id = "sdepthip" style=""> inches</span><span id = "sdepthsi" style="display:none">cm</span><span id="errorsdepth" style="display:none"><img src="./images/redarrow.png" /></span>
                </td>
              </tr>
            </table>
          </td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="56%" class="style12">What is your <span class="tip" title="header=[Leaf Area Index] body=[The Leaf Area Index or LAI is the ratio of total upper leaf surface of vegetation divided by the surface area of the land on which the vegetation grows. The LAI is a dimensionless value, typically ranging from 0 for bare ground to 6 for a dense forest.]">Leaf Area Index</span>? <span class="style13">(0.5 to 5)</span></td>
                <td width="44%" ><input name="lai" type="text" id="lai" size="2" maxlength="4" title="Leaf Area Index must be a value between 0.5 (sparse vegetation) and 5 (dense vegetation)." value="<?php echo(((isset($_SESSION['lai'])) ? $_SESSION['lai'] : ''));?>"/><span id="errorlai" style="display:none"><img src="./images/redarrow.png" /></span></td>
            </tr>
            </table>
          </td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2">
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="56%" class="style12">Is your green roof irrigated?
                <td width="44%"><select name="irr"><option value="N">No</option><option value="Y">Yes</option></select></td>
              </tr>
            </table>
          </td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2">
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="79%" class="style12">
                  What percentage of your roof does the Green Roof cover?
                  <span class="style13">(1 to 100%)</span>
                </td>
                <td width="21%">
                  <input name="rpercent" type="text" id="rpercent" size="2" maxlength="3" title="Percent of roof covered must be a value between 1 and 100." value="<?php echo(((isset($_SESSION['rpercent'])) ? $_SESSION['rpercent'] : ''));?>" />%<span id="errorpercent" style="display:none"><img src="./images/redarrow.png" /></span>
                </td>
              </tr>
            </table>
          </td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2">
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="75%" class="style12">If your green roof covers less than 100% of your roof area, what type of roof covers the rest?
                <td width="25%"><select name="rest"><option value="BR">Dark (0.15 albedo)</option><option value="WR">White (0.65 albedo)</option></select></td>
              </tr>
            </table>
          </td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2"><h3 class="style8"><strong>Utility Rate Information</strong></h3></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2"><span class="style12">This calculator uses utility rates for each city that were valid in May 2010. Would you like to enter your own utility rates instead?</span><?php echo dynamic_radio_horiz($yesno_options, 'utilityrates', 'no', $hide);?> </td>
          <td></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2" >
            <table style="display:none" id="utilities" width="100%" border="0" cellspacing="0" cellpadding="1">
              <tr>
                <td width="54%" class="style12">Enter electricity price:</td>
                <td width="2%">$</td>
                <td width="44%">
                  <input type="text" name="electricrate" id="electricrate" size="2" maxlength="4" title="Electricity rate must be a numerical value from $.001 to $1.00 per kWh." value="<?php echo(((isset($_SESSION['electricrate'])) ? $_SESSION['electricrate'] : ''));?>" />
                  <label> per kWh </label><span id="errorerate" style="display:none"><img src="./images/redarrow.png" /></span>
                </td>
              </tr>
              <tr>
                <td class="style12">Enter gas price:</td>
                <td>$</td>
                <td width="44%">
                  <input type="text" name="gasrate" id="gasrate" size="2" maxlength="4" title="Natural gas effective fixed rate." value="<?php echo(((isset($_SESSION['gasrate'])) ? $_SESSION['gasrate'] : ''));?>"/>
                  <label> per Therm (or kWh if SI) </label><span id="errorgrate" style="display:none"><img src="./images/redarrow.png" /></span>
                </td>
              </tr>
            </table>
          </td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td width="27%" align="left" >
            <div align="right"><br />
              <input type="submit" class="bold" value="Calculate"/>
              <input type="reset" value="Reset" class="bold" onclick="resetListGroup('cities'); session_reset()" title="Clear all fields"/>
            </div>
          </td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
    </form>

    <script type="text/javascript">
      var locate = window.location;
      document.calculator.urlcheck.value = locate;
      var text = document.calculator.urlcheck.value;

      function delineate(str)
      {
        point = str.lastIndexOf("#");
        return(str.substring(point+1,str.length));
      }

      var urlvalue = delineate(text);

      function checkurl() {
        if  (urlvalue =='reset') {
          resetListGroup('cities');
          setTimeout("window.location.hash='retain'",1);
        }
        else {
          window.location.hash="retain";
        }
      }

      function session_reset() {
        window.location.href="session.php";
      }

      function init() {
        initListGroup('cities', document.calculator.state, document.calculator.city, 'cs');
        checkurl();
        toggle();
        hide();
      }

      window.onload = init;
    </script>
    <!-- /content -->
  </body>
</html>
