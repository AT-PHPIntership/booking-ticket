<?php
return [
    'admin' => [
        'title' => 'Schedule',
        'list' => [
            'title' => 'List Schedules'
        ],
        'table' => [
            'id' => 'ID',
            'name' => 'Film',
            'room' => 'Room',
            'status' => 'Status',
            'booked' => 'Ticket Booked',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'available' => 'Available',
            'unavailable' => 'Unavailable',
            'edit' => 'Edit',
            'delete' => 'Delete'
        ],
        'add' => [
            'title' => 'Add Schedule',
            'producer' => 'Producer',
            'director' => 'Director',
            'describe' => 'Describe',
            'submit' => 'Submit',
            'edit' => 'Edit',
            'reset' => 'Reset',
            'back' => 'Back',
            'cancel' => 'Cancel',
            'placeholder_name' => 'Enter name Schedule',
            'placeholder_actor' => 'Enter name actor',
            'placeholder_producer' => 'Enter producer',
            'placeholder_director' => 'Enter director',
            'placeholder_duration' => 'Enter duration',
            'placeholder_describe' => 'Enter describe',
            'placeholder_country' => 'Enter country',
            'message' => [
                'require_name' => 'Please enter name Schedule.',
                'require_actor' => 'Please enter actor.',
                'require_producer' => 'Please enter producer.',
                'require_director' => 'Please enter director.',
                'require_duration' => 'Please enter duration.',
                'require_describe' => 'Please enter describe.',
                'require_country' => 'Please enter country.',
                'unique_name' => 'Name Schedule existed please enter another name.',
            ],
        ],
        'edit' => [
            'title' => 'Edit Schedule',
        ],
        'message' => [
            'add' => 'Create New Schedule Successfull!',
            'add_fail' => 'Can not add New Schedule. Please check connect database!',
            'edit' => 'Update Schedule Successfull!',
            'del' => 'Delete Schedule Successfull!',
            'del_fail' => 'Can not Delete Schedule. Please check connect database!',
            'msg_del' => 'Do you want to delete this Schedule?',
        ]
    ]
];
