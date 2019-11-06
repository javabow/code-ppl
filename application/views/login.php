
<!DOCTYPE html>
<html>
<head>
    <title>WarungBuku | Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>

<body>
    <div class="container">
        <br />
        <center><img style="width: 250px; height: 250px;" src="http://localhost/img/logobuku.png"></center>
        <br />
        <div class="row">
            <div class="col-xs-12 col-md-3">
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Login</div>
                    <div class="panel-body">
                        <?php
                        if($this->session->flashdata('message'))
                        {
                            echo '
                            <div class="alert alert-danger">
                                '.$this->session->flashdata("message").'
                            </div>
                            ';
                        }
                        ?>
                        <form method="post" action="/login/validation">
                            <div class="form-group">
                                <label>Enter Email Address</label>
                                <input type="text" name="user_email" class="form-control" value="<?php echo set_value('user_email'); ?>" />
                                <span class="text-danger"><?php echo form_error('user_email'); ?></span>
                            </div>
                            <div class="form-group">
                                <label>Enter Password</label>
                                <input type="password" name="user_password" class="form-control" value="<?php echo set_value('user_password'); ?>" />
                                <span class="text-danger"><?php echo form_error('user_password'); ?></span>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="login" value="Login" class="btn btn-info" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url(); ?>register">Register</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-3">
            </div>
        </div>
    </div>
</body>
</html>

