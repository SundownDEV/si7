<?php
/**
 * Created by PhpStorm.
 * User: sundowndev
 * Date: 6/28/18
 * Time: 5:31 PM
 */

namespace App\Controller\Application;


use App\Entity\Message;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ApiController extends AbstractController
{

    public function __invoke(Message $data): Message
    {
        $data->setUser($this->getUser());

        return $data;
    }
}