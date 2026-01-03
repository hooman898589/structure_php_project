<?php
namespace routes;



trait testroute{


    public $mainurl;
    // (  GET بدون استفاده از متد  ) را درست میکند url در این متد تمام متغییر های روی
public function set_test_url($mainurl){
$url = trim($_SERVER['REQUEST_URI'], '/');
$segments = explode($mainurl, $url);

if (!empty($segments[1])) {
    include_once 'setting/vars.php';
}
}






public function testupdate(){
    // ذخیره میشود ومیتونید اون رو بریزید در داخل متغیر و از هر خونه اش استفاده کنید $this->request رو url تمام داده های روی
    $request=$this->request;
    $id=$request[0];
    require_once 'controllers/test.php';

}



}

