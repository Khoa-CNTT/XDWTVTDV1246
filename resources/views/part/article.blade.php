
    <section class="innovation">
        <img src="{{asset('frontend/asset/images/anhvilla.jpg')}}"
            alt="Innovation car" />
        <div class="text">
            <h3 style="color: black">LUSHVILLA</h3>
            @foreach ($article as $article)
                <p style="color: black">{!! nl2br(e($article->Content)) !!}</p>
            @endforeach
        </div>
    </section>

