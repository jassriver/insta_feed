<?php
// Config Vars
$insta_feed_version = '1.0.2.1';
?>
    <div class="insta_feed">
        <div class="insta_feed_title">
            <h3><b>#NossoFeed</b> No Instagram!</h3>
        </div>
        <div id="app_insta_slider_riverlab"></div>
    </div>
    <!-- Assets Insta_Feed -->
    <link rel="stylesheet" href="https://www.homecard.com.br/instagram-api/assets/slider.css?v=<?php echo $insta_feed_version; ?>">
    <link rel="stylesheet" href="https://www.homecard.com.br/instagram-api/assets/insta_feed.css?v=<?php echo $insta_feed_version; ?>">
    <script src="https://www.homecard.com.br/instagram-api/assets/slider.js?v=<?php echo $insta_feed_version; ?>"></script>

<script>
    jQuery.noConflict();
    (function($) {
        $(document).ready(function() {
            let insta_feed = $('#app_insta_slider_riverlab');

            $.ajax({
                url: 'https://www.homecard.com.br/instagram-api/',
                method: 'GET',
                data: {
                    user: 'culturainglesajf'
                },
                success: function(response) {
                    let data = response.data;
                    
                    // Percorre os dados, e se for uma imagem ou um carousel_album, coloca no slider.
                    data.forEach(function(item, index) {
                        if ( item.media_type == 'IMAGE' || item.media_type == 'CAROUSEL_ALBUM' ) {
                            insta_feed.append(produce_insta_feed_item(item));
                        }
                    });

                    // Cria o slider
                    insta_feed.flickity({
                        cellAlign: 'left',
                        contain: true,
                        pageDots: false
                    });

                    // Debug
                    //console.log(response);
                }
            });

            // Produz a div com o item do feed do instagram e a retorna.
            function produce_insta_feed_item(item) {
                let textoContexto = '';
                textoContexto += `<div class="insta_feed_item">
                    <img class="insta_feed_img" src="${item.media_url}" alt="${item.caption}">
                </div>`;

                return textoContexto;
            }
        });
    })(jQuery);
</script>
