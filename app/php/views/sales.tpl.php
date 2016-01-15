<script src="/js/libs/moment.js"></script>
<script src="/js/libs/pikaday.js"></script>
<label for="datepicker-from">from:</label>
<input type="text" id="datepicker-from">
<label for="datepicker-till">till:</label>
<input type="text" id="datepicker-till">
<a href="#" id="reload-link">reload</a>
<?php
/* TODO: the download link is misleading, as one might expect to download the 
displayed content, bt it is the selected */ ?>
<a href="#" id="download-link">download as csv</a>
<p>
<table>
	<tr>
		<th> firstname </th>
		<th> lastname </th>
		<th> sales_count </th>
		<th> sales_sum </th>
		<th> sales_date </th>
	</tr>
<?php foreach($rows as $row): ?>
	<tr>
	  <td><?=$row['firstname']?></td>
	  <td><?=$row['lastname']?></td>
	  <td><?=$row['sales_count']?></td>
	  <td><?=$row['sales_sum']?></td>
	  <td><?=$row['sales_date']?></td>
	</tr>
<?php endforeach; ?>
</table>
</p>
<script>
    var from = document.getElementById('datepicker-from');
    var till = document.getElementById('datepicker-till');
    var loaded = 0;
    var change_link = function() {
	    var reload = document.getElementById('reload-link');
	    var download = document.getElementById('download-link');
	    reload.href = '/app.php/sales/' + from.value + '/' + till.value;
	    download.href = reload.href + '/export';
	    if (loaded) {
		    window.location.href = reload.href;
	    }
    };
    var change_input = function(elem, picker) {
	    elem.value = picker.toString();
	    change_link();
    }
    window.onload = function() { loaded = 1; }
    var mk_pikaday_for = function(id) {
	var elem = document.getElementById(id);
	return new Pikaday(
	{
		numberOfMonths: 3,
		field: elem,
		firstDay: 1,
		minDate: new Date(2006, 0, 1),
		maxDate: new Date(2008, 12, 31),
		yearRange: [2006, 2008],
		format: 'YYYY-MM-DD',
		onSelect: function() {
			change_input(elem, this);
		}
	});
    }
    var picker_from = mk_pikaday_for('datepicker-from');
    var picker_till = mk_pikaday_for('datepicker-till');

    change_link();
    from.value = '<?=$from?>';
    picker_from.setDate(from.value);
    till.value = '<?=$till?>';
    picker_till.setDate(till.value);
</script>
