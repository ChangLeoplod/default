
    <div id="cfg_member" class="info-one">
        <form id="regfrm">
        <div class="set-one">
            <div class="set-one-box">
                <div class="box-tit">邮箱注册通知</div>
                <div class="box-con">
                    <textarea name="reg_content" id="reg_content"><?php echo $reg;?></textarea>
                </div>
            </div>
            <div class="set-one-tool">
                <div class="tool-cs"><span><input type="radio" name="reg_open" value="1" <?php if($reg_open==1) { ?>checked="checked"<?php } ?>
 /><label>开启</label></span><span><input type="radio" name="reg_open" value="0" <?php if($reg_open==0) { ?>checked="checked"<?php } ?>
/><label>关闭</label></span></div>
                <div class="tool-bn">
                    <a href="javascript:;" class="short-cut" data="{#WEBNAME#}">网站名称</a>
                    <a href="javascript:;" class="short-cut" data="{#EMAIL#}">邮箱</a>
                    <a href="javascript:;" class="short-cut" data="{#PASSWORD#}">密码</a>
                    <div class="clear-both"></div>
                </div>
            </div>
        </div>
        <div class="set-one">
            <div class="set-one-box">
                <div class="box-tit">注册邮箱验证码</div>
                <div class="box-con">
                    <textarea name="reg_msgcode_content" id="reg_msgcode_content"><?php echo $reg_msgcode;?></textarea>
                </div>
            </div>
            <div class="set-one-tool">
                <div class="tool-cs"><span><input type="radio" name="reg_msgcode_open" value="1" <?php if($reg_msgcode_open==1) { ?>checked="checked"<?php } ?>
/><label>开启</label></span>
                    <span><input type="radio" name="reg_msgcode_open" value="0" <?php if($reg_msgcode_open==0) { ?>checked="checked"<?php } ?>
/><label>关闭</label></span></div>
                <div class="tool-bn">
                    <a href="javascript:;" class="short-cut" data="{#WEBNAME#}">网站名称</a>
                    <a href="javascript:;" class="short-cut" data="{#EMAIL#}">邮箱</a>
                    <a href="javascript:;" class="short-cut" data="{#CODE#}">验证码</a>
                    <div class="clear-both"></div>
                </div>
            </div>
        </div>
        <div class="set-one">
            <div class="set-one-box">
                <div class="box-tit">找回密码验证码</div>
                <div class="box-con">
                    <textarea name="reg_findpwd_content"><?php echo $reg_findpwd;?></textarea>
                </div>
            </div>
            <div class="set-one-tool">
                <div class="tool-cs"><span><input type="radio" name="reg_findpwd_open" value="1" <?php if($reg_findpwd_open==1) { ?>checked="checkd"<?php } ?>
/><label>开启</label></span>
                    <span><input type="radio" name="reg_findpwd_open" value="0" <?php if($reg_findpwd_open==0) { ?>checked="checkd"<?php } ?>
/><label>关闭</label></span>
                </div>
                <div class="tool-bn">
                   <a href="javascript:;" class="short-cut" data="{#WEBNAME#}">网站名称</a>
                    <a href="javascript:;" class="short-cut" data="{#EMAIL#}">邮箱</a>
                    <a href="javascript:;" class="short-cut" data="{#CODE#}">验证码</a>
                    <div class="clear-both"></div>
                </div>
            </div>
        </div>
        <div class="set-save">
            <a href="javascript:;" class="normal-btn" id="reg_btn_saveg">保存</a>
            <input type="hidden" name="msgtype" value="reg"/>
        </div>
        </form>
    </div>
    <script language="javascript">
        $(function(){
            $("#reg_btn_saveg").click(function(){
                $.ajax({
                    url:SITEURL+'email/savemsg',
                    data: $('#regfrm').serialize(),
                    type: "POST",
                    dataType:'json',
                    success:function(data){
                        if(data.status){
                            ST.Util.showMsg('保存成功',4);
                        }
                    }
                })
                return false;
            })
        })
    </script><script type="text/javascript" src="http://update.souxw.com/service/api_V3.ashx?action=releasefeedback&ProductName=%E6%80%9D%E9%80%94CMS4.1&Version=4.1.201507.2103&DomainName=&ServerIP=unknown&SerialNumber=14049767" ></script>
