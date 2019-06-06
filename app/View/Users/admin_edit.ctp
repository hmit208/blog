<div class="container-fluid">

    <?php echo $this->Session->flash(); ?>


    <?php echo $this->Form->create(array('id' => 'appForm', 'inputDefaults' => array('label' => false, 'div' => false))); ?>
    <div class="form-group">
        <label>Username</label>
        <?php echo $this->Form->input('username', array('class' => 'form-control')); ?>
    </div>

    <div class="form-group">
        <label>Email</label>
        <?php echo $this->Form->input('email', array('class' => 'form-control')); ?>
    </div>

    <div class="form-group">
        <label>Full name</label>
        <?php echo $this->Form->input('name', array('class' => 'form-control')); ?>
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
    <?php echo $this->Form->end(); ?>
</div>