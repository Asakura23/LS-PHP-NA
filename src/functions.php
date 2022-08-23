<?php
/*
Функция должна принимать массив строк и выводить каждую строку в отдельном параграфе (тег <p>)
Если в функцию передан второй параметр true, то возвращать (через return) результат в виде одной объединенной строки.
 */
function task1($array = array(),$parameter = false)
{
    if ($parameter==true){
        $string=implode($array);
        return $string;
    }
    foreach ($array as $string) {
        echo '<p>' . $string . '</p>';
    }
}
/*
Функция должна принимать переменное число аргументов.
Первым аргументом обязательно должна быть строка, обозначающая арифметическое действие, которое необходимо выполнить со всеми передаваемыми аргументами.
Остальные аргументы это целые и/или вещественные числа.
Пример вызова: calcEverything(‘+’, 1, 2, 3, 5.2);
Результат: 1 + 2 + 3 + 5.2 = 11.2
 */
function task2(string $mathAction,...$arrayNumbers)
{
    $result=$arrayNumbers[0];
    if ($mathAction=='+'){
        foreach (array_slice($arrayNumbers,1) as $number){
            $result=$result+$number;
        }
    }elseif ($mathAction=='-'){
        foreach (array_slice($arrayNumbers,1) as $number){
            $result=$result-$number;
        }
    }elseif ($mathAction=='*'){
        foreach (array_slice($arrayNumbers,1) as $number){
            $result=$result*$number;
        }
    }elseif ($mathAction=='/'){
        foreach (array_slice($arrayNumbers,1) as $number){
            $result=$result/$number;
        }
    }
    echo $result.'<br>';
}

/*
Функция должна принимать два параметра – целые числа.
Если в функцию передали 2 целых числа, то функция должна отобразить таблицу умножения размером со значения параметров, переданных в функцию. (Например если передано 8 и 8, то нарисовать от 1х1 до 8х8). Таблица должна быть выполнена с использованием тега <table>
В остальных случаях выдавать корректную ошибку.
 */
function task3($x,$y)
{
    if(is_int($x)!==true || is_int($y)!==true){
        throw new Exception('X или Y не целое число');
    }
    echo ("<table cellpadding='1' border = '1'>");
        for($top = 0; $top <= $x; $top++) {
        echo'<tr>';
        for($side = 0; $side <= $y; $side++)
        {
            $product=$side*$top;
            echo '<td>';
            if($side==0&&$top==0) {echo 'X';continue;}
            if($side==0) {echo $top;continue;}
            if($top==0) {echo $side;continue;}
            echo $product;
        }
    }
    echo ('</table>');
}
/*
Выведите информацию о текущей дате в формате 31.12.2016 23:59
Выведите unixtime время соответствующее 24.02.2016 00:00:00.
 */
function task4()
{
    date_default_timezone_set('Europe/Moscow');
    echo date('j.m.Y H:i')."<br>";
    echo strtotime('24.02.2016 00:00:00').'<br>';
}
/*
Дана строка: “Карл у Клары украл Кораллы”. Удалить из этой строки все заглавные буквы “К”.
Дана строка: “Две бутылки лимонада”. Заменить “Две”, на “Три”.
 */
function task5()
{
    $stringFirst='Карл у Клары украл Кораллы';
    $stringSecond='Две бутылки лимонада';

    echo str_replace('К','',$stringFirst).'<br>';
    echo str_replace('Две','Три',$stringSecond).'<br>';
}
/*
Создайте файл test.txt средствами PHP. Поместите в него текст - “Hello again!”
Напишите функцию, которая будет принимать имя файла, открывать файл и выводить содержимое на экран.
 */
function createFile()
{
    $text='Hello again!';
    $file=fopen('test.txt','w');
    fwrite($file,$text);
    fclose($file);
}
function task6($filename)
{
    echo file_get_contents($filename);
}
/*
1.Программно создайте массив из 50 пользователей, у каждого пользователя есть поля id, name и age:
id - уникальный идентификатор, равен номеру эл-та в массиве
name - случайное имя из 5-ти возможных (сами придумайте каких)
age - случайное число от 18 до 45
2.Преобразуйте массив в json и сохраните в файл users.json
3.Откройте файл users.json и преобразуйте данные из него обратно ассоциативный массив РНР.
4.Посчитайте количество пользователей с каждым именем в массиве
5.Посчитайте средний возраст пользователей
 */
function task7()
{
    $names=array("Peter", "Boris", "Dmitrii", "Gleb", "Ivan");
    for ($i = 0; $i < 50;){
        $nameKey = array_rand($names);
        $age = mt_rand(18,45);
        $users[$i] = [
            "id" => $i,
            "name" =>$names[$nameKey],
            "age" => $age
        ];
        $i++;
    }

    file_put_contents('users.json',json_encode($users));
    $usersJson=file_get_contents('users.json');
    $users=json_decode($usersJson,true);

    foreach ($names as $name){
    $k=0;
        foreach ($users as $key){
            if(in_array($name,$key)){
                $k++;
            }
        }
        if ($k==1){
            echo (PHP_EOL."$k пользователь с именем '$name'");
        }elseif ($k==2 || $k==3){
            echo (PHP_EOL."$k пользователя с именем '$name'");
        }else {
            echo(PHP_EOL . "$k пользователей с именем '$name'");
        }
    }

    $ageUsers=[];
    foreach ($users as $user){
        $ageUsers[]=$user['age'];
    }
    $averageAge=array_sum($ageUsers)/50;
    echo (PHP_EOL.'Средний возраст пользователей '.$averageAge);
}

