<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta content="新規会員登録ページ" name="description">
        <title>新規登録</title>
        <style>
            body {
                width: 100%;
                background-color: #D2B48C;
                font-family: Meiryo;
            }
            .box {
                margin-top: 150px;
            }
            .link {
                display: block;
                text-align: center;
            }
            .form {
                text-align: center;
                margin: 0 auto;
            }
            
            .error {
                font-size: 10px;
                color: red;
                margin: 0px;
                clear: both;
            }
            .title {
                padding: 10px;
                width: 170px;
                margin: 0 auto;
                font-size: 26px;
                font-family: Meiryo;
                color: white;
            }
            .regist {
                margin-top: 10px;
            }

        </style>    
    </head>
    <body>
        <div class="box">
                <h1 class="title">ユーザー登録</h1>
            <div class="form">
                <form method="post" action="regist.php">
                    <input type="text" name="name" placeholder="ユーザー名"><p class="error"><?php foreach($error_name as $value) { print $value; } ?></p>
                    <input type="password" name="password" placeholder="パスワード"><p class="error"><?php foreach($error_passwd as $value) {print $value; } ?></p>
                    <input type="submit" name="submit" value="登録" class="regist">
                </form> 
                <p class="msg"><?php print $msg; ?></p> 
            </div>
            <a href="top.php" class="link">ログインページへ</a>
        </div>    
    </body>
</html>
    