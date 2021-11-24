<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Início</title>

    <link rel="stylesheet" href="../css/style.css">
</head>
<style>
    .highlights_cards_card_btn{
        display: block;
        max-width: max-content;
        color: rgba(35, 35, 35);
        text-align: center;
        border: 2px solid #ff6c00;
        margin: 1px auto 0 auto;
        padding: 8px 22px;
        font-size: 1rem;
        font-weight: 500;
        border-radius: 10px;
    }
    .highlights_cards_card_btn:hover{
        color: #fff;
        background-color: #ff6c00;
    }
    .textodestaques{
        text-align: center;
        font-weight: 500;
        margin-bottom: 10px;
    }
    .highlights_cards_card{
        max-width: 220px !important;
    }
</style>
<body>

    <?php
        // BD
        $connect = new PDO('mysql:host=localhost;dbname=pi6','root','');
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = "SELECT * FROM properties LIMIT 0, 3";
        $result = $connect->prepare($sql);
        $result->execute();
        $fetch = $result->fetchAll(PDO::FETCH_OBJ);
    ?>  

    <header id="header">
        <div id="header_menu">
            <svg id="Layer_1" height="60" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72.29 61.94"><defs><style>.cls-1,.cls-2{fill:#baa360;}.cls-2{isolation:isolate;font-size:14px;font-family:Modern-Regular, "Modern No. 20";}</style></defs><path class="cls-1" d="M48.2,0,36.15,8.8,24.15,0,0,17.64v27H14V38.73H5.93V20.65L24.15,7.35l7,5.12-7.07,5.17v27h24.2v-27l-7.13-5.17,7-5.12,18.21,13.3V38.73H57.61v5.94H72.29v-27ZM42.31,20.65V38.73H30V20.65l6.16-4.5Z"/><text class="cls-2" transform="translate(1.99 59.01)">Imob Taqua</text></svg>

            <nav id="header_menu_nav">
                <a class="header_menu_nav_activeLink" href="index.php">
                    Início
                </a>
                <a href="properties.php">
                    Imóveis
                </a>
                <a href="contact.php">
                    Contato
                </a>

                <button id="header_menu_nav_closeBtn">
                    <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><title>Close</title><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M368 368L144 144M368 144L144 368"/></svg>
                </button>
            </nav>

            <button id="header_menu_openBtn">
                <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><title>Menu</title><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M80 160h352M80 256h352M80 352h352"/></svg>
            </button>
        </div>

        <div id="header_introduction">
            <img id="header_introduction_bg" src="../img/header/banner.jpg" alt="Imagem de fundo">
            <h1>
                O melhor investimento para você e seu futuro.
            </h1>
        </div>
    </header>
    
    <main>
        <section id="highlights" class="container">
            <h1>
                Destaques
            </h1>

            <div id="highlights_cards">
                <?php
                    foreach($fetch as $row){
                    ?>
                <div class="highlights_cards_card">
                    <div>
                        <img src="<?=$row->srcfile?>" alt="Imagem da propriedade">
                    </div>
                    <p class="textodestaques"><?=$row->title?></p>
                    <a class="highlights_cards_card_btn" href="viewPropertie.php?propertieId=<?=$row->id?>">
                        Ver mais
                    </a>
                </div>
                    <?php
                    }
                ?>
            </div>
        </section>

        <section id="callEmail">
            <div class="container">
                <h1>
                    Quer receber e-mails com as melhores ofertas?
                    <span>Cadastre-se!</span>
                </h1>

                <form action="">
                    <input type="email" placeholder="E-mail:">
                    <button>Cadastrar</button>
                </form>

                <p id="callEmail_phrase">
                    A
                    <i>Imob Taqua</i>
                    tem como foco atender todas as necessidades de nossos clientes trabalhamos o máximo para que tudo corra bem presando sempre a melhor opção para o seu futuro e não medimos esforços para atendê-lo.
                </p>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <div id="footer_infos">
                <p>
                    <span>E-mail:</span>
                    imobtaqua@gmail.com
                </p>
                <p>
                    <span>Telefone</span>
                    (16) 9 9747-7377
                </p>
                <p>
                    <span>Rua:</span>
                    Dra Darcy José Gabriel N 000
                </p>
            </div>
    
            <div id="footer_socialNetworks">
                <a href="" target="_blank">
                    <svg version="1.1" id="Camada_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                viewBox="0 0 87.2 87.2" style="enable-background:new 0 0 87.2 87.2;" xml:space="preserve">
                        <g>
                            <g>
                                <g>
                                    <g>
                                        <path d="M43.6,87.2C19.56,87.2,0,67.64,0,43.6C0,19.56,19.56,0,43.6,0c24.04,0,43.6,19.56,43.6,43.6
                                            C87.2,67.64,67.64,87.2,43.6,87.2z M43.6,3C21.21,3,3,21.21,3,43.6c0,22.39,18.21,40.6,40.6,40.6c22.39,0,40.6-18.21,40.6-40.6
                                            C84.2,21.21,65.99,3,43.6,3z"/>
                                    </g>
                                    <path d="M44.99,19.39c-4.14,0-7.49,3.35-7.49,7.49v7.84l-5.44,0.08v7.79l5.44-0.08v25.28h9.32V42.52h7.49l0.83-7.79h-8.32
                                        c0-1.72,0-3.62,0-5.44c0-1.16,0.94-2.1,2.1-2.1h6.21v-7.79H44.99z"/>
                                </g>
                                <g>
                                    <g>
                                        <path d="M43.6,87.2C19.56,87.2,0,67.64,0,43.6C0,19.56,19.56,0,43.6,0c24.04,0,43.6,19.56,43.6,43.6
                                            C87.2,67.64,67.64,87.2,43.6,87.2z M43.6,3C21.21,3,3,21.21,3,43.6c0,22.39,18.21,40.6,40.6,40.6c22.39,0,40.6-18.21,40.6-40.6
                                            C84.2,21.21,65.99,3,43.6,3z"/>
                                    </g>
                                    <path d="M44.99,19.39c-4.14,0-7.49,3.35-7.49,7.49v7.84l-5.44,0.08v7.79l5.44-0.08v25.28h9.32V42.52h7.49l0.83-7.79h-8.32
                                        c0-1.72,0-3.62,0-5.44c0-1.16,0.94-2.1,2.1-2.1h6.21v-7.79H44.99z"/>
                                </g>
                            </g>
                        </g>
                    </svg>
                </a>
    
                <a href="" target="_blank">
                    <svg version="1.1" id="Camada_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
         viewBox="0 0 87.2 87.2" style="enable-background:new 0 0 87.2 87.2;" xml:space="preserve">
        <g>
            <g>
                <g>
                    <g>
                        <path d="M43.6,87.2C19.56,87.2,0,67.64,0,43.6C0,19.56,19.56,0,43.6,0c24.04,0,43.6,19.56,43.6,43.6
                            C87.2,67.64,67.64,87.2,43.6,87.2z M43.6,3C21.21,3,3,21.21,3,43.6c0,22.39,18.21,40.6,40.6,40.6c22.39,0,40.6-18.21,40.6-40.6
                            C84.2,21.21,65.99,3,43.6,3z"/>
                    </g>
                    <g>
                        <g>
                            <path d="M54.43,67.36H32.77c-7.13,0-12.93-5.8-12.93-12.93V32.77c0-7.13,5.8-12.93,12.93-12.93h21.65
                                c7.13,0,12.93,5.8,12.93,12.93v21.65C67.36,61.56,61.56,67.36,54.43,67.36z M32.77,22.25c-5.8,0-10.52,4.72-10.52,10.52v21.65
                                c0,5.8,4.72,10.52,10.52,10.52h21.65c5.8,0,10.52-4.72,10.52-10.52V32.77c0-5.8-4.72-10.52-10.52-10.52H32.77z"/>
                        </g>
                        <g>
                            <path d="M43.6,58.33c-8.12,0-14.73-6.61-14.73-14.73c0-8.13,6.61-14.73,14.73-14.73c8.13,0,14.73,6.61,14.73,14.73
                                C58.33,51.72,51.72,58.33,43.6,58.33z M43.6,31.27c-6.8,0-12.33,5.53-12.33,12.33c0,6.8,5.53,12.33,12.33,12.33
                                c6.8,0,12.33-5.53,12.33-12.33C55.93,36.8,50.4,31.27,43.6,31.27z"/>
                        </g>
                        <path d="M60.44,29.58c0,1.22-0.99,2.22-2.22,2.22C57,31.8,56,30.8,56,29.58c0-1.22,0.99-2.22,2.22-2.22
                            C59.45,27.36,60.44,28.35,60.44,29.58z"/>
                    </g>
                </g>
                <g>
                    <g>
                        <path d="M43.6,87.2C19.56,87.2,0,67.64,0,43.6C0,19.56,19.56,0,43.6,0c24.04,0,43.6,19.56,43.6,43.6
                            C87.2,67.64,67.64,87.2,43.6,87.2z M43.6,3C21.21,3,3,21.21,3,43.6c0,22.39,18.21,40.6,40.6,40.6c22.39,0,40.6-18.21,40.6-40.6
                            C84.2,21.21,65.99,3,43.6,3z"/>
                    </g>
                    <g>
                        <g>
                            <path d="M54.43,67.36H32.77c-7.13,0-12.93-5.8-12.93-12.93V32.77c0-7.13,5.8-12.93,12.93-12.93h21.65
                                c7.13,0,12.93,5.8,12.93,12.93v21.65C67.36,61.56,61.56,67.36,54.43,67.36z M32.77,22.25c-5.8,0-10.52,4.72-10.52,10.52v21.65
                                c0,5.8,4.72,10.52,10.52,10.52h21.65c5.8,0,10.52-4.72,10.52-10.52V32.77c0-5.8-4.72-10.52-10.52-10.52H32.77z"/>
                        </g>
                        <g>
                            <path d="M43.6,58.33c-8.12,0-14.73-6.61-14.73-14.73c0-8.13,6.61-14.73,14.73-14.73c8.13,0,14.73,6.61,14.73,14.73
                                C58.33,51.72,51.72,58.33,43.6,58.33z M43.6,31.27c-6.8,0-12.33,5.53-12.33,12.33c0,6.8,5.53,12.33,12.33,12.33
                                c6.8,0,12.33-5.53,12.33-12.33C55.93,36.8,50.4,31.27,43.6,31.27z"/>
                        </g>
                        <path d="M60.44,29.58c0,1.22-0.99,2.22-2.22,2.22C57,31.8,56,30.8,56,29.58c0-1.22,0.99-2.22,2.22-2.22
                            C59.45,27.36,60.44,28.35,60.44,29.58z"/>
                    </g>
                </g>
            </g>
        </g>
                    </svg>
                </a>
    
                <a href="" target="_blank">
                    <svg version="1.1" id="Camada_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
         viewBox="0 0 87.2 87.2" style="enable-background:new 0 0 87.2 87.2;" xml:space="preserve">
        <g>
            <g>
                <g>
                    <g>
                        <path d="M43.6,87.2C19.56,87.2,0,67.64,0,43.6C0,19.56,19.56,0,43.6,0s43.6,19.56,43.6,43.6C87.2,67.64,67.64,87.2,43.6,87.2z
                            M43.6,3C21.21,3,3,21.21,3,43.6c0,22.39,18.21,40.6,40.6,40.6s40.6-18.21,40.6-40.6C84.2,21.21,65.99,3,43.6,3z"/>
                    </g>
                    <g>
                        <path d="M20.75,68.59l3.99-12.38c-5.86-8.63-5-20.34,2.14-28.09c8.49-9.2,22.88-9.79,32.08-1.3c4.46,4.11,7.05,9.71,7.3,15.77
                            c0.25,6.06-1.88,11.85-5.99,16.31c-7.11,7.72-18.71,9.53-27.8,4.42L20.75,68.59z M43.58,23.22c-0.28,0-0.56,0.01-0.84,0.02
                            c-5.42,0.22-10.43,2.54-14.1,6.52c-6.51,7.06-7.18,17.8-1.6,25.55l0.36,0.49l-2.7,8.37l7.91-3.56l0.54,0.32
                            c8.2,4.91,18.86,3.37,25.34-3.66c3.68-3.99,5.58-9.16,5.36-14.58c-0.22-5.42-2.54-10.43-6.52-14.1
                            C53.54,25.11,48.69,23.22,43.58,23.22z"/>
                    </g>
                    <path d="M41.62,45.54c0.82,0.82,2.48,2.38,3.62,2.66c1.13,0.28,1.97-0.35,2.86-1.11c0.47-0.4,0.67-0.86,1.8-1.06
                        c1.17-0.21,4.47,1.98,5.26,2.92c2.4,2.85,0.25,6.04-3,6.31c-4.02,0.34-9.37-3.32-13.15-7.1c-3.78-3.78-7.43-9.13-7.1-13.15
                        c0.27-3.25,3.46-5.4,6.31-3c0.94,0.79,3.13,4.09,2.92,5.26c-0.2,1.13-0.67,1.34-1.06,1.8c-0.76,0.89-1.39,1.72-1.11,2.86
                        C39.24,43.06,40.8,44.72,41.62,45.54z"/>
                </g>
                <g>
                    <g>
                        <path d="M43.6,87.2C19.56,87.2,0,67.64,0,43.6C0,19.56,19.56,0,43.6,0s43.6,19.56,43.6,43.6C87.2,67.64,67.64,87.2,43.6,87.2z
                            M43.6,3C21.21,3,3,21.21,3,43.6c0,22.39,18.21,40.6,40.6,40.6s40.6-18.21,40.6-40.6C84.2,21.21,65.99,3,43.6,3z"/>
                    </g>
                    <g>
                        <path d="M20.75,68.59l3.99-12.38c-5.86-8.63-5-20.34,2.14-28.09c8.49-9.2,22.88-9.79,32.08-1.3c4.46,4.11,7.05,9.71,7.3,15.77
                            c0.25,6.06-1.88,11.85-5.99,16.31c-7.11,7.72-18.71,9.53-27.8,4.42L20.75,68.59z M43.58,23.22c-0.28,0-0.56,0.01-0.84,0.02
                            c-5.42,0.22-10.43,2.54-14.1,6.52c-6.51,7.06-7.18,17.8-1.6,25.55l0.36,0.49l-2.7,8.37l7.91-3.56l0.54,0.32
                            c8.2,4.91,18.86,3.37,25.34-3.66c3.68-3.99,5.58-9.16,5.36-14.58c-0.22-5.42-2.54-10.43-6.52-14.1
                            C53.54,25.11,48.69,23.22,43.58,23.22z"/>
                    </g>
                    <path d="M41.62,45.54c0.82,0.82,2.48,2.38,3.62,2.66c1.13,0.28,1.97-0.35,2.86-1.11c0.47-0.4,0.67-0.86,1.8-1.06
                        c1.17-0.21,4.47,1.98,5.26,2.92c2.4,2.85,0.25,6.04-3,6.31c-4.02,0.34-9.37-3.32-13.15-7.1c-3.78-3.78-7.43-9.13-7.1-13.15
                        c0.27-3.25,3.46-5.4,6.31-3c0.94,0.79,3.13,4.09,2.92,5.26c-0.2,1.13-0.67,1.34-1.06,1.8c-0.76,0.89-1.39,1.72-1.11,2.86
                        C39.24,43.06,40.8,44.72,41.62,45.54z"/>
                </g>
            </g>
        </g>
                    </svg>
                </a>
            </div>
        </div>
    </footer>





    <!-- Scripts -->
    <script src="../js/header.js"></script>
</body>
</html>