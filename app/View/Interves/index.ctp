<!-- File: /app/View/Posts/index.ctp -->

<?php echo $this->element('menu_interf'); ?>
<div class="col-xs-12 col-sm-9">
    <p class="pull-right visible-xs">
        <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
    </p>
    <div class="jumbotron">
        <h1>Vos interfaces</h1>
        <hr>
    </div>

<h3 class="panel-heading">Liste d'interfaces :</h3>
<table class="table">
    <tr>
        <th>Id</th>
        <th>Interface nom</th>
        <th>action</th>
        <th>user_id</th>
        <th>principal</th>
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
        <td><?php
            if($interf['Interf']['id']!=AuthComponent::user('interf_id')):
                echo $this->Html->link(
                    'mettre principal',
                    array('controller' =>'interves', 'action' => 'setprinc', $interf['Interf']['id'])
                );
            else:
                echo '<span class="glyphicon glyphicon-star" aria-hidden="true"></span>';
            endif;
             ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($interf); ?>
</table>

<h3 class="panel-heading">Liste d'unités :</h3>
<table class="table">
    <tr>
        <th>Id</th>
        <th>Interface nom</th>
        <th>action</th>
        <th>user_id</th>
        <th>principal</th>
    </tr>

    <!-- Here is where we loop through our $interfs array, printing out post info -->
    <?php foreach ($units as $interf): ?>
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
        <td><?php
            if($interf['Interf']['id']!=AuthComponent::user('interf_id')):
                echo $this->Html->link(
                    'mettre principal',
                    array('controller' =>'interves', 'action' => 'setprinc', $interf['Interf']['id'])
                );
            else:
                echo '<span class="glyphicon glyphicon-star" aria-hidden="true"></span>';
            endif;
             ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($interf); ?>
</table>


<h3 class="panel-heading">Liste de zone de control :</h3>
<table class="table">
    <tr>
        <th>Id</th>
        <th>Interface nom</th>
        <th>action</th>
        <th>user_id</th>
        <th>principal</th>
    </tr>

    <!-- Here is where we loop through our $interfs array, printing out post info -->
    <?php foreach ($zone_controls as $interf): ?>
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
        <td><?php
            if($interf['Interf']['id']!=AuthComponent::user('interf_id')):
                echo $this->Html->link(
                    'mettre principal',
                    array('controller' =>'interves', 'action' => 'setprinc', $interf['Interf']['id'])
                );
            else:
                echo '<span class="glyphicon glyphicon-star" aria-hidden="true"></span>';
            endif;
             ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($interf); ?>
</table>

<hr>
</div><!--/col-->
<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
    <div class="list-group">
        <?php echo $this->Html->link(
            'Ajouter une interface',
            array('controller' => 'interves', 'action' => 'add'),
            array('class' => 'btn btn-primary add_ligne' )
        ); ?>
    </div>    
</div><!--/.sidebar-offcanvas-->
</div><!--/row-->
<hr>