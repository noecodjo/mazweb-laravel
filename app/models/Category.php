<?php
/**
 * Created by PhpStorm.
 * User: thangchung
 * Date: 1/13/14
 * Time: 11:33 AM
 */

class Category extends Eloquent{

    protected $table = 'category';

    public function contents () {
        return $this->hasMany('Content');
    }

} 