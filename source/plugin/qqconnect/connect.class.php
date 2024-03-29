<?php

/**
 *		[Discuz! X] (C)2001-2099 Comsenz Inc.
 *		This is NOT a freeware, use is subject to license terms
 *
 *		$Id: connect.class.php 31960 2012-10-26 06:27:50Z monkey $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
class plugin_qqconnect_base {

	// 重试周期
	public $retryInterval = 60;
	// 重试最大次数
	public $retryMax = 5;
	// 可以重试的时间
	public $retryAvaiableTime = 1800;

	function init() {
		global $_G;
		include_once template('qqconnect:module');
		if(!$_G['setting']['connect']['allow'] || $_G['setting']['bbclosed']) {
			return;
		}
		$this->allow = true;
	}

	function common_base() {
		global $_G;

		if(!isset($_G['connect'])) {
			$_G['connect']['url'] = 'http://connect.discuz.qq.com';
			$_G['connect']['api_url'] = 'http://api.discuz.qq.com';
			$_G['connect']['avatar_url'] = 'http://avatar.connect.discuz.qq.com';

			// QZone公共分享页面URL
			$_G['connect']['qzone_public_share_url'] = 'http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey';
			$_G['connect']['referer'] = !$_G['inajax'] && CURSCRIPT != 'member' ? $_G['basefilename'].($_SERVER['QUERY_STRING'] ? '?'.$_SERVER['QUERY_STRING'] : '') : dreferer();
			// 微薄公共分享Appkey
			$_G['connect']['weibo_public_appkey'] = 'ce7fb946290e4109bdc9175108b6db3a';

			// 新版Connect登录本地代理页
			$_G['connect']['login_url'] = $_G['siteurl'].'connect.php?mod=login&op=init&referer='.urlencode($_G['connect']['referer'] ? $_G['connect']['referer'] : 'index.php');
			// 新版Connect本地Callback代理页
			$_G['connect']['callback_url'] = $_G['siteurl'].'connect.php?mod=login&op=callback';
			// 发feed js通知本地代理页
			$_G['connect']['discuz_new_feed_url'] = $_G['siteurl'].'connect.php?mod=feed&op=new&formhash=' . formhash();
			$_G['connect']['discuz_new_post_feed_url'] = $_G['siteurl'].'connect.php?mod=feed&op=new&action=post&formhash=' . formhash();
			// 发分享js通知本地代理页
			//$_G['connect']['discuz_new_share_url'] = $_G['siteurl'].'connect.php?mod=share&op=new';
			$_G['connect']['discuz_new_share_url'] = $_G['siteurl'].'home.php?mod=spacecp&ac=plugin&id=qqconnect:spacecp&pluginop=new';
			// 分享到微博后的回流处理地址
			$_G['connect']['discuz_sync_tthread_url'] = $_G['siteurl'].'home.php?mod=spacecp&ac=plugin&id=qqconnect:spacecp&pluginop=sync_tthread&formhash=' . formhash();
			// 更换QQ号登录本地代理页
			$_G['connect']['discuz_change_qq_url'] = $_G['siteurl'].'connect.php?mod=login&op=change';
			// QC授权项对应关系
			$_G['connect']['auth_fields'] = array(
				'is_user_info' => 1,
				'is_feed' => 2,
			);

			if($_G['uid']) {
				dsetcookie('connect_is_bind', $_G['member']['conisbind'], 31536000);
				if(!$_G['member']['conisbind'] && $_G['cookie']['connect_login']) {
					$_G['cookie']['connect_login'] = 0;
					dsetcookie('connect_login');
				}
			}

			// QQ互联游客更换用户名为QQ昵称
			if (!$_G['uid'] && $_G['connectguest']) {
				if ($_G['cookie']['connect_qq_nick']) {
					$_G['member']['username'] = $_G['cookie']['connect_qq_nick'];
				} else {
					$connectGuest = C::t('#qqconnect#common_connect_guest')->fetch($conopenid);
					if ($connectGuest['conqqnick']) {
						$_G['member']['username'] = $connectGuest['conqqnick'];
					}
				}
			}

			if($this->allow && !$_G['uid'] && !defined('IN_MOBILE')) {
				$_G['setting']['pluginhooks']['global_login_text'] = tpl_login_bar();
			}
		}
	}

}

class plugin_qqconnect extends plugin_qqconnect_base {

	var $allow = false;

	function plugin_qqconnect() {
		$this->init();
	}

	function common() {
		$this->common_base();
	}

	function discuzcode($param) {
		global $_G;
		if($param['caller'] == 'discuzcode') {
			$_G['discuzcodemessage'] = preg_replace('/\[wb=(.+?)\](.+?)\[\/wb\]/', '<a href="http://t.qq.com/\\1" target="_blank"><img src="\\2" /></a>', $_G['discuzcodemessage']);
		}
		if($param['caller'] == 'messagecutstr') {
			$_G['discuzcodemessage'] = preg_replace('/\[tthread=(.+?)\](.*?)\[\/tthread\]/', '', $_G['discuzcodemessage']);
		}
	}

	function avatar($param) {
		global $_G;
		if($this->allow) {
			if($_G['basescript'] == 'home' && CURMODULE == 'space' && (!$_GET['do'] || in_array($_GET['do'], array('profile', 'index')))) {
				$avataruid = $_GET['uid'];
			} elseif(CURMODULE == 'viewthread') {
				$avataruid = $_G['uid'];
			} else {
				return;
			}
			list($uid, $size, $returnsrc) = $param['param'];
			if($returnsrc || $size && $size != 'middle' || $uid != $avataruid) {
				return;
			}

			$connectUserInfo = array();
			if ($uid) {
				$connectUserInfo = C::t('#qqconnect#common_member_connect')->fetch($uid);
			}

			if ($connectUserInfo) {
				if($connectUserInfo['conisqqshow'] && $connectUserInfo['conopenid']) {
					$_G['hookavatar'] = $this->_qqshow_img($connectUserInfo['conopenid']);
				}
			}
		}
	}

	function global_login_extra() {
		if(!$this->allow) {
			return;
		}
		return tpl_global_login_extra();
	}

	function global_usernav_extra1() {
		global $_G;
		if(!$this->allow) {
			return;
		}
		if (!$_G['uid'] && !$_G['connectguest']) {
			return;
		}
		if(!$_G['member']['conisbind']) {
			return tpl_global_usernav_extra1();
		}
	}

	function global_footer() {
		global $_G;

		if(!$this->allow || !empty($_G['inshowmessage'])) {
			return;
		}

		// 页脚需要加载的js
		$loadJs = array();

		$connectService = Cloud::loadClass('Service_Connect');

		// 只有开启QQ互联并开启Q-share，且在看帖页可以划词分享到腾讯微博
		if(defined('CURSCRIPT') && CURSCRIPT == 'forum' && defined('CURMODULE') && CURMODULE == 'viewthread'
			&& $_G['setting']['connect']['allow'] && $_G['setting']['connect']['qshare_allow']) {

			$appkey = $_G['setting']['connect']['qshare_appkey'] ? $_G['setting']['connect']['qshare_appkey'] : $_G['connect']['weibo_public_appkey'];

			$qsharejsurl = $_G['siteurl'] . 'static/js/qshare.js';
			$sitename = isset($_G['setting']['bbname']) ? $_G['setting']['bbname'] : '';
			$loadJs['qsharejs'] = array('jsurl' => $qsharejsurl, 'appkey' => $appkey, 'sitename' => $sitename, 'func' => '$C');
			//移到 tpl中
			//$footerjs .= $connectService->connectLoadQshareJs($appkey);
		}

		if(!empty($_G['cookie']['connect_js_name'])) {
			if($_G['cookie']['connect_js_name'] == 'user_bind') {
				$params = array('openid' => $_G['cookie']['connect_uin']);
				$jsurl = $connectService->connectUserBindJs($params);
				$loadJs['feedjs'] = array('jsurl' => $jsurl);
			} elseif($_G['cookie']['connect_js_name'] == 'feed_resend') {
				$jsurl = $connectService->connectFeedResendJs();
				$loadJs['feedjs'] = array('jsurl' => $jsurl);
			} elseif($_G['cookie']['connect_js_name'] == 'guest_ptlogin') {
				$jsurl = $connectService->connectGuestPtloginJs();
				$loadJs['guestloginjs'] = array('jsurl' => $jsurl);
			}

			dsetcookie('connect_js_name');
			dsetcookie('connect_js_params');
		}

		//note 次数非0 且上次上报日期非今日
		loadcache('connect_login_report_date');
		if (dgmdate(TIMESTAMP, 'Y-m-d') != $_G['cache']['connect_login_report_date']) {
			$jsurl = $connectService->connectCookieLoginJs();
			$loadJs['cookieloginjs'] = array('jsurl' => $jsurl);
		}

		// cookie 登陆上报/统计
		if ($_G['member']['conisbind']) {
			$connectService->connectMergeMember();
			if($_G['member']['conuinsecret'] && ($_G['cookie']['connect_last_report_time'] != dgmdate(TIMESTAMP, 'Y-m-d'))) {
				$connectService->connectAddCookieLogins();
			}
		}

		// 回帖同步到微博
		if ($_G['cookie']['connect_sync_post']) {
			$params = array();
			list($params['thread_id'], $params['post_id']) = explode('|', $_G['cookie']['connect_sync_post']);
			$params['ts'] = TIMESTAMP;
			$params['sig'] = $connectService->connectGetSig($params, $connectService->connectGetSigKey());

			$utilService = Cloud::loadClass('Service_Util');
			$jsurl = $_G['connect']['discuz_new_post_feed_url'].'&'.$utilService->httpBuildQuery($params, '', '&');
			$loadJs['syncpostjs'] = array('jsurl' => $jsurl);
		}

		return tpl_global_footer($loadJs);
	}

	/*
	 * @brief _allowconnectfeed 允许推送到空间
	 *
	 * @returns
	 */
	function _allowconnectfeed() {
		if(!$this->allow) {
			return;
		}
		global $_G;
		return $_G['uid'] && $_G['setting']['connect']['allow'] && $_G['setting']['connect']['feed']['allow'] && ($_G['forum']['status'] == 3 && $_G['setting']['connect']['feed']['group'] || $_G['forum']['status'] != 3 && (!$_G['setting']['connect']['feed']['fids'] || in_array($_G['fid'], $_G['setting']['connect']['feed']['fids'])));
	}

	/*
	 * @brief _allowconnectt 允许推送到微博
	 *
	 * @returns
	 */
	function _allowconnectt() {
		if(!$this->allow) {
			return;
		}
		global $_G;
		return $_G['uid'] && $_G['setting']['connect']['allow'] && $_G['setting']['connect']['t']['allow'] && ($_G['forum']['status'] == 3 && $_G['setting']['connect']['t']['group'] || $_G['forum']['status'] != 3 && (!$_G['setting']['connect']['t']['fids'] || in_array($_G['fid'], $_G['setting']['connect']['t']['fids'])));
	}

	/*
	 * @brief _forumdisplay_fastpost_sync_method_output 快速发帖同步按钮
	 *
	 * @returns
	 */
	function _forumdisplay_fastpost_sync_method_output() {
		if(!$this->allow) {
			return;
		}
		global $_G;
		$allowconnectfeed = $this->_allowconnectfeed();
		$allowconnectt = $this->_allowconnectt();
		if($GLOBALS['fastpost'] && ($allowconnectfeed || $allowconnectt)) {
			$connectService = Cloud::loadClass('Service_Connect');
			$connectService->connectMergeMember();
			if ($_G['member']['is_feed']) {
				return tpl_sync_method($allowconnectfeed, $allowconnectt);
			}
		}
	}

	/*
	 * @brief _post_sync_method_output 发帖同步按钮
	 *
	 * @returns
	 */
	function _post_sync_method_output() {
		if(!$this->allow) {
			return;
		}
		global $_G;
		$allowconnectfeed = $this->_allowconnectfeed();
		$allowconnectt = $this->_allowconnectt();
		if(!$_G['inajax'] && ($allowconnectfeed || $allowconnectt) && ($_GET['action'] == 'newthread' || $_GET['action'] == 'edit' && $GLOBALS['isfirstpost'] && $GLOBALS['thread']['displayorder'] == -4)) {
			$connectService = Cloud::loadClass('Service_Connect');
			$connectService->connectMergeMember();
			if ($_G['member']['is_feed']) {
				return tpl_sync_method($allowconnectfeed, $allowconnectt);
			}
		}

		// 回帖显示同步到微博按钮
		if(!$_G['inajax'] && ($allowconnectfeed || $allowconnectt) && $_GET['action'] == 'reply') {
			$connectService = Cloud::loadClass('Service_Connect');
			$connectService->connectMergeMember();
			if ($_G['member']['is_feed']) {
				return tpl_sync_method(false, $allowconnectt);
			}
		}
	}

	/*
	 * @brief _post_infloat_btn_extra_output 浮动窗同步按钮
	 *
	 * @returns
	 */
	function _post_infloat_btn_extra_output() {
		if(!$this->allow) {
			return;
		}
		global $_G;
		$allowconnectfeed = $this->_allowconnectfeed();
		$allowconnectt = $this->_allowconnectt();
		if($_G['inajax'] && ($allowconnectfeed || $allowconnectt) && $_GET['action'] == 'newthread') {
			$connectService = Cloud::loadClass('Service_Connect');
			$connectService->connectMergeMember();
			if ($_G['member']['is_feed']) {
				return tpl_infloat_sync_method($allowconnectfeed, $allowconnectt, ' z');
			}
		}

		// 回帖显示同步到微博按钮
		if($_G['inajax'] && ($allowconnectfeed || $allowconnectt) && $_GET['action'] == 'reply') {
			$connectService = Cloud::loadClass('Service_Connect');
			$connectService->connectMergeMember();
			if ($_G['member']['is_feed']) {
				return tpl_infloat_sync_method(false, $allowconnectt, ' z');
			}
		}
	}

	/*
	 * @brief _post_feedlog_message 发帖推送到空间和微博
	 *
	 * @param $param
	 * (位表示 1:需要同步到空间，2:已输出js同步空间
	 * 3:需要同步到微博，4:已输出js同步微博)
	 * @returns
	 */
	function _post_feedlog_message($param) {
		if(!$this->allow) {
			return;
		}
		global $_G;
		// if(empty($_GET['connect_publish_feed']) || $_GET['action'] == 'reply' || substr($param['param'][0], -8) != '_succeed' || $_GET['action'] == 'edit' && !$GLOBALS['isfirstpost'] || !$this->_allowconnectfeed()) {
		$condition1 = substr($param['param'][0], -8) != '_succeed';
		$condition2 = $_GET['action'] == 'edit' && !$GLOBALS['isfirstpost'];
		$condition3 = !$this->_allowconnectfeed() && !$this->_allowconnectt();
		$condition4 = empty($_GET['connect_publish_feed']) && empty($_GET['connect_publish_t']);
		if (empty($_GET['connect_publish_feed']) && $_GET['action'] != 'reply') {
			dsetcookie('connect_not_sync_feed', 1);
		} else {
			dsetcookie('connect_not_sync_feed', 0);
		}
		if (empty($_GET['connect_publish_t'])) {
			dsetcookie('connect_not_sync_t', 1);
		} else {
			dsetcookie('connect_not_sync_t', 0);
		}
		if ($condition1 || $condition2 || $condition3 || $condition4) {
			return false;
		}

		if ($_GET['action'] == 'reply') {
			// 回帖
			$tid = $param['param'][2]['tid'];
			$pid = $param['param'][2]['pid'];

			// todo 会不会有漏发的情况，多次回复，cookie会被覆盖掉
			if ($_GET['connect_publish_t']) {
				dsetcookie('connect_sync_post', $tid .'|'. $pid);

				$data = array(
					'pid' => $pid,
					'uid' => $_G['uid'],
					'lastpublished' => 0,
					'dateline' => $_G['timestamp'],
					'status' => 0,
				);
				C::t('#qqconnect#connect_postfeedlog')->insert($data, 0, 1);
			}
		} else {
			// 发帖
			$tid = $param['param'][2]['tid'];

			$thread = C::t('forum_thread')->fetch($tid);
			if ($_GET['connect_publish_feed']) {
				$thread['status'] = setstatus(7, 1, $thread['status']);
			}
			if ($_GET['connect_publish_t']) {
				$thread['status'] = setstatus(8, 1, $thread['status']);
			}
			// $newstatus = 0;
			// if ($_GET['connect_publish_feed'] && $this->_allowconnectfeed()) {
				// $newstatus = setstatus(1, 1, $newstatus);
			// }

			// if ($_GET['connect_publish_t'] && $this->_allowconnectt()) {
				// $newstatus = setstatus(3, 1, $newstatus);
			// }
			C::t('forum_thread')->update($tid, array('status' => $thread['status']));

			$data = array(
				'tid' => $tid,
				'uid' => $_G['uid'],
				'lastpublished' => 0,
				'dateline' => $_G['timestamp'],
				'status' => 0,
			);
			C::t('#qqconnect#connect_feedlog')->insert($data, 0, 1);
		}
	}


	/*
	 * @brief _viewthread_share_method_output 判断输出同步到空间、微博的JS
	 *
	 * @returns
	 */
	function _viewthread_share_method_output() {
		global $_G, $postlist, $canonical;
		// 判断是否需要推送到空间或者微博，判断条件：需要发+主题表无发过标志
		$needFeedStatus = getstatus($_G['forum_thread']['status'], 7);
		$needWeiboStatus = getstatus($_G['forum_thread']['status'], 8);
		// 主题地址
		$_G['connect']['thread_url'] = $_G['siteurl'] . $canonical;

		// 本地三个分享表单请求地址
		$connectService = Cloud::loadClass('Service_Connect');
		$_G['connect']['qzone_share_url'] = $_G['siteurl'] . 'home.php?mod=spacecp&ac=plugin&id=qqconnect:spacecp&pluginop=share&sh_type=1&thread_id=' . $_G['tid'];
		$_G['connect']['weibo_share_url'] = $_G['siteurl'] . 'home.php?mod=spacecp&ac=plugin&id=qqconnect:spacecp&pluginop=share&sh_type=2&thread_id=' . $_G['tid'];
		$_G['connect']['pengyou_share_url'] = $_G['siteurl'] . 'home.php?mod=spacecp&ac=plugin&id=qqconnect:spacecp&pluginop=share&sh_type=3&thread_id=' . $_G['tid'];
		// 楼主pid
		$_G['connect']['first_post'] = $postlist[$_G['forum_firstpid']];
		// 匿名帖用户信息
		if ($_G['connect']['first_post']['anonymous']) {
			$_G['connect']['first_post']['authorid'] = 0;
			$_G['connect']['first_post']['author'] = '';
		}
		$_GET['connect_autoshare'] = !empty($_GET['connect_autoshare']) ? 1 : 0;

		// 设置微薄appkey
		$_G['connect']['weibo_appkey'] = $_G['connect']['weibo_public_appkey'];
		if($this->allow && $_G['setting']['connect']['qshare_appkey']) {
			$_G['connect']['weibo_appkey'] = $_G['setting']['connect']['qshare_appkey'];
		}
		// 如果看帖的不是作者本人或者没有绑定关系直接结束
		$condition1 = $_G['uid'] != $_G['forum_thread']['authorid'] || !$_G['member']['conopenid'];
		// 判断是否是正常主题
		$condition2 = $_G['forum_thread']['displayorder'] < 0;
		// 发帖超过半个小时，不继续执行，减少查询
		$condition3 = $_G['timestamp'] - $_G['forum_thread']['dateline'] > $this->retryAvaiableTime;
		// 满足以上任意一个条件
		if ($condition1 || $condition2 || $condition3) {
			$needFeedStatus = $needWeiboStatus = false;
		}

		// 站外分享图片权限：未绑定QC和有权限查看图片的用户
		if (!$_G['member']['conisbind'] && $_G['group']['allowgetimage'] && $_G['thread']['price'] == 0) {
			// debug 站外分享附件图片权限判断
			if (trim($_G['forum']['viewperm'])) {
				$allowViewPermGroupIds = explode("\t", trim($_G['forum']['viewperm']));
			}
			if (trim($_G['forum']['getattachperm'])) {
				$allowViewAttachGroupIds = explode("\t", trim($_G['forum']['getattachperm']));
			}
			$bigWidth = '400';
			$bigHeight = '400';
			$share_images = array();
			foreach ($_G['connect']['first_post']['attachments'] as $attachment) {
				if ($attachment['isimage'] == 0 || $attachment['price'] > 0
					|| $attachment['readperm'] > $_G['group']['readaccess']
					|| ($allowViewPermGroupIds && !in_array($_G['groupid'], $allowViewPermGroupIds))
					|| ($allowViewAttachGroupIds && !in_array($_G['groupid'], $allowViewAttachGroupIds))) {
						continue;
					}
				$bigImageURL = $_G['siteurl'] . getforumimg($attachment['aid'], 1, $bigWidth, $bigHeight, 'fixnone');
				$share_images[] = urlencode($bigImageURL);
			}
			$_G['connect']['share_images'] = implode('|', $share_images);
		}


		// 如果不需要推送到空间也不需要推送到微博
		if (!$needFeedStatus && !$needWeiboStatus) {
			return tpl_viewthread_share_method($jsurl);
		}
		// 如果在第一页，而且有楼主层，并且楼主层的帖子可见，进入推送判断流程
		if ($_G['page'] == 1 && $_G['forum_firstpid'] && $postlist[$_G['forum_firstpid']]['invisible'] == 0) {
			$feedLog = C::t('#qqconnect#connect_feedlog')->fetch_by_tid($_G['tid']);
			// 发送次数达到最大，取消
			if ($feedLog['publishtimes'] >= $this->retryMax) {
				return tpl_viewthread_share_method($jsurl);
			}
			// 已经推送到空间
			$hadFeedStatus = getstatus($feedLog['status'], 2);
			// 已经推送到微博
			$hadWeiboStatus = getstatus($feedLog['status'], 4);

			if (!$hadFeedStatus || !$hadWeiboStatus) {

				// 暂时去除重试机制
				// 如果需要推送且未推送过
				if ($needFeedStatus && !$hadFeedStatus) {
					// 上次发送时间距离当前时间小于1分钟，不发送
					if ($_G['timestamp'] - $feedLog['lastpublished'] < 60) {
						$needFeedStatus = false;
					}
				} else {
					// 不满足条件，不输出JS
					$needFeedStatus = false;
				}

				// 暂时去除重试机制
				// 如果需要推送且未推送过
				if($needWeiboStatus && !$hadWeiboStatus) {
					// 上次发送时间距离当前时间小于1分钟，不发送
					if ($_G['timestamp'] - $feedLog['lastpublished'] < 60) {
						$needWeiboStatus = false;
					}
				} else {
					// 不满足条件，不输出JS
					$needWeiboStatus = false;
				}
			}


			// 发feed通知到本地
			$jsurl = '';
			if($needFeedStatus || $needWeiboStatus) {
				$params = array();
				$params['thread_id'] = $_G['tid'];
				$params['ts'] = TIMESTAMP;
				$params['type'] = bindec(($needWeiboStatus ? '1' : '0').($needFeedStatus ? '1' : '0'));
				$params['sig'] = $connectService->connectGetSig($params, $connectService->connectGetSigKey());

				$utilService = Cloud::loadClass('Service_Util');
				$jsurl = $_G['connect']['discuz_new_feed_url'].'&'.$utilService->httpBuildQuery($params, '', '&');
			}
			$connectService->connectMergeMember();

			return tpl_viewthread_share_method($jsurl);
		}
	}

	function _viewthread_bottom_output() {
		if(!$this->allow) {
			return;
		}
		global $_G, $thread, $rushreply, $postlist, $page;
		$uids = $openids = array();
		foreach($postlist as $pid => $post) {
			if($post['anonymous']) {
				continue;
			}
			if($post['authorid']) {
				$uids[$post['authorid']] = $post['authorid'];
			}
		}
		foreach(C::t('#qqconnect#common_member_connect')->fetch_all($uids) as $connect) {
			if($connect['conisqqshow'] && $connect['conopenid']) {
				$openids[$connect['uid']] = $connect['conopenid'];
			}
		}
		foreach($postlist as $pid => $post) {
			if(getstatus($post['status'], 5)) {
				$matches = array();
				preg_match('/\[tthread=(.+?),(.+?)\](.*?)\[\/tthread\]/', $post['message'], $matches);
				if($matches[1] && $matches[2]) {
					$post['message'] = preg_replace('/\[tthread=(.+?)\](.*?)\[\/tthread\]/', lang('plugin/qqconnect', 'connect_tthread_message', array('username' => $matches[1], 'nick' => $matches[2])), $post['message']);
				}
				$post['authorid'] = 0;
				$post['author'] = lang('plugin/qqconnect', 'connect_tthread_comment');
				$post['avatar'] = $matches[3] ? '<img src="'.$matches[3].'/120'.'">' : '<img src="'.$_G['siteurl'].'/static/image/common/tavatar.gif">';
				$post['groupid'] = '7';
				$postlist[$pid] = $post;
				continue;
			}
			if($post['anonymous']) {
				continue;
			}
			if($openids[$post['authorid']]) {
				$postlist[$pid]['avatar'] = $this->_qqshow_img($openids[$post['authorid']]);
			}
		}

		if($page == 1 && $postlist[$_G['forum_firstpid']]['invisible'] == 0) {
			$jsurl = '';
			//note 开启了微博回流，主题未关闭，且不是抢楼贴，且主题已分享到腾讯微博， todo 微博回流
			if(!$_G['cookie']['connect_last_sync_t'] && $_G['uid'] && $_G['setting']['connect']['t']['reply'] && !$thread['closed'] && !$rushreply && getstatus($_G['forum_thread']['status'], 14)) {

				$jsurl = $_G['connect']['discuz_sync_tthread_url'].'&tid='.$thread['tid'];

				// 出一次JS时种一个十分钟的cookie,当前用户十分钟内不会触发回流JS
				dsetcookie('connect_last_sync_t', 1, 600);
			}

			return tpl_viewthread_bottom($jsurl);
		}
	}

	function _viewthread_postbottom_output() {
		global $_G, $postlist;
		$return = array();
		// ajax回帖的情况下同步
		if ($postlist[$_G['forum_firstpid']]['invisible'] == 0 && $_G['inajax']) {
			$jsurl = '';
			$viewpid = intval($_GET['viewpid']);
			if ($viewpid && $_G['tid']) {

				$data = C::t('#qqconnect#connect_postfeedlog')->fetch_by_pid($viewpid);
				// 有记录同时没有同步过
				if (!$data['status'] && $data) {

					$params = array();
					$params['thread_id'] = $_G['tid'];
					$params['post_id'] = $viewpid;
					$params['ts'] = TIMESTAMP;
					$connectService = Cloud::loadClass('Service_Connect');
					$params['sig'] = $connectService->connectGetSig($params, $connectService->connectGetSigKey());

					$utilService = Cloud::loadClass('Service_Util');
					$jsurl = $_G['connect']['discuz_new_post_feed_url'].'&'.$utilService->httpBuildQuery($params, '', '&');
					$return[] = tpl_sync_post_viewthread_bottom($jsurl);
				}
			}
		}

		return $return;
	}

	function _qqshow_img($openid) {
		global $_G;
		return '<img width="120" src="http://qs.qlogo.cn/qsthirdbg/'.$_G['setting']['connectappid'].'/'.$openid.'/140" />';
	}

	function _viewthread_fastpost_btn_extra_output() {
		if(!$this->allow) {
			return;
		}
		global $_G;
		$allowconnectt = $this->_allowconnectt();
		if($GLOBALS['fastpost'] && $allowconnectt) {
			$connectService = Cloud::loadClass('Service_Connect');
			$connectService->connectMergeMember();
			if ($_G['member']['is_feed']) {
				return lang('plugin/qqconnect', 'connect_post_sync_method') . tpl_sync_method(false, $allowconnectt) . ' | ';
			}
		}
	}
}

