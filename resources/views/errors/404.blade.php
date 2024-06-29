@extends('layouts.frontend')
@section('content-frontend')
@php
   $categories = App\Models\Category::where('status',1)->orderBy('id', 'ASC')->limit(7)->get();
@endphp
<div class="error-area ptb-100">
   <div class="container">
      <div class="top-content">
         <ul>
            <li>4</li>
            <li>0</li>
            <li>4</li>
         </ul>
      </div>
      <h2>Page Not Found</h2>

   </div>
</div>
@endsection