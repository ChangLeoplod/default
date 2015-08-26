(function(){

})();

$(function(){

	//hm_banner 轮播图
	new FadeAdver({
		btns : $(".hm_banner .btns span"),
		divs : $(".hm_banner .pics li"),
		preBtn : $(".hm_banner .pre"),
		nextBtn : $(".hm_banner .next"),
		speed : 5000	
	});

  
   $('#login').click(function(){
    var uname = $("#loginname").val();
    var pwd = $("#password").val();
    if (uname.length<1) {
        $("#loginname").focus();
        $(".login_info").show();
        $('.login_info').html('请输入用户名');
        return false;
    }
    if (pwd.length<1) {
        $("#password").focus();
        $(".login_info").show();
        $('.login_info').html('请输入密码');
        return false;
    }
    $("#login").attr('disabled', true);
    $("#login").val('正在登录...');
    $.ajax({
             type:"post",
             async: false,
             url:"/member/login.php?dopost=dologin&loginname="+uname+"&password="+pwd,
    dataType:'json',
             success: function(data){
                  if(data.status == '1'){
                      
                      $(".pop_win").hide();
                        hideMask();
                    $.ajax({
                        type: "POST",
                        url: "/ajax/ajax_login.php",
                        data: "dopost=LoginStatus",
                        success: function(data){
                                $('#userLogin').html(data);
                        }
                   });
                 }
                 else{
                     $(".login_info").show();
                    $(".login_info").html('用户名或者密码错误');
                    $("#login").removeAttr('disabled');
                    $("#login").val('登 录');
                 }  
             }
    });
    });
    
    $('#reg').click(function(){
        var mobile = $("#p_mobile").val();
        var p_msgcode = $('#p_msgcode').val();
        var p_password = $('#p_password').val();
        var p_repassword = $('#p_repassword').val();
        var regPartton=/1[3-8]+\d{9}/;
        if (!regPartton.test(mobile))
        {
            perror('请输入正确的手机号码');
            return false;
        }
        if(p_msgcode.length<5) {
            perror('请输入验证码');
            return false;
        }
        if (p_password!=p_repassword) {
            perror('二次密码不一样');
            return false;
        }
        if(p_password.length<6||p_repassword<6) {
            perror('密码不能少于6位');
            return false;
        }
        $("#reg").attr('disabled', true);
        $("#reg").val('正在注册...');
        
        $.ajax({
             type:"post",
             async: false,
             url:"/member/reg.php?dopost=doreg",
             data:{"mobile":mobile,"msgcode":p_msgcode,"password":p_password,"repassword":p_repassword},
            dataType:'json',
             success: function(data){
                  if(data.status == '1'){
                    perror(data.res);
                    $("#reg").removeAttr('disabled');
                    $("#reg").val('注 册');
                    return ;
                 }
                 else{
                $('.reg_area').html('<dl class="reg_success"><dt>注册成功!!!</dt><dd>页面跳转中…<span class="reg_seconds">3</span></dd></dl><script type="text/javascript">var regSe=5;setInterval(function(){if(regSe <= 2){location.href="/";	}regSe--;$(".reg_seconds").html(regSe);},1000);</script>');
                    
               
                 }  
             }
    });
        
        
        
    });


        


});	
function showMask(){
    var top = ($(window).height() - $('.pop_win').height())/2;   
    var left = ($(window).width() - $('.pop_win').width())/2;   
    var scrollTop = $(document).scrollTop();   
    var scrollLeft = $(document).scrollLeft();   
    $('.pop_win').css( { position : 'absolute', 'top' : top + scrollTop, left : left + scrollLeft } );  
    $('body').append('<div id="mask"></div>');
    $("#mask").css("height",$(document).height());     
    $("#mask").css("width",$(document).width());     
    $("#mask").show();     
}  
function hideMask(){     
    $("#mask").hide();     
}  
 function checkPhoneSend()
    {
        var mobile = $("#p_mobile").val();
        var regPartton=/1[3-8]+\d{9}/;
        if (!regPartton.test(mobile))
        {
            perror('请输入正确的手机号码');
            return false;
        }
        var t=$("#MobileInvCode")[0];
     //   var url = "reg.php?dopost=sendmsgcode&mobile="+mobile+"&k="+"{sline:field.stoken/}";
        var sendnum = $.cookie('sendnum') ? $.cookie('sendnum') : 0;

        if(sendnum>3){
            perror("验证码发送请求过于频繁,请过15分钟后再试");
            return false;
        }
        return true;
    }

