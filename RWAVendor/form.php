<?php 
include('model/class.expert2.php');
$ModelCall->where("status",1);
$ModelCall->where("client_id", $getClientInfo[0]['id']);
$ModelCall->where("document_tilte",'FORM');
$ModelCall->orderBy("id","desc");
$getNoticeInfo = $ModelCall->get("tbl_document_directory");
$ModelCall->where("ads_banner_size ='728X90'");
$ModelCall->where("ads_banner_position ='Top'");
$ModelCall->where("status",1);
$ModelCall->orderBy("RAND()");
$getBannerShow = $ModelCall->get("tbl_ads_management_directory");

$indexvalues = $ModelCall->get("tbl_ads_index");
$ModelCall->where("ads_banner_size ='728X90'");
$ModelCall->where("ads_banner_position ='Bottom'");
$ModelCall->where("status",1);
$ModelCall->orderBy("RAND()");
$getBannerShow1 = $ModelCall->get("tbl_ads_management_directory");
$ModelCall->where("status",1);
$getAdvertise = $ModelCall->get("tbl_adervitiser_module");
$i=0;
foreach($getAdvertise as $arrays){
if($arrays['image']!=""){
$images[$i]="https://www.nirvanacountry.co.in/RWAVendor/ads_managements/photos/".$arrays['image'];
if($arrays['contact']!=''){
$url[$i]="tel:".$arrays['contact'];
}
else{
$url[$i]="https://".$arrays['url'];
}


$i++;
}
}
$ModelCall->where("client_id", $getAdminInfo[0]['id']);
$ModelCall->orderBy("id","desc");
$getEventInfo = $ModelCall->get("tbl_team");
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <style>
    #dataTable tfoot {
  display: table-header-group;
}

mark {
  background: orange;
  color: #000;
}



.dataTables_wrapper .dataTables_paginate .paginate_button {
	padding: 0;
	margin-left: -2px;
}
.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
	background: none;
	border-color: transparent;
}


table.dataTable thead th {
	background-image: none !important;
}


table.dataTable thead th::after {
	font-family: "FontAwesome";
	display: inline-block;
	margin-left: 10px;
	opacity: 0.75;
}
table.dataTable thead th.sorting::after {
	content: "\f0dc";
}
table.dataTable thead th.sorting_asc::after {
	content: "\f0de";
}
table.dataTable thead th.sorting_desc::after {
	content: "\f0dd";
}
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 13px;
}
.dataTables_wrapper .dataTables_paginate .paginate_button {
    padding: 6px 11px;
    margin-left: -2px;
}
.dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
    color: #fff !important;
    border: 1px solid #37a000;
    background-color: #37a000;
    /* background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #fff), color-stop(100%, #dcdcdc)); */
    /* background: -webkit-linear-gradient(top, #fff 0%, #dcdcdc 100%); */
    background: -moz-linear-gradient(top, #37a000 0%, #37a000 100%);
    background: -ms-linear-gradient(top, #37a000 0%, #37a000 100%);
    background: -o-linear-gradient(top, #37a000 0%, #37a000 100%);
    background: linear-gradient(to bottom, #37a000 0%, #37a000 100%);
}
.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
    color: #37a000 !important;
}
.bg-primary {
    color: #fff;
    background-color: #37a000 !important;
    border: 1px solid #000 !important;
}
table#dataTable{
  border: 1px solid #ddd;
}
input[type="search"] {
    border: none;
    border-bottom: 1px solid #969595;
    outline: none;
}
table#dataTable {
    max-width: 800px !important;
    border: 1px solid #717171 !important;
    border-radius: 5px;
    overflow: hidden;
}
.dataTables_wrapper{
  width: 810px;
  margin: 0 auto;
}
table.dataTable {
    border-collapse: inherit;
}
table>thead>tr>th {
    vertical-align: bottom;
    border-bottom: 1px solid #717171 !important ;
}


    </style>
</head>
<body>
    
