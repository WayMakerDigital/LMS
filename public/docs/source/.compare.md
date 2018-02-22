---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)
<!-- END_INFO -->

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
    "message": "Unauthenticated.",
    "status_code": 401
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
    "message": "Unauthenticated.",
    "status_code": 401
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
    "message": "Unauthenticated.",
    "status_code": 401
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
    "message": "Unauthenticated.",
    "status_code": 401
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

<!-- START_8ae5d428da27b2b014dc767c2f19a813 -->
## api/v1/register

> Example request:

```bash
curl -X POST "http://localhost/api/v1/register" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/register",
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
`POST api/v1/register`


<!-- END_8ae5d428da27b2b014dc767c2f19a813 -->

<!-- START_8c0e48cd8efa861b308fc45872ff0837 -->
## api/v1/login

> Example request:

```bash
curl -X POST "http://localhost/api/v1/login" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/login",
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
`POST api/v1/login`


<!-- END_8c0e48cd8efa861b308fc45872ff0837 -->

<!-- START_080f3ecebb7bcc2f93284b8f5ae1ac3b -->
## api/v1/users

> Example request:

```bash
curl -X GET "http://localhost/api/v1/users" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/users",
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
    "data": [],
    "status_code": 200
}
```

### HTTP Request
`GET api/v1/users`

`HEAD api/v1/users`


<!-- END_080f3ecebb7bcc2f93284b8f5ae1ac3b -->

<!-- START_af851f4cd1f0d32874a712f3319295e6 -->
## api/v1/profile

> Example request:

```bash
curl -X GET "http://localhost/api/v1/profile" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/profile",
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
    "message": "Unauthenticated.",
    "status_code": 401
}
```

### HTTP Request
`GET api/v1/profile`

`HEAD api/v1/profile`


<!-- END_af851f4cd1f0d32874a712f3319295e6 -->

<!-- START_77907084c138b0f6503be46253fe5340 -->
## api/v1/profile/edit

> Example request:

```bash
curl -X PUT "http://localhost/api/v1/profile/edit" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/profile/edit",
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
`PUT api/v1/profile/edit`


<!-- END_77907084c138b0f6503be46253fe5340 -->

<!-- START_fb2ae43e2e99ff4e90f22ba03801a735 -->
## api/v1/logout

> Example request:

```bash
curl -X POST "http://localhost/api/v1/logout" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/logout",
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
`POST api/v1/logout`


<!-- END_fb2ae43e2e99ff4e90f22ba03801a735 -->

<!-- START_3a63c7c4e0aac4f1e2f292fba97ab46b -->
## api/v1/profile/password/edit

> Example request:

```bash
curl -X POST "http://localhost/api/v1/profile/password/edit" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/profile/password/edit",
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
`POST api/v1/profile/password/edit`


<!-- END_3a63c7c4e0aac4f1e2f292fba97ab46b -->

<!-- START_7423f04c3e3eab0779fda86600776e5e -->
## admin

> Example request:

```bash
curl -X GET "http://localhost/admin" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin",
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
null
```

### HTTP Request
`GET admin`

`HEAD admin`


<!-- END_7423f04c3e3eab0779fda86600776e5e -->

<!-- START_fe5fe3a14f04e5648848f1a59ea3da82 -->
## admin/login

> Example request:

```bash
curl -X POST "http://localhost/admin/login" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/login",
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
`POST admin/login`


<!-- END_fe5fe3a14f04e5648848f1a59ea3da82 -->

<!-- START_8173ccc6ee1e47d9fee1d4ff991c4b90 -->
## admin/create

> Example request:

```bash
curl -X GET "http://localhost/admin/create" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/create",
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
null
```

### HTTP Request
`GET admin/create`

`HEAD admin/create`


<!-- END_8173ccc6ee1e47d9fee1d4ff991c4b90 -->

<!-- START_1832f7098e04604e04a2186b694f4df8 -->
## admin/register

> Example request:

```bash
curl -X POST "http://localhost/admin/register" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/register",
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
`POST admin/register`


<!-- END_1832f7098e04604e04a2186b694f4df8 -->

<!-- START_9566a8caf83dacf40a3ebd7e35855d2d -->
## admin/dashboard

> Example request:

```bash
curl -X GET "http://localhost/admin/dashboard" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/dashboard",
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
null
```

### HTTP Request
`GET admin/dashboard`

`HEAD admin/dashboard`


<!-- END_9566a8caf83dacf40a3ebd7e35855d2d -->

<!-- START_e1aed4373d9bf3d6b660961305786744 -->
## admin/logout

> Example request:

```bash
curl -X GET "http://localhost/admin/logout" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/logout",
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
null
```

### HTTP Request
`GET admin/logout`

`HEAD admin/logout`


<!-- END_e1aed4373d9bf3d6b660961305786744 -->

