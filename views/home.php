    <div id="ct-top">
        <div id="top-head">
            <div id="top-title">最新收录</div>
        </div>
    </div>
    <div id="content">
        <div id="ct-left" class="left">
            <ul class="new_pick clear">
            <?php foreach ($new_pick as $key => $item):?>
                <li class="clear">
                    <a href="<?=$header_data['site_host']?>poem/detail/<?=$item->poetry_id?>" class="pick-title">
                        《<?=$item->poetry_title?>》&nbsp;
                    </a>
                    <a href="JavaScript:void(0);" class="pick-time">
                        <?=$dynasty_list[$item->author_time]?>
                    </a>&nbsp;·
                    <a href="<?=$header_data['site_host']?>author/detail/<?=$item->author_id?>" class="pick-author">
                        <?=$item->author_name?>
                    </a>
                    <label class="pick-date">收录时间：<?=date('Y-m-d H:i:s', $item->poetry_last)?></label>
                    <p class="pick-sentence">
                        <?=implode('', json_decode($item->poetry_content, true))?>
                    </p>
                </li>
            <?php endforeach;?>
            </ul>
            <div id="pick-next" class="author-more">
                <div class="next-right-line">
                    <a href="JavaScript:void(0);">加载更多</a>
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
                        <a href="#" target="_blank" title="<?=$item->poetry_title?>">
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
                        <a href="#" target="_blank" title="<?=$author->author_name?>">
                            <?=$dynasty_list[$author->author_time]?>
                        </a>&nbsp;·&nbsp;
                        <a href="#" target="_blank" title="<?=$author->author_name?>">
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