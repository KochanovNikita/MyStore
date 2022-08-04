@props(['product'])

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
    <div class="carousel-indicators">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 0"></button>
            @for ($index = 1; $index <= $product->images->count(); $index++)
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$index}}" aria-label="Slide {{$index}}"></button>
            @endfor
        </div>
    </div>
    <div class="carousel-inner">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{url($product->main_image_path)}}" class="d-block" alt="{{$product->title}}">
            </div>
          @foreach ($product->images as $image)
            <div class="carousel-item">
                <img src="{{url($image->image_path)}}" class="d-block" alt="{{$product->title}}">
            </div>
          @endforeach
        </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
</div>
