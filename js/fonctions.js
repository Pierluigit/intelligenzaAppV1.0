////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
// Functions Javascripts Ajax PHP MySQL
// rec on events, one function per table, 
// idUser or idMember managed in front = finally is idMember
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
// time dynamic javascript
setInterval( function() {
	// Create a newDate() object and extract the seconds of the current time on the visitor's
	var seconds = new Date().getSeconds();
	// Add a leading zero to seconds value
	$("#sec").html(( seconds < 10 ? "0" : "" ) + seconds);
	},1000);
setInterval( function() {
	// Create a newDate() object and extract the minutes of the current time on the visitor's
	var minutes = new Date().getMinutes();
	// Add a leading zero to the minutes value
	$("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
    },1000);
	
setInterval( function() {
	// Create a newDate() object and extract the hours of the current time on the visitor's
	var hours = new Date().getHours();
	// Add a leading zero to the hours value
	$("#hours").html(( hours < 10 ? "0" : "" ) + hours);
    }, 1000);
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
// change color title h3
function colorChange_h3() {
	//alert('la fonction SELECTION PROCESS');
	$(function(){
	var a = ["#FF1700", "#FF2E00", "#FF4500", "#FF5C00", "#FF7300", "#FF8A00", "#FFA100", "#FFB800", "#FFCF00", "#FFE600", "#FFFD00", "#FFff00", "#E8ff00", "#D1ff00", "#BAff00", "#A3ff00", "#8Cff00", "#75ff00", "#5Eff00", "#47ff00", "#30ff00", "#19ff00", "#02ff00", "#00ff00", "#00ff17", "#00ff2E", "#00ff45", "#00ff5C", "#00ff73", "#00ff8A", "#00ffA1", "#00ffB8", "#00ffCF", "#00ffE6", "#00ffFD", "#00ffff", "#00FDff", "#00E6ff", "#00CFff", "#00B8ff", "#00A1ff", "#008Aff", "#0073ff", "#005Cff", "#0045ff", "#002Eff", "#0017ff", "#0000ff", "#0200ff", "#1900ff", "#3000ff", "#4700ff", "#5E00ff", "#7500ff", "#8C00ff", "#A300ff", "#BA00ff", "#D100ff", "#E800ff", "#FF00ff", "#FF00FD", "#FF00E6", "#FF00CF", "#FF00B8", "#FF00A1", "#FF008A", "#FF0073", "#FF005C"]; // arc en ciel: 
	var l = a.length; //NUMBER OF ELEMENTS OF ARRAY
	var x = []; //WILL BE THE SHUFFLED ARRAY
	var s = ""; //SHOWS ELEMENTS OF THE SHUFFLED ARRAY 
	var c = 1; //NUMBER OF ELEMENTS TO BE SHOWN 
	
	//SHUFFLING PROCESS
	for(i=0; i<l; i++){
	var r = Math.floor(Math.random()*a.length); //RANDOM INDEX OF THE ORIGINAL ARRAY
	x[i] = a[r]; //PUTS RANDOM VALUE IN THE SHUFFLE ARRRAY
	a.splice(r, 1); //DELETE THAT VALUE FROM THE ORIGINAL ARRAY TO PREVENT REPEAT
	}
	//SELECTION PROCESS
	for(i=0; i<c; i++){
	s += x[i]+" "; //VALUE OF THE SHUFFLED ARRAY
	
	}
	//$("#a").html(s); //SHOWS (PART OF) THE SHUFFLED ARRAY IN HTML
		var dt=new Date()
		window.status=dt.getHours()+":"+dt.getMinutes()+":"+dt.getSeconds();
		$('h3').animate({color: s},4000);
		setTimeout("changeColor_h3();",6000);
	}); 
}
//changeColor_h3();
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
// change color title debug
function colorChange_debug() {
	//alert('la fonction SELECTION PROCESS');
	$(function(){
	var a = ["#FF1700", "#30ff00"]; // arc en ciel: 
	var l = a.length; //NUMBER OF ELEMENTS OF ARRAY
	var x = []; //WILL BE THE SHUFFLED ARRAY
	var s = ""; //SHOWS ELEMENTS OF THE SHUFFLED ARRAY 
	var c = 1; //NUMBER OF ELEMENTS TO BE SHOWN 
	
	//SHUFFLING PROCESS
	for(i=0; i<l; i++){
	var r = Math.floor(Math.random()*a.length); //RANDOM INDEX OF THE ORIGINAL ARRAY
	x[i] = a[r]; //PUTS RANDOM VALUE IN THE SHUFFLE ARRRAY
	a.splice(r, 1); //DELETE THAT VALUE FROM THE ORIGINAL ARRAY TO PREVENT REPEAT
	}
	//SELECTION PROCESS
	for(i=0; i<c; i++){
	s += x[i]+" "; //VALUE OF THE SHUFFLED ARRAY
	
	}
	//$("#a").html(s); //SHOWS (PART OF) THE SHUFFLED ARRAY IN HTML
		var dt=new Date()
		window.status=dt.getHours()+":"+dt.getMinutes()+":"+dt.getSeconds();
		$('#titleDebug').animate({color: s},4000);
		setTimeout("colorChange_debug();",6000);
	}); 
}
colorChange_debug();
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
// change color title gearSettings*/
function colorChange_theme() {
	//alert('la fonction SELECTION PROCESS');
	$(function(){
	var a = ["#c3c3c3", "#b7b7b7"]; // arc en ciel: 
	var l = a.length; //NUMBER OF ELEMENTS OF ARRAY
	var x = []; //WILL BE THE SHUFFLED ARRAY
	var s = ""; //SHOWS ELEMENTS OF THE SHUFFLED ARRAY 
	var c = 1; //NUMBER OF ELEMENTS TO BE SHOWN 
	
	//SHUFFLING PROCESS
	for(i=0; i<l; i++){
	var r = Math.floor(Math.random()*a.length); //RANDOM INDEX OF THE ORIGINAL ARRAY
	x[i] = a[r]; //PUTS RANDOM VALUE IN THE SHUFFLE ARRRAY
	a.splice(r, 1); //DELETE THAT VALUE FROM THE ORIGINAL ARRAY TO PREVENT REPEAT
	}
	//SELECTION PROCESS
	for(i=0; i<c; i++){
	s += x[i]+" "; //VALUE OF THE SHUFFLED ARRAY
	
	}
	//$("#a").html(s); //SHOWS (PART OF) THE SHUFFLED ARRAY IN HTML
		var dt=new Date()
		window.status=dt.getHours()+":"+dt.getMinutes()+":"+dt.getSeconds();
		$('.bg-theme').animate({color: s},4000);
		setTimeout("colorChange_theme();",6000);
	}); 
}
//colorChange_theme();
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
// check password 1
////////////////////////////////////////////////////////////////////
function checkPassword1() {  //alert('success check pass 1');//debug
	"use strict";
	function checkInfos() { 
		if ((document.getElementById('password1').value.length<8)){
			//alert('youpiiiii -6');
			document.getElementById('password1').style.border="3px solid #e88d3c";
			return;
		}else{
			document.getElementById('password1').style.border="3px solid green";
		}
	}
	checkInfos();
}
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
// check password 2
////////////////////////////////////////////////////////////////////
function checkPassword2() {  //alert('success check pass 2');//debug
	"use strict";
	var pass1 = document.getElementById('password1').value;
	var pass2 = document.getElementById('password2').value;
	
	function checkInfos() { 
		if (pass2!=pass1){
			//alert('ops notugual');
			document.getElementById('password2').style.border="3px solid #e88d3c"; 
			return;
		}else{
			//alert('youpiiiii egal');
			document.getElementById('password2').style.border="3px solid green";
		}
	}
	checkInfos();
}
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
// Password strength indicator
////////////////////////////////////////////////////////////////////
function passwordStrength(password) {

	var desc = [{'width':'0px'}, {'width':'20%'}, {'width':'40%'}, {'width':'60%'}, {'width':'80%'}, {'width':'100%'}];
	
	var descClass = ['', 'progress-bar-danger', 'progress-bar-danger', 'progress-bar-warning', 'progress-bar-success', 'progress-bar-success'];

	var score = 0;

	//if password bigger than 6 give 1 point
	if (password.length > 7) score++;

	//if password has both lower and uppercase characters give 1 point	
	if ((password.match(/[a-z]/)) && (password.match(/[A-Z]/))) score++;

	//if password has at least one number give 1 point
	if (password.match(/d+/)) score++;

	//if password has at least one special caracther give 1 point
	if ( password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) )	score++;

	//if password bigger than 12 give another 1 point
	if (password.length > 10) score++;
	
	// display indicator
	$("#jak_pstrength").removeClass(descClass[score-1]).addClass(descClass[score]).css(desc[score]);
}

