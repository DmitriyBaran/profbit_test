### Начальные условия ###
На компьютере должен быть установлен docker (желательно, но не обязательно Docker Desktop)  https://docs.docker.com/get-docker/
и docker compose https://docs.docker.com/compose/install/


После чего запускаем проект
```
docker compose up -d
```
запуститься три контейнера - php-fpm, nginx, postgresql


## Начинаем проект Symfony skeleton ##
1. заходим в контейнер

```
docker exec -it php-skeleton  /bin/bash
```
устанавливаем симфу
```
composer install
```

2. Добавляем
```
composer require symfony/orm-pack
composer require --dev symfony/maker-bundle
composer require symfony/security-bundle
```

 Добавляем в .env файл
```
DATABASE_URL="postgresql://usr:97y2amDpm@pg-cmf:5432/usr?serverVersion=15&charset=utf8"
MESSENGER_TRANSPORT_DSN=doctrine://default?auto_setup=0
```

3. Добавляем пользователя и все его миграции
```
php bin/console make:user
```

4. Добавляем анотации и мессенджер


```
  composer require doctrine/annotations
  composer require templates
  composer require form validator
```

5. Создаем форму регистрации
```
   php bin/console make:registration-form
   composer require symfonycasts/verify-email-bundle symfony/mailer
```
6. Устанавливаю меснеджер
```
   composer require messenger
   composer require symfony/doctrine-messenger
```
7. Теперь письма отправляются асинхронно
```
   php bin/console messenger:consume async
 ```

8. Устанавливаю фронтенд
   composer require symfony/webpack-encore-bundle
   composer require symfony/asset
   yarn install
   yarn add bootsrap
   yarn add @fortawesome/fontawesome-free
9.  Сброс пароля
    composer require symfonycasts/reset-password-bundle
10. Форма логина
    php bin/console make:auth
