<div id="right-data">
    <div id="data-position">
        <a href="/?spm=5176.788314842.2.1.Kvp10F" data-spm-anchor-id="5176.788314842.2.1">后台管理</a>
        <span style="color:#00a2ca;">></span>
        <span style="font-size: 12px;line-height: 1.5;">诗词审核</span>
    </div>
    <div id="data-info">
        <div>
            <a href="<?php echo $header_data['site_host']?>admin/poetry/edit" class="btn btn-a" style="float: right;">添加诗词</a>
        </div>
        <table style="width: 800px;" border="0" cellspacing="0">
            <tr>
                <th width="15%">标题</th>
                <th width="10%">作者</th>
                <th width="40%">内容</th>
                <th width="20%">收录时间</th>
                <th width="15%">操作</th>
            </tr>
            <?php foreach ($poetry_list as $key => $item):?>
            <tr>
                <td class="tdl" title="<?=$item['poetry_title']?>">
                    <?=mb_strimwidth($item['poetry_title'], 0, 14, '…')?>
                </td>
                <td class="tdl"><?=$item['author_name']?></td>
                <td class="tdl" title="<?=$item['poetry_content']?>">
                    <?=mb_strimwidth(strip_tags($item['poetry_content']), 0, 45, '…')?>
                </td>
                <td class="tdc"><?=date('Y-m-d H:i:s', $item['poetry_create'])?></td>
                <td class="tdc">
                    <a href="<?php echo $header_data['site_host']?>admin/poetry/edit/<?=$item['poetry_id']?>" class="audit" data_type="pass">查看</a>
                    <a href="<?php echo $header_data['site_host']?>admin/poetry/del/<?=$item['poetry_id']?>" class="audit" data_type="pass">删除</a>
                </td>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
</div>