jQuery(document).ready(function(){
	jQuery("#oldpass").focus();
	jQuery("#password1").keyup(function() {
	  passwordStrength(jQuery(this).val());
	});
});
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
// check captcha code
////////////////////////////////////////////////////////////////////
function checkCode() {
	"use strict";
	function checkInfos() { 
		if ((document.getElementById('captcha_code').value.length<6)){
			//alert('youpiiiii -6');
			document.getElementById('captcha_code').style.border="3px solid #e88d3c"; 
			return;
		}else{
			document.getElementById('captcha_code').style.border="3px solid green";
		}
	}
	checkInfos();
}
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
// kill session regenerate password
////////////////////////////////////////////////////////////////////
function killSessionReneratePassword(idMember) { //alert("success");//debug
	"use strict";
	var formData = {idMember:idMember};
	$.ajax(
	{
	url : "admin/scripts/inc.core.killSessionReneratePassword.php",
	type: "POST",
	data : formData,
	success: function(data)
	{
		location.reload();
		// parent function
		//document.getElementById('i').innerHTML = ""+ data + "";
	},
	error: function()
	{
		
	}
	});
}

////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
// activity menu admin
////////////////////////////////////////////////////////////////////
function statutMenuAdmin(menu) { //alert("success");//debug
	"use strict";
	var formData = {menu:menu};
	$.ajax(
	{
	url : "scripts/inc.core.tools.statutMenuAdmin.php",
	type: "POST",
	data : formData,
	success: function()
	{
		//location.reload();
		// parent function
		//document.getElementById('i').innerHTML = ""+ data + "";
	},
	error: function()
	{
		
	}
	});
}

