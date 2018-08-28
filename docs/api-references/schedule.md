## Schedule Api

### `GET` seats in schedule
```
/api/schedule_seat/{schedule}
```
Get all seats and booked seats in schedule
#### Request Headers
| Key | Value |
|---|---|
|Accept|application/json

#### Response
```json
{
    "result": {
        "booked": [
            {
                "seat_id": 1,
                "schedule_id": 7
            },
            {
                "seat_id": 2,
                "schedule_id": 7
            },
            {
                "seat_id": 3,
                "schedule_id": 7
            },
            {
                "seat_id": 20,
                "schedule_id": 7
            },
            {
                "seat_id": 54,
                "schedule_id": 7
            },
            {
                "seat_id": 61,
                "schedule_id": 7
            },
            {
                "seat_id": 81,
                "schedule_id": 7
            },
            {
                "seat_id": 172,
                "schedule_id": 7
            },
            {
                "seat_id": 200,
                "schedule_id": 7
            },
            {
                "seat_id": 238,
                "schedule_id": 7
            }
        ],
        "totalSeats": [
            {
                "seat_id": 241,
                "schedule_id": 7
            },
            {
                "seat_id": 242,
                "schedule_id": 7
            },
            {
                "seat_id": 243,
                "schedule_id": 7
            },
            {
                "seat_id": 244,
                "schedule_id": 7
            },
            {
                "seat_id": 245,
                "schedule_id": 7
            },
            {
                "seat_id": 246,
                "schedule_id": 7
            },
            {
                "seat_id": 247,
                "schedule_id": 7
            },
            {
                "seat_id": 248,
                "schedule_id": 7
            },
            {
                "seat_id": 249,
                "schedule_id": 7
            },
            {
                "seat_id": 250,
                "schedule_id": 7
            },
            {
                "seat_id": 251,
                "schedule_id": 7
            },
            {
                "seat_id": 252,
                "schedule_id": 7
            },
            {
                "seat_id": 253,
                "schedule_id": 7
            },
            {
                "seat_id": 254,
                "schedule_id": 7
            },
            {
                "seat_id": 255,
                "schedule_id": 7
            },
            {
                "seat_id": 256,
                "schedule_id": 7
            },
            {
                "seat_id": 257,
                "schedule_id": 7
            },
            {
                "seat_id": 258,
                "schedule_id": 7
            },
            {
                "seat_id": 259,
                "schedule_id": 7
            },
            {
                "seat_id": 260,
                "schedule_id": 7
            },
            {
                "seat_id": 261,
                "schedule_id": 7
            },
            {
                "seat_id": 262,
                "schedule_id": 7
            },
            {
                "seat_id": 263,
                "schedule_id": 7
            },
            {
                "seat_id": 264,
                "schedule_id": 7
            },
            {
                "seat_id": 265,
                "schedule_id": 7
            },
            {
                "seat_id": 266,
                "schedule_id": 7
            },
            {
                "seat_id": 267,
                "schedule_id": 7
            },
            {
                "seat_id": 268,
                "schedule_id": 7
            },
            {
                "seat_id": 269,
                "schedule_id": 7
            },
            {
                "seat_id": 270,
                "schedule_id": 7
            },
            {
                "seat_id": 271,
                "schedule_id": 7
            },
            {
                "seat_id": 272,
                "schedule_id": 7
            },
            {
                "seat_id": 273,
                "schedule_id": 7
            },
            {
                "seat_id": 274,
                "schedule_id": 7
            },
            {
                "seat_id": 275,
                "schedule_id": 7
            },
            {
                "seat_id": 276,
                "schedule_id": 7
            },
            {
                "seat_id": 277,
                "schedule_id": 7
            },
            {
                "seat_id": 278,
                "schedule_id": 7
            },
            {
                "seat_id": 279,
                "schedule_id": 7
            },
            {
                "seat_id": 280,
                "schedule_id": 7
            }
        ]
    },
    "code": 200
}
```