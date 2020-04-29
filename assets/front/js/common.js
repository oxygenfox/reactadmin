// render order list data table
// default render page
jQuery(document).ready(function() {
  var data = {
    order_id: "", name: "", startDate: "", endDate: ""
  };
  generateOrderTable(data);
});

// render date datewise
jQuery(document).on('click', '#filter-order-filter', function() {
  var order_id = jQuery('input#filter-order-no').val();
  var name = jQuery('input#filter-name').val();
  var startDate = jQuery('input#order-start-date').val();
  var endDate = jQuery('input#order-end-date').val();
  var data = {
    order_id: order_id, name: name, startDate: startDate, endDate: endDate
  };
  generateOrderTable(data);
});
// generate Order Table
function generateOrderTable(element) {
  jQuery.ajax({
    url: "<?= site_url('datatable/getOrderList'); ?>",
    data: {
      'order_id': element.order_id, 'name': element.name, 'start_date': element.startDate, 'end_date': element.endDate
    },
    type: 'post',
    dataType: 'json',
    beforeSend: function () {
      jQuery('#render-list-of-order').html('<div class="text-center mrgA padA"><i class="fa fa-spinner fa-pulse fa-4x fa-fw"></i></div>');
    },
    success: function (html) {
      var dataTable = '<table id="order-datatable" class="table table-striped" cellspacing="0" width="100%"></table>';
      jQuery('#render-list-of-order').html(dataTable);
      var table = $('#order-datatable').DataTable({
        data: html.data,
        "bPaginate": true,
        "bLengthChange": true,
        "bFilter": false,
        "bInfo": true,
        "bAutoWidth": true,
        columns: [{
          title: "Order No", "width": "12%"
        },
          {
            title: "Date.", "width": "16%"
          },
          {
            title: "Name", "width": "17%"
          },
          {
            title: "Amount", "width": "15%"
          },
          {
            title: "Status", "width": "15%"
          }],
      });
    }
  });
}

// get DatePicker
jQuery(document).on('focus', '.getDatePicker', function () {
  jQuery(this).datepicker({
    changeMonth: true,
    changeYear: true,
    dateFormat: "yy-mm-dd",
    yearRange: "1940:2050"
  });
});