////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
// activity menu admin front end
////////////////////////////////////////////////////////////////////
function statutMenuAdminFrontEnd(menu) { //alert("success");//debug
	"use strict";
	var formData = {menu:menu};
	$.ajax(
	{
	url : "scripts/inc.core.tools.statutMenuAdminFrontEnd.php",
	type: "POST",
	data : formData,
	success: function()
	{
		//location.reload();
		// parent function
		//document.getElementById('i').innerHTML = ""+ data + "";
	},
	error: function()
	{
		
	}
	});
}

////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
//
////////////////////////////////////////////////////////////////////

//////////////////////////////
////////////////////////////////////////////////////////////////////
// ======= rec update les checkbox sur member_intel
/*function rec_checkboxMemberIntel(idMember, field) { //alert("youpi");
	"use strict";
	var value = "";
	// requete ajax
	if( $('input[name='+field+']').is(':checked') ){
		value = "no";
	} else {
		value = "yes";
	}
	//alert(value);
	var formData = {idMember:idMember, field:field, value:value};
	$.ajax(
	{
	url : "scripts/rec_fieldMemberIntel.php",
	type: "POST",
	data : formData,
	success: function(data)
	{
		//alert("ok update");
		document.getElementById('confirm_'+field).innerHTML = ""+ data + "";
		$("#confirm_"+field).css("opacity", "100"); 
		function closeConfirme() {
			$('#confirm_'+field).animate({opacity: 0},1000);
		}
		setTimeout(closeConfirme, 4000);
	},
	error: function()
	{
		document.getElementById('confirm_'+field).innerHTML = 'Error ajax !';
		$("#confirm_"+field).css("opacity", "100"); 
		function closeConfirme() {
			$('#confirm_'+field).animate({opacity: 0},1000);
		}
		setTimeout(closeConfirme, 4000);
	}
	});
}*/
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
// rec on events, one function per table, 
// idUser or idMember managed in front = finally is idMember
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
// fields table members_intel
////////////////////////////////////////////////////////////////////
// ======= rec update les checkbox sur member_intel
function rec_fieldMemberIntel(idMember, field) { //alert("success");//debug
	"use strict";
	var value = document.getElementById(field).value;
	var type = document.getElementById(field).type;
	// check which field
	if(field!="ifNotyUp") {
		if(type=="checkbox") {
			if( $('input[name='+field+']').is(':checked') ){
				value = "no";
			} else {
				value = "yes";
			}
		}
	}else {
		if(type=="checkbox") {
			if( $('input[name='+field+']').is(':checked') ){
				value = "yes";
			} else {
				value = "no";
			}
		}
	}
	//alert(value);//debug
	var formData = {idMember:idMember, field:field, value:value};
	$.ajax(
	{
	url : "scripts/inc.core.rec.fieldMemberIntel.php",
	type: "POST",
	data : formData,
	success: function(data)
	{
		document.getElementById('confirm_'+field).innerHTML = ""+ data + "";
		$("#confirm_"+field).css("opacity", "100"); 
		function closeConfirme() {
			$('#confirm_'+field).animate({opacity: 0},1000);
		}
		setTimeout(closeConfirme, 4000);
	},
	error: function()
	{
		document.getElementById('confirm_'+field).innerHTML = 'Error ajax !';
		$("#confirm_"+field).css("opacity", "100"); 
		function closeConfirme() {
			$('#confirm_'+field).animate({opacity: 0},1000);
		}
		setTimeout(closeConfirme, 4000);
	}
	});
}
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
// fields table members
////////////////////////////////////////////////////////////////////
function rec_fieldMember(idMember, field) { //alert("ops");
	"use strict";
	var value = document.getElementById(field).value;
	/*var type = document.getElementById(field).type;
	if(type=="checkbox") {
	   if( $('input[name='+field+']').is(':checked') ){
			value = 'no';
		} else {
			value = 'yes';
		}
	}*/
	var formData = {idMember:idMember, value:value, field:field};
	$.ajax(
	{
	url : "scripts/inc.core.rec.fieldMember.php",
	type: "POST",
	data : formData,
	success: function(data)
	{
		if(field==="job") {
		  	document.getElementById('jobUser').innerHTML = ""+ value + "";
			document.getElementById('jobUser2').innerHTML = ""+ value + "";
		}
		document.getElementById('confirm_'+field).innerHTML = ""+ data + "";
		$("#confirm_"+field).css("opacity", "100"); 
		function closeConfirme() {
			$('#confirm_'+field).animate({opacity: 0},1000);
		}
		setTimeout(closeConfirme, 4000);
	},
	error: function()
	{
		document.getElementById('confirm_'+field).innerHTML = 'Error ajax !';
		$("#confirm_"+field).css("opacity", "100"); 
		function closeConfirme() {
			$('#confirm_'+field).animate({opacity: 0},1000);
		}
		setTimeout(closeConfirme, 4000);
	}
	});
}
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
// rec fields member address
////////////////////////////////////////////////////////////////////
function rec_fieldMemberAddress(idMember, field, type) { //alert('success '+type);//debug
	//alert('youpi'); 
	"use strict";
	var value = document.getElementById(type+"_"+field).value;

	// do that only if it's field ifsamehome
	if(field=="ifSameHome") {
		if( $('input[name='+type+'_'+field+']').is(':checked') ){
			value = 'yes';
			$('#'+type+'_address').css('display', 'none');
		} else {
			value = 'no';
			$('#'+type+'_address').css('display', 'inline-table');
		}
	}
	//alert('success '+value);//debug
	var formData = {idMember:idMember, field:field, type:type, value:value};
	
	$.ajax(
	{
	url : "scripts/inc.core.rec.fieldMemberAddress.php",
	type: "POST",
	data : formData,
	success: function(data)
	{
		document.getElementById('confirm_'+type+'_'+field).innerHTML = ""+ data + "";
		$("#confirm_"+field).css("opacity", "100"); 
		function closeConfirme() {
			$('#confirm_'+type+'_'+field).animate({opacity: 0},1000);
		}
		setTimeout(closeConfirme, 4000);
	},
	error: function()
	{
		document.getElementById('confirm_'+type+'_'+field).innerHTML = 'Error ajax !';
		$("#confirm_"+field).css("opacity", "100"); 
		function closeConfirme() {
			$('#confirm_'+type+'_'+field).animate({opacity: 0},1000);
		}
		setTimeout(closeConfirme, 4000);
	}
	});
}
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
// rec fields table galleries
////////////////////////////////////////////////////////////////////
function rec_fieldGallery(idMember, field, idGallery) { //alert("success");//debug
	"use strict";
	var value = document.getElementById(field).value;
	
	if(field=="ifPublicGallery") {
		if( $('input[name='+field+']').is(':checked') ){
			value = 'no';
		} else {
			value = 'yes';
		}
	}
	var formData = {idMember:idMember, value:value, field:field, idGallery:idGallery};
	$.ajax(
	{
	url : "scripts/inc.core.rec.fieldGalleries.php",
	type: "POST",
	data : formData,
	success: function(data)
	{
		document.getElementById('confirm_'+field).innerHTML = ""+ data + "";
		$("#confirm_"+field).css("opacity", "100"); 
		function closeConfirme() {
			$('#confirm_'+field).animate({opacity: 0},1000);
		}
		setTimeout(closeConfirme, 4000);
	},
	error: function()
	{
		document.getElementById('confirm_'+field).innerHTML = 'Error ajax !';
		$("#confirm_"+field).css("opacity", "100"); 
		function closeConfirme() {
			$('#confirm_'+field).animate({opacity: 0},1000);
		}
		setTimeout(closeConfirme, 4000);
	}
	});
}
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
// rec fields table settings
////////////////////////////////////////////////////////////////////
function rec_fieldSettings(field) { //alert("success");
	"use strict";
	var value = document.getElementById(field).value;//alert(value);
	var type = document.getElementById(field).type;
	if(type==="checkbox") {
	   if( $('input[name='+field+']').is(':checked') ){
			value = 'yes';
		} else {
			value = 'no';
		}
	}
	
	// special traitment
	/*if((field==="ifActivePsp") && (value==="yes")) { 
	// affiche field id label
	   $('#showConfig').css('display', 'block');
	}else {	   
		$('#showConfig').css('display', 'none');
	}*/
	// if color link add value to links
	if(field==="linkColor") { 
	// affiche field id label
	   $('#nav-tabs a').css('color', value);
	}
	
	
	var formData = {value:value, field:field};
	$.ajax(
	{
	url : "scripts/inc.core.rec.fieldSettings.php",
	type: "POST",
	data : formData,
	success: function(data)
	{
		if(field=="activeDbSettings") {
			location.reload(true);
		}
		if((field=="ifLimitAge") && (value=="yes")) {
			location.reload(true);
		}
		// affiche ok
		document.getElementById('confirm_'+field).innerHTML = ""+ data + "";
		$("#confirm_"+field).css("opacity", "100"); 
		function closeConfirme() {
			$('#confirm_'+field).animate({opacity: 0},1000);
		}
		setTimeout(closeConfirme, 4000);
	},
	error: function()
	{
		document.getElementById('confirm_'+field).innerHTML = 'Error ajax !';
		$("#confirm_"+field).css("opacity", "100"); 
		function closeConfirme() {
			$('#confirm_'+field).animate({opacity: 0},1000);
		}
		setTimeout(closeConfirme, 4000);
	}
	});
}

