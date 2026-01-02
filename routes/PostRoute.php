<?php
namespace routes;



trait PostRoute{


    public $mainurl;
    // (  GET بدون استفاده از متد  ) را درست میکند url در این متد تمام متغییر های روی
public function set_url($mainurl){
$url = trim($_SERVER['REQUEST_URI'], '/');
$segments = explode($mainurl, $url);

if (!empty($segments[1])) {
    include_once 'setting/vars.php';
}
}






// در این مبخش روتر های خود را تنظیم میکنید و کنترولر مربوطه ویو مربوطه را معرفی میکنید
public function create () {
    require_once 'controllers/create.php';
}

public function update(){
    // ذخیره میشود ومیتونید اون رو بریزید در داخل متغیر و از هر خونه اش استفاده کنید $this->request رو url تمام داده های رو 
    $request=$this->request;
    $id=$request[0];
    require_once 'controllers/update.php';

}

public function destroy(){
    $request=$this->request;
    $id=$request[0];
    require_once 'controllers/delete.php';
}
public function select(){
    require_once 'controllers/select.php';
}

}

