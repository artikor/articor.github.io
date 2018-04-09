function Square(pos){
	var forms = [
		cells([[1,4],[1,5],[0,4],[0,5]],3)
	];
	this.indexForm = pos;	
	this.form = forms[pos];
	
}

Square.prototype = Object.create(Figure.prototype);
Square.prototype.constructor = Square;


Square.prototype.getIndexRotate = function(){
	return null;
}
