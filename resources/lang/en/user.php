<?php
return [
    'admin' => [
        'title' => 'User',
        'list' => [
            'title' => 'List Users'
        ],
        'table' => [
            'id' => 'ID',
            'name' => 'Fullname',
            'email' => 'Email',
            'address' => 'Address',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'delete' => 'Delete',
            'edit' => 'Edit',
        ],
        'add' => [
            'title' => 'Add User',
            'name' => 'Fullname',
            'email' => 'Email',
            'address' => 'Address',
            'gender' => 'Gender',
            'male' => 'Male',
            'female' => 'Female',
            'submit' => 'Submit',
            'edit' => 'Edit',
            'reset' => 'Reset',
            'back' => 'Back',
            'cancel' => 'Cancel',
            'placeholder_name' => 'Enter fullname',
            'placeholder_email' => 'Enter email address',
            'placeholder_address' => 'Enter your address',
        ],
        'edit' => [
            'title' => 'Edit User',
        ],
        'message' => [
            'add' => 'Create New User Successfull!',
            'add_fail' => 'Can not add New User. Please check connect database!',
            'edit' => 'Update User Successfull!',
            'del' => 'Delete Category Successfull!',
            'del_fail' => 'Can not Delete User. Please check connect database!',
            'msg_del' => 'Do you want to delete this User?',
        ]
    ]
];
