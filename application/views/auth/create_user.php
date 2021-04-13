<div class="row">
  <div class="col-md-12">
    
    <div class="panel panel-primary" data-collapsed="0">
    
      <div class="panel-heading">
        <div class="panel-title">
        <h1><?php echo lang('create_user_heading');?></h1>
        <p><?php echo lang('create_user_subheading');?></p>
        </div>
        
        <!-- <div class="panel-options">
            <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
            <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
            <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
            <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
        </div> -->

      </div>
      
      <div class="panel-body">
        <?= form_open('admin/auth/create_user', array('form'=>'form', 'class'=>'form-horizontal form-groups-bordered')); ?>
          
          <div class="form-group">
            <label class="col-sm-3 control-label"></label>
            
            <div class="col-sm-5">
   
                  <div class="input-group minimal">
                    <?php echo form_input($first_name);?>
                    <span class="input-group-addon"><i class="entypo-user"></i></span>
                  </div>
                    <?php if( form_error('first_name') == true ) : ?>
                      <small class="form-text text-danger"><b><?= form_error('first_name') ?></b></small> 
                     <?php else : ?>
                      <br>
                    <?php endif; ?>

                   <div class="input-group minimal">
                    <?php echo form_input($last_name);?>
                    <span class="input-group-addon"><i class="entypo-user"></i></span>
                  </div>
                    <?php if( form_error('last_name') == true ) : ?>
                      <small class="form-text text-danger"><b><?= form_error('last_name') ?></b></small> 
                     <?php else : ?>
                      <br>
                    <?php endif; ?>
                  
                  <?php
                  if($identity_column!=='email') {
                      echo '<p>';
                      echo lang('create_user_identity_label', 'identity');
                      echo '<br />';
                      echo form_error('identity');
                      echo form_input($identity);
                      echo '</p>';
                  }
                  ?>
                  <div class="input-group minimal">
                    <?php echo form_input($email);?>
                    <span class="input-group-addon"><i class="entypo-mail"></i></span>
                  </div>
                    <?php if( form_error('email') == true ) : ?>
                      <small class="form-text text-danger"><b><?= form_error('email') ?></b></small> 
                     <?php else : ?>
                      <br>
                    <?php endif; ?>
                  
                  <div class="input-group minimal">
                    <?php echo form_input($company);?>
                    <span class="input-group-addon"><i class="entypo-suitcase"></i></span>
                  </div>
                    <?php if( form_error('company') == true ) : ?>
                      <small class="form-text text-danger"><b><?= form_error('company') ?></b></small> 
                     <?php else : ?>
                      <br>
                    <?php endif; ?>

                  <div class="input-group minimal">
                    <?php echo form_input($phone);?>
                    <span class="input-group-addon"><i class="entypo-phone"></i></span>
                  </div>
                    <?php if( form_error('phone') == true ) : ?>
                      <small class="form-text text-danger"><b><?= form_error('phone') ?></b></small> 
                     <?php else : ?>
                      <br>
                    <?php endif; ?>

                  <div class="input-group minimal">
                     <?php echo form_input($password);?>
                    <span class="input-group-addon"><i class="entypo-lock"></i></span>
                  </div>
                    <?php if( form_error('password') == true ) : ?>
                      <small class="form-text text-danger"><b><?= form_error('password') ?></b></small> 
                     <?php else : ?>
                      <br>
                    <?php endif; ?>

                  <div class="input-group minimal">
                     <?php echo form_input($password_confirm);?>
                    <span class="input-group-addon"><i class="entypo-lock"></i></span>
                  </div>
                    <?php if( form_error('password_confirm') == true ) : ?>
                      <small class="form-text text-danger"><b><?= form_error('password_confirm') ?></b></small> 
                     <?php else : ?>
                      <br>
                    <?php endif; ?>
            </div>

            <div class="col-sm-offset-3 col-sm-5">
              <br>
              <button type="submit" name="submit" class="btn btn-default">Buat User</button>
              <?= anchor('admin/Auth', 'Batal', array('class'=>'btn btn-danger')) ?>
            </div>
       
          </div>
        
        <?php echo form_close();?>
        
      </div>
      
    </div>
