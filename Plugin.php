<?php

namespace WebVPF\SimpleDocs;

use Backend;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function pluginDetails(): array
    {
        return [
            'name'        => 'SimpleDocs',
            'description' => 'webvpf.simpledocs::lang.plugin.desc',
            'author'      => 'WebVPF',
            'icon'        => 'icon-file-text-o',
            'homepage'    => 'https://github.com/WebVPF/wn-simpledocs-plugin',
        ];
    }

    public function registerComponents(): array
    {
        return [
            'WebVPF\SimpleDocs\Components\Item' => 'DocsItem',
            'WebVPF\SimpleDocs\Components\Menu' => 'DocsMenu',
        ];
    }

    public function registerNavigation(): array
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
