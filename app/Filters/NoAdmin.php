<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Noadmin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    
    {
        // Do something here
        if(!session()->get('isLoggedIn') ||  session()->get('role') !== 1){
            return redirect()->to('login');
        }

    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
