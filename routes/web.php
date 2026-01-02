<?php
namespace routes;
use routes\PostRoute;


class web{
    // تعریف اسم پروژه اصلی
    public const project = 'base/';
    // روت ها مون رو تعریف میکنیم
    public static $createposturl = 'post/create';
    public static $updateposturl = 'post/update';
    public static $deleteposturl = 'post/delete';
    public static $selectposturl = 'post/';
    


    use PostRoute;
    public function __construct()  {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        
    //  روت ها رو یه بار دیگه همین اینحا تعریف می کنیم
   $routes=[
            ['url'=>'post/create'],
            ['url'=> 'post/update'],
            ['url'=>'post/delete'],
            ['url'=> 'post/']
            
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


$project=self::project;
        switch ($requesturl) {
            //مخصوص اش صدا میزنیم و روتر مخصوص به اون روت رو بهش معرفی می کنیم همون برای مثال همون فایلی که بغل فایل فعلی هست $project.self::$varibel هر روت رو با 
            // باشد unique  لازم به ذکر است که همه  ی متد ها باید 
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
                
                break;
    
            default:
                
                break;
        }
        
    }
 

}