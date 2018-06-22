---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Powered by Documentarian</a>
- <a href='https://www.linkedin.com/in/rudymarchandise/'>Rudy Marchandise</a>
---
<!-- START_INFO -->
# Informations

## HTTP errors

> 401 : Unauthorized
- L'accès requiert une connection valide
- Access requires a valid connection

```json
{
  "error" : "Unauthenticated."
}
```

> 403 : Forbidden
- L'utilisateur connecté n'as pas accès a cette ressource
- The connected user does not have access to this resource

```json
{
  "error" : "Forbidden."
}
```

> 422 Unprocessable Entity
- Les paramètres envoyés ne sont pas valide
- Parameters sent is not valid

```json
{
  "email" : [
     "The email must be a valid email address."
  ],
  "champ" : [
    "error"
  ]
}
```

## Authentification

### URL
- /oauth/token

### Type
- Content-Type : application/x-www-form-urlencoded

### Form data
- grant_type : password
- username : XXX
- password : XXX
- client_id : 1
- client_secret : IT63wuce0swwvlsw6B9z8MBGoh8qwU6D9yr6zAUA
- scope : *

### Return
#### 200 = OK

{
"token_type": "Bearer",
"expires_in": 31536000,
"access_token": "...",
"refresh_token": "..."
}


#### 401 Unauthorized

{
"error": "invalid_credentials",
"message": "The user credentials were incorrect."
}


### Use Header HTTP
Authorization = token_type + ' ' + access_token
<!-- END_INFO -->

#Foyers
<!-- START_de5a48c7818171ce92e1d824e4cd4875 -->
## Tout les foyers | All homes

- Retourne tout les foyer de l'utilisateur connecté
- Returns all home of the logged-in user

> Example request:

```bash
curl -X GET "http://cotama.fr/api/foyer" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://cotama.fr/api/foyer",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET api/foyer`

`HEAD api/foyer`


<!-- END_de5a48c7818171ce92e1d824e4cd4875 -->

<!-- START_7a7df1b50aa1375ef017dcbe0a8efed2 -->
## Foyer specifique | Specified home

- Retourne un foyer spécifique
- Returns a specific home

### /!\ **Attention : Warning**
- L'utilisateur connecté doit faire partie du foyer
- The connected user must be part of the household

### Paramètre : Parameter
- {foyer} : id

> Example request:

```bash
curl -X GET "http://cotama.fr/api/foyer/{foyer}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://cotama.fr/api/foyer/{foyer}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET api/foyer/{foyer}`

`HEAD api/foyer/{foyer}`


<!-- END_7a7df1b50aa1375ef017dcbe0a8efed2 -->

<!-- START_6c8efa33a0c8fe8409cee99129cb6609 -->
## Supprimer un Foyer / Remove house

### /!\ **Attention : Warning**
- L'utilisateur doit être admin du foyer
- The user must be admin of home

> Example request:

```bash
curl -X DELETE "http://cotama.fr/api/foyer/{foyer}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://cotama.fr/api/foyer/{foyer}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/foyer/{foyer}`


<!-- END_6c8efa33a0c8fe8409cee99129cb6609 -->

<!-- START_c01e1f55495cb6c94decbee03206897e -->
## Créer un foyer | Create house

- Retourne le foyer créé
- Returns the created house

> Example request:

```bash
curl -X POST "http://cotama.fr/api/foyer" \
-H "Accept: application/json" \
    -d "name"="quis" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://cotama.fr/api/foyer",
    "method": "POST",
    "data": {
        "name": "quis"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/foyer`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | Minimum: `4` Maximum: `255`

<!-- END_c01e1f55495cb6c94decbee03206897e -->

<!-- START_4d7099742e20f2613e6210e4998fee3a -->
## Modifier un foyer | Update house

### /!\ **Attention : Warning**
- L'utilisateur doit être admin du foyer
- The user must be admin of home

### Paramètre URL : URL Parameter
- {foyer} : id

> Example request:

