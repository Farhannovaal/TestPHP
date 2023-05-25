function searchTicket(){
    let input, filter, table, tr, td, i, txtValue;

    input = document.querySelector('BahanInput');
    filter = input.value.toUpperCase();
    table = document.querySelector('dataTable');
    dataTab = dataTab.getElementsByTagName('tr');


    for(i = 0; i< dataTab.length; i++){
        td = dataTab[i].getElementsByTagName("td")[0];
        if(td){
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase() === filter) {
                dataTab[i].style.display = "";
              } else {
                dataTab[i].style.display = "none";
              }
            }
          }
        }