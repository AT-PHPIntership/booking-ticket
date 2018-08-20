## Film Api

### `GET` New Films
```
/api/new/films
```
Get list all new films
#### Request Headers
| Key | Value |
|---|---|
|Accept|application/json
#### Query Param
| Key | Value | Description |
|---|---|---|
| perpage | int | paginate for page Film |
#### Response
```json
{
    "result": {
        "paginator": {
            "current_page": 1,
            "first_page_url": "http://cinema.com/api/new/films?page=1",
            "from": 1,
            "last_page": 2,
            "last_page_url": "http://cinema.com/api/new/films?page=2",
            "next_page_url": "http://cinema.com/api/new/films?page=2",
            "path": "http://cinema.com/api/new/films",
            "per_page": 5,
            "prev_page_url": null,
            "to": 5,
            "total": 8
        },
        "data": [
            {
                "id": 9,
                "name": "Nettie Schmeler",
                "actor": "Prof. Monroe Leffler II",
                "producer": "Dr. Giovanni Rogahn DDS",
                "director": "Josefina Yundt",
                "duration": 155,
                "describe": "Ab ea rerum fugit inventore suscipit. Aut culpa officia consectetur est et. Esse eligendi consectetur beatae et amet. Est consequatur possimus alias ullam quaerat.",
                "country": "Faroe Islands",
                "start_date": "2018-08-17",
                "end_date": "2018-08-23",
                "created_at": "2018-08-13 08:28:47",
                "updated_at": "2018-08-17 02:53:44",
                "deleted_at": null,
                "image_path": "images/upload/825.jpg",
                "price_formated": "60,000",
                "images": [
                    {
                        "id": 17,
                        "film_id": 9,
                        "path": "images/upload/825.jpg",
                        "created_at": "2018-08-13 08:28:47",
                        "updated_at": "2018-08-13 08:28:47",
                        "deleted_at": null
                    },
                    {
                        "id": 18,
                        "film_id": 9,
                        "path": "images/upload/21.jpg",
                        "created_at": "2018-08-13 08:28:47",
                        "updated_at": "2018-08-13 08:28:47",
                        "deleted_at": null
                    }
                ],
                "schedules": [
                    {
                        "id": 9,
                        "film_id": 9,
                        "room_id": 6,
                        "start_time": "2018-08-18 10:22:37",
                        "end_time": "2018-08-18 12:22:37",
                        "created_at": "2018-08-13 08:28:48",
                        "updated_at": "2018-08-13 08:28:48",
                        "deleted_at": null,
                        "tickets": [
                            {
                                "id": 9,
                                "schedule_id": 9,
                                "price": 60000,
                                "type": "Adult",
                                "created_at": null,
                                "updated_at": null,
                                "deleted_at": null
                            }
                        ]
                    }
                ]
            }
        ],
    "code": 200
}
```

### `GET` Feature Films
```
/api/feature/films
```
Get list all feature films
#### Request Headers
| Key | Value |
|---|---|
|Accept|application/json
#### Query Param
| Key | Value | Description |
|---|---|---|
| perpage | int | paginate for page Film |
#### Response
```json
{
    "result": {
        "paginator": {
            "current_page": 2,
            "first_page_url": "http://cinema.com/api/feature/films?page=1",
            "from": 6,
            "last_page": 2,
            "last_page_url": "http://cinema.com/api/feature/films?page=2",
            "next_page_url": null,
            "path": "http://cinema.com/api/feature/films",
            "per_page": 5,
            "prev_page_url": "http://cinema.com/api/feature/films?page=1",
            "to": 8,
            "total": 8
        },
        "data": [
            {
                "id": 8,
                "name": "Tabitha Parisian",
                "actor": "Dr. Jakob Jacobi",
                "producer": "Lauriane Littel",
                "director": "Myrtle Reilly",
                "duration": 153,
                "describe": "Asperiores veritatis delectus vel ipsum voluptas ipsam aperiam nulla. Sed non impedit quibusdam sapiente. Aut quos facilis quod ad placeat. Ex illo ex quia quia consectetur.",
                "country": "Hong Kong",
                "start_date": "2018-08-15",
                "end_date": "2018-08-25",
                "created_at": "2018-08-13 08:28:47",
                "updated_at": "2018-08-17 02:54:06",
                "deleted_at": null,
                "image_path": "images/upload/74.jpg",
                "price_formated": "60,000",
                "images": [
                    {
                        "id": 15,
                        "film_id": 8,
                        "path": "images/upload/74.jpg",
                        "created_at": "2018-08-13 08:28:47",
                        "updated_at": "2018-08-13 08:28:47",
                        "deleted_at": null
                    },
                    {
                        "id": 16,
                        "film_id": 8,
                        "path": "images/upload/59.jpg",
                        "created_at": "2018-08-13 08:28:47",
                        "updated_at": "2018-08-13 08:28:47",
                        "deleted_at": null
                    }
                ],
                "schedules": [
                    {
                        "id": 7,
                        "film_id": 8,
                        "room_id": 1,
                        "start_time": "2018-08-15 17:52:15",
                        "end_time": "2018-08-15 19:52:15",
                        "created_at": "2018-08-13 08:28:48",
                        "updated_at": "2018-08-13 08:28:48",
                        "deleted_at": null,
                        "tickets": [
                            {
                                "id": 15,
                                "schedule_id": 7,
                                "price": 60000,
                                "type": "Adult",
                                "created_at": "2018-08-17 07:12:00",
                                "updated_at": "2018-08-17 07:12:00",
                                "deleted_at": null
                            }
                        ]
                    }
                ]
            }
        }
    "code": 200
}
```
