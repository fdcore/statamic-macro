<?php

class Plugin_macro extends Plugin
{
  var $meta = array(
    'name'       => 'Macro',
    'version'    => '0.1',
    'author'     => 'Nyashkin',
    'author_url' => 'http://fdcore.com'
  );
  
  var $cached = array();
  
  public function index(){
   $name = $this->fetchParam("name");   
   $this->session->set($name, $this->content);
  }
  
  public function __call($name, $arguments) {
      
      $content = $this->session->get($name);
      
      if($content){
        if($this->content) $this->attributes['content'] = $this->content;
        $content = Parse::contextualTemplate($content, $this->attributes, $this->context);
        return $content;
      }
  }
  
}