<?= $this->extend('layout/master') ?>

<?= $this->section('content') ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<div style=" margin-bottom: 10px;padding-top: 10px;padding: 10px;">

    <div class="alert alert-success alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert">&times;</button>
        Success! registration completed.
    </div>
    <div class="card">
        <div class="card-body">
            <?php $validation = \Config\Services::validation();?>
            <form class="" action="" method="post">
                <div class="row g-3">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                        <span>Login ID</span><span style="color:#ff0000">*</span>
                    </div>
                    <div class="col-md-6">
                        <input type="text" value="<?=(!empty($user["login_id"]))?$user["login_id"]:""?>" name="login_id"
                            class="form-control" id="inputEmail2">
                    </div>
                    <div class="col-md-2">
                    </div>
                </div>
        </div>
        <div class="row g-3">
            <div class="col-md-2">

            </div>
            <div class="col-md-2">
                <span>Full Name</span><span style="color:#ff0000">*</span>
            </div>
            <div class="col-md-6">
                <input type="text" value="<?=(!empty($input["name"]))?$input["name"]:""?>" name="fullname"
                    class="form-control" id="inputEmail2">
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
                    <input type="text" value="<?=(!empty($input["gender"]))?$input["gender"]:""?>"
                        name="employee_id_create" class="form-control" id="inputEmail2">
                </div>
            </div>
            <div class="col-md-2">
            </div>
            <div class="col-md-2">

            </div>
            <div class="col-md-2">
                <span>Status</span>
            </div>
            <div class="col-md-6">
                <input type="text" value="<?=(!empty($input["status"]))?$input["status"]:""?>" name="status"
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
                <input type="text" value="<?=(!empty($input["birthday"]))?$input["birthday"]:""?>" name="birthday"
                    width="276" />
            </div>
            <div class="col-md-2">
            </div>
            <div class="col-md-2">

            </div>
            <div class="col-md-2">
                <span>Email</span><span style="color:#ff0000">*</span>
            </div>
            <div class="col-md-6">
                <input type="email" value="<?=(!empty($input["email"]))?$input["email"]:""?>" name="email_create"
                    class="form-control" id="inputEmail2">
            </div>
            <div class="col-md-2">
            </div>
            <div class="col-md-2">

            </div>
            <div class="col-md-2">
                <span>Employee ID</span><span style="color:#ff0000">*</span>
            </div>
            <div class="col-md-6">
                <input type="text" value="<?=(!empty($input["employee_id"]))?$input["employee_id"]:""?>"
                    name="employee_id_create" class="form-control" id="inputEmail2">

            </div>
            <div class="col-md-2">
            </div>
            <div class="col-md-2">

            </div>
            <div class="col-md-2">
                <span>Department</span><span style="color:#ff0000">*</span>
            </div>
            <div class="col-md-6">
                <input type="text" value="<?=(!empty($input["department_id"]))?$input["department_id"]:""?>"
                    name="department" class="form-control" id="inputEmail2">
            </div>
            <div class="col-md-2">
            </div>
            <div class="col-md-2">
            </div>
            <div class="col-md-2">
                <span>Position</span><span style="color:#ff0000">*</span>
            </div>
            <div class="col-md-6">
                <input type="text" value="<?=(!empty($input["position_id"]))?$input["position_id"]:""?>" name="position"
                    class="form-control" id="inputEmail2">
            </div>
            <div class="col-md-2">
            </div>
            <div class="col-md-2">

            </div>
            <div class="col-md-2">
                <span>TelePhone</span>
            </div>
            <div class="col-md-6">
                <input type="text" value="<?=(!empty($input["telephone"]))?$input["telephone"]:""?>" name="telephone"
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
                <input type="text" value="<?=(!empty($input["mobile"]))?$input["mobile"]:""?>" name="moblie"
                    class="form-control" id="inputEmail2">
            </div>
            <div class="col-md-2">
            </div>
            <div class="col-md-2">

            </div>
            <div class="col-md-2">
                <span>Probation date</span><span style="color:#ff0000">*</span>
            </div>
            <div class="col-md-2">
                <input type="text" value="<?=(!empty($input["probation_date"]))?$input["probation_date"]:""?>"
                    name="probation_date" />
            </div>
            <div class="col-md-2">
                <span style="margin-left: 40px;">Official date</span><span style="color:#ff0000">*</span>
            </div>
            <div class="col-md-2">
                <input type="text" value="<?=(!empty($input["official_date"]))?$input["official_date"]:""?>"
                    name="officeial_date" />
                <span><?=$input["official_date"]?></span>
            </div>
            <div class="col-md-2">
            </div>
            <div class="col-md-2">

            </div>
            <div class="col-md-2">
                <span>Address</span>
            </div>
            <div class="col-md-6">
                <input type="text" value="<?=(!empty($input["address"]))?$input["address"]:""?>" name="address"
                    class="form-control" id="inputEmail2">
            </div>
            <div class="col-md-2">
            </div>
            <div class="col-md-5">
            </div>
            <div class="col-md-1">
                <a href="<?php echo base_url('createuser') ?>" class="btn btn-primary" type="submit"
                    style="margin-left:10px;">
                    <i class="fa fa-chevron-circle-left"></i> Back
            </div></a>
        </div>
        <div class="col-md-1">
        </div>
        <div class="col-md-5">
        </div>
    </div>
    </form>
</div>
</div>
<?= $this->endSection() ?>
<?= $this->section('style') ?>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<style>
.text {
    font-size: 20px;
    height: 38px;
}
</style>


<?= $this->endSection() ?>