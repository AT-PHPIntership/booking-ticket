## Booking Api

### `GET` Booking
```
/api/booking
```
Get list all booking of user
#### Request Headers
| Key | Value |
|---|---|
|Accept|application/json
|Authorization|Bearer + accessToken

#### Parameter
| para | type | optional |
|---|---|---|
|perpage|int|true
|orderby|string|true
|sortby|ASC/DESC|true

#### Response
```json
{
    "result": {
        "paginator": {
            "current_page": 1,
            "first_page_url": "http://cinema.com/api/booking?page=1",
            "from": 1,
            "last_page": 1,
            "last_page_url": "http://cinema.com/api/booking?page=1",
            "next_page_url": null,
            "path": "http://cinema.com/api/booking",
            "per_page": "2",
            "prev_page_url": null,
            "to": 2,
            "total": 2
        },
        "data": [
            {
                "id": 3,
                "user_id": 114,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "booking_details": [
                    {
                        "id": 5,
                        "booking_id": 3,
                        "ticket_id": 8,
                        "seat_id": 54,
                        "created_at": null,
                        "updated_at": null,
                        "deleted_at": null,
                        "ticket": {
                            "id": 8,
                            "schedule_id": 7,
                            "price": 45000,
                            "type": "Childrent",
                            "created_at": null,
                            "updated_at": null,
                            "deleted_at": null,
                            "schedule": {
                                "id": 7,
                                "film_id": 5,
                                "room_id": 7,
                                "start_time": "2018-08-19 13:12:23",
                                "end_time": "2018-08-19 15:12:23",
                                "created_at": "2018-08-17 04:35:51",
                                "updated_at": "2018-08-17 04:35:51",
                                "deleted_at": null,
                                "film": {
                                    "id": 5,
                                    "name": "Ms. Stephany Lehner",
                                    "actor": "Rahsaan Reichert",
                                    "producer": "Pamela Dooley",
                                    "director": "Charley Buckridge",
                                    "duration": 173,
                                    "describe": "Molestias corporis consequatur quos. Eaque in odit molestiae eum facere non ab. Rerum cumque nobis et saepe et temporibus nihil esse.",
                                    "country": "Mexico",
                                    "start_date": "1999-07-08",
                                    "end_date": "1988-03-24",
                                    "created_at": "2018-08-17 04:35:50",
                                    "updated_at": "2018-08-17 04:35:50",
                                    "deleted_at": null
                                }
                            }
                        }
                    },
                    {
                        "id": 8,
                        "booking_id": 3,
                        "ticket_id": 1,
                        "seat_id": 238,
                        "created_at": null,
                        "updated_at": null,
                        "deleted_at": null,
                        "ticket": {
                            "id": 1,
                            "schedule_id": 7,
                            "price": 60000,
                            "type": "Adult",
                            "created_at": null,
                            "updated_at": null,
                            "deleted_at": null,
                            "schedule": {
                                "id": 7,
                                "film_id": 5,
                                "room_id": 7,
                                "start_time": "2018-08-19 13:12:23",
                                "end_time": "2018-08-19 15:12:23",
                                "created_at": "2018-08-17 04:35:51",
                                "updated_at": "2018-08-17 04:35:51",
                                "deleted_at": null,
                                "film": {
                                    "id": 5,
                                    "name": "Ms. Stephany Lehner",
                                    "actor": "Rahsaan Reichert",
                                    "producer": "Pamela Dooley",
                                    "director": "Charley Buckridge",
                                    "duration": 173,
                                    "describe": "Molestias corporis consequatur quos. Eaque in odit molestiae eum facere non ab. Rerum cumque nobis et saepe et temporibus nihil esse.",
                                    "country": "Mexico",
                                    "start_date": "1999-07-08",
                                    "end_date": "1988-03-24",
                                    "created_at": "2018-08-17 04:35:50",
                                    "updated_at": "2018-08-17 04:35:50",
                                    "deleted_at": null
                                }
                            }
                        }
                    }
                ]
            },
            {
                "id": 8,
                "user_id": 114,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "booking_details": []
            }
        ]
    },
    "code": 200
}
```

### `GET` Booking Detail
```
/api/booking/{id}
```
Get detail of booking
#### Request Headers
| Key | Value |
|---|---|
|Accept|application/json
|Authorization|Bearer + accessToken

#### Parameter
| para | type | optional |
|---|---|---|
|perpage|int|true
|orderby|string|true
|sortby|ASC/DESC|true

