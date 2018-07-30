<?php
return [
    'admin' => [
        'title' => 'User',
        'list' => [
            'title' => 'List Users'
        ],
        'table' => [
            'id' => 'ID',
            'name' => 'Full name',
            'email' => 'Email',
            'address' => 'Address',
            'phone' => 'Phone',
            'is_active' => 'Status',
            'last_login' => 'Last logged',
            'role' => 'Role',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'delete' => 'Delete',
            'edit' => 'Edit',
            'admin' => 'Admin',
            'user' => 'User',
            'active' => 'Active',
            'inactive' => 'Inactive'
        ],
        'add' => [
            'title' => 'Add User',
            'name' => 'Full name',
            'email' => 'Email',
            'password' => 'Password',
            'phone' => 'Phone',
            'address' => 'Address',
            'gender' => 'Gender',
            'male' => 'Male',
            'female' => 'Female',
            'submit' => 'Submit',
            'edit' => 'Edit',
            'reset' => 'Reset',
            'back' => 'Back',
            'cancel' => 'Cancel',
            'placeholder_name' => 'Enter full name',
            'placeholder_email' => 'Enter email address',
            'placeholder_password' => 'Enter password',
            'placeholder_phone' => 'Enter phone',
            'placeholder_address' => 'Enter your address',
            'message' => [
                'msg_require_full_name' => 'Please enter full name.',
                'msg_require_email' => 'Please enter email.',
                'msg_require_password' => 'Please enter password.',
                'msg_unique_email' => 'This email linked to another account.',
                'msg_add_invalid_phone' => 'Please enter valid phone.',
                'require_address' => 'Please enter address.',
                'msg_add_error' => 'Create user fail, try again.',
                'msg_add_success' => 'Create new user successfully!'
            ],
        ],
        'edit' => [
            'title' => 'Edit User',
            'message' => [
                'msg_edit_success' => 'Update user successfully!',
                'msg_edit_error' => 'Edit user fail, try again.'
            ]
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
