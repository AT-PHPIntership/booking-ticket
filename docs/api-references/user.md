## User Api

### `GET` User
```
/api/user
```
Get user info
#### Request Headers
| Key | Value |
|---|---|
|Accept|application/json
|Authorization|Bearer +accessToken

#### Response
```json
{
    "result": {
        "id": 3,
        "full_name": "Nasir Walsh II",
        "email": "user01@gmail.com",
        "phone": "877.564.8784",
        "address": "520 Layne Crossroad Suite 314\nPollyburgh, ME 23374-2539",
        "is_active": 0,
        "last_login_at": "2018-08-21 01:06:26",
        "role": 0,
        "remember_token": "JdV3WHS5Xf",
        "created_at": "2018-08-14 06:45:45",
        "updated_at": "2018-08-21 01:06:26",
        "deleted_at": null
    },
    "code": 200
}
```
___

### `PUT` User
```
/api/user
```
Update user info
#### Request Headers
| Key | Value |
|---|---|
|Accept|application/json
|Authorization|Bearer +accessToken

#### Parameter
| Param | Type | Description
|---|---|---
| full_name | string | full name of user
| phone | string | phone of user
| address | string | address of user
| email | string | email of user
| password | string | password of user

#### Response
```json
{
    "result": {
        "id": 3,
        "full_name": "full name",
        "email": "user01@gmail.com",
        "phone": "01695114525",
        "address": "41 Bach Dang",
        "is_active": 0,
        "last_login_at": "2018-08-21 01:06:26",
        "role": 0,
        "remember_token": "JdV3WHS5Xf",
        "created_at": "2018-08-14 06:45:45",
        "updated_at": "2018-08-21 04:27:43",
        "deleted_at": null
    },
    "code": 200
}
```
