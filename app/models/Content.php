<?php
/**
 * Created by PhpStorm.
 * User: thangchung
 * Date: 1/13/14
 * Time: 11:34 AM
 */

class Content extends Eloquent {

    protected $table = 'content';

    public function category() {
        return $this->belongsTo('Category');
    }

} 