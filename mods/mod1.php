<?php
if (!eregi("index.php", $PHP_SELF)) { die ("Access denied"); }
$PAGE_TITLE="Это Я, модуль номер 1!!!";
echo "Это модуль номер 1!<br>";
echo "А <a href='index.php?mod=mod2'>здесь</a> можно
посмотреть на модуль номер 2";
?>