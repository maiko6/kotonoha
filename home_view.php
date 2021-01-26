<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta content="大切な言葉は書き留めよう。" name="description">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>ホーム</title>
        <style>
            body {
                margin: 0px;
                background-color: white;
            }
            header {
                width: 960;
                height: 100px;
                background-color: #D2B48C;
            }
            h1 {
                margin-top: 15px;
                font-size: 40px;
                float: left;
                margin-left: 10px;
                border: solid 2px white;
                border-radius: 50px 3px;
                padding: 10px;
                font-family: Meiryo;
            }
            .logout {
                float: right;
                margin-right: 30px;
                margin-top: 56px;
                text-decoration: none;
            }
            .hello {
                float: left;
                margin-top: 56px;
                margin-left: 30px;
            }
            .today_word {
                text-align: center;
                width: 500px;
                margin: 0 auto;
                background-color: #E6FFE9;
            }
            .today_title {
                margin-top: 30px;
                margin-bottom:20px;
                padding-top: 20px;
            }
            form {
                padding-bottom: 10px;
            }
            
            .past-title {
                text-align: center;
                margin-top: 30px;
            }
            p {
                margin-bottom: 10px;
            }
            .past_words {
                width: 500px;
                height: 700px;
                margin: 0 auto;
                background-color: #EEEEEE;
                overflow-y: scroll;
                margin-top: 10px;
            }
            .list_day {
                width: 480px;
                background-color: white;
                margin: 0 auto;
                margin-bottom: 10px;
            
            }
            .word {
                text-align: center;
                clear: both;
                border-top: solid 1px #EEEEEE;
                padding: 10px;
                padding-top: 20px;
            }
            .day {
                float: right;
                margin-right: 5px;
                margin-top: 7px;
                margin-bottom: 5px;
            }
            .delete {
                float: right;
                margin: 18px;
                font-size: 10px;
            }
            .footer-box {
                width: 960;
                height: 100px;
                background-color: #D2B48C;
            }
            .error {
                font-size: 10px;
                color: red;
                margin-left: -70px;
            }
            .msg {
                margin-left: -80px;
                font-size: 10px;
            }
            
        </style>
    </head>
    <body>
        <div class="header_box">
            <header>
                <h1>kotonoha</h1>
                <a href="logout.php" class="logout">ログアウト</a>
                <span class="hello"><?php print 'ようこそ'. $name. 'さん'; ?></span>
            </header>
        </div>    
        <article class="today_word">
            <h2 class="today_title">今日の言葉</h2>
            <form method="post" action="./home.php">
                <textarea name="words" rows="4" cols="40" placeholder="ここに入力して下さい"></textarea><br>
                <?php if (empty($error) !== TRUE) { ?>
                    <span class="error"><?php foreach($error as $value) { print $value;} ?></span><br>
                <?php } else { ?>
                    <span class="msg"><?php foreach($msg as $value) { print $value;} ?></span><br>
                <?php } ?>
                <input type="submit" name="submit" value="記録する">
                <input type="hidden" name="task" value="insert">
                <input type="reset" name="reset" value="リセット">
            </form>
        </article>
        <article class="past_words">
            <h2 class="past-title">これまでの記録</h2>
            <p><?php if (empty($data) === TRUE) { print 'まだ記録がありません'; } ?></p>
            <div class="list_box">
                    <?php foreach($data as $value) { ?>
                    <div class="list_day">
                        <form method="post" action="home.php" onsubmit="delete()">
                            <input type="submit" value="削除"  class="delete" onclick="return confirm('本当に削除しますか？')"> 
                            <input type="hidden" name="id" value="<?php print $value['comment_id']; ?>">
                            <input type="hidden" name="task" value="delete">
                        </form>  
                            <p class="day"><?php print $value['created_date']; ?></p>
                            <p class="word"><?php print $value['words']; ?></p>
                    </div>    
                    <?php } ?>    
            </div>
        </article>
        <footer class="footer-box">
            
        </footer>
       
    </body>
</html>