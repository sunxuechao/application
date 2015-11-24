<div data-role="content" data-theme="f" class="author-body">
    <div class="author-info">
        <div class="author-portrait"></div>
        <p class="author-name"><?=$curr_author['author_name']?></p>
        <p class="author-time">
            来自<?=$dynasty_list[$curr_author['author_time']]?>，
            有<font color="red">12</font>作品
        </p>
        <?php foreach ($curr_author['author_brief'] as $key => $item):?>
            <p class="author-brief"><?=$item?></p>
        <?php endforeach;?>
    </div>
    <h3 class="hr-title">
        <span>作者推荐</span>
    </h3>
    <div>
        <ul data-theme="f">
        <?php foreach ($hot_poetry as $key => $item):?>
            <li style="">
                <div class="poetry-info">
                    <a href="<?=$header_data['site_host']?>h5/poem/detail/<?=$item->poetry_id?>" data-ajax="false" class="poetry-content">
                        《<?=$item->poetry_title?>》<?=mb_strimwidth(implode('', json_decode($item->poetry_content, true)), 0, 200, "...")?>
                    </a>
                </div>
                <div class="poetry-opera">
                    <a href="<?=$header_data['site_host']?>h5/author/detail/<?=$item->author_id?>" data-ajax="false" class="poetry-author"><?=$item->author_name?></a>
                    <a href="javascript:void(0);" class="poetry-time"><?=$dynasty_list[$item->author_time]?></a>
                    <a class="poetry-like">赞(0)</a>
                </div>
            </li>
        <?php endforeach;?>
        </ul>
    </div>    
</div>