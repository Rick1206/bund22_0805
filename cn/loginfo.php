<?php
define('IN_SK',true);
require ('../includes/init.php');
  $order = $_GET['order'];
  switch($order){
      case "login":
?>
<div id="lightdetail" class="infobox">
  <h1 class="h-login">login</h1>
  <div class="popClose"></div>
  <div class="pdm2">
      <div class="fn-left">
          <img src="images/update/l_01.jpg" alt="">
      </div>
      <div class="fn-left">
          <div class="boxin" id="wr_box">
              <p class="t">欢迎来到&nbsp; 外滩22号&nbsp; 网站 ，<br> 登陆签署在给你即时访问会员优惠。</p>

              <table class="table1" id="form1">
                  <tr>
                      <td>邮箱 :</td>
                      <td><input type="text" class="inputInfo" id="lg_email" tips="Please input the correct E-mail address"> </td>
                  </tr>
                  <tr>
                      <td>密码 :</td>
                      <td><input type="password" class="inputInfo" id="lg_password" tips="Please input the correct password"> </td>
                  </tr>
                  <tr>
                      <td><a href="loginfo.php?order=forget" class="stof">忘记密码</a></td>
                      <td><a href="loginfo.php?order=register" class="stof">注册外滩22的会员?</a></td>
                  </tr>
                  <tr>
                      <td><a href="javascript:;" class="sbm" id="sbm_in">登陆</a></td>
                      <td></td>
                  </tr>
              </table>
          </div>
      </div>
  </div>
</div>
<script type="text/javascript">
    seajs.use("user.form",function(user){
        var login = new user.login();
        login.loginPage();
        _lightdd.tohref($(".stof"));
    });
</script>
<?php
    break;
    case "forget":
?>
    <div id="lightdetail" class="infobox">
        <h1 class="h-login">登陆</h1>
        <div class="popClose"></div>
        <div class="pdm2">
            <div class="fn-left">
                <img src="images/update/l_01.jpg" alt="">
            </div>
            <div class="fn-left">
                <div class="boxin" id="wr_box">
                    <p class="t">发送电子邮件来恢复你的密码。</p>

                    <table class="table1" id="form1">
                        <tr>
                            <td>邮箱 :</td>
                            <td><input type="text" class="inputInfo" id="r_email" tips="Please input the correct E-mail address"> </td>
                        </tr>
                        <tr>
                            <td><a href="javascript:;" class="sbm" id="re_in">发送</a></td>
                            <td></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        seajs.use("user.form",function(user,light){
            var u = new user.userForm();
            u.checked($('#r_email'),u.REG.Email);
            $('#re_in').click(function(){
                if($('#r_email').attr("passed") == "true"){
                    $.post("../service_center.php",{"funtype":"forgotpd","email":$('#r_email').val()},function(e){
                        if(e==="Ok"){
                          $("#wr_box .t").html("<i style='color:green;font-weight:bold;font-size:14px;'>Mail sent successfully!</i>");
                        }else{
                          $("#wr_box .t").html("<i style='color:red;font-weight:bold;font-size:14px;'>Mail failure! Please check your Email</i>");
                        }
                    })
                }
            });
        })
    </script>
<?php
    break;
    case "register":
?>
<div id="lightdetail" class="infobox">
  <h1 class="h-register">注册</h1>
  <div class="popClose"></div>
  <div class="pdm2">
      <div class="fn-left">
          <img src="images/update/l_01.jpg" alt="">
      </div>
      <div class="fn-left">
          <div class="boxin2" id="wr_box">
              <p class="t">*必须全填。</p>

              <table class="table2" id="form2">
                  <tr>
                      <td>邮箱 *:</td>
                      <td><input type="text" class="inputInfo" title="" id="r_Email" tips="Please input the correct E-mail address"> </td>
                  </tr>
                  <tr>
                      <td>密码 *:</td>
                      <td><input type="password" class="inputInfo" title="" id="r_password" tips="Please input the correct password"></td>
                  </tr>
                  <tr>
                      <td>确认密码 *:	</td>
                      <td><input type="password" class="inputInfo" title="" id="r_rpassword" tips="Two different input password"></td>
                  </tr>
                  <tr>
                      <td>名 *:	</td>
                      <td><input type="text" class="inputInfo" title="" id="r_firstName" tips="First Name can't be empty"></td>
                  </tr>
                  <tr>
                      <td>姓 *:	</td>
                      <td><input type="text" class="inputInfo" title="" id="r_lastName" tips="Last Name can't be empty"></td>
                  </tr>
                  <tr>
                      <td>国家 *:</td>
                      <td><input type="text" class="inputInfo" title="" id="r_country" tips="Country can't be empty"></td>
                  </tr>
                  <tr>
                      <td>城市 *:	</td>
                      <td><input type="text" class="inputInfo" title="" id="r_city" tips="City can't be empty"></td>
                  </tr>
                  <tr>
                      <td>地址 *:</td>
                      <td><input type="text" class="inputInfo" title="" id="r_address" tips="Address can't be empty"></td>
                  </tr>
                  <tr>
                      <td>电话 *:</td>
                      <td><input type="text" class="inputInfo" title="" id="r_phone" tips="Please fill in the correct phone number"></td>
                  </tr>
                  <tr>
                      <td>手机 *:</td>
                      <td><input type="text" class="inputInfo" title="" id="r_mobile" tips="Please fill in the correct mobile phone number"></td>
                  </tr>
                  <tr>
                      <td colspan="2">
                          <a href="#" class="sbm" id="sbm_in">注册</a>
                      </td>
                  </tr>
              </table>
          </div>
      </div>
  </div>
</div>
<script type="text/javascript">
  seajs.use("user.form",function(user){
      var register = new user.register();
      register.registerPage();
  })
</script>
<?php
          break;
      case "reservation":
?>
<div id="lightdetail" class="infobox">
    <h1 class="h-reservation">reservation</h1>
    <div class="popClose"></div>
    <div class="pdm2" style="height:385px;">
        <div class="fn-left">
            <img src="images/update/l_01.jpg" alt="">
        </div>
        <div class="fn-left">
            <div class="boxin2" id="wr_box">
                <table class="table2" id="form3">
                    <tr>
                        <td>你是外滩22号的会员吗?</td>
                        <td><label><input type="radio" name="menber" value="Yes"> 是</label><span style="padding:0 10px;"></span><label><input type="radio" name="menber" value="No"> 否</label></td>
                    </tr>
                    <tr>
                        <td>选择服务 *:</td>
                        <td>
                            <select class="inputInfo" name="service" id="" style="padding:0;width:290px;">
                            	<?php
                            	$where = "";
                            	$param = "title_".$lang." as name";
								$myquery = $db->query("SELECT ".$param." FROM ".$ros->table('discover').$where);
								while($thisB = $db->fetch_array($myquery)) {
								?>
                                <option value="<?php echo $thisB['name']; ?>"><?php echo $thisB['name']; ?></option>
                                <?php
								}
                                ?>
                                <!-- <option value="service2">service - 2</option> -->
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>名字 *:</td>
                        <td><input type="text" class="inputInfo" name="name" tips=""></td>
                    </tr>
                    <tr>
                        <td>公司名称 *:	</td>
                        <td><input type="text" class="inputInfo" name="companyName" tips=""></td>
                    </tr>
                    <tr>
                        <td>电话/手机 *:	</td>
                        <td><input type="text" class="inputInfo" name="tel" tips=""></td>
                    </tr>
                    <tr>
                        <td>邮箱 *:	</td>
                        <td><input type="text" class="inputInfo" name="email" tips=""></td>
                    </tr>
                    <tr>
                        <td>日期 *:</td>
                        <td><input type="text" class="inputInfo" name="date" tips=""></td>
                    </tr>
                    <tr>
                        <td>时间 *:	</td>
                        <td><input type="text" class="inputInfo" name="time" tips=""></td>
                    </tr>
                    <tr>
                        <td>聚会规模 *:</td>
                        <td><input type="text" class="inputInfo" name="partySize" tips=""></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><label><input type="radio" name="event" value="socialEvent"> 社会活动</label><span style="padding:0 10px;"></span><label><input type="radio" name="event" value="corporatEevent"> 公司社交活动</label></td>
                    </tr>
                    <tr>
                        <td>抽烟 :</td>
                        <td><label><input type="radio" name="smoking" value="Yes"> 是</label><span style="padding:0 10px;"></span><label><input type="radio" name="smoking" value="No"> 否</label></td>
                    </tr>
                    <tr>
                        <td colspan="2"><label><input type="checkbox" name="widthChildren" value="Yes"> 带小孩吗？</label></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            备注:<br>
                            <textarea name="notes" id="" cols="60" rows="2" style="width:350px;height:40px;border:0;"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <a href="#" class="sbm" id="sbm_in">发送</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    seajs.use("user.form",function(_u){
        var uform =  _u.userForm();
        $("#sbm_in").click(function(){
            var n = 0;
            smiValue();
            for (p in smitData){
                if( p !="notes" || p != "widthChildren"){
                    n++;
                };
            }
            if(n>=10){
            	
                $.post("service_center.php",smitData,function(e){
                    //alert(e);
                    if(e=="Ok"){
                    	alert("Email has sent.");
                    	$(".popClose").click();
                    }else{
                    	$(".popClose").click();
                    }
                })
            }else{
                alert("Please fill in the full!")
            }
        });
        var smitData = {};
        smitData.funtype = 'reservation';
        var cheackArrlength = new Array();
        function smiValue(){
            addD("menber");
            addD("event");
            addD("smoking");
            addD("widthChildren");
            addD2();
        }
        function addD(name){
            $("#wr_box input[name='"+ name  +"']").each(function(){
                if( $(this).is(":checked") ){
                    smitData[this.name] = this.value;
                }
            });
        }
        function addD2(){
            $("#wr_box input[type='text']").each(function(){
                if(this.value !=""){
                    smitData[this.name] = this.value;
                }
            });
            $("#wr_box select").each(function(){
                if(this.value !=""){
                    smitData[this.name] = this.value;
                }
            });
            $("#wr_box textarea").each(function(){
                if(this.value !=""){
                    smitData[this.name] = this.value;
                }
            });
        }
    })
</script>
<?php
          break;
  }
?>