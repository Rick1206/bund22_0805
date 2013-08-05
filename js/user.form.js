define(function(require,exports,module){
    function UserForm(){
        var base = this;
        base.REG = {
            Email:/\w+((-w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+/,
            Password:/^[A-Za-z0-9_-]+$/,
            Phone:/[0-9-()（）]{7,18}/,
            Mobile:/0?(13|14|15|18)[0-9]{9}/,
            nonNULL:/^.+$/
        }
        base.checked = function(obj,reg){
            $(obj).change(function(){
                chg(this,reg);
            }).focus(function(){
                    if($(this).attr("passed") =="false"){
                        $(this).val("").css({
                            background:"#fff",
                            color:"#868686"
                        });
                    }
                });
        }
        base.chackedSame=function(a,b){
            $(a).change(function(){
                if($(this).val()==$(b).val()){
                    $(this).css({
                        background:'#b5f7bd'
                    }).attr("passed","true");
                }else{
                    $(this).css({
                        background:'red',
                        color:"#868686"
                    }).attr("passed","false");
                }
            }).focus(function(){
                    $(this).val("").css({
                        background:"#fff",
                        color:"#868686"
                    });
                });
        }
        base.formReset=function(input){
            $(input).each(function(){
                $(this).val("").css({
                    background:"#FFF",
                    color:"#666"
                })
            });
            $(input).eq(0).select();
        }
        function check(str,reg){
            if(reg.test(str)){
                return true;
            }else{
                return false;
            }
        }
        function chg(obj,reg){
            if( check( $(obj).val(),reg ) ){
                $(obj).css({
                    background:'#b5f7bd'
                }).attr("passed","true");
            }else{
                $(obj).css({
                    background:'red',
                    color:"#fff"
                }).val($(obj).attr("tips")).attr("passed","false");
            }
        }
    }
    function Login(){
        var base = this;
        var _form = new UserForm();
        base.INFO={
            Email:$('#lg_email'),
            Password:$('#lg_password')
        }
        var topnav = $(".topnav");
        base.loginPage = function(){
            _form.checked(base.INFO.Email,_form.REG.Email);
            _form.checked(base.INFO.Password,_form.REG.Password);
            $("#sbm_in").click(function(){
                var num = 0;
                var inputs = $("#form1 input");
                inputs.each(function(){
                      if(this.value!="" && $(this).attr("passed")=="true"){
                           num++;
                      }
                  });
                if(inputs.length == num){
                    $.post("service_center.php",{
                        funtype:"login",
                        username:base.INFO.Email.val(),
                        password:base.INFO.Password.val()
                    },function(d){
                        var fb = eval("(" + d + ")");
                        if(fb.error == 1){
                            alert("用户名或者密码错误");
                            _form.formReset([base.INFO.Email,base.INFO.Password]);
                        }else{
                            $(".popClose").click();
                            $("#login_username").find(".adm").html(fb.data.username).end().css({visibility:"visible"});
                            topnav.find(".lr").hide();
                        }
                    });
                }
            })
        }
        base.logout = function(){
             var btn = $("#logout_d");
            btn.click(function(){
                $.get("logout.php",{"act":"destroy"},function(){
                    topnav.find(".lr").show();
                    $("#login_username").attr("style","");
                })
            })
        }
    }
    function Register(){
        var base = this;
        var _form = new UserForm();
        base.INFO={
            Email:$('#r_Email'),
            Password:$('#r_password'),
            FirstName:$('#r_firstName'),
            LastName:$('#r_lastName'),
            Country:$('#r_country'),
            City:$('#r_city'),
            Adress:$('#r_address'),
            Phone:$('#r_phone'),
            Mobile:$('#r_mobile')
        }
        base.registerPage = function(){
            _form.checked(base.INFO.Email,_form.REG.Email);
            _form.checked(base.INFO.Password,_form.REG.Password);
            _form.checked(base.INFO.FirstName,_form.REG.nonNULL);
            _form.checked(base.INFO.LastName,_form.REG.nonNULL);
            _form.checked(base.INFO.Country,_form.REG.nonNULL);
            _form.checked(base.INFO.City,_form.REG.nonNULL);
            _form.checked(base.INFO.Adress,_form.REG.nonNULL);
            _form.checked(base.INFO.Phone,_form.REG.Phone);
            _form.checked(base.INFO.Mobile,_form.REG.Mobile);
            _form.chackedSame($('#r_rpassword'),base.INFO.Password);
            $("#sbm_in").click(function(){
                var num = 0;
                var inputs = $("#form2 input");
                inputs.each(function(){
                    if(this.value!="" && $(this).attr("passed")=="true"){
                        num++;
                    }
                })
                if(inputs.length == num){
                    $.post("service_center.php",{
                        funtype:"register",
                        username:base.INFO.Email.val(),
                        password:base.INFO.Password.val(),
                        firstname:base.INFO.FirstName.val(),
                        lastname:base.INFO.LastName.val(),
                        country:base.INFO.Country.val(),
                        city:base.INFO.City.val(),
                        adress:base.INFO.Adress.val(),
                        phone:base.INFO.Phone.val(),
                        mobile:base.INFO.Mobile.val()
                    },function(d){
                        var fb = eval("(" + d + ")");
                        if(fb.error == 1){
                            alert("注册失败");
                        }else{
                            alert("注册成功");
                            $("#J_login").click();
//                            $(".popClose").click();
                        }
                    });
                }
            })
        }
    }
    exports.userForm = UserForm;
    exports.login = Login;
    exports.register = Register;
})