<?php

namespace WebVPF\SimpleDocs\Models;

use Model;
use Markdown;

class Item extends Model
{
    use \Winter\Storm\Database\Traits\Nullable;
    use \Winter\Storm\Database\Traits\Sortable;
    use \Winter\Storm\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'webvpf_simpledocs_items';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Nullable attributes
     */
    protected $nullable = [
        'content',
        'content_html',
        'meta_title',
        'meta_desc',
        'meta_key',
        'meta_img',
        'css',
        'css_files',
        'js',
        'js_files',
    ];

    /**
     * @var array Validation rules for attributes
     */
    public $rules = [
        'title' => 'required',
        'slug' => ['required', 'regex:/^[a-z0-9\/\:_\-\*\[\]\+\?\|]*$/i', 'unique']
    ];

    /**
     * @var array Attributes to be cast to Argon (Carbon) instances
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * Поля в формате JSON
     */
    protected $jsonable = [
        'css_files',
        'js_files'
    ];

    public function beforeSave()
    {
        $this->content_html = Markdown::parse($this->content);
    }

    /**
     * Событие после создания новой модели
     */
    public function afterCreate()
    {
        if ($this->published) {
            \Cache::forget('simpledocs_menu_items');
        }
    }

    /**
     * Событие после обновления модели
     */
    public function afterUpdate()
    {
        \Cache::forget('simpledocs_item_' . $this->original['slug']);

        if ($this->title != $this->original['title'] || $this->slug != $this->original['slug'] || $this->published != $this->original['published'] || $this->sort_order != $this->original['sort_order']) {
            \Cache::forget('simpledocs_menu_items');
        }
    }

    /**
     * Событие после удаления модели
     */
    public function afterDelete()
    {
        \Cache::forget('simpledocs_item_' . $this->slug);

        if ($this->original['published']) {
            \Cache::forget('simpledocs_menu_items');
        }
    }

    public function setUrl($pageName, $controller)
    {
        $params = [
            'slug' => $this->slug,
        ];

        return $this->url = $controller->pageUrl($pageName, $params);
    }
}
