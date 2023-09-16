        <footer id="footer" class="footer" itemscope itemtype="https://schema.org/Organization">
            <div class="footer__container">

                <div class="footer__item" itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
                    <p><strong>ProKitchen Lab</strong></p>
                    <a href="https://maps.app.goo.gl/WML4GQaghvgfV3Tk9" target="_blank">
                        <p itemprop="streetAddress">R. Lídia Brígido, 336</p>
                        <p itemprop="addressLocality">Parque Manibura, Fortaleza, CE</p>
                    </a>
                </div>

                <div class="footer__item" itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
                    <p><strong>Telefones</strong></p>
                    <p itemprop="telephone"><a href="tel:+558521807670" target="_blank">85 2180-7670</a></p>
                    <p itemprop="telephone"><a href="tel:+55<?php echo WHATSAPP ?>" target="_blank"><?php echo format_to_phone(WHATSAPP) ?></a></p>
                </div>

                <div class="footer__item">
                    <ul class="footer__social-midia">
                        <li><a href="https://www.instagram.com/prokitchen.oficial/" target="_blank"><?php the_SVG('ico-instagram') ?></a></li>
                        <li><a href="https://www.facebook.com/profile.php?id=100091776145685" target="_blank"><?php the_SVG('ico-facebook') ?></a></li>
                        <li><a href="https://www.linkedin.com/company/prokitchenbr" target="_blank"><?php the_SVG('ico-linkedin') ?></a></li>
                    </ul>
                </div>
            </div>

            <div class="footer__sign">
                <p>© 2023 PRO Kitchen. Todos os direitos reservados.</p>
                <a href="https://soubeta.digital" target="_blank" alt="Site criado por BETA DIGITAL">
                    <?php the_SVG('beta-digital') ?>
                </a>
            </div>
        </footer>

    </body>
    <?php wp_footer() ?>
    <script type="module" src="<?php echo URLTEMA ?>/dist/scripts/frontend-bundle.js" defer></script>
</html>