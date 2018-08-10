<?php
return [
    'admin' => [
        'title' => 'Booking',
        'list' => [
            'title' => 'Bookings'
        ],
        'table' => [
            'id' => 'ID',
            'email' => 'Email',
            'name' => 'Full Name',
            'room' => 'Room',
            'film' => 'Film',
            'seat' => 'Seat',
            'quantity' => 'Quantity',
            'price' => 'Price',
            'start_time' => 'Start',
            'end_time' => 'End',
            'delete' => 'Delete',
            'show' => 'Show',
        ],
        'show' => [
            'title' => 'Booking detail',
        ],
        'edit' => [
            'title' => 'Edit Category',
        ],
        'message' => [
            'show' => 'Welcome to booking detail!',
            'show_fail' => 'Can not open booking detail!',
            'del' => 'Delete Booking Successfull!',
            'del_fail' => 'Can not Delete Booking. Please check connect database!',
            'msg_del' => 'Do you want to delete this Booking?',
            'empty_data' => 'No data are bookings',
        ]
    ]
];
