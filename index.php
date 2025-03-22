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

$sql = 'SELECT * FROM ' . $types;
if ($genre && $age) {
  $sql = $sql . ' WHERE ' . 'genre="' . $genre . '" and age=' . $age;
} else {
  $sql = $sql . ' WHERE ' . 'genre="' . $genre . '" and age=' . $age;
}



$result = mysqli_query($db, $sql);

$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach ($rows as $row) {
  echo "<tr>";
  echo "<td>" . $row["name"] . " </td>";
  echo "<td>" . $row["genre"] . " </td>";
  echo "<td>" . $row["age"] . "+ </td>";
  echo "<td>" . $row["year"] . " год </td> </br>";
  echo "</tr>";
}
echo "</table>";



?>

<form action="/" method="get">
  <label for="types">Выберите тип просмотра:</label>
  <select class="types" name="types">
    <option value="films">Фильмы</option>
    <option value="serials">Сериалы</option>
  </select>
  <select class="genre" name="genre">
    <option value="Фантастика">Фантастика</option>
    <option value="Комедия">Комедия</option>
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