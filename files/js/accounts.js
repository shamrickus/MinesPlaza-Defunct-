$(document).ready(function() {
jQuery("#pass_check").hide();
 jQuery("#pass").on("click", function(){ 
    if(jQuery(this).prop("checked")==true){
      jQuery("#pass_check").show();
    }else if (jQuery(this).prop("checked")==false){
      jQuery("#pass_check").hide();
  	}
  });
});
