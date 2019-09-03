$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})


var BaseRecord=(function() {

return {

order: 'date',
direction: 'asc',
date_start: '2000-01-01',
date_end: '2100-01-01',
seller: 0,
buyer: 0,

buildParameters: function() {
    return {
        order: this.order,
        direction: this.direction, 
        date_start: this.date_start,
        date_end: this.date_end,  
        seller: this.seller,
        buyer: this.buyer,               
    }
},

ordering: function(url, that, errorAjax) {
    this.order = $(that).data('order');
    this.direction = $(that).data('direction');
    this.load(url, errorAjax);   
},

dateselect: function(url, that, that1, errorAjax) {
    if($(that).val()) this.date_start = $(that).val();
    else this.date_start = '2000-01-01';
    if($(that1).val()) this.date_end = $(that1).val();
    else this.date_end = '2100-01-01';
    this.load(url, errorAjax);   
},

sellerbuyerselect: function(url, that, errorAjax) {
    if($(that).attr('name') == 'seller') this.seller = $(that).val();
    if($(that).attr('name') == 'buyer') this.buyer = $(that).val();
    this.load(url, errorAjax);   
},

load: function(url, errorAjax) {
    $.get(url, this.buildParameters())
        .done(function (data) {
           BaseRecord.done(data);
        })
        .fail(function (data) {
           BaseRecord.fail(errorAjax);
        }
        );
},

done: function (data) {
    $('#pannel').html(data.table);
    $('#pagination').html(data.pagination);
    $('#pricesum').html(data.pricesum);    
},

fail: function (errorAjax) {
        swal({
            title: errorAjax,
            type: 'warning'
        })
},

}

})();