

# CMS - Api

A CMS built with Laravel.

## Install Locally

**Step 1:** Clone this repository

```
git clone https://github.com/bloomcu/cms-api.git
```

<br>

**Step 2:** Change directory into application

```
cd cms-api
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
DB_DATABASE=laravel_ddd
DB_USERNAME=root
DB_PASSWORD=
```

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
```php
php artisan migrate --seed
```

<br>

**Step 8:** Serve application
> Using Valet, run:
```
valet link cms-api
```
Then visit: http://cms-api.test/api/organizations/bloomcu/pages

## Get started

### Authentication

[WIP] - How to get access token for API. Currently, no routes are protected.

### API

[WIP] - API usage instructions coming soon.
