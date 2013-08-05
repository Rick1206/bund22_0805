define(["plugin/jquery.min"],function(require,exports){
	
    function _banner(){
        var wb = $("#JSimg"),
            imgs = wb.find("img"),
            num = 0,
        	bAni = null;
        
        imgs.slice(1).hide();

        this.run = function(){
        	bAni = setInterval(ani,4000);
        }
        this.stop = function(){
        	clearInterval(bAni);
        }
        function ani(){
        	var i = num%imgs.length;
        	runBanner(i);
            num++;
        }
        function runBanner(i){
            imgs.eq(i).fadeIn(800).siblings().hide();
        }
        this.show =function(n){
        	num=n;
            imgs.eq(n).fadeIn().siblings('img').hide();
        }
        this.img = imgs;
    }
   
    
    function menuH(){
    	
        var jsOne= $('#jsOne'),
            menu_a  = jsOne.find(".menu_a");
        
        banner.img.bind("mouseenter",onRollOverHandle);

        function onRollOverHandle(){
        	banner.stop();
        	menu_a.stop(true,false).slideDown(200);
        }
        
        /*jsOne.mouseleave(function(){
            menu_a.stop(true,false).slideUp(200,function(){
            	banner.img.bind("mouseenter",onRollOverHandle);
            	banner.run();
            });
         });*/
       
        jsOne.mouseenter(function(){
        	banner.stop();
        	menu_a.stop(true,false).slideDown(200);
        });

        menu_a.find(".tar").each(function(i){
           var sils = $(this).siblings(".sub");
            $(this).mouseover(function(){
                sils.show();
                banner.show(i);
            });
            $(this).parent().mouseleave(function(){
               sils.hide();
            });
        });
    }
    var banner = new _banner();
    banner.run();
    menuH();
})