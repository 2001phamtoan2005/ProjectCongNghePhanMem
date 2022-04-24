<?= $this->extend('layout/master') ?>

<?= $this->section('content') ?>




<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Equipment</h3>
    </div>
    <div class="card-body">


        <?php $validation = \Config\Services::validation();
        ?>
        <div class="d-flex justify-content-center">
            <form action="<?= base_url('Equipment/updateequipment/' . $id) ?>" enctype="multipart/form-data" method="post">
                <?= csrf_field() ?>
                <div style=" margin-bottom: 10px;padding-top: 10px;padding: 10px;">

                    <div class="form-group row">
                        <label class="col-sm-6 col-form-label" style="font-size: 20px;"><?php echo lang('component.Employeeid'); ?><label style="color: red;margin-left: 10px;">(*)</label></label>
                        <div class="col-sm-6">
                            <div class="createinput input-group">

                                <input id="Employeeid" type="text" name="Employeeid" value="<?php echo $dataequipment[0]->employee_id; ?>" class="form-control <?php if ($validation->getError('Employeeid')) : ?>is-invalid<?php endif ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />

                            </div>
                            <?php if ($validation->getError('Employeeid')) : ?>

                                <div class="text-danger">
                                    <?= $validation->getError('Employeeid') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-6 col-form-label" style="font-size: 20px;"><?php echo lang('component.equipmentid'); ?></label>
                        <div class="col-sm-6">
                            <div class="createinput input-group">

                                <input id="equipmentid" type="text" name="equipmentid" value="<?php echo $dataequipment[0]->equipment_id; ?>" class="form-control <?php if ($validation->getError('equipmentid')) : ?>is-invalid<?php endif ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />

                            </div>
                            <?php if ($validation->getError('equipmentid')) : ?>

                                <div class="text-danger">
                                    <?= $validation->getError('equipmentid') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-6 col-form-label" style="font-size: 20px;"><?php echo lang('component.Name'); ?><label style="color: red;margin-left: 10px;">(*)</label></label>
                        <div class="col-sm-6">
                            <div class="createinput input-group">

                                <input id="Name" type="text" name="Name" value="<?php echo $dataequipment[0]->name; ?>" class="form-control <?php if ($validation->getError('Name')) : ?>is-invalid<?php endif ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />

                            </div>
                            <?php if ($validation->getError('Name')) : ?>

                                <div class="text-danger">
                                    <?= $validation->getError('Name') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>



                    <div class="form-group row">
                        <label class="col-sm-6 col-form-label" style="font-size: 20px;"><?php echo lang('component.Equipmenttype'); ?><label style="color: red;margin-left: 10px;">(*)</label></label>
                        <div class="col-sm-6">
                            <div class="createinput input-group">
                                <select class="form-control <?php if ($validation->getError('Equipmenttype')) : ?>is-invalid<?php endif ?>" id="Equipmenttype" name="Equipmenttype" value="<?php echo $dataequipment[0]->type_id; ?>">

                                    <option value="" <?php echo ($dataequipment[0]->type_id == '') ? 'selected' : ''; ?>> <?php echo lang('component.Chooseoptiontype'); ?></option>
                                    <?php
                                    foreach ($typeequipment as $value) {
                                        $select = ($dataequipment[0]->type_id == $value->id) ? 'selected' : '';
                                        echo
                                        "<option value=" . $value->id . " " . $select . ">" . $value->name . "</option>";
                                    }
                                    ?>

                                </select>
                            </div>
                            <?php if ($validation->getError('Equipmenttype')) : ?>
                               
                                <div class="text-danger">
                                    <?= $validation->getError('Equipmenttype') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-6 col-form-label" style="font-size: 20px;"><?php echo lang('component.manufacture'); ?><label style="color: red;margin-left: 10px;">(*)</label></label>
                        <div class="col-sm-6">
                            <div class="createinput input-group">

                                <select class="form-control <?php if ($validation->getError('manufacture')) : ?>is-invalid<?php endif ?>" id="manufacture" name="manufacture" value="<?php echo $dataequipment[0]->manufacture_id; ?>">

                                    <option value="" <?php echo ($dataequipment[0]->manufacture_id == '') ? 'selected' : ''; ?>> <?php echo lang('component.Chooseoptiontype'); ?></option>
                                    <?php
                                    foreach ($Manufacture as $value) {
                                        $select = ($dataequipment[0]->manufacture_id == $value->id) ? 'selected' : '';
                                        echo
                                        "<option value=" . $value->id . " " . $select . ">" . $value->name . "</option>";
                                    }
                                    ?>

                                </select>

                            </div>

                            <?php if ($validation->getError('manufacture')) : ?>

                                <div class="text-danger">
                                    <?= $validation->getError('manufacture') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>






                    <div class="form-group row">
                        <label class="col-sm-6 col-form-label" style="font-size: 20px;"><?php echo lang('component.purchasedate'); ?><label style="color: red;margin-left: 10px;">(*)</label></label>
                        <div class="col-sm-6">
                            <div class="createinput input-group">
                                <div class='input-group date'>
                                    <input id="purchasedate" type="text" name="purchasedate" value="<?php echo $dataequipment[0]->purchase_date; ?>" class="form-control datetimepicker2 <?php if ($validation->getError('purchasedate')) : ?>is-invalid<?php endif ?>" />


                                </div>
                            </div>
                            <?php if ($validation->getError('purchasedate')) : ?>

                                <div class="text-danger">
                                    <?= $validation->getError('purchasedate') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-6 col-form-label" style="font-size: 20px;"><?php echo lang('component.warrantyperiod'); ?><label style="color: red;margin-left: 10px;">(*)</label></label>
                        <div class="col-sm-6">
                            <div class="createinput input-group">
                                <div class='input-group date'>
                                    <input id="warrantyperiod" type="text" name="warrantyperiod" value="<?php echo $dataequipment[0]->warranty_period; ?>" class="form-control datetimepicker3 <?php if ($validation->getError('warrantyperiod')) : ?>is-invalid<?php endif ?>" />

                                </div>
                            </div>
                            <?php if ($validation->getError('warrantyperiod')) : ?>

                                <div class="text-danger">
                                    <?= $validation->getError('warrantyperiod') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-6 col-form-label" style="font-size: 20px;"><?php echo lang('component.series'); ?><label style="color: red;margin-left: 10px;">(*)</label></label>
                        <div class="col-sm-6">
                            <div class="createinput input-group">

                                <input id="series" type="text" name="series" value="<?php echo $dataequipment[0]->series; ?>" class="form-control <?php if ($validation->getError('series')) : ?>is-invalid<?php endif ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />


                            </div>

                            <?php if ($validation->getError('series')) : ?>

                                <div class="text-danger">
                                    <?= $validation->getError('series') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-6 col-form-label" style="font-size: 20px;"><?php echo lang('component.position'); ?></label>
                        <div class="col-sm-6">
                            <div class="createinput input-group">

                                <input id="position" type="text" name="position" value="<?php echo $dataequipment[0]->position; ?>" class="form-control " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />


                            </div>


                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-6 col-form-label" style="font-size: 20px;"><?php echo lang('component.Note'); ?></label>
                        <div class="col-sm-6">
                            <div class="createinput ">
                                <textarea id="Note" rows="3" name="Note" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"><?php echo $dataequipment[0]->note; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-6 col-form-label" style="font-size: 20px;"><?php echo lang('component.Image'); ?></label>
                        <div class="col-sm-6">
                            <div class="createinput ">
                            <input type="file"  class="form-control" id="Image" name="Image">
                            </div>
                        </div>
                    </div>


                    <div style="margin-top: 50px;" class="d-flex justify-content-center">
                        <button class="btn btn-success" type="submit" style="margin-left:10px;" onclick="return checkenddate();"><i class="fa fa-plus-circle"></i><?php echo lang('component.Update'); ?></button>
                        <a href="<?php echo base_url("equipment") ?>" class="btn btn-warning" type="submit" style="margin-left:10px;">
                            <i class="fa fa-times-circle"></i> <?php echo lang('component.Cancel'); ?></a>
                            <a href="<?= base_url('course/deletecourse/') ?>/id=' + id + '" onclick="  checkdelete(<?=  $id  ?>) ;return false"><button class="btn btn-danger btndelete" style="margin-left:10px;" onclick=" return false"><i class="fa fa-trash"></i>Delete</button></a>
                    </div>

                </div>

            </form>
        </div>
    </div>