////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
// rec fields table psp
////////////////////////////////////////////////////////////////////
function rec_fieldPsp(field) { //alert("success");
	"use strict";
	var value = document.getElementById(field).value;
	var type = document.getElementById(field).type;
	if(type==="checkbox") {
	   if( $('input[name='+field+']').is(':checked') ){
			value = 'yes';
		} else {
			value = 'no';
		}
	}
	/*if((field==="ifLimitAge") && (value==="yes")) { 
	// affiche field id label
	   $('#set_limitAge').css('display', 'block');
	}else {	   
		$('#set_limitAge').css('display', 'none');
	}*/
	var formData = {value:value, field:field};
	$.ajax(
	{
	url : "scripts/inc.core.rec.fieldPsp.php",
	type: "POST",
	data : formData,
	success: function(data)
	{
		// affiche ok
		document.getElementById('confirm_'+field).innerHTML = ""+ data + "";
		$("#confirm_"+field).css("opacity", "100"); 
		function closeConfirme() {
			$('#confirm_'+field).animate({opacity: 0},1000);
		}
		setTimeout(closeConfirme, 4000);
	},
	error: function()
	{
		document.getElementById('confirm_'+field).innerHTML = 'Error ajax !';
		$("#confirm_"+field).css("opacity", "100"); 
		function closeConfirme() {
			$('#confirm_'+field).animate({opacity: 0},1000);
		}
		setTimeout(closeConfirme, 4000);
	}
	});
}

