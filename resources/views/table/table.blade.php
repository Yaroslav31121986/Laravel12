<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<table class="table-bordered">
    <thead>
    <tr>
        <th scope="col">D1</th>
        @foreach($columns as $column)
            <th scope="col">{{ $column }}</th>
        @endforeach
    </tr>
    </thead>
    <tbody>
    @foreach($rows as $row)
        <tr>
        <th scope="row">{{ $row }}</th>
            @foreach($columns as $column2)
                <td data-column="{{ $column2 }}" data-row="{{ $row }}"></td>
            @endforeach
        </tr>
    @endforeach
    </tbody>
</table>
<script src="js/jQuery.js"></script>
<script src="js/table/table.js"></script>
</body>
</html>
