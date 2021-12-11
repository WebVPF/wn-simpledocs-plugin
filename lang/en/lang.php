<?php

return [
    'plugin' => [
        'name' => 'Docs',
        'desc' => 'Simple documentation for Winter CMS website',
    ],
    'component' => [
        'item' => [
            'name' => 'Documentation pages',
            'desc' => 'Displays documentation pages individually',
            'prop' => [
                'slug_title' => 'URL parameter',
                'slug_desc' => 'The route parameter used to identify the entry (document) by its URL.',
                'stek_title' => 'Highlight',
                'stek_desc' => 'The stack of programming languages and technologies for which the code highlighting will be performed.',
                'stek_all' => 'All languages',
                'stek_wn' => 'Stack Winter CMS',
                'theme_title' => 'Code highlighting theme',
            ],
        ],
        'menu' => [
            'name' => 'Documentation menu',
            'desc' => 'Displays links to documentation pages',
            'prop' => [
                'doc_page_title' => 'Recording page',
                'doc_page_desc' => 'Select the CMS page that displays the individual document record. It is necessary to generate url-addresses of menu items.',
            ],
        ],
    ],
    'fields' => [
        'published' => 'Published',
        'created' => 'Created',
        'updated' => 'Changed',
        'title' => 'Name',
        'meta_img' => 'Meta image',
        'tab_content' => 'Content',
        'repiter_prompt_css_files' => 'Add CSS file',
        'label_add_url_css_files' => 'Enter Url CSS file',
        'repiter_prompt_js_files' => 'Add JS file',
        'label_add_url_js_files' => 'Enter Url JS file',
    ],
    'config' => [
        'name' => 'Document',
        'create_title' => 'Create a record',
        'edit_title' => 'Editing a record',
        'preview_title' => 'Record preview',
        'list_title' => 'Documentation List',
        'reorder_title' => 'Sorting documents',
    ],
    'controller' => [
        'items' => 'Recordings',
        'new' => 'New entry',
        'creating' => 'Create a record...',
        'saving' => 'Saving a record...',
        'deleting' => 'Delete entry...',
        'confirm_delete' => 'Delete this entry?',
        'reorder' => 'Sort records',
    ],
];
