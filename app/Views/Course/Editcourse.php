<?= $this->extend('layout/master') ?>

<?= $this->section('content') ?>




<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Course</h3>
    </div>
    <div class="card-body">
<?php $validation = \Config\Services::validation();
?>
<div class="d-flex justify-content-center">
<form  action="<?= base_url('course/updatecourse/' . $id) ?>" method="post">
    <?= csrf_field() ?>
    <div  style=" margin-bottom: 10px;padding-top: 40px;padding: 10px;">

        

        <div class="form-group row">
            <label class="col-sm-6 col-form-label" style="font-size: 20px;"><?php echo lang('component.Name'); ?><label style="color: red;margin-left: 10px;">(*)</label></label>
            <div class="col-sm-6">
                <div class="editinput input-group">
                    <input id="editname" type="text" name="editname" class="form-control" value="<?= $datacourse[0]->name ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />
                </div>
                <?php if ($validation->getError('editname')) : ?>

                    <div class="text-danger">
                        <?= $validation->getError('editname') ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>





        <div class="form-group row">
            <label class="col-sm-6 col-form-label" style="font-size: 20px;"><?php echo lang('component.Coursetype'); ?><label style="color: red;margin-left: 10px;">(*)</label></label>
            <div class="col-sm-6">
                <div class="editinput input-group">
                    <select style="font-size:20px;height:38px;" class="form-control" id="editcoursetype" name="editcoursetype">

                        <option value="Sự kiện" <?php echo $datacourse[0]->course_type == "Sự kiện" ? 'selected' : ''; ?>><?php echo lang('component.Event'); ?></option>
                        <option value="Khóa học" <?php echo $datacourse[0]->course_type == "Khóa học" ? 'selected' : ''; ?>><?php echo lang('component.Course'); ?></option>
                    </select>
                </div>
                <?php if ($validation->getError('editcoursetype')) : ?>

                    <div class="text-danger">
                        <?= $validation->getError('editcoursetype') ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        
            <div class="form-group row">

                <label class="col-sm-6 col-form-label" style="font-size: 20px;"><?php echo lang('component.Time'); ?><label style="color: red;margin-left: 10px;">(*)</label></label>
                <div class="col-sm-6">
                    <div class="editinput">
                        <div class='input-group date' id='datetimepicker1'>
                            <input id="edittime" type="text" name="edittime" value="<?= $datacourse[0]->time ?>" class="form-control" />
                            <span class="input-group-addon input-group-text">
                                <span class="fa fa-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <?php if ($validation->getError('edittime')) : ?>

                        <div class="text-danger">
                            <?= $validation->getError('edittime') ?>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
       
       
            <div class="form-group row">
                <label class="col-sm-6 col-form-label" style="font-size: 20px;"><?php echo lang('component.Weekdays'); ?><label style="color: red;margin-left: 10px;">(*)</label></label>
                <div class="col-sm-6">
                    <div class="editinput input-group">
                        <input id="editweekdays" type="text" name="editweekdays" value="<?= $datacourse[0]->weekdays ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />
                    </div>
                    <?php if ($validation->getError('editweekdays')) : ?>

                        <div class="text-danger">
                            <?= $validation->getError('editweekdays') ?>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
      

        <div class="form-group row">
            <label class="col-sm-6 col-form-label" style="font-size: 20px;"><?php echo lang('component.Startdate'); ?><label style="color: red;margin-left: 10px;">(*)</label></label>
            <div class="col-sm-6">
                <div class="editinput">
                    <div class='input-group date' id='datetimepicker2'>
                        <input id="editstartdate" type="text" name="editstartdate" value="<?= $datacourse[0]->start_date ?>" class="form-control" />
                        <span class="input-group-addon input-group-text">
                            <span class="fa fa-calendar"></span>
                        </span>
                        
                    </div>
                </div>
                <?php if ($validation->getError('editstartdate')) : ?>

                    <div class="text-danger">
                        <?= $validation->getError('editstartdate') ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>


        <div class="form-group row">
            <label class="col-sm-6 col-form-label" style="font-size: 20px;"><?php echo lang('component.Enddate'); ?><label style="color: red;margin-left: 10px;">(*)</label></label>
            <div class="col-sm-6">
                <div class="editinput">
                    <div class='input-group date' id='datetimepicker3'>
                        <input id="editenddate" type="text" name="editenddate" value="<?= $datacourse[0]->end_date ?>" class="form-control"></input>
                        <span class="input-group-addon input-group-text">
                            <span class="fa fa-calendar"></span>
                        </span>
                        
                    </div>
                </div>
                <?php if ($validation->getError('editenddate')) : ?>

                    <div class="text-danger">
                        <?= $validation->getError('editenddate') ?>
                    </div>
                <?php endif; ?>
            </div>

        </div>
        <div class="form-group row">
            <label class="col-sm-6 col-form-label" style="font-size: 20px;"><?php echo lang('component.Note'); ?></label>
            <div class="col-sm-6">
            <div class="editinput">
                <textarea id="editnote" rows="3" name="editnote"  class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"><?php echo   $datacourse[0]->note ?></textarea>
                </div>

            </div>
        </div>


        <div  style="margin-top: 50px;">
            <button class="btn btn-success" onclick="return checkenddate();" type="submit" style="margin-left:10px;"><i class="fa fa-plus-circle"></i> <?php echo lang('component.Update'); ?> </button>
            <a href="<?php echo base_url("course") ?>" class="btn btn-warning" type="submit" style="margin-left:10px;">
                <i class="fa fa-times-circle"></i>  <?php echo lang('component.Cancel'); ?></a>

            <button class="btn btn-danger btndelete" style="margin-left:10px;" onclick="  checkdelete(<?=  $id  ?>) ;return false">
                <i class="fa fa-trash"></i>  <?php echo lang('component.Delete'); ?> </button>



            <a href="<?php echo base_url('course/paticipant/' . $id) ?>" class="btn btn-info" type="submit" style="margin-left:10px;">
                <i class="fa fa-address-card-o"></i>   <?php echo lang('component.Paticipants'); ?></a>
        </div>

    </div>

