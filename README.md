## Quraşdırılma

1. Clone
```bash
git clone https://github.com/shahmar10/coffee-shop
```
2. cd into your project
```bash
cd projectName
```
3. install composer Dependencies
```bash
composer install
```
4. Create a copy of your .env file
```bash
cp .env.example .env
```
5. Generate an app encryption key
```bash
php artisan key:generate
```
6. Create an empty database for our application.
In the .env file, add database information to allow Laravel to connect to the database.
7. Migrate the database with dummy data
```bash
php artisan migrate --seed
```

## Istifadə

Miqdari secib add tiklayiriq.

![image](https://user-images.githubusercontent.com/78316758/132636187-b827b52e-5df4-4190-85ff-9cee4fc7f760.png)

Product sebete elave olunur.
![image](https://user-images.githubusercontent.com/78316758/132636466-f68b2580-5cc9-40b8-bc7f-da6495209908.png)

Sebetden sifarisi sile ve ya sifarisi tamamlaya bilerik 
![image](https://user-images.githubusercontent.com/78316758/132636627-be0fa86b-cb61-4a6c-b399-e59838c4ed23.png)

Sifarisi tamamlamaq ucun unvan ve telefon qeyd edirik.
![image](https://user-images.githubusercontent.com/78316758/132636708-9db67f6b-679c-460b-bb8c-147b28f58df9.png)

Order siyahisini admin panelde gormek ucun link/admin/orders

![image](https://user-images.githubusercontent.com/78316758/132655017-33266d14-e121-43a6-a342-7616b2204f8a.png)
