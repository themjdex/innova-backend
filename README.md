# Установка

Проект разрабатывался и тестировался на локальной машине (Windows 10). Работа в формате REST API, где бэк на Laravel получает и сохраняет данные в MySQL, а потом возращает по запросу с фронта на React. Для работы требуется npm, artisan.

1. Склонировать и открыть проект с бэкенд-частью. Установить зависимости.
2. Создать у себя БД при помощи дампов c уже имеющейся информацией (database/dump) и отредактировать данные доступа к вашей бд в .env (DB_CONNECTION=
   DB_HOST=
   DB_PORT=
   DB_DATABASE=
   DB_USERNAME=
   DB_PASSWORD=)
3. Запустить в консоли в директории проекта «_php artisan serve_» для запуска локального сервера по умолчанию: http://127.0.0.1:8000
4. Склонировать в отдельную директорию проект фронта https://github.com/themjdex/innova-front, установить зависимости «_npm i_»
5. Запустить «_npm run proxy_» для поднятия прокси-соединения http://localhost:8010/proxy Требуется для разрешения CORS.
6. Запустить дев-режим «_npm run_» для запуска на http://localhost:3000/
7. Теперь фронт и бэк будут взаимодействовать на одном ПК.