class plugin_qqconnect_member extends plugin_qqconnect {

	function connect_member() {
		global $_G, $seccodecheck, $secqaacheck, $connect_guest;

		if($this->allow) {
			if($_G['uid'] && $_G['member']['conisbind']) {
				dheader('location: '.$_G['siteurl'].'index.php');
			}
			$connect_guest = array();
			if($_G['connectguest'] && (submitcheck('regsubmit', 0, $seccodecheck, $secqaacheck) || submitcheck('loginsubmit', 1, $seccodestatus))) {
				if(!$_GET['auth_hash']) {
					$_GET['auth_hash'] = $_G['cookie']['con_auth_hash'];
				}
				$conopenid = authcode($_GET['auth_hash']);
				$connect_guest = C::t('#qqconnect#common_connect_guest')->fetch($conopenid);
				if(!$connect_guest) {
					dsetcookie('con_auth_hash');
					showmessage('qqconnect:connect_login_first');
				}
			}
		}
	}

	function logging_member() {
		global $_G;
		if($this->allow && $_G['connectguest'] && $_GET['action'] == 'login') {
			if ($_G['inajax']) {
				showmessage('qqconnect:connectguest_message_complete_or_bind');
			} else {
				dheader('location: '.$_G['siteurl'].'member.php?mod=connect&ac=bind');
			}
		}
	}

