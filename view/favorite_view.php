<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>お気に入り</title>
    <style>
        body {
            margin: 0px;
        }
        .header-box {
            background-color: #D2B48C;
            height: 150px;
            width: 100%;
        }
        .logo {
            color: white;
            text-decoration: none;
            font-size: 32px;
           
        
        }
        h1 {
            padding-top: 30px;
            padding-left: 20px;
            padding-bottom: 18px;
            margin: 0px;
            float: left;
            
        }
        
        .logout {
            float: right;
            color: white;
            text-decoration: none;
            margin-right: 10px;
            margin-top: 50px;
        }
        .main {
            background-color: #EEEEEE;
        }
        .main {
            margin: 0 auto;
            width: 80%;
            background-color: #EEEEEE;
            border: 1px solid #EEEEEE;
            border-radius: 10px 10px;
            margin-top: 30px;
        }
        .word-box {
            width: 80%;
            padding: 10px;
            background-color: white;
            margin: 0 auto;
            margin-bottom: 5px;
            
        }
        .word-house {
            overflow-y: scroll;
            height: 900px;
        }
        .title {
            text-align: center;
            padding-top: 30px;
            margin-top: 0px;
            
        }
        .date {
            float: right;
        }
        .word {
            text-align: center;
            margin-top: 30px;
            margin-bottom: 0px;
            border-top: 1px solid #EEEEEE;
            padding: 10px;
        }
        .footer-box {
            height: 100px;
            background-color: #D2B48C;
        }
        .header-list, .footer-list {
            display: flex;
            width: 100%;
            text-align: center;
            padding-top: 15px;
            border-top: 1px solid white;
            padding-left: 0px;
        }
        .footer-list {
            width: 80%;
            margin: 0 auto;
        }
        .list-index, .footer-index {
            flex: 1;
            list-style: none;
            color: white;
            text-decoration: none;
        }
        .list-index a, .footer-index a {
            color: white;
            text-decoration: none;
            border-right: 1px solid white;
            display: block;
        }
        .list-index:last-child a, .footer-index:last-child a {
            border-right: none;
        }
        .copyright {
                color: white;
                 text-align: center;
                 margin-top: 5px;
            }
        .msg {
            text-align: center;
        }    
    </style>

</head>
<body>
    <script type="text/javascript"src="http://code.jquery.com/jquery-3.1.0.min.js"></script>
    <script type="text/javascript" src="../kotonoha/view/hover.js"></script>
    <script type="text/javascript"></script>
    <div class="header-box">
        <header>
            <h1>
                <a href="./home.php" class="logo">kotonoha</a>
            </h1>
            <a href="./logout.php" class="logout">ログアウト</a>
        </header>
        <ul class="header-list">
                <li class="list-index">
                    <a href="./home.php">home</a>
                </li> 
                <li class="list-index">
                    <a href="view/howto_view.html">kotonohaの使い方</a>
                </li>
                <li class="list-index">     
                    <a href="./public.php">みんなのkotonohaへ</a>
                </li> 
        </ul>         
    </div>
    <article class="main">
        <h2 class="title">お気に入り</h2>
        <div class="word-house">
            <p class="msg">
                <?php if (empty($data) === TRUE) { print 'まだお気に入りは登録されていません'; } ?>
            </p>        
    <?php foreach($data as $value) { ?>
            <div class="word-box">
                <form method="post" action="favorite.php" onsubmit="delete()">
                    <input type="submit" value="削除"  class="delete" onclick="return confirm('本当に削除しますか？')"> 
                    <input type="hidden" name="comment_id" value="<?php print $value['comment_id']; ?>">
                </form>  
                <span class="date"><?php print $value['created_date']; ?></span>
                <p class="word"><?php print $value['words']; ?></p>
            </div>
    <?php } ?> 
        </div>   
         
    </article>
    <div class="footer-box">
        <footer>
            <ul class="footer-list">
                <li class="footer-index">
                    <a href="home.php">home</a>
                </li>
                <li class="footer-index">
                    <a href="view/howto_view.html">how to use</a>
                </li> 
                <li class="footer-index">
                    <a href="public.php">みんなのkotonoha</a>
                </li>
            </ul>      
            <p class="copyright">&copy; maiko2021</p>
        </footer>         
    </div>    
</body>
</html>    