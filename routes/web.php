<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ciao/{nome}', function (string $nome) {
    return view('saluto', ['nome' => $nome]);
});

// 8.2
// int nel parametro agisce come un normale casting php quindi se anno è una stringa viene sollevato l'errore 500 perchè è un errore php sul server
Route::get('/anno/{anno}', fn (int $anno) => "Libri del $anno")
    ->whereNumber('anno') //viene eseguito quando viene valutata la rotta. Se anno non è numerico la rotta viene saltata e se non ce n'è un'altra che corrisponde da errore 204
    ->name('anno');

Route::get('/cerca/{testo?}', fn (?string $testo = null) =>
    $testo ? "Hai cercato: $testo" : 'Scrivi qualcosa da cercare');

// 8.3
Route::get('/info', fn () => view('info'))->name('info');

Route::get('/libro-del-giorno', function () {
    return view('libro', [
        'titolo' => 'Il barone rampante',
        'autore' => 'Italo Calvino',
        'anno' => 1957,
    ]);
});
