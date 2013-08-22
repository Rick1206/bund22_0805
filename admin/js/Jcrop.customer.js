function jropCustomer(o){
	 // Create variables (in this scope) to hold the API and image size
      var jcrop_api, boundx, boundy;
	  
	  var tw = o.width;
	  var th = o.height;

	  $(".jcPreview").css({width:tw,height:th});
      $('#target').Jcrop({
        onChange: updatePreview,
        onSelect: updatePreview,
        aspectRatio: tw/th
      },function(){
        // Use the API to get the real image size
        var bounds = this.getBounds();
        boundx = bounds[0];
        boundy = bounds[1];
        // Store the API in the jcrop_api variable
        jcrop_api = this;
      });

      function updatePreview(c)
      {
        if (parseInt(c.w) > 0)
        {
          var rx = tw / c.w;
          var ry = th / c.h;

          $('#preview').css({
            width: Math.round(rx * boundx) + 'px',
            height: Math.round(ry * boundy) + 'px',
            marginLeft: '-' + Math.round(rx * c.x) + 'px',
            marginTop: '-' + Math.round(ry * c.y) + 'px'
          });
		};
		showCoords(c);		
      };
	 
	function showCoords(c)
    {
      $('#x').val(c.x*($("#imgOwidth").val()/310));
      $('#y').val(c.y*($("#imgOwidth").val()/310));
      $('#w').val(c.w*($("#imgOwidth").val()/310));
      $('#h').val(c.h*($("#imgOwidth").val()/310));
    };

    function clearCoords()
    {
      $('#coords input').val('');
      $('#h').css({color:'red'});
      window.setTimeout(function(){
        $('#h').css({color:'inherit'});
      },500);
    };
}

_jropbol = true;
_ishaveframe = true;
function fileIsChange()
{
	_jropbol = false;	
	$("#filePanel").css({display:"none"});
}

//file change事件
function fileOnChange(){
	var usesize = {
		width:200,
		height:300
	};
	if(_jropbol)
	{
		return false;	
	}
	
	var win,url;	
	var _rString = /^\./;	
	setTimeout(function(){ returnUrl(); },500);	
	
	function returnUrl()
	{
		if(_ishaveframe){			
			win = document.getElementById('filePanel').contentWindow;
			win.document.body.style.background="#F4F4F4";
			url = win.document.body.innerHTML;	
		}
		else
		{
			url = $("#iframeUpimg").val();
		}
		
		if(_rString.test(url))
		{	
			$("#cropload").load("crop.php",{url:url},function(){
				var $size = $("#JcSize").val().split(",");
				usesize.width = $size[1];
				usesize.height = $size[2];
				jropCustomer(usesize);							
			});	
			$("#iframeUpimg").val(url);
			$("#filePanel").attr("src","file.html");
			_ishaveframe = false;
			var _extend = url.substring(url.lastIndexOf("."),url.length);
			var _file = url.substring(url.lastIndexOf("/")+1,url.lastIndexOf("."));
			$("#extend").text(_extend+";文件名只能用数字字母及_");
			$("#fileurl").val(_file);
			$("#returnBtn").fadeIn(50);
			$("#returnBtn").bind('click',function(){
				$(this).fadeOut(0);
				$("#filePanel").css({display:'block'});
				$("#cropload").html("");
				_ishaveframe = true;
			});
		}
		else
		{
			setTimeout(function(){ returnUrl(); },500);	
		}
	}
}



function selectCustom(o){
	var $drop = $(o.obj);
	var $dropitem = $(o.objitem);
	var $val = $(o.set);
	var $showitem = $(o.showitem);
	var $item = $dropitem.find("a");
	$drop.bind("click",function(){
		$dropitem.slideDown(200);							
	});
	$item.bind("click",function(){								
		var $this = $(this);
		$val.val($this.attr("size"));
		$dropitem.slideUp(200);
		$showitem.text($this.text());
		fileOnChange(_jropbol);
	});
	
}


function getImgWidth(obj)
{
	$("#imgOwidth").val(obj.offsetWidth);
}