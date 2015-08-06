(function(){
	
//顶端adver渐隐
function FadeAdver(args){
	for(var i in args){
			this[i] = args[i];	
		}	
		this.speed = args.speed ? args.speed : 5000;	//间隔时间默认5秒
		this.sTime = args.sTime ? args.sTime : 500;	//渐进时间，默认1秒
		this.load();
		this.start();
}

FadeAdver.prototype ={
	constructor : this,
	load : function(){
		var _this = this;
		this.num = 0;	//计时器
		this.mNum = this.num+1;	//轮播计时
		this.len = this.divs.length;					
		
		//所有div设置absolute并排好index
		this.divs.each(function(num){
			var z_index = 50-num;
			$(this).css({
				"position" : "absolute",
				"left" : 0,
				"top" : 0,
				"z-index" : z_index,
				"display" : "none"	
			})
		});
		
		$(this.divs[0]).show();
		
		//所有div设置absolute并排好index
		
			
		this.btns.each(function(num){			
			
			$(this).click(function(){
				_this.show(num);	
				_this.stop();			
			});
			
			$(this).mouseout(function(){
				_this.start();	
			});
		});
		
		//左右按钮的使用
		if(!!this.preBtn && !!this.nextBtn){
			this.preBtn.css("z-index",51);
			this.preBtn.click(function(){
				var num = _this.num - 1;
				if(num < 0){
					num = _this.len-1;		
				}	
				_this.show(num);
			});	
			this.nextBtn.css("z-index",51);
			this.nextBtn.click(function(){
				var num = _this.num + 1;
				if(num >= _this.len){
					num = 0;		
				}	
				_this.show(num);
			});	
		}
		
		this.divs.each(function(num){
			$(this).mouseover(function(){					
				_this.stop();				
			}).mouseout(function(){
				_this.start();	
			});	
		});
	},
	show : function(num){
		if(num == this.num) return;	//同一个返回
		
		
		var _this = this;
		this.flag  = false;	//关闭控制开关
		this.btns.each(function(i){
			if(i == num){
				$(this).addClass("hover");	
			}else{
				$(this).removeClass("hover");	
			}				
		});
				
		$(this.divs[this.num]).fadeOut(this.sTime);	//旧的淡出
						
		$(this.divs[num]).fadeIn(_this.sTime);		//新的淡入
		_this.num = num;	
		_this.mNum = num+1;			
				
	},
	start : function(){
		var _this = this;					
		this.interval = setInterval(function(){					
			if(_this.mNum >= _this.len){
				_this.mNum = 0;
			}						
			_this.show(_this.mNum);								
		},this.speed);
	},
	stop : function(){
		clearInterval(this.interval);
	}	
};

window.FadeAdver = FadeAdver;
//顶端adver	

//ChangeDiv切换效果
function ChangeDiv(args){
	for(var i in args){
		this[i] = args[i];	
	}	
	this.type = this.type ? this.type : "mouseover";
	this.load();
}

ChangeDiv.prototype = {
	constructor : this,
	load : function(){
		var _this = this;
		this.btns.each(function(num){
			if(_this.type == "click"){
				$(this).click(function(){
					_this.change(num)	
				});		
			}else{
				$(this).mouseover(function(){
					_this.change(num)	
				});		
			}			
		});	
	},
	change : function(num){
		var _this = this;
		
		this.btns.each(function(n){
			if(n ==num){
				$(this).addClass("hover");		
			}else{
				$(this).removeClass("hover");		
			}				
		});
		
		this.divs.each(function(n){
			if(n ==num){
				$(this).addClass("show");		
			}else{
				$(this).removeClass("show");		
			}				
		});
	}	
};

window.ChangeDiv = ChangeDiv;
//ChangeDiv切换效果

//清除所有input的value
	function ClearValue(forms){
		this.forms = forms;
		this.load();	
	}
	
	ClearValue.prototype = {
		constructor : this,
		load : function(){
			var _this = this;			
			this.forms.each(function(){
				_this.clearValue($(this));	
			});
		},
		clearValue : function(fm){			
			this.inputs = $("input.text,input.keyword",fm);
			this.textarea = $("textarea",fm);
			var _this = this;
			var dValues = [];	
			var aValues = [];		
			this.inputs.each(function(n){
				dValues[n] = $(_this.inputs[n]).val();
			});
			this.textarea.each(function(n){
				aValues[n] = $(_this.textarea[n]).html();
			});
						
			this.inputs.each(function(n){
				$(this).focus(function(){
					if($(this).val() == dValues[n]){
						$(this).val("");	
						$(this).removeClass("text_hover");
					}
				});	
				$(this).blur(function(){
					if($(this).val() == ""){
						$(this).val(dValues[n]);	
						$(this).removeClass("text_hover");
					}else{
						$(this).addClass("text_hover");	
					}
				});
			});	
			this.textarea.each(function(n){
				$(this).focus(function(){
					if($(this).html() == aValues[n]){
						$(this).html("");	
						$(this).removeClass("text_hover");
					}
				});	
				$(this).blur(function(){
					if($(this).html() == ""){
						$(this).html(aValues[n]);	
						$(this).removeClass("text_hover");
					}else{
						$(this).addClass("text_hover");		
					}
				});	
			});
		}	
	};
	
	window.ClearValue = ClearValue;
	//清除所有input的value
	
	//AlertWin 弹窗
function AlertWin(obj){
	var   dH = $(document.body).height();	
	if($(".flog").length != 0){
		
		$(".flog").css({
			"height" : dH	
		}).show();		
		
	}	
	
	var pL = ($(window).width() - obj.width())/2 + $(window).scrollLeft(),
		 pT = ($(window).height()- obj.height())/2+$(window).scrollTop();	
		 
	obj.css({
	 	left : pL,
	 	top : pT	
	 }).show();	
	 
	 $(".close",obj).click(function(){
	 	$(".flog").hide();
	 	obj.hide();		
	 });
	 	
}
window.AlertWin = AlertWin;

//select 替换类
function SameSelect(obj){
	this.obj = obj;
	this.opts = $("option",obj);
	this.top = $(".top",obj);
	this.btn = $(".btn",obj);
	this.lis = $("li",obj);		
	this.load();	
}

SameSelect.prototype = {
	constructor : this,
	load : function(){
		var _this = this;
		
		this.btn.click(function(){
			if(_this.obj.hasClass("select_hover")){
				_this.hide();	
			}else{
				_this.show();		
			}			
		});
		this.top.click(function(){
			if(_this.obj.hasClass("select_hover")){
				_this.hide();	
			}else{
				_this.show();		
			}			
		});
		this.lis.mouseover(function(){
			_this.lis.removeClass("hover");
			$(this).addClass("hover");
		});
		this.lis.each(function(num){
			$(this).click(function(){
				_this.set(num);	
			});	
		});
		this.obj.mouseout(function(){
			_this.wait = setTimeout(function(){
					_this.hide();	
			},200);			
		});
		$("*",this.obj).mouseover(function(){
			if(!!_this.wait){
				clearTimeout(_this.wait);		
			}			
		});		
	},
	show : function(){
		var _this = this;
		//和top相同的li隐藏一下
		this.lis.show();		
		this.lis.each(function(){
			if($(this).html() == _this.top.html()){
				$(this).hide();	
			}	
		});
		
		this.obj.addClass("select_hover");	
	},
	hide : function(){
		this.obj.removeClass("select_hover");	
	},
	set : function(num){
		var _this = this;
		this.hide();
		this.top.html($(this.lis[num]).html());	
		this.opts.removeAttr("selected");
		$(this.opts[num]).attr("selected","selected");
	}
};

window.SameSelect = SameSelect;
//select 替换类

})();

