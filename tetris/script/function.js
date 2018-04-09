function $(type){
	var elem;
	if(type[0]=='.')
		return document.getElementsByClassName(type.replace(".", ""));
	else if(type[0]=='#')		
		return document.getElementById(type.replace("#", ""));
	else 
		return document.getElementsByTagName(type);
}

function cells(coord,color){
	var obj=[];
	for(var i=0; i<coord.length; i++){
		obj[i] = new Cell(coord[i][0],coord[i][1],color);
	}
	return obj;
}

function RandomInt(min, max)
{
  return Math.floor(Math.random() * (max - min + 1)) + min;
}