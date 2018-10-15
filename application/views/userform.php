<html>
<head>
    <title>My User Form</title>

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>webroot/css/userform.css">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>webroot/css/alertify.css" >
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>webroot/css/alertify.rtl.css" >
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>webroot/css/themes/bootstrap.css" >
<link rel="icon" href="data:;base64,iVBORw0KGgo=">

<script src="<?= base_url() ?>webroot/js/jquery-3.1.1.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<div class="signup-form">
<?echo form_open('user/user_form', array('id' => 'userForm', 'class' => 'form'));?>
        <h2>Sign Up</h2>
        <p>Join our newsletter!.</p>
        <div class="form-group">
              <label>Name<span class="req">*</span></label>
              <?echo form_input(array('placeholder' => 'Name', 'name' => 'name', 'value' => set_value('name'), 'class' => 'form-control'));?>
            </div>
            <div class="form-group">
              <label>Date of Birth<span class="req">*</span></label>
              <?echo form_input(array('placeholder' => 'Date of Birth', 'type' => 'date', 'name' => 'date_of_birth', 'value' => set_value('date_of_birth'), 'class' => 'form-control'));?>
            </div>
            <div class="form-group">
                <label>Email Address<span class="req">*</span></label>
                <?echo form_input(array('placeholder' => 'Email', 'type' => 'email', 'name' => 'email', 'value' => set_value('email'), 'class' => 'form-control'));?>
            </div>
            <div class="form-group">
                <label>Favorite Color<span class="req">*</span></label>
                <?echo form_input(array('placeholder' => 'e.g. Blue', 'name' => 'fav_color', 'value' => set_value('fav_color'), 'class' => 'form-control'));?>
            </div>
            <div class="form-group">
            <?echo form_submit(array('name' => 'submit', 'value' => 'Submit', 'class' => 'btn btn-block btn-primary btn-lg'));?>
            </div>
        </div>
<?echo form_close();?>
</div>

<script src="<?= base_url() ?>webroot/js/alertify.min.js"></script>
<script src="<?= base_url() ?>webroot/js/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.js"></script>
<script src="<?= base_url() ?>webroot/js/validate.js"></script>
</div>

</body>
</html>
</body>
</html>
