<?php

declare(strict_types=1);

namespace App;
/*
 Детали реализации класса
 в виде констант в классе должны быть перечислены все возможные действия и статусы.
 Константа определяет внутреннее имя для статуса/действия.
 Пример:
  const STATUS_NEW = 'new'
*/

//это не совсем Task, это скорее TaskState, примерно как это https://refactoring.guru/ru/design-patterns/state
use Exception;

class TaskState
{

    /*
    класс имеет методы для возврата «карты» статусов и действий.
   Карта — это ассоциативный массив, где ключ — внутреннее имя,
   а значение — названия статуса/действия на русском.
   */
    // STATUSES

    private const STATUS_NEW = 'new'; // Новое
    private const STATUS_CANCELED = 'canceled'; // Отменено
    //минорно, но обычно in_progress обозначают
    public const STATUS_IN_PROGRESS = 'in_progress'; // В работе
    private const STATUS_COMPLETED = 'completed'; // Выполнено
    private const STATUS_FAILED = 'failed'; // Провалено

    // MAP STATUSES
    // класс имеет методы для возврата «карты» статусов и действий

    /**
     * @return string[]
     */
    private function mapStatusToTitle(): array
    {

        return [
            self::STATUS_NEW => 'Новое', // new => Новое
            self::STATUS_IN_PROGRESS => 'В работе', // in_progress => В работе
            self::STATUS_CANCELED => 'Отменено', // canceled => Отменено
            self::STATUS_COMPLETED => 'Выполнено', // completed => Выполнено
            self::STATUS_FAILED => 'Провалено' // failed => Провалено
        ];
    }

// ACTIONS

// Исполнитель
    private const ACTION_AGENT_RESPONSE = 'response'; // Откликнуться
    private const ACTION_AGENT_REJECT = 'reject'; // Отказаться
// Заказчик
    private const ACTION_CUSTOMER_DONE = 'done'; // Выполнено
    private const ACTION_CUSTOMER_CANCEL = 'cancel'; // Отменить


// MAP ACTIONS
// класс имеет методы для возврата «карты» статусов и действий

    /**
     * @return string[]
     */
    private function mapActionToTitle(): array
    {
        return [
            //  действия исполнителя
            self::ACTION_AGENT_RESPONSE => 'Откликнуться', // response => Откликнуться
            self::ACTION_AGENT_REJECT => 'Отказаться', // reject => Отказаться
            // действия заказчика
            self::ACTION_CUSTOMER_DONE => 'Выполнено', // done => Выполнено
            self::ACTION_CUSTOMER_CANCEL => 'Отменить' // cancel => Отменить
        ];
    }


    /*
    во внутренних свойствах класс хранит id исполнителя и id заказчика.
    Эти значения класс получает в своём конструкторе.
    */

    private $agentId;  //  хранит id исполнителя
    private $customerId; // хранит id заказчика
    public $currentStatus; // хранит текущий статус задания;


// Эти значения класс получает в своём конструкторе.
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

// возвращать имя статуса, в который перейдёт задание после выполнения конкретного действия.


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
        /*switch ($action) {
            case self::ACTION_AGENT_RESPONSE:
                return self::STATUS_IN_PROGRESS;
            case self::ACTION_AGENT_REJECT:
                return  self::STATUS_FAILED;
            case self::ACTION_CUSTOMER_CANCEL:
                return  self::STATUS_CANCELED;
            case self::ACTION_CUSTOMER_DONE:
                return  self::STATUS_COMPLETED;
            default:
                throw new Exception('Unexpected action value');
        }*/
    }


    // определять список доступных действий в текущем статусе

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

        /*switch ($status) {
            case self::STATUS_NEW:
                return [self::ACTION_AGENT_RESPONSE, self::ACTION_CUSTOMER_CANCEL];
            case self::STATUS_IN_PROGRESS:
                return [self::ACTION_AGENT_REJECT, self::ACTION_CUSTOMER_DONE];
            default:
                throw new Exception('Unexpected status value');
        }*/
    }

}
