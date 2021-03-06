<div id="right-data">
    <div id="data-position">
        <a href="/?spm=5176.788314842.2.1.Kvp10F" data-spm-anchor-id="5176.788314842.2.1">后台管理</a>
        <span style="color:#00a2ca;">></span>
        <span style="font-size: 12px;line-height: 1.5;">诗词审核</span>
    </div>
    <div id="data-info">
        <table style="width: 800px;" border="0" cellspacing="0">
            <tr>
                <th width="15%">标题</th>
                <th width="5%">作者</th>
                <th width="40%">内容</th>
                <th width="20%">收录时间</th>
                <th width="10%">状态</th>
                <th width="10%">操作</th>
            </tr>
            <?php foreach ($poem_list as $key => $item):?>
            <tr>
                <td class="tdl" title="<?=$item->poetry_title?>">
                    <?=mb_strimwidth($item->poetry_title, 0, 14, '…')?>
                </td>
                <td class="tdl"><?=$item->author_name?></td>
                <td class="tdl" title="<?=$item->poetry_content?>">
                    <?=mb_strimwidth($item->poetry_content, 0, 45, '…')?>
                </td>
                <td class="tdc"><?=date('Y-m-d H:i:s', $item->poetry_create)?></td>
                <td class="tdc"><?=$poem_status[$item->poetry_status]?></td>
                <td class="tdc">
                    <a href="<?php echo $header_data['site_host']?>admin/audit/detail/<?=$item->poetry_id?>" class="audit" data_type="pass">查看</a>
                </td>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
</div>