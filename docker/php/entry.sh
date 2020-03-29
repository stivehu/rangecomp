#!/bin/bash


cd /app/web/vendor/dektrium/yii2-user
php ./tests/_app/yii.php migrate/up --migrationPath=/app/web/vendor/dektrium/yii2-user/migrations <<<yes
sleep 100000