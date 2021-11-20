<h2>Listare Carti</h2>
<br>
<br>

<?php
$carti = afisareCarte();
//var_dump($carti); die();
print '<table  class="table table-bordered table-hover" style="margin-bottom: 40px;">';
    print '<thead>';
    print '<tr>';

        print '<th>' . 'id' . '</th>';
        print '<th>' . 'titlu'. '</th>';
        print '<th>' . 'autor' . '</th>';
        print '<th>' . 'editura' . '</th>';
        print '<th>' . 'isbn' . '</th>';
        print '<th>' . 'gen' . '</th>';
    
    print '</tr>';
    print '</thead>';
    
    
    print '<tbody>';
    foreach ($carti as $carte) {
        print '<tr>';
            foreach ($carte as $atribut => $valoare) {
                
//                    print '<th >' . $atribut . '</th>';
                    print '<td>'. $valoare . '</td>';  
            }
        print '</tr>';

    }
    print '</tbody>';
print '</table>';

