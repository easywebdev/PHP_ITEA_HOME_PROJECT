<?php
/**
 * Created by PhpStorm.
 * User: fedor
 * Date: 26.08.18
 * Time: 12:37
 */

namespace App\Http\Controllers\Request;

trait PostProcessing
{
    /**
     * @param array $post
     * @return array
     */
    public function escapeTags(array $post) : array
    {
        $validPost = [];

        foreach ($post as $key => $value) {
            $validPost[$key] = addslashes($value);
        }

        return $validPost;
    }

    /**
     * @param array $post
     * @return array
     */
    public function addCreatetAt(array $post) : array
    {
        $post['created_at'] = date("Y-m-d H:i:s");

        return $post;
    }
}