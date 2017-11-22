<?php
if (!empty($_POST['surname']) && !empty($_POST['name'])){
$name=trim(strip_tags($_POST['name']));
$surname=trim(strip_tags($_POST['surname']));
$rasa=trim(strip_tags($_POST['rasa']));

if (isset($_POST['sex'])){
    $sex=$_POST['sex'];
}else {
       $sex="<span style='color:red'>Не определился</span>";
}

if(ctype_digit($_POST['phone'])) {
    $phone=trim(strip_tags($_POST['phone']));
}else{
    $phone = "<span style='color:red'>Пожалуйста введите номер телефона корректно!</span>";
}
    $msg=  "Имя:   $name <br>
              Фамилия: $surname <br>
              Раса: $rasa <br>
              Телефон: $phone <br>
              Пол: $sex <br>";
    }
else {
    $msg = "<span style='color:red'>NUL</span>"; 
}

if (empty($_POST['name']) || empty($_POST['surname']) || !ctype_digit($_POST['phone']) || !isset($_POST['sex'])){
      $push = "<span style='color:red'>NUL</span>";
}
else {
    file_put_contents('BD.txt', $msg, FILE_APPEND);
    $push= "Запись добавлена";
     }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css" type="text/css">
    <script src="https://use.fontawesome.com/e4534d6c3f.js"></script>
    <title>Forms</title>
</head>
<body>
<form method="POST">
<fieldset>
<legend><h3><strong>Паспорт</strong></h3></legend>
<div class="name"><label for="name">Имя</label>
<input type="text" id="name" name="name" placeholder="Вася" value=""><br><br>
<label for="surname">Фамилия</label>
<input type="text" id="surname" name="surname" placeholder="Пупкин" value="">
<br><br>
<label for="ras">Раса</label> 
 <select value="Раса" id="ras" name="rasa">
     <option >Человек</option>
     <option >Синт</option>
     <option>Гуль</option>
     <option>Супермутант</option>
     <option>Робот</option>
 </select><br>
 <br>
 <label for="phone">Телефон</label><input type="text" id="phone" name="phone" placeholder="8 555 555 55 55" value="">
</div>

<div class="gender">
    <span class="fa fa-transgender-alt" aria-hidden="true"></span><br><br>
    <input type="radio" name="sex" id="female" value="Женский"><label for="female"> Женский </label>
    <input type="radio" name="sex" id="male" value="мужской"> <label for="male">Мужик</label>
    <input type="radio" name="sex" id="nun"  value="ХЗ"> <label for="nun">Не понятно</label>
</div>
<div class="clearfix">
<button type="submit">Добавить запись</button>
</div>  
</fieldset>
</form>
<div class="test">
    Добро пожаловать в сеть "РОБКО Индастриз(ТМ)" <br><br>
       <?php 
        echo $msg;
        echo $push;
    ?>
</div>
</body>
</html>