    <div class="filters">
        <h3>Filters</h3>
        <?php
        // The base url is the url where we'll pass the filter parameters
        $base_url = array('controller' => 'countries', 'action' => 'filter');
        echo $this->Form->create("Filter",array('url' => $base_url, 'class' => 'filter'));
        // Add a basic search 
        echo $this->Form->input("search", array('label' => 'Search', 'placeholder' => "Search..."));

        echo $this->Form->submit("Search");

        // To reset all the filters we only need to redirect to the base_url
        echo "<div class='submit actions'>";
        //echo $this->Html->link("Reset",$base_url);
        echo "</div>";
        echo $this->Form->end();
        ?>
    </div>

<table>
            <tr>
                <th><?php echo $this->Paginator->sort('id', 'ID'); ?></th>
                <th><?php echo $this->Paginator->sort('name', 'Name'); ?></th>
            </tr>
               <?php foreach($countries as $country): ?>
            <tr>
                <td><?php echo $country['Country']['id']; ?> </td>
                <td><?php echo $country['Country']['name']; ?> </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <?php echo $this->Paginator->prev('« Previous', null, null, array('class' => 'disabled')); ?>
    <?php echo $this->Paginator->numbers(); ?>             
    <?php echo $this->Paginator->next('Next »', null, null, array('class' => 'disabled')); ?>    
    <?php echo $this->Paginator->counter(); ?>