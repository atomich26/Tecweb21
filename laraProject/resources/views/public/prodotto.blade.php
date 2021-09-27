@extends('layouts.public', ['title' => $prodotto->nome . " - " . $prodotto->modello])

@section('content')

<div class="header-product-page">
    <div class="product-overview container">
        <h1 class="product-name">{{ $prodotto->nome ?? 'Prodotto senza nome'}}</h1>

        @include('helpers.product-image', ['image' => $prodotto->file_img, 'class' => 'product-image'])

        <h2 id="modello">Modello: <span>{{$prodotto->modello ?? 'Numero modello mancante'}}</span></h2>
        <div id="specifiche-prodotto">
            <h2>Specifiche:</h2>
            @include('helpers.product-content-list', ['stringToSplit' => $prodotto->specifiche])
        </div>

        @auth
            <div class="product-buttons">

                @can('isAdmin')
                <a href="{{ route('prodotto.modify', ['productID' => $prodotto->ID]) }}" class="edit-prodotto-btn button"><i class="bi bi-pencil-square"></i>&nbsp;&nbsp;Modifica prodotto</a>
                @endcan

                <a href="#" class="malfunzionamenti-btn button"><i class="bi bi-gear"></i>&nbsp;&nbsp;Ricerca e risoluzione dei problemi</a>
            </div>
        @endauth
    </div>
</div>

<div class="container">
    <div id="descrizione-prodotto" class="product-text">
        <h3>Descrizione:</h3>
        <p>{{ $prodotto->descrizione ?? "Descrizione non disponibile" }}</p>
    </div>

    <div id="installazione-prodotto" class="product-text">
        <h3>Installazione:</h3>
        @include('helpers.product-content-list', ['stringToSplit' => $prodotto->guida_installazione])
    </div>

    <div id="note-uso-prodotto" class="product-text">
        <h3>Note di buon uso:</h3>
        @include('helpers.product-content-list', ['stringToSplit' => $prodotto->note_uso])
    </div>
</div>

@endsection
