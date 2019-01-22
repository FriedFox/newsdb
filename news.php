
<?php
  require_once 'header.php';
  require_once 'config.php';
    $limitStart = ($_GET['page'] * 5);
    // Выполнить запрос. Если ошибка - выводим
    if ($result = $newsdb->query('SELECT id, title, announce, idate FROM news ORDER BY idate DESC LIMIT '.$limitStart.', 5')) {
        echo '<h1 class="article-header">Новости</h1>';
        // Выборка результатов запроса
        while ( $row = $result->fetch_assoc() ) {
        echo('<div class="articleList"><div class="articleList-title"><span class="articleList-date">'. gmdate("Y.m.d", $row['idate']) .'</span><a href="viev.php?id='.$row['id'].'" class="articleList-link">' . $row['title'] . '</a></div>'
            . '<div class="articleList-announce">' . $row['announce'] . '</div></div>');
        }  
    } 
 ?>

 <div class="dottedLine"></div>
 <div class="pages">
   <?php
    //количество статей в бд
    if ($news = $newsdb->query('SELECT * FROM news')) {
      $pages = ceil(mysqli_num_rows($news) / 5);
    }
    for ($page = 0;$page < $pages;$page++){
      echo('<a class="pages-link" href="/news.php?page='.$page.'">'.($page+1).'</a>');
    }

    // освобождение используемой памяти
    $result->close();   
    // Закрываем соединение
    $newsdb->close(); 
   ?>
 </div>

<?php   require_once 'footer.php'; ?>


