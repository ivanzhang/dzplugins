<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('common/header_ajax'); ?><h3 class="flb">
<em>每日签到</em>
<?php if(!$var['ftopen'] || ($var['ftopen'] && !in_array($_G['groupid'], unserialize($var['groups'])) || in_array($_G['uid'],explode(",",$var['ban'])) ) ) { ?>
<span><a href="javascript:;" class="flbc" onclick="hideWindow('<?php echo $_GET['handlekey'];?>');" title="关闭">关闭</a></span>
<?php } ?>
</h3>
<form id="qiandao" method="post" action="plugin.php?id=dsu_paulsign:sign&amp;operation=qiandao&amp;infloat=1&amp;sign_as=1" onkeydown="if(event.keyCode==13){showWindow('qwindow', 'qiandao', 'post', '0');return false}">
<div class="f_c" style="width:690px;margin:10px;">
<?php if($qiandaodb['time'] < $tdtime) { ?>
<style>
.qdsmilea{padding:3px;margin:auto;float:left;list-style:none;float:left}
.qdsmilea li{float: left;padding:5px .4em;border:2px #fff solid;}
.qdsmilea li img{margin-bottom:5px;}
.qdsmilea li:hover{cursor:pointer;}
</style>
<h3>今天签到了吗？请选择您此刻的<font color=red>心情图片</font>并写下<font color=blue>今天最想说的话</font>！<?php if($var['ftopen']) { ?><br><font color="red">[温馨提示:今日未签到会员将自动跳转到此处,请签到后再返回论坛进行各项操作.]</font><?php } ?></h3>
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>">
<script>
function Icon_selected(sId) {
var oImg = document.getElementsByTagName('li');
for (var i = 0; i < oImg.length; i++) {
  if (oImg[i].id == sId) {
var selectname = document.getElementById(oImg[i].id + "_s");
selectname.checked = true;
oImg[i].style. background = '#EFEFEF';
  } else {
oImg[i].style. background = '';
  }
}
}
</script>
<table width="100%" cellpadding="0" cellspacing="0" align="center">
<tr>
<td>
<ul class="qdsmilea"><?php if(is_array($emots)) foreach($emots as $key => $value) { ?><input id="<?php echo $key;?>_s" type="radio" name="qdxq" value="<?php echo $key;?>" style="display:none"><li id="<?php echo $key;?>" onclick="Icon_selected(this.id)"><center><img src="source/plugin/dsu_paulsign/img/emot/<?php echo $key;?>.gif"><br><?php echo $value['name'];?><br></center></li>
<?php } ?>
</ul>
</td>
</tr>
<?php if(!$var['sayclose']) { ?>
<table summary="Qd" cellspacing="0" cellpadding="0" class="tfm">
<tr<?php if(!$var['ksopen'] && !$var['todaysayxt']) { ?> style="display:none;"<?php } ?>>
<th>今日最想说模式</th>
<td>
<label><input type="radio" name="qdmode" value="1" checked="checked" onclick="if(checked == true){document.getElementById('mode1').style.display='';document.getElementById('mode2').style.display='none';}">&nbsp;自己填写</label>&nbsp;&nbsp;
<?php if($var['ksopen']) { ?><label><input type="radio" name="qdmode" value="2" onclick="if(checked == true){document.getElementById('mode1').style.display='none';document.getElementById('mode2').style.display='';}">&nbsp;快速选择</label>&nbsp;&nbsp;<?php } if($var['todaysayxt']) { ?><label><input type="radio" name="qdmode" value="3" onclick="if(checked){document.getElementById('mode1').style.display='none';document.getElementById('mode1').style.display='none';document.getElementById('mode2').style.display='none';}">&nbsp;不想填写</label><?php } ?>
</td>
</tr>
<tr id="mode1" style="display:;">
<th><label for="todaysay">我今天最想说</label></th>
<td><input type="text" name="todaysay" id="todaysay" size="25" class="px" /></td>
<td></td>
</tr>
<tr id="mode2" style="display:none;">
<th>快速语句选择</th>
<td>
<select name="fastreply"><?php if(is_array($fastreplytexts)) foreach($fastreplytexts as $key => $value) { ?><option value="<?php echo $key;?>" style="color:#<?php echo dechex(rand(0, 255)).dechex(rand(0,196)).dechex(rand(0,255));?>"><?php echo $value;?></option>
<?php } ?>
</select>
</td>
</tr>
</table>
<?php } ?>
</table>
<?php } else { ?>
<h1 class="mt">您今天已经签到过了或者签到时间还未开始</h1>
<?php } ?>
</div>
<p class="o pns">
<button type="button" class="pn pnc" onclick="showWindow('qwindow', 'qiandao', 'post', '0');return false"><strong>点我签到!</strong></button>
</p>
</form><?php include template('common/footer_ajax'); ?>