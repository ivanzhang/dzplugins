<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('sign');
0
|| checktplrefresh('./source/plugin/dsu_paulsign/template/sign.htm', './template/dfsj_aadagaioo/common/header.htm', 1363620303, 'dsu_paulsign', './data/template/2_dsu_paulsign_sign.tpl.php', './source/plugin/dsu_paulsign/template', 'sign')
|| checktplrefresh('./source/plugin/dsu_paulsign/template/sign.htm', './template/dfsj_aadagaioo/common/footer.htm', 1363620303, 'dsu_paulsign', './data/template/2_dsu_paulsign_sign.tpl.php', './source/plugin/dsu_paulsign/template', 'sign')
|| checktplrefresh('./source/plugin/dsu_paulsign/template/sign.htm', './template/dfsj_aadagaioo/common/header_common.htm', 1363620303, 'dsu_paulsign', './data/template/2_dsu_paulsign_sign.tpl.php', './source/plugin/dsu_paulsign/template', 'sign')
|| checktplrefresh('./source/plugin/dsu_paulsign/template/sign.htm', './template/dfsj_aadagaioo/common/pubsearchform.htm', 1363620303, 'dsu_paulsign', './data/template/2_dsu_paulsign_sign.tpl.php', './source/plugin/dsu_paulsign/template', 'sign')
;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET;?>" />
<?php if($_G['config']['output']['iecompatible']) { ?><meta http-equiv="X-UA-Compatible" content="IE=EmulateIE<?php echo $_G['config']['output']['iecompatible'];?>" /><?php } ?>
<title><?php if(!empty($navtitle)) { ?><?php echo $navtitle;?> - <?php } if(empty($nobbname)) { ?> <?php echo $_G['setting']['bbname'];?> - <?php } ?> Powered by Discuz!</title>
<?php echo $_G['setting']['seohead'];?>

<meta name="keywords" content="<?php if(!empty($metakeywords)) { echo dhtmlspecialchars($metakeywords); } ?>" />
<meta name="description" content="<?php if(!empty($metadescription)) { echo dhtmlspecialchars($metadescription); ?> <?php } if(empty($nobbname)) { ?>,<?php echo $_G['setting']['bbname'];?><?php } ?>" />
<meta name="generator" content="Discuz! <?php echo $_G['setting']['version'];?>" />
<meta name="author" content="Discuz! Team and Comsenz UI Team" />
<meta name="copyright" content="2001-2012 Comsenz Inc." />
<meta name="MSSmartTagsPreventParsing" content="True" />
<meta http-equiv="MSThemeCompatible" content="Yes" />
<base href="<?php echo $_G['siteurl'];?>" /><link rel="stylesheet" type="text/css" href="data/cache/style_<?php echo STYLEID;?>_common.css?<?php echo VERHASH;?>" /><?php if($_G['uid'] && isset($_G['cookie']['extstyle']) && strpos($_G['cookie']['extstyle'], TPLDIR) !== false) { ?><link rel="stylesheet" id="css_extstyle" type="text/css" href="<?php echo $_G['cookie']['extstyle'];?>/style.css" /><?php } elseif($_G['style']['defaultextstyle']) { ?><link rel="stylesheet" id="css_extstyle" type="text/css" href="<?php echo $_G['style']['defaultextstyle'];?>/style.css" /><?php } ?><script type="text/javascript">var STYLEID = '<?php echo STYLEID;?>', STATICURL = '<?php echo STATICURL;?>', IMGDIR = '<?php echo IMGDIR;?>', VERHASH = '<?php echo VERHASH;?>', charset = '<?php echo CHARSET;?>', discuz_uid = '<?php echo $_G['uid'];?>', cookiepre = '<?php echo $_G['config']['cookie']['cookiepre'];?>', cookiedomain = '<?php echo $_G['config']['cookie']['cookiedomain'];?>', cookiepath = '<?php echo $_G['config']['cookie']['cookiepath'];?>', showusercard = '<?php echo $_G['setting']['showusercard'];?>', attackevasive = '<?php echo $_G['config']['security']['attackevasive'];?>', disallowfloat = '<?php echo $_G['setting']['disallowfloat'];?>', creditnotice = '<?php if($_G['setting']['creditnotice']) { ?><?php echo $_G['setting']['creditnames'];?><?php } ?>', defaultstyle = '<?php echo $_G['style']['defaultextstyle'];?>', REPORTURL = '<?php echo $_G['currenturl_encode'];?>', SITEURL = '<?php echo $_G['siteurl'];?>', JSPATH = '<?php echo $_G['setting']['jspath'];?>';</script>
<script src="<?php echo $_G['setting']['jspath'];?>common.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<script language="javascript">function killErrors(){return true};window.onerror=killErrors;</script>
<?php if(empty($_GET['diy'])) { ?><?php $_GET['diy'] = '';?><?php } if(!isset($topic)) { ?><?php $topic = array();?><?php } ?><meta name="application-name" content="<?php echo $_G['setting']['bbname'];?>" />
<meta name="msapplication-tooltip" content="<?php echo $_G['setting']['bbname'];?>" />
<?php if($_G['setting']['portalstatus']) { ?><meta name="msapplication-task" content="name=<?php echo $_G['setting']['navs']['1']['navname'];?>;action-uri=<?php echo !empty($_G['setting']['domain']['app']['portal']) ? 'http://'.$_G['setting']['domain']['app']['portal'] : $_G['siteurl'].'portal.php'; ?>;icon-uri=<?php echo $_G['siteurl'];?><?php echo IMGDIR;?>/portal.ico" /><?php } ?>
<meta name="msapplication-task" content="name=<?php echo $_G['setting']['navs']['2']['navname'];?>;action-uri=<?php echo !empty($_G['setting']['domain']['app']['forum']) ? 'http://'.$_G['setting']['domain']['app']['forum'] : $_G['siteurl'].'forum.php'; ?>;icon-uri=<?php echo $_G['siteurl'];?><?php echo IMGDIR;?>/bbs.ico" />
<?php if($_G['setting']['groupstatus']) { ?><meta name="msapplication-task" content="name=<?php echo $_G['setting']['navs']['3']['navname'];?>;action-uri=<?php echo !empty($_G['setting']['domain']['app']['group']) ? 'http://'.$_G['setting']['domain']['app']['group'] : $_G['siteurl'].'group.php'; ?>;icon-uri=<?php echo $_G['siteurl'];?><?php echo IMGDIR;?>/group.ico" /><?php } if(helper_access::check_module('feed')) { ?><meta name="msapplication-task" content="name=<?php echo $_G['setting']['navs']['4']['navname'];?>;action-uri=<?php echo !empty($_G['setting']['domain']['app']['home']) ? 'http://'.$_G['setting']['domain']['app']['home'] : $_G['siteurl'].'home.php'; ?>;icon-uri=<?php echo $_G['siteurl'];?><?php echo IMGDIR;?>/home.ico" /><?php } if($_G['basescript'] == 'forum' && $_G['setting']['archiver']) { ?>
<link rel="archives" title="<?php echo $_G['setting']['bbname'];?>" href="<?php echo $_G['siteurl'];?>archiver/" />
<?php } if(!empty($rsshead)) { ?><?php echo $rsshead;?><?php } if(widthauto()) { ?>
<link rel="stylesheet" id="css_widthauto" type="text/css" href="data/cache/style_<?php echo STYLEID;?>_widthauto.css?<?php echo VERHASH;?>" />
<script type="text/javascript">HTMLNODE.className += ' widthauto'</script>
<?php } if($_G['basescript'] == 'forum' || $_G['basescript'] == 'group') { ?>
<script src="<?php echo $_G['setting']['jspath'];?>forum.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } elseif($_G['basescript'] == 'home' || $_G['basescript'] == 'userapp') { ?>
<script src="<?php echo $_G['setting']['jspath'];?>home.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } elseif($_G['basescript'] == 'portal') { ?>
<script src="<?php echo $_G['setting']['jspath'];?>portal.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } if($_G['basescript'] != 'portal' && $_GET['diy'] == 'yes' && check_diy_perm($topic)) { ?>
<script src="<?php echo $_G['setting']['jspath'];?>portal.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } if($_GET['diy'] == 'yes' && check_diy_perm($topic)) { ?>
<link rel="stylesheet" type="text/css" id="diy_common" href="data/cache/style_<?php echo STYLEID;?>_css_diy.css?<?php echo VERHASH;?>" />
<?php } ?>
</head>