</div>


<!-- confirm delete -->
<div class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Do you want to delete ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" id="confirmyes" class="btn btn-primary">Yes</button>
                <button type="button" id="confirmnone" class="btn btn-secondary" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>


<?= $this->section('style') ?>



<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />


<style>
    .createinput {
        min-width: 300px;
    }


    input[type="text"] {
        font-size: 20px;
        height: 38px;
    }

    option {
        font-size: 20px;
    }
</style>


<script type="text/javascript">
    function checkenddate() {
        var purchasedate = $('#purchasedate').val();
        var warrantyperiod = $('#warrantyperiod').val();
        if (purchasedate > warrantyperiod) {
            alert('End date fail')
            return false

        } else return true;
    }

    
    $(document).ready(function() {
      
        $('#createcoursetype').click(function() {
            var type = $('#createcoursetype').val();
            if (type === 'Sự kiện') {
                $('#createtime').attr('disabled', 'true');
                $('#createweekdays').attr('disabled', 'true');
            } else {
                $('#createtime').removeAttr('disabled');
                $('#createweekdays').removeAttr('disabled');
            }
        })
    })

    $(function() {
        $('.datetimepicker1').timepicker({
            uiLibrary: 'bootstrap4',
            format: 'hh-MM-ss'
        });
        $('.datetimepicker2').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd'
        });
        $('.datetimepicker3').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd'
        });
    });
    function checkdelete(id) {
        $(".modal").css('display', 'block');


        $("#confirmyes").on("click", function() {

            $(".modal").css('display', 'none');
            $.ajax({
                url: '<?= base_url('Equipment/deleteequipment/') ?>/id=' + id,
                type: 'get',
            });
            
            window.location.replace('<?= base_url('equipment') ?>')
            return true;
        });

        $("#confirmnone").on("click", function() {

            $(".modal").css('display', 'none');
            return false;
        });
        $(".close").on("click", function() {

            $(".modal").css('display', 'none');
            return false;
        });
    }
</script>


<?= $this->endSection() ?>