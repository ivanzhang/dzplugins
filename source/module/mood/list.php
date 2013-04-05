<?php
// mod文件只能被入口文件引用，不能直接访问
if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

//初始化当前页码
$page = empty($_GET['page']) ? 1 : intval($_GET['page']);
$fid = empty($_GET['fid']) ? 1 : intval($_GET['fid']);
if ($page < 1) $page = 1;

//分页
$perpage = 2000;
$start = ($page - 1) * $perpage;

//获取当前页的留言数据
$list = array();
$query = DB::query("SELECT * FROM " . DB::table('forum_thread') . " WHERE fid= " . $fid . " and views < 187 ORDER BY tid DESC LIMIT $start, $perpage");


$author_names = array("xiaogege", "meinv001", "haha", "jianren008", "psy", "girlsgeneration", 'girl007', "beijingaicao", "gujini",
    "kankan", "hexiu163", 'badycomeon', 'comeonbaby', 'fuckbeijing', 'caosidecao', '1332233221', '出来混的', '江湖书生', 'yechangmengduo',
    'yeyehi', 'hongmuer', 'piapiapia', 'mmpppp', 'niwonong', 'xiaoyu', 'xiaohu', 'fancy', 'fancy_1234', 'guozili', 'guozili001', 'guozili002',
    'guozili003', 'proferO', 'geilicao', 'amadi', 'yamadi', 'aba', 'gannanstyle', '鸟叔', '南国风情', 'nidongde', '苍老师', '仓多真央', '长沙的哥',
    '来飞一个', '大火不错', '菊花你', '小哥哥', '夜夜笙歌', '隔壁很嗨', '看看吧', '置顶帖', '就爱草', '各级领导', '傻傻的', '也莪也爱', 'xiaoav',
    '寂寞啊', '空虚女001', '卸货必须的', '火大伤身', '观阴大湿', '波大精深', '老衲要射了', '日日精进', '小关',
    '小张哥', '北京一夜', '上海滩小男人', '花无缺', '小鱼儿', '当年的带头大哥', '北方的狼001', '香港蒲友', '佛山一哥', 'guoguo', 'xiaohu002',
    'xiaoyu001', 'girls', 'roudaoaiai', '货货货！', 'kingofthereturn', 'Zoleo', '姨妈大', 'f22099', 'djl_dj', 'andong', 'exy', 'chenjian', 'jian1117',
    'binbin', 'power', 'love', 'sexof', 'city', 'aman', 'xzccss', '1542222', 'woer223', 'dege', 'js001', 'xiaojienihao', 'tyamdp', 'khty');

while ($thread = DB::fetch($query)) {
    $thread['dateline'] = dgmdate($thread['dateline'], 'u');


    $list[] = $thread;
}

foreach ($list as &$thread) {

    if ($thread['views'] < 187) {
        $author_name = $author_names[rand(0, count($author_names) - 1)];
        $thread['author'] = $author_name;
        $newtime = 1380000000 - 100000 * rand(1, 360) * $page;
        $data = array('author' => $author_name,
            'dateline' => $newtime,
            'lastpost' => $newtime,
            'lastposter' => $author_name,
            'views' => rand(187, 1230));
        $condition = array('tid' => $thread['tid']);
        DB::update('forum_thread', $data, $condition);
    }

}

//获得一个简单的分页，只有上一页和下一页，这个不需要count()数据表中的所有记录
$multi = simplepage(count($list), $perpage, $page, 'mood.php?mod=list');

//数据准备完毕，引入相应的模板，准备输出
include_once template("mood/list");

?>