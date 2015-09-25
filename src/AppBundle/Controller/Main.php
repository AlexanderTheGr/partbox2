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
        $q_or = array();
        $q_and = array();
        $s = array();

        if ($request->request->get("length")) {
            $em = $this->getDoctrine()->getManager();
            
            $dt_order = $request->request->get("order");
            $dt_search = $request->request->get("search");
            
            $dt_columns = $request->request->get("columns");
          
            $recordsTotal = $em->getRepository($this->repository)->recordsTotal();
            $fields = array();

            foreach ($this->fields as $index=>$field) {
                $fields[] = $field["index"];
                $field_relation = explode(":", $field["index"]);

                if (count($field_relation) == 1) {
                    if ($this->clearstring($dt_search["value"])) {
                        $q_or[] = $this->prefix . "." . $field["index"] . " LIKE '%" . $this->clearstring($dt_search["value"]) . "%'";
                    }
                    if ($this->clearstring($dt_columns[$index]["search"]["value"])) {
                        $q_and[] = $this->prefix . "." . $this->fields[$index]["index"] . " LIKE '%" . $this->clearstring($dt_columns[$index]["search"]["value"]) . "%'";
                    }
                    $s[] = $this->prefix . "." . $field_relation[0];
                }
            }
            $where = count($q_or) > 0 ? " WHERE (" . implode(" OR ", $q_or).")" : " WHERE " . $this->prefix . ".id > 0"; 
            $where = count($q_and) > 0 ? $where ." AND (".implode(" AND ", $q_and).")" : $where;
            
            $select = count($s) > 0 ? implode(",", $s) : $this->prefix . ".*";

            $recordsFiltered = $em->getRepository($this->repository)->recordsFiltered($where);

            $query = $em->createQuery(
                            'SELECT  ' . $select . '
                                FROM ' . $this->repository . ' ' . $this->prefix . '
                                ' . $where . '
                                ORDER BY ' . $this->getOrder($fields, $dt_order)
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
                $field_relation = explode(":", $field["index"]);
                if (count($field_relation) > 1) {
                    $obj = $em->getRepository($this->repository)->find($result["id"]);
                    foreach ($field_relation as $relation) {
                        if ($obj)
                            $obj = $obj->getField($relation);
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

    function clearstring($string) {
        return addslashes(str_replace(array("'"),"",trim($string)));
    }
    
    function getOrder($fields, $dt_order) {
        $field_order = explode(":", $fields[$dt_order[0]["column"]]);
        return $this->prefix . '.' . $field_order[0] . ' ' . $dt_order[0]["dir"] . ' ';
    }

    function addField($field = array()) {
        $this->fields[] = $field;
        return $this;
    }

}