////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
// rec fields table country
////////////////////////////////////////////////////////////////////
function rec_fieldCountry(idCountry, field) { //alert("success");//debug
	"use strict";
	var value = document.getElementById(field).value;
	
	/*if(field=="ifPublicGallery") {
		if( $('input[name='+field+']').is(':checked') ){
			value = 'no';
		} else {
			value = 'yes';
		}
	}*/
	var formData = {idCountry:idCountry, field:field, value:value};
	$.ajax(
	{
	url : "scripts/inc.core.rec.fieldCountry.php",
	type: "POST",
	data : formData,
	success: function(data)
	{
		document.getElementById('confirm_'+field).innerHTML = ""+ data + "";
		$("#confirm_"+field).css("opacity", "100"); 
		function closeConfirme() {
			$('#confirm_'+field).animate({opacity: 0},1000);
		}
		setTimeout(closeConfirme, 4000);
	},
	error: function()
	{
		document.getElementById('confirm_'+field).innerHTML = 'Error ajax !';
		$("#confirm_"+field).css("opacity", "100"); 
		function closeConfirme() {
			$('#confirm_'+field).animate({opacity: 0},1000);
		}
		setTimeout(closeConfirme, 4000);
	}
	});
}

////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
// limit characters pseudo
////////////////////////////////////////////////////////////////////
/*function checkPseudoSaisie(e){
	"use strict";
	//alert(e.which);
	if( e.which < 65 || e.which > 90 ) {
		if(  e.which ==173 || e.which ==8   ) {
			// 
		   }else {
			   e.preventDefault();
			   return false;
		   }
	}
}*/