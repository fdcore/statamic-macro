<?php

class Plugin_macro extends Plugin
{
  var $meta = array(
    'name'       => 'Macro',
    'version'    => '0.2',
    'author'     => 'Dmitriy Nyashkin',
    'author_url' => 'http://nyashk.in'
  );
  
  var $cached = array();
  
  public function index(){
   $name = $this->fetchParam("name");   
   $this->blink->set($name, $this->content);
  }
  
  public function __call($name, $arguments) {
      
      $content = $this->blink->get($name);
      
      if($content){
        if($this->content) $this->attributes['content'] = $this->content;
        $content = Parse::contextualTemplate($content, $this->attributes, $this->context);
        return $content;
      }
  }
  
}