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
                "seat_id": 1,
                "schedule_id": 7
            },
            {
                "seat_id": 1,
                "schedule_id": 7
            },
            {
                "seat_id": 1,
                "schedule_id": 7
            },
            {
                "seat_id": 1,
                "schedule_id": 7
            },
            {
                "seat_id": 1,
                "schedule_id": 7
            },
            {
                "seat_id": 1,
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
            }
        ]
    },
    "code": 200
}
```