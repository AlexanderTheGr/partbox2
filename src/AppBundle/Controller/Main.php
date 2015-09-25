<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class Main extends Controller {

    var $fields = array();
    var $repository;
    var $prefix = 'p';

    function __construct() {
        
    }

    public function datatable() {
        ini_set("memory_limit", "1256M");
        $request = Request::createFromGlobals();

        $results = array();
        $recordsTotal = 0;
        $recordsFiltered = 0;
        $q = array();
        $s = array();


        if ($request->request->get("length")) {
            $dt_order = $request->request->get("order");
            $dt_search = $request->request->get("search");
            $em = $this->getDoctrine()->getManager();

            $recordsTotal = $em->getRepository($this->repository)->recordsTotal();

            $fields = array();

            foreach ($this->fields as $field) {
                $fields[] = $field["index"];
                $f = explode(":", $field["index"]);
                if (count($f) == 1) {
                    if ($dt_search["value"]) {
                        $q[] = $this->prefix . "." . $field["index"] . " LIKE '%" . addslashes(trim($dt_search["value"])) . "%'";
                    }
                    $s[] = $this->prefix . "." . $f[0];
                }
            }
            $where = count($q) > 0 ? " WHERE " . implode(" OR ", $q) : " WHERE " . $this->prefix . ".id > 0";
            $select = count($s) > 0 ? implode(",", $s) : $this->prefix . ".*";
            $recordsFiltered = $em->getRepository($this->repository)->recordsFiltered($where);
            $query = $em->createQuery(
                            'SELECT  ' . $select . '
                                FROM ' . $this->repository . ' ' . $this->prefix . '
                                ' . $where . '
                                ORDER BY ' . $this->prefix . '.' . $fields[$dt_order[0]["column"]] . ' ' . $dt_order[0]["dir"] . ' '
                    )
                    ->setMaxResults($request->request->get("length"))
                    ->setFirstResult($request->request->get("start"));
            $results = $query->getResult();
        }

        $data["fields"] = $this->fields;
        $jsonarr = array();
        $r = explode(":", $this->repository);
        foreach ($results as $result) {
            $json = array();
            foreach ($data["fields"] as $field) {
                $f = explode(":", $field["index"]);
                if (count($f) > 1) {
                    $obj = $em->getRepository($this->repository)->find($result["id"]);
                    foreach ($f as $g) {
                        if ($obj)
                            $obj = $obj->getField($g);
                    }
                    $json[] = $obj;
                } else {
                    $json[] = $result[$field["index"]];
                }
            }
            $json["DT_RowClass"] = "dt_row_" . strtolower($r[1]);
            $json["DT_RowId"] = 'dt_id_' . strtolower($r[1]) . '_' . $result["id"];
            $jsonarr[] = $json;
        }
        $data["data"] = $jsonarr;
        $data["recordsTotal"] = $recordsTotal;
        $data["recordsFiltered"] = $recordsFiltered;
        return json_encode($data);
    }

    function addField($field = array()) {
        $this->fields[] = $field;
        return $this;
    }

}
