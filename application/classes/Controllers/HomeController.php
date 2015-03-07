<?php
/**
 * Spiral Framework.
 *
 * @license   MIT
 * @author    Anton Titov (Wolfy-J)
 * @copyright ©2009-2015
 */
namespace Controllers;

use Spiral\Core\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return $this->view->render('home');
    }
}