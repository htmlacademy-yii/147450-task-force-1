<?php

use App\TaskState;

$agentId = 1;
$customerId = 2;
$currentState = 'in_progress';

$task = new TaskState($currentState, $agentId, $customerId);

//Для проверки класса, вам понадобится написать тестовый сценарий, который:
//
//Подключит класс и создаст его объект.
//Вызовет методы объекта и проверит, что результат верный.
//Посоветуйтесь с наставником на тему правильного тестирования класса. Например, можно использовать ассерты:
//
//assert($strategy->getNextStatus('action_cancel') == Task::STATUS_CANCEL, 'cancel action');
assert($task->getStatus('response') == TaskState::STATUS_IN_PROGRESS, 'В работе');
