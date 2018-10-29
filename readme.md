#作業手順

## UUID と JWTのための準備
composer.jsonのrequireに下記を追加する  
https://jwt-auth.readthedocs.io/en/develop/laravel-installation/
```$xslt
"moontoast/math": "^1.1", // laravel 5.6 では、まだこれが必要
"tymon/jwt-auth": "1.0.0-rc.2"
```

## JWTの準備
下準備
```$xslt
php artisan make:auth
php artisan migrate
```
JWT用のシークレットキーを生成する
```$xslt
php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
php artisan jwt:secret
```

## vueの準備
```$xslt
npm insall vuetify
npm insall vue-router
```