## Category Api

### `GET` Categories
```
/api/categories
```
Get list all categories
#### Request Headers
| Key | Value |
|---|---|
|Accept|application/json

#### Response
```json
{
    "result": [
        {
            "id": 1,
            "name": "Emie Daugherty",
            "created_at": "2018-08-13 08:28:47",
            "updated_at": "2018-08-13 08:28:47"
        },
        {
            "id": 2,
            "name": "Mrs. Krystal Gutmann II",
            "created_at": "2018-08-13 08:28:47",
            "updated_at": "2018-08-13 08:28:47"
        },
        {
            "id": 3,
            "name": "Josh Bednar",
            "created_at": "2018-08-13 08:28:47",
            "updated_at": "2018-08-13 08:28:47"
        },
        {
            "id": 4,
            "name": "Taryn Pagac",
            "created_at": "2018-08-13 08:28:47",
            "updated_at": "2018-08-13 08:28:47"
        },
        {
            "id": 5,
            "name": "Prof. Jerrell Stark",
            "created_at": "2018-08-13 08:28:47",
            "updated_at": "2018-08-13 08:28:47"
        }
    ],
    "code": 200
}
```