define(function(){
    seajs.use(["plugin/jquery.carouFredSel.min","plugin/jquery.lightbox"],function(){
        var pg = $("#PG");
        var popmax = $(".popmaximg");
        var popmaximg= popmax.find("img").eq(0);
        var prev = popmax.siblings(".gprev");
        var next = popmax.siblings(".gnext");
        var in_a = pg.find('a');
        var in_a_length = in_a.length;
        var num;
        var lzimg = popmax.find(".loadz");
        in_a.each(function(i){
            var _url = this.href;
            var $this = $(this);
            $this.click(function(){
                lzimg.show();
                popmaximg.hide();
                imgOnload(_url,function(url){
                    lzimg.hide();
                    popmaximg.attr('src',url).fadeIn();
                    num =parseInt( $this.attr("index")); 
                });                
                return false;
            })
        }).eq(0).click();
//        prev.click(function(){
//            if(num>0){
//                var c = num-1;
//                pg.find('a[index='+c+']').click();
//            }else{
//                num=in_a_length-1;
//            }
//        });
//        next.click(function(){
//            if(num<in_a_length-1){
//                var c = num+1;
//                pg.find('a[index='+c+']').click();
//            }else{
//                num=0;
//            }
//        });
        pg.carouFredSel({
            width:760,
            item:{
              visible:5
            },
            align:'left',
            scroll:{
                items: 1,
                duration: 500,
                pauseDuration: 3500
            },
            auto:false,
            prev:prev,
            next:next,
            scroll:{
                item:5
            }
        });
    });
//    var sublist= $('.sublist');
//    $('.gallery').mouseenter(function(){
//            sublist.stop(false,true).fadeIn();
//        }).parent().mouseleave(function(){
//            sublist.stop(false,true).fadeOut();
//        });
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
    }
})