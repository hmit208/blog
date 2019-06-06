<!-- File: /app/View/Posts/index.ctp -->
<?php var_dump($this->Session->current_user)
//?>
<h1>Blog posts</h1>
<?php echo $this->Html->link(
    'Add Post',
    array('controller' => 'posts', 'action' => 'add')
); ?>
<table>
    <?php
    echo $this->Paginator->prev('« Previous ', null, null, array('class' => 'disabled')); //Hiện thj nút Previous
    echo " | ".$this->Paginator->numbers()." | "; //Hiển thi các số phân trang
    echo $this->Paginator->next(' Next »', null, null, array('class' => 'disabled')); //Hiển thị nút next
    echo " Page ".$this->Paginator->counter(); // Hiển thị tổng trang
    ?>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Action</th>
        <th>Content</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($posts as $post): ?>
        <tr>
            <td><?php echo $post['Post']['id']; ?></td>
            <td>
                <?php echo $this->Html->link($post['Post']['title'],
                    array('action' => 'view', $post['Post']['id'])); ?>
            </td>
            <td>
                <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $post['Post']['id']),
                    array('confirm' => 'Are you sure?')
                );
                ?>
                <?php
                echo $this->Html->link(
                    'Edit',
                    array('action' => 'edit', $post['Post']['id'])
                );
                ?>
            </td>
            <td><?php echo $post['Post']['content']; ?></td>
        </tr>
    <?php endforeach; ?>
    <?php unset($post); ?>
</table>