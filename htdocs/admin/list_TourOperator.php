<?php 

include '../config/autoload.php';
include '../config/pdo.php';

include '../partials/header.php'; ?>

       

        <?php $OperatorManager = new TourOperatorManager($pdo); ?>
        
            <?php
            $allOperators = $OperatorManager->getAllOperator();
            foreach ($allOperators as $Operator) {
            ?>
        <div class="VideoListOpérator"> 
            <video playsinline autoplay muted loop> <source src="../asset/Beach - 42894.mp4" type="video/mp4" class="videoList w-100" ></video>
            <div class="ListTourOp">
                
                <div class="divVide"></div>
                <div class="title">
                    <div class="cardOp">
                        <h2><?= $Operator->getName()?></h2><br>
                        <div class="row">
                            <div class="Description col-sm-6">
                                

                                <h3>⭐ Note moyenne <?= $Operator->getGrade()?>/5</h3>

                                <?php if($Operator->getIsPremium() == 1){?>
                                    <a class="Link" href="<?=$Operator->getLink()?>"><?=$Operator->getLink()?><br></a>
                                <?php } ?>

                                <p><?php if ($Operator->getIsPremium() == 0 ){
                                    echo '❌ Non-premium';
                                } else {
                                    echo '✅ premium';
                                }
                                ?></p>
                            </div>
                            <div class="getlogo col-sm-6">
                                <img src="<?= $Operator->getLogo()?>">
                            </div>
                        </div>
                        <div class="button row">
                            <div class="col-sm-4">
                                <button class="button"> 
                                    <a href="create_destination.php?id=<?=$Operator->getId()?>"> Creer une Destination
                                    </a> 
                                </button>
                            </div>
                            <div class="col-sm-4">
                            <form method="post" action="process/process_Delete_tour_operator.php">
                                <input type="hidden" name="id_tour_operator" value="<?=$Operator->getId()?>">
                                <button class="SupOp" type="submit" name="" value="">Supprimer</button>
                            </form> 
                            </div>
                            <div class="col-sm-4">
                                <a href="modif_tour_operator.php?id=<?=$Operator->getId()?>&name=<?=$Operator->getName()?>"> <button class="ModifOp"> Modifier</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    <?php } ?>

    <?php include '../partials/footer.php' ?>