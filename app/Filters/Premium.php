<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Premium implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        helper('uri');
        if( !session()->get("is_premium") ){
            echo "<h1 class='text-center'>Disponível apenas para assinantes</h1>";
            exit;
        }


    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
