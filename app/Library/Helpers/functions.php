<?php

use App\Models\Post;




if (! function_exists('posts')) {
   function posts($args = null){

      $defaults = array(
         'numberposts'      => 5,
         'category'         => 0,
         'orderby'          => 'date',
         'order'            => 'DESC',
         'include'          => array(),
         'exclude'          => array(),
         'meta_key'         => '',
         'meta_value'       => '',
         'post_type'        => 'post',
         'suppress_filters' => true,
     );

     $parsed_args = dz_parse_args( $args, $defaults );

      
   }
}

function has_posts($arg = null){

   //if(is_null($arg)){
      $count = App\Models\Post::where('status','published')->get()->count();
      if($count){
         return true;
      }else{
         return false;
      }
   //}




}

function posts_count($arg = null){
   //if(is_null($arg)){
      return $count = App\Models\Post::where('status','published')->get()->count();
  //s }
}