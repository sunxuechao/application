
                    <div class="aside-right">
                        <div id="post-hot">
                            <h3 class="bookmark-title left-border">站点推荐</h3>
                            <ul>
                                <?php foreach ($recommend as $key => $item):?>
                                <li>
                                    <span class="views"><?=$item['poetry_view']?></span>
                                    <a href="<?php echo $header_data['site_host']?>poem/detail/<?=$item['poetry_id']?>" title="<?=$item['poetry_title']?>">
                                        <?=$item['poetry_title']?><?=strip_tags($item['poetry_content'])?>
                                    </a>
                                </li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer"></div>
    <script type="text/javascript">

    </script>
</body>
</html>