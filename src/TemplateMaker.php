<?php 

namespace AutoMake\Laravel;

class TemplateMaker{
    


    public function MakeTemplateJS(): void{
        
        $packageJsonTemplate = (new AutoMakePathResolve(__DIR__))->Push("Templates")->Push("js")->Push("package.json")->ToString();
        $webpackTemplate = (new AutoMakePathResolve(__DIR__))->Push("Templates")->Push("js")->Push("webpack.mix.js")->ToString();
        $appJs = (new AutoMakePathResolve(__DIR__))->Push("Templates")->Push("js")->Push("app.js")->ToString();
        
        $baseUrl = base_path();
        $targetPackageJson = (new AutoMakePathResolve($baseUrl))->Push("package.json")->ToString();
        $targetwebpackTemplate = (new AutoMakePathResolve($baseUrl))->Push("webpack.mix.js")->ToString();

        copy($packageJsonTemplate,$targetPackageJson);
        copy($webpackTemplate,$targetwebpackTemplate);
        
        $Dirjs = (new AutoMakePathResolve(resource_path()))->Push("js");

        (new AutoMakePathResolve($Dirjs))->Push("app.js")->Delete();
        (new AutoMakePathResolve($Dirjs))->Push("bootstrap.js")->Delete();
        

        copy($appJs,(new AutoMakePathResolve($Dirjs))->Push("app.js")->ToString());    
    }

 
    public function MakeLoginTemplate(): void{        
       $pathSecurity = (new AutoMakePathResolve(app_path()))->Push("Http")->Push("Controllers")->Push("Security");
    

       if(!is_dir($pathSecurity ->ToString()))
            mkdir($pathSecurity ->ToString(),0777,true);

       $pathSecurity->Push('AuthController.php');

       $loginControllerTemplate = (new AutoMakePathResolve(__DIR__))->Push("Templates")->Push("Controllers")->Push("AuthController.php")->ToString();


       copy($loginControllerTemplate,$pathSecurity->ToString());

       ///////////////////////////////////////////////////////////////

       $pathview = (new AutoMakePathResolve(resource_path()))->Push("views")->Push("login");
       if(!is_dir($pathview ->ToString()))
            mkdir($pathview ->ToString(),0777,true);

       $pathview->Push('login.blade.php');

       $loginviewTemplate = (new AutoMakePathResolve(__DIR__))->Push("Templates")->Push("Views")->Push("login.blade.php")->ToString();


       copy($loginviewTemplate,$pathview->ToString());

    }


    public function MakeLayoutTemplate(): void{        
        $pathController = (new AutoMakePathResolve(app_path()))->Push("Http")->Push("Controllers");
     
 
        if(!is_dir($pathController ->ToString()))
             mkdir($pathController ->ToString(),0777,true);
 
        $pathController->Push('HomeController.php');
 
        $pathControllerTemplate = (new AutoMakePathResolve(__DIR__))->Push("Templates")->Push("Controllers")->Push("HomeController.php")->ToString();
 
 
        copy($pathControllerTemplate,$pathController->ToString());
 
        ///////////////////////////////////////////////////////////////
 
        $pathview = (new AutoMakePathResolve(resource_path()))->Push("views")->Push("layouts");
        if(!is_dir($pathview ->ToString()))
             mkdir($pathview ->ToString(),0777,true);
 
        $pathview->Push('main.blade.php');
 
        $viewTemplate = (new AutoMakePathResolve(__DIR__))->Push("Templates")->Push("Views")->Push("main.blade.php")->ToString();
 
 
        copy($viewTemplate ,$pathview->ToString());


        ///////////////////////////////////////////////////////////////
 
        $pathview = (new AutoMakePathResolve(resource_path()))->Push("views")->Push("layouts");
        if(!is_dir($pathview ->ToString()))
             mkdir($pathview ->ToString(),0777,true);
 
        $pathview->Push('menu.blade.php');
 
        $viewTemplate = (new AutoMakePathResolve(__DIR__))->Push("Templates")->Push("Views")->Push("menu.blade.php")->ToString();
 
 
        copy($viewTemplate ,$pathview->ToString());


        ////////////////////////////////////////////////////////////
        $pathview = (new AutoMakePathResolve(resource_path()))->Push("views")->Push("home");
        if(!is_dir($pathview ->ToString()))
             mkdir($pathview ->ToString(),0777,true);
 
        $pathview->Push('dashboard.blade.php');
 
        $viewTemplate = (new AutoMakePathResolve(__DIR__))->Push("Templates")->Push("Views")->Push("dashboard.blade.php")->ToString();
 
 
        copy($viewTemplate ,$pathview->ToString());
     }


     public function MakeRoute(): void{
        $target = (new AutoMakePathResolve(base_path()))->Push("routes")->Push("web.php")->ToString();
        $source = (new AutoMakePathResolve(__DIR__))->Push("Templates")->Push("routes")->Push("web.php")->ToString();

        copy($source ,$target);
     }


     public function MakeSeed(): void{
        $target = (new AutoMakePathResolve(base_path()))->Push("database")->Push("seeders")->Push('DatabaseSeeder.php')->ToString();
        $source = (new AutoMakePathResolve(__DIR__))->Push("Templates")->Push("seeders")->Push("DatabaseSeeder.php")->ToString();

        copy($source ,$target);
     }

}

