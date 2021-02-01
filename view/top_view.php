<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta content="ログインページ" name="description">
        <title>トップ</title>
        <style>
            body {
                width: 960px;
                background-color: #D2B48C;
                font-family: Meiryo;
            }
            .contents, .customer-login{
                text-align: center;
            }
            .customer-login {
                margin-top: 30px;
            }
            .box {
                margin-top: 150px;
                
            }
            .login {
                margin-top:10px;
            }
            .link {
                display: block;
                margin-top: 20px;
            }
            .info {
                margin-top: 0px;
                margin-left: 30px;
                font-size: 12px;
            }
            span {
                display: block;
                margin-top: 5px;
                color: red;
            }
            .title {
                padding: 10px;
                width: 170px;
                margin: 0 auto;
                font-family: Meiryo;
                color: white;
            }
            .description {
                margin-top: 5px;
                margin-bottom: 0px;
                color: white;
            }
        </style>    
    </head>
    <body>
        <div class="box">            
                <h1 class="title">kotonoha</h1>
            <div class="contents">
                <p class="description">心に留めておきたい言葉は記録しよう</p>
                <p class="description">kotonohaは、あなただけの言葉のアルバム</p>
                
            </div>
            <div class="customer-login">
                <form method="post" action="login.php">
                    <input type="text" name="name" placeholder="ユーザー名"><br>
                    <input type="password" name="password" placeholder="パスワード"><br>
                    <input type="submit" name="submit" value="ログイン" class="login"> 
                </form>
                <span><?php if ($login_err_flag === TRUE) { print '※ユーザー名又はパスワードが違います'; } ?></span>
                <a href="regist.php" class="link">ユーザー登録へ</a>
                <p class="info">※ユーザー登録がまだの方</p>
            </div>
        </div>    
    </body>
</html>