/*用于news 选择图片
	.choose
*/

function imageChoose(){
	var $cho = $(".choose");
	$("body").append("<iframe src=\"\" frameborder=\"0\" id=\"filePanel\" class=\"chooseImg\" width=\"720\" height=\"500\" scrolling=\"no\"></iframe>");
	$cho.bind("click",function(){
		var $this = $(this);
		var _id = $this.attr("rel");
		var _file = $this.val();
		$("#filePanel").attr("src","newspicselect.php?id="+_id+"&file="+_file);					   
		$this.addClass("forchoose");
		$.lightBox("#filePanel");
	});
}

/*
	 dom id
*/
;function imageClick(id,show){
	var list = dom(id);
	var $item = $(list).find("tr:not(:last)");
	var show = dom(show);
	var check = list.getElementsByTagName("input");
	var _len = check.length;
	var _src,_srclen;
	$item.bind("click",function(){
		 var i = 0;
		 for(;i<_len;i++)
		 {
			 check[i].checked = false;
		 }	
		 var $this = $(this);
		 $this.find("input")[0].checked= true;
		 $this.addClass("on").siblings().removeClass("on");
		 _src = $this.find("span.picname").text();
		 show.value = _src;		 
	});
};
/*
	 dom id
*/
;function publish(show)
{
	$("#publish").click(function(){
		 var src = dom(show).value;	
		 window.parent.setTextSrc(src);	
	});	
}

/*
	外部方法
*/
;function setTextSrc(src)
{
	var $obj = $(".forchoose");
	if(src != "0")
	{
		$obj.val(src);
		if($obj.attr("show")!=undefined){
			$("#"+$obj.attr("show")).attr("src","../uploadfiles/banner/"+src);	
		}
	}
	lightBoxClose();
}

;function iframeLightBoxClose(){
	$(".common-tit-close").click(function(){
		window.parent.lightBoxClose();									  
	});	
}


;function lightBoxClose(){
	$.lightClose("#filePanel");	
}


/*
	dom function
*/
;function dom(id){
	return document.getElementById(id);	
}