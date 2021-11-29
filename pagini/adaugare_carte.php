<h2>Adaugare carte</h2>

<div class="row">
    <div class="col-sm-4" style="margin-top: 20px">
    </div>
    <div class="col-sm-6" style="margin-top: 20px; margin-bottom: 40px">
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="titlu">Titlu</label>
                <input type="text" class="form-control" name="titlu">
            </div>
            <div class="form-group">
                <label for="autor">Autor</label>
                <input type="text" class="form-control" name="autor">
            </div>
            <div class="form-group">
                <label for="editura">Editura</label>
                <input type="text" class="form-control" name="editura">
            </div>
            <div class="form-group">
                <label for="isbn">ISBN</label>
                <input type="text" class="form-control" name="isbn">
            </div>
            <div class="form-group">
                <label for="gen">Gen</label>
                <select class="form-control" name="gen">
                    <option value="clasici">Clasici</option>
                    <option value="sf">SF</option>
                    <option value="thriller">Thriller</option>
                    <option value="poezie">Poezie</option>
                    <option value="istorie">Istorie</option>
                </select>
            </div>
            <div class="form-group">
                <label for="img">Imagine</label>
                <input type="file" class="form-control-file" name="img" id="img"/>
            </div>
                
            <button type="submit" class="btn btn-dark"  name="submit">Submit</button>
        </form>
    </div>
</div>

            
<?php


$phpFileUploadErrors = array(
    0 => 'There is no error, the file uploaded with success',
    1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
    2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
    3 => 'The uploaded file was only partially uploaded',
    4 => 'No file was uploaded',
    6 => 'Missing a temporary folder',
    7 => 'Failed to write file to disk.',
    8 => 'A PHP extension stopped the file upload.',
);

if (isset($_POST['submit'])) {
    $titlu = $_POST['titlu'];
    $autor = $_POST['autor'];
    $editura = $_POST['editura'];
    $isbn = $_POST['isbn'];
    $gen = $_POST['gen'];
 
    if (isset($_FILES['img'])) {
        if ($_FILES['img']['error'] == 0) {
            switch ($_FILES['img']['type']) {
                case 'image/jpg':
                case 'image/jpeg':
                case 'image/png':
                case 'image/gif':
                case 'image/bmp':
                    $nameImg = uniqid() . $_FILES['img']['name'];
                    $salvareServer = move_uploaded_file($_FILES['img']['tmp_name'], 'imagini/'.$nameImg);
                    if ($salvareServer) {
                        $salvareBD = adaugareCarte($titlu, $autor, $editura, $isbn, $gen, $nameImg);
                        if ($salvareBD['error'] == false) {
                            print '<div class = "alert alert-success d-flex align-items-center" role = "alert">';
                            print '<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>';
                            print $salvareBD['message'];
                            print "</div>";
                        } else {
                            unlink('imagini/'.$nameImg);
                            print '<div class = "alert alert-warning d-flex align-items-center" role = "alert">';
                            print '<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>';
                            print $salvareBD['message'];
                            print "</div >";
                                    
                        }
                    } else {
                        print '<div class = "alert alert-warning d-flex align-items-center" role = "alert">';
                        print '<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>';
                        print " Eroare la salvarea pe server";
                        print "</div >";
                    }
                    break;
                default:
                    print '<div class = "alert alert-danger d-flex align-items-center" role = "alert">';
                    print '<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>';
                    print " Fisierul selectat nu are un format acceptat (jpg/ jpeg/ png/ bmp/ gif)";
                    print "</div >";
                    break;
            }
        } else {
            if ($_FILES['img']['error'] == 4) {
                $result = adaugareCarte($titlu, $autor, $editura, $isbn, $gen, NULL);

                if ($result['error'] == false) {
                    print '<div class = "alert alert-success d-flex align-items-center" role = "alert">';
                    print '<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>';
                    print $result['message'];
                    print "</div>";
                } else {
                    print '<div class = "alert alert-warning d-flex align-items-center" role = "alert">';
                    print '<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>';
                    print " Eroare la salvarea in baza de date";
                    print "</div >";
                }
            } else {
                print '<div class = "alert alert-danger d-flex align-items-center" role = "alert">';
                print '<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>';
                print $phpFileUploadErrors[$_FILES['img']['error']];
                print "</div >";
            }
        }
    }
}

