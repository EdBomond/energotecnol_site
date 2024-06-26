function ImageExpander(oThumb, sImgSrc)
{
	// store thumbnail image and overwrite its onclick handler.
	this.oThumb = oThumb;
	this.oThumb.expander = this;
	this.oThumb.onclick = function() { this.expander.expand(); }
	
	// record original size
	this.smallWidth = oThumb.offsetWidth;
	this.smallHeight = oThumb.offsetHeight;	

	this.bExpand = true;
	this.bTicks = false;
	
	// self organized list
	if ( !window.aImageExpanders )
	{
		window.aImageExpanders = new Array();
	}
	window.aImageExpanders.push(this);

	// create the full sized image.
	this.oImg = new Image();
	this.oImg.expander = this;
	this.oImg.onload = function(){this.expander.onload();}
	this.oImg.src = sImgSrc;
}

ImageExpander.prototype.onload = function()
{
	this.oDiv = document.createElement("div");
	document.body.appendChild(this.oDiv);
	this.oDiv.appendChild(this.oImg);
	this.oDiv.style.position = "absolute";
	this.oDiv.expander = this;
	this.oDiv.onclick = function() {this.expander.toggle();};
	this.oImg.title = "Click to reduce.";
	this.bigWidth = this.oImg.width;
	this.bigHeight = this.oImg.height;
	
	if ( this.bExpand )
	{
		this.expand();
	}
	else
	{
		this.oDiv.style.visibility = "hidden";
		this.oImg.style.visibility = "hidden";
	}
}
ImageExpander.prototype.toggle = function()
{
	this.bExpand = !this.bExpand;
	if ( this.bExpand )
	{
		for ( var i in window.aImageExpanders )
			if ( window.aImageExpanders[i] !== this )
				window.aImageExpanders[i].reduce();
	}
}
ImageExpander.prototype.expand = function()
{
	// set direction of expansion.
	this.bExpand = true;

	// set all other images to reduce
	for ( var i in window.aImageExpanders )
		if ( window.aImageExpanders[i] !== this )
			window.aImageExpanders[i].reduce();

	// if not loaded, don't continue just yet
	if ( !this.oDiv ) return;
	
	// hide the thumbnail
	this.oThumb.style.visibility = "hidden";
	
	// calculate initial dimensions
	this.x = this.oThumb.offsetLeft;
	this.y = this.oThumb.offsetTop;
	this.w = this.oThumb.clientWidth;
	this.h = this.oThumb.clientHeight;
	
	this.oDiv.style.left = this.x + "px";
	this.oDiv.style.top = this.y + "px";
	this.oImg.style.width = this.w + "px";
	this.oImg.style.height = this.h + "px";
	this.oDiv.style.visibility = "visible";
	this.oImg.style.visibility = "visible";
	
	// start the animation engine.
	if ( !this.bTicks )
	{
		this.bTicks = true;
		var pThis = this;
		window.setTimeout(function(){pThis.tick();},25);	
	}
}
ImageExpander.prototype.reduce = function()
{
	// set direction of expansion.
	this.bExpand = false;
}
ImageExpander.prototype.tick = function()
{
	// calculate screen dimensions
	var cw = document.body.clientWidth;
	var ch = document.body.clientHeight;
	var cx = document.body.scrollLeft + cw / 2;
	var cy = document.body.scrollTop + ch / 2;

	// calculate target
	var tw,th,tx,ty;
	if ( this.bExpand )
	{
		tw = this.bigWidth;
		th = this.bigHeight;
		if ( tw > cw )
		{
			th *= cw / tw;
			tw = cw;
		}	
		if ( th > ch )
		{
			tw *= ch / th;
			th = ch;
		}
		tx = cx - tw / 2;
		ty = cy - th / 2; 
	}
	else
	{
		tw = this.smallWidth;
		th = this.smallHeight;
		tx = this.oThumb.offsetLeft;
		ty = this.oThumb.offsetTop;
	}	
	// move 5% closer to target
	var nHit = 0;
	var fMove = function(n,tn) 
	{
		var dn = tn - n;
		if ( Math.abs(dn) < 3 )
		{
			nHit++;
			return tn;
		}
		else
		{
			return n + dn / 10;
		}
	}
	this.x = fMove(this.x, tx);
	this.y = fMove(this.y, ty);
	this.w = fMove(this.w, tw);
	this.h = fMove(this.h, th);
	
	this.oDiv.style.left = this.x + "px";
	this.oDiv.style.top = this.y + "px";
	this.oImg.style.width = this.w + "px";
	this.oImg.style.height = this.h + "px";

	// if reducing and size/position is a match, stop the tick	
	if ( !this.bExpand && (nHit == 4) )
	{
		this.oImg.style.visibility = "hidden";
		this.oDiv.style.visibility = "hidden";
		this.oThumb.style.visibility = "visible";

		this.bTicks = false;
	}
	
	if ( this.bTicks )
	{
		var pThis = this;
		window.setTimeout(function(){pThis.tick();},25);
	}
}
