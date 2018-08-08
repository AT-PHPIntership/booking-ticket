<?php
return [
    'admin' => [
        'title' => 'Film',
        'list' => [
            'title' => 'List Films'
        ],
        'table' => [
            'id' => 'ID',
            'name' => 'Name',
            'actor' => 'Actor',
            'duration' => 'Duration',
            'image' => 'Image',
            'country' => 'Country',
            'delete' => 'Delete',
            'edit' => 'Edit',
        ],
        'add' => [
            'title' => 'Add Film',
            'producer' => 'Producer',
            'director' => 'Director',
            'describe' => 'Describe',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'submit' => 'Submit',
            'edit' => 'Edit',
            'reset' => 'Reset',
            'back' => 'Back',
            'cancel' => 'Cancel',
            'placeholder_name' => 'Enter name film',
            'placeholder_actor' => 'Enter name actor',
            'placeholder_producer' => 'Enter producer',
            'placeholder_director' => 'Enter director',
            'placeholder_duration' => 'Enter duration',
            'placeholder_describe' => 'Enter describe',
            'placeholder_country' => 'Enter country',
            'message' => [
                'require_name' => 'Please enter name film.',
                'require_category' => 'Please enter name category.',
                'require_actor' => 'Please enter actor.',
                'require_producer' => 'Please enter producer.',
                'require_start_date' => 'Please enter start date.',
                'require_end_date' => 'Please enter end date.',
                'require_director' => 'Please enter director.',
                'require_duration' => 'Please enter duration.',
                'require_describe' => 'Please enter describe.',
                'require_country' => 'Please enter country.',
                'require_image' => 'Please enter image.',
                'unique_name' => 'Name film existed please enter another name.',
            ],
        ],
        'edit' => [
            'title' => 'Edit Film',
        ],
        'message' => [
            'add' => 'Create New Film Successfull!',
            'add_fail' => 'Can not add New Film. Please check connect database!',
            'edit' => 'Update Film Successfull!',
            'edit_fail' => 'Cannot update by film!',
            'del' => 'Delete Film Successfull!',
            'del_fail' => 'Can not Delete Film. Please check connect database!',
            'msg_del' => 'Do you want to delete this Film?',
        ]
    ]
];
