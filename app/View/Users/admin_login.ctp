<body class="bg-gradient-primary">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                </div>
                                <?php echo $this->Session->flash();?>
                                <?php echo $this->Form->create();?>
                                <fieldset>
                                    <div class="form-group">
                                        <?php echo $this->Form->input('username',array('class'=>"form-control", "placeholder"=>"Username", "autofocus"));?>
                                    </div>
                                    <div class="form-group">
                                        <?php echo $this->Form->input('password', array('type'=>'password',"class"=>"form-control", "placeholder"=>"Password"));?>
                                    </div>
                                </fieldset>
                                <?php echo $this->Form->button('Login',array('class'=>'btn btn-success'));?>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="register.html">Create an Account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>


</body>