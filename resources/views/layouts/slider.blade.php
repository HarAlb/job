<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner col-md-8 col-sm-12 mx-auto ">
        <?php $first = false;?>
        @foreach($images as $i => $image)
        <div class="carousel-item {{ $first ? '' : 'active' }}">
            <img class="d-block w-100" src="{{ url('images/' . $image->path) }}" alt="{{ $image->alt }}">
        </div>
        <?php  $first = true ?>
        @endforeach
    </div>
</div>