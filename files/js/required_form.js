jQuery(document).ready(function(){	
 	jQuery('[data-toggle="popover"]').popover();  
    
	jQuery('[data-reqs]').each(function(){
		jQuery(this).blur(function(){
			if(jQuery(this).val().length > 0 && jQuery(this).attr('type') !== 'password'){
				if(jQuery(this).data('reqs').indexOf(';') > -1){
					var attrs = jQuery(this).data('reqs').split(';');
					for(var i = 0; i < attrs.length; i++){
						if(!switchCase(this, attrs[i])) break;					
					}	
				}
				else{
					var attrs = jQuery(this).data('reqs');
					switchCase(this, attrs);
				}
			}else if(jQuery(this).val().length > 0 && jQuery(this).attr('type') === 'password'){
				if(jQuery(this).attr('name') == 'password'){
					switchCase(this, jQuery(this).data('reqs'));
				}
				else{
                    switchCase(this, 'pw', jQuery('[name="password"]').val());
                }
			}else{
				jQuery(this).parent().removeClass('has-error');
				jQuery(this).parent().removeClass('has-success');
			}
		});
	});
});

function switchCase(selector, specific, old){
	var pass = true;
	switch(specific){
	//alpha num time for some regex
	case "an":
		if(!validateAlphaNum(jQuery(selector).val())) pass = false;
		break;
	//email field, time for some regex
	case "em":
		if(!validateEmail(jQuery(selector).val())) pass = false;
		break;
	//needs to match another field
	case "pw":
		if(jQuery(selector).val() !== old) pass = false;
		break;
	//Is a number (minimum length)
	default:
		if(jQuery(selector).val().length < specific) pass = false;
		break;
	}
	if(pass){
		jQuery(selector).parent().removeClass('has-error');
		jQuery(selector).parent().addClass('has-success');
		return true;
	}
	else{
		jQuery(selector).parent().addClass('has-error');
		jQuery(selector).parent().removeClass('has-success');
		return false;
	}
}

function validateAlphaNum(field){
	var re = /^[A-Za-z0-9_]*$/;
	return re.test(field);	
}

function validateEmail(email) { 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
} 
