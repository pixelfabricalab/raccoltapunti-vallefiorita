<?php
namespace common\components;

use yii\base\Component;
use yii\base\Event;

class PuntoEvent extends Event
{
    public $attivita;
    public $valore;
}

class GestorePunti extends Component
{

    const EVENT_ACCREDITO = 'accredito';
    const EVENT_ADDEBITO = 'addebito';

    public function aggiungi($user, $valore, $attivita, $params = [])
    {
        // #TODO
        $event = new PuntoEvent();
        $event->attivita = $attivita;
        $event->valore = $valore;
        $this->trigger(self::EVENT_ACCREDITO, $event);
    }

    public function sottrai($user, $valore, $attivita, $params = [])
    {
        // #TODO
        $event = new PuntoEvent();
        $event->attivita = $attivita;
        $event->valore = $valore;
        $this->trigger(self::EVENT_ADDEBITO, $event);
    }
}