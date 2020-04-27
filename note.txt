
<head>
 
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function(){
$('#example').DataTable();
});
</script>
</head>
<body>
<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($survey as $surveys):?>
            <tr>
                <td><?php echo($surveys->name);?></td>
                <td><?php echo($surveys->description);?></td>
                <td>
                        <a href = 'update/{{ $surveys->id }}'>Edit</a>
                        <a href = 'destroy/{{ $surveys->id }}' onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Description</th> 
            </tr>
        </tfoot>
    </table>
</body>
