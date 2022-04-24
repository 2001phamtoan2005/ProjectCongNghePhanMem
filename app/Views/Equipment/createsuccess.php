<?= $this->extend('layout/master') ?>

<?= $this->section('content') ?>


    <div style=" margin-bottom: 10px;padding-top: 10px;padding: 10px;">

    <div class="alert alert-success alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert">&times;</button>
                Success! registration completed.
            </div>
       


        

        <div class="d-flex justify-content-center">
            
            <a href="<?php echo base_url("registerEquipment") ?>" class="btn btn-primary" type="submit" style="margin-left:10px;">
                <i class="fa fa-chevron-circle-left"></i> back
        </div></a>

    </div>






   

<?= $this->endSection() ?>


<?= $this->section('style') ?>



<?= $this->endSection() ?>

<?= $this->section('script') ?>

<style>
   

   
    .text {
        font-size: 20px;
        height: 38px;
    }
    
    
</style>


<?= $this->endSection() ?>