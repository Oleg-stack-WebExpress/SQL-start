<?php require_once('templates/header.php') ?>

<?php

$db = mysqli_connect('127.0.0.1', 'root', '', 'mysite');

if (!$db) {
  echo 'Ошибка при работе с БД!';
  exit();
}

$types = $_GET['types'] ?? 0;
$genre = $_GET['genre'] ?? 0;
$age = $_GET['age'] ?? 0;
print_r($genre);
print_r($age);

$sql = 'SELECT * FROM ' . $types;

if ($genre && $age) {
  $sql = $sql . 'genre=' . $genre . ' and age=' . $age;
}

print_r($sql);
$result = mysqli_query($db, $sql);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach ($rows as $row) {
  echo 'Жанр: ' . $row['genre'] . '. Возрастной рейтинг: ' . $row['age'] . '</br>';
}


?>

<form action="/" method="get">
  <label for="types">Выберите тип просмотра:</label>
  <select class="types" name="types">
    <option value="films">Фильмы</option>
    <option value="serials">Сериалы</option>
  </select>
  <select class="genre" name="genre">
    <option value="fantasy">Фантастика</option>
    <option value="comedy">Комедия</option>
  </select>
  <select class="age" name="age">
    <option value="0">0+</option>
    <option value="12">12+</option>
    <option value="16">16+</option>
    <option value="18">18+</option>
  </select>
  <button type="submit">Показать результат</button>
</form>



<?php require_once('templates/footer.php') ?>