<?php
return [
    'admin' => [
        'title' => 'Category',
        'list' => [
            'title' => 'List Categories'
        ],
        'table' => [
            'id' => 'ID',
            'name' => 'Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'delete' => 'Delete',
            'edit' => 'Edit',
        ],
        'add' => [
            'title' => 'Add Category',
            'name' => 'Name Category',
            'submit' => 'Submit',
            'reset' => 'Reset',
            'back' => 'Back',
            'cancel' => 'Cancel',
            'edit' => 'Edit',
            'placeholder_name' => 'Category Name',
        ],
        'edit' => [
            'title' => 'Edit Category',
        ],
        'message' => [
            'add' => 'Create New Category Successfull!',
            'add_fail' => 'Can not add New Category. Please check connect database!',
            'edit' => 'Update Category Successfull!',
            'edit_fail' => 'Can not edit Category by this Child!',
            'del' => 'Delete Category Successfull!',
            'del_fail' => 'Can not Delete Category. Please check connect database!',
            'msg_del' => 'Do you want to delete this Category?',
        ]
    ]
];
