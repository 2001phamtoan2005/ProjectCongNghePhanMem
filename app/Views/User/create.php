<?= $this->extend('layout/master') ?>

<?= $this->section('content') ?>
<!-- <?php
    // if (session()->getFlashdata('success')) : ?>
<div class="alert alert-success alert-dismissible"> <button type="button" class="btn-close"
        data-bs-dismiss="alert">&times;</button>
 
</div> -->
<?php if (session()->getFlashdata('failed')) : ?>
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="btn-close" data-bs-dismiss="alert">&times;</button>
    <?php echo session()->getFlashdata('failed') ?>
</div>
<?php endif; ?>

<?php $validation = \Config\Services::validation();?>

<div class="card">
    <div class="card-body">
        <?php $validation = \Config\Services::validation();?>
        <form class="" action="<?=base_url('addnewuser') ?>" method="post">
            <?= csrf_field() ?>
            <h5 class="card-title">User</h5>
            <div class="row g-3">
                <div class="col-md-2">
                </div>
                <div class="col-md-2">
                    <span><?php echo lang('component.Login_iD'); ?></span><span style="color:#ff0000">*</span>

                </div>
                <div class="col-md-6">
                    <input type="text" name="login_id" class="form-control" id="inputEmail2">
                    <?php if ($validation->getError('login_id')) : ?>

                    <div class="text-danger">
                        <?= $validation->getError('login_id') ?>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-2">
                </div>
                <div class="col-md-2">

                </div>
                <div class="col-md-2">
                    <span><?php echo lang('component.Password'); ?></span><span style="color:#ff0000">*</span>
                </div>
                <div class="col-md-6">
                    <input type="text" name="password" class="form-control" id="inputEmail2">
                    <?php if ($validation->getError('password')) : ?>

                    <div class="text-danger">
                        <?= $validation->getError('password') ?>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-2">

                </div>
                <div class="col-md-2">

                </div>
                <div class="col-md-2">
                    <span><?php echo lang('component.InitalPassword'); ?></span><span style="color:#ff0000">*</span>
                </div>
                <div class="col-md-6">
                    <input type="text" name="repass" class="form-control" id="inputEmail2">
                    <?php if ($validation->getError('repass')) : ?>

                    <div class="text-danger">
                        <?= $validation->getError('repass') ?>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-2">
                </div>
            </div>
            <h5>Infomation</h5>
            <div class="row g-3">
                <div class="col-md-2">

                </div>
                <div class="col-md-2">
                    <span><?php echo lang('component.FullName'); ?></span><span style="color:#ff0000">*</span>
                </div>
                <div class="col-md-6">
                    <input type="text" name="fullname" class="form-control" id="inputEmail2">
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
                    <div class="row mt-2 ml-2">
                        <div class="col-4">
                            <input class="form-check-input" type="radio" name="radio_create_user" value="1" id="enable">
                            <label class="form-check-label ml-2" for="flexRadioDefault1">
                                <?php echo lang('component.Male'); ?>
                            </label>
                        </div>
                        <div class="col-8">
                            <input class="form-check-input" type="radio" name="radio_create_user" value="0"
                                id="dishable">
                            <label class="form-check-label ml-2" for="flexRadioDefault2">
                                <?php echo lang('component.Female'); ?>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                </div>
                <div class="col-md-2">

                </div>
                <div class="col-md-2">
                    <span><?php echo lang('component.Status'); ?>x</span>
                </div>
                <div class="col-md-6">
                    <select class="form-control" name="create_status">
                        <option value="">Select Status</option>
                        <option value="1">Available</option>
                        <option value="0">Unavailable</option>
                    </select>
                </div>
                <div class="col-md-2">
                </div>
                <div class="col-md-2">

                </div>
                <div class="col-md-2">
                    <span><?php echo lang('component.Birthday'); ?></span>
                </div>
                <div class="col-md-6">
                    <input id="datepicker" name="birthday" width="276" />
                </div>
                <div class="col-md-2">
                </div>
                <div class="col-md-2">

                </div>
                <div class="col-md-2">
                    <span><?php echo lang('component.Mail'); ?></span><span style="color:#ff0000">*</span>
                </div>
                <div class="col-md-6">
                    <input type="email" name="email_create" class="form-control" id="inputEmail2">
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
                    <span><?php echo lang('component.Employee_ID'); ?></span><span style="color:#ff0000">*</span>
                </div>
                <div class="col-md-6">
                    <input type="text" name="employee_id_create" class="form-control" id="inputEmail2">
                    <?php if ($validation->getError('employee_id_create')) : ?>

                    <div class="text-danger">
                        <?= $validation->getError('employee_id_create') ?>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-2">
                </div>
                <div class="col-md-2">

                </div>
                <div class="col-md-2">
                    <span><?php echo lang('component.Department'); ?></span><span style="color:#ff0000">*</span>
                </div>
                <div class="col-md-6">
                    <select class="form-control" name="department_id">
                        <option value="">Select Department</option>
                        <?php foreach($department as $depar){?>
                        <option value="<?=$depar['id']?>"><?=$depar['name']?></option>"
                        <?php }?>
                    </select>
                    <?php if ($validation->getError('department_id')) : ?>

                    <div class="text-danger">
                        <?= $validation->getError('department_id') ?>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-2">
                </div>
                <div class="col-md-2">

                </div>
                <div class="col-md-2">
                    <span><?php echo lang('component.Position'); ?></span><span style="color:#ff0000">*</span>
                </div>
                <div class="col-md-6">
                    <select class="form-control" name="position_id">
                        <option value="">Select Position</option>
                        <?php foreach($position as $depar){?>x
                        <option value="<?=$depar['id']?>"><?=$depar['name']?></option>"
                        <?php }?>
                    </select>
                    <?php if ($validation->getError('position_id')) : ?>

                    <div class="text-danger">
                        <?= $validation->getError('position_id') ?>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-2">
                </div>
                <div class="col-md-2">

                </div>
                <div class="col-md-2">
                    <span><?php echo lang('component.TelePhone'); ?></span>
                </div>
                <div class="col-md-6">
                    <input type="text" name="telephone" class="form-control" id="inputEmail2">
                </div>
                <div class="col-md-2">
                </div>
                <div class="col-md-2">

                </div>
                <div class="col-md-2">
                    <span>Moblie</span><span style="color:#ff0000">*</span>
                </div>
                <div class="col-md-6">
                    <input type="text" name="moblie" class="form-control" id="inputEmail2">
                    <?php if ($validation->getError('moblie')) : ?>

                    <div class="text-danger">
                        <?= $validation->getError('moblie') ?>
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
                    <input id="datepicker1" name="probation_date" />
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
                    <input id="datepicker2" name="officeial_date" />
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
                    <input type="text" name="address" class="form-control" id="inputEmail2">
                </div>
                <div class="col-md-2">
                </div>
                <div class="col-md-5">
                </div>
                <div class="col-md-1">
                    <button type="submit" class="btn btn-success"><i
                            class="far fa-plus-square mr-2"></i>Register</button>
                </div>
                <div class="col-md-1">
                    <button type="button" class="btn btn-warning"><i
                            class="far fa-window-close mr-2"></i>Cancel</button>
                </div>
                <div class="col-md-5">
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>


<?= $this->section('style') ?>

<!-- <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap.min.css" rel="stylesheet"> -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.0/css/fixedHeader.bootstrap.min.css">
<?= $this->endSection() ?>

<?= $this->section('script') ?>
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