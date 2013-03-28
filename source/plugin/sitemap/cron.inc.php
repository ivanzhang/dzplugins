<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
include 'sitemap.fun.php';
Auth();//检测是否管理员
$cronid = get_cronid();
if($cronid>0){
	$cronmsg = '<span style="color:green;">自动更新</span>';
}else{
	$cronmsg = '<span style="color:red;">手动更新</span>';
}
if($_GET['start']==1){
	if($cronid>0){
		$msg = '<span style="color:green">已经启用成功</span>';
	}else{
		$save['available']=1;
		$save['name']=Adzcharset('站点地图自动更新');
		$save['filename']='cron_sitemap.php';
		$save['nextrun']=strtotime(date("Y-m-d",time()+86400).' 00:00:00');
		$save['weekday']=-1;
		$save['day']=-1;
		$save['hour']=0;
		$save['minute']='0';
		DB::insert('common_cron',$save);
		$cronmsg = '<span style="color:green;">自动更新</span>';
		$cronid = get_cronid();
	}
}elseif($_GET['stop']==1){
	if($cronid) DB::delete('common_cron', "cronid=$cronid");
	$cronmsg = '<span style="color:red;">手动更新</span>';
	$cronid = '';
}
$cron_url = ADMINSCRIPT.'?action=misc&operation=cron&edit='.$cronid;
$url = ADMINSCRIPT.'?action=plugins&operation=config&identifier=sitemap&pmod=cron';
$str = '<table class="tb tb2 ">
<tr>
	<th class="partition">当前状态:'.$cronmsg.'</th>
</tr>
<tr>
	<td><a href="'.$url.'&start=1">启用</a> | <a href="'.$url.'&stop=1">停用</a> </td>
</tr>
<tr><td>启用后去计划任务里调整更新频率： <a href="'.$cron_url.'">点此编辑</a></td></tr>
</table>';
echo Adzcharset($str);
?>