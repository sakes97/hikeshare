        <footer class="footer footer-white">
            <!-- <div class="container">
                <div class="row">
                    <nav class="footer-nav">
                        <ul>
                            <li>
                                <a href="#">Contact Us</a>
                            </li>
                            <li>
                                <a href="#">Privacy Policy</a>
                            </li>
                            <li>
                                <a href="#">How it works</a>
                            </li>
                            <li>
                                <a href="#">Privacy Policy</a>
                            </li>
                        </ul>
                    </nav>
                    <div class="credits ml-auto">
                        <span class="copyright">
                            ©
                        </span>
                    </div>
                </div>
            </div> -->
        </footer>
    </div>

<!-- Core JS Files -->
<script src="<?php echo URL; ?>public/js/core/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo URL; ?>public/js/core/popper.min.js" type="text/javascript"></script>
<script src="<?php echo URL; ?>public/js/core/bootstrap.min.js" type="text/javascript"></script>

<?php
    //dynamically loading a pages javascript 
    if (isset($this->js))
    {
        foreach ($this->js as $js)
            echo '<script type="text/javascript" src="'.URL. 'views/' .$js.'"></script>';
    }
?>
<script src="<?php echo URL; ?>public/js/plugins/bootstrap-switch.js"></script>

<script src="<?php echo URL; ?>public/js/plugins/nouislider.min.js" type="text/javascript"></script>

<script src="<?php echo URL; ?>public/js/plugins/moment.min.js"></script>
<script src="<?php echo URL; ?>public/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>

<script src="<?php echo URL; ?>public/js/paper-kit.min.js?v=2.2.0" type="text/javascript"></script>

<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBRJmFJBYpMRLsJ2dLI28tC__ddzNO3FV8&libraries=places&callback=initMap"
async defer></script> -->
</body>
</html>