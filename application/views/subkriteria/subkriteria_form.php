<script type="text/javascript">
$(document).ready(function () {
    $(".opsi input").removeAttr('required');
    $(".opsi select").removeAttr('required');
    $(".tipe").each(function(){
        $(this).change(function(){
            var did=$(this).attr('data-id');
            $(".opsi").attr('style','display:none');
            $(".opsi input").removeAttr('required');
            $(".opsi select").removeAttr('required');
            $("#div_"+did).show();
            $("#div_"+did+" input").attr('required','required');
        });
    });
    
});
</script>
<?php
if(empty($data))
{
    redirect('');
}

foreach($data as $row){ 
}

echo validation_errors();
echo form_open('subkriteria/update_action'.$kriteria,array('class'=>'form-horizontal'));
?>
<div style="padding-left:85px">
    <?php  
     if(!empty($utama))
     {               
         foreach($utama as $rutama)
         {
             if($rutama->id_kriteria==$row->id_kriteria)
             {
                 echo '<h3 style="margin-top:0px; margin-bottom:30px; " ><b>Edit Sub-Kriteria: '.$rutama->nama_kriteria.'</b></h3>';
             }
         }
     }
    ?>
</div>
<input type="hidden" name="subkriteria" value="<?=$row->id_subkriteria;?>"/>
<input type="hidden" name="id_nilai" value="<?=$row->id_nilai;?>"/>
<div class="form-group required">
    <label class="col-sm-2 control-label" for="">Kriteria Utama</label>
    <div class="col-md-8">
        <select name="id_kriteria" class="form-control" required="">         
            <option>Pilih Kriteria Utama</option>
            <?php
                if(!empty($utama))
                {               
                    foreach($utama as $rutama)
                    {
                        $jj='';                                             
                        if($rutama->id_kriteria==$row->id_kriteria)
                        {
                            $jj='selected="selected"';
                        }
                        echo '<option value="'.$rutama->id_kriteria.'" '.$jj.'>'.$rutama->nama_kriteria.'</option>';
                    }
                }
            ?>
        </select>
    </div>
</div>
<?php
$max=$row->nama_subkriteria;
?>
<div id="div_teks" class="opsi">
    <div class="form-group required">
        <label class="col-sm-2 control-label" for="">
        <?php 
           if(!empty($utama))
           {               
               foreach($utama as $rutama)
               {
                   if($rutama->id_kriteria==$row->id_kriteria)
                   {
                       echo $rutama->nama_kriteria;
                   }
               }
           }
        ?>
        </label>
        <div class="col-md-7">
            <input type="text" name="ket" id="" class="form-control " autocomplete="" placeholder="keterangan" required="" value="<?php echo set_value('ket',$max); ?>"/>
        </div>
    </div>  
</div>

<?php if($row->id_kriteria==1) { ?>
<div id="nilaikategori">
    <div class="form-group required">
        <label class="col-sm-2 control-label" for="">Nilai</label>
        <div class="col-md-6">
            <?php
            if(!empty($nilai))
            {
                foreach($nilai as $rnilai)
                {
                    if($rnilai->id_nilai==4) {
                        continue;
                    }
                        $ch='';
                        if($rnilai->id_nilai==$row->id_nilai)
                        {
                            $ch='checked="checked"';
                        }
                ?>
                <div class="radio">
                    <label>
                        <input type="radio" name="id_nilai" value="<?=$rnilai->id_nilai;?>" <?=$ch;?>/><?=$rnilai->nama_nilai;?>
                    </label>
                </div>
                <?php
                }
            }
            ?>
        </div>
    </div>
</div>
<?php } ?>

<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-md-6">
        <button type="submit" name="submit" class="btn btn-primary btn-flat">Edit</button>
        <a href="javascript:history.back(-1);" class="btn btn-default btn-flat">Batal</a>
    </div>
</div>
<?php
echo form_close();
?>
<script type="text/javascript">
$(document).ready(function () {
    $("#radio-<?=$row->tipe;?>").trigger('change');
});
</script>