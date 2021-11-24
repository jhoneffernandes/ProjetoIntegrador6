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
    #adverts{
        display: block !important;
    }

    #pagination{
        margin-top: 30px;
    }
    #pagination a{
        color: #fff;
        font-size: .8rem;
        background-color: #3498db;
        border-radius: 10px;
        padding: 5px 10px;
    }

    .adverts_posts_post_carousel_slider img{
                        width: 100% !important;
                        height: 100% !important;
                        max-height: 150px !important;
                        max-width: 250px !important;
                        object-fit: cover !important;
                    }
</style>
<body>

    <?php
        // BD
        $connect = new PDO('mysql:host=localhost;dbname=pi6','root','');
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        $limit = 10;
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }else{
            $page = 0;
        }
        $start = $page * $limit;
        
        $sql2 = "SELECT * FROM properties";
        $result2 = $connect->prepare($sql2);
        $result2->execute();
        $fetch2 = $result2->fetchAll(PDO::FETCH_OBJ);
        $pagination = ceil(count($fetch2)/$limit);
        
        $sql = "SELECT * FROM properties LIMIT $start, $limit";
        $result = $connect->prepare($sql);
        $result->execute();
        $fetch = $result->fetchAll(PDO::FETCH_OBJ);
    ?>  

    <header id="header">
        <div id="header_menu">
            <svg id="Layer_1" height="60" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72.29 61.94"><defs><style>.cls-1,.cls-2{fill:#baa360;}.cls-2{isolation:isolate;font-size:14px;font-family:Modern-Regular, "Modern No. 20";}</style></defs><path class="cls-1" d="M48.2,0,36.15,8.8,24.15,0,0,17.64v27H14V38.73H5.93V20.65L24.15,7.35l7,5.12-7.07,5.17v27h24.2v-27l-7.13-5.17,7-5.12,18.21,13.3V38.73H57.61v5.94H72.29v-27ZM42.31,20.65V38.73H30V20.65l6.16-4.5Z"/><text class="cls-2" transform="translate(1.99 59.01)">Imob Taqua</text></svg>

            <nav id="header_menu_nav">
                <a href="index.php">
                    Início
                </a>
                <a class="header_menu_nav_activeLink" href="properties.php">
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
    </header>

    <main>
        <section id="adverts" class="container">
            <div id="adverts_posts">
                <?php
                    foreach($fetch as $row){
                    ?>
                <div class="adverts_posts_post">
                    <div class="adverts_posts_post_carousel">
                        <div class="adverts_posts_post_carousel_slider">
                            <img src="<?=$row->srcfile?>" alt="Imagem do imóvel">
                        </div>
                    </div>

                    <div class="adverts_posts_post_infos">
                        <div class="adverts_posts_post_infos_twoColumnhr">
                            <div class="adverts_posts_post_infos_info">
                                <p class="adverts_posts_post_infos_info_smallText">
                                   Valor do imóvel:
                                </p>
                                <p class="adverts_posts_post_infos_info_text">
                                    R$ <?=$row->price?>,00
                                </p>
                            </div>

                            <hr>

                            <div class="adverts_posts_post_infos_info">
                                <p class="adverts_posts_post_infos_info_text">
                                <?=$row->address?>
                                </p>
                                <p class="adverts_posts_post_infos_info_smallText">
                                <?=$row->city?>
                                </p>
                            </div>
                        </div>

                        <div class="adverts_posts_post_infos_columns">
                            <div class="adverts_posts_post_infos_info adverts_posts_post_infos_info_icon">
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
                                    <g>
                                        <g>
                                            <g>
                                                <g>
                                                    <g>
                                                        <path d="M487.8,430.7c-30.9,0-61.9,0-92.8,0c-63.5,0-127,0-190.5,0c-52.1,0-104.1,0-156.2,0c-8,0-16,0-24,0
                                                            c2.5,2.5,5,5,7.5,7.5c0-24.5,0-49,0-73.6c0-9.6,0-19.2,0-28.8c0-20,6.7-39.8,19.1-55.5c13.6-17.1,32.8-28.3,54.1-32.5
                                                            c7.4-1.4,15-1.4,22.5-1.4c21.9,0,43.9,0,65.8,0c59.2,0,118.4,0,177.7,0c6.2,0,12.4,0,18.7,0c14.6,0,28.8,3,41.9,9.6
                                                            c18.9,9.6,34.2,26.1,42.2,45.7c5.3,13.1,6.6,26.5,6.6,40.5c0,31.9,0,63.9,0,95.8c0,9.7,15,9.7,15,0c0-24.5,0-49,0-73.6
                                                            c0-9.6,0-19.2,0-28.8c0-21.1-6.4-42-18.4-59.3c-20.3-29.4-53.5-45-88.8-45c-19.6,0-39.2,0-58.8,0c-60.3,0-120.7,0-181,0
                                                            c-18.4,0-37.1-1.1-55,3.7c-44.9,12-76.1,54.4-76.4,100.4c-0.2,34.2,0,68.4,0,102.5c0,4.1,3.4,7.5,7.5,7.5c30.9,0,61.9,0,92.8,0
                                                            c63.5,0,127,0,190.5,0c52.1,0,104.1,0,156.2,0c8,0,16,0,24,0C497.5,445.7,497.5,430.7,487.8,430.7z"/>
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <g>
                                                            <g>
                                                                <path d="M26.2,375.9c30.9-7.1,62.8-17.8,94.8-12.6c18.5,3,35.9,8.9,55,9.5c18.9,0.5,36.8-4.4,55.1-8.4
                                                                    c15.1-3.4,31.1-3.4,46.4-0.7c7.1,1.2,14.1,3.1,21.1,4.7c23.1,5.3,45.7,5.5,68.9,0.2c6.7-1.5,13.3-3.2,20-4.6
                                                                    c15.2-3.1,31.2-2.9,46.4,0c12.7,2.4,25.2,5.8,37.8,8.6c4.8,1.1,9.5,2.2,14.3,3.3c9.4,2.2,13.4-12.3,4-14.5
                                                                    c-31.1-7.2-62.9-17.5-95.2-13.7c-18.5,2.2-36.1,8.8-54.8,9.9c-18.9,1.1-36.6-3.7-54.8-7.7c-15.3-3.4-31.2-3.9-46.8-1.9
                                                                    c-8.5,1.1-16.8,3.2-25.2,5.1c-9.8,2.3-19.5,4.2-29.6,4.6c-11.8,0.5-23.3-1-34.8-3.7c-22.3-5.1-43.9-9.2-66.9-5.8
                                                                    c-14,2-27.8,5.9-41.5,9c-6,1.4-12,2.8-18,4.1C12.8,363.7,16.8,378.1,26.2,375.9L26.2,375.9z"/>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <path d="M48.7,281c0-46.3,0-92.7,0-139c0-37.8,37-60.7,71.6-60.7c16,0,32,0,48,0c61.2,0,122.5,0,183.7,0c13.9,0,27.8-0.1,41.7,0
                                                        c21.8,0.2,44.7,9.6,58.2,27.2c8.3,10.8,11.4,23.1,11.4,36.5c0,45.3,0,90.7,0,136c0,9.7,15,9.7,15,0c0-46.3,0-92.7,0-139
                                                        c0-44.8-41.4-74-83.1-75.6c-14.1-0.6-28.3,0-42.4,0c-61.2,0-122.5,0-183.7,0c-16.2,0-32.5,0-48.7,0c-41.4,0-83.2,27.1-86.6,70.9
                                                        c-0.6,7.2-0.1,14.6-0.1,21.8c0,14.7,0,29.4,0,44.1c0,25.5,0,50.9,0,76.4c0,0.5,0,1,0,1.5C33.7,290.7,48.7,290.7,48.7,281
                                                        L48.7,281z"/>
                                                </g>
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path d="M229.9,231.6c-24.2,0-48.4,0-72.6,0c-11,0-22,0-33,0c-3.4,0-6.1-1.4-6.1-5.2c0-5.3,0-10.7,0-16c0-12.3,0-24.7,0-37
                                                    c0-4.4,4-4.7,7.3-4.7c4.6,0,9.3,0,13.9,0c28.5,0,57,0,85.5,0c3.8,0,9.3-0.8,9.6,4.7c0.3,5.5,0,11.1,0,16.6c0,9.4,0,18.7,0,28.1
                                                    C234.5,222.2,236.3,231.2,229.9,231.6c-9.6,0.5-9.7,15.5,0,15c11-0.6,19.7-8.8,19.7-20c0-5.1,0-10.2,0-15.3c0-12.6,0-25.2,0-37.9
                                                    c0-10.7-8.9-19.8-19.7-19.8c-2.7,0-5.3,0-8,0c-14,0-28,0-42,0c-14.9,0-29.8,0-44.7,0c-11.9,0-25.2-1-30.6,12.6
                                                    c-1.9,4.8-1.3,10.2-1.3,15.2c0,7.7,0,15.4,0,23.1c0,6.6,0,13.1,0,19.7c0,8.2,2.6,15,9.7,19.7c6.1,4,15.9,2.7,22.9,2.7
                                                    c12.3,0,24.7,0,37,0c19,0,38,0,57,0C239.6,246.6,239.6,231.6,229.9,231.6z"/>
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path d="M389.1,231.6c-24.2,0-48.4,0-72.6,0c-11,0-22,0-33,0c-3.4,0-6.1-1.4-6.1-5.2c0-5.3,0-10.7,0-16c0-12.3,0-24.7,0-37
                                                    c0-4.4,4-4.7,7.3-4.7c4.6,0,9.3,0,13.9,0c28.5,0,57,0,85.5,0c3.8,0,9.3-0.8,9.6,4.7c0.3,5.5,0,11.1,0,16.6c0,9.4,0,18.7,0,28.1
                                                    C393.8,222.2,395.5,231.2,389.1,231.6c-9.6,0.5-9.7,15.5,0,15c11-0.6,19.7-8.8,19.7-20c0-5.1,0-10.2,0-15.3c0-12.6,0-25.2,0-37.9
                                                    c0-10.7-8.9-19.8-19.7-19.8c-2.7,0-5.3,0-8,0c-14,0-28,0-42,0c-14.9,0-29.8,0-44.7,0c-11.9,0-25.2-1-30.6,12.6
                                                    c-1.9,4.8-1.3,10.2-1.3,15.2c0,7.7,0,15.4,0,23.1c0,6.6,0,13.1,0,19.7c0,8.2,2.6,15,9.7,19.7c6.1,4,15.9,2.7,22.9,2.7
                                                    c12.3,0,24.7,0,37,0c19,0,38,0,57,0C398.8,246.6,398.8,231.6,389.1,231.6z"/>
                                            </g>
                                        </g>
                                    </g>
                                </svg>

                                <p class="adverts_posts_post_infos_info_smallText">
                                    <?=$row->rooms?> Quartos
                                </p>
                            </div>

                            <div class="adverts_posts_post_infos_info adverts_posts_post_infos_info_icon">
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
                                    <g>
                                        <g>
                                            <g>
                                                <g>
                                                    <g>
                                                        <path d="M487.8,430.7c-30.9,0-61.9,0-92.8,0c-63.5,0-127,0-190.5,0c-52.1,0-104.1,0-156.2,0c-8,0-16,0-24,0
                                                            c2.5,2.5,5,5,7.5,7.5c0-24.5,0-49,0-73.6c0-9.6,0-19.2,0-28.8c0-20,6.7-39.8,19.1-55.5c13.6-17.1,32.8-28.3,54.1-32.5
                                                            c7.4-1.4,15-1.4,22.5-1.4c21.9,0,43.9,0,65.8,0c59.2,0,118.4,0,177.7,0c6.2,0,12.4,0,18.7,0c14.6,0,28.8,3,41.9,9.6
                                                            c18.9,9.6,34.2,26.1,42.2,45.7c5.3,13.1,6.6,26.5,6.6,40.5c0,31.9,0,63.9,0,95.8c0,9.7,15,9.7,15,0c0-24.5,0-49,0-73.6
                                                            c0-9.6,0-19.2,0-28.8c0-21.1-6.4-42-18.4-59.3c-20.3-29.4-53.5-45-88.8-45c-19.6,0-39.2,0-58.8,0c-60.3,0-120.7,0-181,0
                                                            c-18.4,0-37.1-1.1-55,3.7c-44.9,12-76.1,54.4-76.4,100.4c-0.2,34.2,0,68.4,0,102.5c0,4.1,3.4,7.5,7.5,7.5c30.9,0,61.9,0,92.8,0
                                                            c63.5,0,127,0,190.5,0c52.1,0,104.1,0,156.2,0c8,0,16,0,24,0C497.5,445.7,497.5,430.7,487.8,430.7z"/>
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <g>
                                                            <g>
                                                                <path d="M26.2,375.9c30.9-7.1,62.8-17.8,94.8-12.6c18.5,3,35.9,8.9,55,9.5c18.9,0.5,36.8-4.4,55.1-8.4
                                                                    c15.1-3.4,31.1-3.4,46.4-0.7c7.1,1.2,14.1,3.1,21.1,4.7c23.1,5.3,45.7,5.5,68.9,0.2c6.7-1.5,13.3-3.2,20-4.6
                                                                    c15.2-3.1,31.2-2.9,46.4,0c12.7,2.4,25.2,5.8,37.8,8.6c4.8,1.1,9.5,2.2,14.3,3.3c9.4,2.2,13.4-12.3,4-14.5
                                                                    c-31.1-7.2-62.9-17.5-95.2-13.7c-18.5,2.2-36.1,8.8-54.8,9.9c-18.9,1.1-36.6-3.7-54.8-7.7c-15.3-3.4-31.2-3.9-46.8-1.9
                                                                    c-8.5,1.1-16.8,3.2-25.2,5.1c-9.8,2.3-19.5,4.2-29.6,4.6c-11.8,0.5-23.3-1-34.8-3.7c-22.3-5.1-43.9-9.2-66.9-5.8
                                                                    c-14,2-27.8,5.9-41.5,9c-6,1.4-12,2.8-18,4.1C12.8,363.7,16.8,378.1,26.2,375.9L26.2,375.9z"/>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <path d="M48.7,281c0-46.3,0-92.7,0-139c0-37.8,37-60.7,71.6-60.7c16,0,32,0,48,0c61.2,0,122.5,0,183.7,0c13.9,0,27.8-0.1,41.7,0
                                                        c21.8,0.2,44.7,9.6,58.2,27.2c8.3,10.8,11.4,23.1,11.4,36.5c0,45.3,0,90.7,0,136c0,9.7,15,9.7,15,0c0-46.3,0-92.7,0-139
                                                        c0-44.8-41.4-74-83.1-75.6c-14.1-0.6-28.3,0-42.4,0c-61.2,0-122.5,0-183.7,0c-16.2,0-32.5,0-48.7,0c-41.4,0-83.2,27.1-86.6,70.9
                                                        c-0.6,7.2-0.1,14.6-0.1,21.8c0,14.7,0,29.4,0,44.1c0,25.5,0,50.9,0,76.4c0,0.5,0,1,0,1.5C33.7,290.7,48.7,290.7,48.7,281
                                                        L48.7,281z"/>
                                                </g>
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path d="M229.9,231.6c-24.2,0-48.4,0-72.6,0c-11,0-22,0-33,0c-3.4,0-6.1-1.4-6.1-5.2c0-5.3,0-10.7,0-16c0-12.3,0-24.7,0-37
                                                    c0-4.4,4-4.7,7.3-4.7c4.6,0,9.3,0,13.9,0c28.5,0,57,0,85.5,0c3.8,0,9.3-0.8,9.6,4.7c0.3,5.5,0,11.1,0,16.6c0,9.4,0,18.7,0,28.1
                                                    C234.5,222.2,236.3,231.2,229.9,231.6c-9.6,0.5-9.7,15.5,0,15c11-0.6,19.7-8.8,19.7-20c0-5.1,0-10.2,0-15.3c0-12.6,0-25.2,0-37.9
                                                    c0-10.7-8.9-19.8-19.7-19.8c-2.7,0-5.3,0-8,0c-14,0-28,0-42,0c-14.9,0-29.8,0-44.7,0c-11.9,0-25.2-1-30.6,12.6
                                                    c-1.9,4.8-1.3,10.2-1.3,15.2c0,7.7,0,15.4,0,23.1c0,6.6,0,13.1,0,19.7c0,8.2,2.6,15,9.7,19.7c6.1,4,15.9,2.7,22.9,2.7
                                                    c12.3,0,24.7,0,37,0c19,0,38,0,57,0C239.6,246.6,239.6,231.6,229.9,231.6z"/>
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path d="M389.1,231.6c-24.2,0-48.4,0-72.6,0c-11,0-22,0-33,0c-3.4,0-6.1-1.4-6.1-5.2c0-5.3,0-10.7,0-16c0-12.3,0-24.7,0-37
                                                    c0-4.4,4-4.7,7.3-4.7c4.6,0,9.3,0,13.9,0c28.5,0,57,0,85.5,0c3.8,0,9.3-0.8,9.6,4.7c0.3,5.5,0,11.1,0,16.6c0,9.4,0,18.7,0,28.1
                                                    C393.8,222.2,395.5,231.2,389.1,231.6c-9.6,0.5-9.7,15.5,0,15c11-0.6,19.7-8.8,19.7-20c0-5.1,0-10.2,0-15.3c0-12.6,0-25.2,0-37.9
                                                    c0-10.7-8.9-19.8-19.7-19.8c-2.7,0-5.3,0-8,0c-14,0-28,0-42,0c-14.9,0-29.8,0-44.7,0c-11.9,0-25.2-1-30.6,12.6
                                                    c-1.9,4.8-1.3,10.2-1.3,15.2c0,7.7,0,15.4,0,23.1c0,6.6,0,13.1,0,19.7c0,8.2,2.6,15,9.7,19.7c6.1,4,15.9,2.7,22.9,2.7
                                                    c12.3,0,24.7,0,37,0c19,0,38,0,57,0C398.8,246.6,398.8,231.6,389.1,231.6z"/>
                                            </g>
                                        </g>
                                    </g>
                                </svg>

                                <p class="adverts_posts_post_infos_info_smallText">
                                    <?=$row->bathroom?> Banheiros
                                </p>
                            </div>
                        </div>

                        <div class="adverts_posts_post_infos_info">
                            <p class="adverts_posts_post_infos_info_text">
                                Descrição:
                            </p>
                            <p class="adverts_posts_post_infos_info_smallText">
                            <?=$row->description?>
                            </p>
                        </div>
                    </div>

                    <div class="adverts_posts_post_lastColumn">
                        <div class="adverts_posts_post_lastColumn_bt">
                            <a href="viewPropertie.php?propertieId=<?=$row->id?>" id="adverts_posts_post_lastColumn_bt_actBtn">
                                Ver mais
                            </a>
                        </div>
                    </div>
                </div>
                    <?php
                    }
                ?>
            </div>

            <button id="adverts_srollTopBtn">
                <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><title>Chevron Up</title><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M112 328l144-144 144 144"/></svg>    
            </button>

            <?php
            if(count($fetch2) > $limit){
            ?>
            <div id="pagination">
                <?php
                    for($i = 0; $i < $pagination; $i++){
                        ?>
                        <a href="http://localhost/Projeto-Integrador-VI/html/properties.php?page=<?=$i?>"><?=$i?></a>
                        <?php
                    }
                ?>
            </div>
            <?php
            }
            ?>
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
    <script src="../js/properties/filter.js"></script>
    <script src="../js/properties/scrollTop.js"></script>
</body>
</html>