```bash
curl -X PUT "http://cotama.fr/api/foyer/{foyer}" \
-H "Accept: application/json" \
    -d "name"="rem" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://cotama.fr/api/foyer/{foyer}",
    "method": "PUT",
    "data": {
        "name": "rem"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/foyer/{foyer}`

`PATCH api/foyer/{foyer}`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  optional  | Minimum: `4` Maximum: `255`

<!-- END_4d7099742e20f2613e6210e4998fee3a -->

#Houseworks
<!-- START_9f8ea28c6bf36d820356b1cb172ba73a -->
## Display a listing of the housework.

> Example request:

```bash
curl -X GET "http://cotama.fr/api/houseworks" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://cotama.fr/api/houseworks",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET api/houseworks`

`HEAD api/houseworks`


<!-- END_9f8ea28c6bf36d820356b1cb172ba73a -->

<!-- START_8cbe4189e842b53a930eba9dae6aa973 -->
## Display the specified housework.

> Example request:

```bash
curl -X GET "http://cotama.fr/api/houseworks/{housework}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://cotama.fr/api/houseworks/{housework}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET api/houseworks/{housework}`

`HEAD api/houseworks/{housework}`


<!-- END_8cbe4189e842b53a930eba9dae6aa973 -->

#Prefs
<!-- START_d71c378762157563de4d10104d7a083f -->
## Display a listing of the prefs.

> Example request:

```bash
curl -X GET "http://cotama.fr/api/prefs" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://cotama.fr/api/prefs",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET api/prefs`

`HEAD api/prefs`


<!-- END_d71c378762157563de4d10104d7a083f -->

<!-- START_4e7bcf4b482040f680c092c6f8c7ca78 -->
## Display the specified prefs.

> Example request:

```bash
curl -X GET "http://cotama.fr/api/prefs/{housework}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://cotama.fr/api/prefs/{housework}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET api/prefs/{housework}`

`HEAD api/prefs/{housework}`


<!-- END_4e7bcf4b482040f680c092c6f8c7ca78 -->

<!-- START_5d786797c226ebaa55b4c034ca38ce14 -->
## Display the specified prefs for user.

> Example request:

```bash
curl -X GET "http://cotama.fr/api/prefs/user/{user}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://cotama.fr/api/prefs/user/{user}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET api/prefs/user/{user}`

`HEAD api/prefs/user/{user}`


<!-- END_5d786797c226ebaa55b4c034ca38ce14 -->

<!-- START_4989095ed1b5119e8a21c7d6901f6a32 -->
## Update prefs

> Example request:

```bash
curl -X PUT "http://cotama.fr/api/prefs/{housework}" \
-H "Accept: application/json" \
    -d "rating"="1" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://cotama.fr/api/prefs/{housework}",
    "method": "PUT",
    "data": {
        "rating": 1
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/prefs/{housework}`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    rating | numeric |  optional  | Minimum: `0` Maximum: `5`

<!-- END_4989095ed1b5119e8a21c7d6901f6a32 -->

#UserInFoyers
<!-- START_9137b61e923289cb047f5867a8dbb57c -->
## Rejoindre un foyer | Joining a Home

### Erreurs possible
- 403 : Clef invalide | Invalid key

### Return
Foyer with users

> Example request:

```bash
curl -X POST "http://cotama.fr/api/foyer/join" \
-H "Accept: application/json" \
    -d "key"="corporis" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://cotama.fr/api/foyer/join",
    "method": "POST",
    "data": {
        "key": "corporis"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/foyer/join`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    key | string |  required  | 

<!-- END_9137b61e923289cb047f5867a8dbb57c -->

<!-- START_d690b89fd056b6bf29878d7ad0a7c6de -->
## Exclure un membre / Exclude member

### Erreurs possible
- 403 : pas les droits nécessaires ou le membre n'est pas dans le foyer

### Return
Foyer with users

> Example request:

