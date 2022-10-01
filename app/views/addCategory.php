<?php
require __DIR__ . "./home/header.php"
?>
<form autocomplete="off" action="http://localhost/mvc/public/Home/insertCategory" method="POST">
    <?php

    echo '123';
    if (isset($data['msg'])) {
        echo '<span style="color:red,font-weight:bold;">' . $data['msg'] . '</span>';
    }
    ?>
    <table>
        <tr>
            <td>Title</td>
            <td>

                <input type=" text" required="1" name="title">
            </td>
        </tr>
        <tr>
            <td>Description</td>
            <td>
                <input type="text" required="1" name="description">

            </td>

        </tr>

        <tr>
            <td>

                <input type="submit" name="addcategory" value="Insert">
            </td>
        </tr>
    </table>

</form>

<?php
require __DIR__ . "./home/footer.php"
?>