<!-- Begin Content		-->
<div class="container">
    <h1 class="tile-page-h2 text-center">Table example</h1>
    
    <hr/>
    <table class="table table-striped table-hover dt-responsive" id="dataTable">
      <caption class="sr-only">Table example</caption>
      
      <thead class="bg-primary">
        <tr>
            <th class="first" scope="col"><span class="fa fa-download" aria-hidden="true">&#160;</span></th>
          <th class="second" scope="col">Date</th>
          <th class="third" scope="col">Name</th>
          <th class="fourth" scope="col">Description</th>
        </tr>
      </thead>
      <tfoot class="hidden">
        <tr>
            <th scope="col"><span class="fa fa-download" aria-hidden="true">&#160;</span></th>
          <th scope="col">Date</th>
          <th scope="col">Name</th>
          <th scope="col">Description</th>
        </tr>
      </tfoot>
      <tbody>
        <tr>
          <td><a type="button" data-toggle="modal" data-target="#modal"> <span class="fa fa-download" aria-hidden="true">&#160;</span></a></td>
          <td>12 Jan 19</td>
          <td>Category12</td>
          <td>A Modal popup is when you click.</td>
        </tr>
        <tr>
          <td><a type="button" data-toggle="modal" data-target="#modal"> <span class="fa fa-download" aria-hidden="true">&#160;</span></a></td>
          <td>13 Jan 19</td>
          <td>Category 2</td>
          <td>A number popup is when you click.</td>
        </tr>
        <tr>
            <td><a type="button" data-toggle="modal" data-target="#modal"> <span class="fa fa-download" aria-hidden="true">&#160;</span></a></td>
            <td>14 Jan 19</td>
            <td>Category 3</td>
            <td>A number is even when you click.</td>
        </tr>
        <tr>
            <td><a type="button" data-toggle="modal" data-target="#modal"> <span class="fa fa-download" aria-hidden="true">&#160;</span></a></td>
            <td>15 Jan 19</td>
            <td>Category 4</td>
            <td>Hello There even when you click.</td>
        </tr>
        <tr>
            <td><a type="button" data-toggle="modal" data-target="#modal"> <span class="fa fa-download" aria-hidden="true">&#160;</span></a></td>
            <td>16 Jan 19</td>
            <td>Category 5</td>
            <td>This is testing of table.</td>
        </tr>
        <tr>
            <td><a type="button" data-toggle="modal" data-target="#modal"> <span class="fa fa-download" aria-hidden="true">&#160;</span></a></td>
            <td>17 Jan 19</td>
            <td>Category 6</td>
            <td>This is testing of this table.</td>
        </tr>
        <tr>
            <td><a type="button" data-toggle="modal" data-target="#modal"> <span class="fa fa-download" aria-hidden="true">&#160;</span></a></td>
            <td>18 Jan 19</td>
            <td>Category 7</td>
            <td>Lorem Ipsum is simply dummy text.</td>
        </tr>
        <tr>
            <td><a type="button" data-toggle="modal" data-target="#modal"> <span class="fa fa-download" aria-hidden="true">&#160;</span></a></td>
            <td>19 Jan 19</td>
            <td>Category 8</td>
            <td>Lorem Ipsum is simply dummy text.</td>
        </tr>
        <tr>
          <td><a type="button" data-toggle="modal" data-target="#modal"> <span class="fa fa-download" aria-hidden="true">&#160;</span></a></td>
          <td>Alaska</td>
          <td>Accounting</td>
          <td>Lorem Ipsum is simply dummy text.</td>
        </tr>
        <tr>
          <td><a type="button" data-toggle="modal" data-target="#modal"> <span class="fa fa-download" aria-hidden="true">&#160;</span></a></td>
          <td>Alaska</td>
          <td>Law</td>
          <td>Lorem Ipsum is simply dummy text.</td>
        </tr>
        <tr>
          <td><a type="button" data-toggle="modal" data-target="#modal"> <span class="fa fa-download" aria-hidden="true">&#160;</span></a></td>
          <td>Alaska</td>
          <td>Medicine</td>
          <td>Lorem Ipsum is simply dummy text.</td>
        </tr>
        <tr>
          <td><a type="button" data-toggle="modal" data-target="#modal"> <span class="fa fa-download" aria-hidden="true">&#160;</span></a></td>
          <td>Alaska</td>
          <td>Nursing</td>
          <td>Lorem Ipsum is simply dummy text.</td>
        </tr>
        <tr>
          <td><a type="button" data-toggle="modal" data-target="#modal"> <span class="fa fa-download" aria-hidden="true">&#160;</span></a></td>
          <td>Alaska</td>
          <td>Physical Therapy</td>
          <td>Lorem Ipsum is simply dummy text.</td>
        </tr>
        <tr>
          <td><a type="button" data-toggle="modal" data-target="#modal"> <span class="fa fa-download" aria-hidden="true">&#160;</span></a></td>
          <td>Alaska</td>
          <td>Physician Assisting</td>
          <td>Lorem Ipsum is simply dummy text.</td>
        </tr>
        <tr>
          <td><a type="button" data-toggle="modal" data-target="#modal"> <span class="fa fa-download" aria-hidden="true">&#160;</span></a></td>
          <td>Alaska</td>
          <td>Psychology</td>
          <td>Lorem Ipsum is simply dummy text.</td>
        </tr>
        <tr>
          <td><a type="button" data-toggle="modal" data-target="#modal"> <span class="fa fa-download" aria-hidden="true">&#160;</span></a></td>
          <td>Arizona</td>
          <td>Accounting</td>
          <td>Lorem Ipsum is simply dummy text.</td>
        </tr>
        <tr>
          <td><a type="button" data-toggle="modal" data-target="#modal"> <span class="fa fa-download" aria-hidden="true">&#160;</span></a></td>
          <td>Arizona</td>
          <td>Law</td>
          <td>Lorem Ipsum is simply dummy text.</td>
        </tr>
        <tr>
          <td><a type="button" data-toggle="modal" data-target="#modal"> <span class="fa fa-download" aria-hidden="true">&#160;</span></a></td>
          <td>Arizona</td>
          <td>Medicine</td>
          <td>Lorem Ipsum is simply dummy text.</td>
        </tr>
        <tr>
          <td><a type="button" data-toggle="modal" data-target="#modal"> <span class="fa fa-download" aria-hidden="true">&#160;</span></a></td>
          <td>Arizona</td>
          <td>Nursing</td>
          <td>Lorem Ipsum is simply dummy text.</td>
        </tr>
        <tr>
          <td><a type="button" data-toggle="modal" data-target="#modal"> <span class="fa fa-download" aria-hidden="true">&#160;</span></a></td>
          <td>Arizona</td>
          <td>Physical Therapy</td>
          <td>Lorem Ipsum is simply dummy text.</td>
        </tr>
        <tr>
          <td><a type="button" data-toggle="modal" data-target="#modal"> <span class="fa fa-download" aria-hidden="true">&#160;</span></a></td>
          <td>Arizona</td>
          <td>Physician Assisting</td>
          <td>Lorem Ipsum is simply dummy text.</td>
        </tr>
        <tr>
          <td><a type="button" data-toggle="modal" data-target="#modal"> <span class="fa fa-download" aria-hidden="true">&#160;</span></a></td>
          <td>Arizona</td>
          <td>Psychology</td>
          <td>Lorem Ipsum is simply dummy text.</td>
        </tr>
        <tr>
          <td><a type="button" data-toggle="modal" data-target="#modal"> <span class="fa fa-download" aria-hidden="true">&#160;</span></a></td>
          <td>Arkansas</td>
          <td>Accounting</td>
          <td>Lorem Ipsum is simply dummy text.</td>
        </tr>
        <tr>
          <td><a type="button" data-toggle="modal" data-target="#modal"> <span class="fa fa-download" aria-hidden="true">&#160;</span></a></td>
          <td>Arkansas</td>
          <td>Law</td>
          <td>Lorem Ipsum is simply dummy text.</td>
        </tr>
        <tr>
          <td><a type="button" data-toggle="modal" data-target="#modal"> <span class="fa fa-download" aria-hidden="true">&#160;</span></a></td>
          <td>Arkansas</td>
          <td>Medicine</td>
          <td>Lorem Ipsum is simply dummy text.</td>
        </tr>
        <tr>
          <td><a type="button" data-toggle="modal" data-target="#modal"> <span class="fa fa-download" aria-hidden="true">&#160;</span></a></td>
          <td>Arkansas</td>
          <td>Nursing</td>
          <td>Lorem Ipsum is simply dummy text.</td>
        </tr>
        <tr>
          <td><a type="button" data-toggle="modal" data-target="#modal"> <span class="fa fa-download" aria-hidden="true">&#160;</span></a></td>
          <td>Arkansas</td>
          <td>Physical Therapy</td>
          <td>Lorem Ipsum is simply dummy text.</td>
        </tr>
        <tr>
          <td><a type="button" data-toggle="modal" data-target="#modal"> <span class="fa fa-download" aria-hidden="true">&#160;</span></a></td>
          <td>Arkansas</td>
          <td>Physician Assisting</td>
          <td>Lorem Ipsum is simply dummy text.</td>
        </tr>
        <tr>
          <td><a type="button" data-toggle="modal" data-target="#modal"> <span class="fa fa-download" aria-hidden="true">&#160;</span></a></td>
          <td>Arkansas</td>
          <td>Psychology</td>
          <td>Lorem Ipsum is simply dummy text.</td>
        </tr>
        <tr>
          <td><a type="button" data-toggle="modal" data-target="#modal"> <span class="fa fa-download" aria-hidden="true">&#160;</span></a></td>
          <td>California</td>
          <td>Accounting</td>
          <td>Lorem Ipsum is simply dummy text.</td>
        </tr>
        <tr>
          <td><a type="button" data-toggle="modal" data-target="#modal"> <span class="fa fa-download" aria-hidden="true">&#160;</span></a></td>
          <td>California</td>
          <td>Law</td>
          <td>Lorem Ipsum is simply dummy text.</td>
        </tr>
        <tr>
          <td><a type="button" data-toggle="modal" data-target="#modal"> <span class="fa fa-download" aria-hidden="true">&#160;</span></a></td>
          <td>California</td>
          <td>Medicine</td>
          <td>Lorem Ipsum is simply dummy text.</td>
        </tr>
        <tr>
          <td><a type="button" data-toggle="modal" data-target="#modal"> <span class="fa fa-download" aria-hidden="true">&#160;</span></a></td>
          <td>California</td>
          <td>Nursing</td>
          <td>Lorem Ipsum is simply dummy text.</td>
        </tr>
        <tr>
          <td><a type="button" data-toggle="modal" data-target="#modal"> <span class="fa fa-download" aria-hidden="true">&#160;</span></a></td>
          <td>California</td>
          <td>Physical Therapy</td>
          <td>Lorem Ipsum is simply dummy text.</td>
        </tr>
        <tr>
          <td><a type="button" data-toggle="modal" data-target="#modal"> <span class="fa fa-download" aria-hidden="true">&#160;</span></a></td>
          <td>California</td>
          <td>Physician Assisting</td>
          <td>Lorem Ipsum is simply dummy text.</td>
        </tr>
        <tr>
          <td><a type="button" data-toggle="modal" data-target="#modal"> <span class="fa fa-download" aria-hidden="true">&#160;</span></a></td>
          <td>California</td>
          <td>Psychology</td>
          <td>Lorem Ipsum is simply dummy text.</td>
        </tr>
        <tr>
          <td><a type="button" data-toggle="modal" data-target="#modal"> <span class="fa fa-download" aria-hidden="true">&#160;</span></a></td>
          <td>Colorado</td>
          <td>Accounting</td>
          <td>Lorem Ipsum is simply dummy text.</td>
        </tr>
        <tr>
          <td><a type="button" data-toggle="modal" data-target="#modal"> <span class="fa fa-download" aria-hidden="true">&#160;</span></a></td>
          <td>Colorado</td>
          <td>Law</td>
          <td>Lorem Ipsum is simply dummy text.</td>
        </tr>
        
      </tbody>
    </table>
  </div>
  <!-- Modal-->
  
  <script>  
    const $doc = $(document);
