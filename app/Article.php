<?php

namespace Bloggo;

use Jenssegers\Mongodb\Eloquent\Model;

/**
 * Article model for the blog.
 * 
 * @category Bloggo
 * @package  Bloggo
 * 
 * @author   Quintin Venter
 * @since    29 July 2018
 */
class Article extends Model
{
    
    /**
     * Lets the Eloquent model know it connects to the mongo db.
     * 
     * @var string
     */
    protected $connection = 'mongodb';
    
    /**
     * The grouping for the current model.
     * ???
     * 
     * @var string
     */
    protected $collection = 'articles';
    
    /**
     * Column we can fill in.
     * 
     * @var array
     */
    protected $fillable = [
        'heading', 'body'
    ];
}
