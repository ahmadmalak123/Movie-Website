<?php
function MovieTable($movies){
?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Movie</th>
                <th scope="col">Description</th>
                <th scope="col">Active</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($movies != 0) {
                foreach ($movies as $movie) {
            ?>
                    <tr>
                        <td><?php echo $movie->id; ?></td>
                        <td><?php echo $movie->movie; ?></td>
                        <td><?php echo $movie->description; ?></td>
                        <td><?php echo $movie->isActive ? "Active" : "Deactivated"; ?></td>
                        <td>
                            <form name="activateForm" method="post" action="../../BE/Controllers/movieController.php">
                                <input type="hidden" name="id" value="<?php echo $movie->id; ?>">
                                <input type="hidden" name="activate" value="<?php echo $movie->isActive ? 0 : 1; ?>">
                                <input type="submit" class="btn btn-primary" value="<?php echo $movie->isActive ? "Deactivate" : "Activate"; ?>">
                            </form>
                        </td>
                    </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='5'>No movies found</td></tr>";
            }
            ?>
        </tbody>
    </table>
<?php
}
?>
<?php
function AddMovieForm()
{
    ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        Add Movie
                    </div>
                    <div class="card-body">
                        <form name="addMovie" action="../../BE/Controllers/movieController.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="action" value="ADD_MOVIE">
                            <div class="form-group">
                                <label for="tfname">Movie Name</label>
                                <input id="tfname" type="text" class="form-control" name="tfname" placeholder="Enter movie name">
                            </div>
                            <div class="form-group">
                                <label for="tfdescription">Description</label>
                                <textarea id="tfdescription" class="form-control" name="tfdescription" placeholder="Enter description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="tfimage">Image</label>
                                <input id="tfimage" type="file" class="form-control-file" name="tfimage">
                            </div>
                            <div class="form-group">
                                <label for="tfisActive">Active</label>
                                <select class="form-control" id="tfisActive" name="tfisActive">
                                    <option value="1">Active</option>
                                    <option value="0">Deactivated</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-block" value="Add Movie">
                            </div>
                            <div class="form-group">
                                <input type="reset" class="btn btn-secondary btn-block" value="Cancel">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>
<?php
function generateMovieCard($movie)
{
    $html = '
    <div class="col-lg-3 col-md-6 align-self-center mb-30 trending-items col-md-6">
        <div class="item">
            <div class="thumb">
                <img src="../assets/images/' . $movie->img . '" alt="' . $movie->movie . '">
            </div>
            <div class="down-content">
                <h4>' . $movie->movie . '</h4>  
                <span class="category">' . $movie->description . '</span>
            </div>
        </div>
    </div>';
    return $html;
}
?>
