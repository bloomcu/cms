

# CMS - API

A CMS built with Laravel.

[![Run in Postman](https://run.pstmn.io/button.svg)](https://app.getpostman.com/run-collection/1241377-f9df69bb-99bb-4b14-94db-091e123e18cf?action=collection%2Ffork&collection-url=entityId%3D1241377-f9df69bb-99bb-4b14-94db-091e123e18cf%26entityType%3Dcollection%26workspaceId%3Da8e39e6f-193c-49f5-8474-38b7e2bfe224)

## Install Locally

**Step 1:** Clone this repository

```
git clone https://github.com/bloomcu/cms.git
```

<br>

**Step 2:** Change directory into application

```
cd cms
```

<br>

**Step 3:** Install dependencies

```
composer install
```

<br>

**Step 4:** Copy **env.example** and rename to **.env**
> Example database connection:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cms
DB_USERNAME=root
DB_PASSWORD=
```

If using MYSQL in MAMP, set the DB_SOCKET param in .env to path to MAMP's mysql.sock
```
DB_SOCKET=/Applications/MAMP/tmp/mysql/mysql.sock
```

<br>

**Step 5:** Add AWS access keys to **.env**
> Get this from Harmon
```
AWS_ACCESS_KEY_ID=[FROM HARMON]
AWS_SECRET_ACCESS_KEY=[FROM HARMON]
AWS_DEFAULT_REGION=us-west-1
AWS_BUCKET=
```

<br>

**Step 6:** Generate unique app key

```php
php artisan key:generate
```

<br>

**Step 7:** Migrate and seed database
> Make sure you have a local database called "cms"
```php
php artisan migrate --seed
```

<br>

**Step 8:** Serve application
> If you use Valet, run within project:
```
valet link cms
```
Then visit: http://cms.test/api/organizations/bloomcu/pages

<br>

> If you just use Artisan CLI, run within project:
```
php artisan serve
```
Then visit: http://127.0.0.1:8000

## Get started

### Authentication

[WIP] - How to get access token for API. Currently, no routes are protected.

<br>

### API

[WIP] - API usage instructions coming soon.
