<?php namespace WebVPF\SimpleDocs\Components;

use Cms\Classes\ComponentBase;
use WebVPF\SimpleDocs\Models\Item;
use Cms\Classes\Page;

class Menu extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'webvpf.simpledocs::lang.component.menu.name',
            'description' => 'webvpf.simpledocs::lang.component.menu.desc'
        ];
    }

    public function defineProperties()
    {
        return [
            'docPage' => [
                'title'       => 'webvpf.simpledocs::lang.component.menu.prop.doc_page_title',
                'description' => 'webvpf.simpledocs::lang.component.menu.prop.doc_page_desc',
                'type'        => 'dropdown',
            ],
        ];
    }

    public function getPropertyOptions($property)
    {
        return Page::sortBy('baseFileName')->lists('baseFileName', 'baseFileName');
    }

    public function onRun()
    {
        $allItems = Item::orderBy('sort_order', 'asc')
                        ->where('published', true)
                        ->select('title', 'slug')
                        ->get();

        $allItems->each(function($item) {
            $item->setUrl($this->property('docPage'), $this->controller);
        });

        $this->page['allItems'] = $allItems;

        $this->page['pageUrl'] = $this->pageUrl('');
    }
}
