<html>
<head>
    <title>My User Form</title>
</head>
<body>
    <h1>Fill out our form!</h1>
    <div class="userForm">
<?php 
$attributes = array('id' => 'userForm');
echo form_open('user/user_form', $attributes);
echo form_input('name', set_value('name'), array('placeholder' => 'Name'));
echo form_input(array('placeholder' => 'Date of Birth', 'type' => 'date', 'name' => 'date_of_birth', 'value' => set_value('date_of_birth')));
echo form_input(array('placeholder' => 'Email', 'type' => 'email', 'name' => 'email', 'value' => set_value('email')));
echo form_input('fav_color', set_value('fav_color'), array('placeholder' => 'Favorite Color'));
echo form_submit('submit', 'Submit');
echo form_close();
?>

<script src="<?= base_url() ?>webroot/js/jquery-3.1.1.js"></script>
<script src="<?= base_url() ?>webroot/js/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.js"></script>
<script src="<?= base_url() ?>webroot/js/validate.js"></script>
</div>

</body>
</html>
</body>
</html>
