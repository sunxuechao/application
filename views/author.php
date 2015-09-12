    <div id="ct-top">
        <div id="top-head">
            <div id="top-title">苏轼诗词</div>
        </div>
    </div>
    <div id="content">
        <div id="ct-left" class="left">
            <div id="author-brief" style="text-align: left;">
                <h3>
                    <strong>苏轼简介</strong>
                    <!-- <a href="">更多</a> -->
                </h3>
                <p>横看成岭侧成峰，远近高低各不看成岭侧成峰，远近高低各不看成岭侧成峰，远近高低各不看成岭侧成峰，远近高低各不看成岭侧成峰，远近高低各不看成岭侧成峰，远近高低各不看成岭侧成峰，远近高低各不同。</p>
                <p>不识庐山真面目，只缘身在此山中。不识庐山真面目，只缘身在此山中。不识庐山真面目，只缘身在此山中。不识庐山真面目，只缘身在此山中。不识庐山真面目，只缘身在此山中。不识庐山真面目，只缘身在此山中。不识庐山真面目，只缘身在此山中。</p>
            </div>
            <div id="author-poem">
                <h3>
                    <strong>苏轼诗词</strong>
                    <!-- <a href="">更多</a> -->
                </h3>
                <ul>
                <?php foreach ($hot_poetry as $key => $item):?>
                    <li>
                        <a href="#" target="_blank" title="<?=$item->poetry_title?>">
                            《<?=$item->poetry_title?>》
                        </a>
                        <label><?=$item->poetry_content?></label>
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
                    <!-- <a href="">更多</a> -->
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
                    <!-- <a href="">更多</a> -->
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