
jQuery(document).ready(function(){
  jQuery(".btn").click(function(){
  	/*================================CHECKED OR UNCHEKED VAUES=========================*/
  	if(jQuery("input[name=fname ]").prop("checked") == false){
  		var fname= "0";
  	}
  	else{
  		var fname= "1";
  	}
  if(jQuery("input[name=lname ]").prop("checked") == false){
  		var lname= "0"
  	}
  	else{
  		var lname= "1";
  	}
if(jQuery("input[name=Company ]").prop("checked") == false){
  		var Company= "0";
  	}
  	else {
  		var Company= "1";
  	}
if(jQuery("input[name=addr1 ]").prop("checked") == false){
  		var addr1= "0"
  	}
  	else {
  		var addr1= "1";
  	}

  	if(jQuery("input[name=addr2 ]").prop("checked") == false){
  		var addr2= "0";  	}
  	else {
  		var addr2= "1";
  	}
if(jQuery("input[name=city ]").prop("checked") == false){
  		var city= "0";
  	}
  	else {
  		var city= "1";
  	}
if(jQuery("input[name=zipcode ]").prop("checked") == false){
  		var zipcode= "0";
  	}
  	else {
  		var zipcode= "1";
  	}
if(jQuery("input[name=country ]").prop("checked") == false){
  		var country= "0";
  	}
  	else {
  		var country= "1";
  	}
if(jQuery("input[name=state ]").prop("checked") == false){
  	     var state= "0";
  	}
  	else {
  		var state= "1";
  	}
  if(jQuery("input[name=phone ]").prop("checked") == false){
  	     var phone= "0";
  	}
  	else {
  		var phone= "1";
  	}
  	if(jQuery("input[name=email ]").prop("checked") == false){
  	     var email= "0";
  	}
  	else {
  		var email= "1";
  	}

  	if(jQuery("input[name=notes ]").prop("checked") == false){
  		var notes= "0";
  	}
  	else {
  		var notes= "1";
  	}
/*================================AJAX CALL=========================*/
    jQuery.ajax({
    type: "POST",
    url: ajaxurl, 
    data: { action: 'rcf_update_setting' , nonce: ajax_var.nonce, fname:fname ,lname:lname, Company:Company, addr1:addr1, addr2:addr2, city:city, zipcode:zipcode, country:country, state:state, phone:phone, email:email, notes:notes }
  }).done(function( msg ) {
  	alert('Successfully Submitted');
});
     });
});  