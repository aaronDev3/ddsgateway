<?php
namespace App\Services;
use App\Traits\ConsumesExternalService;

class User2Service{

    use ConsumesExternalService;
    
    /**
     * The base uri to consume the User2 Service
     * @var string
     */

    public $baseUri;
    public $secret;

    public function __construct(){

        $this->baseUri = config('services.users2.base_uri');
        $this->secret = config('services.users2.secret');

    }

    /**
     * Obtain the full list of Users from User1 Site
     * @return string
     */

    public function obtainUsers2(){

        return $this->performRequest('GET','/users2'); 
        //this code will call the GETlocalhost:8000/users (our site1)

    }

    public function createUser2($data){

        return $this->performRequest('POST', '/users2', $data);

    }

    public function obtainUser2($id){

        return $this->performRequest('GET', "/users2/{$id}");

    }

    public function editUser2($data, $id){

        return $this->performRequest('PUT',"/users2/{$id}", $data);

    }

    public function deleteUser2($id){

        return $this->performRequest('DELETE', "/users2/{$id}");

    }
}