function Field(){

	this.figure = null;
	this.box = [];
	this.start = false;
	this.lines=0;

	this.addFigureInBox = function(){
		for(var i=0; i<this.figure.form.length; i++){
			var x = this.figure.form[i].x;
			var y = this.figure.form[i].y;
			this.box[x][y] = true;
		}
	}

	this.emptyInBox = function(){
		for(var i=0; i<this.figure.form.length; i++){
			var x = this.figure.form[i].x;
			var y = this.figure.form[i].y;
			if(this.box[x][y])
				return false;
		}
		return true;
	}

	this.clearBox = function(){
		var table = $("#game");
		for(var i=0; i<table.rows.length; i++){
			for(var j=0; j<table.rows[i].cells.length; j++){
				table.rows[i].cells[j].style.background = "none";
				this.box[i][j] = false;
			}
		}
	}

	this.createFigure = function(fgr, pos){
		this.start = true;
		if(fgr=="0") this.figure = new Zigzag(pos);
		if(fgr=="1") this.figure = new Lightning(pos);
		if(fgr=="2") this.figure = new Line(pos);
		if(fgr=="3") this.figure = new Square(pos);
		if(fgr=="4") this.figure = new Crown(pos);
		if(fgr=="5") this.figure = new Hook(pos);
		if(fgr=="6") this.figure = new Lever(pos);

		this.figure.show();		
		if(!this.emptyInBox()){
			bstart.disabled = false;
			alert("Игра окончена!");
			return false;
		}
		return true;
	}
	
	this.ReplaceLine = function(idx){
		var temp = [];
		var tr = document.createElement("tr");
		for(var k=0; k<this.box[idx].length; k++){
			temp[k] = false;
			var td = document.createElement('td');
			tr.appendChild(td);
		}
		this.box.splice(idx,1);
		this.box.unshift(temp);		
		var elem = $("#game").rows[idx].parentNode
			.removeChild($("#game").rows[idx]);
		$("#game").insertBefore(tr,$("#game").firstChild);
	}

	this.RemoveLine = function(){
		var count=0, lines =0;
		for(var i=0; i<this.box.length; i++){
			for(var j=0; j<this.box[i].length; j++)
				count += this.box[i][j];
			if(count==this.box[i].length){				
				this.ReplaceLine(i);
				lines++;
			}
			count = 0;
		}
		return lines;
	}

	this.getLines = function(){
		var down = this.down();
		if(this.figure===null) 
			return -1;
		if(down) {
			this.figure.down();
			return -1;
		}
		else {
			this.addFigureInBox();
			return this.RemoveLine();
		}
	}

	this.left = function(){
		var idx = this.figure.cellsLeft();
		for(var i=0; i<idx.length;i++){
			if(idx[i][1]<0 || this.box[idx[i][0]][idx[i][1]])
				return;
		}
		this.figure.left();
	}

	this.right = function(){
		var idx = this.figure.cellsRight();
		for(var i=0; i<idx.length;i++){
			if(idx[i][1]>9 || this.box[idx[i][0]][idx[i][1]])
				return;
		}
		this.figure.right();
	}

	this.down = function(){
		var idx = this.figure.cellsDown();
		for(var i=0; i<idx.length;i++){
			if(idx[i][0]>19 || this.box[idx[i][0]][idx[i][1]]){
				return false;
			}
		}
		return true;
	}
	this.rotate = function(){
		var idx = this.figure.cellsRotate();
		if(idx==null) return true;	
		for(var i=0; i<idx.length;i++){
			if(idx[i][1]<0 || idx[i][1]>9 || idx[i][0]<0 || 
				idx[i][0]>19 || this.box[idx[i][0]][idx[i][1]])
				return;
		}
		this.figure.rotate();
		return true;
	}

}