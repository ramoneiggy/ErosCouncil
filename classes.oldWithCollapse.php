<div class="col-8">
    <div class="row">
        <div class="col-6">
            <button class="btn btn-link text-light" data-target="#description'.$i.'" data-toggle="collapse">
            <p>INFO</p>            
            </button>
        </div>
        
    </div class="col-12">
    <div class="collapse text-white" id="description'.$i.'">
        <p>'.$pornPage["description"].'</p>
        <a class="btn btn-danger" href="pornSite.php?site='.$pornPage["name"].'">View '.$pornPage["name"].'</a>
    </div>