```bash
curl -X DELETE "http://cotama.fr/api/foyer/{foyer}/exclude/{user}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://cotama.fr/api/foyer/{foyer}/exclude/{user}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/foyer/{foyer}/exclude/{user}`


<!-- END_d690b89fd056b6bf29878d7ad0a7c6de -->

#Users
<!-- START_da5727be600e4865c1b632f7745c8e91 -->
## Retourner l&#039;utilisateur connecté | Return Online User

> Example request:

```bash
curl -X GET "http://cotama.fr/api/users" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://cotama.fr/api/users",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET api/users`

`HEAD api/users`


<!-- END_da5727be600e4865c1b632f7745c8e91 -->

<!-- START_8f99b42746e451f8dc43742e118cb47b -->
## Retourner un profil spécifique | Returns a specific profile

### /!\ **Attention : Warning**
- Les utilisateurs doivent partager au moins un foyer
- Users must share at least one household

### Paramètre URL : URL Parameter
- {user} : id

> Example request:

```bash
curl -X GET "http://cotama.fr/api/users/{user}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://cotama.fr/api/users/{user}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET api/users/{user}`

`HEAD api/users/{user}`


<!-- END_8f99b42746e451f8dc43742e118cb47b -->

<!-- START_0a07cb408968adde6dfafb716b43cf0d -->
## Modifier l&#039;utilisateur connecté | Edit user logged in

- Retourne l'utilisateur modifier
- Returns the user edited

> Example request:

```bash
curl -X PUT "http://cotama.fr/api/users" \
-H "Accept: application/json" \
    -d "pseudo"="non" \
    -d "first_name"="non" \
    -d "last_name"="non" \
    -d "email"="macejkovic.dorian@example.net" \
    -d "password"="non" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://cotama.fr/api/users",
    "method": "PUT",
    "data": {
        "pseudo": "non",
        "first_name": "non",
        "last_name": "non",
        "email": "macejkovic.dorian@example.net",
        "password": "non"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/users`

`PATCH api/users`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    pseudo | string |  optional  | Minimum: `4` Maximum: `255`
    first_name | string |  optional  | Minimum: `2` Maximum: `255`
    last_name | string |  optional  | Minimum: `2` Maximum: `255`
    email | email |  optional  | Minimum: `5` Maximum: `255`
    password | string |  optional  | Minimum: `6` Maximum: `255`

<!-- END_0a07cb408968adde6dfafb716b43cf0d -->

<!-- START_12e37982cc5398c7100e59625ebb5514 -->
## Création d&#039;un utilisateur | Creating a user

- Retourne l'utilisateur créé
- Return created user

> Example request:

```bash
curl -X POST "http://cotama.fr/api/users" \
-H "Accept: application/json" \
    -d "pseudo"="ut" \
    -d "first_name"="ut" \
    -d "last_name"="ut" \
    -d "email"="nakia.mcclure@example.org" \
    -d "password"="ut" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://cotama.fr/api/users",
    "method": "POST",
    "data": {
        "pseudo": "ut",
        "first_name": "ut",
        "last_name": "ut",
        "email": "nakia.mcclure@example.org",
        "password": "ut"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/users`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    pseudo | string |  required  | Minimum: `4` Maximum: `255`
    first_name | string |  required  | Minimum: `2` Maximum: `255`
    last_name | string |  required  | Minimum: `2` Maximum: `255`
    email | email |  required  | Minimum: `5` Maximum: `255`
    password | string |  required  | Minimum: `6` Maximum: `255`

<!-- END_12e37982cc5398c7100e59625ebb5514 -->

#general
<!-- START_57011a4e29c6bc1cfec9270de49657bf -->
## Authorize a client to access the user&#039;s account.

> Example request:

```bash
curl -X GET "http://cotama.fr/oauth/authorize" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://cotama.fr/oauth/authorize",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "unsupported_grant_type",
    "message": "The authorization grant type is not supported by the authorization server.",
    "hint": "Check the `grant_type` parameter"
}
```

### HTTP Request
`GET oauth/authorize`

