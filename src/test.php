<?php

use taskforce\Task;

require_once 'Task.php';

$agentId = 1;
$customerId = 2;
$task = new Task($agentId, $customerId);

//Для проверки класса, вам понадобится написать тестовый сценарий, который:
//
//Подключит класс и создаст его объект.
//Вызовет методы объекта и проверит, что результат верный.
//Посоветуйтесь с наставником на тему правильного тестирования класса. Например, можно использовать ассерты:
//
//assert($strategy->getNextStatus('action_cancel') == Task::STATUS_CANCEL, 'cancel action');



