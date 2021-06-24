<?php namespace WebVPF\SimpleDocs\Components;

use Cms\Classes\ComponentBase;
use WebVPF\SimpleDocs\Models\Item as DocsItem;
use Input;

class Item extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'webvpf.simpledocs::lang.component.item.name',
            'description' => 'webvpf.simpledocs::lang.component.item.desc'
        ];
    }

    public function defineProperties()
    {
        return [
            'slug' => [
                'title'       => 'webvpf.simpledocs::lang.component.item.prop.slug_title',
                'description' => 'webvpf.simpledocs::lang.component.item.prop.slug_desc',
                'default'     => '{{ :slug }}',
            ],
            'stek' => [
                'title'       => 'webvpf.simpledocs::lang.component.item.prop.stek_title',
                'description' => 'webvpf.simpledocs::lang.component.item.prop.stek_desc',
                'type'        => 'dropdown',
                'default'     => 'all',
                'options'     => [
                    'wn'  => 'webvpf.simpledocs::lang.component.item.prop.stek_wn',
                    'all' => 'webvpf.simpledocs::lang.component.item.prop.stek_all',
                ],
            ],
            'theme' => [
                'title'   => 'webvpf.simpledocs::lang.component.item.prop.theme_title',
                'type'    => 'dropdown',
                'default' => 'default',
                'options' => [
                    'default'        => 'Default',
                    'okaidia'        => 'Okaidia (Monokai)',
                    'twilight'       => 'Twilight',
                    'coy'            => 'Coy',
                    'solarizedlight' => 'Solarized Light',
                    'tomorrow'       => 'Tomorrow Night',
                ],
            ],
        ];
    }

    public function onRun()
    {
        $item = DocsItem::where('slug', $this->property('slug'))
                        ->rememberForever('simpledocs_item_' . $this->property('slug'))
                        ->first();

        if (empty($item)) {
            \Cache::forget('simpledocs_item_' . $this->property('slug'));

            return $this->controller->run('404');
        }

        $this->page['item'] = $item;
        $this->page['title'] = $item->title;
        
        $this->addCss('/plugins/webvpf/simpledocs/assets/css/hl_'. $this->property('stek') . '_' . $this->property('theme') . '.css');

        $this->addJs('/plugins/webvpf/simpledocs/assets/js/hl_' . $this->property('stek') . '.min.js');
        $this->addJs('/plugins/webvpf/simpledocs/assets/js/docs.js');
    }

}
