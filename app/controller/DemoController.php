<?php


namespace app\controller;


use support\Log;
use support\Request;

class DemoController
{


    public function hello(Request $request)
    {
        $name = $request->get('name', 'webman');

        Log::info('demo/hello');
//        return response(time() . ':hello ' . $name); // 输出到浏览器

        // 返回json
        return json([
            'code'    => 0,
            'message' => 'OK',
            'data'    => [
                'title' => time() . ':hello ' . $name
            ]
        ]);

        // 返回视图
//        return view('demo/hello', ['name' => $name]);

    }

}