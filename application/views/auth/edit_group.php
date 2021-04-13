<div class="row">
  <div class="col-md-12">
    
    <div class="panel panel-primary" data-collapsed="0">
    
      <div class="panel-heading">
        <div class="panel-title">
        <h1><?php echo lang('edit_group_heading');?></h1>
		<p><?php echo lang('edit_group_subheading');?></p>
        </div>
        
        <!-- <div class="panel-options">
            <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
            <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
            <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
            <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
        </div> -->
      </div>
      
      <div class="panel-body">
      <?php echo form_open(current_url(), array('form'=>'form', 'class'=>'form-horizontal form-groups-bordered'));?>          <div class="form-group">
          <div class="form-group">
            <label class="col-sm-3 control-label"></label>
              <div class="col-sm-5">
                <?php echo lang('edit_group_name_label', 'group_name');?> <br />
                <div class="input-group minimal">
					          <?php echo form_input($group_name);?>
                  <span class="input-group-addon"><i class="entypo-user"></i></span>
                </div>
                  <?php if( form_error('group_name') == true ) : ?>
                    <small class="form-text text-danger"><b><?= form_error('group_name') ?></b></small> 
                   <?php else : ?>
                    <br>
                  <?php endif; ?>
                
                 <?php echo lang('edit_group_desc_label', 'description');?> <br />
                 <div class="input-group minimal">
					          <?php echo form_input($description);?>
                  <span class="input-group-addon"><i class="entypo-info"></i></span>
                </div>
                  <?php if( form_error('description') == true ) : ?>
                    <small class="form-text text-danger"><b><?= form_error('description') ?></b></small> 
                   <?php else : ?>
                    <br>
                  <?php endif; ?>
              </div>

                <div class="col-sm-offset-3 col-sm-5">
                  <button type="submit" name="submit" class="btn btn-default">Buat User Level</button>
                  <?= anchor('admin/auth/read_group', 'Batal', array('class'=>'btn btn-danger')) ?>
                </div>
          </div>
        
        <?php echo form_close();?>
        
      </div>
      
    </div>
