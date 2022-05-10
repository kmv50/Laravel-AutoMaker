<?php 

namespace AutoMake\Laravel;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use Symfony\Component\Finder\SplFileInfo;

class TemplateMaker{
    


    private function MakeTemplateJS(): void{
        
        $packageJsonTemplate = (new AutoMakePathResolve(__DIR__))->Push("Templates")->Push("js")->Push("package.json")->ToString();
        $webpackTemplate = (new AutoMakePathResolve(__DIR__))->Push("Templates")->Push("js")->Push("webpack.mix.js")->ToString();
        $appJs = (new AutoMakePathResolve(__DIR__))->Push("Templates")->Push("js")->Push("app.js")->ToString();
        
        $baseUrl = base_path();
        copy($packageJsonTemplate,$baseUrl);
        copy($webpackTemplate,$baseUrl);

        $Dirjs = (new AutoMakePathResolve(resource_path()))->Push("js")

        (new AutoMakePathResolve($Dirjs))->Push("app.js")->Delete();
        (new AutoMakePathResolve($Dirjs))->Push("bootstrap.js")->Delete();
        

        copy($appJs,(new AutoMakePathResolve($Dirjs))->Push("app.js")->ToString());    
    }




}

