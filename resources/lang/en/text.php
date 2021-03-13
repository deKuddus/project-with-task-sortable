<?php

return [
    'home' => 'Home',
    'project' => [
        'title' => 'Project',
        'crud' => [
            'label' => 'Project Name',
            'create' => 'Create Project',
            'edit' => 'Edit Project',
            'list' => 'List of Project',
            'show' => 'Project Details with Task',
            'delete' => 'Are you confirm to delete this project?'
        ],
        'table' => [
            'id' => 'Project Id',
            'name' => 'Project Name',
            'action' => 'Action'
        ],
        'validation' => [
            'name_empty' => 'Project name can not be empty',
            'name_unique' => 'Project name already taken',
            'name_min' => 'Project name can not less than 5 character',
            'name_string' => 'Project name should be valid name',
        ]
    ], 

    'task' => [
        'title' => 'Task',
        'crud' => [
            'create' => 'Create Task',
            'edit' => 'Edit Task',
            'list' => 'List of Task',
            'show' => 'Task Details with Project',
            'delete' => 'Are you confirm to delete this task?'
        ],
        'table' => [
            'id' => 'Task Id',
            'name' => 'Task Name',
            'details' => 'Task Details',
            'action' => 'Action'
        ],
        'validation' => [
            'project_id' => 'Select a project',
            'name_empty' => 'Task name can not be empty',
            'details_empty' => 'Add Task Details',
        ]
    ], 

    'action' => [
        'create' => 'Create',
        'update' => 'Update',
    ]
];