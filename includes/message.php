<?php

/* Permet d'afficher les différentes alertes */
if (isset($_GET['message']) && !empty($_GET['message']) && isset($_GET['type']) && !empty($_GET['type'])) {


?>
        <style>
            .alert_container{
                position: absolute !important;
                top: 12vh;
                width: 100%;
                display: flex;
                flex-direction: row;
                justify-content: center;
                cursor: pointer;
            }
            .alert{
                margin-bottom: 0 !important;
                width: 40%
            }
            .alert p{
                margin-bottom: 0!important;
            }
        </style>
<div class="alert_container" onclick="this.remove()">
    <div class="alert alert-<?=$_GET['type'] ?>" role="alert">
        <p><?= htmlspecialchars($_GET['message']) ?></p>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= $_GET['type'] ?></h5>
            </div>
            <div class="modal-body">
                <p><?= htmlspecialchars($_GET['message']) ?></p>
            </div>
            <div class="modal-footer">
            <?php if($_GET['type'] == 'Succès inscription') echo '<button onclick="window.location=\'/pages/login.php\'" type="button" class="btn btn-primary">Se connecter</button>'?>
                <button onclick="let modal = document.getElementsByClassName('modal'); modal[0].remove()" type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
<?php
}
?>



