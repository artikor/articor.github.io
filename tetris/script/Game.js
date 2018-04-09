(function(){
	var field = new Field();
	var game = null;
	
	var rndForm = ["00","01","10","11","20","21","30","40","41",
		"42","43","50","51","52","53","60","61","62","63"];
	var next = rndForm[RandomInt(0, rndForm.length-1)];
	var current = rndForm[RandomInt(0, rndForm.length-1)];
	var timerId;
	var lines=0;
	var level=1;
	var speed=800;

	var width = screen.availWidth;
	var height = screen.availHeight;
	var site = document.getElementById("site");
	var wgame = document.getElementById("wrap-game");
	var menu = document.getElementById("menu");

	if(width < height && (width<480 || height < 640)){
		var hei = Math.ceil(width*2/3);
		if(hei*2<=height){
			site.style.width = width+"px";
			menu.style.width = (width-hei)+"px";
		}
		else{
			hei= Math.ceil(height/2);
			site.style.width = Math.ceil(hei*3/2)+"px";
			menu.style.width = Math.ceil(hei*3/2-hei)+"px";
		}
		site.style.height = (hei*2)+"px";
		console.log(wgame.style);
		wgame.style.width = hei+"px";
	}
	if(width > height && (width<480 || height < 640)){
		var wid = Math.ceil(height/2);
		site.style.height = height+"px";
		site.style.width = Math.ceil(wid*3/2)+"px";
		menu.style.width = Math.ceil(wid*3/2/3) + "px";
		wgame.style.width = wid+"px";
	}
	for(var i=0; i<20; i++){
		var tr = document.createElement('tr');	
		field.box[i] = new Array(10);		
		for(var j=0; j<10; j++){
			var td = document.createElement('td');
			tr.appendChild(td);
			field.box[i][j] = false;			
		}
		$("#game").appendChild(tr);
	}

	field.createFigure(current[0],current[1]);
	$("#picture").style.backgroundImage = 
		"url(./image/figures/" + next + ".png)";


	function nextFigure(){		
		var l = field.getLines();
		if(l>=0){
			var loto = RandomInt(0, rndForm.length-1);
			next = rndForm[loto];
			$("#picture").style.backgroundImage = 
				"url(./image/figures/" + next + ".png)";
			game = field.createFigure(current[0],current[1]);
			lines += l;
			if(l>0){
				$("#lines").innerHTML = lines;
				var newLevel = Math.floor(lines/5+1);
				if(newLevel>level && speed>260) {
					speed = speed - 30;
					console.log(speed);
				}
				level = newLevel;
				$("#level").innerHTML = level;
			}
		}
		current = next;		
	}	

	$("body")[0].addEventListener("keydown",function(event){
		if(event.keyCode == 37) field.left();
		if(event.keyCode == 38) field.rotate();
		if(event.keyCode == 39) field.right();
		if(event.keyCode == 40) {
			if(game) nextFigure();
			else clearInterval(timerId);
		}
	});

	$("#bstart").addEventListener("click",function(){
		if(game==false){
			field.clearBox();
			speed = 800;
		}
		game = true;		
		timerId = setTimeout(function tick() {
			if(game) {
				nextFigure();
				timerId = setTimeout(tick, speed);
			}
			else 
				clearInterval(timerId);
		}, speed);
	});

	$("#bleft").addEventListener("click",function(){
		field.left();
	});

	$("#bright").addEventListener("click",function(){
		field.right();
	});

	$("#bdown").addEventListener("click",function(){
		if(game) nextFigure();
		else clearInterval(timerId);
	});

	$("#brotate").addEventListener("click",function(){
		field.rotate();
	});

})();