<?= $this->extend('layout/master') ?>

<?= $this->section('content') ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<?php if (session()->getFlashdata('failed')) : ?>
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="btn-close" data-bs-dismiss="alert">&times;</button>
    <?php echo session()->getFlashdata('failed') ?>
</div>
<?php endif; ?>

<?php $validation = \Config\Services::validation();?>
<div class="card">
    <div class="card-body">
        <form class="" action="<?= base_url('user/update/' .$input[0]->id) ?>" method="post">
            <?= csrf_field() ?>
            <div class="row g-3">
                <div class="col-md-2">
                </div>
                <div class="col-md-2">
                    <span>Login ID</span><span style="color:#ff0000">*</span>
                </div>
                <div class="col-md-6">
                    <input type="text" value="<?=(!empty($input[0]))?$input[0]->telephone:""?>" name="login_id"
                        class="form-control" id="inputEmail2">
                </div>
                <div class="col-md-2">
                </div>
            </div>
            <br>
            <div class="row g-3">
                <div class="col-md-2">

                </div>
                <div class="col-md-2">
                    <span>Full Name</span><span style="color:#ff0000">*</span>
                </div>
                <div class="col-md-6">
                    <input type="text" value="<?=(!empty($input[0]))?$input[0]->name:""?>" name="fullname"
                        class="form-control" id="inputEmail2">
                    <?php if ($validation->getError('fullname')) : ?>

                    <div class="text-danger">
                        <?= $validation->getError('fullname') ?>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-2">

                </div>
                <div class="col-md-2">

                </div>
                <div class="col-md-2">
                    <span><?php echo lang('component.Gender'); ?></span>
                </div>
                <div class="col-md-6">
                    <input type="text" value="<?=(!empty($input[0]))?$input[0]->gender:""?>" name="gender"
                        class="form-control" id="inputEmail2">
                </div>
                <div class="col-md-2">
                </div>
                <div class="col-md-2">

                </div>
                <div class="col-md-2">
                    <span>Status</span>
                </div>
                <div class="col-md-6">
                    <input type="text" value="<?=(!empty($input[0]))?$input[0]->status:""?>" name="status"
                        class="form-control" id="inputEmail2">
                </div>
                <div class="col-md-2">
                </div>
                <div class="col-md-2">

                </div>
                <div class="col-md-2">
                    <span>Birthday</span>
                </div>
                <div class="col-md-6">
                    <input type="text" id="datepicker" value="<?=(!empty($input[0]))?$input[0]->birthday:""?>"
                        name="birthday" width="276" />
                </div>
                <div class="col-md-2">
                </div>
                <div class="col-md-2">

                </div>
                <div class="col-md-2">
                    <span>Email</span><span style="color:#ff0000">*</span>
                </div>
                <div class="col-md-6">
                    <input type="email" value="<?=(!empty($input[0]))?$input[0]->email:""?>" name="email_create"
                        class="form-control" id="inputEmail2">
                    <?php if ($validation->getError('email_create')) : ?>

                    <div class="text-danger">
                        <?= $validation->getError('email_create') ?>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-2">
                </div>
                <div class="col-md-2">

                </div>
                <div class="col-md-2">
                    <span>Employee ID</span><span style="color:#ff0000">*</span>
                </div>
                <div class="col-md-6">
                    <input type="text" value="<?=(!empty($input[0]))?$input[0]->employee_id:""?>" name="employee_id"
                        class="form-control" id="inputEmail2">
                    <?php if ($validation->getError('employee_id')) : ?>

                    <div class="text-danger">
                        <?= $validation->getError('employee_id') ?>
                    </div>
                    <?php endif; ?>

                </div>
                <div class="col-md-2">
                </div>
                <div class="col-md-2">

                </div>
                <div class="col-md-2">
                    <span>Department</span><span style="color:#ff0000">*</span>
                </div>
                <div class="col-md-6">
                    <input type="text" value="<?=(!empty($input[0]))?$input[0]->department_id:""?>" name="department"
                        class="form-control" id="inputEmail2">
                    <?php if ($validation->getError('department')) : ?>

                    <div class="text-danger">
                        <?= $validation->getError('department') ?>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-2">
                </div>
                <div class="col-md-2">
                </div>
                <div class="col-md-2">
                    <span>Position</span><span style="color:#ff0000">*</span>
                </div>
                <div class="col-md-6">
                    <input type="text" value="<?=(!empty($input[0]))?$input[0]->position_id:""?>" name="position"
                        class="form-control" id="inputEmail2">
                    <?php if ($validation->getError('position')) : ?>

                    <div class="text-danger">
                        <?= $validation->getError('position') ?>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-2">
                </div>
                <div class="col-md-2">

                </div>
                <div class="col-md-2">
                    <span>TelePhone</span>
                </div>
                <div class="col-md-6">
                    <input type="text" value="<?=(!empty($input[0]))?$input[0]->telephone:""?>" name="telephone"
                        class="form-control" id="inputEmail2">
                </div>
                <div class="col-md-2">
                </div>
                <div class="col-md-2">

                </div>
                <div class="col-md-2">
                    <span>Moblie</span><span style="color:#ff0000">*</span>
                </div>
                <div class="col-md-6">
                    <input type="text" value="<?=(!empty($input[0]))?$input[0]->mobile:""?>" name="mobile"
                        class="form-control" id="inputEmail2">
                    <?php if ($validation->getError('mobile')) : ?>

                    <div class="text-danger">
                        <?= $validation->getError('mobile') ?>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-2">
                </div>
                <div class="col-md-2">

                </div>
                <div class="col-md-2">
                    <span>Probation date</span><span style="color:#ff0000">*</span>
                </div>
                <div class="col-md-2">
                    <input type="text" id="datepicker1" value="<?=(!empty($input[0]))?$input[0]->probation_date:""?>"
                        name="probation_date" />
                    <?php if ($validation->getError('probation_date')) : ?>

                    <div class="text-danger">
                        <?= $validation->getError('probation_date') ?>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-2">
                    <span style="margin-left: 40px;">Official date</span><span style="color:#ff0000">*</span>
                </div>
                <div class="col-md-2">
                    <input type="text" id="datepicker2" value="<?=(!empty($input[0]))?$input[0]->official_date:""?>"
                        name="officeial_date" />
                    <?php if ($validation->getError('officeial_date')) : ?>

                    <div class="text-danger">
                        <?= $validation->getError('officeial_date') ?>
                    </div>
                    <?php endif; ?>

                </div>
                <div class="col-md-2">
                </div>
                <div class="col-md-2">

                </div>
                <div class="col-md-2">
                    <span>Address</span>
                </div>
                <div class="col-md-6">
                    <input type="text" value="<?=(!empty($input[0]))?$input[0]->address:""?>" name="address"
                        class="form-control" id="inputEmail2">
                </div>
                <div class="col-md-2">
                </div>
                <div class="col-md-5">
                </div>
                <div class="col-md-1">
                    <button class="btn btn-success" type="submit">
                        <i class="far fa-save"></i> Update
                    </button>
                </div>
                <div class="col-md-1">
                    <a href="" class="btn btn-warning" type="submit" style="margin-left:10px;">
                        <i class="fas fa-window-close"></i></i> Cancel
                    </a>
                </div>
                <div class="col-md-1">
                    <button class="btn btn-danger btndelete" style="margin-left:10px;"
                        onclick="  checkdelete(<?=(!empty($input[0]))?$input[0]->id:'' ?>) ;return false">
                        <i class="fa fa-trash"></i> <?php echo lang('component.Delete'); ?> </button>
                </div>
            </div>
            <div class="col-md-4">
            </div>
    </div>
    </form>
</div>
</div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.2.0/js/dataTables.fixedHeader.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" language="javascript">
    function checkdelete(id) {
        $(".modal").css('display', 'block');


        $("#confirmyes").on("click", function() {

            $(".modal").css('display', 'none');
            $.ajax({
                url: '<?= base_url('user/delete/') ?>/id='+id,
                type: 'get',
            });
            
           window.location.replace('<?= base_url('home') ?>')
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
$(document).ready(function() {
    $(function() {
        $('#datetimepicker1').datetimepicker({
            format: 'YYYY-MM-dd'
        });
        $('#datetimepicker1').datetimepicker({
            format: 'YYYY-MM-dd'
        });
        $('#datetimepicker1').datetimepicker({
            format: 'YYYY-MM-dd'
        });
    });
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd'
    });
    $('#datepicker1').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd'
    });
    $('#datepicker2').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd'
    });
});
</script>


<?= $this->endSection() ?>