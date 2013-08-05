//Light-box version 1.02  by lewis
;(function($){
jQuery.lightBox = function(forId) {
    var bodyHeight;
    var browserHeight;
    var maskHeight;
    var addTop;
    var offsetY = 16;
    var top;
    var broVer = $.browser.version;
    var popUp = $(forId);
    var _window = $(window);
    var _body = $('body');
    function resize() { 
        if ($('.eaMask').html() != null) {
            bodyHeight = document.body.clientHeight;
            browserHeight = _window.height();
            if (browserHeight > bodyHeight) {
                maskHeight = browserHeight;
            } else {
                maskHeight = bodyHeight;
            };
            $('.eaMask').css({ height: maskHeight + 'px' });
	            if (broVer != 6.0) {
	                popUp.css({ top: browserHeight / 2 - offsetY + addTop + 'px' });   
	            }
	            else {
	                top = jQuery(window).scrollTop() + browserHeight / 2 - offsetY;
	                popUp.css({ top: top });
	            }
        }
    }
    if (popUp.data("isOpen") || popUp.data("isOpen") == null) {
		open();
    }
    function open(){
        addTop = $(document).scrollTop();
        popUp.data("isOpen", false);
        _body.css({ position: 'relative', 'z-index': '888' });
        _body.append("<div class='eaMask'></div>");
        $('.eaMask').click(closes);
        bodyHeight = document.body.clientHeight;
        browserHeight = _window.height();
        if (browserHeight > bodyHeight) {
            maskHeight = browserHeight;
        } else {
            maskHeight = bodyHeight;
        }
        if (broVer == 6.0) {
            popUp.css({ position: 'absolute' });
        } else {
            addTop = 0;
            popUp.css({ position: 'fixed' });
        }
        	popUp.css({
	            top: browserHeight / 2 - offsetY + addTop + 'px',
	            left: '50%',
	            'z-index': '99999',
	            'margin-left': -popUp.width() / 2 + 'px',
	            'margin-top': -popUp.height() / 2 + 'px'
	        });
        var eaMask = $('.eaMask');
        eaMask.css({
            background: '#ccc',
            position: 'absolute',
            /*cursor: 'wait',*/
            left: '0',
            top: '0',
            filter: 'alpha(opacity=70)',
            '-moz-opacity': '0.7',
            opacity: '0.7',
            width: '100%',
            'z-index': '9999',
            height: maskHeight + 'px',
            display: 'none'
        });
        _window.bind("resize", resize);
        eaMask.fadeIn(200);
        popUp.fadeIn(200);
        if (broVer == 6.0) {
            $('select').css({ visibility: "hidden" });
            $('.lightbox select').css({ visibility: "visible" });
            _window.bind("scroll", scrollHandle);
        };
    }
    $(".popClose").live("click",closes);
    function closes() {
    _window.unbind("resize");
        $('.eaMask').fadeOut(200);
        popUp.fadeOut(200);
        setTimeout("$('.eaMask').remove();", 200);
        setTimeout("$('select').css({visibility:'visible'})", 200);
        popUp.data("isOpen", true);
		$(".status").hide();
    }
    function scrollHandle() {
        top = jQuery(window).scrollTop() + browserHeight / 2 - offsetY;
        popUp.css({ top: top });
    }
    function resizeHandle() {
        bodyHeight = document.body.clientHeight;
        browserHeight = _window.height();
        if (browserHeight > bodyHeight) {
            maskHeight = browserHeight;
        } else {
            maskHeight = bodyHeight;
        }
        eaMask.css({ height: maskHeight + 'px' });
    }
};
jQuery.lightClose = function(forId){
    eaMask.fadeOut(200);
	popUp.fadeOut(200);
	setTimeout("$('.eaMask').remove();",200);
	popUp.data("isOpen", true);
};
(function(a){
    a.fn.visible = function () {
        this.each(function () {
            a(this).css({visibility:"visible"})
        });
        return this
    };
    a.fn.invisible = function () {
        this.each(function () {
            a(this).css({visibility:"hidden"})
        });
        return this
    };
})($);
})(jQuery);




