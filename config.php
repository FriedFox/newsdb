<?php
//    соедения с БД
    $newsdb = new mysqli ('127.0.0.1', 'root', '', 'news') or die("Ошибка " . mysqli_error($newsdb)); // тут вводим прям данные ваши: имя юзера, пароль и имя БД, первое поле обычно localhost
    
//     вывод ошибки соединения
    if ($newsdb->connect_error) {
        die ('Ошибка подключения к БД: ( ' . $newsdb->connect_errno . ') '. newsdb_connect_error )
;
    }   

?>