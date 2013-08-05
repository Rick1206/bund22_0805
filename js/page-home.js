define(function(require,exports){
    $(function(){
        function _banner(){
            var wb = $("#JSimg"),
                imgs = wb.find("img"),
                num = 0,
                bAni = null;
            imgs.slice(1).hide();

            this.run = function(){
                bAni = setInterval(ani,5000);
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
                imgs.eq(i).fadeIn(1200).siblings().hide();
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
                banner.img.unbind("mouseenter",onRollOverHandle);
            }

            jsOne.mouseleave(function(){
                menu_a.stop(true,false).slideUp(200,function(){
                    banner.img.bind("mouseenter",onRollOverHandle);
                    banner.run();
                });
            });

            jsOne.mouseenter(function(){
                banner.stop();
                //menu_a.stop(true,false).slideDown(200);
                //update_2012_rick
                menu_a.slideDown(200);
                banner.img.unbind("mouseenter",onRollOverHandle);
            });
            if(document.addEventListener){
                jsOne[0].addEventListener("touchend",function(){
                    $(this).trigger("mouseenter");
                },false);
            }
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
        var lightup = require("lightup");
        window._lightdd =  new lightup;
        var _from = new require("user.form");
        var login = new _from.login();
        login.logout();
        seajs.use("http://v2.jiathis.com/code/jia.js",function(){
//        jiathis_config = {
//            url: "http://www.yourdomain.com",
//            title: "自定义网页标题 #微博话题#",
//            summary:"分享的文本摘要"
//        }
        });
    })
})