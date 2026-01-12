<?php

namespace Borisey\Yii2Dadata;

use yii\base\Component;

class Dadata extends Component
{
    public string $token;
    public string $secret;

    public function getFirm()
    {
        return $this->token . ' ' . $this->secret;
    }
}