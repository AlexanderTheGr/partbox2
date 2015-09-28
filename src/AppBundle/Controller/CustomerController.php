<?php

// src/AppBundle/Controller/customerController.php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Controller\Main as Main;

class CustomerController extends Main {

    /**
     * @Route("/customers/customer")
     */
    public function indexAction() {

        return $this->render('customer/index.html.twig', array(
                    'pagename' => 'Customers',
                    'url' => '/customers/getdatatable',
                    'ctrl' => 'ctrlCustomer',
                    'app' => 'customerApp',
                    'base_dir' => realpath($this->container->getParameter('kernel.root_dir') . '/..'),
        ));
    }

    /**
     * @Route("/customers/view")
     */
    public function viewAction() {

        return $this->render('customer/view.html.twig', array(
                    'pagename' => 'Customers',
                    'url' => '/customers/gettab',
                    'ctrl' => 'ctrlCustomer',
                    'app' => 'customerApp',
                    'base_dir' => realpath($this->container->getParameter('kernel.root_dir') . '/..'),
        ));
    }

    public function tabAction() {

        return $this->render('elements/tabs.twig', array(
                    'pagename' => 'Customers',
                    'url' => '/customers/getdatatable',
                    'ctrl' => 'ctrlCustomer',
                    'app' => 'customerApp',
                    'base_dir' => realpath($this->container->getParameter('kernel.root_dir') . '/..'),
        ));
    }

    /**
     * @Route("/customers/customer")
     */
    public function customerAction() {

        return $this->render('elements/datatable.twig', array(
                    'url' => '/customers/getdatatable',
                    'ctrl' => 'ctrlCustomer',
                    'app' => 'customerApp',
                    'base_dir' => realpath($this->container->getParameter('kernel.root_dir') . '/..'),
        ));
    }

    
    /**
     * @Route("/customers/gettab")
     */
    public function gettabAction(Request $request) {
        $this->repository = 'AppBundle:Customer';

        $this->addField(array("name" => "Name", "index" => 'customerName', 'search' => 'text',"active"=>"active"))
                ->addField(array("name" => "ΑΦΜ", "index" => 'customerAfm', 'search' => 'text'))
                ->addField(array("name" => "Address", "index" => 'customerAddress', 'search' => 'text'))
                ->addField(array("name" => "Route", "index" => 'route:route'));

        $json = $this->datatable();

        return new Response(
                $json, 200, array('Content-Type' => 'application/json')
        );
    }    
    
    /**
     * @Route("/customers/getdatatable")
     */
    public function getdatatableAction(Request $request) {
        $this->repository = 'AppBundle:Customer';

        $this->addField(array("name" => "ID", "index" => 'id'))
                ->addField(array("name" => "Name", "index" => 'customerName', 'search' => 'text'))
                ->addField(array("name" => "ΑΦΜ", "index" => 'customerAfm', 'search' => 'text'))
                ->addField(array("name" => "Address", "index" => 'customerAddress', 'search' => 'text'))
                ->addField(array("name" => "Route", "index" => 'route:route'));

        $json = $this->datatable();

        return new Response(
                $json, 200, array('Content-Type' => 'application/json')
        );
    }

}
