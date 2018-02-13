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