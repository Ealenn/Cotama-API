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
curl -X GET "http://localhost/api/foyer" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/foyer",
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
[
    {
        "foyer": {
            "content": {
                "id": 1,
                "name": "Rogahn, Lynch and Mosciski",
                "key": "5956178ddeb1f",
                "created_at": "2017-06-30 09:19:09",
                "updated_at": "2017-06-30 09:19:09"
            },
            "admin": [
                {
                    "id": 1,
                    "email": "test@test.fr",
                    "pseudo": "Test",
                    "first_name": "Mrs. Kelly Klocko",
                    "last_name": "Assunta Auer DVM",
                    "created_at": "2017-06-30 09:19:09",
                    "updated_at": "2017-06-30 09:19:09"
                }
            ]
        },
        "users": [
            {
                "id": 1,
                "email": "test@test.fr",
                "pseudo": "Test",
                "first_name": "Mrs. Kelly Klocko",
                "last_name": "Assunta Auer DVM",
                "created_at": "2017-06-30 09:19:09",
                "updated_at": "2017-06-30 09:19:09"
            }
        ]
    }
]
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
curl -X GET "http://localhost/api/foyer/{foyer}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/foyer/{foyer}",
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
    "foyer": {
        "content": {
            "id": 1,
            "name": "Rogahn, Lynch and Mosciski",
            "key": "5956178ddeb1f",
            "created_at": "2017-06-30 09:19:09",
            "updated_at": "2017-06-30 09:19:09"
        },
        "admin": [
            {
                "id": 1,
                "email": "test@test.fr",
                "pseudo": "Test",
                "first_name": "Mrs. Kelly Klocko",
                "last_name": "Assunta Auer DVM",
                "created_at": "2017-06-30 09:19:09",
                "updated_at": "2017-06-30 09:19:09"
            }
        ]
    },
    "users": [
        {
            "id": 1,
            "email": "test@test.fr",
            "pseudo": "Test",
            "first_name": "Mrs. Kelly Klocko",
            "last_name": "Assunta Auer DVM",
            "created_at": "2017-06-30 09:19:09",
            "updated_at": "2017-06-30 09:19:09"
        }
    ]
}
```

### HTTP Request
`GET api/foyer/{foyer}`

`HEAD api/foyer/{foyer}`


<!-- END_7a7df1b50aa1375ef017dcbe0a8efed2 -->

<!-- START_c01e1f55495cb6c94decbee03206897e -->
## Créer un foyer | Create house

- Retourne le foyer créé
- Returns the created house

> Example request:

```bash
curl -X POST "http://localhost/api/foyer" \
-H "Accept: application/json" \
    -d "name"="ab" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/foyer",
    "method": "POST",
    "data": {
        "name": "ab"
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
curl -X PUT "http://localhost/api/foyer/{foyer}" \
-H "Accept: application/json" \
    -d "name"="odit" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/foyer/{foyer}",
    "method": "PUT",
    "data": {
        "name": "odit"
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

#UserInFoyers
<!-- START_9137b61e923289cb047f5867a8dbb57c -->
## Rejoindre un foyer | Joining a Home

### Erreurs possible
- 404 : Clef invalide | Invalid key

> Example request:

```bash
curl -X POST "http://localhost/api/foyer/join" \
-H "Accept: application/json" \
    -d "key"="recusandae" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/foyer/join",
    "method": "POST",
    "data": {
        "key": "recusandae"
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

#Users
<!-- START_da5727be600e4865c1b632f7745c8e91 -->
## Retourner l&#039;utilisateur connecté | Return Online User

> Example request:

```bash
curl -X GET "http://localhost/api/users" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users",
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
    "id": 1,
    "email": "test@test.fr",
    "pseudo": "Test",
    "first_name": "Mrs. Kelly Klocko",
    "last_name": "Assunta Auer DVM",
    "created_at": "2017-06-30 09:19:09",
    "updated_at": "2017-06-30 09:19:09"
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
curl -X GET "http://localhost/api/users/{user}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users/{user}",
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
    "id": 1,
    "email": "test@test.fr",
    "pseudo": "Test",
    "first_name": "Mrs. Kelly Klocko",
    "last_name": "Assunta Auer DVM",
    "created_at": "2017-06-30 09:19:09",
    "updated_at": "2017-06-30 09:19:09"
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
curl -X PUT "http://localhost/api/users" \
-H "Accept: application/json" \
    -d "pseudo"="quia" \
    -d "first_name"="quia" \
    -d "last_name"="quia" \
    -d "email"="friesen.hettie@example.com" \
    -d "password"="quia" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users",
    "method": "PUT",
    "data": {
        "pseudo": "quia",
        "first_name": "quia",
        "last_name": "quia",
        "email": "friesen.hettie@example.com",
        "password": "quia"
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
curl -X POST "http://localhost/api/users" \
-H "Accept: application/json" \
    -d "pseudo"="rem" \
    -d "first_name"="rem" \
    -d "last_name"="rem" \
    -d "email"="claire.schumm@example.net" \
    -d "password"="rem" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users",
    "method": "POST",
    "data": {
        "pseudo": "rem",
        "first_name": "rem",
        "last_name": "rem",
        "email": "claire.schumm@example.net",
        "password": "rem"
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
curl -X GET "http://localhost/oauth/authorize" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/oauth/authorize",
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
curl -X POST "http://localhost/oauth/authorize" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/oauth/authorize",
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
curl -X DELETE "http://localhost/oauth/authorize" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/oauth/authorize",
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
curl -X POST "http://localhost/oauth/token" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/oauth/token",
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
curl -X GET "http://localhost/oauth/tokens" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/oauth/tokens",
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
curl -X DELETE "http://localhost/oauth/tokens/{token_id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/oauth/tokens/{token_id}",
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
curl -X POST "http://localhost/oauth/token/refresh" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/oauth/token/refresh",
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
curl -X GET "http://localhost/oauth/clients" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/oauth/clients",
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
curl -X POST "http://localhost/oauth/clients" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/oauth/clients",
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
curl -X PUT "http://localhost/oauth/clients/{client_id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/oauth/clients/{client_id}",
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
curl -X DELETE "http://localhost/oauth/clients/{client_id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/oauth/clients/{client_id}",
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
curl -X GET "http://localhost/oauth/scopes" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/oauth/scopes",
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
curl -X GET "http://localhost/oauth/personal-access-tokens" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/oauth/personal-access-tokens",
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
curl -X POST "http://localhost/oauth/personal-access-tokens" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/oauth/personal-access-tokens",
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
curl -X DELETE "http://localhost/oauth/personal-access-tokens/{token_id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/oauth/personal-access-tokens/{token_id}",
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

