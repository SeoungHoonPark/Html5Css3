$(document).ready(function(e) {
	var f = 1;
	$(".like").click(function  (){
		if(f == 1){
			$(this).attr("src","../images/heart_r.png");
			f = 0;
		}else if(f == 0){
			$(this).attr("src","../images/heart_g.png");
			f = 1;
		}
	});	
});