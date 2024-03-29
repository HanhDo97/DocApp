1. sudo docker exec doc_app_server composer install
2. sudo docker exec doc_app_server cp .env.example .env
3. Config env
4. sudo docker exec doc_app_server mkdir -p storage/app/public/user/images
5. sudo docker exec doc_app_server chmod -R 777 storage
6. sudo docker exec doc_app_server php artisan storage:link
7. sudo docker exec doc_app_server php artisan key:generate