<?php

namespace Borisey\Yii2Dadata;

use yii\base\Component;

class Dadata extends Component
{
    const CLEANER_URL    = 'https://cleaner.dadata.ru/api/v1/clean/address';
    const SUGGESTION_URL = 'https://suggestions.dadata.ru/suggestions/api/4_1/rs/suggest';

    public string $apiKey;
    public string $secretKey;

    public function getFirm()
    {
        $fields = [
            'query' => 'ooo ромашка'
        ];

        $url = self::SUGGESTION_URL . '/party';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json",
            "Accept: application/json",
            "Authorization: Token " . $this->token
        ));
        curl_setopt($curl, CURLOPT_POST, 1);

        if ($fields != null) {
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($fields));
        } else {
            curl_setopt($curl, CURLOPT_POST, 0);
        }

        $result = curl_exec($curl);
        $info   = curl_getinfo($curl);
        $result = json_decode($result, true);

        return $result;
    }
}