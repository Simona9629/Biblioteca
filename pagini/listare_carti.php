<h2>Listare Carti</h2>
<br>
<br>

<form class="form-inline" method="get"> 
    <input type="text" class="form-control mb-2 mr-sm-2" name="kw" placeholder="Cauta titlu..."/>
    <button type="submit" class="btn btn-secondary mb-2"  name="cauta" value="Cauta">Cauta</button>  
</form>
<!--<br>
<a href="index.php?reseteaza">Reseteaza cautarea</a>
<br>-->
<br>
<?php
//if (isset($_GET['reseteaza'])) {
//    setcookie('keyword', '', time()-1);
//    header('location: index.php?page=1');
//}

if (isset($_GET['cauta'])) {
    $keyword = $_GET['kw'];
    $carti = preiaCartiDupaKeyword($keyword);
    setcookie('keyword', $keyword, time()+24*3600, '/');
    
} elseif (isset($_COOKIE['keyword'])) {
    $keyword = $_COOKIE['keyword'];
    $carti = preiaCartiDupaKeyword($keyword);
    
} else {
    $carti = afisareCarti();
}

if (count($carti) == 0) {
    print '<div class="alert alert-primary d-flex align-items-center" role="alert">';
    print '<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>';
    print " Nu sunt carti de afisat";
    print '</div>';
    return;
}
?>
<table  class="table table-bordered table-hover" style="margin-bottom: 40px;">
    <thead>
        <tr>
            <th>imagine</th>
            <th>id</th>
            <th>titlu</th>
            <th>autor</th>
            <th>editura</th>
            <th>isbn</th>
            <th>gen</th>
            

        </tr>
    </thead>
    <tbody>
    <?php foreach ($carti as $carte) {?>
        <tr> 
            <td>
                <img width="100px" src="imagini/<?php print (!empty($carte['imagine'])) ? $carte['imagine'] : 'noimage.jpg'; ?>"/>
            </td>
            <td>
                <?php print $carte['id']; ?>
            </td>
            <td>
                <?php print $carte['titlu']; ?>
            </td>
            <td>
                <?php print $carte['autor']; ?>
            </td>
            <td>
                <?php print $carte['editura']; ?>
            </td>
            <td>
                <?php print $carte['isbn']; ?>
            </td>
            <td>
                <?php print $carte['gen']; ?>
            </td>
        
        </tr>
    <?php } ?>
    </tbody>
</table>

