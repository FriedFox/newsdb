<?php
    require_once 'header.php';
    require_once 'config.php';
$pageid = $_GET['id'];
//$row = $('');
 // Выполнить запрос. Если ошибка - выводим
    if ($result = $newsdb->query('SELECT id, title, content FROM news WHERE id='.$pageid)) {
        // Выборка результатов запроса
        while ( $row = $result->fetch_assoc() ) {
        echo('<div class="articleList"><h1 class="article-header">' . $row['title'] . '</h1>'
            . '<div class="articleList-announce">' . $row['content'] . '</div></div>');
        }
        // освобождение используемой памяти
        $result->close();   
        // Закрываем соединение
        $newsdb->close();   
    }   
        
?>
<div class="dottedLine"></div>
<a href="news.php" class="linkToArticleList">Все новости >></a>

<?php   require_once 'footer.php'; ?>