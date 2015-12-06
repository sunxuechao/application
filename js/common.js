/**
 * 公用JS函数库
 */

function ajaxPost(data, url, callBack, callData){
	$.ajax({
		url: url,
		data: data,
		async: true,
		type: "POST",
		dataType: "json",
		success:function(result){
			callBack(result, callData);
		},
		error: function(){
			//错误提示
		}
	});
}

/**
 * 提示弹窗函数
 * Object obj 弹窗显示的DOM元素
 * String msg 要提示的信息
 * Intval outTime 弹窗小时的时间
 */
function popWarn(obj, msg, outTime){
	obj.show().find('#warn-msg').text(msg);;
	setTimeout(function(){
		obj.fadeOut("slow");
	}, outTime);
}
