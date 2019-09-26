<h3>Error page</h3>
<?php

switch ($type) {
    case 'Add-Car':
        echo "<p>Error: Car Could Not Be Added</p>";
        break;

    case 'Update-Car':
        echo "<p>Error: Car Could Not Be Updated</p>";
        break;
    
    default:
        echo "<p> Default Error </p>";
        break;
}
?>