	function register_member() {
		global $_G;
		if($this->allow && $_G['connectguest']) {
			if ($_G['inajax']) {
				showmessage('qqconnect:connectguest_message_complete_or_bind');
			} else {
				dheader('location: '.$_G['siteurl'].'member.php?mod=connect');
			}
		}
	}

	function logging_method() {
		if(!$this->allow) {
			return;
		}
		return tpl_login_bar();
	}

	function register_logging_method() {
		if(!$this->allow) {
			return;
		}
		return tpl_login_bar();
	}

	function connect_input_output() {
		if(!$this->allow) {
			return;
		}
		global $_G;
		$_G['setting']['pluginhooks']['register_input'] = tpl_register_input();
	}

	function connect_bottom_output() {
		if(!$this->allow) {
			return;
		}
		global $_G;
		$_G['setting']['pluginhooks']['register_bottom'] = tpl_register_bottom();
	}

}

class plugin_qqconnect_forum extends plugin_qqconnect {

	function index_status_extra() {
		global $_G;
		if(!$this->allow) {
			return;
		}
		if($_G['setting']['connect']['like_allow'] && $_G['setting']['connect']['like_url'] || $_G['setting']['connect']['turl_allow'] && $_G['setting']['connect']['turl_code']) {
			return tpl_index_status_extra();
		}
	}

