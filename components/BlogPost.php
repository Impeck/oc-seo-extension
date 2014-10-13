<?php namespace AnandPatel\SeoExtension\Components;

use Cms\Classes\ComponentBase;
use Event;

class BlogPost extends ComponentBase
{

    public $page;
    public $seo_title;
    public $seo_description;
    public $seo_keywords;
    public $canonical_url;
    public $redirect_url;
    public $robot_index;
    public $robot_follow;

    public function componentDetails()
    {
        return [
            'name'        => 'SEO Blog Post',
            'description' => 'Inject SEO Fields of blog post'
        ];
    }

    public function defineProperties()
    {
        return [
            "post" => [
                    "title" => "data",
                    "default" => "post"
            ]
        ];
    }

    public function onRender()
    {
        $post = $this->property("data");
        $this->seo_title = $this->page["seo_title"] = empty($post->seo_title) ? $post->title : $post->seo_title;
        $this->seo_description = $this->page["seo_description"] = $post->meta_description;
        $this->seo_keywords = $this->page["seo_keywords"] = $post->seo_keywords;
        $this->canonical_url = $this->page["canonical_url"] = $post->canonical_url;
        $this->redirect_url = $this->page["redirect_url"] = $post->redirect_url;
        $this->robot_follow = $this->page["robot_follow"] = $post->robot_follow;
        $this->robot_index = $this->page["robot_index"] = $post->robot_index;

    }

}