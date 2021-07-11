<html>
  <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>電卓テストresult</title>
</head>
<body>
<h1>POST結果</h1>
    <div>{{$msg}}</div>
<div>果物名：{{$fruits_name}}</div>
<div>果物数：{{$fruits_count}}</div>
    <div>単価&nbsp;&nbsp;&nbsp;：{{$fruits_value}}</div>
    <div>合計金額：{{$suｍ}}</div>



<?php
$id = $_POST['id'];

// データベース接続

$host = 'localhost';
$dbname = 'dentaku';
$dbuser = 'root';
$dbpass = 'root1480';

try {
$dbh = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8mb4", $dbuser,$dbpass, array(PDO::ATTR_EMULATE_PREPARES => false));
} catch (PDOException $e) {
 var_dump($e->getMessage());
 exit;
}
// データ取得
$sql = "SELECT id, siki, goukei FROM dentaku WHERE id = ?";
$stmt = ($dbh->prepare($sql));
$stmt->execute(array($id));

//あらかじめ配列を生成しておき、while文で回します。
$memberList = array();
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
 $memberList[]=array(
  'id' =>$row['id'],
  'siki'=>$row['siki'],
  'goukei'=>$row['goukei']
 );
}

//jsonとして出力
header('Content-type: application/json');
echo json_encode($memberList,JSON_UNESCAPED_UNICODE);

  </body>
</html>