

<h2>Users</h2>

<pre>
    <?php print_r($users) ?>
</pre>

<div style="display: flex; gap: 10px">
    <?php for ($i = 0; $i <= round(count($pages) / 3); $i++): ?>

        <?php if($i === 0): continue; endif; ?>

        <p>
            <a href="?page=<?= $i ?>"><?= $i ?></a>
        </p>

    <?php endfor ?>
</div>