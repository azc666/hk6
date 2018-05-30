@extends('layouts/main')

@section('title')
  {{ strip_tags($category->cat_name) }}
@endsection

@php
  $pathToPdf = 'assets/mpdf/temp/showData.pdf';
  $pathToWhereJpgShouldBeStored = 'assets/mpdf/temp/showData.jpg';
  Storage::delete([$pathToPdf, $pathToWhereJpgShouldBeStored]);
@endphp

@section('content')

{{-- <br> --}}
<div class="container">     
<div class="row">
  <h2 class="pull-left move-up"> Select {{ $category->cat_name }} </h2>
  
  @if (strpos($category->cat_name, 'Staff') !== false)
    <a href="{{ url("/staff")}}" class="btn btn-primary pull-right" role="button">Return to Staff Stationery Page</a>
  @elseif (strpos($category->cat_name, 'Associate') !== false)
    <a href="{{ url("/associate")}}" class="btn btn-primary pull-right" role="button">Return to Associate Stationery Page</a>
  @elseif (strpos($category->cat_name, 'Partner') !== false)
    <a href="{{ url("/partner")}}" class="btn btn-primary pull-right" role="button">Return to Partner Category Page</a>
  @endif
  
</div>

@foreach($category->products->sortBy('prod_name')->chunk(3) as $productChunk)
        
  <div class="row body-background">   
    @if ($category->products->count())

      @foreach($productChunk as $product)

        <div class="col-sm-6 col-md-12">
          <br><br>
         <div class="col-sm-6 col-md-6">     
            @php
            if (Auth::user()->username == 'HK35') {
              $product->id == 103 ? $imagePath  = '/assets/partner/mexico_pbc.jpg' : '';
              $product->id == 109 ? $imagePath  = '/assets/partner/mexico_pfyi.jpg' : '';
              $product->id == 106 ? $imagePath  = '/assets/partner/mexico_pbcfyi.jpg' : '';
              $product->id == 102 ? $imagePath  = '/assets/associate/mexico_abc.jpg' : '';
              $product->id == 108 ? $imagePath  = '/assets/associate/mexico_afyi.jpg' : '';
              $product->id == 105 ? $imagePath  = '/assets/associate/mexico_abcfyi.jpg' : '';
              $product->id == 101 ? $imagePath  = '/assets/staff/mexico_sbc.jpg' : '';
              $product->id == 107 ? $imagePath  = '/assets/staff/mexico_sfyi.jpg' : '';
              $product->id == 104 ? $imagePath  = '/assets/staff/mexico_sbcfyi.jpg' : '';
            } elseif (Auth::user()->username == 'HK34') {
              $product->id == 103 ? $imagePath  = '/assets/partner/bogota_pbc.jpg' : '';
              $product->id == 109 ? $imagePath  = '/assets/partner/bogota_pfyi.jpg' : '';
              $product->id == 106 ? $imagePath  = '/assets/partner/bogota_pbcfyi.jpg' : '';
              $product->id == 102 ? $imagePath  = '/assets/associate/bogota_abc.jpg' : '';
              $product->id == 108 ? $imagePath  = '/assets/associate/bogota_afyi.jpg' : '';
              $product->id == 105 ? $imagePath  = '/assets/associate/bogota_abcfyi.jpg' : '';
              $product->id == 101 ? $imagePath  = '/assets/staff/bogota_sbc.jpg' : '';
              $product->id == 107 ? $imagePath  = '/assets/staff/bogota_sfyi.jpg' : '';
              $product->id == 104 ? $imagePath  = '/assets/staff/bogota_sbcfyi.jpg' : '';
            } elseif (Auth::user()->username == 'HK46') {
              $product->id == 103 ? $imagePath  = '/assets/partner/london_pbc.jpg' : '';
              $product->id == 109 ? $imagePath  = '/assets/partner/london_pfyi.jpg' : '';
              $product->id == 106 ? $imagePath  = '/assets/partner/london_pbcfyi.jpg' : '';
              $product->id == 102 ? $imagePath  = '/assets/associate/london_abc.jpg' : '';
              $product->id == 108 ? $imagePath  = '/assets/associate/london_afyi.jpg' : '';
              $product->id == 105 ? $imagePath  = '/assets/associate/london_abcfyi.jpg' : '';
              $product->id == 101 ? $imagePath  = '/assets/staff/london_sbc.jpg' : '';
              $product->id == 107 ? $imagePath  = '/assets/staff/london_sfyi.jpg' : '';
              $product->id == 104 ? $imagePath  = '/assets/staff/london_sbcfyi.jpg' : '';
            }
            @endphp  

            @if (Auth::user()->username == 'HK34' || Auth::user()->username == 'HK35' || Auth::user()->username == 'HK46')
              <a href="{{ url(substr_replace($imagePath, 'pdf', -3)) }}" title="Open PDF of Template in new window" target="_blank"><img src="{{ $imagePath }}" class="img-responsive dropshadow" alt="..."></a>
           @else
              <a href="{{ url(substr_replace($product->imagePath, 'pdf', -3)) }}" title="Open PDF of Template in new window" target="_blank"><img src="{{ $product->imagePath }}" class="img-responsive dropshadow" alt="..."></a>
           @endif        

              <h5><i>&nbsp;&nbsp;{!! strip_tags($product->prod_name) !!} Template&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></h5>
        </div>
        <div class="col-sm-6 col-md-6">
              <div class="caption">
                <h3> {!! $product->prod_name !!} </h3><br>
                <p class="description text-muted">{!! nl2br($product->description) !!}</p>
                <br>
                <p><a href="{{ url("/products/$product->id") }}" class="btn btn-primary btn-block" role="button">Enter Your Product Data</a></p>
              </div>
        </div>
        </div>
      
      @endforeach

    @endif 
    
  </div>    
@endforeach
@endsection