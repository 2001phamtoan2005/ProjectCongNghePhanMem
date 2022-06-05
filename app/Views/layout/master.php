<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=base_url("public/asset/fontawesome/css/all.min.css")?>">
    <!-- <link rel="stylesheet" href="<?=base_url("public/asset/css/style.css")?>"> -->
    <link rel="stylesheet" href=<?=base_url("asset/css/bootstrap/bootstrap.min.css")?>>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script type="text/javascript" src="https://www.cssscript.com/demo/snackbar-toast-notification/js/js-snackbar.js?v=1.0.0"></script>
    <link rel="stylesheet" type="text/css" href="https://www.cssscript.com/demo/snackbar-toast-notification/css/js-snackbar.css?v=1.0.0" />
    <?= $this->renderSection('style') ?>
    <!-- Minh Toàn Dùng -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,400;0,500;0,600;0,700;1,300&display=swap" rel="stylesheet">

    <title>Hello, world!</title>
</head>

<body style="padding:0;overflow:hidden" class="bg__home">
    <?= $this->include('partial/sidebar') ?>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    <script src="<?=base_url("asset/js/bootstrap/bootstrap.bundle.js")?>"></script>
    <script src="<?=base_url("asset/js/jquery/jquery-3.2.1.min.js")?>"></script>
    <script src="<?=base_url("asset/js/popper/popper-1.12.9.js")?>"></script>
    <script src="<?=base_url("asset/js/main.js")?>"></script>
    <script src="<?=base_url("asset/js/jquery/sidebar.js")?>"></script>
    <?= $this->renderSection('script') ?>
</body>
<style>
    .js-snackbar-container{
        margin-right: 40%;
    }
</styl>
<script>
    $(document).ready(function() {
        <?php
    if (session()->getFlashdata('success')) : ?>
     SnackBar({
            message: "<?php echo session()->getFlashdata('success') ?>",
            status: "success",
            position: "bl" // "br", "tr", "tc", "tm", "bc", "bm", "tl", or "bl"
        });
        
    <?php elseif (session()->getFlashdata('failed')) : ?>
        SnackBar({
            message: "<?php echo session()->getFlashdata('failed') ?>",
            status: "warning",
           
        });
    <?php endif; ?>
       
    });
</script>

</html>