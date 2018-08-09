<?php
return [
    'admin' => [
        'title' => 'Ticket',
        'list' => [
            'title' => 'List Ticket'
        ],
        'table' => [
            'id' => 'ID',
            'type' => 'Type',
            'price' => 'Price',
            'schedule_id' => 'ID Schedule',
            'delete' => 'Delete',
            'edit' => 'Edit',
        ],
        'add' => [
            'title' => 'Add Ticket',
            'type' => 'Ticket Type',
            'submit' => 'Submit',
            'reset' => 'Reset',
            'back' => 'Back',
            'cancel' => 'Cancel',
            'edit' => 'Edit',
            'placeholder_type' => 'Ticket Type',
            'placeholder_price' => 'Ticket Price',
            'message' => [
                'require_name' => 'Please enter type ticket.',
                'require_price' => 'Please enter price ticket.',
                'valid_price' => 'Price is a number.',
            ],
        ],
        'edit' => [
            'title' => 'Edit Ticket',
        ],
        'message' => [
            'add' => 'Create New Ticket Successfull!',
            'add_fail' => 'Can not add New Ticket. Please check connect database!',
            'edit' => 'Update Ticket Successfull!',
            'edit_fail' => 'Can not edit Ticket by this Child!',
            'del' => 'Delete Ticket Successfull!',
            'del_fail' => 'Can not Ticket Category. Please check connect database!',
            'msg_del' => 'Do you want to delete this Ticket?',
        ]
    ]
];
