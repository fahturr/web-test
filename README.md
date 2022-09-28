# Web-Test Mundung
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Installation

Duplikat file **.env.example** dan rename menjadi **.env**, lalu isi variable di env tadi sesuai dengan database masing-masing

```dotenv
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

Lakukan installasi dependencies dengan perintah berikut

```bash
composer update
```

Generate key app dengan perintah artisan

```bash
php artisan key:generate
```

Migrasikan table ke database 

```bash
php artisan migrate
```

Jalankan app dengan perintah artisan

```bash
php artisan serve
```

## API Spec

## GET /api/users
Response Body
```json
{
    "status": true,
    "message": "success fetching users data",
    "data": [
        {
            "id": "1",
            "name": "Fahtur Rahman Fauzi",
            "email" : "fahtur@gmail.com"
        }
    ]
}
```