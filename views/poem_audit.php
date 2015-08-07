<div id="content">
    <div id="ct-left" class="left" style="display:none;">
        <h3 class="">
            <strong>诗词鉴赏</strong>
            <a href="">换一换</a>
        </h3>
        <div class="change">
        </div>           
        <div class="more">
            <a href="JavaScript:void(0);">&nbsp;</a>
        </div>
    </div>
    <div id="ct-center" class="center" style="width:760px;">
        <h3 class=""><strong>审核诗词</strong></h3>
        <ul class="edit-poem clear">
            <li class="clear">
                <label class="">标题：</label>
                <input type="text" id="poem_title" value="<?=$poem_info->poetry_title?>" />
            </li>
            <li class="clear">
                <label class="">作者：</label>
                <input type="text" id="poem_author" value="<?=$poem_info->author_name?>" />
            </li>
            <li class="clear">
                <label class="">内容：</label>
                <input rows="10" cols="60" style="visibility: hidden;">
            </li>
            <li class="clear">
                <label class="" style="visibility: hidden;">内容：</label>
                <textarea rows="10" cols="60" id="poem_content"><?=$poem_info->poetry_content?></textarea>
            </li>
            <?php if($poem_info->poetry_status == Poetry_Model::STATUS_TMP_AUDIT):?>
            <li class="clear" style="margin:20px 0;text-align: center;">
                <input type="button" class="button" id="pass" value="通过">
                <input type="button" class="button" id="reject" value="驳回">
            </li>
            <?php endif;?>
        </ul>
    </div>
    <div id="ct-right" class="right">
        <div class="hot-poetry">
            <h3 class=""><strong>热门诗词</strong><a href="">更多</a></h3>
            <ul>
                <li>
                    <a href="http://www.woshipm.com/operate/148638.html" target="_blank" title="一篇文全面解析互联网产品运营">
                        一篇文全面解析互联网产品运营
                    </a>
                </li>
                <li>
                    <a href="http://www.woshipm.com/operate/148638.html" target="_blank" title="一篇文全面解析互联网产品运营">
                        一篇文全面解析互联网产品运营
                    </a>
                </li>
                <li>
                    <a href="http://www.woshipm.com/operate/148638.html" target="_blank" title="一篇文全面解析互联网产品运营">
                        一篇文全面解析互联网产品运营
                    </a>
                </li>
                <li>
                    <a href="http://www.woshipm.com/operate/148638.html" target="_blank" title="一篇文全面解析互联网产品运营">
                        一篇文全面解析互联网产品运营
                    </a>
                </li>
                <li>
                    <a href="http://www.woshipm.com/operate/148638.html" target="_blank" title="一篇文全面解析互联网产品运营">
                        一篇文全面解析互联网产品运营
                    </a>
                </li>
            </ul>
            <div class="more">
                <a href="JavaScript:void(0);">&nbsp;</a>
            </div>
        </div>
        <div class="hot-author">
            <h3 class=""><strong>著名作者</strong><a href="">更多</a></h3>
            <ul>
                <li>
                    <a href="http://www.woshipm.com/operate/148638.html" target="_blank" title="一篇文全面解析互联网产品运营">
                        一篇文全面解析互联网产品运营
                    </a>
                </li>
                <li>
                    <a href="http://www.woshipm.com/operate/148638.html" target="_blank" title="一篇文全面解析互联网产品运营">
                        一篇文全面解析互联网产品运营
                    </a>
                </li>
                <li>
                    <a href="http://www.woshipm.com/operate/148638.html" target="_blank" title="一篇文全面解析互联网产品运营">
                        一篇文全面解析互联网产品运营
                    </a>
                </li>
                <li>
                    <a href="http://www.woshipm.com/operate/148638.html" target="_blank" title="一篇文全面解析互联网产品运营">
                        一篇文全面解析互联网产品运营
                    </a>
                </li>
                <li>
                    <a href="http://www.woshipm.com/operate/148638.html" target="_blank" title="一篇文全面解析互联网产品运营">
                        一篇文全面解析互联网产品运营
                    </a>
                </li>
            </ul>
            <div class="more">
                <a href="JavaScript:void(0);">&nbsp;</a>
            </div>
        </div>
    </div>
</div>
<div class="pop_warn ie6fixed" id="pop_warn" style="margin-left: -150px; margin-top: -120px;display:none;">
    <div class="bg">
        <div class="content">
            <div class="title"><span>提示信息</span>
                <a href="javascript:void(0);" class="close" title="关闭" node-type="close">X</a>
            </div>
            <div class="layer_prompt" style="height: 130px;line-height: 130px;text-align: center;">
                <label>11111</label>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $('#pass, #reject').bind('click', function(){
        var paramData = {};
        paramData.status = $(this).attr('id');
        paramData.poetry_id = <?=$poem_info->poetry_id?>;
        if(checkSubmitData(paramData) === false){return false;}

        var callData = {};
        callData.obj = $('#pass, #reject');

        callData.obj.attr("disabled", true);
        callData.obj.css('cursor', 'not-allowed');

        var url = '<?php echo $header_data['site_host']?>aj/audit';
        ajaxPost(paramData, url, afterSubmit, callData);
    });
});

function afterSubmit(result, callParam){
    if(result.code == 100000){
        $('#pass, #reject').remove();
        popWarn($('#pop_warn'), '操作成功');
    }else{
        popWarn($('#pop_warn'), '操作失败');
    }
}

function checkSubmitData(data){
    if(!(data.status == 'pass' || data.status == 'reject') || data.poetry_id < 1){
        popWarn($('#pop_warn'), '提交数据不可为空');
        return false;
    }
}
</script>