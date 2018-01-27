<?php
namespace App;
use Sober\Controller\Controller;
class Single extends Controller
{
    public function single() {
        $single = new Single();
        foreach ($single->getFields() as $key => $value)
        {
            $single->$key = $value;
        }
        return $single;
    }

    public function getFields()
    {
        return [
            'title' => get_the_title(),
            'ID' => get_the_ID(),
            'content' => get_post_field('post_content', get_the_ID())
        ];

    }
    

    
}