$(function(){
	
	//radio的美化
	if($(".radio").length != 0){
		$(".radio").each(function(){
			var _this = this;
			$(".ra",_this).click(function(){						
				$(".ra",_this).removeClass("ra_hover");	
				$(this).addClass("ra_hover");
				$(".rak",_this).removeAttr("checked");
				$(".rak",this).attr("checked","checked");
			});	
		});	
	}
	
	//checkbox的美化
	if($(".chks").length != 0){
		$(".chks").each(function(){
			var _this = this;
			$(".ch",_this).click(function(){						
				if(!$(this).hasClass("ch_hover")){
					$(this).addClass("ch_hover");
					$(".chk",this).attr("checked","checked");	
				}else{
					$(this).removeClass("ch_hover");
					$(this).removeClass("nck");
					$(".chk",this).removeAttr("checked");		
				}
			});	
		});	
	}
	
	new ClearValue($("form"));	//清除默认文字


        $(".login_menu").live({
           mouseenter:
           function()
           {
              $(this).addClass("menu_hover");	
           },
           mouseleave:
           function()
           {
              $(this).removeClass("menu_hover");
           }
        });

	
	//base_tab 表格的js
	if($(".base_tab").length != 0){
		
		$(".base_tab td").each(function(){
			var _this = this;
			$(".tval",_this).width($(".txt",_this).width()+32);	
		});	
		
		//点击编辑按钮
		$(".base_tab .edit_a").click(function(){
			var _parTr = $(this).parent().parent();
			$("td",_parTr).each(function(){
				$(".tval",this).val($(".txt",this).html());	
			});	
			$(".txt",_parTr).hide();
			$(".tval",_parTr).show();
			$(".edit_a",_parTr).hide();
			$(".save_a",_parTr).show();
			$(".esc_a",_parTr).show();
		});
		
		//点击保存按钮
		$(".base_tab .save_a").click(function(){
			var _parTr = $(this).parent().parent();
			$("td",_parTr).each(function(){
				$(".txt",this).html($(".tval",this).val());	
			});	
			$(".txt",_parTr).show();
			$(".tval",_parTr).hide();
			$(".edit_a",_parTr).show();
			$(".save_a",_parTr).hide();
			$(".esc_a",_parTr).hide();	
		});
		
		//点击取消按钮
		$(".base_tab .esc_a").click(function(){
			var _parTr = $(this).parent().parent();
			$("td",_parTr).each(function(){
				$(".tval",this).val($(".txt",this).html());	
			});	
			$(".txt",_parTr).show();
			$(".tval",_parTr).hide();
			$(".edit_a",_parTr).show();
			$(".save_a",_parTr).hide();
			$(".esc_a",_parTr).hide();	
		});
		
	}
	
});	




