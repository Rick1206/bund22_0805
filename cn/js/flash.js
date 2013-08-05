/**
 * Created with JetBrains PhpStorm.
 * User: u
 * Date: 13-4-24
 * Time: 下午6:17
 * To change this template use File | Settings | File Templates.
 */

function swf(d,a,b,eid){
    return '<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="'+a+'" height="'+b+'" id="'+eid+'" align="middle"><param name="movie" value="'+d+'" /><param name="quality" value="high" /><param name="bgcolor" value="#ffffff" /><param name="play" value="true" /><param name="loop" value="true" /><param name="wmode" value="transparent" /><param name="scale" value="showall" /><param name="menu" value="true" /><param name="devicefont" value="false" /><param name="salign" value="" /><param name="allowFullScreen" value="true" /><param name="allowScriptAccess" value="sameDomain" /><embed src="'+d+'" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" name="about" bgcolor="#000000" width="'+a+'" height="'+b+'" allowscriptaccess="always" quality="High" wmode="transparent" allowFullScreen="true"></object>'
};


