<?php
namespace psr_4;

class Autoloader{

    protected $prefixes=array();

    public function register(){
        
        spl_autoload_register([$this,'LoadClass']);
    }

    public function addNamespace($prefix,$basedir){
        if(!isset($this->prefixes[$prefix])){
            $this->prefixes[$prefix]=array();
        }
        $basedir=ltrim($basedir,'/');
        array_push($this->prefixes[$prefix],$basedir);
    }

    public function LoadClass($class){
        $prefix=$class;
        $pos=strrpos($prefix,"\\");
        $class_name=substr($prefix,$pos+1);
        $prefix=substr($prefix,0,$pos);
        return $this->LoadFile($prefix,$class_name);
    }

    public function LoadFile($prefix,$class){
        if(!isset($this->prefixes[$prefix]))
            return false;
        
        foreach($this->prefixes[$prefix] as $basedir){
            $file=$basedir.'/'.$class.'.php';
            
            if(file_exists($file)){
                require $file;
                return $file;
            }    
        }
    }

    public function dump(){
        var_dump($this->prefixes);
    }

}

