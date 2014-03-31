<?php

namespace Acme\GroupSequenceDemoBundle\Controller;

use Acme\GroupSequenceDemoBundle\Entity\Foo;
use Acme\GroupSequenceDemoBundle\Entity\Bar;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    protected function getFooData(Foo $foo)
    {
        $json = [['value' => $foo->getValue()]];

        $violations = $this->get('validator')->validate($foo);

        $errors = [];

        foreach($violations as $violation) {
            $errors[] = $violation->getMessage();
        }

        $json[] = $errors;

        return $json;
    }

    /**
     * @Route("/test1", defaults={"_format"="json"})
     */
    public function test1Action()
    {
        $foo = new Foo(1);

        return new JsonResponse($this->getFooData($foo));
    }

    /**
     * @Route("/test2", defaults={"_format"="json"})
     */
    public function test2Action()
    {
        $foo = new Foo(2);

        return new JsonResponse($this->getFooData($foo));
    }

    /**
     * @Route("/test3", defaults={"_format"="json"})
     */
    public function test3Action()
    {
        $foo = new Foo(null);

        return new JsonResponse($this->getFooData($foo));
    }

    /**
     * @Route("/test4", defaults={"_format"="json"})
     */
    public function test4Action()
    {
        $foo = new Foo(null, true);

        return new JsonResponse($this->getFooData($foo));
    }
}