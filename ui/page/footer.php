
    <div>

        <?php 
            $url = $_SERVER['PHP_SELF'];
        
            $parts = explode('/', $url);
        
            $scriptName = $parts[count($parts)-1];
        
        ?>
        
        <?php if($scriptName != 'index.php') : ?>
            <a href="index.php">Vissza</a>
        <?php endif; ?>

    </div>
    </body>
</html>