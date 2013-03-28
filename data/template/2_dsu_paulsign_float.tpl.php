<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('float');?><?php include template('common/header'); if(!defined('IN_MOBILE')) { if(!empty($_GET['infloat'])) { if(!empty($treferer)) { if($treferer == "plugin.php?id=dsu_paulsign:sign" && $_GET['sign_as']) { ?>
<script type="text/javascript" reload="1">
setTimeout("window.location.reload()", 3000);
</script>
<?php } else { ?>
<script type="text/javascript" reload="1">
setTimeout("window.location.href='<?php echo $treferer;?>'", 3000);
</script>
<?php } } else { ?>
<script type="text/javascript" reload="1">
setTimeout("hideWindow('qwindow')", 3000);
</script>
<?php } } else { if(!empty($treferer)) { ?>
<script type="text/javascript" reload="1">
setTimeout("window.location.href='<?php echo $treferer;?>'", 3000);
</script>
<?php } else { ?>
<script type="text/javascript" reload="1">
setTimeout("window.location.href='<?php echo $_G['siteurl'];?>plugin.php?id=dsu_paulsign:sign'", 3000);
</script>
<?php } } } if(empty($_GET['infloat'])) { ?>
<div id="wp" class="wp">
<div id="ct" class="wp cl w"> 
<div class="nfl"> 
<?php } ?>
<div class="f_c">
<h3 class="flb">
<em id="return_win">签到提示</em>
<span>
<?php if(!empty($_GET['infloat'])) { ?><a href="javascript:;" class="flbc" onclick="hideWindow('qwindow')" title="关闭">关闭</a><?php } ?>
</span>
</h3>
<div class="c">
<?php echo $msg;?> <?php if(empty($_GET['infloat'])) { ?><a href="plugin.php?id=dsu_paulsign:sign" title="点此返回">[点此返回]</a><?php } ?>
</div>
</div>
<?php if(empty($_GET['infloat'])) { ?>
</div>
</div>
</div>
<?php } include template('common/footer'); ?>