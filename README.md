Ratchet Socket.io Yii2
===============================
# Настройки

### Install
- Install composer packages `composer update`
- Edit `common\config\main-local.php`
- Загрузить таблици `yii_rest.sql`
- Папка `www` точка входа

### Ratchet
- запустить ratchet socket in console: php bin/run.php
- зайти site.ru/handlebars/statuses

### Socket.io
- в директории bin/ in console: npm install
- в директории frontend/views/handlebars/chat.php 73 строка `var socket = io('http://89.252.49.108:3000', {
        transports: ['websocket']
});` указать свой айпи или localhost
- запустить socket.io in console: node bin/chat.js
- зайти site.ru/handlebars/chat
- нужно залогинится username: root, password: qwerty




