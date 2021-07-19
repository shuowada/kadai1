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
    <div>合計金額：@{{$suｍ}}</div>

session_start();

$name = htmlspecialchars($_POST['totyu'], ENT_QUOTES, 'UTF-8');
$email = htmlspecialchars($_POST['result'], ENT_QUOTES, 'UTF-8');

// 入力値をセッション変数に格納
$_SESSION['name'] = $name;
$_SESSION['email'] = $email;



<h1>ユーザー登録フォーム(confirm)</h1>
<form action="inputDentakutest" method="post">
<table>
<tr><th>お名前：</th><td><?php echo $name; ?></td></tr>
<tr><th>メールアドレス：</th><td><?php echo $email; ?></td></tr>
</table>
<input id="send" type="submit" value="登録">
</form>



  </body>
</html>