let $dataTable = $("#dataTable");
let $dropdownInput = $("select.form-control");
let $state = $("#state");
let $category = $("#category");
let $clear = $("#clear");
let $keyup = $.Event("keyup", { keyCode: 13 });

//Ready function
$doc.ready(function() {
	// Start DataTable
	$dataTable.DataTable({
		mark: true, // Highlight search terms
		search: {
			caseInsensitive: true
		},
		aLengthMenu: [
			// Show entries incrementally
			[10, 20, 50, -1],
			[10, 20, 50, "All"]
		],
		order: [[1, "asc"]] // Set State column sorting by default
	});

	

	
	
	// Remove BS small modifier
	$('select[name="dataTable_length"]').removeClass('input-sm');
	$('#dataTable_filter input').removeClass('input-sm');

	/*
	 * ADD INDIVIDUAL COLUMN SEARCH
	*/
	
	// Add a hidden text input to each footer cell
	$("#dataTable tfoot th").each(function() {
		var $title = $(this).text().trim();
		$(this).html('<div class="form-group"><label>Search ' + $title + ':<br/><input class="form-control" id="search' + $title + '" type="hidden"/></label></div>');
	});
	// Apply the search functionality to hidden inputs
	$dataTable
		.DataTable()
		.columns()
		.every(function() {
			var $that = this;
			$("input", this.footer()).on("keyup change", function() {
				if ($that.search() !== this.value) {
					$that.search(this.value, false, true, false).draw(); // strict search
				}
			});
		});
});

  </script>
</body>
</html>