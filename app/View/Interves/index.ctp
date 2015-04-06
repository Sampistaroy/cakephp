<!-- File: /app/View/Posts/index.ctp -->

<div class="col-xs-12 col-sm-9">
    <p class="pull-right visible-xs">
        <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
    </p>
    <div class="jumbotron">
        <h1>edit princ interf</h1>
        <hr>
    </div>

<h1>Blog posts</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>action</th>
        <th>user_id</th>
    </tr>

    <!-- Here is where we loop through our $interfs array, printing out post info -->

    <?php foreach ($interves as $interf): ?>
    <tr>
        <td><?php echo $interf['Interf']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($interf['Interf']['interf_name'],
            array('controller' => 'Interves', 'action' => 'view', $interf['Interf']['id'])); ?>
        </td>
        <td>
            <?php echo $this->Form->postLink(
                'Supprimer',
                array('action' => 'delete', $interf['Interf']['id']),
                array('confirm' => 'Etes-vous sûr ?'));
            ?>
            <?php echo $this->Html->link(
                'Editer',
                array('action' => 'edit', $interf['Interf']['id'])
            ); ?>
        </td>
        <td><?php echo $interf['Interf']['user_id']; ?></td>
        <td><?php echo $this->Html->link('Editer',array('controller' =>'', 'action' => 'edit', $interf['Interf']['id'])
            ); ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($interf); ?>
</table>

<hr>
<pre><?php var_dump(get_defined_vars()); ?></pre>
</div><!--/col-->
<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar"><div class="list-group">
    <?php echo $this->Html->link(
        '+ Post',
        array('controller' => '', 'action' => 'add'),
        array('class' => 'btn btn-primary add_ligne' )
    ); ?></div>    
    <div class="list-group">
        <button class="btn btn-primary add_ligne">+ ligne</button>
    </div>          
</div><!--/.sidebar-offcanvas-->
</div><!--/row-->
<hr>