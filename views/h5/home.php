<div data-role="content" data-theme="f">
    <ul data-theme="f">
        <?php foreach ($content_list as $key => $item):?>
        <li>
            <div class="poetry-info">
                <a href="<?=$header_data['site_host']?>h5/poem/detail/<?=$item['poetry_id']?>" data-ajax="false" class="poetry-content">
                    《<?=$item['poetry_title']?>》<?=mb_strimwidth(strip_tags($item['poetry_content']), 0, 200, "...")?>
                </a>
            </div>
            <div class="poetry-opera">
                <a href="<?=$header_data['site_host']?>h5/author/detail/<?=$item['author_id']?>" data-ajax="false" class="poetry-author"><?=$item['author_name']?></a>
                <a href="javascript:void(0);" class="poetry-time"><?=$dynasty_list[$item['author_time']]?></a>
                <a href="javascript:void(0);" class="poetry-like">赞(0)</a>
            </div>
        </li>
    <?php endforeach;?>
    </ul>
</div>