<h3>User dashboard</h3>
<p class="lead">

<?php
if ($session['online'] === true) {
    echo "\n" . "Welcome back " . $this->user['firstname'] . "!" . var_dump($_SESSION);
} else {
    var_dump($_SESSION);
}
?>

</p>