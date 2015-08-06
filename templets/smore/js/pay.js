(function(){

})();

$(function(){

	//item_num数量控制
	if($(".item_num").length != 0){
		
		$(".num_pre").click(function(){
			var numVal = $(".num_val").val()*1;
			if(numVal <=1){
				return;	
			}	
			numVal--;
			$(".num_val").val(numVal);
		});	
		
		$(".num_next").click(function(){
			var numVal = $(".num_val").val()*1;			
			numVal++;
			$(".num_val").val(numVal);
		});	
		
	}
	
	//pay_bank支付方式选择
	if($(".pay_bank").length != 0){
		
		$(".pay_bank").click(function(){
			$(".pay_bank").removeClass("bank_hover");
			$(this).addClass("bank_hover");
			$(".raw",this).attr("checked","checked");	
		});
		
		$(".pay_btn").click(function(evt){			
			evt.preventDefault();
			
			AlertWin($(".pay_win"));
				
		});
			
	}

});	