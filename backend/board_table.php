<table class="table table-custom-primary table-striped mt-3">
<thead>
    <tr class="table-custom-primary">
        <th class="table-custom-primary" width="150" align="center">번호</th>
        <th class="table-custom-primary" width="500" align="center">제목</th>
        <th class="table-custom-primary" width="200" align="center">작성자</th>
        <th class="table-custom-primary" width="250" align="center">날짜</th>
        <th class="table-custom-primary" width="150" align="center">조회수</th>
    </tr>
</thead>
<tbody>
    <?php
    $query = "SELECT * FROM board ORDER BY number DESC";
    $result = mysqli_query($connect, $query);
    $total_rows = mysqli_num_rows($result);
    $row_number = $total_rows;
    $is_even_row = true;
    while($rows = mysqli_fetch_array($result)){
        $row_class = $is_even_row ? 'table-custom-light' : 'table-custom-primary';
    ?>    
    <tr class="<?php echo $row_class; ?>">
        <td class="<?php echo $row_class; ?>" align="center"><?=$row_number?></td>
        <td class="<?php echo $row_class; ?>" align="center"><a href="view.php?number=<?=$rows['number']?>"><?=$rows['title']?></a></td>
        <td class="<?php echo $row_class; ?>" align="center"><?=$rows['id']?></td>
        <td class="<?php echo $row_class; ?>" align="center"><?=substr($rows['date'], 0, 10)?></td>
        <td class="<?php echo $row_class; ?>" align="center"><?=$rows['hit']?></td> 
    </tr>
    <?php
        $is_even_row = !$is_even_row;
        $row_number--;
    }
    ?>
</tbody>
</table>