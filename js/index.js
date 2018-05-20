	flag=0;
	$(".login-btn").click(function(){
    	$(".login-form").toggle(speed=7000);
    	$(".navbar-collapse").toggle();

	});
	$(".register").click(function(){
	$(".login-form").hide();
    	
	});

	$("#id_card").change(function(e){
		var x= e.target.files[0].name.split(".").pop();
		if(x!="jpg"){
			alert("only jpg image allowed ,you chose ."+x+" file");
			flag=1;
		}
		else
			flag=0;

	});


	