<?php
/**
 * Created by PhpStorm.
 * User: fedor
 * Date: 01.08.18
 * Time: 18:53
 */

namespace App\Http\Controllers;


class TestController
{
    public function testView()
    {
        $message = 'Test Page!';

        return view('TestPage')-> with('text', $message);
    }
}