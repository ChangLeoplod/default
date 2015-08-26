<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<meta http-equiv="Expires" content="-1">
<meta http-equiv="Cache-Control" content="no-cache">
<meta http-equiv="Pragma" content="no-cache">
<title>修改常用旅客 - {$webname}</title>
    {php echo Common::getCss('bootstrap.min.css,sticky-footer.css,css.css'); }
    {php echo Common::getScript('jquery-1.10.1.min.js,bootstrap.min.js,yxMobileSlider.js'); }
</head>

<body>
<div class="container">
    <header class="bg-green p15">
        <ul class="m0 p0 w100">
            <li class="pull-left li1"><div class="baseicon return-left"></div></li>
            <li class="pull-left li2 o-hidden font18 text-center white text-ellipsis white-nowrap">
                {if $tourer}
                    修改常用旅客
                {else}
                    新增常用旅客
                {/if}
            </li>
            <li class="pull-right li3"><a href="{$cmsurl}user/index" class="baseicon block pull-right member"></a><a href="{$cmsurl}index" class="baseicon block pull-right date"></a></li>
        </ul>
    </header>
    
    <div class="main"> 
        <div class="modify-common-passenger p15">
            <div class="confirmation-order"> 
                <div class="canshu contact bg-white">
                    <table class="table table-striped grey m0">
                        <input type="hidden" id="id" name="id" value="{if $tourer['id']} {$tourer['id']} {/if}">
                        <input type="hidden" id="mid" name="mid" value="{if $tourer['mid']} {$tourer['mid']} {else} {$mid} {/if}">
                        <tr>
                            <td align="right"  width="70%">
                                <input type="text" name="name" class="form-control" id="name" placeholder="姓名" value="{if $tourer['name']}{$tourer['name']}{/if}">
                            </td>
                        </tr>
                        <tr>
                            <td align="right"  width="70%">
                                <input type="tel" name="mobile" class="form-control" id="mobile" placeholder="手机号码" value="{if $tourer['mobile']}{$tourer['mobile']}{/if}">
                            </td>
                        </tr>   
                        <tr>
                            <td align="right"  width="70%">
                                <input type="text" name="email" class="form-control" id="email" placeholder="邮箱" value="{if $tourer['email']}{$tourer['email']}{/if}">
                            </td>
                        </tr>
                        <tr>
                            <td align="right"  width="70%">
                                <input type="text" name="ppno" class="form-control" id="ppno" placeholder="护照号码" value="{if $tourer['ppno']}{$tourer['ppno']}{/if}">
                            </td>
                        </tr>
                        <tr>    
                            <td align="right"  width="70%">
                                <input type="text" name="idno" class="form-control" id="idno" placeholder="身份证号码" value="{if $tourer['idno']}{$tourer['idno']}{/if}">
                            </td>
                        </tr>
                     </table>
               </div>
            </div> 
              
            <div class="mt10">
                  <input class="login_in btn w100 p10 font16 white mt10" id="confirm" name="" type="button" value="确定">
                  <div class="error-message affix modal" id="myModal">
                      <div class="affix font12 p10 white text-center" id="error">新增用户成功</div>
                  </div> 
            </div>
        </div>
    </div>
    
</div>
    
<div class="footer grey font12 text-center">武汉市光游网络有限公司<p>鄂ICP备14009743号 © 积沙旅行  2015</p></div>

<script>
    $("#confirm").click(function(){
        var id = $("#id").val();
        var mid = $("#mid").val();
        var name = $("#name").val();
        var mobile = $("#mobile").val();
        var email = $("#email").val();
        var idno = $("#idno").val();
        var ppno = $("#ppno").val();
        var telpattern = /^13[0-9]{1}[0-9]{8}$|15[0-9]{1}[0-9]{8}$|17[0-9]{1}[0-9]{8}$|18[0-9]{1}[0-9]{8}$/;//手机
        var emailpattern = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/; //email
        var idpattern = /^((1[1-5])|(2[1-3])|(3[1-7])|(4[1-6])|(5[0-4])|(6[1-5])|71|(8[12])|91)\d{4}((19\d{2}(0[13-9]|1[012])(0[1-9]|[12]\d|30))|(19\d{2}(0[13578]|1[02])31)|(19\d{2}02(0[1-9]|1\d|2[0-8]))|(19([13579][26]|[2468][048]|0[48])0229))\d{3}(\d|X|x)?$/;
        var pppattern = /^1[45][0-9]{7}|G[0-9]{8}|P[0-9]{7}|S[0-9]{7,8}|D[0-9]+$/;
        if(name.length<1)
        {
            perror("请输入正确的用户名");
            return false;
        }
        if(!telpattern.test(mobile)){
            perror('请输入正确的手机号码');
            return false;
        }
        if(!emailpattern.test(email)) {
            perror('请输入正确的邮箱');
            return false;
        }
        if(!pppattern.test(ppno)) {
            perror('请输入正确的护照号');
            return false;
        }
        if(!idpattern.test(idno)) {
            perror('请输入正确的身份证号');
            return false;
        }
        $.ajax({
            type:"post",
            url:"{$cmsurl}user/savetourer",
            data:{"id":id,"mid":mid,"name":name,"mobile":mobile,"email":email,"idno":idno,"ppno":ppno},
            dataType:'json',
            success:function(data){
                perror(data.msg);
                if(data.status)
                {
                    setTimeout("location.href='{$cmsurl}user/commontourers';",700);
                }
            }
        }).done(function(){
            return true;
        });
    });

    function perror(msg) {
        $("#error").html(msg);
        $('#myModal').modal('show');
    }
</script>

</body>
</html>
