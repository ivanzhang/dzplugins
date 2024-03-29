<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?><?php
$return = <<<EOF

<style type="text/css">
.datalist p { font-weight: bold; margin-bottom: 15px; font-size: 14px; }
.datalist { zoom: 1; }
.datalist table { margin-bottom: 30px; width: 100%; border: 1px solid #E6E7E1; }
.datalist th, .datalist td { padding: 4px 5px; border: 1px solid #E6E7E1; font-weight: 400; }
.datalist th img { vertical-align: top; }
.datalist table .stat_subject { border-right: none; }
.datalist table .stat_num { padding-right: 15px; text-align: right; border-left: none; }
.datalist .datatable { margin-bottom: 10px; }
.datalist .datatable, .datalist .datatable th, .datalist .datatable td { border-width: 1px 0; }
.datalist .fixtable { table-layout: fixed; }
.colplural, .colplural th, .colplural td, th.highlight, td.highlight { background-color: #F5F5F5; }
</style>
<div style="margin:0 auto; width: 100%; text-align: center; padding-top: 15px;">
    
EOF;
 if($mrcs) { 
$return .= <<<EOF

        <div class="datalist">
            <p>{$lang['classn_03']} ({$lang['classn_04']} {$pnum} {$lang['classn_05']})</p>
            <table border="0" cellpadding="0" cellspacing="0">
                <thead align="center" class="colplural">
                <tr>
                    <td width="60px"><b>{$lang['classn_06']}</b></td>
                    <td width="120px"><b>{$lang['classn_07']}</b></td>
                    <td width="120px"><b>{$lang['classn_08']}</b></td>
                    <td width="140px"><b>{$lang['classn_09']}</b></td>
                    <td><b>{$lang['classn_10']}[{$_G['setting']['extcredits'][$nrcredit]['title']}]</b></td>
                </tr>
                </thead>
EOF;
 if(is_array($mrcs)) foreach($mrcs as $key => $mrc) { 
$return .= <<<EOF
<tr>
<td>{$key}</td>
<td><a href="home.php?mod=space&amp;uid={$mrc['uid']}" target="_blank">{$mrc['username']}</a></td>
<td>{$mrc['level']}</td>
<td>{$mrc['time']}</td>
<td><span>{$mrc['lastreward']} {$_G['setting']['extcredits'][$nrcredit]['unit']}</span></td>
</tr>

EOF;
 } 
$return .= <<<EOF

            </table>
        </div>
    
EOF;
 } 
$return .= <<<EOF

</div>

EOF;
?>