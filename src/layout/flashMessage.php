<?php if (!empty($_SESSION['flashMessage'])): ?>
    <div class="alert alert-success alert-dismissable" id="flash-msg">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <h4><i class="icon fa fa-check"></i><?= $_SESSION['flashMessage'] ?></h4>
    </div>
    <script>
        $(document).ready(function () {$("#flash-msg").delay(3000).fadeOut("slow");});
    </script>
    <?php unset($_SESSION['flashMessage']) ?>
<?php endif; ?>