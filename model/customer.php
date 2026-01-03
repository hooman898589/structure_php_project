<?php
namespace Model;
include 'model.php';
use Model\crud;
class customer{
    use crud;
    
    protected $filabel=[
        'firstname',
        'lastname',
        'phone',
    ];

    
public function __construct(){
    
    $this->set_setting('customers',[
        'firstname',
        'lastname',
        'phone',
    ]);
}
   

}