    <footer class="footer">
        <div class="container">
            <p class="footer_text"><?php the_field('footer_text', 'option'); ?></p>
            <div class="footer_area">
                <div class="footer_area-col">
                    <?php
						$args_main_menu = array( 
							'theme_location'=>'bottom1',
							'container'=> false,
							'menu_class'=> 'footer_menu',
							'depth'=> 0
						);
						wp_nav_menu($args_main_menu);
					?>
                    <?php
						$args_main_menu = array( 
							'theme_location'=>'bottom2',
							'container'=> false,
							'menu_class'=> 'footer_menu',
							'depth'=> 0
						);
						wp_nav_menu($args_main_menu);
					?>
                </div>
                <div class="footer_area-col">
                    <?php
						$args_main_menu = array( 
							'theme_location'=>'bottom3',
							'container'=> false,
							'menu_class'=> 'footer_menu footercontacts',
							'depth'=> 0
						);
						wp_nav_menu($args_main_menu);
					?>
                    <?php if(!empty(get_field('footer_social', 'option'))) { ?>
                        <ul class="footer_social">
                            <?php foreach (get_field('footer_social', 'option') as $key => $item) { ?>
                                <li>
                                    <a href="<?php echo $item['link']; ?>" target="_blank">
                                        <?php print_svg($item['ico']); ?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                </div>
            </div>
            <div class="footer_logo">
                <a href="#">
                    <svg width="1287" height="174" viewBox="0 0 1287 174" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M214.19 173.99H162.985C160.754 173.99 158.981 172.05 159.26 169.832C161.302 153.655 175.087 141.16 191.8 141.16H214.27C243.951 141.16 268.712 117.522 269.21 87.8158C269.708 57.5324 245.186 32.8302 215.087 32.8302C201.969 32.8302 189.34 37.5856 179.499 46.211L107.667 110.886C95.2662 122.089 76.6506 121.979 64.31 111.334C62.6267 109.882 62.6368 107.255 64.2901 105.763L156.611 22.6528C156.939 22.3245 157.348 21.9963 157.676 21.6679L161.123 18.7928C176.451 6.64564 195.475 0 215.077 0C263.204 0 302.238 39.3166 301.999 87.4875C301.75 135.499 262.069 173.99 214.18 173.99H214.19Z" fill="white"/>
                        <path d="M86.9134 174C38.786 174 -0.247819 134.683 0.00118474 86.5126C0.250188 38.5009 39.9314 0.0100098 87.8994 0.0100098H139.104C141.336 0.0100098 143.108 1.94997 142.83 4.16849C140.788 20.3448 127.003 32.8402 110.29 32.8402H87.74C58.0588 32.8402 33.2979 56.4779 32.7999 86.1843C32.3119 116.468 56.8238 141.17 86.9134 141.17C100.031 141.17 112.66 136.414 122.501 127.789L194.324 63.1136C206.764 51.8817 225.439 52.021 237.77 62.7455C239.453 64.2079 239.304 66.7746 237.64 68.2669L140.718 155.018C125.389 167.165 106.585 173.99 86.9034 173.99L86.9134 174Z" fill="white"/>
                        <path d="M429.281 27.833V172.019H394.46V27.833H429.281ZM472.733 27.833V54.6699H352V27.833H472.733Z" fill="white"/>
                        <path d="M521.245 64.8699V172.019H487.713V64.8699H521.245ZM485.729 37.2408C485.729 32.4874 487.449 28.5922 490.888 25.5553C494.327 22.5184 498.791 21 504.28 21C509.77 21 514.234 22.5184 517.673 25.5553C521.112 28.5922 522.832 32.4874 522.832 37.2408C522.832 41.9942 521.112 45.8893 517.673 48.9262C514.234 51.9631 509.77 53.4816 504.28 53.4816C498.791 53.4816 494.327 51.9631 490.888 48.9262C487.449 45.8893 485.729 41.9942 485.729 37.2408Z" fill="white"/>
                        <path d="M575.609 87.5476V172.019H542.177V64.8699H573.526L575.609 87.5476ZM571.542 114.781L563.903 114.979C563.903 107.452 564.796 100.52 566.581 94.1825C568.367 87.8447 571.013 82.332 574.518 77.6447C578.023 72.9573 582.322 69.3262 587.415 66.7515C592.573 64.1767 598.526 62.8893 605.272 62.8893C609.967 62.8893 614.233 63.6155 618.069 65.068C621.905 66.4544 625.212 68.666 627.99 71.7029C630.767 74.6738 632.884 78.5689 634.339 83.3884C635.86 88.1418 636.621 93.8524 636.621 100.52V172.019H603.188V104.779C603.188 100.223 602.659 96.7903 601.601 94.4796C600.609 92.1689 599.154 90.6175 597.236 89.8252C595.318 89.033 592.97 88.6369 590.192 88.6369C587.282 88.6369 584.67 89.2971 582.355 90.6175C580.04 91.9379 578.056 93.7864 576.403 96.1631C574.816 98.4738 573.592 101.214 572.732 104.383C571.939 107.551 571.542 111.017 571.542 114.781ZM632.851 114.781L623.525 114.979C623.525 107.452 624.352 100.52 626.006 94.1825C627.725 87.8447 630.271 82.332 633.644 77.6447C637.084 72.9573 641.349 69.3262 646.442 66.7515C651.534 64.1767 657.454 62.8893 664.2 62.8893C669.094 62.8893 673.591 63.6155 677.692 65.068C681.792 66.5204 685.33 68.8641 688.307 72.099C691.283 75.334 693.598 79.6252 695.251 84.9728C696.904 90.2544 697.731 96.7903 697.731 104.581V172.019H664.2V104.581C664.2 100.157 663.671 96.8233 662.612 94.5786C661.62 92.268 660.165 90.7165 658.247 89.9243C656.329 89.066 654.048 88.6369 651.402 88.6369C648.228 88.6369 645.483 89.2971 643.168 90.6175C640.853 91.9379 638.902 93.7864 637.315 96.1631C635.794 98.4738 634.67 101.214 633.942 104.383C633.215 107.551 632.851 111.017 632.851 114.781Z" fill="white"/>
                        <path d="M768.862 174C760.131 174 752.327 172.647 745.449 169.94C738.571 167.167 732.751 163.371 727.989 158.551C723.293 153.732 719.689 148.186 717.175 141.915C714.728 135.643 713.505 129.008 713.505 122.01V118.247C713.505 110.39 714.596 103.128 716.779 96.4602C718.961 89.7262 722.202 83.8505 726.501 78.833C730.8 73.8155 736.19 69.9204 742.671 67.1476C749.153 64.3087 756.692 62.8893 765.29 62.8893C772.896 62.8893 779.708 64.1107 785.726 66.5534C791.745 68.9961 796.837 72.4951 801.004 77.0505C805.237 81.6058 808.445 87.1184 810.627 93.5884C812.876 100.058 814 107.32 814 115.375V128.942H726.302V108.047H781.361V105.472C781.428 101.907 780.799 98.8699 779.476 96.3612C778.22 93.8524 776.368 91.9379 773.921 90.6175C771.474 89.2971 768.498 88.6369 764.992 88.6369C761.355 88.6369 758.346 89.4291 755.965 91.0136C753.65 92.5981 751.831 94.7767 750.508 97.5495C749.252 100.256 748.359 103.392 747.83 106.957C747.301 110.522 747.036 114.285 747.036 118.247V122.01C747.036 125.971 747.565 129.569 748.624 132.804C749.748 136.039 751.335 138.812 753.385 141.122C755.502 143.367 758.015 145.117 760.925 146.371C763.901 147.625 767.274 148.252 771.044 148.252C775.607 148.252 780.105 147.394 784.536 145.678C788.967 143.961 792.77 141.122 795.945 137.161L811.123 155.184C808.941 158.287 805.832 161.291 801.798 164.196C797.83 167.101 793.068 169.478 787.512 171.326C781.957 173.109 775.74 174 768.862 174Z" fill="white"/>
                        <path d="M933.097 134.513C933.097 132.314 932.766 130.341 932.105 128.595C931.443 126.784 930.219 125.102 928.433 123.55C926.646 121.997 924.066 120.445 920.692 118.893C917.384 117.276 913.017 115.594 907.592 113.848C901.24 111.778 895.12 109.45 889.231 106.862C883.343 104.211 878.083 101.138 873.452 97.6455C868.82 94.0881 865.148 89.9486 862.436 85.227C859.723 80.4407 858.367 74.8783 858.367 68.5396C858.367 62.4597 859.756 56.9943 862.535 52.1433C865.314 47.2276 869.184 43.0558 874.146 39.6278C879.175 36.1351 885.063 33.4832 891.812 31.6722C898.56 29.7964 905.938 28.8586 913.943 28.8586C924.529 28.8586 933.858 30.6696 941.93 34.2917C950.068 37.8491 956.419 42.9264 960.985 49.5238C965.616 56.0564 967.932 63.7857 967.932 72.7115H933.296C933.296 69.1541 932.535 66.0171 931.013 63.3006C929.557 60.584 927.341 58.4496 924.364 56.8973C921.386 55.345 917.648 54.5688 913.149 54.5688C908.782 54.5688 905.11 55.2156 902.133 56.5092C899.156 57.8028 896.906 59.5491 895.385 61.7483C893.863 63.8827 893.102 66.2435 893.102 68.8307C893.102 70.9651 893.697 72.9055 894.888 74.6519C896.145 76.3335 897.899 77.9182 900.148 79.4058C902.464 80.8935 905.243 82.3164 908.485 83.6747C911.793 85.033 915.498 86.3589 919.6 87.6525C927.275 90.0457 934.09 92.7299 940.044 95.7051C946.065 98.6157 951.126 101.947 955.229 105.698C959.397 109.385 962.539 113.589 964.657 118.311C966.84 123.032 967.932 128.368 967.932 134.319C967.932 140.658 966.675 146.285 964.16 151.2C961.646 156.116 958.04 160.288 953.343 163.716C948.645 167.079 943.022 169.634 936.471 171.38C929.921 173.127 922.61 174 914.539 174C907.128 174 899.817 173.094 892.606 171.283C885.46 169.408 878.976 166.562 873.154 162.746C867.332 158.865 862.667 153.917 859.161 147.902C855.72 141.822 854 134.61 854 126.266H888.934C888.934 130.406 889.496 133.899 890.621 136.744C891.746 139.59 893.4 141.886 895.583 143.633C897.766 145.315 900.446 146.543 903.622 147.32C906.798 148.031 910.437 148.387 914.539 148.387C918.972 148.387 922.544 147.772 925.257 146.543C927.97 145.25 929.954 143.568 931.212 141.498C932.469 139.364 933.097 137.036 933.097 134.513Z" fill="white"/>
                        <path d="M1017.06 23.0374V172.06H983.612V23.0374H1017.06ZM1013.09 115.982L1005.25 116.176C1005.25 108.803 1006.17 102.011 1008.03 95.8022C1009.88 89.5929 1012.53 84.1921 1015.97 79.5999C1019.41 75.0076 1023.54 71.4502 1028.37 68.9277C1033.2 66.4052 1038.56 65.1439 1044.45 65.1439C1049.74 65.1439 1054.57 65.8878 1058.94 67.3754C1063.37 68.863 1067.18 71.2562 1070.35 74.5549C1073.59 77.8535 1076.07 82.1547 1077.79 87.4585C1079.58 92.7622 1080.47 99.2302 1080.47 106.862V172.06H1046.83V106.668C1046.83 102.399 1046.2 99.1008 1044.94 96.7724C1043.75 94.3792 1042.03 92.7299 1039.78 91.8244C1037.53 90.8542 1034.79 90.3691 1031.55 90.3691C1027.64 90.3691 1024.47 91.0159 1022.02 92.3094C1019.57 93.603 1017.69 95.4141 1016.36 97.7426C1015.11 100.006 1014.25 102.691 1013.78 105.795C1013.32 108.9 1013.09 112.295 1013.09 115.982Z" fill="white"/>
                        <path d="M1134.36 67.0843V172.06H1100.82V67.0843H1134.36ZM1098.83 40.0159C1098.83 35.3589 1100.55 31.5428 1103.99 28.5675C1107.44 25.5923 1111.9 24.1046 1117.39 24.1046C1122.88 24.1046 1127.35 25.5923 1130.79 28.5675C1134.23 31.5428 1135.95 35.3589 1135.95 40.0159C1135.95 44.6728 1134.23 48.4889 1130.79 51.4642C1127.35 54.4394 1122.88 55.9271 1117.39 55.9271C1111.9 55.9271 1107.44 54.4394 1103.99 51.4642C1100.55 48.4889 1098.83 44.6728 1098.83 40.0159Z" fill="white"/>
                        <path d="M1195.99 172.06H1162.35V58.5466C1162.35 50.397 1164.04 43.5409 1167.41 37.9784C1170.79 32.416 1175.55 28.2118 1181.7 25.3659C1187.86 22.4553 1195.13 21 1203.54 21C1206.45 21 1209.19 21.194 1211.77 21.5821C1214.35 21.9702 1216.87 22.4553 1219.32 23.0374L1219.42 47.0983C1218.22 46.7749 1217 46.5485 1215.74 46.4192C1214.49 46.2898 1212.93 46.2251 1211.08 46.2251C1207.84 46.2251 1205.09 46.7102 1202.84 47.6804C1200.59 48.5859 1198.87 49.9765 1197.68 51.8523C1196.56 53.6633 1195.99 55.8947 1195.99 58.5466V172.06ZM1216.83 67.0843V89.7869H1146.87V67.0843H1216.83Z" fill="white"/>
                        <path d="M1285.41 67.0843V89.7869H1220.71V67.0843H1285.41ZM1234.3 40.986H1267.75V137.812C1267.75 140.593 1268.08 142.76 1268.74 144.312C1269.4 145.8 1270.53 146.867 1272.11 147.514C1273.77 148.096 1275.95 148.387 1278.66 148.387C1280.58 148.387 1282.17 148.354 1283.43 148.29C1284.68 148.16 1285.88 147.999 1287 147.805V171.186C1284.15 172.092 1281.18 172.771 1278.07 173.224C1274.96 173.741 1271.65 174 1268.14 174C1261 174 1254.88 172.9 1249.78 170.701C1244.76 168.502 1240.92 165.042 1238.27 160.32C1235.62 155.599 1234.3 149.454 1234.3 141.886V40.986Z" fill="white"/>
                    </svg>
                </a>
            </div>
            <div class="footer_bottom">
                <?php if(!empty(get_field('footer_menu', 'option'))) { ?>
                    <ul>
                        <?php foreach (get_field('footer_menu', 'option') as $key => $item) { ?>
                            <li>
                                <a href="<?php echo $item['link']['url']; ?>" target="<?php echo $item['link']['target']; ?>" ><?php echo $item['link']['title']; ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                <?php } ?>
                <p><?php the_field('footer_copyright', 'option'); ?></p>
            </div>
        </div>
    </footer>
    <div class="modal_img">
        <div class="modal_close">
            <svg viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg"><path d="M512 0C229.232 0 0 229.232 0 512c0 282.784 229.232 512 512 512 282.784 0 512-229.216 512-512C1024 229.232 794.784 0 512 0zm0 961.008c-247.024 0-448-201.984-448-449.01 0-247.024 200.976-448 448-448s448 200.977 448 448-200.976 449.01-448 449.01zm181.008-630.016c-12.496-12.496-32.752-12.496-45.248 0L512 466.752l-135.76-135.76c-12.496-12.496-32.752-12.496-45.264 0-12.496 12.496-12.496 32.752 0 45.248L466.736 512l-135.76 135.76c-12.496 12.48-12.496 32.769 0 45.249 12.496 12.496 32.752 12.496 45.264 0L512 557.249l135.76 135.76c12.496 12.496 32.752 12.496 45.248 0 12.496-12.48 12.496-32.769 0-45.249L557.248 512l135.76-135.76c12.512-12.512 12.512-32.768 0-45.248z"/></svg>
        </div>
        <div class="modal_content">
        </div>
    </div>
    <div class="modal_fon"></div>
    <?php wp_footer(); ?>
</body>
</html>