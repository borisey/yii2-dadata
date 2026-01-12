# Yii2 Dadata

```shell
composer require borisey/yii2-dadata:"dev-main" --dev
```

`config/web.php`

```shell
    'components' => [
        'dadata' => [
            'class'  => \Borisey\Yii2Dadata\Dadata::class,
            'token'  => 'token',
            'secret' => 'secret'
        ],
    ],
```

```shell
$dadata = \Yii::$app->dadata;
$firm   = $dadata->getFirm();

echo '<pre>';
print_r($firm);
die();
```

