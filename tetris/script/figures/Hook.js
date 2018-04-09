function Hook(pos){
	var forms = [
		cells([[1,4],[1,5],[1,6],[0,6]],5),
		cells([[2,4],[2,5],[1,4],[0,4]],5),
		cells([[1,4],[0,4],[0,5],[0,6]],5),
		cells([[2,5],[1,5],[0,4],[0,5]],5)
	];
	this.indexForm = pos;	
	this.form = forms[pos];
	
}

Hook.prototype = Object.create(Figure.prototype);
Hook.prototype.constructor = Hook;


Hook.prototype.getIndexRotate = function(){
	var idx = new Rotate();
	idx.coord = new Array(this.form.length);
	if(this.indexForm == 0){
		idx.coord[0] = {x:this.form[0].x+1, y:this.form[0].y+1, pos:0};
		idx.coord[1] = {x:this.form[1].x+1, y:this.form[1].y+1, pos:1};
		idx.coord[2] = {x:this.form[2].x, y:this.form[2].y-1, pos:2};
		idx.coord[3] = {x:this.form[3].x, y:this.form[3].y-1, pos:3};
		idx.indexForm = 1;
	}
	else if(this.indexForm == 1){
		idx.coord[0] = {x:this.form[3].x+1, y:this.form[3].y+1, pos:3};
		idx.coord[1] = {x:this.form[2].x, y:this.form[2].y, pos:2};
		idx.coord[2] = {x:this.form[1].x-1, y:this.form[1].y-2, pos:1};
		idx.coord[3] = {x:this.form[0].x, y:this.form[0].y-1, pos:0};
		idx.indexForm = 2;
	}
	else if(this.indexForm == 2){
		idx.coord[0] = {x:this.form[3].x-1, y:this.form[3].y-1, pos:3};
		idx.coord[1] = {x:this.form[2].x-1, y:this.form[2].y-1, pos:2};
		idx.coord[2] = {x:this.form[1].x, y:this.form[1].y+1, pos:1};
		idx.coord[3] = {x:this.form[0].x, y:this.form[0].y+1, pos:0};
		idx.indexForm = 3;
	}
	else {
		idx.coord[0] = {x:this.form[0].x-1, y:this.form[0].y-1, pos:0};
		idx.coord[1] = {x:this.form[1].x, y:this.form[1].y, pos:1};
		idx.coord[2] = {x:this.form[2].x+1, y:this.form[2].y+2, pos:2};
		idx.coord[3] = {x:this.form[3].x, y:this.form[3].y+1, pos:3};
		idx.indexForm = 0;
	}	
	return idx;
}
