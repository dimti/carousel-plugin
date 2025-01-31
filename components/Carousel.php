<?php namespace Mohsin\Carousel\Components;

use Cms\Classes\ComponentBase;
use Mohsin\Carousel\Models\Carousel as CarouselModel;

class Carousel extends ComponentBase
{
    /**
     * The carousel to display
     * @var Model
     */
    public $carousel;

    public function componentDetails()
    {
        return [
            'name'        => 'mohsin.carousel::lang.settings.name',
            'description' => 'mohsin.carousel::lang.settings.description'
        ];
    }

    public function defineProperties()
    {
        return [
            'id' => [
                'title'       => 'mohsin.carousel::lang.settings.name',
                'description' => 'mohsin.carousel::lang.settings.choice',
                'type'        => 'dropdown'
            ],
            'width' => [
                'title'     => 'mohsin.carousel::lang.components.properties.width.title',
                'default'   => 260
            ],
            'height' => [
                'title'     => 'mohsin.carousel::lang.components.properties.height.title',
                'default'   => 150
            ],
        ];
    }

    public function getIdOptions()
    {
        return CarouselModel::select('id', 'name')->orderBy('name')->get()->lists('name', 'id');
    }

    public function onRun()
    {
        $carousel = new CarouselModel;
        $this->carousel = $carousel->where('id', '=', $this->property('id'))->first();
        $this->page['width'] = $this->property('width');
        $this->page['height'] = $this->property('height');
    }

}
