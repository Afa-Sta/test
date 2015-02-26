<!doctype html>
<html>
    <header>
        <link href="css/main.css" type="text/css" rel="stylesheet">
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    </header>
    <body>
        <div class="form">
            <form action="/" method="get">
                <input type="text" size="71" name="name_file" value="<?php echo $folder_open;?>" placeholder="file name">
                <input type="submit"  value="open">
            </form>
        </div>

        <div class="table">
            <table>
            <tr class="table_title">
                <td width="65%">
                    
                    <form action="" method="post">
                        <p>Name
                        <input type="image" src="/img/top_1.png" width="10px" name="sort" value="name">
                        <input type="image" src="/img/bottom_1.png" width="10px" name="sort" value="">
                        </p>
                    </form>
                </td>
                <td width="100px">
                    <form action="" method="post">
                    <p>Type
                    <input type="image" src="/img/top_1.png" width="10px" name="sort" value="type">
                    <input type="image" src="/img/bottom_1.png" width="10px" name="sort" value="">
                    </p>
                    </form>
                </td>
                <td width="15%">
                    <form action="" method="post">
                    <p>Size
                    <input type="image" src="/img/top_1.png" width="10px" name="sort" value="size">
                    <input type="image" src="/img/bottom_1.png" width="10px" name="sort" value="">
                    </p>
                    </form>
                </td>
            </tr>
        <?php foreach ($result as $k => $v){?>
            <tr class="data">
                <td><?php echo $v['name'];?></td>
                <td><?php echo $v['type'];?></td>
                <td><?php echo $v['size'];?></td>
            </tr>
        <?php }?>
        </table>
        </div>
        
    </body>
</html>

