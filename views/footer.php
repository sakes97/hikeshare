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

<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->


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

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBRJmFJBYpMRLsJ2dLI28tC__ddzNO3FV8&libraries=places&callback=initMap"
async defer></script>
</body>
</html>