<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('extcredits');?><?php include template('common/header'); ?><ul><?php if(is_array($_G['setting']['extcredits'])) foreach($_G['setting']['extcredits'] as $extcreditid => $extcredit) { if(empty($extcredit['hiddeninheader'])) { ?><li><?php echo $extcredit['img'];?> <?php echo $extcredit['title'];?>: <span id="hcredit_<?php echo $extcreditid;?>"><?php echo getuserprofile('extcredits'.$extcreditid);; ?><?php echo $extcredit['unit'];?></span></li><?php } } ?>
<?php if(!empty($_G['setting']['pluginhooks']['spacecp_credit_extra'])) echo $_G['setting']['pluginhooks']['spacecp_credit_extra'];?>
</ul><?php include template('common/footer'); ?>