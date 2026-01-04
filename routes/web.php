<?php
namespace routes;
include "textroute.php";
use routes\PostRoute;
use routes\testroute;


class web{
    // تعریف اسم پروژه اصلی
    public const project = 'laravelpro_php/';
    // روت ها مون رو تعریف میکنیم

    

    use PostRoute;
    use testroute;
    public function __construct()  {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        $method=$_SERVER['REQUEST_METHOD'];
    //  روت ها رو یه بار دیگه همین اینحا تعریف می کنیم
   $routes=[
            ['url'=>'post/create','callback'=> "create",'method'=>"POST"],
            ['url'=> 'post/update','callback'=>"update",'method'=>"POST"],
            ['url'=>'post/delete', "callback"=> "destroy",'method'=>"POST"],
            ['url'=> 'post',    'callback'=>  "select",'method'=>"GET"],
            ['url'=>'test/update' , "callback" => "testupdate",'method'=>"POST"]
            
        ];


foreach ($routes as $route) {
        $url = trim($_SERVER['REQUEST_URI'], '/');
       
        $url=strpos($url,self::project.$route['url']);

        $url = ($url === 0) ? self::project . $route['url'] : "";
        
        $requesturl=self::project.$route['url'];
      
    if ($url==$requesturl) {
        break;
    }else {
        $requesturl='';
    }
}


















  $this->set_url($requesturl);
  $this->set_test_url($requesturl);


$project=self::project;
        
foreach ($routes as $route) {
    if ($requesturl === $project . $route['url']) {
        if ($method==$route['method']) {

        $callback=$route['callback'];
        $this->$callback();
                    # code...
     
        exit;
        }
    }
}

   include '404.php';


    }
 

}