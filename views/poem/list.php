<div id="content">
    <div id="ct-center" class="center" style="width:760px;">
        <h3 class=""><strong>审核列表</strong></h3>
        <table class="table">
            <tr>
                <th>标题</th>
                <th>作者</th>
                <th>内容</th>
                <th>时间</th>
                <th style="width: 8em;">操作</th>
            </tr>
            <?php foreach ($data_list as $key => $item):?>
            <tr tmp_id="<?=$item->poetry_id?>" poetry_id="0">
                <td><?=$item->poetry_title?></td>
                <td><?=$item->author_name?></td>
                <td title="<?=$item->poetry_content?>"><?=mb_strimwidth($item->poetry_content, 1, 25, '…')?></td>
                <td><?=date('Y-m-d H:i:s', $item->poetry_create)?></td>
                <td>
                <?php if($item->poetry_status == 1) { ?>
                    <a href="javascript:void(0);" class="audit" data_type="pass">通过</a>
                    <a href="javascript:void(0);" class="audit" data_type="reject">驳回</a>
                <?php } else { ?>
                    <a href="javascript:void(0);" class="audited">通过</a>
                    <a href="javascript:void(0);" class="audited">驳回</a>
                <?php } ?>
                </td>
            </tr>
            <?php endforeach;?>
        </table>
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
    $('.audit').bind('click', function(){
        var paramData = {};
        paramData.status = $(this).attr('data_type');
        paramData.tmp_id = $(this).parent().parent().attr('tmp_id');
        paramData.poetry_id = $(this).parent().parent().attr('poetry_id');

        var callData = {};
        var url = '<?php echo $header_data['site_host']?>aj/audit';
        ajaxPost(paramData, url, afterSubmit, callData);
    });

    $('.audited').bind('click', function(){
        popWarn($('#pop_warn'), '数据已审核', 1000);
    });
});

function afterSubmit(result, callParam){
    popWarn($('#pop_warn'), result.msg, 1500);
}
</script>