<?php
if (isset($_SESSION['message'])) :

?>
    <div class="alert alert-warning alert-dimissible fade show">
        <storng>Hey!</storng><?= $_SESSION['message']; ?>
        <button type="button" class="btn-close"></button>
    </div>
<?php
    unset($_SESSION['message']);
endif;
?>