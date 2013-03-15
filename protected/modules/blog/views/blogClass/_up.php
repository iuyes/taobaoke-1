 <?php
 /* @var $this BlessController */
 /* @var $model Bless */
 /* @var $form CActiveForm */
 ?>
 
 <div class="form">
 
 <?php $form=$this->beginWidget('CActiveForm', array(
     'enableAjaxValidation'=>false,
 )); ?>
 
     <p class="note">Fields with <span class="required">*</span> are required.</p>
     
     <?php echo $form->errorSummary($model); ?>
     
     <div class="row">
         <?php echo $form->labelEx($model,'Cid'); ?>
         <?php echo $form->textField($model,'Cid',array('rows'=>6, 'cols'=>50)); ?>
         <?php echo $form->error($model,'Cid'); ?>
     </div>
     <div class="row">
         <?php echo $form->labelEx($model,'Fid'); ?>
         <?php echo $form->textField($model,'Fid',array('size'=>60,'maxlength'=>255)); ?>
         <?php echo $form->error($model,'Fid'); ?>
     </div>

     <div class="row">
         <?php echo $form->labelEx($model,'ClassName'); ?>
         <?php echo $form->textField($model,'ClassName',array('rows'=>6, 'cols'=>50)); ?>
         <?php echo $form->error($model,'ClassName'); ?>
     </div>

     
     <div class="row buttons">
         <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
     </div>
 
 <?php $this->endWidget(); ?>
 
 </div><!-- form -->
