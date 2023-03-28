window.onload = function(){

	var canvas;
	var delai=1000;
	var ctx;
	var canvasWidth = 900;
	var canvasHeight = 600;
	var blockSize= 30;


	init();
	

	function init()
	{
	canvas=document.createElement("canvas");
	canvas.width = canvasWidth ;
	canvas.height = canvasHeight;
	canvas.style.border="1px solid black";
	document.body.appendChild(canvas);
	ctx = canvas.getContext('2d');
	snakee = new snake([[6,4],[5,4],[4,4]]);
	refreshCanvas();
	
	}

	function refreshCanvas()
	{
		
		ctx.clearRect(0,0,canvasWidth , canvasHeight);
	
		snakee.draw();
		setTimeout(refreshCanvas,delai);
	}

	function drawBlock(ctx, position)
	{
		var x = position[0] * blockSize;
		var y = position[1] * blockSize;
		ctx.fillRect(x,y,blockSize,blockSize);
	}

	function snake(body)
	{
		this.body = body;
		this.draw=function()
		{
			ctx.save();
			ctx.fillStyle="blue";
			
			for(var i = 0;i<this.body.length;i++)
			{
				drawBlock(ctx,this.body[i]);
			}
			ctx.restore();
		};
	}
}