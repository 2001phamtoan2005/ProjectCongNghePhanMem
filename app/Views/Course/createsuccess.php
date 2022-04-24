<?= $this->extend('layout/master') ?>

<?= $this->section('content') ?>


    <div style=" margin-bottom: 10px;padding-top: 10px;padding: 10px;">

    <div class="alert alert-success alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert">&times;</button>
                Success! registration completed.
            </div>
       


        <div class="form-group row">
            <label class="col-sm-2 col-form-label" style="font-size: 20px;">Name</label>
            <div class="col-sm-10">
               
            <label class="text">      <?php echo set_value('createname'); ?></label>
                
               
            </div>
        </div>



        <div class="form-group row">
            <label class="col-sm-2 col-form-label" style="font-size: 20px;">Course type </label>
            <div class="col-sm-10">
                <div class="createinput">
                <label class="text">     <?php echo (set_value('createcoursetype') ); ?></label>
                </div>
               
            </div>
        </div>
        <?php
        if (set_value('createtime')=='') : ?>
            
        <?php elseif (!set_value('createtime')=='') : ?>
            <div id="divtime">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" style="font-size: 20px;">Time</label>
            <div class="col-sm-10">
            <label class="text">  <?php echo set_value('createtime'); ?></label>
                
            </div>
        </div>
        </div>
        <?php endif; ?>
       
        
        <?php
        if (set_value('createweekdays')=='') : ?>
            
        <?php elseif (!set_value('createweekdays')=='') : ?>
        <div id="divweekday">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" style="font-size: 20px;">Weekdays</label>
            <div class="col-sm-10">
               
            <label class="text">  <?php echo set_value('createweekdays'); ?></label>
            </div>
        </div>
        </div>
        <?php endif; ?>
       
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" style="font-size: 20px;">Start date</label>
            <div class="col-sm-10">
                
            <label class="text">    <?php echo set_value('createstartdate'); ?></label>
                       
                </div>
               
        </div>


        <div class="form-group row">
            <label class="col-sm-2 col-form-label" style="font-size: 20px;">End date</label>
            <div class="col-sm-10">
            <label class="text"> <?php echo set_value('createenddate'); ?></label>
            </div>
        </div>

        <?php
        if (set_value('createnote')=='') : ?>
            
        <?php elseif (!set_value('createnote')=='') : ?>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" style="font-size: 20px;">Note</label>
            <div class="col-sm-10">
              <label class="text">  <?php echo set_value('createnote'); ?></label>
        </div>
        <?php endif; ?>

        <div class="d-flex justify-content-center">
            
            <a href="<?php echo base_url("Course/Createcourse") ?>" class="btn btn-primary" type="submit" style="margin-left:10px;">
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