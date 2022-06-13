<?php

namespace WebVPF\SimpleDocs\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

class Items extends Controller
{
    public $implement = [
        \Backend.Behaviors.FormController::class,
        \Backend.Behaviors.ListController::class,
        \Backend.Behaviors.ReorderController::class,
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public $bodyClass = 'compact-container';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('WebVPF.SimpleDocs', 'simpledocs', 'items');

        $this->addCss('/plugins/webvpf/simpledocs/assets/css/backend.css', 'WebVPF.SimpleDocs');
        $this->addJs('/plugins/webvpf/simpledocs/assets/js/backend-item-form.js', 'WebVPF.SimpleDocs');
    }
}
