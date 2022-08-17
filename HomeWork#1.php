<?php

const TOTAL_DRAWINGS = 80;
const PEN_DRAWINGS = 23;
const PENCIL_DRAWINGS = 40;

function exercise1()
{
    $name= "Николай";
    $age= "21";
    echo("Меня зовут: $name \n");
    echo("Мне $age год \n");
    echo("“!|/’”\\\n");
}

exercise1();

function exercise2()
{
    $knownAmount= PEN_DRAWINGS+PENCIL_DRAWINGS;
    $paintDrawings= TOTAL_DRAWINGS-$knownAmount;
    echo("На школьной выставке $paintDrawings картин краской\n");
}

exercise2();

function exercise3()
{
    $max=100;
    $min=1;
    $retirementAge=65;
    $carierStartAge=18;
    $age=rand(0,150);
    if ($age>$max || $age<$min){
       echo("Неизвестный возраст");
    } else {
        if ($age >= $carierStartAge && $age <= $retirementAge) {
            echo("Вам еще работать и работать");
        } elseif ($age > $retirementAge) {
            echo("Вам пора на пенсию");
        } elseif ($age <= $carierStartAge - $min && $age >= $min) {
            echo("Вам ещё рано работать");
        }
    }
    echo("\n");
}

exercise3();

function exercise4()
{
    $day=rand(0,10);
    switch ($day)
    {
        case 1;
        case 2;
        case 3;
        case 4;
        case 5;
            echo "Это рабочий день\n";
            break;
        case 6;
        case 7;
            echo "Это выходной день\n";
            break;
        default;
            echo "Неизвестный день\n";
            break;
    }

}

exercise4();

function exercise5()
{
    $cars = array (
        "BMW" => array(
            "model" => "X5",
            "speed" => 120,
            "doors" => 5,
            "year" => 2015
        ),
        "Toyota" => array(
            "model" => "Camry",
            "speed" => 210,
            "doors" => 4,
            "year" => 2020
        ),
        "Opel" => array(
            "model" => "Astra",
            "speed" => 110,
            "doors" => 3,
            "year" => 2009
        )
    );
    $arr = array("BMW", "Toyota", "Opel");
    foreach ($arr as $value){
        echo "CAR $value \n";
        print_r(implode(" ", $cars["$value"])."\n");
    }
}

exercise5();


