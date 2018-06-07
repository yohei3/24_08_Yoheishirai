<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>調理データ
    </title>
    <script src="http://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="http://jsgt.org/lib/jquery/plugin/csv2table/v002/js/jquery.csv2table-0.02-b-4.7.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<div id="view0"></div>
<script>
$(function(){
  $('#view0').csv2table('data/data.csv');
});
</script>
</body>
</html>
