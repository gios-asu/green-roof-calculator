<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
  <title>GBRL | Green Roof Energy Savings Calculator</title>
  <script src="scripts/Calculator.js" type="text/javascript"></script>
  <style type="text/css">
    <!--
    .style8 {color: #000000;}
    -->
  </style>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <meta name="description" content="Put your site description here." />
  <meta name="keywords" content="put, your, keywords, here" />

  <style type="text/css">
  <!--
  .style1 {	font-size: x-small;
  	font-style: italic;
  }
  .style4 {
  	font-size: 1.2em;
  	font-family: "Roboto", "Helvetica Neue", Helvetica, Arial, sans-serif;
  }
  -->
  </style>
</head>
<body bgcolor="#FFFFFF" text="#000000">

<!-- content -->
<!-- InstanceBeginEditable name="Content" -->
<h2><a name="how" class="style8" id="how"><strong>Background on the Calculator</strong></a></h2>
<p>From about 2004-2006 Dr. Sailor and his colleagues at Portland State University developed a physically-based energy balance simulation module for representing green roofs in whole building energy simulation software. In April 2007 this module became part of the standard release of the US Department of Energy's EnergyPlus model (see Sailor, <em>Energy and Buildings</em>, 2008). This model incorporates a vegetation canopy and soil transport model that represents the following green roof physics:</p>
<p>*  long and short wave radiation exchange within the canopy (multiple reflections, shading)</p>
<p>* effect of canopy on sensible heat exchange among the ambient air, leaf, and soil surfaces</p>
<p>* thermal and moisture transport in the growing media with moisture inputs from precipitation (and irrigation if desired)</p>
<p> * evaporation from the soil surface and transpiration from the vegetation canopy</p>
<p>This canopy model is  fully coupled with the underlying EnergyPlus building energy simulation code that accounts for internal and environmental loads on the building, mechanical/HVAC equipment schedules/efficiencies, and models any building system for each of the 8760 hours in a &quot;typical&quot; year. Time steps are generally 10 minutes or less.</p>
<p>About the same time as the above development, Dr. Bass and his colleagues at University of Toronto were developing more of an empirically-based method of estimating impacts of green roofs on energy consumption. Their work was focused on the building energy simulation program ESP-r. </p>
<p>Both of these energy modeling approaches to estimating green roof performance require the end-user to have substantial expertise in energy modeling. In 2008 the two teams partnered with Steven Peck at Green Roofs for Healthy Cities and developed a proposal to create a much simplified on-line tool for use by non energy modeling experts. The goal was to create a tool that enabled architects, developers, and others to obtain quick estimates of how green roof design decisions might impact building energy use. This project was funded by the US Green Building Council and resulted in the present Green Roof Energy Calculator.</p>
<h2><a name="how" class="style8"><strong>How building energy consumption was calculated</strong></a></h2>
<p>
The information presented in this calculator is based on annual building energy simulations carried out by Portland State University. The simulations were performed using the Department of Energy&#8217s; program EnergyPlus versions 3 and 6.<sup>1</sup> Intercomparison of EnergyPlus simulations with the empircally-based esp-R tool and field measurements suggest that the calculator is generally accurate with respect to predicting both roof surface temperatures and the resulting energy consumption for heating and cooling of the building. Simulation results from the two approaches yielded generally consistent  trends with model-reported total energy savings differences typically in the  range of +/- 20%.</p>
<p>A byproduct of the physical basis of the EnergyPlus module allows it to be used to estimate sensible and latent fluxes from the roof and the net annual runoff of water from a green roof system. These latter features have not been explicitly validated and should be considered as order-of-magnitude estimates. This is particularly true for stormwater runoff which is particularly sensitive to growing media composition and compaction - characteristics that are not explicitly treated in this model.</p>
<p>The department of energy has published sixteen &ldquo;benchmark building&rdquo; input files for public use.  Two of these building types were used in this calculator: the medium office building and the midrise apartment.<sup>2</sup> Each of the sixteen building types published by DOE is further divided into sixteen distinct input files, each representing a U.S. climate zone. Simulations have been conducted for both &quot;NEW&quot; and &quot;OLD&quot; buildings. The &quot;NEW&quot; buildings correspond to building characteristics as specified in ASHRAE 90.1-2004. The &quot;OLD&quot; category of buildings generally represents building characteristics typical of 1980s vintage construction.</p>

<p>For the Green Roof Calculator, 100 North American cities (95 U.S. and 5 Canadian) were chosen for analysis. Input files were created for each city by modifying the benchmark file for that city&#8217s climate zone with city specific information, including: site information, utility rate schedules, and annual precipitation profiles.<sup>3</sup>  Simulations were also conducted with and without irrigation.</p>

<p>For each of the two input files for each city (office and apartment) eleven files were created based on roof type.  For the first file, the outer roof layer of the benchmark building was given a reflectivity (albedo) of 0.15; this is the &quot;dark&quot; roof.  For the second file, the reflectivity of the roof membrane was changed to 0.65; this is the &ldquo;white roof.&rdquo;  A matrix of green roofs was created for each building by changing the outer roofing layer to a green roof, and then varying the leaf area index (LAI) and the soil depth of that green roof.  The following nine green roof combinations were simulated:</p>

<p><table border="0" align="center" cellpadding="3" cellspacing="0" class="data">
  <tr>
    <th class="data"><div align="center">Index</div></th>
    <th class="data"><div align="center">LAI</div></th>
    <th class="data"><div align="center">
      <div align="center">Soil Depth (cm)</div>
    </div></th>
  </tr>
  <tr>
    <td class="data"><div align="center">1</div></td>
    <td class="data"><div align="center">5</div></td>
    <td class="data"><div align="center">30</div></td>
  </tr>
  <tr>
    <td class="data"><div align="center">2</div></td>
    <td class="data"><div align="center">2</div></td>
    <td class="data"><div align="center">30</div></td>
  </tr>
  <tr>
    <td class="data"><div align="center">3</div></td>
    <td class="data"><div align="center">0.5</div></td>
    <td class="data"><div align="center">30</div></td>
  </tr>
  <tr>
    <td class="data"><div align="center">4</div></td>
    <td class="data"><div align="center">5</div></td>
    <td class="data"><div align="center">15</div></td>
  </tr>
  <tr>
    <td class="data"><div align="center">5</div></td>
    <td class="data"><div align="center">2</div></td>
    <td class="data"><div align="center">15</div></td>
  </tr>
  <tr>
    <td class="data"><div align="center">6</div></td>
    <td class="data"><div align="center">0.5</div></td>
    <td class="data"><div align="center">15</div></td>
  </tr>
  <tr>
    <td class="data"><div align="center">7</div></td>
    <td class="data"><div align="center">5</div></td>
    <td class="data"><div align="center">5</div></td>
  </tr>
  <tr>
    <td class="data"><div align="center">8</div></td>
    <td class="data"><div align="center">2</div></td>
    <td class="data"><div align="center">5</div></td>
  </tr>
  <tr>
    <td class="data"><div align="center">9</div></td>
    <td class="data"><div align="center">0.5</div></td>
    <td class="data"><div align="center">5</div></td>
  </tr>
</table>
</p>

<p>The growing media characteristics for all green roof simulations were set as follows: thermal conductivity 0.35 W/mK; density 1100 kg/m^3; specific heat 1200 J/kgK; saturation volumetric moisture 0.3; residual volumetric moisture 0.01; initial volumetric moisture 0.1.</p>
<p>In all, a  total of 8000 simulations were conducted for this calculator. This includes 100 cities (and their corresponding weather and precipitation files<sup>4</sup>), 2 building vintages, 2 building categories (office &amp; residential), and 20 roof types. Two of the roof types corresponded to dark and white (control) membrane roofs. There were also 9 distinct green roofs modeled, and each green roof was modeled both with and without irrigation. The cases including irrigation ran the &quot;simple&quot; schedule from EnergyPlus with irrigation occuring from June through September on two mornings each week (total of 1&quot; or 2.54cm per week). From the simulation results, the annual energy consumption and cost of the buildings with each green roof construction were compared to the results for the buildings with conventional and white roofs. </p>
<p>This calculator interpolates the simulation results to determine a predicted energy and cost savings based on the user input values for building type, location, green roof LAI, soil depth and area.<sup>5</sup> The user is also asked to enter the description of the portion of the roof that is not vegetated (e.g. either a dark or white membrane).</p>
<p>==================================</p>
<p><sup>1</sup>All &quot;OLD&quot; buildings were simulated as part of the initial development of the Green Roof Energy Calculator and used version 3 of EnergyPlus. The recent addition of &quot;NEW&quot; construciton buildings used the version of EnergyPlus that was currently available -- version 6. Some minor differences between these versions affect results--most notably their handling of precipitation (see below). For all cases the simulations were carried out using the standard conduction transfer function solution scheme. Research versions of EnergyPlus in which the Green Roof Module used the Conduction Finite Difference (CFD) scheme are available, but not as part of the standard release of EnergyPlus.  See the EnergyPlus Input/Output reference guide for a description of each.</p>

<p><sup>2</sup>The following description of the benchmark files can be found on the <a href="https://apps1.eere.energy.gov/news/progress_alerts.cfm/pa_id=132" target="_blank">Department of Energy website</a>:</p>

<table width="75%" border="0" align="center">
  <tr>
    <td>Prior to version 4 of EnergyPlus, the Department of Energy (DOE), in conjunction with three of its national laboratories,  developed and made available commercial building benchmark models for building professionals to use when analyzing whole-building energy performance across the commercial building stock. The commercial benchmarks are available for DOE's EnergyPlus simulation software. The models provide a consistent baseline of comparison and improve the value of computer-generated energy simulations.</td>
  </tr>
</table>

<p><table border="0" align="center" cellpadding="1" cellspacing="0" class="data">
  <tr class="grey"> <th valign="bottom"><p>Building Type Name</p></th> <th valign="bottom"><p>Floor Area ft<sup>2</sup></p></th> <th valign="bottom"><p>Number of Floors</p></th> </tr> <tr> <td><p>Large office</p></td> <td align="center"><p>498,590</p></td>

<td align="center"><p>12</p></td>
</tr>
<tr class="grey">
<td><p>Medium office</p></td>
<td align="center"><p>53,630</p></td>
<td align="center"><p>3</p></td>
</tr>
<tr>
<td><p>Small office</p></td>
<td align="center"><p>5,500</p></td>
<td align="center"><p>1</p></td>
</tr>
<tr class="grey">
<td><p>Warehouse</p></td>
<td align="center"><p>52,050</p></td>
<td align="center"><p>1</p></td>
</tr>
<tr>
<td><p>Stand-alone retail</p></td>
<td align="center"><p>24,690</p></td>
<td align="center"><p>1</p></td>
</tr>

<tr class="grey">
<td><p>Strip mall </p></td>
<td align="center"><p>22,500</p></td>
<td align="center"><p>1</p></td>
</tr>
<tr>
<td><p>Primary school</p></td>
<td align="center"><p>73,960</p></td>
<td align="center"><p>2</p></td>
</tr>
<tr class="grey">

<td><p>Secondary school</p></td>
<td align="center"><p>204,170</p></td>
<td align="center"><p>3</p></td>
</tr>
<tr>
<td><p>Supermarket</p></td>
<td align="center"><p>45,000</p></td>
<td align="center"><p>1</p></td>
</tr>
<tr class="grey">
<td><p>Fast food</p></td>

<td align="center"><p>2,500</p></td>
<td align="center"><p>1</p></td>
</tr>
<tr>
<td><p>Restaurant</p></td>
<td align="center"><p>5,500</p></td>
<td align="center"><p>1</p></td>
</tr>
<tr class="grey">
<td><p>Hospital</p></td>
<td align="center"><p>241,350</p></td>

<td align="center"><p>5</p></td>
</tr>
<tr>
<td><p>Outpatient health care</p></td>
<td align="center"><p>10,000</p></td>
<td align="center"><p>2</p></td>
</tr>
<tr class="grey">
<td><p>Small hotel</p></td>
<td align="center"><p>43,200</p></td>
<td align="center"><p>2</p></td>
</tr>
<tr>
<td><p>Large hotel</p></td>
<td align="center"><p>122,116</p></td>
<td align="center"><p>6</p></td>
</tr>
<tr class="grey">
<td><p>Midrise apartment</p></td>
<td align="center"><p>33,600</p></td>
<td align="center"><p>4</p></td>
</tr>

</table></p>
<br />
<p><sup>3</sup>Site information for each city includes the geographic location, design conditions, ground temperatures and water mains temperatures. Utility rate schedules are taken from the EnergyPlus example file generator as of January, 2009. The &quot;OLD&quot; construction simulations were all conducted using version 3 of EnergyPlus--before rainfall was available within the EPW weather files. Thus, for the &quot;OLD&quot; construction simulations  precipitation schedules initially developed by the US Department of Energy were used for each city.  For more information regarding the precipitation files see the EnergyPlus Input/Output reference guide for version 3. Rainfall data became available within the weather (EPW) files for EnergyPlus beginning with version 4. So, the &quot;NEW&quot; construction simulations all use rainfall data directly from the weather files and DO NOT use separate precipitation schedules. For most cities, the  rainfall patterns from the original DOE precipitation schedules differ very little (&lt;1%) from the data available within the EPW weather files. The one exception are the Canadian cities for which the &quot;OLD&quot; building simulations required approximation of precipitation profiles as discussed below.</p>

<p>The original US Department of Energy EnergyPlus precipitation schedules were not available for Canadian cities. Instead, for all &quot;OLD&quot; construction simulations, precipitation schedules for geographically similar US cities were used, adjusted so that the total annual rainfall equaled that of the Canadian city.</p>

<p><table border="0" align="center" cellpadding="3" cellspacing="0" class="data">
  <tr>
    <th class="data"><div align="center">City</div></th>
    <th class="data"><div align="center">Precipitation Schedule</div></th>
    </tr>
  <tr>
    <td class="data"><div align="center">Vancouver</div></td>
    <td class="data"><div align="center">Seattle, WA</div></td>
    </tr>
  <tr>
    <td class="data">Toronto</td>
    <td class="data"><div align="center">Buffalo, NY</div></td>
    </tr>
  <tr>
    <td class="data">Montreal</td>
    <td class="data"><div align="center">Burlington, VT</div></td>
    </tr>
  <tr>
    <td class="data"><div align="center">Calgary</div></td>
    <td class="data"><div align="center">Spokane, WA</div></td>
    </tr>
  <tr>
    <td class="data"><div align="center">Ottawa</div></td>
    <td class="data"><div align="center">Massena, NY</div></td>
    </tr>

</table>
</p>

<p><sup>4</sup>The EnergyPlus weather files used are based on Typical Meteorological Year 3 (TMY3) data. More information about TMY3 data can be found on the <a href="https://apps1.eere.energy.gov/buildings/energyplus/weatherdata_sources.cfm#TMY3" target="_blank">EnergyPlus website</a>.</p>

<p><sup>5</sup>Energy and cost savings were determined on a per square foot of roof basis.  The savings is multiplied by the user specified roof area and percent green roof to determine the total savings.</p>

<br />
<p><a href="grcalc_v2.php">Return to Calculator</a></p>
<!-- /content -->
</body>
</html>
