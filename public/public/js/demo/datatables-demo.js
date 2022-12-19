// Call the dataTables jQuery plugin
$(document).ready(function() {


     $('#dataTable').DataTable({
         pageLength:10, //varsayılan olarak sayfa açıldığında gösterilecek data sayısı
         lengthMenu:[
             [10,20,50,100,-1],
             ['10 adet','20 adet','50 adet','100 adet','Hepsi']
         ],
         language:{
             url:"/public/js/demo/localisation/tr_TR.json"
         }

     });

});
