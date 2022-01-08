# to install dependencies from composer.json
```
composer install
composer require laravel/ui

npm install && npm run dev
```

copy .env.example into .env <br/>

- generate key <br/>
```
php artisan key:generate
```
- edit database schema section to match local database created <br/>
- Update Api credentials in **.env** <br/>
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=shopify
DB_USERNAME=root
DB_PASSWORD=
```
# to migrate database
```
php artisan migrate
```
# start server
```
php artisan serve
```

# How to Use
## open in browser
http://127.0.0.1:8080/home

if not a returning user<br/>
**register** and then **login**
otherwise <br/>
**login** using credentials used to register. <br/>

## Functional Requirements
- Click on **Inventory** button to list inventory items
- Each item when clicked upon takes to a details page for that item.

- Click on options in **Action** column to run that particular action
Actions Include: 
1. Create
2. Read
3. Update
4. Delete 



## Additional Features
Click on **Export** to download CSV file of inventory.


# to setup composer
* on mac
```
brew install composer
```
or <br/>
- follow instructions on the page https://getcomposer.org/download/

# to fix node issues(if any)
```
npm i vue-loader
```

# Demo
[Demo](https://github.com/rohit25s/shopify-crud/blob/master/Demo/README.md)