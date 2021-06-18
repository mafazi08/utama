//<![CDATA[    
   // START ready function
   $(document).ready(function(){
 
	// TOGGLE SCRIPT
	$(".hide").hide();
 
	$("input.show-hide").click(function(event){
		$(this).parents(".toggle-wrap").find(".hide").toggle("normal");
 
		// Stop the link click from doing its normal thing
		return false;
	}); // END TOGGLE

   }); // END ready function
 //]]>