 jQuery(document).ready(function(){	
 	jQuery('[data-toggle="popover"]').popover();  

 	//Hiding popover on blur unless it is in focus
 	jQuery('body').on('click', function (e) {
    	jQuery('[data-toggle="popover"]').each(function () {
	        //the 'is' for buttons that trigger popups
	        //the 'has' for icons within a button that triggers a popup
	        if (!jQuery(this).is(e.target) && jQuery(this).has(e.target).length === 0 && jQuery('.popover').has(e.target).length === 0) {
	            jQuery(this).popover('hide');
	        }
    	});
	});
 });