
    <!-- Post preview-->
    <div class="post-preview">
        <a href="{{ route('articledetails',$article->slug) }}">
            <h2 class="post-title">{{ $article->title }}</h2>
            <h3 class="post-subtitle">{{ substr($article->content,0,200).' ...' }}</h3>
        </a>
        <p class="post-meta">
            <span>{{ $article->name }} tarafından oluşturuldu </span>
            <span class="float-end">{{ $article->getCategory->created_at->diffForHumans() }}</span>
        </p>
        <p class="post-meta">
           Kategori : <a href={{ route('articlesbycategory',$article->getCategory->slug) }}>{{strtoupper($article->getCategory->name)}}</a>
        </p>


    </div>
    <!-- Divider-->
    <hr class="my-4" />

    <!-- Pager-->

