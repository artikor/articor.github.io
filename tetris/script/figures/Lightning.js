function Lightning(pos){
	var forms = [
		cells([[1,5],[1,6],[0,4],[0,5]],1),
		cells([[2,4],[1,4],[1,5],[0,5]],1)
	];
	this.indexForm = pos;	
	this.form = forms[pos];
}

Lightning.prototype = Object.create(Figure.prototype);
Lightning.prototype.constructor = Lightning;


Lightning.prototype.getIndexRotate = function(){
	var idx = new Rotate();
	idx.coord = new Array(this.form.length);
	if(this.indexForm == 0){
		idx.coord[0] = {x:this.form[0].x+1, y:this.form[0].y, pos:0};
		idx.coord[1] = {x:this.form[1].x, y:this.form[1].y-1, pos:1};
		idx.coord[2] = {x:this.form[2].x+1, y:this.form[2].y+2, pos:2};
		idx.coord[3] = {x:this.form[3].x, y:this.form[3].y+1, pos:3};
		idx.indexForm = 1;
	}
	else{
		idx.coord[0] = {x:this.form[3].x, y:this.form[3].y-1, pos:3};
		idx.coord[1] = {x:this.form[2].x-1, y:this.form[2].y-2, pos:2};
		idx.coord[2] = {x:this.form[1].x, y:this.form[1].y+1, pos:1};
		idx.coord[3] = {x:this.form[0].x-1, y:this.form[0].y, pos:0};
		idx.indexForm = 0;
	}
	return idx;
}