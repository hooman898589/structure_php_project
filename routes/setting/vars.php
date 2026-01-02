

<?php
     
                $request=explode('/',$segments[1]);
               $request = array_filter($request); // مرتب‌سازی کلیدها از 0 
               $request = array_values($request);
                $this->request=$request;
             

