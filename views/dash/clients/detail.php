<div class="row align-items-center justify-content-center">
    <div class="col-12 mb-5 text-center">
        <h2> <?= $user->firstname . " " . $user->lastname;
                if ($user->partner_firstname != NULL | $user->partner_firstname != '') {
                    echo ' et ' . $user->partner_firstname  . ' '  . $user->partner_lastname;
                } ?></h2>

    </div>

    <div class="userData col-4 align-self-start">
        <p><strong> Contact : </strong></p>
        <p> Téléphone : <a class="fs-4" href="tel:<?= $user->phone ?>"> <?= $user->phone ?></a></p>
        <p>Mail: <a class="fs-4" href="mailto:<?= $user->mail ?>"><?= $user->mail ?></a></p>
    </div>

    <div class="col-4 align-self-start">
        <div class="col-12">
            <p><strong> Adresse : </strong></p>
            <p> <?= $user->address . ", " . $user->zip . " - " . $user->city ?></p>
        </div>
        <div class="col-12 modifiers">
            <i id="modifyPic" class="fa-solid fa-pen"></i>
            <a  href="/controllers/dash/clients/deleteCtrl.php?id=<?= $id ?>&delete=true"><i id="deletePatient" class="fa-solid fa-trash"></i></a>
        </div>
    </div>

    <div class="col-4">
        <p><strong> Formule souscrite : </strong></p>
        <p><?php 
        if ($pack != false) {
            echo '<a class="fs-4" href="/controllers/dash/packs/detailCtrl.php?id='.$pack->packs_id.'">'.$pack->label.'</a>';}
        else { 
            echo 'Aucune';
        }
        ?></p>
    </div>
    
</div>
