define(["plugin/jquery.min"],function(require,exports){

    function _banner(){
        var wb = $("#JSimg"),
            imgs = wb.find("img"),
            num = 0;
        imgs.slice(1).hide();
//        runle = setInterval(function(){
//            var i = num%imgs.length;
//            run(i);
//            num++;
//        },4000);
        function run(i){
            imgs.eq(i).fadeIn(800).siblings().hide();
        }
        this.show =function(n){
            imgs.eq(n).fadeIn().siblings('img').hide();
        }
        this.img = imgs;
    }
   
    
    function menuH(){
    	var banner = new _banner();
        var jsOne= $('#jsOne'),
            menu_a  = jsOne.find(".menu_a");
        
        banner.img.bind("mouseenter",onRollOverHandle);
        function onRollOverHandle(){
        	banner.img.bind("mouseleave",onRollOutHandle);
            menu_a.stop(true,false).slideDown(200);
        }
        function onRollOutHandle(){
        	menu_a.stop(true,false).slideUp(200);
        }
        jsOne.mouseenter(function(){
            menu_a.stop(true,false).slideDown(200);
        });
        jsOne.mouseleave(function(){
           menu_a.stop(true,false).slideUp(200);
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
    
   
    menuH();
})