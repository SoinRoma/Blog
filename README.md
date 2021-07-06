# Blog

При клонировании проетка в PhpStorm нужно заново скачать node_modules(среда предложит)

Для запуска  проекта понадобится локальный сервер OpenServer, который нужно запускать заранее. В нём нужно сделать следущее:
+ В основных настройках поставить галочки на автозапуск сервера и требовать Администратора постоянно.
+ В настройках кодировки выбрать utf-8 и utf-8_general_ci
+ В домменах добавить папки с сайтами, которые будут использоваться.

Затем нужно создать папку в \OpenServer\domains , где будет лежать проект. Открываем эту папку через PhpStorm и делаем следующее:
+ Заходим в Settings\Languages&Frameworks\PHP и выбираем версию PHP (не ниже 7.1)
+ И путь интерпретатора (\OpenServer\modules\php\PHP_7._)

Установка Laravel в проект:
+ Заходим в OpenServer и выбираем консоль
+ Переходим в консоли к папке \OpenServer\domains 
+ Для начала обновить композер composer self-update
+ Вводим для установки Laravel composer create-project laravel/laravel ИмяПапки (например Test)

Установка полезных плагинов:
+ В самом PhpStorm установить плагин Laravel
+ Установить Laravel DebugBar в папке проекта через консоль: composer require barryvdh/laravel-debugbar --dev
+ В проекте в config/app.php прописать в конце: Barryvdh\Debugbar\ServiceProvider::class,
+ Проверить, что в файле .env: APP_DEBUG=true
+ Установить Laravel Ide-helper: composer require --dev barryvdh/laravel-ide-helper
+ В проекте в config/app.php прописать в конце: Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class,
+ Затем в консоле: php artisan ide-helper:generate

Для открытия проекта в браузере вводим следующую команду:
+ php artisan serve

Создание базы данных в проекте:
+ Выбрать в качестве базы Mysql
+ Driver: Mysql for 5.1 User: root Password: root
+ Затем new_Schema и название такое же как и проект (например Test)
+ В файле .env в качестве названия базы данных указать такую же что и создали, а также User: root Password: root.
+ В проекте app/Providers/AppServiceProvider.php в метод boot добавить: Schema::defaultStringLength(191);

Команда для создании моделей и миграций в проекте:
+ php artisan make: model название -m

Команда для удалений всех таблиц и созданий заново:
+ php artisan migrate:fresh

Команда для создания фейковых данных:
+ php artisan make:factory названиеFactory --model=названиеМодели (например Test)

Команда для создание фейковых данных:
++ php artisan migrate:fresh --seed
