{{-- @extends('layouts.default')

@section('main') --}}
    <article class="article">
        <h1 class="headline headline--important">
            <strong class="strong">Whoops?!</strong>
        </h1>
        <p class="paragraph">Irgendwie ist etwas außergewöhnliches schiefgelaufen.</p>
        <a class="button button--primary button--without-icon" href="{{ url('/') }}">
            Zur Startseite
        </a>
        <div style="position: relative;width: 100%;padding-top:83.9583333333%;margin-bottom: 1rem;">
            <iframe src="https://giphy.com/embed/yZ2FSn86bf2co"  style="position:absolute;top:0;right:0;bottom:0;left:0;width:100%;height:100%;" frameBorder="0" class="giphy-embed" allowFullScreen></iframe>
        </div>
        <p class="paragraph">Hier noch irgendein Da Vinci Code für die Entwickler:</p>
        @if($exception->getMessage())
            <pre>{{$exception->getMessage()}}</pre>
        @endif
        <pre style="overflow-x: scroll;">{{$exception->getTraceAsString()}}</pre>
    </article>
{{-- @endsection --}}
