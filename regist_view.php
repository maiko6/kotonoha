<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta content="新規会員登録ページ" name="description">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>新規登録</title>
        <style>
            body {
                width: 960px;
                background-color: #D2B48C;
                font-family: Meiryo;
            }
            .box {
                margin-top: 150px;
            }
            .link, .regist {
                display: block;
                text-align: center;
            }
            .form {
                margin-left: 407px;
            }
            .regist {
                margin-top: 10px;
                margin-left: 55px;
            }
            span {
                font-size: 10px;
                color: red;
            }
            .title {
                border: solid 2px #EEEEEE;
                border-radius: 50px 3px;
                padding: 10px;
                width: 170px;
                margin: 0 auto;
                font-size: 26px;
                margin-bottom: 20px;
                font-family: Meiryo;
            }

        </style>    
    </head>
    <body>
        <div class="box">
                <h1 class="title">ユーザー登録</h1>
            <div class="form">
                <form method="post" action="regist.php">
                    <input type="text" name="name" placeholder="ユーザー名"><span><?php foreach($error_name as $value) { print $value; } ?></span><br>
                    <input type="password" name="password" placeholder="パスワード"><span><?php foreach($error_passwd as $value) {print $value; } ?></span><br>
                    <input type="submit" name="submit" value="登録" class="regist">
                </form> 
                <p class="msg"><?php print $msg; ?></p> 
            </div>
            <a href="top.php" class="link">ログインページへ</a>
        </div>    
    </body>
</html>
    