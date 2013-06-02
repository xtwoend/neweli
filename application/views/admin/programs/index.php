<?php
        $menus = $programs;

        $hash = array();
        foreach($menus as $object)
        {
            $hash[$object->id] = array('object' => $object);
        }
        

        $tree = array();
        foreach($hash as $id => &$node)
        {
            if($parent = $node['object']->parent){
                $hash[$parent]['children'][] =& $node;
            }else{
                $tree[] =& $node;
            }
        }
        unset($node, $hash);

        function render_tree($tree)
        {
            echo '<tbody>';
            $no = 1;
            foreach($tree as $node)
            {   
                render_node($node,0, $no++ );
            }
            echo '</tbody>';
        }

        // render tree node
        function render_node($node, $level = 0, $no = 1)
        {   
            
            $inset = str_repeat('--', $level);
            
           // echo '<tr><td>'.$inset.$node['object']->program.'</td></tr>';

            echo '<tr>';
            echo '<td>'.$inset.$node['object']->program.'</td>';
            //echo '<td>'.$node['object']->parent.'</td>';
            echo '<td>'.$node['object']->price.'</td>';
            echo '<td>'.anchor('admin/programs/edit/'.$node['object']->id,'Edit','class="btn btn-mini btn-primary"');
            echo anchor('admin/programs/remove/'.$node['object']->id,'Delete',array('class' => "btn btn-mini btn-warning", 'onclick' => "return confirm('yakin data mau dihapus??')"));
            echo '</td>';
            echo '</tr>';
    

            if (isset($node['children']))
            {
                
                foreach($node['children'] as $node)
                {
                    render_node($node, $level+1);
                }
                
            }
            
        }
?>


<div class="header">
            
            <h1 class="page-title">List Programs</h1>
</div>
        
<ul class="breadcrumb">
    <li><a href="<?php echo site_url('admin/dashboard'); ?>">Home</a> <span class="divider">/</span></li>
    <li class="active">Programs</li>
</ul>


        <div class="container-fluid">
            <div class="row-fluid">
                    

<div class="row-fluid">

<?php if($this->session->flashdata('message')){ ?>
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <?php echo $this->session->flashdata('message') ?>
</div>
<?php } ?>   
     <?php echo anchor('admin/programs/add','Add Program','class="btn btn-primary"')?>
    <div class="block">  
    <a href="#page-stats" class="block-heading" data-toggle="collapse">Programs</a> 
        <div id="page-stats" class="block-body collapse in">
            <table class="table table-striped">
                    <thead>
                        <tr>
                           <!-- <th>Lang</th> -->
                            <th>Program</th>
                            <!--<th>Parent</th> -->     
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <?php echo render_tree($tree) ?>
                </table>            
        </div>
    </div>
</div>
                
   



                    
                    <?php echo $template['partials']['footer']; ?>
                    
            </div>
        </div>
    </div>