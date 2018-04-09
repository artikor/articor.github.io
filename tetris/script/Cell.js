function Rotate(){
	this.coord = [];
	this.indexForm =0;
}

function Cell(X,Y,color){
	var colors = ["#0018ff","#7800ff","#fae361","#76d466","#66d4bf",
		"#EF463E","#EFB53E"];
	this.icolor = color;
	this.color = colors[color];
	this.fill = false;
	this.x = X;
	this.y = Y;

	this.newCoord = function(nX,nY){
		var elem = $("#game");
		elem.rows[this.x].cells[this.y].style.background = "none";
		elem.rows[nX].cells[nY].style.background = this.color;
		this.fill = true;
		//console.log("Старые: "+ this.x + ", " + this.y + "; Новые: " +
			//nX + ", " + nY);
		this.x = nX;
		this.y = nY;
	}

	this.show = function(){
		if(!this.fill){
			$("#game").rows[this.x].cells[this.y].style.background = this.color;
			this.fill = true;
		}
	}

	this.clear = function(){
		$("#game").rows[this.x].cells[this.y].style.background = "none";
	}

}