`HEAD oauth/authorize`


<!-- END_57011a4e29c6bc1cfec9270de49657bf -->

<!-- START_e48cc6a0b45dd21b7076ab2c03908687 -->
## Approve the authorization request.

> Example request:

```bash
curl -X POST "http://cotama.fr/oauth/authorize" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://cotama.fr/oauth/authorize",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST oauth/authorize`


<!-- END_e48cc6a0b45dd21b7076ab2c03908687 -->

<!-- START_de5d7581ef1275fce2a229b6b6eaad9c -->
## Deny the authorization request.

> Example request:

```bash
curl -X DELETE "http://cotama.fr/oauth/authorize" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://cotama.fr/oauth/authorize",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE oauth/authorize`


<!-- END_de5d7581ef1275fce2a229b6b6eaad9c -->

<!-- START_a09d20357336aa979ecd8e3972ac9168 -->
## Authorize a client to access the user&#039;s account.

> Example request:

```bash
curl -X POST "http://cotama.fr/oauth/token" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://cotama.fr/oauth/token",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST oauth/token`


<!-- END_a09d20357336aa979ecd8e3972ac9168 -->

<!-- START_e96d5ebaecbbcd30089fa499c8d21792 -->
## Get all of the authorized tokens for the authenticated user.

> Example request:

```bash
curl -X GET "http://cotama.fr/oauth/tokens" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://cotama.fr/oauth/tokens",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET oauth/tokens`

`HEAD oauth/tokens`


<!-- END_e96d5ebaecbbcd30089fa499c8d21792 -->

<!-- START_a9a802c25737cca5324125e5f60b72a5 -->
## Delete the given token.

> Example request:

```bash
curl -X DELETE "http://cotama.fr/oauth/tokens/{token_id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://cotama.fr/oauth/tokens/{token_id}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE oauth/tokens/{token_id}`


<!-- END_a9a802c25737cca5324125e5f60b72a5 -->

<!-- START_abe905e69f5d002aa7d26f433676d623 -->
## Get a fresh transient token cookie for the authenticated user.

> Example request:

```bash
curl -X POST "http://cotama.fr/oauth/token/refresh" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://cotama.fr/oauth/token/refresh",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST oauth/token/refresh`


<!-- END_abe905e69f5d002aa7d26f433676d623 -->

<!-- START_258e7e83c3ea28db7720e63d358b33ff -->
## Get all of the clients for the authenticated user.

> Example request:

```bash
curl -X GET "http://cotama.fr/oauth/clients" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://cotama.fr/oauth/clients",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET oauth/clients`

`HEAD oauth/clients`


<!-- END_258e7e83c3ea28db7720e63d358b33ff -->

<!-- START_9eabf8d6e4ab449c24c503fcb42fba82 -->
## Store a new client.

> Example request:

```bash
curl -X POST "http://cotama.fr/oauth/clients" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://cotama.fr/oauth/clients",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST oauth/clients`


<!-- END_9eabf8d6e4ab449c24c503fcb42fba82 -->

<!-- START_784aec390a455073fc7464335c1defa1 -->
## Update the given client.

> Example request:

```bash
curl -X PUT "http://cotama.fr/oauth/clients/{client_id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://cotama.fr/oauth/clients/{client_id}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT oauth/clients/{client_id}`


<!-- END_784aec390a455073fc7464335c1defa1 -->

<!-- START_1f65a511dd86ba0541d7ba13ca57e364 -->
## Delete the given client.

> Example request:

```bash
curl -X DELETE "http://cotama.fr/oauth/clients/{client_id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://cotama.fr/oauth/clients/{client_id}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE oauth/clients/{client_id}`


<!-- END_1f65a511dd86ba0541d7ba13ca57e364 -->

<!-- START_6eec11382f34d0f08c826d2813b02d04 -->
## Get all of the available scopes for the application.

> Example request:

```bash
curl -X GET "http://cotama.fr/oauth/scopes" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://cotama.fr/oauth/scopes",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET oauth/scopes`

