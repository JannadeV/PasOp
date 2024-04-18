<div class="card">
    <p className="text-3xl font-bold underline">
        Hello world! <br>
    </p>
    <img src="{{ asset($pet->dierfotos[0]->path) }}"  class="card-img-top h-full w-full object-cover object-center lg:h-full lg:w-full" alt="Foto van een huisdier" >
    <!--<img src="{{ asset('img/myimage.png') }}" alt="description of myimage">-->
    <div class="card-body">
        <h5 class="card-title">{{ $pet->naam }}</h5>
        <p class="card-text">{{ $pet->soort }}</p>
    </div>
</div>