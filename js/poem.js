/**
 * 公用JS函数库
 */

function ajaxPost(data, url, callBack){
	$.ajax({
		url: url,
		data: data,
		async: true,
		type: "POST",
		datatype: "json",
		success:function(result){
			callBack(result);
		},
		error: function(){
			//错误提示
		}
	});
}
