@extends('layouts.app')
@section('title', 'Kezdőlap')

@section('content')
<div class="container">
    <div class="row justify-content-between">
        <div>
            <body style="background-color:#547980;">
            <h1 style="font-family:verdana; font-size:30px;color:#E5FCC2 ;">Köszöntelek a figyelemhiányos hiperaktivitás-zavar öndiagnosztikát segítő online kvízemben!</h1>
            <p>Regisztráció/Bejelentkezés után lehetőséged nyílik kitölteni három főbb témában a kvízemet.</p>
            <details>
                <summary>
                    <span class="icon">Figyelemmel kapcsolatos tünetek</span>
                </summary>
                <ul>
                    <li>Könnyen elterelhető a figyelmed</li>
                    <li>Ugy tűnik mintha nem figyelnél</li>
                    <li>Rendszerezési/szervezési nehézségek</li>
                    <li>A figyelem lekötésének nehézségei</li>
                    <li>Hibázol</li>
                    <li>Nehézségek az utasításokkal</li>
                    <li>Bonyolult feladatok kerülése</li>
                    <li>Elhagysz dolgokat</li>
                    <li>Feledékeny vagy</li>
                </ul>
            </details>
            <details>
                <summary>
                    <span class="icon">Hiperaktív tünetek</span>
                </summary>
                <ul>
                    <li>Babrálás (fidgeting)</li>
                    <li>Gyakran hagyod el a helyed</li>
                    <li>Nyugtalannak érzed magad</li>
                    <li>Kikapcsolódási nehézségek</li>
                    <li>Mindig csinálni akarsz valamit</li>
                    <li>Sokat beszélsz</li>
                    <li>Válaszok hangos bemondása</li>
                    <li>Félbeszakítasz másokat</li>
                    <li>Problémák a várakozással</li>
                </ul>
            </details>
            <details>
                <summary>
                    <span class="icon">Nem hivatalos tünetek</span>
                </summary>
                <ul>
                    <li>Nem tipikus érzelmi reakciók</li>
                    <li>Alvászavar</li>
                    <li>Szenzoros érzékenység</li>
                    <li>Szociális kellemetlenség</li>
                    <li>Elutasításra érzékeny diszfória</li>
                    <li>Az időérzék hiánya</li>
                    <li>Hiperfókusz</li>
                </ul>
            </details>
            <div style="text-align:right">
                <img src="{{ asset('images/adhd.png') }}" alt="ADHD head" width="50%">
            </div>
        </div>
    </div>

</div>
@endsection
