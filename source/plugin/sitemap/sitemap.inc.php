<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
include 'sitemap.fun.php';
Auth();//检测是否管理员
$rs = get_sitemap();
if($rs->fgi>0)
	for($i=0;$i<$rs->fgi;$i++){
		$url = $rs->xml;if($i>0){$url = str_replace('.xml',$i.'.xml',$rs->xml);}
		$surl .= '<a href="'.$url.'" target="_blank">'.$url.'</a><br>';
	}
else
	$surl = '<a href="'.$rs->xml.'" target="_blank">'.$rs->xml.'</a><br>';
$str = '<table class="tb tb2" style="width:400px;">
<tr>
	<th class="partition" colspan="2">提示：['.date("Y-m-d H:i:s",time()).']您的网站地图已更新：</th>
</tr>
<tr>
	<td>版块数量：</td><td>'.$rs->num['fid'].'条</td>
</tr>
<tr>
	<td>帖子数量：</td><td>'.$rs->num['tid'].'条</td>
</tr>
<tr>
	<td>文章数量：</td><td>'.$rs->num['aid'].'条</td>
</tr>
<tr>
	<td>标签数量：</td><td>'.$rs->num['tagid'].'条(<a href="http://addon.discuz.com/?@sitemap.plugin">增强版</a>功能)</td>
</tr>
<tr>
	<td>日志数量：</td><td>'.$rs->num['blogid'].'条(<a href="http://addon.discuz.com/?@sitemap.plugin">增强版</a>功能)</td>
</tr>
<tr>
	<td>总共：</td><td>'.array_sum($rs->num).'条</td>
</tr>
<tr>
	<td colspan="2">'.$surl.'</td>
</tr>
</table>';
echo Adzcharset($str);
?>