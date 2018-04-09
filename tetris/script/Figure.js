function Figure(){
	
}

/* показ фигуры */
Figure.prototype.show = function(){
	for(var i=0; i<this.form.length; i++){
		this.form[i].show();
	}
}

/* скрытие фигуры */
Figure.prototype.hide = function(){
	for(var i=0; i<this.form.length; i++){
		this.form[i].clear();
	}
}

/* смещение фигуры влево */
Figure.prototype.left = function(){
	for(var i=0; i<this.form.length; i++){
		this.form[i].newCoord(this.form[i].x,this.form[i].y-1);
	}
}

/* смещение фигуры вправо */
Figure.prototype.right = function(){
	for(var i=this.form.length-1; i>=0; i--){
		this.form[i].newCoord(this.form[i].x,this.form[i].y+1);
	}
}

/* спуск фигуры вниз */
Figure.prototype.down = function(){
	for(var i=0; i<this.form.length; i++){
		this.form[i].newCoord(this.form[i].x+1,this.form[i].y);
	}
}

/* смещение фигуры по часовой стрелке */
Figure.prototype.rotate = function(){
	var r = this.getIndexRotate();
	this.hide();
	for(var i=0; i<r.coord.length; i++){
		this.form[r.coord[i].pos].newCoord(r.coord[i].x,r.coord[i].y);
	}
	this.indexForm = r.indexForm;
}

/* проверка индекса*/
Figure.prototype.check = function(x,y){
	for(var i=0; i<this.form.length; i++){
		if(x==this.form[i].x && y==this.form[i].y)
			return false;
	}
	return true;
}

/* нахождение индексов ячеек слева от фигуры */
Figure.prototype.cellsLeft = function(){
	var cells = [];
	for(var i=0; i<this.form.length; i++){
		if(this.check(this.form[i].x,this.form[i].y-1))
			cells.push([this.form[i].x,this.form[i].y-1]);
	}
	return cells;
}

/* нахождение индексов ячеек справа от фигуры */
Figure.prototype.cellsRight = function(){
	var cells = [];
	for(var i=this.form.length-1; i>=0; i--){
		if(this.check(this.form[i].x,this.form[i].y+1))
			cells.push([this.form[i].x,this.form[i].y+1]);
	}
	return cells;
}

/* нахождение индексов ячеек снизу от фигуры*/
Figure.prototype.cellsDown = function(){
	var cells = [];
	for(var i=0; i<this.form.length; i++){
		if(this.check(this.form[i].x+1,this.form[i].y))
			cells.push([this.form[i].x+1,this.form[i].y]);
	}
	return cells;
}

/* индексы при повороте фигуры */
Figure.prototype.cellsRotate = function(){
	var r = this.getIndexRotate();
	if(r==null) return null;
	var cells = [];
	for(var i=0; i<r.coord.length; i++){
		if(this.check(r.coord[i].x,r.coord[i].y))
			cells.push([r.coord[i].x,r.coord[i].y]);
	}
	return cells;
}

