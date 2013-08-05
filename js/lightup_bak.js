define(function(require,exports,module){
    seajs.use("plugin/jquery.lightbox");
    function Popstrom(){
        var base = this;
        base.moredetails = $(".moredetails");
        var _body = $("body"),
            _bodyHeight = $(document).height(),
            _window = $(window),
            _windowHeight = _window.height();
        base.moredetails.length>0 && _body.append('<div id="poptre"></div><div class="load-pg" id="load_z" style="display: none;"></div>');
        var poptre = $("#poptre");
         base.tohref = function(objArr){
            $(objArr).each(function(){
                var $this = $(this);
                var _url = this.href;
                $this.click(function(){
                    pop();
                    base.pageGet(_url,function(){
                        var imgPlus = $("#img_plus");
                        imgPlus[0] && base.imgFda("#img_plus",$("#lightdetail").find("a.prev"),$("#lightdetail").find("a.next"));
                        setTimeout(function(){
                            $('#load_z').hide();
                            middleSize();
                            poptre.visible();
                        },300);
                    });
                    return false;
                });
            });
        }
        base.pageGet =  function(url,fnBk){
            var reg = /<body[^\>]*?>([^\x00]*?)<\/body>/ig;
            $.get(url,function(data){
                var _html = data.match(reg);
                poptre.html(RegExp.$1||data);
                fnBk.call(this);
            });
        }
        base.imgFda = function(o,prev,next){
            seajs.use("plugin/jquery.carouFredSel.min",function(){
                $(o).carouFredSel({
                    auto:false,
                    items: 1,
                    scroll: {
                        fx : "crossfade",
                        duration: 500
                    },
                    prev:prev,
                    next:next
                });
            })
        }
        base.tohref( base.moredetails);
        function middleSize(){
            var lightdetail =$("#lightdetail");
            var pop_h = lightdetail.innerHeight();
            var wind_h = $(window).height();
            if(pop_h<wind_h){
                lightdetail.css({
                    marginTop:(wind_h-pop_h)*0.5
                });
            }
        }
        function pop(){

            if(_windowHeight<_bodyHeight){

                _body.addClass("noscroll hidefixed");
            }
            $('#load_z').show();
            poptre.invisible();
            $.lightBox(poptre);
        }
        poptre.find(".popClose").live("click",function(){
            setTimeout(function(){
                _body.removeClass("noscroll hidefixed");
            },300);
        });
        poptre.bind("click",function(e){
            var targ = $(e.target);
            if(targ.attr("id")=="poptre"){
                poptre.find(".popClose").trigger("click");
            }
        });
    }
    module.exports =Popstrom;

})