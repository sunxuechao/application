<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="utf-8" lang="utf-8">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="http://codeigniter.org.cn/images/design/favicon.ico" type="image/x-icon" />
    <title><?php echo $header_data['title'];?></title>
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo $header_data['site_host']?>css/home.css" />
    <script type="text/javascript" src="<?php echo $header_data['site_host']?>js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo $header_data['site_host']?>js/common.js"></script>
</head>
<body>
    <div style="position: relative; ">
        <div class="header">
            <div id="hd-left">as</div>
            <div id="hd-center">
                <ul class="nav">
                    <li class="menu">
                        <a href="#" title=" " style="border-left: none;">首页</a>
                    </li>
                    <li class="menu active">
                        <a href="#" title=" ">标签</a>
                    </li>   
                    <li class="menu">
                        <a href="#" title=" ">词典</a>
                    </li>             
                </ul>
                <div id="search-box">
                    <input type="text" id="search-key" value="搜索" />
                    <a id="search-btn">&radic;</a>
                </div>
            </div>
            <div id="hd-right"></div>
        </div>
    </div>