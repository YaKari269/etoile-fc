$(function(){
	// VARS
	var offset=$('#cont').offset(),
		nbr=8,
		largeurItem=160,
		largeur=947,
		nbrTotal=nbr+(largeur/largeurItem),
		limite=-(nbr*largeurItem),
		vitesse=0,
		px=0,
		val=0,
		decel=.05;
		bol=false;
	// largeur galerie
	$('#galerie').css('width',(nbrTotal*largeurItem)+'px');
	// ITEM galerie
	for(var i=0; i<nbrTotal; i++){
		val++;
		if(val>nbr) val-=nbr;
		$('#galerie').append('<div class="item"><img src="img/Partenaire/img'+val+'.jpg"/></div>');
	}
	// anim
	(function anim(){
		requestAnimationFrame(anim);
		//
		$('#cont').mouseover(function(){
			bol=true;
		});
		$('#cont').mouseout(function(){
			bol=false;
		});
		$('#cont').mousemove(function(evt){
			vitesse=(400-(evt.clientX-offset.left))/80;
		});
		//
		if(bol){
			px+=vitesse;
		}
		else{
			if(vitesse>0 && vitesse!=0){vitesse-=decel;if(vitesse<0)vitesse=0;}
			else if(vitesse<0 && vitesse!=0){vitesse+=decel;if(vitesse>0)vitesse=0;}
			else vitesse=0;
			px+=vitesse;
		}
		if(px<limite) px=0;
		if(px>0) px=limite;
		px+=vitesse;
		$('#galerie').css('left',px+'px');
		//
	}());
	/* anim mobile
	(function animMobile(){
		requestAnimationFrame(animMobile);
		//
		$('#cont').touch(function(){
			bol=true;
		});
		$('#cont').swipeleft(function(evt){
			vitesse=(400-(evt.clientX-offset.left))/80;
		});
		$('#cont').swiperight(function(evt){
			vitesse=(400-(evt.clientX-offset.left))/80;
		});
		//
		if(bol){
			px+=vitesse;
		}
		else{
			if(vitesse>0 && vitesse!=0){vitesse-=decel;if(vitesse<0)vitesse=0;}
			else if(vitesse<0 && vitesse!=0){vitesse+=decel;if(vitesse>0)vitesse=0;}
			else vitesse=0;
			px+=vitesse;
		}
		if(px<limite) px=0;
		if(px>0) px=limite;
		px+=vitesse;
		$('#galerie').css('left',px+'px');
		//
	}());*/
	// INTERACTIVITE
	$('.item').each(function(i){
		var num=i+1;
		if(num>nbr) num-=nbr;
		$(this).click(function(){
			//document.getElementById('p'+num).style.display="block";
			var divs = $(".pp");
			divs.filter(":visible").hide();
			$("#p"+num).show();
			return false;
		});
	});
});


/*  */

