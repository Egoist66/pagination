

<h2>Users</h2>

<pre>
    <?php if (!count($users)): ?>
        <p>No users</p>

    <?php else: ?>
            

        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Lastname</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($users as $user): ?>
            
                    <tr>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['name'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['lastname'] ?></td>
                    </tr>
            
                <?php endforeach ?> 
            </tbody>
        </table>
              
    <?php endif ?>

    
</pre>

<div style="display: flex; gap: 10px">
    <a href="?page=<?= $page == 1 ? 1 : $page - 1 ?>"><<</a>              
    <?php for ($i = 0; $i <= ceil($entityCount['count'] / 2); $i++): ?>

        <?php if ($i === 0): continue; endif; ?>
        
        <?php if ($i == $page): ?>

            <p>
                <a class="active" href="?page=<?= $i ?>"><?= $i ?></a>
            </p>

        <?php else: ?>

            <p>
                <a href="?page=<?= $i ?>"><?= $i ?></a>
            </p>

        <?php endif ?>

    <?php endfor ?>

    <a href="?page=<?= $page == ceil($entityCount['count'] / 2) ? ceil($entityCount['count'] / 2) : $page + 1 ?>">>></a>
    
</div>