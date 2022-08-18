<h1 align="center">Blog</h1>

## Описание
Многострачное приложение для создание постов. Присуствует авторизация на сайте. Не авторизованный 
пользователь может только просматривать посты. Авторизованный уже может создавать свои посты и редактировать их.
Присуствует также поиск постов по их названию.

### Используемые технологии
![PHP](https://img.shields.io/badge/-PHP-black?style=flat-square&logo=php&logoColor=php)
![Laravel](https://img.shields.io/badge/-Laravel-black?style=flat-square&logo=laravel&logoColor=laravel)

### Используемые плагины/библиотеки
[![LaravelIdeHelper](https://img.shields.io/badge/-LaravelIdeHelper-black?style=flat-square&logo=laravelidehelper&logoColor=laravelidehelper)](https://github.com/barryvdh/laravel-ide-helper)
[![LaravelDebugbar](https://img.shields.io/badge/-LaravelDebugbar-black?style=flat-square&logo=laraveldebugbar&logoColor=laraveldebugbar)](https://github.com/barryvdh/laravel-debugbar)

### Предварительные действия

1 - Установить локальный сервер [OpenServer](https://ospanel.io/).

2 - Настроить OpenServer:
+ В основных настройках поставить галочки на "Автозапуск сервера" и "Требовать учётную запись Администратора".
+ В настройках кодировки выбрать utf-8 и utf-8_general_ci.
+ В настройках доменах добавить папку с проектом.

3 - Установить Composer для проекта:
+ Заходим в OpenServer и выбираем консоль.
+ Переходим в консоли к папке \OpenServer\domains\laravel-blog.
+ Обновить композер.
```
composer install
```

4 - Настроить PhpStorm:
+ Заходим в настройки и переходим в раздел Settings\Languages&Frameworks.
+ Дальше в разделе PHP выбираем версию(не ниже 7.1).
+ И указываем путь для интерпретатора (\OpenServer\modules\php\PHP_7.1\php.exe).
+ Установить плагин Laravel.

5 - Создание базы данных в проекте:
+ Выбрать в качестве базы Mysql.
+ Установить драйвер:(Mysql for 5.1). 
+ Указать имя пользователя и пароль(User: root Password: root).
+ Затем добавить new_Schema с таким же названием, как и проект (blog).
+ В файле .env в качестве названия базы данных указать такую же что и создали, а также User: root Password: root.
```
copy example.env .env
```

### Запуск проекта


1 - Установить все зависимости(IDE предложит сама их скачать).
```
npm install
```

2 - Команда для удалений всех таблиц:
```
php artisan migrate:fresh
```

3 - Команда для создание фейковых данных:
```
php artisan migrate:fresh --seed
```
Примечание: Фейкер для изображений не работает!

4 - Связать папки storage и public:
```
php artisan storage:link
```

5 - Запуск проекта:
```
php artisan serve
```
