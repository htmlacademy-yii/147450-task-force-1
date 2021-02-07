<?php

use App\task\TaskState;

$agentId = 1;
$customerId = 2;
$currentState = 'in_progress';

$task = new TaskState($currentState, $agentId, $customerId);

assert($task->getStatus('response') == TaskState::STATUS_IN_PROGRESS, 'В работе');
