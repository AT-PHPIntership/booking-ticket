## Film Api

### `GET` Films Category
```
/api/films
```
Get item film
#### Request Headers
| Key | Value | 
|---|---|
|Accept|application/json

#### Query Param
| Key | Value | Description |
|---|---|---|
| category | int | Get list Film (require) |

##### Example
| URL | Description |
|---|---|
| /api/films?category=1 | Get list of film |


#### Response
```json
{
    "result": {
        "id": 1,
        "name": "Angeline Bernhard IV",
        "actor": "Myron Swift",
        "producer": "Gerald Marquardt",
        "director": "Osborne Hodkiewicz DVM",
        "duration": 141,
        "describe": "Ut voluptate iure nesciunt rerum sed omnis non. Dicta et blanditiis est esse. Rerum optio earum incidunt aperiam sed recusandae. Non quidem numquam hic minus.",
        "country": "New Zealand",
        "start_date": "2018-08-16",
        "end_date": "2018-08-31",
        "created_at": "2018-08-13 08:28:47",
        "updated_at": "2018-08-17 02:56:56",
        "deleted_at": null,
        "categories": "Taryn Pagac",
        "image_path": "images/upload/1534753663-jt29L-end-game.jpg",
        "price_formated": "60,000",
        "caterory_films": [
            {
                "id": 6,
                "category_id": 4,
                "film_id": 1,
                "created_at": null,
                "updated_at": null
            }
        ],
        "images": [
            {
                "id": 30,
                "film_id": 1,
                "path": "images/upload/1534753663-jt29L-end-game.jpg",
                "created_at": "2018-08-20 08:27:43",
                "updated_at": "2018-08-20 08:27:43",
                "deleted_at": null
            }
        ],
        "schedules": [
            {
                "id": 1,
                "film_id": 1,
                "room_id": 4,
                "start_time": "2018-08-21 20:06:20",
                "end_time": "2018-08-21 22:06:20",
                "created_at": "2018-08-13 08:28:48",
                "updated_at": "2018-08-13 08:28:48",
                "deleted_at": null,
                "tickets": [
                    {
                        "id": 4,
                        "schedule_id": 1,
                        "price": 60000,
                        "type": "Adult",
                        "created_at": null,
                        "updated_at": null,
                        "deleted_at": null
                    }
                ]
            }
        ]
    },
    "code": 200
}
```
