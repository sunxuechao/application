    <div id="content">
        <div id="ct-left" class="left">
            <h3 class="">
                <strong>诗词鉴赏</strong>
                <a href="">换一换</a>
            </h3>
            <div class="change">
            <?php foreach ($change as $key => $item):?>
                <div class="article-title">
                    <a class="on" href="#"><?=$item->poetry_title?></a>
                </div>
                <div class="article-author">
                    <a href="#"><?=$dynasty_list[$item->author_time]?></a> · 
                    <a href="#"><?=$item->author_name?></a>
                </div>
                <div class="article-sentence">
                    <?=str_replace(array('，', '。', '？', '！'), array('，<br />', '。<br />', '？<br />', '！<br />'), $item->poetry_content)?>
                </div>
            <?php endforeach;?>
            </div>           
            <div class="more">
                <a href="JavaScript:void(0);">&nbsp;</a>
            </div>
        </div>
        <div id="ct-center" class="center">
            <h3 class=""><strong>最新收录</strong><a href="">收录通道</a></h3>
            <ul class="new_pick clear">
            <?php foreach ($new_pick as $key => $item):?>
                <li class="clear">
                    <a href="" class="pick-title">&nbsp;《<?=$item->poetry_title?>》&nbsp;</a>
                    <a href="" class="pick-time"><?=$dynasty_list[$item->author_time]?></a>&nbsp;·
                    <a href="" class="pick-author"><?=$item->author_name?></a>
                    <label class="pick-date">收录时间：<?=date('Y-m-d H:i:s', $item->poetry_last)?></label>
                    <p class="pick-sentence"><?=$item->poetry_content?></p>
                    <div class="pick-appreciation">
                        鉴赏&int;
                    </div>
                    <div class="pick-like">
                        赞&int;
                    </div>
                    <div class="pick-tag">
                        标签&int;
                        <a href="">花</a>&nbsp;|
                        <a href="">水</a>&nbsp;|
                        <a href="">花</a>
                    </div>
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