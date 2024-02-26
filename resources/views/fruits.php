<p>Here are all the fruits: </p>
<ul>
    <?php foreach ($fruits as $fruit) { ?>
        <li><?php echo $fruit->name ?> costs <?php echo $fruit->price ?> $</li>
    <?php }?>
</ul>
