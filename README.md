1. sudo docker exec doc_app_server composer install
2. sudo docker exec doc_app_server cp .env .env.example
3. Config env
4. sudo docker exec doc_app_server chmod -R 777 storage
5. 