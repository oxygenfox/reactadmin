jQuery(function($){
    $.datepicker.regional['id'] = {
        closeText: 'Tutup',
        prevText: '&#x3c;mundur',
        nextText: 'maju&#x3e;',
        currentText: 'Hari ini',
        monthNames: ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'],
        monthNamesShort: ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'],
        dayNames: ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'],
        dayNamesShort: ['Min','Sen','Sel','Rab','kam','Jum','Sab'],
        dayNamesMin: ['Mg','Sn','Sl','Rb','Km','jm','Sb'],
        weekHeader: 'Mg',
        dateFormat: 'dd/mm/yy',
        firstDay: 0,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''};
    $.datepicker.setDefaults($.datepicker.regional['id']);
});