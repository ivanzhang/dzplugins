<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('space_task');
0
|| checktplrefresh('./template/default/home/space_task.htm', './template/default/home/space_task_list.htm', 1364139509, '2', './data/template/2_2_home_space_task.tpl.php', './template/dfsj_aadagaioo', 'home/space_task')
|| checktplrefresh('./template/default/home/space_task.htm', './template/default/home/space_task_detail.htm', 1364139509, '2', './data/template/2_2_home_space_task.tpl.php', './template/dfsj_aadagaioo', 'home/space_task')
|| checktplrefresh('./template/default/home/space_task.htm', './template/dfsj_aadagaioo/common/footer.htm', 1364139509, '2', './data/template/2_2_home_space_task.tpl.php', './template/dfsj_aadagaioo', 'home/space_task')
;?><?php include template('common/header'); ?><div id="pt" class="bm cl">
<div class="z">
<a href="./" class="nvhm" title="首页"><?php echo $_G['setting']['bbname'];?></a> <em>&rsaquo;</em>
<a href="home.php?mod=task">任务</a>
</div>
</div>

<div id="ct" class="ct2_a wp cl">
<div class="mn">
<div class="bm bw0">
<?php if(empty($do)) { ?><h1 class="mt">
<img src="<?php echo STATICURL;?>image/feed/task.gif" alt="任务" class="vm" />
<?php if($_GET['item'] == "doing") { ?>进行中的任务
<?php } elseif($_GET['item'] == "done") { ?>已完成的任务
<?php } elseif($_GET['item'] == "failed") { ?>失败的任务
<?php } else { ?>新任务<?php } ?>
</h1>
<div class="ptm">
<?php if($tasklist) { ?>
<table cellspacing="0" cellpadding="0" width="100%"><?php if(is_array($tasklist)) foreach($tasklist as $task) { ?><tr>
<td width="80" class="bbda"><img src="<?php echo $task['icon'];?>" width="64" height="64" alt="<?php echo $task['name'];?>" /></td>
<td class="bbda ptm pbm">
<h3 class="xs2 xi2"><a href="home.php?mod=task&amp;do=view&amp;id=<?php echo $task['taskid'];?>"><?php echo $task['name'];?></a> <span class="xs1 xg2 xw0">(人气: <a href="home.php?mod=task&amp;do=view&amp;id=<?php echo $task['taskid'];?>#parter"><?php echo $task['applicants'];?></a> )</span></h3>
<p class="xg2"><?php echo $task['description'];?></p>
<?php if($_GET['item'] == 'doing') { ?>
<div class="pbg mtm mbm">
<div class="pbr" style="width: <?php if($task['csc']) { ?><?php echo $task['csc'];?>%<?php } else { ?>8px<?php } ?>;"></div>
<div class="xs0">已完成 <span id="csc_<?php echo $task['taskid'];?>"><?php echo $task['csc'];?></span>%</div>
</div>
<?php } ?>
</td>
<td class="xi1 bbda hm" width="200">
<?php if($task['reward'] == 'credit') { ?>
积分 <?php echo $_G['setting']['extcredits'][$task['prize']]['title'];?> <?php echo $task['bonus'];?> <?php echo $_G['setting']['extcredits'][$task['prize']]['unit'];?>
<?php } elseif($task['reward'] == 'magic') { ?>
道具 <?php echo $listdata[$task['prize']];?> <?php echo $task['bonus'];?> 张
<?php } elseif($task['reward'] == 'medal') { ?>
勋章 <?php echo $listdata[$task['prize']];?> <?php if($task['bonus']) { ?>有效期 <?php echo $task['bonus'];?> 天 <?php } } elseif($task['reward'] == 'invite') { ?>
邀请码 <?php echo $task['prize'];?> 有效期 <?php echo $task['bonus'];?> 天
<?php } elseif($task['reward'] == 'group') { ?>
用户组 <?php echo $listdata[$task['prize']];?> <?php if($task['bonus']) { ?> <?php echo $task['bonus'];?> 天 <?php } } ?>
</td>
<td width="120" class="bbda">
<?php if($_GET['item'] == 'new') { if($task['noperm']) { ?>
<a href="javascript:;" onclick="doane(event);showDialog('您所在的用户组无法申请此任务')"><img src="<?php echo STATICURL;?>image/task/disallow.gif" title="您所在的用户组无法申请此任务" alt="disallow" /></a>
<?php } elseif($task['appliesfull']) { ?>
<a href="javascript:;" onclick="doane(event);showDialog('人数已满')"><img src="<?php echo STATICURL;?>image/task/disallow.gif" title="人数已满" alt="disallow" /></a>
<?php } else { ?>
<a href="home.php?mod=task&amp;do=apply&amp;id=<?php echo $task['taskid'];?>"><img src="<?php echo STATICURL;?>image/task/apply.gif" alt="apply" /></a>
<?php } } elseif($_GET['item'] == 'doing') { ?>
<p><a href="home.php?mod=task&amp;do=draw&amp;id=<?php echo $task['taskid'];?>"><img src="<?php echo STATICURL;?>image/task/<?php if($task['csc'] >=100) { ?>reward.gif<?php } else { ?>rewardless.gif<?php } ?>"  alt="" /></a></p>
<?php } elseif($_GET['item'] == 'done') { ?>
<p style="white-space:nowrap">完成于 <?php echo $task['dateline'];?>
<?php if($task['period'] && $task['t']) { ?><br /><?php if($task['allowapply']) { ?><a href="home.php?mod=task&amp;do=apply&amp;id=<?php echo $task['taskid'];?>">现在可以再次申请</a><?php } else { ?><?php echo $task['t'];?> 后可以再次申请<?php } } ?></p>
<?php } elseif($_GET['item'] == 'failed') { ?>
<p style="white-space:nowrap">失败于 <?php echo $task['dateline'];?>
<?php if($task['period'] && $task['t']) { ?><br /><?php if($task['allowapply']) { ?><a href="home.php?mod=task&amp;do=apply&amp;id=<?php echo $task['taskid'];?>">现在可以再次申请</a><?php } else { ?><?php echo $task['t'];?>后可以重新申请<?php } } ?></p>
<?php } ?>
</td>
</tr>
<?php } ?>
</table>
<?php } else { ?>
<p class="emp"><?php if($_GET['item'] == 'new') { ?>暂无新任务，周期性任务完成后可以再次申请，敬请关注 <?php } elseif($_GET['item'] == 'doing') { ?>暂无进行中的任务，请到新任务中申请 <?php } else { ?>暂无数据<?php } ?></p>
<?php } ?>
</div><?php } elseif($do == 'view') { ?><h1 class="mt cl">
<img src="<?php echo STATICURL;?>image/feed/task.gif" alt="任务" class="vm" /> 任务详情
</h1>
<?php if($task['endtime']) { ?><p class="xg2">当前任务下线时间为 <?php echo $task['endtime'];?>，过期后您将不能申请此任务</p><?php } ?>
<div>
<table cellpadding="0" cellspacing="0" class="tfm">
<tr>
<td width="80"><img src="<?php echo $task['icon'];?>" alt="Icon" width="64" height="64" /></td>
<td class="bbda">
<h1 class="xs2 ptm pbm"><?php echo $task['name'];?></h1>
<?php if($task['period']) { ?>
<div class="xg1">
<?php if($task['periodtype'] == 0) { ?>
( 每隔 <?php echo $task['period'];?> 小时允许申请一次 )
<?php } elseif($task['periodtype'] == 1) { ?>
( 每 <?php echo $task['period'];?> 天允许申请一次 )
<?php } elseif($task['periodtype'] == 2) { ?><?php $periodweek = $_G['lang']['core']['weeks'][$task[period]];?>( 每周 <?php echo $periodweek;?> 允许申请一次 )
<?php } elseif($task['periodtype'] == 3) { ?>
( 每月 <?php echo $task['period'];?> 日允许申请一次 )
<?php } ?>
</div>
<?php } ?>
<div><?php echo $task['description'];?></div>
</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>
<table cellpadding="0" cellspacing="0" class="tfm">
<tr>
<th class="bbda">奖励</th>
<td class="bbda xi1">
<?php if($task['reward'] == 'credit') { ?>
积分 <?php echo $_G['setting']['extcredits'][$task['prize']]['title'];?> <?php echo $task['bonus'];?> <?php echo $_G['setting']['extcredits'][$task['prize']]['unit'];?>
<?php } elseif($task['reward'] == 'magic') { ?>
道具 <?php echo $task['rewardtext'];?> <?php echo $task['bonus'];?> 张
<?php } elseif($task['reward'] == 'medal') { ?>
勋章 <?php echo $task['rewardtext'];?> <?php if($task['bonus']) { ?>有效期 <?php echo $task['bonus'];?> 天 <?php } } elseif($task['reward'] == 'invite') { ?>
邀请码 <?php echo $task['prize'];?> 有效期 <?php echo $task['bonus'];?> 天
<?php } elseif($task['reward'] == 'group') { ?>
用户组 <?php echo $task['rewardtext'];?> <?php if($task['bonus']) { ?> <?php echo $task['bonus'];?> 天 <?php } } else { ?>
无
<?php } ?>
</td>
</tr>
<?php if($task['viewmessage']) { ?>
<tr>
<th class="bbda">&nbsp;</th>
<td class="bbda"><?php echo $task['viewmessage'];?></td>
</tr>
<?php } else { ?>
<tr>
<th class="bbda">完成此任务所需条件</th>
<td class="bbda">
<?php if($taskvars['complete']) { ?>
<ul><?php if(is_array($taskvars['complete'])) foreach($taskvars['complete'] as $taskvar) { ?><li><?php echo $taskvar['name'];?> : <?php echo $taskvar['value'];?></li>
<?php } ?>
</ul>
<?php } else { ?>
<p>不限</p>
<?php } ?>
</td>
<?php } ?>
<tr>
<th class="bbda">申请此任务所需条件</th>
<td class="bbda">
<?php if($task['applyperm'] || $task['relatedtaskid'] || $task['tasklimits'] || $taskvars['apply']) { ?>
<ul>
<li><?php if($task['grouprequired']) { ?>用户组: <?php echo $task['grouprequired'];?> <?php } elseif($task['applyperm'] == 'member') { ?>普通会员<?php } elseif($task['applyperm'] == 'admin') { ?>管理人员<?php } ?></li>
<?php if($task['relatedtaskid']) { ?><li>必须完成指定任务: <a href="home.php?mod=task&amp;do=view&amp;id=<?php echo $task['relatedtaskid'];?>"><?php echo $_G['taskrequired'];?></a></li><?php } if($task['tasklimits']) { ?><li>人次上限: <?php echo $task['tasklimits'];?></li><?php } if($taskvars['apply']) { if(is_array($taskvars['apply'])) foreach($taskvars['apply'] as $taskvar) { ?><li><?php echo $taskvar['name'];?>: <?php echo $taskvar['value'];?></li>
<?php } } ?>
</ul>
<?php } else { ?>
<p>不限</p>
<?php } ?>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>
<?php if($allowapply == '-1') { ?>
<div class="pbg mtm mbm">
<div class="pbr" style="width: <?php if($task['csc']) { ?><?php echo $task['csc'];?>%<?php } else { ?>8px<?php } ?>;"></div>
<div class="xs0">已完成 <span id="csc_<?php echo $task['taskid'];?>"><?php echo $task['csc'];?></span>%</div>
</div>
<p class="mbw">
<a href="home.php?mod=task&amp;do=draw&amp;id=<?php echo $task['taskid'];?>"><img src="<?php echo STATICURL;?>image/task/<?php if($task['csc'] >=100) { ?>reward.gif<?php } else { ?>rewardless.gif<?php } ?>" /></a>
<?php if($task['csc'] < 100) { ?><a href="home.php?mod=task&amp;do=delete&amp;id=<?php echo $task['taskid'];?>"><img src="<?php echo STATICURL;?>image/task/cancel.gif" alt="放弃任务" /></a><?php } ?>
</p>
<?php } elseif($allowapply == '-2') { ?>
<p class="xg2 mbn">您所在的用户组无法申请此任务</p>
<a href="javascript:;" onclick="doane(event);showDialog('您所在的用户组无法申请此任务')"><img src="<?php echo STATICURL;?>image/task/disallow.gif" title="您所在的用户组无法申请此任务" alt="您所在的用户组无法申请此任务" /></a>
<?php } elseif($allowapply == '-3') { ?>
<p class="xg2 mbn">人数已满</p>
<a href="javascript:;" onclick="doane(event);showDialog('人数已满')"><img src="<?php echo STATICURL;?>image/task/disallow.gif" title="人数已满" alt="人数已满" /></a>
<?php } elseif($allowapply == '-4') { ?>
<p class="xg2 mbn">失败于<?php echo $task['dateline'];?></p>
<?php } elseif($allowapply == '-5') { ?>
<p class="xg2 mbn">完成于<?php echo $task['dateline'];?></p>
<?php } elseif($allowapply == '-6') { ?>
<p class="xg2 mbn">完成于<?php echo $task['dateline'];?> &nbsp; <?php echo $task['t'];?> 后可以再次申请</p>
<a href="javascript:;" onclick="doane(event);showDialog('<?php echo $task['t'];?> 后可以再次申请')"><img src="<?php echo STATICURL;?>image/task/disallow.gif" title="<?php echo $task['t'];?> 后可以再次申请" alt="人数已满" /></a>
<?php } elseif($allowapply == '-7') { ?>
<p class="xg2 mbn">失败于<?php echo $task['dateline'];?> &nbsp; <?php echo $task['t'];?>后可以重新申请</p>
<a href="javascript:;" onclick="doane(event);showDialog('<?php echo $task['t'];?>后可以重新申请')"><img src="<?php echo STATICURL;?>image/task/disallow.gif" title="<?php echo $task['t'];?>后可以重新申请" alt="人数已满" /></a>
<?php } elseif($allowapply == '2') { ?>
<p class="xg2 mbn">完成于<?php echo $task['dateline'];?> &nbsp; 现在可以再次申请</p>
<?php } elseif($allowapply == '3') { ?>
<p class="xg2 mbn">失败于<?php echo $task['dateline'];?> &nbsp; 现在可以重新申请</p>
<?php } if($allowapply > '0') { ?>
<a href="home.php?mod=task&amp;do=apply&amp;id=<?php echo $task['taskid'];?>"><img src="<?php echo STATICURL;?>image/task/apply.gif" alt="立即申请" /></a>
<?php } ?>
</td>
</tr>
<?php if($task['applicants']) { ?>
<tr>
<td>&nbsp;</td>
<td>
<a name="parter"></a>
<div class="mtm">
<h2 class="mbm">已有 <?php echo $task['applicants'];?> 位会员参与此任务</h2>
<div id="ajaxparter"></div>
</div>
<script type="text/javascript">ajaxget('home.php?mod=task&do=parter&id=<?php echo $task['taskid'];?>', 'ajaxparter');</script>
</td>
</tr>
<?php } ?>
</table>
</div><?php } ?>
</div>
</div>
<div class="appl">
<div class="tbn">
<h2 class="mt bbda">任务</h2>
<ul>
<li<?php echo $actives['new'];?>><a href="home.php?mod=task&amp;item=new">新任务</a></li>
<li<?php echo $actives['doing'];?>><a href="home.php?mod=task&amp;item=doing">进行中的任务</a></li>
<li<?php echo $actives['done'];?>><a href="home.php?mod=task&amp;item=done">已完成的任务</a></li>
<li<?php echo $actives['failed'];?>><a href="home.php?mod=task&amp;item=failed">失败的任务</a></li>
</ul>
</div>
</div>
</div>	</div>
<?php if(empty($topic) || ($topic['usefooter'])) { ?><?php $focusid = getfocus_rand($_G[basescript]);?><?php if($focusid !== null) { ?><?php $focus = $_G['cache']['focus']['data'][$focusid];?><?php $focusnum = count($_G['setting']['focus'][$_G[basescript]]);?><div class="focus" id="sitefocus">
<div class="bm">
<div class="bm_h cl">
<a href="javascript:;" onclick="setcookie('nofocus_<?php echo $_G['basescript'];?>', 1, <?php echo $_G['cache']['focus']['cookie'];?>*3600);$('sitefocus').style.display='none'" class="y" title="关闭">关闭</a>
<h2>
<?php if($_G['cache']['focus']['title']) { ?><?php echo $_G['cache']['focus']['title'];?><?php } else { ?>站长推荐<?php } ?>
<span id="focus_ctrl" class="fctrl"><img src="<?php echo IMGDIR;?>/pic_nv_prev.gif" alt="上一条" title="上一条" id="focusprev" class="cur1" onclick="showfocus('prev');" /> <em><span id="focuscur"></span>/<?php echo $focusnum;?></em> <img src="<?php echo IMGDIR;?>/pic_nv_next.gif" alt="下一条" title="下一条" id="focusnext" class="cur1" onclick="showfocus('next')" /></span>
</h2>
</div>
<div class="bm_c" id="focus_con">
</div>
</div>
</div><?php $focusi = 0;?><?php if(is_array($_G['setting']['focus'][$_G['basescript']])) foreach($_G['setting']['focus'][$_G['basescript']] as $id) { ?><div class="bm_c" style="display: none" id="focus_<?php echo $focusi;?>">
<dl class="xld cl bbda">
<dt><a href="<?php echo $_G['cache']['focus']['data'][$id]['url'];?>" class="xi2" target="_blank"><?php echo $_G['cache']['focus']['data'][$id]['subject'];?></a></dt>
<?php if($_G['cache']['focus']['data'][$id]['image']) { ?>
<dd class="m"><a href="<?php echo $_G['cache']['focus']['data'][$id]['url'];?>" target="_blank"><img src="<?php echo $_G['cache']['focus']['data'][$id]['image'];?>" alt="<?php echo $_G['cache']['focus']['data'][$id]['subject'];?>" /></a></dd>
<?php } ?>
<dd><?php echo $_G['cache']['focus']['data'][$id]['summary'];?></dd>
</dl>
<p class="ptn cl"><a href="<?php echo $_G['cache']['focus']['data'][$id]['url'];?>" class="xi2 y" target="_blank">查看 &raquo;</a></p>
</div><?php $focusi ++;?><?php } ?>
<script type="text/javascript">
var focusnum = <?php echo $focusnum;?>;
if(focusnum < 2) {
$('focus_ctrl').style.display = 'none';
}
if(!$('focuscur').innerHTML) {
var randomnum = parseInt(Math.round(Math.random() * focusnum));
$('focuscur').innerHTML = Math.max(1, randomnum);
}
showfocus();
var focusautoshow = window.setInterval('showfocus(\'next\', 1);', 5000);
</script>
<?php } if($_G['uid'] && $_G['member']['allowadmincp'] == 1 && $_G['setting']['showpatchnotice'] == 1) { ?>
<div class="focus patch" id="patch_notice"></div>
<?php } ?><?php echo adshow("footerbanner/wp a_f/1");?><?php echo adshow("footerbanner/wp a_f/2");?><?php echo adshow("footerbanner/wp a_f/3");?><?php echo adshow("float/a_fl/1");?><?php echo adshow("float/a_fr/2");?><?php echo adshow("couplebanner/a_fl a_cb/1");?><?php echo adshow("couplebanner/a_fr a_cb/2");?><?php echo adshow("cornerbanner/a_cn");?><?php if(!empty($_G['setting']['pluginhooks']['global_footer'])) echo $_G['setting']['pluginhooks']['global_footer'];?>
<div id="ft" class="wp cl">
<div id="flk" class="y">
<p><?php if(is_array($_G['setting']['footernavs'])) foreach($_G['setting']['footernavs'] as $nav) { if($nav['available'] && ($nav['type'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1)) ||
!$nav['type'] && ($nav['id'] == 'stat' && $_G['group']['allowstatdata'] || $nav['id'] == 'report' && $_G['uid'] || $nav['id'] == 'archiver' || $nav['id'] == 'mobile'))) { ?><?php echo $nav['code'];?><span class="pipe">|</span><?php } } ?>
<strong><a href="<?php echo $_G['setting']['siteurl'];?>" target="_blank"><?php echo $_G['setting']['sitename'];?></a></strong>
<?php if($_G['setting']['icp']) { ?>( <a href="http://www.miitbeian.gov.cn/" target="_blank"><?php echo $_G['setting']['icp'];?></a> )<?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['global_footerlink'])) echo $_G['setting']['pluginhooks']['global_footerlink'];?>
<?php if($_G['setting']['statcode']) { ?><?php echo $_G['setting']['statcode'];?><?php } ?>
</p>
<p class="xs0">
GMT<?php echo $_G['timenow']['offset'];?>, <?php echo $_G['timenow']['time'];?>
<span id="debuginfo">
<?php if(debuginfo()) { ?>, Processed in <?php echo $_G['debuginfo']['time'];?> second(s), <?php echo $_G['debuginfo']['queries'];?> queries
<?php if($_G['gzipcompress']) { ?>, Gzip On<?php } if(C::memory()->type) { ?>, <?php echo ucwords(C::memory()->type); ?> On<?php } ?>.
<?php } ?>
</span>
</p>
</div>
<div id="frt">
<p>Powered by <strong><a href="http://www.discuz.net" target="_blank">Discuz!</a></strong> <em><?php echo $_G['setting']['version'];?></em>.&nbsp;技术支持 by <strong><a href="http://www.dfbar.net" target="_blank">巅峰设计.</a></strong><!-- 北北″偷偷的告诉你: 请不要删除版权~否则没有任何技术支持! 谢谢! --><?php if(!empty($_G['setting']['boardlicensed'])) { ?> <a href="http://license.comsenz.com/?pid=1&amp;host=<?php echo $_SERVER['HTTP_HOST'];?>" target="_blank">Licensed</a><?php } ?></p>
<p class="xs0">&copy; 2001-2012 <a href="http://www.comsenz.com" target="_blank">Comsenz Inc.</a></p>
</div><?php updatesession();?><?php if($_G['uid'] && $_G['group']['allowinvisible']) { ?>
<script type="text/javascript">
var invisiblestatus = '<?php if($_G['session']['invisible']) { ?>隐身<?php } else { ?>在线<?php } ?>';
var loginstatusobj = $('loginstatusid');
if(loginstatusobj != undefined && loginstatusobj != null) loginstatusobj.innerHTML = invisiblestatus;
</script>
<?php } ?>
</div>
</div>
<?php if($upgradecredit !== false) { ?>
<div id="g_upmine_menu" class="tip tip_3" style="display:none;">
<div class="tip_c">
积分 <?php echo $_G['member']['credits'];?>, 距离下一级还需 <?php echo $upgradecredit;?> 积分
</div>
<div class="tip_horn"></div>
</div>
<?php } } if(!$_G['setting']['bbclosed']) { if($_G['uid'] && !isset($_G['cookie']['checkpm'])) { ?>
<script src="home.php?mod=spacecp&ac=pm&op=checknewpm&rand=<?php echo $_G['timestamp'];?>" type="text/javascript"></script>
<?php } if($_G['uid'] && helper_access::check_module('follow') && !isset($_G['cookie']['checkfollow'])) { ?>
<script src="home.php?mod=spacecp&ac=follow&op=checkfeed&rand=<?php echo $_G['timestamp'];?>" type="text/javascript"></script>
<?php } if(!isset($_G['cookie']['sendmail'])) { ?>
<script src="home.php?mod=misc&ac=sendmail&rand=<?php echo $_G['timestamp'];?>" type="text/javascript"></script>
<?php } if($_G['uid'] && $_G['member']['allowadmincp'] == 1 && !isset($_G['cookie']['checkpatch'])) { ?>
<script src="misc.php?mod=patch&action=checkpatch&rand=<?php echo $_G['timestamp'];?>" type="text/javascript"></script>
<?php } } if($_GET['diy'] == 'yes') { if(check_diy_perm($topic) && (empty($do) || $do != 'index')) { ?>
<script src="<?php echo $_G['setting']['jspath'];?>common_diy.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<script src="<?php echo $_G['setting']['jspath'];?>portal_diy<?php if(!check_diy_perm($topic, 'layout')) { ?>_data<?php } ?>.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } if($space['self'] && CURMODULE == 'space' && $do == 'index') { ?>
<script src="<?php echo $_G['setting']['jspath'];?>common_diy.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<script src="<?php echo $_G['setting']['jspath'];?>space_diy.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } } if($_G['uid'] && $_G['member']['allowadmincp'] == 1 && $_G['setting']['showpatchnotice'] == 1) { ?>
<script type="text/javascript">patchNotice();</script>
<?php } if($_G['uid'] && $_G['member']['allowadmincp'] == 1 && empty($_G['cookie']['pluginnotice'])) { ?>
<div class="focus plugin" id="plugin_notice"></div>
<script type="text/javascript">pluginNotice();</script>
<?php } if($_G['member']['newprompt'] && (empty($_G['cookie']['promptstate_'.$_G['uid']]) || $_G['cookie']['promptstate_'.$_G['uid']] != $_G['member']['newprompt']) && $_GET['do'] != 'notice') { ?>
<script type="text/javascript">noticeTitle();</script>
<?php } ?><?php userappprompt();?><?php if($_G['basescript'] != 'userapp') { ?>
<span id="scrolltop" onclick="window.scrollTo('0','0')">回顶部</span>
<script type="text/javascript">_attachEvent(window, 'scroll', function(){showTopLink();});checkBlind();</script>
<?php } ?><?php output();?></body>
</html>
