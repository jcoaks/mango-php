<?php

namespace Mango;

require_once "client.php";

class Mango {

    public $api_key;

    // Constructor
    public function __construct($options) {
        $this->api_key = $options["api_key"];

        if (!$this->api_key) {
            throw InvalidApiKey();
        }

        $this->Charges = new Charges($this);
        $this->Refunds = new Refunds($this);
        $this->Customers = new Customers($this);
        $this->Cards = new Cards($this);
        $this->Queues = new Queues($this);
        $this->Installments = new Installments($this);
    }

}


class Resource extends Client {

    public function __construct($mango) {
        $this->mango = $mango;
    }

}


class Charges extends Resource {

    public function get_list($options = null) {
        return $this->request("GET", "/charges/", $api_key = $this->mango->api_key, $options);
    }

    public function get($uid) {
        return $this->request("GET", "/charges/" . $uid . "/", $api_key = $this->mango->api_key);
    }

    public function create($options) {
        return $this->request("POST", "/charges/", $api_key = $this->mango->api_key, $options);
    }

}


class Refunds extends Resource {

    public function get_list($options) {
        return $this->request("GET", "/refunds/", $api_key = $this->mango->api_key, $options);
    }

    public function get($uid) {
        return $this->request("GET", "/refunds/" . $uid . "/", $api_key = $this->mango->api_key);
    }

    public function create($options) {
        return $this->request("POST", "/refunds/", $api_key = $this->mango->api_key, $options);
    }

}


class Customers extends Resource {

    public function get_list($options) {
        return $this->request("GET", "/customers/", $api_key = $this->mango->api_key, $options);
    }

    public function get($uid) {
        return $this->request("GET", "/customers/" . $uid . "/", $api_key = $this->mango->api_key);
    }

    public function create($options) {
        return $this->request("POST", "/customers/", $api_key = $this->mango->api_key, $options);
    }

    public function update($uid, $options) {
        return $this->request("PATCH", "/customers/" . $uid . "/", $api_key = $this->mango->api_key, $options);
    }

    public function delete($uid) {
        return $this->request("DELETE", "/customers/" . $uid . "/", $api_key = $this->mango->api_key);
    }

}


class Cards extends Resource {

    public function get_list($options) {
        return $this->request("GET", "/cards/", $api_key = $this->mango->api_key, $options);
    }

    public function get($uid) {
        return $this->request("GET", "/cards/" . $uid . "/", $api_key = $this->mango->api_key);
    }

    public function create($options) {
        return $this->request("POST", "/cards/", $api_key = $this->mango->api_key, $options);
    }

    public function update($uid, $options) {
        return $this->request("PATCH", "/cards/" . $uid . "/", $api_key = $this->mango->api_key, $options);
    }

    public function delete($uid) {
        return $this->request("DELETE", "/cards/" . $uid . "/", $api_key = $this->mango->api_key);
    }

}


class Queues extends Resource {

    public function get_list($options) {
        return $this->request("GET", "/queue/", $api_key = $this->mango->api_key, $options);
    }

    public function get($uid) {
        return $this->request("GET", "/queue/" . $uid . "/", $api_key = $this->mango->api_key);
    }

    public function delete($uid) {
        return $this->request("DELETE", "/queue/" . $uid . "/", $api_key = $this->mango->api_key);
    }

    public function delete_all() {
        return $this->request("DELETE", "/queue/", $api_key = $this->mango->api_key);
    }

}


class Installments extends Resource {

    public function get_list($options) {
        return $this->request("GET", "/installments/", $api_key = $this->mango->api_key);
    }

}

?>
