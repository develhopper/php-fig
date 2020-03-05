<?php
namespace Log;

class Logger implements LoggerInterface{
    
    use LoggerTrait;
    
    private $options=[
        'LogFormat'=>'[{date}]-[{level}]::{message}',
        'dateFormat'=>'Y-M-d H:i:s'
    ];

    public function __construct(array $options=array())
    {
        if($options){
            $this->options=array_merge($this->options,$options);
        }
    }
    
    public function log($level,$message,array $context=array()){
        $context['level']=$level;
        $context['date']=date($this->options['dateFormat']);
        $message=$this->interpolate($message,$context);
        echo $message;
    }

    private function interpolate($message,array $context=array()){
        $result=str_replace("{message}",$message,$this->options["LogFormat"]);
        
        $replace=array();
        foreach($context as $key=>$value){
            $replace['{'.$key.'}']=$value;
        }
        return strtr($result,$replace);
    }

}