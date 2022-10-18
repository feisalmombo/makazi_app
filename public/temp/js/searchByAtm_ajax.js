$(document).ready(function(){
    $('#atm').change(function() {
        url="/finance/getatmcosts";
        atm=document.getElementById('atm').value;
        // console.log(atm);
       $.get(url,{atm:atm},function(data,status){
        jsonData=JSON.parse(data);
           var html1="";
           html1+='<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">'
           html1+='<thead>'
           html1+='<tr>'
           html1+=' <th>S/N</th>'
           html1+=' <th>ATM</th>'
           html1+=' <th>Ticket Number</th>'
           html1+='<th>Bank</th>'
           html1+='<th>Engineer</th>'
           html1+=' <th>Amount Used</th>'
           html1+='</tr>'
           html1+='</thead>'
           html1+='<tbody>'
           x=0
           total=0
           if (jsonData.length > 0) {
                counts=0
            // console.log('hapa');
            for (var i = 0; i < jsonData.length; i++) {
               // html1 += $('<tr><td>' + jsonData[i].location+ '</td><td>' + jsonData[i].land_use + '</td><td>' + jsonData[i].block + '</td><td>' + jsonData[i].size + '</td></tr>');
                // $('<tr><td>' + jsonData[i].location+ '</td><td>' + jsonData[i].land_use + '</td><td>' + jsonData[i].block + '</td><td>' + jsonData[i].block + '</td><td>' + jsonData[i].size + '</td></tr>');

               // console.log('<tr><td>' + jsonData[i].location+ '</td><td>' + jsonData[i].land_use + '</td><td>' + jsonData[i].block + '</td><td>' + jsonData[i].size + '</td></tr>');
                // $('#cive').html(html1);
                        counts+=1
                html1 += '<tr>';
                    html1 += '<td>' + counts + '</td>';
                    html1 += '<td>' + jsonData[i].atm_id + '</td>';
                    html1 += '<td>' + jsonData[i].ticket_number + '</td>';
                    html1 += '<td>' + jsonData[i].bank_name + '</td>';
                    
                    html1 += '<td>' + jsonData[i].first_name +'&nbsp'+jsonData[i].last_name + '</td>';
                    x+=jsonData[i].man_power_cost + jsonData[i].per_diem + jsonData[i].engineer_transport_cost
                    +jsonData[i].spare_costs+jsonData[i].spare_transport_cost+jsonData[i].tools_cost
                    html1 += '<td>' + x + '</td>';
                    total+=x;
           }
                    html1+='<tr><td>TOTAL COST</td><td></td><td></td><td></td><td></td><td>'+ total +'</td></tr>'
       }

        html1 += "</tbody>";
        html1 += "</table>";

            console.log(html1)
            $('#dataTables-example').html(html1);
       });
    });
    
});