<body id="nv_<?php echo $_G['basescript'];?>" class="pg_<?php echo CURMODULE;?><?php if($_G['basescript'] === 'portal' && CURMODULE === 'list' && !empty($cat)) { ?> <?php echo $cat['bodycss'];?><?php } ?>" onkeydown="if(event.keyCode==27) return false;">
<div id="append_parent"></div><div id="ajaxwaitid"></div>
<?php if($_GET['diy'] == 'yes' && check_diy_perm($topic)) { include template('common/header_diy'); } if(check_diy_perm($topic)) { ?><?php
$__STATICURL = STATICURL;$diynav = <<<EOF

<a id="diy-tg" href="javascript:openDiy();" title="打开 DIY 面板" class="xi1 xw1" onmouseover="showMenu(this.id)"><img src="{$__STATICURL}image/diy/panel-toggle.png" alt="DIY" /></a>
<div id="diy-tg_menu" style="display: none;">
<ul>
<li><a href="javascript:saveUserdata('diy_advance_mode', '');openDiy();" class="xi2">简洁模式</a></li>
<li><a href="javascript:saveUserdata('diy_advance_mode', '1');openDiy();" class="xi2">高级模式</a></li>
</ul>
</div>

EOF;
?>
<?php } if(CURMODULE == 'topic' && $topic && empty($topic['useheader']) && check_diy_perm($topic)) { ?>
<?php echo $diynav;?>
<?php } if(empty($topic) || $topic['useheader']) { if($_G['setting']['mobile']['allowmobile'] && (!$_G['setting']['cacheindexlife'] && !$_G['setting']['cachethreadon'] || $_G['uid']) && ($_GET['diy'] != 'yes' || !$_GET['inajax']) && ($_G['mobile'] != '' && $_G['cookie']['mobile'] == '' && $_GET['mobile'] != 'no')) { ?>
<div class="xi1 bm bm_c">
    请选择 <a href="<?php echo $_G['siteurl'];?>forum.php?mobile=yes">进入手机版</a> <span class="xg1">|</span> <a href="<?php echo $_G['setting']['mobile']['nomobileurl'];?>">继续访问电脑版</a>
</div>
<?php } ?>

<div id="toptb" class="cl">
<?php if(!empty($_G['setting']['pluginhooks']['global_cpnav_top'])) echo $_G['setting']['pluginhooks']['global_cpnav_top'];?>
<div class="wp">
<div class="z"><?php if(is_array($_G['setting']['topnavs']['0'])) foreach($_G['setting']['topnavs']['0'] as $nav) { if($nav['available'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1))) { ?><?php echo $nav['code'];?><?php } } ?>
<?php if(!empty($_G['setting']['pluginhooks']['global_cpnav_extra1'])) echo $_G['setting']['pluginhooks']['global_cpnav_extra1'];?>
</div>
<div class="y">
<a id="switchblind" href="javascript:;" onclick="toggleBlind(this)" title="开启辅助访问" class="switchblind">开启辅助访问</a>
<?php if(!empty($_G['setting']['pluginhooks']['global_cpnav_extra2'])) echo $_G['setting']['pluginhooks']['global_cpnav_extra2'];?><?php if(is_array($_G['setting']['topnavs']['1'])) foreach($_G['setting']['topnavs']['1'] as $nav) { if($nav['available'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1))) { ?><?php echo $nav['code'];?><?php } } if(empty($_G['disabledwidthauto']) && $_G['setting']['switchwidthauto']) { ?>
<a href="javascript:;" onclick="widthauto(this)"><?php if(widthauto()) { ?>切换到窄版<?php } else { ?>切换到宽版<?php } ?></a>
<?php } if($_G['uid'] && !empty($_G['style']['extstyle'])) { ?><a id="sslct" href="javascript:;" onmouseover="delayShow(this, function() {showMenu({'ctrlid':'sslct','pos':'34!'})});">切换风格</a><?php } if(check_diy_perm($topic)) { ?>
<?php echo $diynav;?>
<?php } ?>
</div>
</div>
</div>

