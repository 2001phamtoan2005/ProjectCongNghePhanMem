<?= $this->extend('layout/master') ?>

<?= $this->section('content') ?>




<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<div class="card">
    <div class="card-header">
        <h3 class="card-title">Create Equipment</h3>
    </div>
    <div class="card-body" style="color:black">


        <?php $validation = \Config\Services::validation();
        ?>
        <div class="d-flex justify-content-center">
            <form action="<?php echo base_url('Equipment/addequipment')  ?>" enctype="multipart/form-data" method="post">
                <?= csrf_field() ?>
                <div style=" margin-bottom: 10px;padding-top: 10px;padding: 10px;">

                    <div class="form-group row">
                        <label class="col-sm-6 col-form-label" style="font-size: 20px;"><?php echo lang('component.Employeeid'); ?><label style="color: red;margin-left: 10px;">(*)</label></label>
                        <div class="col-sm-6">
                            <div class="createinput input-group">

                                <input id="Employeeid" type="text" name="Employeeid"  autocomplete="off" value="<?php echo set_value('Employeeid'); ?>" class="form-control <?php if ($validation->getError('Employeeid')) : ?>is-invalid<?php endif ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />
                                <input  hidden="hidden" id="Employee" type="text" name="Employee"  autocomplete="off" value="<?php echo set_value('Employeeid'); ?>" class="form-control <?php if ($validation->getError('Employeeid')) : ?>is-invalid<?php endif ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />

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

                                <input id="equipmentid" type="text" name="equipmentid" value="<?php echo set_value('equipmentid'); ?>" class="form-control <?php if ($validation->getError('equipmentid')) : ?>is-invalid<?php endif ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />

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

                                <input id="Name" type="text" name="Name" value="<?php echo set_value('Name'); ?>" class="form-control <?php if ($validation->getError('Name')) : ?>is-invalid<?php endif ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />

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
                                <select class="form-control <?php if ($validation->getError('Equipmenttype')) : ?>is-invalid<?php endif ?>" id="Equipmenttype" name="Equipmenttype" value="<?php echo set_value('Equipmenttype'); ?>">

                                    <option value="" <?php echo (set_value('Equipmenttype') == '') ? 'selected' : ''; ?>> <?php echo lang('component.Chooseoptiontype'); ?></option>
                                    <?php
                                    foreach ($typeequipment as $value) {
                                        $select = (set_value('Equipmenttype') == $value->id) ? 'selected' : '';
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

                                <select class="form-control <?php if ($validation->getError('manufacture')) : ?>is-invalid<?php endif ?>" id="manufacture" name="manufacture" value="<?php echo set_value('manufacture'); ?>">

                                    <option value="" <?php echo (set_value('manufacture') == '') ? 'selected' : ''; ?>> <?php echo lang('component.Chooseoptiontype'); ?></option>
                                    <?php
                                    foreach ($Manufacture as $value) {
                                        $select = (set_value('manufacture') == $value->id) ? 'selected' : '';
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
                                    <input id="purchasedate" type="text" name="purchasedate" value="<?php echo set_value('purchasedate'); ?>" class="form-control datetimepicker2 <?php if ($validation->getError('purchasedate')) : ?>is-invalid<?php endif ?>" />


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
                                    <input id="warrantyperiod" type="text" name="warrantyperiod" value="<?php echo set_value('warrantyperiod'); ?>" class="form-control datetimepicker3 <?php if ($validation->getError('warrantyperiod')) : ?>is-invalid<?php endif ?>" />

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

                                <input id="series" type="text" name="series" value="<?php echo set_value('series'); ?>" class="form-control <?php if ($validation->getError('series')) : ?>is-invalid<?php endif ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />


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

                                <input id="position" type="text" name="position" value="<?php echo set_value('position'); ?>" class="form-control " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />


                            </div>


                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-6 col-form-label" style="font-size: 20px;"><?php echo lang('component.Note'); ?></label>
                        <div class="col-sm-6">
                            <div class="createinput ">
                                <textarea id="Note" rows="3" name="Note" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"><?php echo set_value('Note'); ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-6 col-form-label" style="font-size: 20px;"><?php echo lang('component.Image'); ?></label>
                        <div class="col-sm-6">
                            <div class="createinput ">
                                <input type="file" class="form-control" id="Image" name="Image">
                            </div>
                        </div>
                    </div>


                    <div style="margin-top: 50px;" class="d-flex justify-content-center">
                        <button class="btn btn-success" type="submit" style="margin-left:10px;" onclick="return checkenddate();"><i class="fa fa-plus-circle"></i><?php echo lang('component.Register'); ?></button>
                        <a href="<?php echo base_url("equipment") ?>" class="btn btn-warning" type="submit" style="margin-left:10px;">
                            <i class="fa fa-times-circle"></i> <?php echo lang('component.Cancel'); ?></a>
                    </div>

                </div>

            </form>
        </div>
    </div>
</div>





<?= $this->endSection() ?>


<?= $this->section('style') ?>



<?= $this->endSection() ?>

<?= $this->section('script') ?>


<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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

    function autocomplent() {
        console.log($('#Employeeid').val())
    }

    function searchemployee() {

        var keySearch = $("#Employeeid").val();
        $.ajax({
                url: '<?= base_url('Equipment/getemployee') ?>',
                type: 'get',
                data: {
                    key: keySearch
                }
            })
            .done(function(result) {
               
                var data = JSON.parse(result)
                console.log(data)
               
                $("#Employeeid").autocomplete({
                        minLength: 0,
                        source: data,
                        focus: function(event, ui) {
                            $("#Employee").val(ui.item.value);
                            return false;
                        },
                        select: function(event, ui) {
                            $("#Employeeid").val(ui.item.value);
                            $("#Employee").val(ui.item.label);
                            console.log($("#Employee").val())
                            return false;
                        }


                    })
                    .data("ui-autocomplete")._renderItem = function(ul, item) {
                        return $("<li>")
                            .append('<div id="ui-id-2" tabindex="-1" class="ui-menu-item-wrapper">'+ item.value +"      " + item.label+'</div>'  )
                            .appendTo(ul);
                    };


            })
    }

    $(document).ready(function() {
        $("#Employeeid").keyup( function() {
            searchemployee()
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
</script>


<?= $this->endSection() ?>