@extends('digishop.layout')

@section('title',$page->title)

@section('style')
   
@endsection


@section('content')

   <h2>page.php</h2>

@endsection


@section('javascript')
   <script>
      $(function(){
         'use strict'

         console.log('index Loaded')

      });
   </script>
@endsection
