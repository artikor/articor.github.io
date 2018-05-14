(function(){
	var height = $(".site").height();
	$(".curtain").height(Math.floor(height)+"px");
})()


function butShowNav(){
	var curtain = $(".curtain").css("display");
	var nav = $(".nav-panel").css("display");
	$(".curtain").css("display",curtain=="none"?"block":"none");
	if(nav=="none"){
		$(".nav-panel").show(600);
	}
	else{
		$(".nav-panel").hide(600);
	}
	
	
}

