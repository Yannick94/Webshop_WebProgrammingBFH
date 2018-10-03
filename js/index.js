$(document).ready(function() {

  var menu1 = false;
  var menu2 = false;
  var menu3 = false;
  var menu4 = false;
  var menu5 = false;
  
  var cartOpen = false;

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
	
	$('#NavAudio').click(function(){setTimeout(function () {
        location.href = "mainPage.html?kat=audio";
    }, 1000);});

	$('#NavSoftware').click(function(){setTimeout(function () {
        location.href = "mainPage.html?kat=software";
    }, 1000);});

	$('#NavPeripherie').click(function(){setTimeout(function () {
        location.href = "mainPage.html?kat=peripherie";
    }, 1000);});

	$('#NavHardware').click(function(){setTimeout(function () {
        location.href = "mainPage.html?kat=hardware";
    }, 1000);});
	
	$('#NavHome').click(function(){setTimeout(function () {
        location.href = "mainPage.html";
    }, 1000);});
	
	$('#ShoppingCart').click(function(){
		if(cartOpen){
			 document.getElementById("CartSlide").style.width = "0px";
			cartOpen = !cartOpen;
		}else{
			 document.getElementById("UserSlide").style.width = "0px";
			 document.getElementById("CartSlide").style.width = "300px";
			cartOpen = !cartOpen;
		}
	})
	
	$('#User').click(function(){
		if(cartOpen){
			 document.getElementById("UserSlide").style.width = "0px";
			cartOpen = !cartOpen;
		}else{
			 document.getElementById("CartSlide").style.width = "0px";
			 document.getElementById("UserSlide").style.width = "300px";
			cartOpen = !cartOpen;
		}
	})
});