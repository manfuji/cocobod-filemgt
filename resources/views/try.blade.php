<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">

    <title>Document</title>
</head>
<body>
    <table id="data-table"></table>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
    <script>
        let data = [
    {
        "prop1": "value1",
        "prop2": "value2",
        "prop3": "value3"
    },
    {
        "prop1": "value4",
        "prop2": "value5",
        "prop3": "value6"
    }
];
        const myTable = document.querySelector("#data-table");
        const dataTable = new simpleDatatables.DataTable(myTable, {
            heading:Object.keys(data[0]),
            searchable: false,
            fixedHeight: true,
            
        })
    </script>
</body>
</html>