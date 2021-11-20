<h2>Adaugare carte</h2>

<div class="row">
    <div class="col-sm-4" style="margin-top: 20px">
    </div>
    <div class="col-sm-6" style="margin-top: 20px; margin-bottom: 40px">
        <form method="post">
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
            <button type="submit" class="btn btn-dark"  name="submit">Submit</button>
        </form>
    </div>
</div>

            
<?php

if (isset($_POST['submit'])) {
    $titlu = $_POST['titlu'];
    $autor = $_POST['autor'];
    $editura = $_POST['editura'];
    $isbn = $_POST['isbn'];
    $gen = $_POST['gen'];
    
    $result = adaugareCarte($titlu, $autor, $editura, $isbn, $gen);
//    var_dump($result);die();
    $culoareMesaj = $result['error'] == false ? 'green' : 'red';
    print "<h3 style='color: $culoareMesaj'>";
    print $result['message'];
    print "</h3>";
}

