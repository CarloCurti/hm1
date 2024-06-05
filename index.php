<?php
require_once("config.php");
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="index.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="index.js" defer></script>

        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.1/mapsjs-ui.css" />
        <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-core.js"></script>
        <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-service.js"></script>
        <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-ui.js"></script>
        <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-mapevents.js"></script>

        <script src="https://api.mapbox.com/mapbox-gl-js/v2.8.2/mapbox-gl.js"></script>
        <link href="https://api.mapbox.com/mapbox-gl-js/v2.8.2/mapbox-gl.css" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <body>
        <nav id="nav1">
            <div id="contenitore-nav1">
                <div>
                    <a href="#" id="link-immagini"><img id="immagine-nav1" src="immagini per html\images.png"></a>
                </div>
                <form method="POST" name="form_catalogo" id="form-ricerca-API">
                    <input type="text" name="catalogo" placeholder="catalogo" id="modulo-ricerca-api">
                    <button type="submit" id="lente-mobile-API"><img id="lente-ricerca-api" src="immagini per html\lente_di_ricerca.png"></button>
                </form>
            </div>

            <div id="immagini-nav">
                <div>
                    <a id="js-lingua" id="links" href="#"><img id="immagine-lingua" src="immagini per html\Screenshot 2024-03-29 125137.png"><span>Italiano</span></a>
                </div>
                <div>    
                    <a id="js-negozio" id="links" href="#"><img id="immagine-negozio" src="immagini per html\Screenshot 2024-03-29 125204.png"><span>Trova un negozio</span></a>
                </div>
                <div id="contenitore-accesso">    
                    <a id="js-accesso" id="links" href="#"><img id="immagine-accesso" src="immagini per html\Screenshot 2024-03-29 125215.png"><span>Benvenuto, <?php echo isset($_SESSION['nome']) ? $_SESSION['nome'] : 'Accedi'; ?></span></a>
                    <button id="button-logout" class="hidden">Logout</button>
                </div>
            </div>

        </nav>

        <nav>

            <div id="scritte-nav">
                <a class="effetto-sottolineato" id="links" href = "#"> Nuovi arrivi </a>
                <a class="effetto-sottolineato" id="links" href = "#"> Uomo </a>
                <a class="effetto-sottolineato" id="links" href = "#"> Donna </a>
                <a class="effetto-sottolineato" id="links" href = "#"> Bambino </a>
                <a class="effetto-sottolineato" id="links" href = "#"> Marche </a>
                <a class="effetto-sottolineato" id="links" href = "#"> Offerte </a>
            </div>  

            <div id="contenitore-nav-mobile">

                <div id="contenitore-accesso">    
                    <a id="js-accesso-mobile" id="links" href="#"><img id="immagine-accesso" src="immagini per html\Screenshot 2024-03-29 125215.png"><span>Benvenuto, <?php echo isset($_SESSION['nome']) ? $_SESSION['nome'] : 'Accedi'; ?></span></a>
                    <button id="button-logout-mobile" class="hidden">Logout</button>
                </div>

                <div id="menu">
                    <a id="link-menu" href="">
                        <div id="menu div"></div>
                        <div id="menu div"></div>
                        <div id="menu div"></div>
                    </a>
                </div> 

                <div id="contenitore-nav"> 
                    <div>
                        <button id="catalogo"><img id="immagine-catalogo" src="immagini per html\catalogo.png"></button>
                    </div>   
                    <div>
                        <button id="carrello"><img id="immagine-carrello" src="immagini per html\carrello1.png"></button>
                    </div>
                    <div>
                        <button id="preferiti"><img id="immagine-preferiti" src="immagini per html\cuore1.png"></button>
                    </div>
                </div> 
            </div>

            <div id="menu-a-comparsa" class="hidden">
                <div class="menu1"><a class="link-testo-menu" href="#">Nuovi arrivi</a></div>
                <div class="menu1"><a class="link-testo-menu" href="#">Uomo</a></div>
                <div class="menu1"><a class="link-testo-menu" href="#">Donna</a></div>
                <div class="menu1"><a class="link-testo-menu" href="#">Bambino</a></div>
                <div class="menu1"><a class="link-testo-menu" href="#">Marche</a></div>
                <div class="menu1"><a class="link-testo-menu" href="#">Offerte</a></div>
                <div id="menu-finale">
                    <div id="striscie-bianche1"></div>
                    <div id="striscie-bianche2"></div>
                    <div id="striscie-bianche3"></div>
                </div>
            </div>

        </nav>

        <header> 

        <div id="tendina-prodotti"></div>  

            <div id="blocco-catalogo" class="hidden">
                <button id="chiudi-catalogo">Chiudi</button>
                <div id="scarpe-catalogo">
                    <div class="scarpa">
                        <img class="img-scarpa" src="immagini per html\nike-scarpa-catalogo.webp" alt="Nike">
                        <span class="nome-scarpa">Nike Air Force 1 Low</span>
                        <span class="prezzo-scarpa">€120</span>
                        <div class="bottoni-catalogo">
                            <button class="button-cuore" data-item-id="1"><img class="img-cuore" src="immagini per html\cuore.png"></button>
                            <div class="compra">
                                <button class="button-carrello" data-item-id="1"><img class="img-carrello" src="immagini per html\carrello.png"></button>
                                <input type="number" name="quantità" class="quantità" min="1" max="99" value="1">
                            </div>
                        </div>
                    </div>
                    <div class="scarpa">
                        <img class="img-scarpa" src="immagini per html\adidas-scarpa-catalogo.webp" alt="Adidas">
                        <span class="nome-scarpa">Adidas Campus '00</span>
                        <span class="prezzo-scarpa">€119</span>
                        <div class="bottoni-catalogo">
                            <button class="button-cuore" data-item-id="2"><img class="img-cuore" src="immagini per html\cuore.png"></button>
                            <div class="compra">
                                <button class="button-carrello" data-item-id="2"><img class="img-carrello" src="immagini per html\carrello.png"></button>
                                <input type="number" name="quantità" class="quantità" min="1" max="99" value="1">
                            </div>
                        </div>
                    </div>
                    <div class="scarpa">
                        <img class="img-scarpa" src="immagini per html\jordan-scarpa-catalogo.webp" alt="Jordan">
                        <span class="nome-scarpa">Jordan 1 Low</span>
                        <span class="prezzo-scarpa">€130</span>
                        <div class="bottoni-catalogo">
                            <button class="button-cuore" data-item-id="3"><img class="img-cuore" src="immagini per html\cuore.png"></button>
                            <div class="compra">
                                <button class="button-carrello" data-item-id="3"><img class="img-carrello" src="immagini per html\carrello.png"></button>
                                <input type="number" name="quantità" class="quantità" min="1" max="99" value="1">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="div-accesso" class="hidden">
                <form method="POST" name="form_accesso" action="login.php">
                    <div id="contenitore-int-js">Accedi</div>
                    <div id="cont-email">
                        <input id="email" type="email" placeholder="INDIRIZZO E-MAIL" name="email">
                    </div>
                    <div id="cont-pass">
                        <input id="password" type="password" placeholder="PASSWORD" name="password">
                    </div>
                    <a id="pass-dim"><u>Password dimenticata</u></a>
                    <button id="accedi" type="submit">ACCEDI</button>
                </form>
                <button id="crea-account">CREA UN ACCOUNT</button>
            </div>
            
            <div>
                <a href="#"><img id="immagine-header" src="https://images.footlocker.com/content/dam/final/footlockereurope/Online_activations/fl-campaign/2024/2023_11_21_fl_omn_s24_phase_3_heritage_tech_digital/05_final_output_files/ecom/hp_banners/2023_11_21_FL_OMN_S24_PHASE-3_Heritage-Tech_HPbanner-02_3200x1080.jpg"></a>
            </div>

            <div id="colonna">
                <div id="scritta_superiore">LA PRATICITÀ INCONTRA LO STILE</div>
                <div id="retrò">RÈTRO</div>
                <div id="scritta_inferiore">Sfoggia un look autentico con modelli streetwear pensati per tutti i giorni.</div>
                <div id="contenitore-tasti">
                    <a class="link-mobile" href='#'><button id="tasti-header">ACQUISTA ORA</button></a>   
                    <a class="link-mobile" href='#'><button id="tasti-header1">LEGGI DI PIÙ</button></a>
                </div>
            </div>

        </header>

        <section>
            <div id="loghi-container">
                <section id="section-loghi-container">
                    <div class="colonna1">
                        <a href="#"><img class="riga" src="immagini per html\Adidas.webp"></a>
                        <a href="#"><img class="riga" src="immagini per html\hoka.webp"></a>
                        <a href="#"><img class="riga" src="immagini per html\new_balance.webp"></a>
                    </div>
                    <div class="colonna1">
                        <a href="#"><img class="riga" src="immagini per html\nike.webp"></a>
                        <a href="#"><img class="riga" src="immagini per html\bar_on.webp"></a> 
                        <a href="#"><img class="riga" src="immagini per html\tutte_le_marche.webp"></a>
                    </div>
                </section>

                <section id="modal-view" class="hidden"></section>
            </div>
            
            <div class="scarpe-container">
                <div>
                    <div id="slide"></div>
                        <div id="bottoni-rotondi">
                            <img id="point1" src="immagini per html\sfondo-nero.jpg" data-index="1">
                            <img id="point2" src="immagini per html\sfondo-nero.jpg" data-index="2">
                        </div>
                    <p>Il comfort ai tuoi piedi</p>
                    <a class="Link" href=""><u>ACQUISTA ASICS</u></a>
                </div> 
                <div>  
                    <div id="slide1"></div>
                        <div id="bottoni-rotondi">
                            <img id="point1" src="immagini per html\sfondo-nero.jpg" data-index="3">
                            <img id="point2" src="immagini per html\sfondo-nero.jpg" data-index="4">
                        </div>
                    <p>Look moderno, tocco rétro</p> 
                    <a class="Link" href=""><u>ACQUISTA NEW BALANCE</u></a>
                </div>
                <div> 
                    <div id="slide2"></div>
                        <div id="bottoni-rotondi">
                            <img id="point1" src="immagini per html\sfondo-nero.jpg" data-index="5">
                            <img id="point2" src="immagini per html\sfondo-nero.jpg" data-index="6">
                        </div>
                    <p>Esplora i sentieri</p>
                    <a class="Link" href=""><u>ACQUISTA</u></a>
                </div>
            </div>

            <div id="sconto-immagine">
                <a href="#"><img id="col2" src="immagini per html\2024_02_19_FL_ONL_alwayson_deals_banner_IT_3200x600.webp"></a>
            </div>

            <div id="link-sconti">
                <a class="Link" href=""><u>ACQUISTA ORA</u></a>
            </div>

            <div class="scarpe-container">
                <div> 
                    <div>
                        <a href="#">   
                            <img class="col1" src="immagini per html\asics2.jpg">
                        </a>
                    </div>
                    <p>GEL-Quantum 360 VIII</p>
                    <a class="Link" href=""><u>ACQUISTA ASICS</u></a>
                </div> 
                <div>   
                    <div>    
                        <a class="immagini-scarpe1-link" href="#"><img class="col1" src="immagini per html\2024_0_07_FLE-ONL_addias_Campus_800x800.webp"></a>
                    </div>
                    <p>Retro Style</p> 
                    <a class="Link" href=""><u>ACQUISTA ADIDAS CAMPUS</u></a>
                </div>
                <div> 
                    <div>
                        <a href="#"><img class="col1" src="immagini per html\new_balance2.jpg"></a>
                    </div>
                    <p>New Balance 9060</p>
                    <a class="Link" href=""><u>ACQUISTA ORA</u></a>
                </div>
            </div>

            <div id="flx-membership">
                <div>
                    <a id="link-immagine-flex" href="#"><img id="immagine-flx" src="https://images.footlocker.com/content/dam/final/footlockereurope/Online_activations/fl-campaign/2024/2024_02_07_fl_hp_flx_redisgn/05_final_output_files/2024_02_07_FL_HP_FLX_HPbanner-Mainland_3200x600.jpg"></a>
                </div>
                <div id="flx-scritta1">FLX Membership</div>
                <div id="flx-scritta2">Spedizione gratuita, premi esclusivi e molto altro!</div>
                <div id="posizionamento-bottoni">
                    <button id="flx" href="#">ISCRIVITI A FLX</button>
                    <button id="flx1" href="#">LA MIA DASHBOARD FLX</button>
                </div>
            </div>

            <div class="scarpe-container">
                <div>    
                    <div>
                        <a class="immagini-scarpe-link1" href="#"><img class="col1" src="immagini per html\2024_02_06_FL_ONL_Exclusives-Alwayson_HP_Button_800x800.webp"></a>
                    </div>
                    <p>Esclusive Foot Locker</p>
                    <a class="Link" href=""><u>UOMO</u></a>
                    <a class="Link" href=""><u>DONNA</u></a>
                </div> 
                <div> 
                    <div>
                        <a class="immagini-scarpe-link1" href="#"><img class="col1" src="immagini per html\2024_02_06_FL_HP_Redesign_Basketball_Design_3_800x800.webp"></a>
                    </div>
                    <p>Home Court</p> 
                    <a class="Link" href=""><u>ACQUISTA ORA</u></a>
                    <a class="Link" href=""><u>LEGGI DI PIÙ</u></a>
                </div>
                <div> 
                    <div>
                        <a class="immagini-scarpe-link1" href="#"><img class="col1" src="immagini per html\2024_02_06_FL_HP_Redesign_Striper_Button_800X800.webp"></a>
                    </div>
                    <p>Striper Hub</p>
                    <a class="Link" href=""><u>LEGGI DI PIÙ</u></a>
                </div>
            </div>

            <div id="fine">
                <div id="scritta-finale">Acquista per Categoria</div>
                <div id="fine2">
                    <div class="div-fine2">
                        <a class="link-mobile1" href="#"><button class="contenitore-scritta">SCARPE UOMO</button></a>
                        <a class="link-mobile1" href="#"><button class="contenitore-scritta">SCARPE DONNA</button></a>
                        <a class="link-mobile1" href="#"><button class="contenitore-scritta">SCARPE BAMBINI</button></a>
                    </div>
                    <div class="div-fine2">
                        <a class="link-mobile1" href="#"><button class="contenitore-scritta">BESTSELLER</button></a>
                        <a class="link-mobile1" href="#"><button class="contenitore-scritta">NOVITÀ</button></a>
                    </div>
                </div>
            </div>

        </section>

        <footer>
            
            <div id="contenitore-bottoni-footer">
                <div class="bottoni-footer">
                        <a class="link-footer-mobile" href=""><button class="link-footer" href='#'>Aiuto</button></a>
                        <a href=""><button class="link-footer1" href='#'>Stato dell'ordine</button></a>
                </div>
                <div class="bottoni-footer">
                        <a class="link-footer-mobile" href=""><button class="link-footer" href='#'>Spedizioni</button></a>
                        <a href=""><button class="link-footer1" href='#'>Resi & Rimborsi</button></a>
                </div>
            </div>

            <div id="riga1">
                <div id="lista1">
                    <h1 class="intestazione">Informazioni Legali</h1>
                    <a class="lista-link" id="links" href="">I tuoi diritti privacy</a>
                    <a class="lista-link" id="links" href="">Informativa sui cookie</a>
                    <a class="lista-link" id="links" href="">Informativa sulla privacy</a>
                    <a class="lista-link" id="links" href="">Termini e condizioni</a>
                    <a class="lista-link" id="links" href="">Modello di Organizzazione 231</a>
                </div>
                <div id="lista2">
                    <h1 class="intestazione">Chi Siamo</h1>
                    <a class="lista-link" id="links" href="">Store Locator</a>
                    <a class="lista-link" id="links" href="">Chi Siamo</a>
                    <a class="lista-link" id="links" href="">Ufficio Stampa</a>
                    <a class="lista-link" id="links" href="">Lavora con noi</a>
                    <a class="lista-link" id="links" href="">LEED</a>
                    <a class="lista-link" id="links" href="">Sitemap Prodotti 1</a>
                    <a class="lista-link" id="links" href="">Sitemap Prodotti 2</a>
                </div>
                <div>
                    <div>
                        <div id="contenitore-social">
                            <a href="#"><img class="immagine-social" src="immagini per html\facebook.png"></a>
                            <a href="#"><img class="immagine-social" src="immagini per html\twitter.png"></a>
                            <a href="#"><img class="immagine-social" src="immagini per html\instagram.png"></a>
                            <a href="#"><img class="immagine-social" src="immagini per html\youtube.png"></a>
                        </div>
                        <h1 class="intestazione2">Store Locator</h1>
                        <p class="write">Cerca il negozio Foot Locker più vicino a te.</p>
                        <a href="#"><button class="contenitore-scritta1">TROVA UN NEGOZIO</button></a>
                        <h1 class="intestazione2">FLX Membership</h1>
                        <p class="write">Spedizione gratuita, premi esclusivi e molto</p>
                        <p class="write"><br> altro.</p>
                        <a href="#"><button class="contenitore-scritta1">MAGGIORI INFORMAZIONI</button></a>
                        <h1 class="intestazione2">Sconti per studenti & giovani</h1>
                        <a href="#"><button class="contenitore-scritta1">ISCRIVITI</button></a>
                    </div>
                </div>
            </div>

            <p id="scritta_mappa">Ecco dove puoi trovarci a Catania</p>

            <div id="mappa"></div>

            <form id="form-ricerca-spotify">
                <input id="modulo-ricerca-spotify" type="text" placeholder="Cerca il tuo brano su Spotify">
                <button id="lente-mobile-spotify" type="submit" id="submit" value="Cerca"><img id="lente-ricerca-spotify" src="immagini per html\lente_di_ricerca.png"></button>
            </form>

            <section id="album-view"></section>
            
            <div id="parte-finale-footer">
                <div id="immagine-footer">
                    <a href="#"><img id="immagine-footer2" src="immagini per html\images.png"></a>
                </div>
                <div>
                    <p id="testo-footer">© 2023 Footlocker.com, Inc. Tutti i diritti riservati</p>
                </div>
            </div>
                
            <div>
                <p id="testo-sotto-immagine">Prezzi soggetti a modifiche senza preavviso. I prodotti mostrati potrebbero non essere disponibili nei nostri negozi.</p>
            </div>

        </footer>

    </body>
</html>