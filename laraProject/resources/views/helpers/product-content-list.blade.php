@php
    $stringsList;
    $stringFull = null;

    if(preg_match_all('/§(.[^§]+)/m', $stringToSplit, $matches, 0, 0))
        $stringsList = $matches[0];
    else
        $stringsList = null;
        $stringFull = $stringToSplit;
@endphp


@isset($stringsList)
    <ul style="padding-left: 20px">
        @foreach ($stringsList as $string)
            <li style="margin:10px 0"><p>{{ str_replace('§', '', $string) }}</p></li>
        @endforeach
    </ul>
@endisset

@empty($stringsList)
    @isset($stringFull)
        <p style="margin:10px 0">{{$stringFull}}</p>
    @endisset
    @empty($stringFull)
    <h4>{{ __('Nessun contenuto disponibile') }}</h4>
    @endempty
@endempty
