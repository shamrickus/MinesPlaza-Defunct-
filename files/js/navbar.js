jQuery(document).ready(function(){	
	jQuery('.clickable').click(function(){
    	removeAll();
    	jQuery(this).addClass("active");
   });
});

function removeAll(){
	jQuery('.active').each(function(){
		jQuery(this).removeClass("active");
	});
}
