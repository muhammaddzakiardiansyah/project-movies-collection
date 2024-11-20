# project-movies-collection
Test Interview 3 Rect Media Talenavi

## description project
This simple project CRUD for manage movies collection

## feature
- Show movies collection
- Search movies by title
- Add movies collection
- Update movies collection
- Delete movies collection

## technology
- Laravel 11
- Mysql
- Tailwindcss with daisyui
- Multi select tag


## Installation

Install project-movies-collection with composer & npm


After clone project install composer
```bash
  composer install
```
install node module
```bash
  npm install
```
add this code to .env for configurate database

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=movies_collection
DB_USERNAME=root
DB_PASSWORD=
```

generate key
```bash
  php artisan key:generate
```

and now
```bash
  php artisan serve
  #and
  npm run dev
```

    
## Authors

- [@muhammaddzakiardiansyah](https://www.github.com/muhammaddzakiardiansyah)

