<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>みんなのkotonoha</title>
</head>
<style>
body {
    margin: 0px;
}
.header_box {
    background-color: #D2B48C;
    height: 150px;
    width: 100%;
    min-width: 800px;
}
.header-list, .footer-list {
    display: flex;
    width: 100%;
    text-align: center;
    padding-top: 10px;
    border-top: 1px solid white;
    padding-left: 0px;
    margin: 0px;
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

.main {
    margin: 0 auto;
    width: 80%;
    min-width: 600px;
    background-color: #EEEEEE;
    margin-top: 30px;
    border: 0.5px solid #EEEEEE;
    border-radius: 10px 10px;
}
.word_box {
    text-align: center;
    background-color: white;
    width: 80%;
    margin: 0 auto;
    padding: 20px;
    margin-bottom: 8px;
}
.date {
    margin-left: 380px;
    margin-top: 0px;
    margin-bottom: 5px;
   
   
}
.title {
    text-align: center;
    padding: 20px;
}
.word {
    border-top: 1px solid #EEEEEE;
    padding-top: 45px;
    margin-top: 0px;
}
.name {
    float: left;
    border: 1px solid #EEEEEE;
    background-color: #EEEEEE;
    font-size: 8px;
    padding: 2px;
}
.logo {
    margin-top: 0px;
    text-decoration: none;
    color: white;

}
h1 {
    padding-top: 15px;
    padding-left: 20px;
    float: left;
    margin-bottom: 13px;
   
}
.logout {
    float: right;
    padding-top: 50px;
    padding-right: 10px;
    color: white;
    text-decoration: none;
}
.hello {
    float: left;
    padding-top: 50px;
    padding-left: 30px;
    color: white;
}

 #favorite {
     float: right;
     margin-top: 5px;
     border: none;
     background-color: #CCCCCC;
 }  
 #favorite:hover {
     color: red;
}
.footer-box {
    height: 100px;
    background-color: #D2B48C;
}

.footer-list {
    width: 80%;
    margin: 0 auto;
}        
.copyright {
    color: white;
    text-align: center;
    margin-top: 5px;
}
</style>
<body>
<div class="header_box">
    <header>
       <h1>
           <a href="./home.php" class="logo">kotonoha</a>
       </h1>
       <span class="hello"><?php print 'ようこそ'.$name .'さん'; ?></span>
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
                    <a href="./favorite.php">お気に入り</a>
                </li> 
        </ul>      
</div>    
    <article class="main">
        <h2 class="title">みんなのkotonoha</h2>
    <?php foreach($data as $value) { ?>
        <div class="word_box">
            <span class="name"><?php print $value['user_name']; ?></span>
            <p class="date"><?php print $value['created_date']; ?></p>
            <form method="post" action="public.php" onSubmit="foo();">
                <input type="submit" name="submit" value="保存" id="favorite">
                <input type="hidden" name="comment_id" value="<?php print $value['comment_id']; ?>">
                <input type="hidden" name="words" value="<?php print $value['words']; ?>">
             </form>   
            <p class="word"><?php print $value['words']; ?></p>
        </div> 
    <?php } ?>
    
                
        
    <script type="text/javascript">
        function foo() {
           alert('保存しました');
        }  
    </script>    
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
                    <a href="favorite.php">お気に入り</a>
                </li>
            </ul>      
            <p class="copyright">&copy; maiko2021</p>
        </footer>         
    </div>    
</body>
</html>    