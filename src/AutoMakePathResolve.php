<?php 

namespace AutoMake\Laravel;


class AutoMakePathResolve{
    private array $pathParts;
    public function __construct($path = null)
    {
        if($path == null){
            $this->pathParts = [];
            return;
        }

        if(is_string($path)){
            $this->pathParts = $this->CreatePathArrayFromString($path);
        }else if($path instanceof AutoMakePathResolve) {
           $this->pathParts = $path->AsArray();
        }
    }

    private function CreatePathArrayFromString(string $path): array{
        $path = str_replace(['/','\\'],DIRECTORY_SEPARATOR,$path);
        return explode(DIRECTORY_SEPARATOR,$path);
    }

    public function AsArray() : array{
        return $this->pathParts;
    }

    public function ToString() : string{
        return join(DIRECTORY_SEPARATOR,$this->pathParts);
    }

    public function CurrentPathExists() : bool{
        return is_dir($this->ToString());
    }

    public function FileOrDirExistsOnCurrentPath(string $value) : bool{
        $pathTry = array_merge($this->pathParts, $this->CreatePathArrayFromString($value));
        $strPath = join(DIRECTORY_SEPARATOR,$pathTry);
        return is_dir($strPath) || is_file($strPath);
    }

    public function CurrentPathIsWritable(): bool{
        if(!$this->CurrentPathExists())
            return false;        
            
        return is_writable($this->ToString());
    }

    public function Push(string $value): AutoMakePathResolve{
        $this->pathParts = array_merge($this->pathParts, $this->CreatePathArrayFromString($value));    
        return $this;
    }

    public function Pop(): AutoMakePathResolve{
        $this->pathParts = array_pop($this->pathParts);
        return $this;
    }

    public function Clone(){
        return new AutoMakePathResolve($this);
    }


    public function Write($data){
        \file_put_contents($this->ToString(), $data);
    }

    public function MakeDir(string $DirName) : bool{
        return mkdir($this->Clone()->push($DirName)->ToString());
    }

    public function CurrentPathGetFiles() : array{
        return scandir($this->ToString());
    }


    public function Delete(): bool{
        $target = $this->ToString();
        if(is_file($target))
            return unlink($target);
        return true;
    }

}

