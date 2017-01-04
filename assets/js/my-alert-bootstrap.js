/* 
 * Moj alert sluzi na vypisovanie hlasok v style bootstrap
 * 
 * POUZITIE:
 * v html je kod div #alert_placeholder ako miesto pre zobrazenie alertu:
 *  <div id = "alert_placeholder"></div>
 *  
 * moze sa spustit pomocou javascriptu:
 *  <script>bootstrap_alert('Spustene pomocou javascript', 'alert-success')</script>
 *  
 * spustenie pomocou PHP:
 *  echo "<script>bootstrap_alert('Spustene pomocou PHP', 'alert-info')</script>";
 */

function bootstrap_alert(message, alert_type) {

    if (alert_type == "alert-success") {
        document.getElementById("alert_placeholder").innerHTML = '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' + message + '</div>';
    } else if (alert_type == "alert-info") {
        document.getElementById("alert_placeholder").innerHTML = '<div class="alert alert-info alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' + message + '</div>';
    } else if (alert_type == "alert-warning") {
        document.getElementById("alert_placeholder").innerHTML = '<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' + message + '</div>';
    } else if (alert_type == "alert-danger") {
        document.getElementById("alert_placeholder").innerHTML = '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' + message + '</div>';
    }
    
}
