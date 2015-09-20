<div class="pop_warn ie6fixed" id="pop_warn" style="width:500px;top:30%;left:40%;">
    <table border="0" cellspacing="0" style="width: 100%;border: 2px solid #00a2ca;">
        <tr style="border-bottom: 1px solid #00a2ca;height: 30px;line-height: 30px;">
            <th colspan="2" class="tdl">
                <label style="padding: 0 10px;font-weight: 100;">提示信息</label>
            </th>
            <th style="width:30px;font-weight: 100;" class="tdc pop-close">&nbsp;</th>
        </tr>
        <tr style="height: 25px; line-height:25px;">
            <td class="tdc" id="warn-msg" colspan="3" style="border-top: 1px solid #00a2ca;">
                <?=$msg?><br />
                <?php foreach ($msg_a as $key => $item):?>
                    <a href="<?=$header_data['site_host']?><?=$item['a_href']?>"><?=$item['a_text']?></a><br />
                <?php endforeach;?>
            </td>
        </tr>
        <tr style="background-color: #f1f6fa;height: 40px;line-height: 40px;">
            <td width="50%">&nbsp;</td>
            <td class="tdc" colspan="2" style="text-align: right;padding: 0 5px;">&nbsp;</td>
        </tr>
    </table>
</div>