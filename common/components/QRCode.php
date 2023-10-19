<?php
namespace common\components;

use chillerlan\QRCode\QRCode as Base;
use yii\base\BaseObject;

class QRCode extends BaseObject
{
    public static $instance;

    public static function getInstance()
    {
        if (self::$instance) {
            return self::$instance;
        }
        self::$instance = new Base();
        return self::$instance;
    }

    public function render($data)
    {
        $qrcode = self::getInstance()->render($data);
        return $qrcode;
    }
}