<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta content="大切な言葉は書き留めよう。" name="description">
        
        <title>ホーム</title>
        <style>
            body {
                margin: 0px;
            }
            .header_box {
                width: 100%;
                min-width: 900px;
                background-color: #D2B48C;
                height: 150px;

            }
            
            .title {
                margin-top: 20px;
                font-size: 32px;
                float: left;
                margin-left: 10px;
                padding: 10px;
                font-family: Meiryo;
                color: white;
                margin-bottom: 5px;
            }
            .logout {
                float: right;
                margin-right: 10px;
                margin-top: 50px;
                text-decoration: none;
                color: white;
            }
            .hello {
                float: left;
                margin-top: 50px;
                margin-left: 30px;
                color: white;
            }
            
            .today_word {
                text-align: center;
                border: 1px solid white;
                border-radius: 10px 10px;
                margin-top: 30px;
                margin: 0 auto;
                background-color: #EEEEEE;
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
                padding-top: 30px;
            }
            
            .past_words {
                margin: 0 auto;
                background-color: #EEEEEE;
                margin-top: 15px;
                border: 1px solid #EEEEEE;
                border-radius: 10px 10px;
            }

            .list_box {
                overflow-y: scroll;
                height: 700px;
                
            }
            .list_day {
                width: 600px;
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
                height: 100px;
                background-color: #D2B48C;
                border-top: 1px solid white;
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
           
            li {
                list-style: none;
                text-align: center;
                margin-bottom: 10px;
                margin-top: 10px;
                
            }
            ul {
                padding-left: 0px;
                margin: 0px;
            }
            .famous_word_box {
                width: 670px;
                border: solid 1px white;
                border-radius: 10px 10px;
                margin: 0 auto;
                margin-top: 30px;
                padding: 15px;
                background-color: #EEEEEE;
            }
           
            .famous_word {
                float: left;
            }

           .article {
               width: 700px;
               margin: 0 auto;
               margin-top: 15px;
           }

           .header-list {
               display: flex;
               width: 100%;
               border-top: 1px solid white;
               
           }
           .list-index {
               flex: 1;
               padding: 5px;
               text-align: center;
               margin-bottom: 0px;
           }
           .list-index a, .footer-index a {
               display: block;
               text-decoration: none;
               color: white;
               border-right: 1px solid white;
           }
          
           .footer-index:last-child a{
               border-right: none;
           }
           .status {
               flex: 1;
           }
           .status_now {
               color: white;
               font-size: 12px;
           }
           .famous_title {
               text-align: cemter;
               font-size: 22px;
               border-bottom: 1px solid;
           }
           .footer-list {
               display: flex;
               width: 500px;
               margin: 0 auto;
           }
           .footer-index {
               flex: 1;
           }
               
           }
           .footer-index {
               text-decoration: none;
               color: white;
           }
            .copyright {
                color: white;
                 text-align: center;
                 margin-top: 0px;
            }
        </style>
    </head>
    <body>
        <div class="header_box">
            <header>
                <h1 class="title">kotonoha</h1>
                <a href="logout.php" class="logout">ログアウト</a>
                <span class="hello"><?php print 'ようこそ'. $name. 'さん'; ?></span>
            </header>
            <ul class="header-list">
                <li class="list-index">
                    <a href="view/howto_view.html">kotonohaの使い方</a>
                </li>
                <li class="list-index">     
                    <a href="./public.php">みんなのkotonohaへ</a>
                </li> 
                <li class="list-index">
                    <a href="./favorite.php">☆お気に入り</a>
                </li>      
                <li class="list-index"> 
                    <form method="post" action="./home.php">
                        <select name="status" class="status">
                            <option value="status">公開設定</option>
                            <option value="1">公開</option>
                            <option value="2">非公開</option>
                        </select>  
                        <input type="submit" name="submit" value="変更">
                        <input type="hidden" name="task" value="status"> 
                        <?php if ($status_now === '1') { ?>
                            <span class="status_now">公開ユーザー</span>
                        <?php } else { ?>
                            <span class="status_now">非公開ユーザー</span>
                        <?php } ?> 
                    </form>    
                </li>
            </ul>                    
        </div>
        <div class="main"> 
            <div class="famous_word_box">
                <p class="famous_title">今日の格言</p>
                <?php foreach($data_word as $value) { ?>
                <p class="famous_word"><?php print $value['word']; ?></p><br>
                <p class="name"><?php print $value['who']; ?></p>
                <?php } ?>
            </div>  
            <div class="article">
                <article class="today_word">
                    <h2 class="today_title">言葉を記録</h2>
                    <form method="post" action="./home.php">
                        <textarea name="words" rows="4" cols="60" placeholder="ここに入力して下さい"></textarea><br>
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
                    <h2 class="past-title"><?php print $name. 'の記録'; ?></h2>
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
            </div>
        </div>    
        <footer class="footer-box">
            <ul class="footer-list">
                <li class="footer-index">
                    <a href="view/howto_view.html">how to use</a>
                </li> 
                <li class="footer-index">
                    <a href="public.php">みんなのkotonoha</a>
                </li>
                <li class="footer-index">
                    <a href="./favorite.php">お気に入り</a>
            </ul>      
            <p class="copyright">&copy; maiko2021</p>     
            
        </footer>
       
    </body>
</html>