<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>トップページ</title>
</head>
<body>
    初めての方<form action="./sighup.php" method="post">
        ユーザー名<input name="uname" type="text">
        メールアドレス：<input name="mail" type="text">
        パスワード：<input name="upw" type="text">
        <input name="l_flag" value=1 type="number" style="display:none">
        <input name="u_delete" value=0 type="number" style="display:none">
        <input type="submit">
    </form>
    登録済みの方<form action="./login.php" method="post">
        メールアドレス：<input name="mail" type="text">
        パスワード：<input name="upw" type="text">
        <input type="submit">
    </form>
</body>
</html>