	function forumdisplay_fastpost_sync_method_output() {
		return $this->_forumdisplay_fastpost_sync_method_output();
	}

	function post_sync_method_output() {
		return $this->_post_sync_method_output();
	}

	function post_infloat_btn_extra_output() {
		return $this->_post_infloat_btn_extra_output();
	}

	function post_feedlog_message($param) {
		return $this->_post_feedlog_message($param);
	}

	function viewthread_share_method_output() {
		return $this->_viewthread_share_method_output();
	}

	function viewthread_bottom_output() {
		return $this->_viewthread_bottom_output();
	}

	function viewthread_fastpost_btn_extra_output() {
		return $this->_viewthread_fastpost_btn_extra_output();
	}

	function viewthread_postbottom_output() {
		return $this->_viewthread_postbottom_output();
	}

}

class plugin_qqconnect_group extends plugin_qqconnect {

	function forumdisplay_fastpost_sync_method_output() {
		return $this->_forumdisplay_fastpost_sync_method_output();
	}

	function post_sync_method_output() {
		return $this->_post_sync_method_output();
	}

	function post_infloat_btn_extra_output() {
		return $this->_post_infloat_btn_extra_output();
	}

	function post_feedlog_message($param) {
		return $this->_post_feedlog_message($param);
	}

	function viewthread_share_method_output() {
		return $this->_viewthread_share_method_output();
	}

