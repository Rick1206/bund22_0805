define(function(require,exports){
    $(document).ready(function(){

        var lightup = require("lightup");
        window._lightdd =  new lightup;
        var _from = new require("user.form");
        var login = new _from.login();
        login.logout();
        seajs.use("http://v2.jiathis.com/code/jia.js",function(){
           // jiathis_config = {
           //     url: "http://www.yourdomain.com",
           //     title: "自定义网页标题 #微博话题#",
           //     summary:"分享的文本摘要"
           // }
        });
        if($('#JSimg').length ==1){
            $('body').addClass('homePage');
            seajs.use('plugin/jquery.carouFredSel.min',function(){ 
                $('#JSimg').after('<div id="d_loader" style="position:absolute;top:50%;left:50%;margin-left:-16px;margin-top:-16px;z-index:10; width:32px;height:32px;background:url(/images/loading.gif);"></div>')          
                $('#JSimg').carouFredSel({
                    auto:false,
//                    responsive:true,
                    items: {
                         visible : 1,
                         height:429,
                         width:1003
                     },
                    scroll:{
                        duration:1200,
                        timeoutDuration :6000,
                        fx:'crossfade',
                        pauseOnHover:true,
                        onBefore:function(data){                           
                            var $t = data.items.visible.find('img');
                            $('#d_loader').show();
                            imgOnload($t.data('original'),function(e){
                                    $('#d_loader').hide();
//                                    $t.css('backgroundImage','url('+ e +')');
                                    $t.attr('src',e);
                                    $('#JSimg').trigger("play");
                                });
                            $('#JSimg').trigger('pause');
                        }
                    },
                    onCreate:function(data){
                        var $t = $(data.items[0]).find('img');
                        $('#d_loader').show();
                        imgOnload($t.data('original'),function(e){
                                $('#d_loader').hide();
//                                $t.css('backgroundImage','url('+ e +')');
                                $t.attr('src',e);
                                $('#JSimg').trigger("play");
                            });
                        $('#JSimg').trigger('pause');
                    },
                    pagination: {
                        container:'#page',
                        anchorBuilder:function(){
                            return '<a href="#"></a>';
                        }
                    }
                }).trigger('play',true);
            });
        };
        var homepage = $('.homePage');

        (function($){
            var menu_a = $('.menu_b .tar'),
                sub_a = $('.sub a'),
                merge_a = $.merge(menu_a,sub_a);
            merge_a.each(function(){
               $(this).append('<span class="k_line" style="display:block;position: absolute;z-index: 12;width: 0px;height:1px;border-bottom: 1px solid #9b7d32;left:0;bottom:0;overflow: hidden"></span>');
               if(!$(this).hasClass('sel')){
                   $(this).mouseenter(function(){
                       $this = $(this);
                       $('.k_line',$this).stop(true,true).animate({width:$this.width()},300);
                   }).mouseleave(function(){
                           $this = $(this);
                           $('.k_line',$this).stop(true,true).animate({width:0},300);
                       });
               }else{
                   $this = $(this);
                   $('.k_line',$this).stop(true,true).animate({width:$this.width()},0);
               }
            });
        })(jQuery);
        function imgOnload(url,fn){
            var o = new Image();
            if(/*@cc_on 1 || @*/ 0){
                o.onreadystatechange = function(){
                    if(o.readyState=="complete"||o.readyState=="loaded"){                  
                        fn.apply(this,[url]);
                    }
                }
            }else{
                o.onload = function(){
                    fn.apply(this,[url]);
                }
            }
            o.src = url;
        };
        // $('.footer').hide();
        // function footerfix(){
        //     var body_height = $('body').height();
        //     var win_height = $(window).height();
        //     var footer = $('.footer');
        //     if(body_height<win_height){
        //         footer.parent('.wrap').css({paddingTop:(win_height-body_height-37),backgroundColor:'#fff'});
        //         footer.fadeIn();
        //     }else{
        //         footer.parent('.wrap').css({paddingTop:0});
        //         footer.fadeIn();
        //     }
        // };
        // debounce = function(func) {
        //     var timeout, result;
        //     return function() {
        //       var context = this, args = arguments;
        //       clearTimeout(timeout);
        //       timeout = setTimeout(function(){
        //         timeout = null;
        //         result = func.apply(context, args);
        //       }, 300);
        //       return result;
        //     };
        // };

        // var layer = debounce(footerfix);
        // $(window).resize(layer);

        // setTimeout(function(){
        //     $(window).resize();
        // },100);
    })
})
