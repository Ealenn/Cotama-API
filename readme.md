# Cotama API 
[![Build Status](https://travis-ci.com/Ealenn/Cotama-API.svg?token=pzmEyFi3sozv2AJWbeuN&branch=master)](https://travis-ci.com/Ealenn/Cotama-API) 

![](https://github.com/Ealenn/Cotama-API/blob/master/.pictures/graph.png?raw=true)

# Documentation 
> Read the Docs: [https://ealenn.github.io/Cotama-API](https://ealenn.github.io/Cotama-API)
```
composer generate-docs
```

# Install 
```sh
composer install
cp .env.exemple .env
php artisan key:generate
```

> Dev env
```sh
php artisan migrate
php artisan db:seed
php artisan passport:client --password
```

# User Test
- **Email** : dev@cotama.fr
- **Password** : tLH9cAZ3gbfNgaWB
- **Pseudo** : DevTama

# Config Vars
- APP_ENV=prod
- APP_URL=...
- APP_KEY=...
- APP_DEBUG=false
- APP_LOG_LEVEL=debug

> Database
- DB_CONNECTION=mysql
- DB_DATABASE=...
- DB_PASSWORD=...
- DB_USERNAME=...

## Mailgun
> Mail
- MAIL_DRIVER=mailgun
- MAIL_FROM_NAME=Cotama

> MailGun
- MAILGUN_DOMAIN=...
- MAILGUN_PUBLIC_KEY=...
- MAILGUN_SMTP_LOGIN=...
- MAILGUN_SMTP_SERVER=smtp.mailgun.org
- MAILGUN_SMTP_PASSWORD=...
- MAILGUN_API_KEY=...
- MAILGUN_SECRET=...
- MAILGUN_SMTP_PORT=587

## Maildev
> Mail
- MAIL_DRIVER=smtp
- MAIL_HOST=localhost
- MAIL_PORT=1025
- MAIL_USERNAME=null
- MAIL_PASSWORD=null
- MAIL_ENCRYPTION=null