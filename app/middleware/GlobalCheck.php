<?php
/**
 * This file is part of webman.
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the MIT-LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @author    walkor<walkor@workerman.net>
 * @copyright walkor<walkor@workerman.net>
 * @link      http://www.workerman.net/
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace app\middleware;

use Webman\MiddlewareInterface;
use Webman\Http\Response;
use Webman\Http\Request;

/**
 * Class GlobalCheck
 * @package app\middleware
 */
class GlobalCheck implements MiddlewareInterface
{
    public function process(Request $request, callable $next): Response
    {
        echo "全局的检查";
        echo 123;
        echo "检查完了";

        $response = $next($request);

        return $response;
    }
}
