<?php namespace WebVPF\SimpleDocs;

use Backend;
use App;
use Event;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function pluginDetails()
    {
        return [
            'name'        => 'SimpleDocs',
            'description' => 'webvpf.simpledocs::lang.plugin.desc',
            'author'      => 'WebVPF',
            'icon'        => 'icon-file-text-o',
            'homepage'    => 'https://github.com/WebVPF/wn-simpledocs-plugin',
        ];
    }

    public function boot()
    {
        if (!App::runningInBackend()) {
            return;
        }

        Event::listen('backend.page.beforeDisplay', function($controller, $action, $params) {
            $controller->addCss('/plugins/webvpf/simpledocs/assets/css/backend.css');
            $controller->addJs('/plugins/webvpf/simpledocs/assets/js/docs.js');
        });
    }

    public function registerComponents()
    {
        return [
            'WebVPF\SimpleDocs\Components\Item' => 'Item',
            'WebVPF\SimpleDocs\Components\Menu' => 'Menu',
        ];
    }

    public function registerNavigation()
    {
        return [
            'simpledocs' => [
                'label'       => 'webvpf.simpledocs::lang.plugin.name',
                'url'         => Backend::url('webvpf/simpledocs/items'),
                'icon'        => 'icon-book',
                'iconSvg'     => 'plugins/webvpf/simpledocs/assets/img/docs-icon.svg',
                'permissions' => ['webvpf.simpledocs.*'],
                'order'       => 900,
            ],
        ];
    }
}