<?php if(!IS_ROBOT) { if($_G['uid'] && !empty($_G['style']['extstyle'])) { ?>
<div id="sslct_menu" class="cl p_pop" style="display: none;">
<?php if(!$_G['style']['defaultextstyle']) { ?><span class="sslct_btn" onclick="extstyle('')" title="默认"><i></i></span><?php } if(is_array($_G['style']['extstyle'])) foreach($_G['style']['extstyle'] as $extstyle) { ?><span class="sslct_btn" onclick="extstyle('<?php echo $extstyle['0'];?>')" title="<?php echo $extstyle['1'];?>"><i style='background:<?php echo $extstyle['2'];?>'></i></span>
<?php } ?>
</div>
<?php } ?>

<div id="qmenu_menu" class="p_pop <?php if(!$_G['uid']) { ?>blk<?php } ?>" style="display: none;">
<?php if($_G['uid']) { ?>
<ul><?php if(is_array($_G['setting']['mynavs'])) foreach($_G['setting']['mynavs'] as $nav) { if($nav['available'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1))) { ?>
<li><?php echo $nav['code'];?></li>
<?php } } ?>
</ul>
<?php } elseif($_G['connectguest']) { ?>
<div class="ptm pbw hm">
请先<br /><a class="xi2" href="member.php?mod=connect"><strong>完善帐号信息</strong></a> 或 <a href="member.php?mod=connect&amp;ac=bind" class="xi2 xw1"><strong>绑定已有帐号</strong></a><br />后使用快捷导航
</div>
<?php } else { ?>
<div class="ptm pbw hm">
请 <a href="javascript:;" class="xi2" onclick="lsSubmit()"><strong>登录</strong></a> 后使用快捷导航<br />没有帐号？<a href="member.php?mod=<?php echo $_G['setting']['regname'];?>" class="xi2 xw1"><?php echo $_G['setting']['reglinkname'];?></a>
</div>
<?php } ?>
</div>
<?php } ?>

<div id="dfsj_body"><?php echo adshow("headerbanner/wp a_h");?><div id="hd">
<div class="wp">
<div class="hdc cl"<?php if(!$_G['uid']) { ?> style="position: relative;"<?php } ?>><?php $mnid = getcurrentnav();?><h2><?php if(!isset($_G['setting']['navlogos'][$mnid])) { ?><a href="<?php if($_G['setting']['domain']['app']['default']) { ?>http://<?php echo $_G['setting']['domain']['app']['default'];?>/<?php } else { ?>./<?php } ?>" title="<?php echo $_G['setting']['bbname'];?>"><?php echo $_G['style']['boardlogo'];?></a><?php } else { ?><?php echo $_G['setting']['navlogos'][$mnid];?><?php } ?></h2>

