<?php echo langbar(); ?>
<p><?php echo lang('about.gender')?></p>

<p><?php echo lanchor('about/test', lang('about.click')); ?></p>

<p><?php echo anchor(lchange('en'), 'In English'); ?></p>
<p><?php echo anchor(lchange('id'), 'Dalam Bahasa'); ?></p>


<p><?php echo $this->lang->mci_current(); ?></p>
