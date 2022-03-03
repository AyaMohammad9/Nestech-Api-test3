 
## Requirement
 1. Create .env file and then copy content of .env.example
 2. Create Database with name:nestech and don't forget edit username & password belong to your information
 3. Run php artisan migrate
 4. Run php artisan db:seed
 5. Run php artisan serve


## Api Route
1. Login :http://127.0.0.1:8000/api/auth/login

2. View other posts : http://127.0.0.1:8000/api/posts

3. View my post :http://127.0.0.1:8000/api/user/posts

4. Create post :http://127.0.0.1:8000/api/posts/create

5. Update post :http://127.0.0.1:8000/api/posts/1/update

6. Delete post :http://127.0.0.1:8000/api/posts/2/delete

7. Add comment :http://127.0.0.1:8000/api/posts/1/comment

## Magic Instructions
1. php artisan route:cache
2. php artisan route:clear
3. php artisan config:cache
4. php artisan config:clear
5. php artisan optimize
