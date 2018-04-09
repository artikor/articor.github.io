function Zigzag(pos){
	var forms = [
		cells([[1,4],[1,5],[0,5],[0,6]],0),
		cells([[2,5],[1,4],[1,5],[0,4]],0)
	];
	this.indexForm = pos;
	this.form = forms[pos];
	
}

Zigzag.prototype = Object.create(Figure.prototype);
Zigzag.prototype.constructor = Zigzag;


Zigzag.prototype.getIndexRotate = function(){
	var idx = new Rotate();
	idx.coord = new Array(this.form.length);
	if(this.indexForm == 0){
		idx.coord[0] = {x:this.form[0].x+1, y:this.form[0].y+1, pos:0};
		idx.coord[1] = {x:this.form[1].x, y:this.form[1].y-1, pos:1};
		idx.coord[2] = {x:this.form[2].x+1, y:this.form[2].y, pos:2};
		idx.coord[3] = {x:this.form[3].x, y:this.form[3].y-2, pos:3};
		idx.indexForm = 1;
	}
	else{
		idx.coord[0] = {x:this.form[3].x, y:this.form[3].y+2, pos:3};
		idx.coord[1] = {x:this.form[2].x-1, y:this.form[2].y, pos:2};
		idx.coord[2] = {x:this.form[1].x, y:this.form[1].y+1, pos:1};
		idx.coord[3] = {x:this.form[0].x-1, y:this.form[0].y-1, pos:0};
		idx.indexForm = 0;
	}
	return idx;
}
