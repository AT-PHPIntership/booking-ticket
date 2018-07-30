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
                'msg_require_name' => 'Please enter name film.',
                'msg_require_actor' => 'Please enter actor.',
                'msg_require_producer' => 'Please enter producer.',
                'msg_require_director' => 'Please enter director.',
                'msg_require_duration' => 'Please enter duration.',
                'msg_require_describe' => 'Please enter describe.',
                'msg_require_country' => 'Please enter country.',
                'msg_require_image' => 'Please enter image.',
                'msg_size_image' => 'The image has size too big.',
                'msg_unique_name' => 'Name film existed please enter another name.',
            ],
        ],
        'edit' => [
            'title' => 'Edit Film',
        ],
        'message' => [
            'add' => 'Create New Film Successfull!',
            'add_fail' => 'Can not add New Film. Please check connect database!',
            'edit' => 'Update Film Successfull!',
            'del' => 'Delete Film Successfull!',
            'del_fail' => 'Can not Delete Film. Please check connect database!',
            'msg_del' => 'Do you want to delete this Film?',
        ]
    ]
];
