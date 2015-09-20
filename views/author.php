    <div id="ct-top">
        <div id="top-head">
            <div id="top-title"><?=$curr_author['author_name']?>诗词</div>
        </div>
    </div>
    <div id="content">
        <div id="ct-left" class="left">
            <div id="author-brief" style="text-align: left;">
                <h3>
                    <strong><?=$curr_author['author_name']?>简介</strong>
                    <!-- <a href="">更多</a> -->
                </h3>
                <?php foreach ($curr_author['author_brief'] as $key => $item):?>
                    <p><?=$item?></p>
                <?php endforeach;?>
            </div>
            <div id="author-poem">
                <h3>
                    <strong>所有作品</strong>
                    <!-- <a href="">更多</a> -->
                </h3>
                <ul>
                <?php foreach ($hot_poetry as $key => $item):?>
                    <li>
                        <a href="<?=$header_data['site_host']?>poem/detail/<?=$item->poetry_id?>">
                            《<?=$item->poetry_title?>》
                        </a>
                        <label><?=implode('', json_decode($item->poetry_content, true))?></label>
                    </li>
                <?php endforeach;?>
                </ul>
                <div class="more">
                    <a href="JavaScript:void(0);">&nbsp;</a>
                </div>
            </div>
        </div>
        <div id="ct-right" class="right">
            <div class="hot-poetry">
                <h3 class="" style="margin-right: 25px;">
                    <strong>热门诗词</strong>
                </h3>
                <ul>
                <?php foreach ($hot_poetry as $key => $item):?>
                    <li>
                        <a href="<?=$header_data['site_host']?>poem/detail/<?=$item->poetry_id?>">
                            《<?=$item->poetry_title?>》
                        </a>
                    </li>
                <?php endforeach;?>
                </ul>
                <div class="more">
                    <a href="JavaScript:void(0);">&nbsp;</a>
                </div>
            </div>
            <div class="hot-author">
                <h3 class="" style="margin: 0 25px 0 0;">
                    <strong>著名作者</strong>
                </h3>
                <ul>
                <?php foreach ($famous_author as $key => $author):?>
                    <li>
                        <a href="JavaScript:void(0);" target="_blank" title="<?=$author->author_name?>">
                            <?=$dynasty_list[$author->author_time]?>
                        </a>&nbsp;·&nbsp;
                        <a href="<?=$header_data['site_host']?>author/detail/<?=$author->author_id?>">
                            <?=$author->author_name?>
                        </a>
                    </li>
                <?php endforeach;?>
                </ul>
                <div class="more">
                    <a href="JavaScript:void(0);">&nbsp;</a>
                </div>
            </div>
        </div>
    </div>