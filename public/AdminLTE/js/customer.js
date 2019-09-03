var BaseRecord=(function() {
$(document).ready(function() {
   $("#myModalBox_save_success").modal('show');
   $("#myModalBox_validate_save_error").modal('show');
   //...ajax-list-dataTables...
   if(window.location.toString().indexOf("listcustomers")!=-1) {
      BaseRecord.listcustomer();
   }  
   if(window.location.toString().indexOf("listproducts")!=-1) {
      BaseRecord.listproduct();
   }          
   $("body").on("click", ".listbuttonremovecustomer", function(){
      BaseRecord.customerremove($(this).attr("aria-label"));
      return false;
   });  
   $("body").on("click", ".listbuttonremoveproduct", function(){
      BaseRecord.productremove($(this).attr("aria-label"));
      return false;
   });                 
});

return {

listcustomer:function() { 
   var ajaxSetting={
      method:"get",
      url:"listcustomerstable",
      success:function(data) {
        //alert(data);

        var data_json=JSON.parse(data);
        var dataSet=[];
        for(var i in data_json) {
           var ds=[]; 
           for(j in data_json[i]) {
              if(j!='id') {
                 ds.push(data_json[i][j]);
              }
           }
           ds.unshift('<a class="btn btn-danger listbuttonremovecustomer" href="" aria-label="'+data_json[i]['id']+'"><i class="fa fa-trash-o" aria-hidden="true"></i></a>');  
           dataSet.push(ds);
        }

        $('.listcustomers').DataTable({
          language: {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/English.json"
          },
          data: dataSet,
          "order": [[1, 'asc']],
          "columnDefs": [
            { "orderable": false, "targets": [0] },
            { "width": "1%", "targets": [0] },
          ],          
          columns: [
              { title: ""},
              { title: "Name" },
              { title: "Address" },
              { title: "Email" },
              { title: "Phone" },
           ],

           "bDestroy": true,
        });

       },
    };
    $.ajax(ajaxSetting);
},   

customerremove:function(id) {
   //alert(id);
   var ajaxSetting={
      method:"get",
      url:"customerremove/"+id,
      success:function(data) {
        //alert(data);
        BaseRecord.listcustomer(); //обновление списка после удаления
        $("#myModalBox_listremove_result").modal('show');  //открытие всплывающего окна тут   
      },
   };
   $.ajax(ajaxSetting);
}, 

listproduct:function() { 
   var ajaxSetting={
      method:"get",
      url:"listproductstable",
      success:function(data) {
        //alert(data);

        var data_json=JSON.parse(data);
        var dataSet=[];
        for(var i in data_json) {
           var ds=[]; 
           for(j in data_json[i]) {
              if(j!='id') {
                 ds.push(data_json[i][j]);
              }
           }
           ds.unshift('<a class="btn btn-danger listbuttonremoveproduct" href="" aria-label="'+data_json[i]['id']+'"><i class="fa fa-trash-o" aria-hidden="true"></i></a>');  
           dataSet.push(ds);
        }

        $('.listproducts').DataTable({
          language: {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/English.json"
          },
          data: dataSet,
          "order": [[1, 'asc']],
          "columnDefs": [
            { "orderable": false, "targets": [0] },
            { "width": "1%", "targets": [0] },
          ],          
          columns: [
              { title: ""},
              { title: "Name" },
              { title: "Price" },
           ],

           "bDestroy": true,
        });

       },
    };
    $.ajax(ajaxSetting);
},     

productremove:function(id) {
   //alert(id);
   var ajaxSetting={
      method:"get",
      url:"productremove/"+id,
      success:function(data) {
        //alert(data);
        BaseRecord.listproduct(); //обновление списка после удаления
        $("#myModalBox_listremove_result").modal('show');  //открытие всплывающего окна тут   
      },
   };
   $.ajax(ajaxSetting);
}, 

};

})();