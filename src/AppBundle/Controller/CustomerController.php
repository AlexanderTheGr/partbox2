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
                    'ctrl' => $this->generateRandomString(),
                    'app' => $this->generateRandomString(),
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
                    'ctrl' => $this->generateRandomString(),
                    'app' => $this->generateRandomString(),
                    'tabs' => $this->gettabs(),
                    'base_dir' => realpath($this->container->getParameter('kernel.root_dir') . '/..'),
        ));
    }

    /**
     * @Route("/customers/gettab")
     */
    public function gettabAction() {
        $this->repository = 'AppBundle:Customer';
        $this->addTab(array("name" => "General1", "content" => $this->form1(), "index" => $this->generateRandomString(), 'search' => 'text', "active" => "active"));
        $this->addTab(array("name" => "General2", "content" => $this->form2(), "index" => $this->generateRandomString(), 'search' => 'text'));
        $json = $this->tabs();
        return new Response(
                $json, 200, array('Content-Type' => 'application/json')
        );
    }

    /**
     * @Route("/customers/gettab")
     */
    public function gettabs() {
        $this->repository = 'AppBundle:Customer';

        $forms1["model"] = 'model11';
        $forms1["model"] = array();


        $forms1["fields"][] = array("key" => "email", "id" => $this->repository . ":email", "type" => "input", "templateOptions" => array("type" => 'email', "label" => "Email", "required" => true));
        $forms1["fields"][] = array("key" => "firstName", "id" => $this->repository . ":firstName", "type" => "input", "defaultValue" => "test", "templateOptions" => array("label" => "First Name", "required" => true));
        $forms1["fields"][] = array("key" => "lastName", "id" => $this->repository . ":lastName", "type" => "input", "templateOptions" => array("label" => "Last Name", "required" => true));

        
        $forms2["model"] = 'model11';
        $forms2["model"] = array();


        $forms2["fields"][] = array("key" => "email1", "id" => $this->repository . ":email1", "type" => "input", "templateOptions" => array("type" => 'email', "label" => "Email", "required" => true));
        $forms2["fields"][] = array("key" => "firstName1", "id" => $this->repository . ":firstName1", "type" => "input", "defaultValue" => "test", "templateOptions" => array("label" => "First Name", "required" => true));
        $forms2["fields"][] = array("key" => "lastName1", "id" => $this->repository . ":lastName1", "type" => "input", "templateOptions" => array("label" => "Last Name", "required" => true));

        $this->addTab(array("title" => "General1","form"=>$forms1,"content"=>'fff',"index" => $this->generateRandomString(), 'search' => 'text', "active" => true));
        $this->addTab(array("title" => "General2", "form" => $forms2, "content" => 'ddd', "index" => $this->generateRandomString(), 'search' => 'text'));
        $json = $this->tabs();
        return $json;
        //return new Response(
        //        $json, 200, array('Content-Type' => 'application/json')
        //);
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