</form></div>

</div></div>


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



<script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    


<style>
    .editinput {
        min-width: 300px;
    }

    input[type="text"] {
        font-size: 20px;
        height: 38px;
    }

    option {
        font-size: 20px;
    }
    .divcenter{
        margin:0 auto;
    }
</style>


<script type="text/javascript">

function checkdelete(id) {
        $(".modal").css('display', 'block');


        $("#confirmyes").on("click", function() {

            $(".modal").css('display', 'none');
            $.ajax({
                url: '<?= base_url('course/deletecourse/') ?>/id='+id,
                type: 'get',
            });
            
           window.location.replace('<?= base_url('course') ?>')
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
    function checkenddate(){
        var startdate=$('#editstartdate').val();
        var enddate=$('#editenddate').val();
        if(startdate>enddate){
            alert('End date fail')
            return false
            
        }
        else return true;
    }
    function checkcoursetype() {
        var type = $('#editcoursetype').val();
        if (type === 'Sự kiện') {
            $('#edittime').attr('disabled', 'true');
            $('#editweekdays').attr('disabled', 'true');
        } else {
            $('#edittime').removeAttr('disabled');
            $('#editweekdays').removeAttr('disabled');
        }
        
    }
    $(document).ready(function() {
       
        checkcoursetype();
        $('#editcoursetype').click(function() {
            var type = $('#editcoursetype').val();
        if (type === 'Sự kiện') {
            $('#edittime').attr('disabled', 'true');
            $('#editweekdays').attr('disabled', 'true');
        } else {
            $('#edittime').removeAttr('disabled');
            $('#editweekdays').removeAttr('disabled');
        }
        })
    })
    $(function() {

        $('#datetimepicker1').datepicker({
    format: 'yyyy-mm-dd'
 });
        $('#datetimepicker2').datepicker({
    format: 'yyyy-mm-dd'
 });
        $('#datetimepicker3').datepicker({
    format: 'yyyy-mm-dd'
 });

    });
</script>


<?= $this->endSection() ?>