#### Response
```json
{
    "result": {
        "paginator": {
            "current_page": 1,
            "first_page_url": "http://cinema.com/api/booking/3?page=1",
            "from": 1,
            "last_page": 1,
            "last_page_url": "http://cinema.com/api/booking/3?page=1",
            "next_page_url": null,
            "path": "http://cinema.com/api/booking/3",
            "per_page": 6,
            "prev_page_url": null,
            "to": 2,
            "total": 2
        },
        "data": [
            {
                "id": 5,
                "booking_id": 3,
                "ticket_id": 8,
                "seat_id": 54,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "ticket": {
                    "id": 8,
                    "schedule_id": 7,
                    "price": 45000,
                    "type": "Childrent",
                    "created_at": null,
                    "updated_at": null,
                    "deleted_at": null,
                    "schedule": {
                        "id": 7,
                        "film_id": 5,
                        "room_id": 7,
                        "start_time": "2018-08-19 13:12:23",
                        "end_time": "2018-08-19 15:12:23",
                        "created_at": "2018-08-17 04:35:51",
                        "updated_at": "2018-08-17 04:35:51",
                        "deleted_at": null,
                        "film": {
                            "id": 5,
                            "name": "Ms. Stephany Lehner",
                            "actor": "Rahsaan Reichert",
                            "producer": "Pamela Dooley",
                            "director": "Charley Buckridge",
                            "duration": 173,
                            "describe": "Molestias corporis consequatur quos. Eaque in odit molestiae eum facere non ab. Rerum cumque nobis et saepe et temporibus nihil esse.",
                            "country": "Mexico",
                            "start_date": "1999-07-08",
                            "end_date": "1988-03-24",
                            "created_at": "2018-08-17 04:35:50",
                            "updated_at": "2018-08-17 04:35:50",
                            "deleted_at": null
                        }
                    }
                },
                "seat": {
                    "id": 54,
                    "room_id": 2,
                    "name": "C4",
                    "status": 1,
                    "created_at": null,
                    "updated_at": null,
                    "room": {
                        "id": 2,
                        "name": "Room 02",
                        "status": 0,
                        "created_at": null,
                        "updated_at": null
                    }
                }
            },
            {
                "id": 8,
                "booking_id": 3,
                "ticket_id": 1,
                "seat_id": 238,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "ticket": {
                    "id": 1,
                    "schedule_id": 7,
                    "price": 60000,
                    "type": "Adult",
                    "created_at": null,
                    "updated_at": null,
                    "deleted_at": null,
                    "schedule": {
                        "id": 7,
                        "film_id": 5,
                        "room_id": 7,
                        "start_time": "2018-08-19 13:12:23",
                        "end_time": "2018-08-19 15:12:23",
                        "created_at": "2018-08-17 04:35:51",
                        "updated_at": "2018-08-17 04:35:51",
                        "deleted_at": null,
                        "film": {
                            "id": 5,
                            "name": "Ms. Stephany Lehner",
                            "actor": "Rahsaan Reichert",
                            "producer": "Pamela Dooley",
                            "director": "Charley Buckridge",
                            "duration": 173,
                            "describe": "Molestias corporis consequatur quos. Eaque in odit molestiae eum facere non ab. Rerum cumque nobis et saepe et temporibus nihil esse.",
                            "country": "Mexico",
                            "start_date": "1999-07-08",
                            "end_date": "1988-03-24",
                            "created_at": "2018-08-17 04:35:50",
                            "updated_at": "2018-08-17 04:35:50",
                            "deleted_at": null
                        }
                    }
                },
                "seat": {
                    "id": 238,
                    "room_id": 6,
                    "name": "I3",
                    "status": 1,
                    "created_at": null,
                    "updated_at": null,
                    "room": {
                        "id": 6,
                        "name": "Room 06",
                        "status": 0,
                        "created_at": null,
                        "updated_at": null
                    }
                }
            }
        ]
    },
    "code": 200
}
```

### `POST` Booking 
```
/api/booking
```
Create booking for user
#### Request Headers
| Key | Value |
|---|---|
|Accept|application/json
|Authorization|Bearer + accessToken

#### Parameter
| para | type | optional |
|---|---|---|
|ticket_id|int|false
|seat_id|array|false

#### Response
```json
{
    "result": {
        "user_id": 109,
        "updated_at": "2018-08-24 03:46:27",
        "created_at": "2018-08-24 03:46:27",
        "id": 30
    },
    "code": 200
}
```

