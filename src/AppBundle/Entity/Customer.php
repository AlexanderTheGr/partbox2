<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Customer
 *
 * @ORM\Table(name="customer", indexes={@ORM\Index(name="user_id", columns={"actioneer"}), @ORM\Index(name="customer_code", columns={"customer_code"}) })
 * @ORM\Entity
 */
class Customer {

    public function getField($field) {
        return $this->$field;
    }
    public function setField($field,$val) {
        $this->$field = $val;
        return $val;
    }
    /**
     * @var integer
     *
     * @ORM\Column(name="reference", type="integer", nullable=false)
     */
    private $reference;

    /**
     * @var integer
     *
     * @ORM\Column(name="group", type="integer", nullable=false)
     */
    private $group;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=45, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=45, nullable=true)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=80, nullable=true)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="customer_code", type="string", length=255, nullable=false)
     */
    private $customerCode;

    /**
     * @var string
     *
     * @ORM\Column(name="customer_name", type="string", length=255, nullable=false)
     */
    private $customerName;

    /**
     * @var string
     *
     * @ORM\Column(name="customer_afm", type="string", length=255, nullable=false)
     */
    private $customerAfm;

    /**
     * @var string
     *
     * @ORM\Column(name="customer_address", type="string", length=255, nullable=false)
     */
    private $customerAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="customer_district", type="string", length=255, nullable=false)
     */
    private $customerDistrict;

    /**
     * @var string
     *
     * @ORM\Column(name="customer_city", type="string", length=255, nullable=false)
     */
    private $customerCity;

    /**
     * @var integer
     *
     * @ORM\Column(name="customer_zip", type="integer", nullable=false)
     */
    private $customerZip;

    /**
     * @var string
     *
     * @ORM\Column(name="customer_phone01", type="string", length=255, nullable=false)
     */
    private $customerPhone01;

    /**
     * @var string
     *
     * @ORM\Column(name="customer_phone02", type="string", length=255, nullable=false)
     */
    private $customerPhone02;

    /**
     * @var string
     *
     * @ORM\Column(name="customer_trdr_cusextra_varchar03", type="string", length=255, nullable=false)
     */
    private $customerTrdrCusextraVarchar03;

    /**
     * @var string
     *
     * @ORM\Column(name="customer_fax", type="string", length=255, nullable=false)
     */
    private $customerFax;

    /**
     * @var string
     *
     * @ORM\Column(name="customer_webpage", type="string", length=255, nullable=false)
     */
    private $customerWebpage;

    /**
     * @var string
     *
     * @ORM\Column(name="customer_email", type="string", length=255, nullable=false)
     */
    private $customerEmail;

    /**
     * @var integer
     *
     * @ORM\Column(name="customer_payment", type="integer", nullable=false)
     */
    private $customerPayment;

    /**
     * @var integer
     *
     * @ORM\Column(name="customer_trdcategory", type="integer", nullable=false)
     */
    private $customerTrdcategory;

    /**
     * @var string
     *
     * @ORM\Column(name="price_field", type="string", length=255, nullable=false)
     */
    private $priceField;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ts", type="datetime", nullable=false)
     */
    private $ts = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255, nullable=false)
     */
    private $status = 'active';

    /**
     * @var integer
     *
     * @ORM\Column(name="actioneer", type="integer", nullable=true)
     */
    private $actioneer;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=false)
     */
    private $created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modified", type="datetime", nullable=false)
     */
    private $modified;

    /**
     * @var string
     *
     * @ORM\Column(name="flat_data", type="text", nullable=false)
     */
    private $flatData;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * Set reference
     *
     * @param integer $reference
     *
     * @return Customer
     */
    public function setReference($reference) {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return integer
     */
    public function getReference() {
        return $this->reference;
    }

    /**
     * Set group
     *
     * @param integer $group
     *
     * @return Customer
     */
    public function setGroup($group) {
        $this->group = $group;

        return $this;
    }

    /**
     * Get group
     *
     * @return integer
     */
    public function getGroup() {
        return $this->group;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Customer
     */
    public function setEmail($email) {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return Customer
     */
    public function setUsername($username) {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Customer
     */
    public function setPassword($password) {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * Set customerCode
     *
     * @param string $customerCode
     *
     * @return Customer
     */
    public function setCustomerCode($customerCode) {
        $this->customerCode = $customerCode;

        return $this;
    }

    /**
     * Get customerCode
     *
     * @return string
     */
    public function getCustomerCode() {
        return $this->customerCode;
    }

    /**
     * Set customerName
     *
     * @param string $customerName
     *
     * @return Customer
     */
    public function setCustomerName($customerName) {
        $this->customerName = $customerName;

        return $this;
    }

    /**
     * Get customerName
     *
     * @return string
     */
    public function getCustomerName() {
        return $this->customerName;
    }

    /**
     * Set customerAfm
     *
     * @param string $customerAfm
     *
     * @return Customer
     */
    public function setCustomerAfm($customerAfm) {
        $this->customerAfm = $customerAfm;

        return $this;
    }

    /**
     * Get customerAfm
     *
     * @return string
     */
    public function getCustomerAfm() {
        return $this->customerAfm;
    }

    /**
     * Set customerAddress
     *
     * @param string $customerAddress
     *
     * @return Customer
     */
    public function setCustomerAddress($customerAddress) {
        $this->customerAddress = $customerAddress;

        return $this;
    }

    /**
     * Get customerAddress
     *
     * @return string
     */
    public function getCustomerAddress() {
        return $this->customerAddress;
    }

    /**
     * Set customerDistrict
     *
     * @param string $customerDistrict
     *
     * @return Customer
     */
    public function setCustomerDistrict($customerDistrict) {
        $this->customerDistrict = $customerDistrict;

        return $this;
    }

    /**
     * Get customerDistrict
     *
     * @return string
     */
    public function getCustomerDistrict() {
        return $this->customerDistrict;
    }

    /**
     * Set customerCity
     *
     * @param string $customerCity
     *
     * @return Customer
     */
    public function setCustomerCity($customerCity) {
        $this->customerCity = $customerCity;

        return $this;
    }

    /**
     * Get customerCity
     *
     * @return string
     */
    public function getCustomerCity() {
        return $this->customerCity;
    }

    /**
     * Set customerZip
     *
     * @param integer $customerZip
     *
     * @return Customer
     */
    public function setCustomerZip($customerZip) {
        $this->customerZip = $customerZip;

        return $this;
    }

    /**
     * Get customerZip
     *
     * @return integer
     */
    public function getCustomerZip() {
        return $this->customerZip;
    }

    /**
     * Set customerPhone01
     *
     * @param string $customerPhone01
     *
     * @return Customer
     */
    public function setCustomerPhone01($customerPhone01) {
        $this->customerPhone01 = $customerPhone01;

        return $this;
    }

    /**
     * Get customerPhone01
     *
     * @return string
     */
    public function getCustomerPhone01() {
        return $this->customerPhone01;
    }

    /**
     * Set customerPhone02
     *
     * @param string $customerPhone02
     *
     * @return Customer
     */
    public function setCustomerPhone02($customerPhone02) {
        $this->customerPhone02 = $customerPhone02;

        return $this;
    }

    /**
     * Get customerPhone02
     *
     * @return string
     */
    public function getCustomerPhone02() {
        return $this->customerPhone02;
    }

    /**
     * Set customerTrdrCusextraVarchar03
     *
     * @param string $customerTrdrCusextraVarchar03
     *
     * @return Customer
     */
    public function setCustomerTrdrCusextraVarchar03($customerTrdrCusextraVarchar03) {
        $this->customerTrdrCusextraVarchar03 = $customerTrdrCusextraVarchar03;

        return $this;
    }

    /**
     * Get customerTrdrCusextraVarchar03
     *
     * @return string
     */
    public function getCustomerTrdrCusextraVarchar03() {
        return $this->customerTrdrCusextraVarchar03;
    }

    /**
     * Set customerFax
     *
     * @param string $customerFax
     *
     * @return Customer
     */
    public function setCustomerFax($customerFax) {
        $this->customerFax = $customerFax;

        return $this;
    }

    /**
     * Get customerFax
     *
     * @return string
     */
    public function getCustomerFax() {
        return $this->customerFax;
    }

    /**
     * Set customerWebpage
     *
     * @param string $customerWebpage
     *
     * @return Customer
     */
    public function setCustomerWebpage($customerWebpage) {
        $this->customerWebpage = $customerWebpage;

        return $this;
    }

    /**
     * Get customerWebpage
     *
     * @return string
     */
    public function getCustomerWebpage() {
        return $this->customerWebpage;
    }

    /**
     * Set customerEmail
     *
     * @param string $customerEmail
     *
     * @return Customer
     */
    public function setCustomerEmail($customerEmail) {
        $this->customerEmail = $customerEmail;

        return $this;
    }

    /**
     * Get customerEmail
     *
     * @return string
     */
    public function getCustomerEmail() {
        return $this->customerEmail;
    }

    /**
     * Set customerPayment
     *
     * @param integer $customerPayment
     *
     * @return Customer
     */
    public function setCustomerPayment($customerPayment) {
        $this->customerPayment = $customerPayment;

        return $this;
    }

    /**
     * Get customerPayment
     *
     * @return integer
     */
    public function getCustomerPayment() {
        return $this->customerPayment;
    }

    /**
     * Set customerTrdcategory
     *
     * @param integer $customerTrdcategory
     *
     * @return Customer
     */
    public function setCustomerTrdcategory($customerTrdcategory) {
        $this->customerTrdcategory = $customerTrdcategory;

        return $this;
    }

    /**
     * Get customerTrdcategory
     *
     * @return integer
     */
    public function getCustomerTrdcategory() {
        return $this->customerTrdcategory;
    }

    /**
     * Set priceField
     *
     * @param string $priceField
     *
     * @return Customer
     */
    public function setPriceField($priceField) {
        $this->priceField = $priceField;

        return $this;
    }

    /**
     * Get priceField
     *
     * @return string
     */
    public function getPriceField() {
        return $this->priceField;
    }

    /**
     * Set ts
     *
     * @param \DateTime $ts
     *
     * @return Customer
     */
    public function setTs($ts) {
        $this->ts = $ts;

        return $this;
    }

    /**
     * Get ts
     *
     * @return \DateTime
     */
    public function getTs() {
        return $this->ts;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Customer
     */
    public function setStatus($status) {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus() {
        return $this->status;
    }

    /**
     * Set actioneer
     *
     * @param integer $actioneer
     *
     * @return Customer
     */
    public function setActioneer($actioneer) {
        $this->actioneer = $actioneer;

        return $this;
    }

    /**
     * Get actioneer
     *
     * @return integer
     */
    public function getActioneer() {
        return $this->actioneer;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Customer
     */
    public function setCreated($created) {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated() {
        return $this->created;
    }

    /**
     * Set modified
     *
     * @param \DateTime $modified
     *
     * @return Customer
     */
    public function setModified($modified) {
        $this->modified = $modified;

        return $this;
    }

    /**
     * Get modified
     *
     * @return \DateTime
     */
    public function getModified() {
        return $this->modified;
    }

    /**
     * Set flatData
     *
     * @param string $flatData
     *
     * @return Customer
     */
    public function setFlatData($flatData) {
        $this->flatData = $flatData;

        return $this;
    }

    /**
     * Get flatData
     *
     * @return string
     */
    public function getFlatData() {
        return $this->flatData;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @var \AppBundle\Entity\Route
     */
    private $route;

    /**
     * Set route
     *
     * @param \AppBundle\Entity\Route $route
     *
     * @return Customer
     */
    public function setRoute(\AppBundle\Entity\Route $route = null) {
        $this->route = $route;
        return $this;
    }

    /**
     * Get route
     *
     * @return \AppBundle\Entity\Route
     */
    public function getRoute() {
        return $this->route;
    }

}
