<?php

declare(strict_types=1);

namespace App\task;

use Exception;

class TaskState
{
    // STATUSES
    private const STATUS_NEW = 'new';
    private const STATUS_CANCELED = 'canceled';
    private const STATUS_IN_PROGRESS = 'in_progress';
    private const STATUS_COMPLETED = 'completed';
    private const STATUS_FAILED = 'failed';

    /**
     * @return string[]
     */
    private function mapStatusToTitle(): array
    {
        return [
            self::STATUS_NEW => 'Новое',
            self::STATUS_IN_PROGRESS => 'В работе',
            self::STATUS_CANCELED => 'Отменено',
            self::STATUS_COMPLETED => 'Выполнено',
            self::STATUS_FAILED => 'Провалено'
        ];
    }

// ACTIONS

    private const ACTION_AGENT_RESPONSE = 'response';
    private const ACTION_AGENT_REJECT = 'reject';
    private const ACTION_CUSTOMER_DONE = 'done';
    private const ACTION_CUSTOMER_CANCEL = 'cancel';


    /**
     * @return string[]
     */
    private function mapActionToTitle(): array
    {
        return [
            self::ACTION_AGENT_RESPONSE => 'Откликнуться',
            self::ACTION_AGENT_REJECT => 'Отказаться',
            self::ACTION_CUSTOMER_DONE => 'Выполнено',
            self::ACTION_CUSTOMER_CANCEL => 'Отменить'
        ];
    }

    private $agentId;
    private $customerId;
    public $currentStatus;

    /**
     * TaskState constructor.
     * @param string $currentStatus
     * @param int $agentId
     * @param int $customerId
     */
    public function __construct(string $currentStatus, int $agentId, int $customerId)
    {
        $this->agentId = $agentId;
        $this->customerId = $customerId;
        $this->$currentStatus = $currentStatus;
    }


    /**
     * @param string $action
     * @return string
     * @throws Exception
     */
    public function getStatus(string $action): string
    {
         return match ($action) {
             self::ACTION_AGENT_RESPONSE => self::STATUS_IN_PROGRESS,
             self::ACTION_AGENT_REJECT => self::STATUS_FAILED,
             self::ACTION_CUSTOMER_CANCEL => self::STATUS_CANCELED,
             self::ACTION_CUSTOMER_DONE => self::STATUS_COMPLETED,
             default => throw new Exception('Unexpected action value')
         };
    }


    /**
     * @param string $status
     * @return string[]
     * @throws Exception
     */
    public function getAction(string $status): array
    {
        return match ($status) {
            self::STATUS_NEW => [self::ACTION_AGENT_RESPONSE, self::ACTION_CUSTOMER_CANCEL],
            self::STATUS_IN_PROGRESS => [self::ACTION_AGENT_REJECT, self::ACTION_CUSTOMER_DONE],
            default => throw new Exception('Unexpected status value'),
        };
    }

}
