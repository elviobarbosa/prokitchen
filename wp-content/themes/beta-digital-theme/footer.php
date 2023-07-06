        <footer id="footer" class="footer" itemscope itemtype="https://schema.org/Organization">
            <div class="footer__container">
                <div class="footer__item" itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
                    <a href="#" target="_blank">
                        <p><strong>Escritório</strong></p>
                        <p itemprop="streetAddress">Rua Nome da Rua, XX</p>
                        <p itemprop="addressLocality">Fortaleza, Ceará</p>
                    </a>
                </div>

                <div class="footer__item" itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
                    <a href="#" target="_blank">
                        <p><strong>ProKitchen Lab</strong></p>
                        <p itemprop="streetAddress">Rua Nome da Rua, XX</p>
                        <p itemprop="addressLocality">Fortaleza, Ceará</p>
                    </a>
                </div>

                <div class="footer__item" itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
                    <p><strong>Telefones</strong></p>
                    <p itemprop="telephone"><a href="#" target="_blank">85 0000-0000</a></p>
                    <p itemprop="telephone"><a href="#" target="_blank">85 0000-0000</a></p>
                </div>

                <div class="footer__item">
                    <ul class="footer__social-midia">
                        <li><a href="" target="_blank"><?php the_SVG('ico-instagram') ?></a></li>
                        <li><a href="" target="_blank"><?php the_SVG('ico-facebook') ?></a></li>
                        <li><a href="" target="_blank"><?php the_SVG('ico-linkedin') ?></a></li>
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
    <script type="module" src="<?php echo URLTEMA ?>/dist/scripts/frontend-bundle.js"></script>
</html>