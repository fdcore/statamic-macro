<?php

class Plugin_macro extends Plugin
{
  var $meta = array(
    'name'       => 'Macro',
    'version'    => '0.4',
    'author'     => 'Dmitriy Nyashkin',
    'author_url' => 'http://fdcore.com'
  );
    
  public function index(){
      $name = $this->fetchParam("name");   
      $this->blink->set($name, $this->content);
  }
  
  function __call($name, $arguments) {
      $use_context = $this->fetchParam("use_context");
      $content = $this->blink->get($name);
            
      if($content){
        // check pair tags
        if($this->content) {
          if($use_context == 'true')
            $this->attributes['content'] = Parse::contextualTemplate($this->content, $this->attributes, $this->context);
          else 
            $this->attributes['content'] = $this->content;
        }
        $content = Parse::contextualTemplate($content, $this->attributes, $this->context);
        return $content;
      } else {
        // return default pair content
        return $this->content;
      }
  }
  
}