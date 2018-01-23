# Cotama API 
[![Build Status](https://travis-ci.com/Ealenn/Cotama-API.svg?token=pzmEyFi3sozv2AJWbeuN&branch=master)](https://travis-ci.com/Ealenn/Cotama-API) [![Dependency Status](https://www.versioneye.com/user/projects/59ddd48d0fb24f20fe62e78e/badge.svg?style=flat-square)](https://www.versioneye.com/user/projects/59ddd48d0fb24f20fe62e78e) 

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
php artisan passport:client
```

# User Test
- **Email** : dev@cotama.fr
- **Password** : tLH9cAZ3gbfNgaWB
- **Pseudo** : DevTama

# Generate documentation 
```
php artisan api:generate --routePrefix="*"
```

# REST Client
- Client ID: 1
- Client Secret: qL3nVOeC7E9buc1ScNgGugVgdsWOOteVAJezyYce
- Client ID: 2
- Client Secret: 6g3YAN9vSeO6dyuuyWd4B56HjA0wZio3Yt4Y842x