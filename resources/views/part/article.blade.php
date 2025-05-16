<div class="article-content">
    @foreach ($article as $article)
        {!! nl2br(e($article->Content)) !!}
    @endforeach

    <div class="article-contact">
        <span>📞</span>
        <span>Liên hệ: 0707463127</span>
    </div>
</div>
