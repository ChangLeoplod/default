<tr>
                                            <td height="50" align="right"><span class="title">短信验证码：</span></td>
                                            <td height="50" align="left" style="position: relative"><input type="text" name="msgcode" id="p_msgcode" class="text" style="width: 110px" /><button class="send_msg" id="MobileInvCode">发送验证码</button>
                                                <div id="msg_check_main" class="msg_check_main" style="display: none;">
                                                    <table class="msg_check_tb">
                                                        <tr><td>输入验证码：</td><td><input type="text" class="msg_first_code" name="phone_checkcode"/></td></tr>
                                                        <tr><td></td><td class="code_td"><img src="{sline:global.cfg_cmsurl/}/include/vdimgck.php?word_type=3"/><a href="javascript:;" onclick="$(this).siblings('img').attr('src','/include/vdimgck.php?word_type=3&rand='+Math.random())" class="msg_change">看不清，换一张？</a></td></tr>
                                                        <tr><td colspan="2" class="ope_td"><a href="javascript:;" class="first_send_btn first_btn">发送</a><a href="javascript:;" class="first_cancel_btn first_btn">取消</a></td></tr>
                                                    </table>
                                                </div></td>
                                            <td height="50" align="left" class="hint"></td>
                                        </tr>