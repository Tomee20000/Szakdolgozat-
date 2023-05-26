@extends('layouts.app')
@section('title', 'Kezdőlap')

@section('content')
<div class="container">
    <div class="row justify-content-between">
        <div>
            <body style="background-color:#547980;">
            <h1 style="font-family:verdana; font-size:35px;color:#E5FCC2 ;">Köszöntelek a figyelemhiányos hiperaktivitás-zavar öndiagnosztikát segítő online kvízemben!</h1>
            <p style="font-size: 25px">Regisztráció/Bejelentkezés után lehetőséged nyílik kitölteni három főbb témában a kvízemet. <br>
            Amennyiben kitöltöd az összes kérdést, láthatod a statisztikádat, ami összegzi a kérdésekre kapott pontjaidat. <u>Természetesen ez nem egy hivatalos diagnózis!</u></p>
            <div class="row mt-4">
                <div style="font-size: 20px" class="col-12 col-lg-5">
                    <div class="row">
                        <details>
                            <summary>
                                <span class="icon">Figyelemmel kapcsolatos tünetek</span>
                            </summary>
                            <ul>
                                <li>Könnyen elterelhető a figyelmed</li>
                                <li>Úgy tűnik mintha nem figyelnél</li>
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
                                <li>Nagy a mozgásigényed</li>
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
                                <li>Érzelmi szabályozási zavarok</li>
                                <li>Alvászavar</li>
                                <li>Szenzoros érzékenység</li>
                                <li>Szociális kellemetlenség</li>
                                <li>Elutasításra érzékeny diszfória (RSD)</li>
                                <li>Az időérzék hiánya</li>
                                <li>Hiperfókusz</li>
                            </ul>
                        </details>
                    </div>
                </div>
                <div style="text-align:right" class="col-12 col-lg-7">
                    <div class="row">
                        <img src="{{ asset('images/adhd.png') }}" alt="ADHD head" width="50%">
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
