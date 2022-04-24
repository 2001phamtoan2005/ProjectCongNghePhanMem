<?= $this->extend('layout/master') ?>

<?= $this->section('content') ?>




<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<div class="card">
    <div class="card-header">
        <h3 class="card-title">Create Course</h3>
    </div>
    <div class="card-body">


        <?php $validation = \Config\Services::validation();
        ?>
        <div class="d-flex justify-content-center">
            <form action="<?php echo 'addcourse' ?>" method="post">
                <?= csrf_field() ?>
                <div style=" margin-bottom: 10px;padding-top: 10px;padding: 10px;">

                    <div class="form-group row">
                        <label class="col-sm-6 col-form-label" style="font-size: 20px;"><?php echo lang('component.Name'); ?><label style="color: red;margin-left: 10px;">(*)</label></label>
                        <div class="col-sm-6">
                            <div class="createinput input-group">

                                <input id="createname" type="text" name="createname" value="<?php echo set_value('createname'); ?>" class="form-control <?php if ($validation->getError('createname')) : ?>is-invalid<?php endif ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />

                            </div>
                            <?php if ($validation->getError('createname')) : ?>

                                <div class="text-danger">
                                    <?= $validation->getError('createname') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>



                    <div class="form-group row">
                        <label class="col-sm-6 col-form-label" style="font-size: 20px;"><?php echo lang('component.Coursetype'); ?><label style="color: red;margin-left: 10px;">(*)</label></label>
                        <div class="col-sm-6">
                            <div class="createinput input-group">
                                <select style="font-size:20px;height:38px;" class="form-control <?php if ($validation->getError('createcoursetype')) : ?>is-invalid<?php endif ?>" id="createcoursetype" name="createcoursetype" value="<?php echo set_value('createcoursetype'); ?>">

                                    <option value="" <?php echo (set_value('createcoursetype') == '') ? 'selected' : ''; ?>><?php echo lang('component.Choosecoursetype'); ?></option>

                                    <option value="Sự kiện" <?php echo (set_value('createcoursetype') == 'Sự kiện') ? 'selected' : ''; ?>><?php echo lang('component.Event'); ?></option>
                                    <option value="Khóa học" <?php echo (set_value('createcoursetype') == 'Khóa học') ? 'selected' : ''; ?>><?php echo lang('component.Course'); ?></option>
                                </select>

                            </div>
                            <?php if ($validation->getError('createcoursetype')) : ?>
                                <br></br>
                                <div class="text-danger">
                                    <?= $validation->getError('createcoursetype') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-6 col-form-label" style="font-size: 20px;"><?php echo lang('component.Time'); ?><label style="color: red;margin-left: 10px;">(*)</label></label>
                        <div class="col-sm-6">
                            <div class="createinput input-group">
                                <div class='input-group date' >
                                    <input id="createtime" type="text" name="createtime" value="<?php echo set_value('createtime'); ?>" class="form-control datetimepicker1 <?php if ($validation->getError('createtime')) : ?>is-invalid<?php endif ?>" />
                                   
                                </div>
                            </div>

                            <?php if ($validation->getError('createtime')) : ?>

                                <div class="text-danger">
                                    <?= $validation->getError('createtime') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>



                    <div class="form-group row">
                        <label class="col-sm-6 col-form-label" style="font-size: 20px;"><?php echo lang('component.Weekdays'); ?><label style="color: red;margin-left: 10px;">(*)</label></label>
                        <div class="col-sm-6">
                            <div class="createinput input-group">
                                <input id="createweekdays" type="text" name="createweekdays" value="<?php echo set_value('createweekdays'); ?>" class="form-control <?php if ($validation->getError('createweekdays')) : ?>is-invalid<?php endif ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />
                            </div>
                            <?php if ($validation->getError('createweekdays')) : ?>

                                <div class="text-danger">
                                    <?= $validation->getError('createweekdays') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-6 col-form-label" style="font-size: 20px;"><?php echo lang('component.Startdate'); ?><label style="color: red;margin-left: 10px;">(*)</label></label>
                        <div class="col-sm-6">
                            <div class="createinput input-group">
                                <div class='input-group date' >
                                    <input id="createstartdate" type="text" name="createstartdate" value="<?php echo set_value('createstartdate'); ?>" class="form-control datetimepicker2 <?php if ($validation->getError('createstartdate')) : ?>is-invalid<?php endif ?>" />
                                   

                                </div>
                            </div>
                            <?php if ($validation->getError('createstartdate')) : ?>

                                <div class="text-danger">
                                    <?= $validation->getError('createstartdate') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-6 col-form-label" style="font-size: 20px;"><?php echo lang('component.Enddate'); ?><label style="color: red;margin-left: 10px;">(*)</label></label>
                        <div class="col-sm-6">
                            <div class="createinput input-group">
                                <div class='input-group date' >
                                    <input id="createenddate" type="text" name="createenddate" value="<?php echo set_value('createenddate'); ?>" class="form-control datetimepicker3 <?php if ($validation->getError('createenddate')) : ?>is-invalid<?php endif ?>" />
                                    
                                </div>
                            </div>
                            <?php if ($validation->getError('createenddate')) : ?>

                                <div class="text-danger">
                                    <?= $validation->getError('createenddate') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-6 col-form-label" style="font-size: 20px;"><?php echo lang('component.Note'); ?></label>
                        <div class="col-sm-6">
                            <div class="createinput ">
                                <textarea id="createnote" rows="3" name="createnote" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"><?php echo set_value('createnote'); ?></textarea>
                            </div>
                        </div>
                    </div>


                    <div style="margin-top: 50px;" class="d-flex justify-content-center">
                        <button class="btn btn-success" type="submit" style="margin-left:10px;" onclick="return checkenddate();"><i class="fa fa-plus-circle"></i><?php echo lang('component.Register'); ?></button>
                        <a href="<?php echo base_url("course") ?>" class="btn btn-danger" type="submit" style="margin-left:10px;">
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
        var startdate = $('#createstartdate').val();
        var enddate = $('#createenddate').val();
        if (startdate > enddate) {
            alert('End date fail')
            return false

        } else return true;
    }

    function checkcoursetype() {
        var type = $('#createcoursetype').val();
        if (type === 'Sự kiện') {
            $('#createtime').attr('disabled', 'true');
            $('#createweekdays').attr('disabled', 'true');
        } else {
            $('#createtime').removeAttr('disabled');
            $('#createweekdays').removeAttr('disabled');
        }
    }
    $(document).ready(function() {
        checkcoursetype();
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
</script>


<?= $this->endSection() ?>