function perror(msg) {
    $('.reg_error').show();  
    $('.reg_error').html(msg);
}   
    
function checkMobile() {
     var mobile = $("#p_mobile").val();
    var url = "/member/reg.php?dopost=checkmobile&mobile="+mobile;
            $.post(url,true,function(data) {
                if(data.status==1)
                {
                    alert("手机号已经注册");
                    return false;
                }
                
            },'json');
}
    
    function CodeTimeout(v){
        if(v>0)
        {
            togPhoneBtn(false);
            $('#MobileInvCode').val('重发验证码('+(--v)+')');
            setTimeout(function(){CodeTimeout(v)},1000);
        }
        else
        {
            togPhoneBtn(true);
            $('#MobileInvCode')[0].disabled=false;
            $('#MobileInvCode').val('重发验证码');
        }
    }
    
    function togPhoneBtn(status)
    {
        var btnEle=$("#MobileInvCode");
        if(!status) {
            btnEle.attr('disabled', true);
            btnEle.css('background','#D3D3D3');
        }
        else
        {
            btnEle.removeAttr('disabled');
            btnEle.css('background','#fc7301');
        }

    }
    

    
    /*!
 * jQuery Cookie Plugin v1.4.1
 * https://github.com/carhartl/jquery-cookie
 *
 * Copyright 2006, 2014 Klaus Hartl
 * Released under the MIT license
 */
(function (factory) {
	if (typeof define === 'function' && define.amd) {
		// AMD
		define(['jquery'], factory);
	} else if (typeof exports === 'object') {
		// CommonJS
		factory(require('jquery'));
	} else {
		// Browser globals
		factory(jQuery);
	}
}(function ($) {

	var pluses = /\+/g;

	function encode(s) {
		return config.raw ? s : encodeURIComponent(s);
	}

	function decode(s) {
		return config.raw ? s : decodeURIComponent(s);
	}

	function stringifyCookieValue(value) {
		return encode(config.json ? JSON.stringify(value) : String(value));
	}

	function parseCookieValue(s) {
		if (s.indexOf('"') === 0) {
			// This is a quoted cookie as according to RFC2068, unescape...
			s = s.slice(1, -1).replace(/\\"/g, '"').replace(/\\\\/g, '\\');
		}

		try {
			// Replace server-side written pluses with spaces.
			// If we can't decode the cookie, ignore it, it's unusable.
			// If we can't parse the cookie, ignore it, it's unusable.
			s = decodeURIComponent(s.replace(pluses, ' '));
			return config.json ? JSON.parse(s) : s;
		} catch(e) {}
	}

	function read(s, converter) {
		var value = config.raw ? s : parseCookieValue(s);
		return $.isFunction(converter) ? converter(value) : value;
	}

	var config = $.cookie = function (key, value, options) {

		// Write

		if (arguments.length > 1 && !$.isFunction(value)) {
			options = $.extend({}, config.defaults, options);

			if (typeof options.expires === 'number') {
				var days = options.expires, t = options.expires = new Date();
				t.setTime(+t + days * 864e+5);
			}

			return (document.cookie = [
				encode(key), '=', stringifyCookieValue(value),
				options.expires ? '; expires=' + options.expires.toUTCString() : '', // use expires attribute, max-age is not supported by IE
				options.path    ? '; path=' + options.path : '',
				options.domain  ? '; domain=' + options.domain : '',
				options.secure  ? '; secure' : ''
			].join(''));
		}

		// Read

		var result = key ? undefined : {};

		// To prevent the for loop in the first place assign an empty array
		// in case there are no cookies at all. Also prevents odd result when
		// calling $.cookie().
		var cookies = document.cookie ? document.cookie.split('; ') : [];

		for (var i = 0, l = cookies.length; i < l; i++) {
			var parts = cookies[i].split('=');
			var name = decode(parts.shift());
			var cookie = parts.join('=');

			if (key && key === name) {
				// If second argument (value) is a function it's a converter...
				result = read(cookie, value);
				break;
			}

			// Prevent storing a cookie that we couldn't decode.
			if (!key && (cookie = read(cookie)) !== undefined) {
				result[name] = cookie;
			}
		}

		return result;
	};

	config.defaults = {};

	$.removeCookie = function (key, options) {
		if ($.cookie(key) === undefined) {
			return false;
		}

		// Must not alter options, thus extending a fresh object...
		$.cookie(key, '', $.extend({}, options, { expires: -1 }));
		return !$.cookie(key);
	};

}));
