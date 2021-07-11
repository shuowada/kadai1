<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
 
    <table>
        <tr><th>siki</th><th>goukei</th></tr>
        @foreach ($items as $item)
            <tr>
                <td>{{$item->siki}}</td>
                <td>{{$item->goukei}}</td>
           
            </tr>
        @endforeach
    </table>
 
</body>
</html>