$(document).ready(function() {

            var menuOpen = false;

            var userOpen = false;
            $('.Navigation').on('mousedown touchstart', function() {

                if (!menuOpen) $(this).find('.Hardware').css({
                    'background-color': 'gray',
                    'transform': 'translate(105px,30px)'
                });
                else $(this).find('.Hardware').css({
                    'background-color': 'dimGray',
                    'transform': 'none'
                });
                if (!menuOpen) $(this).find('.Peripherie').css({
                    'background-color': 'gray',
                    'transform': 'translate(75px,75px)'
                });
                else $(this).find('.Peripherie').css({
                    'background-color': 'darkGray',
                    'transform': 'none'
                });
                if (!menuOpen) $(this).find('.Software').css({
                    'background-color': 'gray',
                    'transform': 'translate(30px,105px)'
                });
                else $(this).find('.Software').css({
                    'background-color': 'silver',
                    'transform': 'none'
                });
                if (!menuOpen) $(this).find('.Audio').css({
                    'background-color': 'gray',
                    'transform': 'translate(-20px,125px)'
                });
                else $(this).find('.Audio').css({
                    'background-color': 'silver',
                    'transform': 'none'
                });
                if (!menuOpen) $(this).find('.Home').css({
                    'background-color': 'gray',
                    'transform': 'translate(125px,-20px)'
                });
                else $(this).find('.Home').css({
                    'background-color': 'silver',
                    'transform': 'none'
                });
                menuOpen = !menuOpen;
            });

            $('#NavHome').click(function(){
                resetActive();
                $('#NavHome').css({
                    'color': '#ff0000'
                });
                if(menuOpen){
                    closeMenu();
                    setTimeout(function (){ 
                        window.location = "/";
                    }, 1000);
                }else{
                    window.location = "/";
                }
            });

            $('#NavAudio').click(function() {
                resetActive();
                $('#NavAudio').css({
                    'color': '#ff0000'
                });
                if(menuOpen){
                    closeMenu();
                    setTimeout(function (){ 
                        window.location = "/Overview?cat=4";
                    }, 1000);
                }else{
                    window.location = "/Overview?cat=4";
                }
            });

            $('#NavSoftware').click(function() {
                resetActive();
                $('#NavSoftware').css({
                    'color': '#ff0000'
                });
                if(menuOpen){
                    closeMenu();
                    setTimeout(function (){ 
                        window.location = "/Overview?cat=3";
                    }, 1000);
                }else{
                    window.location = "/Overview?cat=3";
                }
            });

            $('#NavPeripherie').click(function() {
                resetActive();
                $('#NavPeripherie').css({
                    'color': '#ff0000'
                });
                if(menuOpen){
                    closeMenu();
                    setTimeout(function (){ 
                        window.location = "/Overview?cat=2";
                    }, 1000);
                }else{
                    window.location = "/Overview?cat=2";
                }
            });

            $('#NavHardware').click(function() {
                resetActive();
                $('#NavHardware').css({
                    'color': '#ff0000'
                });
                if(menuOpen){
                    closeMenu();
                    setTimeout(function (){ 
                        window.location = "/Overview?cat=1";
                    }, 1000);
                }else{
                    window.location = "/Overview?cat=1";
                }
            });

            $('#NavHome').click(function() {
                resetActive();
                $('#NavHome').css({
                    'color': '#ff0000'
                });
            });

            function resetActive() {
                $('#NavHome').css({
                    'color': '#fff'
                });
                $('#NavHardware').css({
                    'color': '#fff'
                });
                $('#NavPeripherie').css({
                    'color': '#fff'
                });
                $('#NavSoftware').css({
                    'color': '#fff'
                });
                $('#NavAudio').css({
                    'color': '#fff'
                });
            }

            function closeMenu(){
                $(this).find('.Hardware').css({
                    'background-color': 'dimGray',
                    'transform': 'none'});
                $(this).find('.Peripherie').css({
                        'background-color': 'darkGray',
                        'transform': 'none'
                });
                $(this).find('.Software').css({
                    'background-color': 'silver',
                    'transform': 'none'
                });
                $(this).find('.Audio').css({
                    'background-color': 'silver',
                    'transform': 'none'
                });
                $(this).find('.Home').css({
                    'background-color': 'silver',
                    'transform': 'none'
                });
                menuOpen = false;
            }

                $('#User').on('mousedown touchstart', function() {
                    if(menuOpen){
                        closeMenu();
                        setTimeout(function (){ 
                            window.location = "/Login";
                        }, 1000);
                    }else{
                        window.location = "/Login";
                    }
                })

                $(".MainContent").on('mousedown touchstart', '#registerLoginbtn', function(){
                    if(menuOpen){
                        closeMenu();
                        setTimeout(function (){ 
                            window.location = "/Register";
                        }, 1000);
                    }else{
                        window.location = "/Register";
                    }
                })

                $(".MainContent").on('mousedown touchstart','.cancelLoginbtn', function(){
                    if(menuOpen){
                        closeMenu();
                        setTimeout(function (){ 
                            window.location = "/";
                        }, 1000);
                    }else{
                        window.location = "/";
                    }
                })

                $(".clickForProduct").click(function() {
                    window.location = "/Product?Id="+$(this).data("id");
                });
            });