$("#mobile_menu_btn").click(function(){
	$("#menu").stop().dequeue().fadeToggle(250); 
	/*if($("#menu").css("display") == "none"){
		$("#menu").show(500);
	} else {
		$("#menu").hide(500);
	}*/
});