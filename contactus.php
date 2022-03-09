<?php
require "header.php";
?>

    <br>
    <hr>
    <main>
        <br>
        <section class="wrapper">
            <br> <br>
            <?php
            if (isset($_SESSION['uemail'])) {
                echo '<p>You have logged in successfully.</p>';
            }
            else {
                echo ' <p>You have logged out successfully, please log in to continue using the system.</p>';
            }
            ?>
        </section>
    </main>

<?php

require "footer.php";

?>