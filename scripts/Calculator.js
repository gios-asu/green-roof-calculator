// JavaScript Document
// this function checks to ensure that the user input is valid and informs the user if it is not, 
// before the data is submitted to the php script.


function CheckFormFields() {
var errormessage = new String();

// field validation below this point.
if (document.calculator.state.value =="")
	{ errormessage += "\n\nYou must select a state for your building." ;
	document.getElementById('errorstate').style.display="";
	}
else {
	document.getElementById('errorstate').style.display="none";
	}
if (document.calculator.city.value =="")
	{ errormessage += "\n\nYou must select a city for your building." ;
	document.getElementById('errorcity').style.display="";
	}
else {
	document.getElementById('errorcity').style.display="none";
	}
if (document.calculator.area.value < 1 | document.calculator.area.value > 1000000)
	{ errormessage += "\n\nTotal roof area must be an integer value such as 20000 or 20,000." ; 
	document.getElementById('errorarea').style.display="";
	}
else {
	document.getElementById('errorarea').style.display="none";
	}
if (document.calculator.Units[0].checked) {	
	if (document.calculator.soildepth.value < 2 | document.calculator.soildepth.value > 11.5)
	{ errormessage += "\n\nGrowing Media Depth must be a numerical value from 2 to 11.5 inches.";
	document.getElementById('errorsdepth').style.display="";
	}
	else {	
	document.getElementById('errorsdepth').style.display="none";
	}}
if (document.calculator.Units[1].checked) {
	if (document.calculator.soildepth.value < 5 | document.calculator.soildepth.value > 30)
	{ errormessage += "\n\nGrowing Media Depth must be a numerical value from 5 to 30 cm."; 
	document.getElementById('errorsdepth').style.display="";
	}
	else {
	document.getElementById('errorsdepth').style.display="none";
	}}
	
if (document.calculator.lai.value < 0.5 | document.calculator.lai.value >5)
	{ errormessage += "\n\nLeaf Area Index must be a value between 0.5 (sparse vegetation) and 5 (dense vegetation)."; 
	document.getElementById('errorlai').style.display="";
	}
	else {
	document.getElementById('errorlai').style.display="none";
	}

if (document.calculator.rpercent.value < 1 | document.calculator.rpercent.value > 100)
	{ errormessage += "\n\nPercent of roof covered must be a value between 1 and 100."; 
	document.getElementById('errorpercent').style.display="";
	}
	else {
	document.getElementById('errorpercent').style.display="none";
	}

if (document.calculator.utilityrates[0].checked) {	
	if (document.calculator.electricrate.value < .001 | document.calculator.electricrate.value > 1)
	{ errormessage += "\n\nElectricity rate must be a numerical value from $.001 to $1.00 per kWh"; 
	document.getElementById('errorerate').style.display="";
	}
	else {
	document.getElementById('errorerate').style.display="none";
	}
	if (document.calculator.gasrate.value < .01 | document.calculator.gasrate.value > 100)
	{ errormessage += "\n\nNatural gas rate must be a numerical value from $.01 to $100.00 per therm or kWh";
	document.getElementById('errorgrate').style.display="";
	}
	else {
	document.getElementById('errorgrate').style.display="none";
	}
	}	
// field validation above this point.

// combines error messages into one message if there is more than one error
if(errormessage.length > 2) {
	alert('NOTE:' + errormessage);
	return false;
	}
return true;

} 
// end of function CheckFormFields()

//this javascript switches the displayed units between SI and Imperial Units

  
function toggle() {
var si_label_depth = document.getElementById('sdepthsi');
var ip_label_depth = document.getElementById('sdepthip');
var si_label_area = document.getElementById('areasi');
var ip_label_area = document.getElementById('areaip');
var si_label_range = document.getElementById('rangesi');
var ip_label_range = document.getElementById('rangeip');
var sdepth_tooltip = document.getElementById('soildepth');


  	si_label_depth.style.display = "none";
  	ip_label_depth.style.display = "none";
	si_label_area.style.display = "none";
  	ip_label_area.style.display = "none";
	si_label_range.style.display = "none";
	ip_label_range.style.display = "none";
	sdepth_tooltip.title = "";
	
    if (document.calculator.Units[0].checked) {
		ip_label_depth.style.display = "";
		ip_label_area.style.display = "";
		ip_label_range.style.display = "";
		sdepth_tooltip.title = "Growing Media Depth must be a numerical value from 2 to 11.5 inches.";
		}
		
	if (document.calculator.Units[1].checked) {
		si_label_depth.style.display = "";
		si_label_area.style.display = "";
		si_label_range.style.display = "";
		sdepth_tooltip.title = "Growing Media Depth must be a numerical value from 5 to 30 cm.";
		}				
}
  
  

 
function hide(){
var utilities_form = document.getElementById('utilities');
 	utilities_form.style.display = "none";
		

	 if (document.calculator.utilityrates[0].checked) {
		utilities_form.style.display = "";
		
		}
	 if (document.calculator.utilityrates[1].checked) {
		utilities_form.style.display = "none";
		}
}

function SelectCity(){
// On selection of State this function will load the corresponding cities into the drop menu

removeAllOptions(document.calculator.city);
addOption(document.calculator.city, "", "City");

if(document.calculator.state.value == "")
addOption(document.calculator.city, "a", "Choose a State first");

if(document.calculator.state.value == 'Oregon'){
addOption(document.calculator.city,"Bend", "Bend");
addOption(document.calculator.city,"Portland", "Portland");
}
if(document.calculator.state.value == 'Texas'){
addOption(document.calculator.city,"Austin", "Austin");
addOption(document.calculator.city,"Houston", "Houston");
addOption(document.calculator.city,"San Antonio", "San Antonio");
addOption(document.calculator.city,"El Paso", "El Paso");
addOption(document.calculator.city,"Dallas", "Dallas", "");
}
if(document.calculator.state.value == 'Canada'){
addOption(document.calculator.city,"Eh?", "Eh?");
addOption(document.calculator.city,"Aboot", "Aboot");
addOption(document.calculator.city,"Free Health Care", "Free Health Care");
}

}
////////////////// 

function removeAllOptions(selectbox)
{
	var i;
	for(i=selectbox.options.length-1;i>=0;i--)
	{
		//selectbox.options.remove(i);
		selectbox.remove(i);
	}
}


function addOption(selectbox, value, text )
{
	var optn = document.createElement("OPTION");
	optn.text = text;
	optn.value = value;

	selectbox.options.add(optn);
}


