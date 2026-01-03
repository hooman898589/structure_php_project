<?php
namespace routes;
include "textroute.php";
use routes\PostRoute;
use routes\testroute;


class web{
    // تعریف اسم پروژه اصلی
    public const project = 'laravelpro_php/';
    // روت ها مون رو تعریف میکنیم
    public static $createposturl = 'post/create';
    public static $updateposturl = 'post/update';
    public static $deleteposturl = 'post/delete';
    public static $selectposturl = 'post/';
    public static $testupdateurl = 'test/update';
    


    use PostRoute;
    use testroute;
    public function __construct()  {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        
    //  روت ها رو یه بار دیگه همین اینحا تعریف می کنیم
   $routes=[
            ['url'=>'post/create'],
            ['url'=> 'post/update'],
            ['url'=>'post/delete'],
            ['url'=> 'post/'],
            ['url'=>'test/update']
            
        ];


foreach ($routes as $route) {
        $url = trim($_SERVER['REQUEST_URI'], '/');
       
        $url=strpos($url,self::project.$route['url']);

        $url = ($url === 0) ? self::project . $route['url'] : "";
        
        $requesturl=self::project.$route['url'];
      
    if ($url==$requesturl) {
        break;
    }
}





















  $this->set_url($requesturl);
  $this->set_test_url($requesturl);


$project=self::project;
        switch ($requesturl) {
            //  مخصوص اش صدا میزنیم و روتر مخصوص به اون روت رو بهش معرفی می کنیم  برای مثال روتر ها همون فایلی که بغل فایل فعلی هست رو نگاه کنید $project.self::$varibel هر روت رو با 
            // باشد unique  لازم به ذکر است که همه  ی متد های روتر باید 
            case $project.self::$createposturl:
                 $this->create();
                break;
            case $project.self::$updateposturl:
                $this->update();
            case $project.self::$deleteposturl:
                $this->destroy();
                break;    
            case $project.self::$deleteposturl:
                $this->destroy();
            case $project.self::$selectposturl:
                $this->select();
            case $project.self::$testupdateurl:
                $this->testupdate();
                break;    
                break;
    
            default:
                
                break;
        }
        
    }
 

}