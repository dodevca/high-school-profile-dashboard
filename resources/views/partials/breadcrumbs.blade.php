<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
        <ol>
            @foreach($breadcrumbs as $breadcrumb)
                @if(!$loop->last)
                    @if(isset($breadcrumb['url']))
                        <li><a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['label'] }}</a></li>
                    @else
                        <li>{{ $breadcrumb['label'] }}</li>
                    @endif
                @else
                    <li>{{ $breadcrumb['label'] }}</li>
                @endif
            @endforeach
        </ol>
        <h2>{{ $breadcrumb['label'] }}</h2>
    </div>
</section>