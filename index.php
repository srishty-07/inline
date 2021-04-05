<?php
include 'db.inc.php';

$sql="SELECT * FROM employee";
$query=$db->prepare($sql);
$query->execute();

// "UPDATE employee SET $column=:value WHERE id=:id LIMIT 1"

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function activate(element){
        $(element).attr('class','activate');
    }
    function updateValue(element,column,id){
        var value1=element.innerText;
        // console.log(value+column+id);

        $.ajax({
            url:'backend.php',
            type:'post',
            data:{
                value:value1,
                column:column,
                id:id,
            },
            success:function(php_result){
                console.log(php_result);
                $(element).removeAttr('class')
            }
        })
    }
</script>
<style>
    table{border-collapse:collapse;}
    td,th{padding:5px;width:200px;outline:none;border:1px solid black;}
    div{outline:none;}
    th{background:purple;color:white;}
    .activate{
        background: white;
        border:1px solid gray;
        padding:3px;
    }
    
</style>
<table>
    <th>First name</th>
    <th>Last name</th>
    <th>Salary</th>
    <?php

    while($row = $query->fetch()){
        $id=md5($row['id']);
        $f=$row['first_name'];
        $l=$row['last_name'];
        $s=$row['salary'];
    }
    ?>
    <tr>
        <td>
        <div contenteditable="true" onBlur="updateValue(this,'first_name','<?php echo $id;?>') " onClick="activate(this)"><?php echo $f; ?></div>
        </td>
        <td>
        <div contenteditable="true" onBlur="updateValue(this,'last_name','<?php echo $id;?>') " onClick="activate(this)"><?php echo $l; ?></div>
        </td>
        <td>
        <div contenteditable="true" onBlur="updateValue(this,'salary','<?php echo $id;?>') " onClick="activate(this)"><?php echo $s; ?></div>
        </td>
        
    </tr>

    <?php

    ?>
</table>

