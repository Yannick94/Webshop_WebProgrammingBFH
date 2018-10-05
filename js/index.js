$(document).ready(function() {

  var menu1 = false;
  var menu2 = false;
  var menu3 = false;
  var menu4 = false;
  var menu5 = false;
  
  var cartOpen = false;
  var userOpen = false;

    $('.Navigation').on('mousedown touchstart', function() {
    
    if (!menu1) $(this).find('.Hardware').css({'background-color': 'gray', 'transform': 'translate(105px,30px)'});
    else $(this).find('.Hardware').css({'background-color': 'dimGray', 'transform': 'none'}); 
     if (!menu2) $(this).find('.Peripherie').css({'background-color': 'gray', 'transform': 'translate(75px,75px)'});
    else $(this).find('.Peripherie').css({'background-color': 'darkGray', 'transform': 'none'});
      if (!menu3) $(this).find('.Software').css({'background-color': 'gray', 'transform': 'translate(30px,105px)'});
    else $(this).find('.Software').css({'background-color': 'silver', 'transform': 'none'});
      if (!menu4) $(this).find('.Audio').css({'background-color': 'gray', 'transform': 'translate(-20px,125px)'});
    else $(this).find('.Audio').css({'background-color': 'silver', 'transform': 'none'});
	if (!menu5) $(this).find('.Home').css({'background-color': 'gray', 'transform': 'translate(125px,-20px)'});
    else $(this).find('.Home').css({'background-color': 'silver', 'transform': 'none'});
    menu1 = !menu1;
    menu2 = !menu2;
    menu3 = !menu3;
    menu4 = !menu4;
	menu5 = !menu5;
      
    });
	
	$(document).ready(function(){
		$('#NavHome').css({'color': '#ff0000'});
	})
	
	$('#NavAudio').click(function(){
		resetActive();
		$('#NavAudio').css({'color': '#ff0000'});
		$('.MainContent').html("");
		$('.MainContent').load('subPages/product.html');
	});

	$('#NavSoftware').click(function(){
		resetActive();
		$('#NavSoftware').css({'color': '#ff0000'});
		$('.MainContent').html("");
		$('.MainContent').load('subPages/product.html');
	});

	$('#NavPeripherie').click(function(){
		resetActive();
		$('#NavPeripherie').css({'color': '#ff0000'});
		$('.MainContent').html("");
		$('.MainContent').load('subPages/product.html');
	});

	$('#NavHardware').click(function(){
		resetActive();
		$('#NavHardware').css({'color': '#ff0000'});
		$('.MainContent').html("");
		$('.MainContent').load('subPages/product.html');
	});
	
	$('#NavHome').click(function(){
		resetActive();
		$('#NavHome').css({'color': '#ff0000'});
	});
	
	function resetActive(){
		$('#NavHome').css({'color': '#fff'});
		$('#NavHardware').css({'color': '#fff'});
		$('#NavPeripherie').css({'color': '#fff'});
		$('#NavSoftware').css({'color': '#fff'});
		$('#NavAudio').css({'color': '#fff'});
	}
	
	$('#ShoppingCart').click(function(){
		if(cartOpen){
			 document.getElementById("CartSlide").style.width = "0px";
			cartOpen = !cartOpen;
		}else{
			 document.getElementById("UserSlide").style.width = "0px";
			 document.getElementById("CartSlide").style.width = "400px";
			cartOpen = !cartOpen;
			userOpen = false;
		}
	})
	
	$('#User').click(function(){
		if(userOpen){
			 document.getElementById("UserSlide").style.width = "0px";
			userOpen = !userOpen;
		}else{
			 document.getElementById("CartSlide").style.width = "0px";
			 document.getElementById("UserSlide").style.width = "400px";
			 $(this).find('#UserSlide').css({'transform': 'translate(-400px,0px)'})
			userOpen = !userOpen;
			cartOpen = false;
		}
	})
});