<?php

namespace TCG\Voyager\Widgets;

use Arrilot\Widgets\AbstractWidget;
use TCG\Voyager\Facades\Voyager;
use App\Article;
class PostDimmer extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = Article::count();
        $string = $count == 1 ? 'article' : 'articles';

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-group',
            'title'  => "{$count} {$string}",
            'text'   => "You have {$count} {$string} in your database. Click on button below to view all posts.",
            'button' => [
                'text' => 'View all posts',
                'link' => '/admin/articles',
            ],
            'image' => url(config('voyager.assets_path').'/images/widget-backgrounds/03.png'),
        ]));
    }
}
