<?php echo $this->Form->create(array('id'=>'appForm', 'inputDefaults'=>array('label'=>false, 'div'=>false))); ?>
    <div class="form-group">
        <label>Username</label>
        <?php echo $this->Form->input('username', array('class'=>'form-control')); ?>
    </div>
    <div class="form-group">
        <label>Role</label>
        <?php echo $this->Form->input('role_id', array('class'=>'form-control',
                                                                'options' => array(0,1),
                                                                'selected' => 1
        )); ?>
    </div>
    <div class="form-group">
        <label>Mật khẩu</label>
        <?php echo $this->Form->input('password', array('class'=>'form-control')); ?>
    </div>
    <div class="form-group">
        <label>Nhập lại mật khẩu</label>
        <?php echo $this->Form->input('confirm_password', array('type'=>'password', 'class'=>'form-control')); ?>
    </div>
    <div class="form-group">
        <label>Họ và tên</label>
        <?php echo $this->Form->input('name', array('class'=>'form-control', )); ?>
    </div>
    <div class="form-group">
        <label>Email:</label><br />
        <?php echo $this->Form->input('email', array('class'=>'form-control')); ?>
    </div>
    <button id="linkUpdate" type="submit" class="btn btn-success">Save</button>
    <button type="button" onclick="window.location.href='list'" class="btn btn-info">List</button>
<?php echo $this->Form->end();?>