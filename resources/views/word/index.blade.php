@extends('layouts.app')

@section('content')
<div id="content">
    <div>
        <h2>Find Your Word</h2>
        <div id="search">
            <input type="text" name="search" placeholder="buscar">
            <button type="submit">
                <img src="{{asset('storage/siteAssets/search.svg')}}" alt="">
            </button>
        </div>
    </div>

    <div>
        <h2>Results</h2>
        <results>
            <div>
                <img src="{{asset('storage/siteAssets/downArrow.svg')}}" alt="">
            </div>
            <h1>Achiote</h1>
            <cntry>
                <select name="countary">
                    <option value="Spain">
                        <p>Spain</p>
                        <div>
                            <img src="{{asset('storage/siteAssets/flag.svg')}}" alt="">
                        </div>
                    </option>
                </select>
            </cntry>

            <meaning>
                <div>
                    <h2>Bixa orellana</h2>
                    <language>
                        <select name="countary">
                            <option value="Spain">
                                <p>Latin</p>
                            </option>
                        </select>
                    </language>
                </div>
                <div>
                    <h2>Annatto seed</h2>
                    <language>
                        <select name="countary">
                            <option value="Spain">
                                <p>Latin</p>
                            </option>
                        </select>
                    </language>
                </div>
            </meaning>
            <defination>
                <p>
                    pigmento natural, de coloración rojo-amarilla, ampliamente
                    utilizado en la cocina latinoamericana. Las semillas duras deben
                    ser tratadas con aceite, grasa u agua caliente para liberar los
                    componentes colorantes.
                </p>
            </defination>
        </results>
    </div>
    <div>asdfsdafasdf</div>
</div>
{{-- @php
use App\Word;
use App\Synonyms;
    function syno($word_id)
    {
        $synonyms = [];

        $words = Synonyms::where('word_id', $word_id)->get();
        
        foreach ($words as $word) {
            $synonym = Word::where('id', $word->syno_id)->get();
            array_push($synonyms, $synonym);
        }

        return $synonyms;
        
    }
@endphp 
    <ul>

        @foreach ($words as $word)
            <li>{{$word->word}}</li>
            @php
                $syns = syno($word->id);
            @endphp
            <ul>
                @foreach ($syns as $syn)
                    @foreach ($syn as $name)
                        <li>{{$name->word}}</li>
                    @endforeach
                @endforeach
            </ul>
        @endforeach
    </ul>
    <br><hr><br> --}}


@endsection
