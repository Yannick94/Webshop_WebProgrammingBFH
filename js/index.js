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

            $(document).ready(function() {
                $('#NavHome').css({
                    'color': '#ff0000'
                });
            })

            $('#NavAudio').click(function() {
                resetActive();
                $('#NavAudio').css({
                    'color': '#ff0000'
                });
                $('.MainContent').html("");
                $('.MainContent').load('subPages/product.php');
            });

            $('#NavSoftware').click(function() {
                resetActive();
                $('#NavSoftware').css({
                    'color': '#ff0000'
                });
                $('.MainContent').html("");
                $('.MainContent').load('subPages/product.php');
            });

            $('#NavPeripherie').click(function() {
                resetActive();
                $('#NavPeripherie').css({
                    'color': '#ff0000'
                });
                $('.MainContent').html("");
                $('.MainContent').load('subPages/product.php');
            });

            $('#NavHardware').click(function() {
                resetActive();
                $('#NavHardware').css({
                    'color': '#ff0000'
                });
                $('.MainContent').html("");
                $('.MainContent').load('subPages/product.php');
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
                            window.location = "http://localhost/Login";
                        }, 1000);
                    }else{
                        window.location = "http://localhost/Login";
                    }
                })

                $(".MainContent").on('mousedown touchstart', '#registerLoginbtn', function(){
                    if(menuOpen){
                        closeMenu();
                        setTimeout(function (){ 
                            window.location = "http://localhost/Register";
                        }, 1000);
                    }else{
                        window.location = "http://localhost/Register";
                    }
                })

                $(".MainContent").on('mousedown touchstart','.cancelLoginbtn', function(){
                    if(menuOpen){
                        closeMenu();
                        setTimeout(function (){ 
                            window.location = "http://localhost";
                        }, 1000);
                    }else{
                        window.location = "http://localhost";
                    }
                })
            });