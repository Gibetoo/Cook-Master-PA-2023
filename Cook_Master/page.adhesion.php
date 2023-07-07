<?php

session_start();

if (!isset($_SESSION['user'])) {
    header('location: /Projet-Annuel/Cook_Master/');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<?php require_once 'forms/head.php'; ?>

<body>

    <?php require_once 'forms/header_base.php'; ?>

    <main id="main">
        <section id="materiels" class="materiels">
            <div class="container mt-4">

                <div class="d-flex justify-content-center my-5">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="text-center">
                                <img src="assets/img/Cook_Cadet.png" alt="">
                                <h1 class="mt-5 mb-2" style="color: #cda45e;">Grade Cadet</h1>
                                <form action="page.choice" method="POST">
                                    <input type="hidden" name="abonnement" value="Cadet">
                                    <h2 class="mt-5">FREE</h2>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="text-center">
                                <img src="assets/img/Cook_Junior.png" alt="">
                                <h1 class="mt-5 mb-2" style="color: #cda45e;">Grade Junior</h1>
                                <form action="page.choice" method="POST">
                                    <input type="hidden" name="abonnement" value="Junior">
                                    <button type="submit" class="mt-5 btn btn-primary btn-lg btn-block" style="background-color: #cda45e;border-color: #cda45e;">S'abonner</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="text-center">
                                <img src="assets/img/Cook_Senior.png" alt="">
                                <h1 class="mt-5 mb-2" style="color: #cda45e;">Grade Senior</h1>
                                <form action="page.choice" method="POST">
                                    <input type="hidden" name="abonnement" value="Senior">
                                    <button type="submit" class="mt-5 btn btn-primary btn-lg btn-block" style="background-color: #cda45e;border-color: #cda45e;">S'abonner</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <h2 class="mb-2 text-center">Qu'est-ce que le grade cadet ?</h2>

                <div class="container text-center p-5">
                    <p style='font-family: "Gabriela", sans-serif;font-size: 17px;'>
                        Bienvenue sur notre site ! Nous sommes ravis de vous présenter notre offre d'abonnement gratuit, le grade cadet. Ce grade a été spécialement conçu pour vous offrir une expérience enrichissante tout en étant accessible sans frais. Permettez-nous de vous expliquer comment fonctionne ce grade et les avantages qu'il propose.<br><br>

                        Le grade cadet est un abonnement entièrement gratuit qui vous permet d'accéder à de nombreux contenus et fonctionnalités passionnants. Vous pourrez profiter de recettes sélectionnées, de cours limités et bien plus encore. Bien qu'il puisse y avoir certaines limitations dans l'accès à ces ressources, nous nous efforçons de vous offrir une expérience satisfaisante.<br><br>

                        Dans le cadre du grade cadet, il est important de noter que vous verrez des publicités sur notre site. Ces publicités nous aident à maintenir notre offre gratuite tout en continuant à fournir du contenu de qualité. Nous nous efforçons de vous présenter des publicités pertinentes et non intrusives afin de préserver votre expérience de navigation.<br><br>

                        Nous croyons fermement en la valeur de notre grade cadet en tant qu'offre gratuite. C'est une excellente occasion de découvrir notre site, de profiter de ressources limitées, et de vous familiariser avec notre contenu. Nous travaillons constamment à améliorer notre offre et à vous offrir une expérience toujours plus enrichissante.<br><br>

                        Nous espérons que cette explication vous aide à comprendre comment fonctionne notre grade cadet. Si vous avez d'autres questions ou des préoccupations, n'hésitez pas à nous contacter. Nous sommes là pour vous aider et rendre votre expérience sur notre site des plus agréables.<br><br>

                        Merci de votre intérêt pour notre site et profitez pleinement de votre expérience en tant que membre du grade cadet !

                    </p>
                </div>

                <h2 class="mb-2 text-center">Qu'est-ce que le grade junior ?</h2>

                <div class="container text-center p-5">
                    <p style='font-family: "Gabriela", sans-serif;font-size: 17px;'>
                        Le grade junior est un abonnement payant qui propose une expérience spéciale à nos clients. En souscrivant à ce grade, vous bénéficierez de plusieurs avantages exclusifs. Vous aurez accès à une sélection de recettes uniques, soigneusement préparées par nos chefs talentueux. De plus, vous pourrez profiter de cours et de ressources culinaires limités pour approfondir vos connaissances gastronomiques.<br><br>

                        En tant que membre du grade junior, vous bénéficierez également d'autres avantages, tels que des réductions spéciales sur certains plats du menu, des offres promotionnelles exclusives, et des privilèges réservés aux abonnés.<br><br>

                        Notre objectif est de vous offrir une expérience culinaire exceptionnelle en tant que membre du grade junior. Vous pourrez découvrir de nouvelles saveurs, vous perfectionner dans l'art de la cuisine et bénéficier d'avantages réservés aux abonnés.<br><br>

                        Si vous souhaitez vivre une expérience encore plus exclusive, nous vous invitons à explorer nos options d'abonnement premium. Nos abonnements premium offrent des avantages supplémentaires, tels que des dégustations privées, des invitations à des événements spéciaux et un service personnalisé.<br><br>

                        Nous espérons que cette explication vous donne un aperçu du fonctionnement de notre grade junior, conçu pour nos clients. Si vous avez d'autres questions ou des demandes spéciales, n'hésitez pas à nous contacter. Nous sommes là pour rendre votre expérience culinaire des plus agréables.
                    </p>
                </div>

                <h2 class="mb-2 text-center">Qu'est-ce que le grade senior ?</h2>

                <div class="container text-center p-5">
                    <p style='font-family: "Gabriela", sans-serif;font-size: 17px;'>
                        Le grade senior est un abonnement premium qui offre une expérience culinaire exclusive à nos clients. En tant que membre du grade senior, vous bénéficierez d'avantages exclusifs, tels que des dégustations privées, des invitations à des événements spéciaux et un service personnalisé.<br><br>

                        En tant que membre du grade senior, vous aurez accès à une sélection de recettes uniques, soigneusement préparées par nos chefs talentueux. De plus, vous pourrez profiter de cours et de ressources culinaires limités pour approfondir vos connaissances gastronomiques.<br><br>

                        En tant que membre du grade senior, vous bénéficierez également d'autres avantages, tels que des réductions spéciales sur certains plats du menu, des offres promotionnelles exclusives, et des privilèges réservés aux abonnés.<br><br>

                        Notre objectif est de vous offrir une expérience culinaire exceptionnelle en tant que membre du grade senior. Vous pourrez découvrir de nouvelles saveurs, vous perfectionner dans l'art de la cuisine et bénéficier d'avantages réservés aux abonnés.<br><br>

                        Nous espérons que cette explication vous donne un aperçu du fonctionnement de notre grade senior, conçu pour nos clients les plus exigeants. Si vous avez d'autres questions ou des demandes spéciales, n'hésitez pas à nous contacter. Nous sommes là pour rendre votre expérience culinaire des plus agréables.
                    </p>


                </div>
        </section>
    </main>

    <?php require_once 'forms/footer.php'; ?>

</body>

</html>