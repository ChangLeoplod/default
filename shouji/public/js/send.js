    
    function CodeTimeout(v){
        if(v>0)
        {
            togPhoneBtn(false);
            $('#MobileInvCode').html('重发验证码('+(--v)+')');
            setTimeout(function(){CodeTimeout(v)},1000);
        }
        else
        {
            togPhoneBtn(true);
            $('#MobileInvCode')[0].disabled=false;
            $('#MobileInvCode').html('重发验证码');
        }
    }
    
function togPhoneBtn(status)
    {
        var btnEle=$("#MobileInvCode");
        if(!status) {
            btnEle.attr('disabled', true);
            btnEle.removeClass('bg-green');
            btnEle.css('background','#D3D3D3');
        }
        else
        {
            btnEle.removeAttr('disabled');
            btnEle.addClass('bg-green');
        }

    }