	function viewthread_bottom_output() {
		return $this->_viewthread_bottom_output();
	}

	function viewthread_fastpost_btn_extra_output() {
		return $this->_viewthread_fastpost_btn_extra_output();
	}
}

class plugin_qqconnect_home extends plugin_qqconnect {

	function spacecp_profile_bottom() {
		global $_G;

// 		if(submitcheck('profilesubmit')) {
// 			$_G['group']['maxsigsize'] = $_G['group']['maxsigsize'] < 200 ? 200 : $_G['group']['maxsigsize'];
// 			return;
// 		}
		if($_G['uid'] && $_G['setting']['connect']['allow']) {
			return tpl_spacecp_profile_bottom();
		}

	}
}

class mobileplugin_qqconnect extends plugin_qqconnect_base {

	var $allow = false;

	function mobileplugin_qqconnect() {
		global $_G;
		if(!$_G['setting']['connect']['allow'] || $_G['setting']['bbclosed']) {
			return;
		}
		$this->allow = true;
	}

	function common() {
		$this->common_base();
	}

	function global_footer_mobile() {
		global $_G;

		if(!$this->allow || !empty($_G['inshowmessage'])) {
			return;
		}

		$connectService = Cloud::loadClass('Service_Connect');

		if(!empty($_G['cookie']['connect_js_name'])) {
			if($_G['cookie']['connect_js_name'] == 'guest_ptlogin') {
				$jsurl = $connectService->connectGuestPtloginJs();
				return '<script type="text/javascript">function con_handle_response(response) {
							return response;
						}</script>
						<script type="text/javascript" src="'.$jsurl.'"></script>';
				dsetcookie('connect_js_name');
			}
		}
	}

}