`HEAD oauth/scopes`


<!-- END_6eec11382f34d0f08c826d2813b02d04 -->

<!-- START_b4c3e68afae3c4de78758b62c49ac9a9 -->
## Get all of the personal access tokens for the authenticated user.

> Example request:

```bash
curl -X GET "http://cotama.fr/oauth/personal-access-tokens" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://cotama.fr/oauth/personal-access-tokens",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET oauth/personal-access-tokens`

`HEAD oauth/personal-access-tokens`


<!-- END_b4c3e68afae3c4de78758b62c49ac9a9 -->

<!-- START_a8dd9c0a5583742e671711f9bb3ee406 -->
## Create a new personal access token for the user.

> Example request:

```bash
curl -X POST "http://cotama.fr/oauth/personal-access-tokens" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://cotama.fr/oauth/personal-access-tokens",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST oauth/personal-access-tokens`


<!-- END_a8dd9c0a5583742e671711f9bb3ee406 -->

<!-- START_bae65df80fd9d72a01439241a9ea20d0 -->
## Delete the given token.

> Example request:

```bash
curl -X DELETE "http://cotama.fr/oauth/personal-access-tokens/{token_id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://cotama.fr/oauth/personal-access-tokens/{token_id}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE oauth/personal-access-tokens/{token_id}`


<!-- END_bae65df80fd9d72a01439241a9ea20d0 -->

<!-- START_abe97f4173b4ee64872c2ff688bb1cad -->
## Toutes les missions | All missions

- Retourne toutes les missions de l'utilisateur connecté
- Returns all missions of the logged-in user

> Example request:

```bash
curl -X GET "http://cotama.fr/api/missions/foyer/{foyer}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://cotama.fr/api/missions/foyer/{foyer}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET api/missions/foyer/{foyer}`

`HEAD api/missions/foyer/{foyer}`


<!-- END_abe97f4173b4ee64872c2ff688bb1cad -->

<!-- START_2d3ccbdb1fa2c60b3ed1a0069a6114e8 -->
## Récupère une mission.

> Example request:

```bash
curl -X GET "http://cotama.fr/api/missions/{mission}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://cotama.fr/api/missions/{mission}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET api/missions/{mission}`

`HEAD api/missions/{mission}`


<!-- END_2d3ccbdb1fa2c60b3ed1a0069a6114e8 -->

<!-- START_ed6d342a30de35cc6a82b0af8fa7754e -->
## Récupère toutes les missions de l&#039;user connecté.

> Example request:

```bash
curl -X GET "http://cotama.fr/api/missions" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://cotama.fr/api/missions",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET api/missions`

`HEAD api/missions`


<!-- END_ed6d342a30de35cc6a82b0af8fa7754e -->

<!-- START_0f8dc4f49711cd79142de64901bc1c21 -->
## Ajoute une mission.

> Example request:

```bash
curl -X POST "http://cotama.fr/api/missions" \
-H "Accept: application/json" \
    -d "title"="quia" \
    -d "date_start"="quia" \
    -d "housework_ids"="quia" \
    -d "foyer_id"="11" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://cotama.fr/api/missions",
    "method": "POST",
    "data": {
        "title": "quia",
        "date_start": "quia",
        "housework_ids": "quia",
        "foyer_id": 11
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/missions`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    title | string |  required  | Minimum: `4` Maximum: `255`
    date_start | string |  required  | 
    housework_ids | array |  required  | 
    foyer_id | integer |  required  | 

<!-- END_0f8dc4f49711cd79142de64901bc1c21 -->

<!-- START_c118162ba23f33e62a6474875004ec20 -->
## Suppression d&#039;une mission.

> Example request:

```bash
curl -X DELETE "http://cotama.fr/api/missions/{mission}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://cotama.fr/api/missions/{mission}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/missions/{mission}`


<!-- END_c118162ba23f33e62a6474875004ec20 -->

