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
{
    // STATUSES
    //----------------------------------------------

    const STATUS_NEW = 'new'; // Новые
    const STATUS_ACTIVE = 'active'; // Активные
    const STATUS_CANCELED = 'canceled'; // Отменённые
    const STATUS_COMPLETED = 'completed'; // Завершённые
    const STATUS_OVERDUE = 'overdue'; // Просроченные


    // ACTIONS
    //----------------------------------------------

    // Исполнитель
    const ACTION_AGENT_RESPONSE = 'response'; // Откликнуться
    const ACTION_AGENT_REFUSE = 'refuse'; // Отказаться
    const ACTION_AGENT_PROBLEM = 'problem'; // Возникли проблемы
    const ACTION_AGENT_COMPLETE = 'complete'; // Завершить
    // Заказчик
    const ACTION_CUSTOMER_CONFIRM = 'confirm'; // Подтвердить
    const ACTION_CUSTOMER_DENY = 'deny'; // Отказать (refuse????)

    /*
     класс имеет методы для возврата «карты» статусов и действий.
    Карта — это ассоциативный массив, где ключ — внутреннее имя,
    а значение — названия статуса/действия на русском.
    */

    // MAP STATUSES

    public $mapStatus = [
        self::STATUS_NEW => 'Новые', // new => Новые
        self::STATUS_ACTIVE => 'Активные', // active => Активные
        self::STATUS_CANCELED => 'Отменённые', // canceled => Отменённые
        self::STATUS_COMPLETED => 'Завершённые', // completed => Завершённые
        self::STATUS_OVERDUE => 'Просроченные' // overdue => Просроченные
    ];

    // MAP STATUSES

    public $mapAction = [
        //  действия исполнителя
        self::ACTION_AGENT_RESPONSE => 'Откликнуться', // response => Откликнуться
        self::ACTION_AGENT_REFUSE => 'Отказаться', // refuse => Отказаться
        self::ACTION_AGENT_PROBLEM => 'Возникли проблемы', // problem => Возникли проблемы
        self::ACTION_AGENT_COMPLETE => 'Завершить ', // complete => Завершить
        // действия заказчика
        self::ACTION_CUSTOMER_CONFIRM => 'Подтвердить', // confirm => Подтвердить
        self::ACTION_CUSTOMER_DENY => 'Отказать' // deny => Отказать (refuse????)
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
    public function getMapStatus($currentAction) {
        //
    }

    /*
 класс имеет метод для получения доступных
    действий для указанного статуса
    */
    public function getMapAction($currentStatus) {
        //
    }
}
