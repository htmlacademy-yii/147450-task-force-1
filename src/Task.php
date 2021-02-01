<?php


namespace taskforce;
/*
 Детали реализации класса
 в виде констант в классе должны быть перечислены все возможные действия и статусы.
 Константа определяет внутреннее имя для статуса/действия.
 Пример:
  const STATUS_NEW = 'new'

Я использовал эти шаблоны для описания: view.html,  mylist.html
*/

class Task
{следуя пункту

    /*
    класс имеет методы для возврата «карты» статусов и действий.
   Карта — это ассоциативный массив, где ключ — внутреннее имя,
   а значение — названия статуса/действия на русском.
   */
    // STATUSES

    const STATUS_NEW = 'new'; // Новое
    const STATUS_CANCELED = 'canceled'; // Отменено
    const STATUS_WORKING = 'working'; // В работе
    const STATUS_COMPLETED = 'completed'; // Выполнено
    const STATUS_FAILED = 'failed'; // Провалено

    // MAP STATUSES

    public $mapStatus = [
        self::STATUS_NEW => 'Новое', // new => Новое
        self::STATUS_WORKING => 'В работе', // working => В работе
        self::STATUS_CANCELED => 'Отменено', // canceled => Отменено
        self::STATUS_COMPLETED => 'Выполнено', // completed => Выполнено
        self::STATUS_FAILED => 'Провалено' // failed => Провалено
]

    // ACTIONS

    // Исполнитель
    const ACTION_AGENT_RESPONSE = 'response'; // Откликнуться
    const ACTION_AGENT_REJECT = 'reject'; // Отказаться
    // Заказчик
    const ACTION_CUSTOMER_COMPLETED = 'completed'; // Выполнено
    const ACTION_CUSTOMER_CANCEL = 'cancel'; // Отменить


    // MAP ACTIONS

    public $mapAction = [
        //  действия исполнителя
        self::ACTION_AGENT_RESPONSE => 'Откликнуться', // response => Откликнуться
        self::ACTION_AGENT_REJECT => 'Отказаться', // reject => Отказаться
        // действия заказчика
        self::ACTION_CUSTOMER_COMPLETED => 'Выполнено', // completed => Выполнено
        self::ACTION_CUSTOMER_CANCEL => 'Отменить ' // cancel => Отменить
    ];

    /*
    во внутренних свойствах класс хранит id исполнителя и id заказчика.
    Эти значения класс получает в своём конструкторе.
    */

    public $agentId;  //  хранит id исполнителя
    public $customerId; // хранит id заказчика
    public $currentStatus; // хранит текущий статус задания;
    public $currentAction; // хранит текущее действие;

    // Эти значения класс получает в своём конструкторе.
    public function __construct( $agentId, $customerId)
    {
        $this->agentId = $agentId;
        $this->customerId = $customerId;
    }

    /*
     класс имеет метод для получения статуса,
    в которой он перейдёт после выполнения указанного действия
     */
    public function getStatus($currentAction) {
        //
    }

    /*
 класс имеет метод для получения доступных
    действий для указанного статуса
    */
    public function getAction($currentStatus) {
        //
    }
}