<?php if($_G['uid']) { ?>
<div id="um">
<div class="avt y"><a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>"><?php echo avatar($_G[uid],small);?></a></div>
<p>
<strong class="vwmy<?php if($_G['setting']['connect']['allow'] && $_G['member']['conisbind']) { ?> qq<?php } ?>"><a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>" target="_blank" title="访问我的空间"><?php echo $_G['member']['username'];?></a></strong>
<?php if($_G['group']['allowinvisible']) { ?>
<span id="loginstatus">
<a id="loginstatusid" href="member.php?mod=switchstatus" title="切换在线状态" onclick="ajaxget(this.href, 'loginstatus');return false;" class="xi2"></a>
</span>
<?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra1'])) echo $_G['setting']['pluginhooks']['global_usernav_extra1'];?>
<span class="pipe">|</span><?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra4'])) echo $_G['setting']['pluginhooks']['global_usernav_extra4'];?><a href="home.php?mod=spacecp">设置</a>
<span class="pipe">|</span><a href="home.php?mod=space&amp;do=pm" id="pm_ntc"<?php if($_G['member']['newpm']) { ?> class="new"<?php } ?>>消息</a>
<span class="pipe">|</span><a href="home.php?mod=space&amp;do=notice" id="myprompt"<?php if($_G['member']['newprompt']) { ?> class="new"<?php } ?>>提醒<?php if($_G['member']['newprompt']) { ?>(<?php echo $_G['member']['newprompt'];?>)<?php } ?></a><span id="myprompt_check"></span>
<?php if($_G['setting']['taskon'] && !empty($_G['cookie']['taskdoing_'.$_G['uid']])) { ?><span class="pipe">|</span><a href="home.php?mod=task&amp;item=doing" id="task_ntc" class="new">进行中的任务</a><?php } if(($_G['group']['allowmanagearticle'] || $_G['group']['allowpostarticle'] || $_G['group']['allowdiy'] || getstatus($_G['member']['allowadmincp'], 4) || getstatus($_G['member']['allowadmincp'], 6) || getstatus($_G['member']['allowadmincp'], 2) || getstatus($_G['member']['allowadmincp'], 3))) { ?>
<span class="pipe">|</span><a href="portal.php?mod=portalcp"><?php if($_G['setting']['portalstatus'] ) { ?>门户管理<?php } else { ?>模块管理<?php } ?></a>
<?php } if($_G['uid'] && $_G['group']['radminid'] > 1) { ?>
<span class="pipe">|</span><a href="forum.php?mod=modcp&amp;fid=<?php echo $_G['fid'];?>" target="_blank"><?php echo $_G['setting']['navs']['2']['navname'];?>管理</a>
<?php } if($_G['uid'] && $_G['adminid'] == 1 && $_G['setting']['cloud_status']) { ?>
<span class="pipe">|</span><a href="admin.php?frames=yes&amp;action=cloud&amp;operation=applist" target="_blank">云平台</a>
<?php } if($_G['uid'] && getstatus($_G['member']['allowadmincp'], 1)) { ?>
<span class="pipe">|</span><a href="admin.php" target="_blank">管理中心</a>
<?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra2'])) echo $_G['setting']['pluginhooks']['global_usernav_extra2'];?>
<span class="pipe">|</span><a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>">退出</a>
</p>
<p>
<?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra3'])) echo $_G['setting']['pluginhooks']['global_usernav_extra3'];?><?php $upgradecredit = $_G['uid'] && $_G['group']['grouptype'] == 'member' && $_G['group']['groupcreditslower'] != 999999999 ? $_G['group']['groupcreditslower'] - $_G['member']['credits'] : false;?><a href="home.php?mod=spacecp&amp;ac=credit&amp;showcredit=1" id="extcreditmenu"<?php if(!$_G['setting']['bbclosed']) { ?> onmouseover="delayShow(this, showCreditmenu);" class="showmenu"<?php } ?>>积分: <?php echo $_G['member']['credits'];?></a>
<span class="pipe">|</span>用户组: <a href="home.php?mod=spacecp&amp;ac=usergroup"<?php if($upgradecredit !== 'false') { ?> id="g_upmine" class="xi2" onmouseover="delayShow(this, showUpgradeinfo)"<?php } ?>><?php echo $_G['group']['grouptitle'];?></a>
</p>
</div>
<?php } elseif(!empty($_G['cookie']['loginuser'])) { ?>
<p>
<strong><a id="loginuser" class="noborder"><?php echo dhtmlspecialchars($_G['cookie']['loginuser']); ?></a></strong>
<span class="pipe">|</span><a href="member.php?mod=logging&amp;action=login" onclick="showWindow('login', this.href)">激活</a>
<span class="pipe">|</span><a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>">退出</a>
</p>
<?php } elseif(!$_G['connectguest']) { ?><?php $_G['connect']['referer'] = !$_G['inajax'] && CURSCRIPT != 'member' ? $_G['basefilename'].($_SERVER['QUERY_STRING'] ? '?'.$_SERVER['QUERY_STRING'] : '') : dreferer();$_G['connect']['login_url'] = $_G['siteurl'].'connect.php?mod=login&op=init&referer='.urlencode($_G['connect']['referer'] ? $_G['connect']['referer'] : 'index.php');?><div id="account">
<ul>
<li class="qq"><a href="<?php echo $_G['connect']['login_url'];?>&statfrom=login_simple">用QQ登录</a></li>
<li class="login-icon purple-btn"><a href="member.php?mod=logging&amp;action=login" onclick="showWindow('login', this.href);hideWindow('register');">登录</a></li>
<li class="register-icon"><a href="member.php?mod=<?php echo $_G['setting']['regname'];?>"><?php echo $_G['setting']['reglinkname'];?></a></li>
</ul>
</div>
<?php } else { ?>
<div id="um">
<div class="avt y"><?php echo avatar(0,small);?></div>
<p>
<strong class="vwmy qq"><?php echo $_G['member']['username'];?></strong>
<?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra1'])) echo $_G['setting']['pluginhooks']['global_usernav_extra1'];?>
<span class="pipe">|</span><a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>">退出</a>
</p>
<p>
<a href="home.php?mod=spacecp&amp;ac=credit&amp;showcredit=1">积分: 0</a>
<span class="pipe">|</span>用户组: <?php echo $_G['group']['grouptitle'];?>
</p>
</div>
<?php } ?>
<div id="<?php if($_G['uid']) { ?>board-stats<?php } else { ?>board-stats2<?php } ?>">
<?php if($_G['basescript'] == 'forum' && CURMODULE == 'index') { ?>
!index_today!&nbsp;<span><?php echo $todayposts;?></span>－!index_yesterday!&nbsp;<span><?php echo $postdata['0'];?></span>－!index_posts!&nbsp;<span><?php echo $posts;?></span>－!index_members!&nbsp;<span><?php echo $_G['cache']['userstats']['totalmembers'];?></span><?php if($_G['cache']['userstats']['newsetuser']) { ?>－!welcome_new_members!&nbsp;<span><a href="home.php?mod=space&amp;username=<?php echo rawurlencode($_G['cache']['userstats']['newsetuser']); ?>" target="_blank" class="xi2"><?php echo $_G['cache']['userstats']['newsetuser'];?></a></span><?php } } else { ?><?php $dfsj_users = DB::result_first("SELECT count(*) FROM ".DB::table('common_member'));$onlinenum = DB::result_first("SELECT count(*) FROM ".DB::table('common_session'));$todaypost = DB::result_first("SELECT sum(todayposts) FROM ".DB::table('forum_forum')." WHERE status=1");?>今日&nbsp;<span><?php echo $todaypost;?></span>－会员&nbsp;<span><?php echo $dfsj_users;?></span>－在线&nbsp;<span><?php echo $onlinenum;?></span>
<?php } ?>
</div>
</div>

<div id="nv">
<a href="javascript:;" id="qmenu" onmouseover="showMenu({'ctrlid':'qmenu','pos':'34!','ctrlclass':'a','duration':2});">快捷导航</a>
<ul><?php if(is_array($_G['setting']['navs'])) foreach($_G['setting']['navs'] as $nav) { if($nav['available'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1))) { ?><li <?php if($mnid == $nav['navid']) { ?>class="a" <?php } ?><?php echo $nav['nav'];?>></li><?php } } ?>
</ul>
<?php if(!empty($_G['setting']['pluginhooks']['global_nav_extra'])) echo $_G['setting']['pluginhooks']['global_nav_extra'];?>
</div>
<?php if(!empty($_G['setting']['plugins']['jsmenu'])) { ?>
<ul class="p_pop h_pop" id="plugin_menu" style="display: none"><?php if(is_array($_G['setting']['plugins']['jsmenu'])) foreach($_G['setting']['plugins']['jsmenu'] as $module) { ?> <?php if(!$module['adminid'] || ($module['adminid'] && $_G['adminid'] > 0 && $module['adminid'] >= $_G['adminid'])) { ?>
 <li><?php echo $module['url'];?></li>
 <?php } } ?>
</ul>
<?php } ?>
<?php echo $_G['setting']['menunavs'];?>
<div id="mu" class="cl">
<?php if($_G['setting']['subnavs']) { if(is_array($_G['setting']['subnavs'])) foreach($_G['setting']['subnavs'] as $navid => $subnav) { if($_G['setting']['navsubhover'] || $mnid == $navid) { ?>
<ul class="cl <?php if($mnid == $navid) { ?>current<?php } ?>" id="snav_<?php echo $navid;?>" style="display:<?php if($mnid != $navid) { ?>none<?php } ?>">
<?php echo $subnav;?>
</ul>
<?php } } } ?>
</div><?php echo adshow("subnavbanner/a_mu");?><div id="userbar" class="cl">
<div id="quicknav">
<ul>
<li><a target="_blank" title="Facebook" href="#" class="social_icon facebook"></a></li>
<li><a target="_blank" title="Twitter" href="#" class="social_icon twitter"></a></li>
<li><a target="_blank" title="Google+" href="#" class="social_icon googleplus"></a></li>
<li><a target="_blank" title="RSS" href="#" class="social_icon rss"></a></li>
<li><a href="http://www.dfbar.net">巅峰设计</a></li>
</ul>
</div><?php if($_G['setting']['search']) { ?><?php $slist = array();?><?php if($_G['fid'] && $_G['forum']['status'] != 3 && $mod != 'group') { ?><?php
$slist[forumfid] = <<<EOF
<li><a href="javascript:;" rel="curforum" fid="{$_G['fid']}" >本版</a></li>
EOF;
?><?php } if($_G['setting']['portalstatus'] && $_G['setting']['search']['portal']['status'] && ($_G['group']['allowsearch'] & 1 || $_G['adminid'] == 1)) { ?><?php
$slist[portal] = <<<EOF
<li><a href="javascript:;" rel="article">文章</a></li>
EOF;
?><?php } if($_G['setting']['search']['forum']['status'] && ($_G['group']['allowsearch'] & 2 || $_G['adminid'] == 1)) { ?><?php
$slist[forum] = <<<EOF
<li><a href="javascript:;" rel="forum" class="curtype">帖子</a></li>
EOF;
?><?php } if(helper_access::check_module('blog') && $_G['setting']['search']['blog']['status'] && ($_G['group']['allowsearch'] & 4 || $_G['adminid'] == 1)) { ?><?php
$slist[blog] = <<<EOF
<li><a href="javascript:;" rel="blog">日志</a></li>
EOF;
?><?php } if(helper_access::check_module('album') && $_G['setting']['search']['album']['status'] && ($_G['group']['allowsearch'] & 8 || $_G['adminid'] == 1)) { ?><?php
$slist[album] = <<<EOF
<li><a href="javascript:;" rel="album">相册</a></li>
EOF;
?><?php } if($_G['setting']['groupstatus'] && $_G['setting']['search']['group']['status'] && ($_G['group']['allowsearch'] & 16 || $_G['adminid'] == 1)) { ?><?php
$slist[group] = <<<EOF
<li><a href="javascript:;" rel="group">{$_G['setting']['navs']['3']['navname']}</a></li>
EOF;
?><?php } ?><?php
$slist[user] = <<<EOF
<li><a href="javascript:;" rel="user">用户</a></li>
EOF;
?>
<?php } if($_G['setting']['search'] && $slist) { ?>
<div id="dfsj_sc" class="cl">
<form id="dfsj_sc_form" method="<?php if($_G['fid'] && !empty($searchparams['url'])) { ?>get<?php } else { ?>post<?php } ?>" autocomplete="off" onsubmit="searchFocus($('dfsj_sc_txt'))" action="<?php if($_G['fid'] && !empty($searchparams['url'])) { ?><?php echo $searchparams['url'];?><?php } else { ?>search.php?searchsubmit=yes<?php } ?>" target="_blank">
<input type="hidden" name="mod" id="dfsj_sc_mod" value="search" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="srchtype" value="title" />
<input type="hidden" name="srhfid" value="<?php echo $_G['fid'];?>" />
<input type="hidden" name="srhlocality" value="<?php echo $_G['basescript'];?>::<?php echo CURMODULE;?>" />
<?php if(!empty($searchparams['params'])) { if(is_array($searchparams['params'])) foreach($searchparams['params'] as $key => $value) { ?><?php $srchotquery .= '&' . $key . '=' . rawurlencode($value);?><input type="hidden" name="<?php echo $key;?>" value="<?php echo $value;?>" />
<?php } ?>
<input type="hidden" name="source" value="discuz" />
<input type="hidden" name="fId" id="srchFId" value="<?php echo $_G['fid'];?>" />
<input type="hidden" name="q" id="cloudsearchquery" value="" />

<style>
#scbar { overflow: visible; position: relative; }
#sg{ background: #FFF; width:456px; border: 1px solid #B2C7DA; }
.scbar_narrow #sg { width: 316px; }
#sg li { padding:0 8px; line-height:30px; font-size:14px; }
#sg li span { color:#999; }
.sml { background:#FFF; cursor:default; }
.smo { background:#E5EDF2; cursor:default; }
            </style>
            <div style="display: none; position: absolute; top:37px; left:44px;" id="sg">
                <div id="st_box" cellpadding="2" cellspacing="0"></div>
            </div>
<?php } ?>
<table cellspacing="0" cellpadding="0">
<tr>
<td class="dfsj_sc_txt_td"><input type="text" name="srchtxt" id="dfsj_sc_txt" class="dfsj_sc-input" value="请输入搜索内容" autocomplete="off" x-webkit-speech speech /></td>
<td class="dfsj_sc_type_td"><a href="javascript:;" id="dfsj_sc_type" class="showmenu xg1 xs2" onclick="showMenu(this.id)" hidefocus="true">搜索</a></td>
<td class="dfsj_sc_btn_td"><input type="submit" value="" name="submit" class="dfsj_sc-button"></td>
</tr>
</table>
</form>
</div>
<ul id="dfsj_sc_type_menu" class="p_pop" style="display: none;"><?php echo implode('', $slist);; ?></ul>
<script type="text/javascript">
initSearchmenu('dfsj_sc', '<?php echo $searchparams['url'];?>');
</script>
<?php } ?></div>
</div>
</div>

<?php if(!empty($_G['setting']['pluginhooks']['global_header'])) echo $_G['setting']['pluginhooks']['global_header'];?>
<?php } ?>

<div id="wp" class="wp"><style> 
.datalist { zoom: 1; }
.datalist table { margin-bottom: 30px; width: 100%; border: 1px solid #E6E7E1; }
.datalist th, .datalist td { padding: 4px 5px; border: 1px solid #E6E7E1; font-weight: 400; }
.datalist th img { vertical-align: top; }
.datalist table .stat_subject { border-right: none; }
.datalist table .stat_num { padding-right: 15px; text-align: right; border-left: none; }
.datalist .datatable { margin-bottom: 10px; }
.datalist .datatable, .datalist .datatable th, .datalist .datatable td { border-width: 1px 0; text-align: left; }
.datalist .fixtable { table-layout: fixed; }
.colplural, .colplural th, .colplural td, th.highlight, td.highlight { background-color: #F5F5F5; }
.qdsmile{padding:3px;margin:auto;float:left;list-style:none;float:left}
.qdsmile li{float: left;padding:5px .4em;border:2px #fff solid;}
.qdsmile li img{margin-bottom:5px;}
.qdsmile li:hover{cursor:pointer;background:#F7FAFF;border:2px dashed #D1D8D8;}
</style>
<script type="text/javascript">
function levelts(msg, script) {
    script = !script ? '' : script;
    var c = '<div class="f_c"><div class="c floatwrap" style="height: 370px">' + msg + '</div></div>';
var t = '签到等级说明' ;
showDialog(c, 'info', t);
}
function Icon_selected(sId) {
    var oImg = document.getElementsByTagName('li');
    for (var i = 0; i < oImg.length; i++) {
      if (oImg[i].id == sId) {
var selectname = document.getElementById(oImg[i].id + "_s");
        selectname.checked = true;
        oImg[i].style. background = '#F7FAFF';
oImg[i].style. border = '2px dashed #D1D8D8';
      } else {
        oImg[i].style. background = '';
oImg[i].style. border = '';
      }
    }
}
</script>
<div id="pt" class="bm cl">
<div class="z">
<a href="./" class="nvhm" title="首页"><?php echo $_G['setting']['bbname'];?></a><em>&rsaquo;</em><a href="plugin.php?id=dsu_paulsign:sign">每日签到</a>
</div> 
</div>
<div id="ct" class="ct2 wp cl">
<div class="mn">
<?php if($qiandaodb['time'] < $tdtime && (!$var['timeopen'] || ($var['timeopen'] && ($htime >= $var['stime'] && $htime <= $var['ftime'])))) { ?>
<h3>今天签到了吗？请选择您此刻的<font color=red>心情图片</font>并写下<font color=blue>今天最想说的话</font>！<?php if($var['ftopen']) { ?><br><font color="red">[温馨提示:今日未签到会员将自动跳转到此处,请签到后再返回论坛进行各项操作.]</font><?php } ?></h3>
<div class="t">
<?php if($var['qdajax']) { ?>
<form id="qiandao" method="post" action="plugin.php?id=dsu_paulsign:sign&amp;operation=qiandao&amp;infloat=1" onkeydown="if(event.keyCode==13){showWindow('qwindow', 'qiandao', 'post', '0');return false}">
<?php } else { ?>
<form name="qiandao" method="post" action="plugin.php?id=dsu_paulsign:sign&amp;operation=qiandao&amp;infloat=0&amp;inajax=0">
<?php } ?>
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>">
<table width="100%" cellpadding="0" cellspacing="0" align="center">
<tr>
<td class="tr3 tac">
<ul class="qdsmile"><?php if(is_array($emots)) foreach($emots as $key => $value) { ?><input id="<?php echo $key;?>_s" type="radio" name="qdxq" value="<?php echo $key;?>" style="display:none"><li id="<?php echo $key;?>" onclick="Icon_selected(this.id)" onmouseover="showMenu({'ctrlid':this.id, 'pos':'21'});"><center><img src="source/plugin/dsu_paulsign/img/emot/<?php echo $key;?>.gif" /><br /></center></li>
<?php } ?>
</ul>
<div style="padding:20px 0;"><?php if($var['qdajax']) { ?><a href="javascript:;" onclick="showWindow('qwindow', 'qiandao', 'post', '0');return false"><img src="source/plugin/dsu_paulsign/img/qdtb.gif" width="100px" height="35px" /></a><?php } else { ?><input type="submit" class="btn" value="" style="border:none;background:url(source/plugin/dsu_paulsign/img/qdtb.gif) left top no-repeat;width:100px; height:35px;"><?php } ?></div>
</td>
</tr><?php if(is_array($emots)) foreach($emots as $key => $value) { ?><div id="<?php echo $key;?>_menu" class="tip tip_4" style="display:none;width:50px;margin:0px 0px 0px 30px;"><div class="tip_horn"></div><div class="tip_c"><center><?php echo $value['name'];?></center></div></div>
<?php } if(!$var['sayclose']) { ?>
<table summary="Qd" cellspacing="0" cellpadding="0" class="tfm">
<tr<?php if(!$var['ksopen'] && !$var['todaysayxt']) { ?> style="display:none;"<?php } ?>>
<th>今日最想说模式</th>
<td>
<label><input type="radio" name="qdmode" value="1" checked="checked" onclick="if(checked == true){document.getElementById('mode1').style.display='';document.getElementById('mode2').style.display='none';}">&nbsp;自己填写</label>&nbsp;&nbsp;
<?php if($var['ksopen']) { ?><label><input type="radio" name="qdmode" value="2" onclick="if(checked == true){document.getElementById('mode1').style.display='none';document.getElementById('mode2').style.display='';}">&nbsp;快速选择</label>&nbsp;&nbsp;<?php } if($var['todaysayxt']) { ?><label><input type="radio" name="qdmode" value="3" onclick="if(checked){document.getElementById('mode1').style.display='none';document.getElementById('mode2').style.display='none';}">&nbsp;不想填写</label><?php } ?>
</td>
</tr>
<tr id="mode1" style="display:;">
<th><label for="todaysay">我今天最想说</label></th>
<td><input type="text" name="todaysay" id="todaysay" size="25" class="px" /></td>
<td>限制最少3个,最多50个中文字数</td>
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
</form>
</div>
<?php } else { ?>
<h1 class="mt">您今天已经签到过了或者签到时间还未开始</h1>
<?php if($qiandaodb) { ?>
<p><font color="#FF0000"><b><?php echo $_G['username'];?></b></font> , 您累计已签到: <b><?php echo $qiandaodb['days'];?></b> 天</p>
<p>您本月已累计签到:<b><?php echo $qiandaodb['mdays'];?></b> 天</p>
<p>您上次签到时间:<font color="#ff00cc"><?php echo $qtime;?></font> </p>
<p>您目前获得的总奖励为:<?php echo $_G['setting']['extcredits'][$var['nrcredit']]['title'];?> <font color="#ff00cc"><b><?php echo $qiandaodb['reward'];?></b></font> <?php echo $_G['setting']['extcredits'][$var['nrcredit']]['unit'];?> , 上次获得的奖励为:<?php echo $_G['setting']['extcredits'][$var['nrcredit']]['title'];?> <font color="#ff00cc"><b><?php echo $qiandaodb['lastreward'];?></b></font> <?php echo $_G['setting']['extcredits'][$var['nrcredit']]['unit'];?>.</p>
<p><?php echo $q['level'];?></p>
<?php } else { ?>
<p>您从未签到过，赶快签到吧!</p>
<?php } } ?>
<h1 class="mt">签到排行榜</h1>
<ul class="tb cl">
<li <?php if($_GET['operation'] == '') { ?>class="a"<?php } ?>><a href="plugin.php?id=dsu_paulsign:sign">按上次签到时间排列</a></li>
<li <?php if($_GET['operation'] == 'zong' || $_GET['operation'] == 'month') { ?>class="a"<?php } ?> id="tspl" onmouseover="showMenu(this.id)"><a href="plugin.php?id=dsu_paulsign:sign&amp;operation=zong" hidefocus="true" class="dropmenu">按天数排列</a></li>
<?php if($var['plopen']) { ?><li <?php if($_GET['operation'] == 'zdyhz') { ?>class="a"<?php } ?> id="zdyhz" onmouseover="showMenu(this.id)"><a href="plugin.php?id=dsu_paulsign:sign&amp;operation=zdyhz" hidefocus="true" class="dropmenu"><?php echo $var['xxkxsz'];?></a></li><?php } if($var['rewardlistopen']) { ?><li <?php if($_GET['operation'] == 'rewardlist') { ?>class="a"<?php } ?>><a href="plugin.php?id=dsu_paulsign:sign&amp;operation=rewardlist">总奖励排行榜</a></li><?php } ?>
<li><a href="#" onclick="levelts('<table class=list cellspacing=0 cellpadding=0><thead><tr width=50%><td>签到等级</td><td class=time width=50%>签到天数要求</td></tr></thead><tr><td>[LV.1]<?php echo $lv1name;?></td><td class=time>≥1 天</td></tr><tr><td>[LV.2]<?php echo $lv2name;?></td><td class=time>≥3 天</td></tr><tr><td>[LV.3]<?php echo $lv3name;?></td><td class=time>≥7 天</td></tr><tr><td>[LV.4]<?php echo $lv4name;?></td><td class=time>≥15 天</td></tr><tr><td>[LV.5]<?php echo $lv5name;?></td><td class=time>≥30 天</td></tr><tr><td>[LV.6]<?php echo $lv6name;?></td><td class=time>≥60 天</td></tr><tr><td>[LV.7]<?php echo $lv7name;?></td><td class=time>≥120 天</td></tr><tr><td>[LV.8]<?php echo $lv8name;?></td><td class=time>≥240 天</td></tr><tr><td>[LV.9]<?php echo $lv9name;?></td><td class=time>≥365 天</td></tr><tr><td>[LV.10]<?php echo $lv10name;?></td><td class=time>≥750 天</td></tr><tr><td>[LV.Master]<?php echo $lvmastername;?></td><td class=time>≥1500 天</td></tr></table>', this.href);return false;">签到等级说明</a></li>
</ul>
<ul class="p_pop h_pop" id="tspl_menu" style="display: none">
<li><a href="plugin.php?id=dsu_paulsign:sign&amp;operation=zong">按总天数排列</a></li>
<li><a href="plugin.php?id=dsu_paulsign:sign&amp;operation=month">按月天数排列</a></li>
</ul>
<?php if($var['plopen']) { ?>
<ul class="p_pop h_pop" id="zdyhz_menu" style="display: none"><?php if(is_array($mccs)) foreach($mccs as $mcc) { ?><li><a href="plugin.php?id=dsu_paulsign:sign&amp;operation=zdyhz&amp;qdgroupid=<?php echo $mcc['groupid'];?>"><?php echo $mcc['grouptitle'];?></a></li>
<?php } ?>
<li><a href="plugin.php?id=dsu_paulsign:sign&amp;operation=zdyhz">显示全部</a></li>
</ul>
<?php } ?>
<br>
<?php if($_GET['operation'] == '' || $_GET['operation'] == 'month' || $_GET['operation'] == 'zong'|| ($_GET['operation'] == 'zdyhz' && $var['plopen'])) { ?>
<div class="datalist">
<table cellspacing="0" cellpadding="0" summary="phb" class="datatable">
<tr class="colplural">
<td width="1%"></td>
<td width="15%">用户名</td>
<td width="10%">总天数</td>
<td width="10%">月天数</td>
<td width="20%">上次签到时间</td>
<td width="15%">目前等级</td>
<td width="15%"><nobr>上次奖励[<?php echo $_G['setting']['extcredits'][$var['nrcredit']]['title'];?>]</nobr></td>
<td width="13%">状态</td>
</tr>
<?php if($mrcs) { if(is_array($mrcs)) foreach($mrcs as $mrc) { ?><tr>
<td></td>
<td><a href="home.php?mod=space&amp;uid=<?php echo $mrc['uid'];?>" target="_blank"><?php echo $mrc['username'];?></a></td>
<td><?php echo $mrc['days'];?></td>
<td><?php echo $mrc['mdays'];?></td>
<td><?php echo $mrc['time'];?></td>
<td><?php echo $mrc['level'];?></td>
<td><?php echo $mrc['lastreward'];?> <?php echo $_G['setting']['extcredits'][$var['nrcredit']]['unit'];?></td>
<td><?php echo $mrc['if'];?></td>
</tr>
<?php if(!$_G['cache']['plugin']['dsu_paulsign']['sayclose']) { ?>
<tr class="colplural">
<td align="left" colspan="9">
我今天最想说: <img src="source/plugin/dsu_paulsign/img/emot/<?php echo $mrc['qdxq'];?>.gif" /> <?php echo $mrc['todaysay'];?> <?php if($_G['uid'] && $_G['adminid'] == 1) { ?><a href="plugin.php?id=dsu_paulsign:sign&amp;operation=ban&amp;banuid=<?php echo $mrc['uid'];?>&amp;formhash=<?php echo FORMHASH;?>"  title="点击将屏蔽该今日最想说内容"><font color=red>[屏蔽]</font></a><?php } ?>
</td>
</tr>
<?php } } if(!empty($multipage)) { ?><tr><td colspan="8"><div class="pages_btns"><?php echo $multipage;?></div></td></tr><?php } } else { ?>
<tr><td colspan="9">目前没有人签到.</td></tr>
<?php } ?>
</table>
</div>
<?php } elseif($_GET['operation'] == 'rewardlist' && $var['rewardlistopen']) { ?>
<div class="datalist">
<table cellspacing="0" cellpadding="0" summary="phb" class="datatable">
<tr class="colplural">
<th width="1%"></th>
<th width="20%">用户名</th>
<th width="15%">总天数</th>
<th width="15%">月天数</th>
<th width="19%">目前等级</th>
<th width="15%"><nobr>总奖励[<?php echo $_G['setting']['extcredits'][$var['nrcredit']]['title'];?>]</nobr></th>
<th width="15%"><nobr>上次奖励[<?php echo $_G['setting']['extcredits'][$var['nrcredit']]['title'];?>]</nobr></th>
</tr>
<?php if($mrcs) { if(is_array($mrcs)) foreach($mrcs as $mrc) { ?><tr>
<td></td>
<td><a href="home.php?mod=space&amp;uid=<?php echo $mrc['uid'];?>" target="_blank"><?php echo $mrc['username'];?></a></td>
<td><?php echo $mrc['days'];?></td>
<td><?php echo $mrc['mdays'];?></td>
<td><?php echo $mrc['level'];?></td>
<td><?php echo $mrc['reward'];?> <?php echo $_G['setting']['extcredits'][$var['nrcredit']]['unit'];?></td>
<td><?php echo $mrc['lastreward'];?> <?php echo $_G['setting']['extcredits'][$var['nrcredit']]['unit'];?></td>
</tr>
<?php } } else { ?>
<tr><td colspan="7">目前没有人签到.</td></tr>
<?php } ?>
</table>
</div>
<?php } if($qiandaodb['time'] < $tdtime) { ?>
<div id="qdmsgt_c" class="umh">
<h3 onclick="toggle_collapse('qdmsgt', 1, 1);">签到服务台</h3>
<div class="umh_act">
<p class="umh_cb" onclick="toggle_collapse('qdmsgt', 1, 1);">[ 展开 ]</p>
</div>
</div>
<div class="um" id="qdmsgt" style="">
<?php if($qiandaodb) { ?>
<p><font color="#FF0000"><b><?php echo $_G['username'];?></b></font> , 您累计已签到: <b><?php echo $qiandaodb['days'];?></b> 天<?php if($var['lastedop']) { ?> , 您已经连续签到: <b><?php echo $qiandaodb['lasted'];?></b> 天<?php } ?></p>
<p>您本月已累计签到:<b><?php echo $qiandaodb['mdays'];?></b> 天</p>
<p>【<?php echo $q['if'];?>】</p>
<p>您上次签到时间:<font color="#ff00cc"><?php echo $qtime;?></font> </p>
<p>您目前获得的总奖励为:<?php echo $_G['setting']['extcredits'][$var['nrcredit']]['title'];?> <font color="#ff00cc"><b><?php echo $qiandaodb['reward'];?></b></font> <?php echo $_G['setting']['extcredits'][$var['nrcredit']]['unit'];?> , 上次获得的奖励为:<?php echo $_G['setting']['extcredits'][$var['nrcredit']]['title'];?> <font color="#ff00cc"><b><?php echo $qiandaodb['lastreward'];?></b></font> <?php echo $_G['setting']['extcredits'][$var['nrcredit']]['unit'];?>.</p>
<p><?php echo $q['level'];?></p>
<?php } else { ?>
<p>您从未签到过，赶快签到吧!</p>
<?php } ?>
</div>
<?php } ?>
</div>
<div class="sd">
<div class="bm">
<div class="bm_h cl">
<h2>签到中心公告</h2>
</div>
<div class="bm_c">
<ul class="xl">
<li><?php echo $var['notice'];?></li>
</ul>
</div>
</div>
<?php if($var['timeopen']) { ?>
<div class="bm">
<div class="bm_h cl">
<h2>温馨小提示</h2>
</div>
<div class="bm_c">
<ul class="xl">
<li>本社区规定的签到时间是自<?php echo $var['stime'];?>:00到<?php echo $var['ftime'];?>:59时止，请您自己把握好时间来签到，避免超过规定时间</li>
</ul>
</div>
</div>
<?php } if($var['tjopen']) { ?>
<div class="bm">
<div class="bm_h cl">
<h2>今日心情TOP5</h2>
</div>
<div class="bm_c">
<ul class="xl"><?php if(is_array($emottops)) foreach($emottops as $emottop) { ?><li><span class="y xi2 xg1"><?php echo $emottop['count'];?> 人</span><?php echo $emottop['name'];?></li>
<?php } ?>
</ul>
</div>
</div>
<div class="bm">
<div class="bm_h cl">
<h2>签到统计</h2>
</div>
<div class="bm_c">
<ul class="xl">
<li><span class="y xi2 xg1"><?php echo $stats['todayq'];?> 人</span>今日已签到</li>
<li><span class="y xi2 xg1"><?php echo $stats['yesterdayq'];?> 人</span>昨日共签到</li>
<li><span class="y xi2 xg1"><?php echo $stats['highestq'];?> 人</span>历史最高数</li>
</ul>
</div>
</div>
<?php } ?>
<div class="bm">
<div class="bm_h cl">
<h2>版本信息</h2>
</div>
<div class="bm_c">
<ul class="xl">
<li><a href="<?php echo $signadd;?>" title="【DSU】每日签到 作者: shy9000" target="_blank"><span style="font: bold 14px Arial; color: #fbb040;">【DSU】</span><span style="font: bold 15px Verdana; color: #f15a29;">每日签到</span></a><span style="font: normal 9px Verdana; display:block;"> <?php echo $signBuild;?></span></li>
</ul>
</div>
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
