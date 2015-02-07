$(document).ready(function() {
	jQuery('.btn').each(function(){
		jQuery(this).click(function(event){
			if (jQuery(this).attr('type') == 'submit'){
				setTimeout(function(){disableAll();}, 100);
			}
		});
	});

});

function disableAll(){
	jQuery('.btn').each(function(){
		jQuery(this).attr('disabled', 'disabled');
	});
}

function enableAll(){
	jQuery('.btn').each(function(){
		jQuery(this).removeAttr('disabled');
	});
}

function confirmation(){
	if(confirm("Are you sure?")){
		disableAll();
		return true;
	}
	else{
		enableAll();
		return false;
	}
}