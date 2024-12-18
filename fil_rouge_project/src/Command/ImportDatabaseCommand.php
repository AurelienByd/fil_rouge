<?php

namespace App\Command;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\Entity\BonDeLivraison;
use App\Entity\Client;
use App\Entity\Commande;
use App\Entity\Commercial;
use App\Entity\Envoie;
use App\Entity\Facture;
use App\Entity\Fournisseur;
use App\Entity\Produit;
use App\Entity\Rubrique;
use App\Entity\Selectionne;
use App\Entity\SousRubrique;

class ImportDatabaseCommand extends Command
{
    protected static $defaultName = "app:import-database";
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct();
        $this->em = $em;
    }

    protected function configure()
    {
        $this
            ->setName("app:import-database")
            ->setDescription("Importe les données de la base de données à partir d\'un fichier XML.")
            ->setHelp("Cette commande permet d'importer des éléments à partir d'un fichier XML.");
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $xmlFile = '/home/aurelien/Documents/cda/fil_rouge/fil_rouge_project/data/test.xml';
        $xsdFile = '/home/aurelien/Documents/cda/fil_rouge/fil_rouge_project/data/test.xsd';

        $xml = new \DOMDocument();
        $xml->load($xmlFile);

        if ($xml->schemaValidate($xsdFile)){
            $xml = simplexml_load_file($xmlFile);

            foreach ($xml->rubriques->rubrique as $rubriqueData){
                $rubrique = new Rubrique();
                $rubrique->setNomRubrique($rubriqueData->nomRubrique);
                $this->em->persist($rubrique);
            }

            foreach ($xml->sousRubriques->sousRubrique as $sousRubriqueData){
                $rubrique = $this->em->getRepository(Rubrique::class)->find((string) $sousRubriqueData->nomRubrique);

                $sousRubrique = new SousRubrique();
                $sousRubrique->setNomSsRubrique($sousRubriqueData->nomSousRubrique);
                $sousRubrique->setNomRubrique($rubrique);
                $this->em->persist($sousRubrique);
            }

            foreach ($xml->fournisseurs->fournisseur as $fournisseurData){
                $fournisseur = new Fournisseur();
                $fournisseur->setRefFournisseurProduit($fournisseurData->refFournisseurProduit);
                $fournisseur->setNomFournisseur($fournisseurData->nomFournisseur);
                $fournisseur->setTypeFournisseur($fournisseurData->typeFournisseur);
                $this->em->persist($fournisseur);
            }

            foreach ($xml->commercials->commercial as $commercialData){
                $commercial = new Commercial();
                $commercial->setRefCommercial($commercialData->refCommercial);
                $commercial->setNomCommercial($commercialData->nomCommercial);
                $this->em->persist($commercial);
            }

            foreach ($xml->produits->produit as $produitData){
                $sousRubrique = $this->em->getRepository(SousRubrique::class)->find((string) $produitData->nomSousRubrique);
                $fournisseur = $this->em->getRepository(Fournisseur::class)->find((string) $produitData->refFournisseurProduit);

                $produit = new Produit();
                $produit->setRefProduit($produitData->refProduit);
                $produit->setNomProduit($produitData->nomProduit);
                $produit->setDescrProduit($produitData->descrProduit);
                $produit->setPrixAchatProduit($produitData->prixAchatProduit);
                $produit->setPhotoProduit($produitData->photoProduit);
                $produit->setPrixVenteProduitHT($produitData->prixVenteProduitHT);
                $produit->setStockProduit($produitData->stockProduit);
                $produit->setValideProduit($produitData->valideProduit);
                $produit->setActiveProduit($produitData->activeProduit);
                $produit->setNomSsRubrique($sousRubrique);
                $produit->setRefFournisseurProduit($fournisseur);
                $this->em->persist($produit);
            }

            foreach ($xml->clients->client as $clientData){
                $commercial = $this->em->getRepository(Commercial::class)->find((string) $clientData->refCommercial);

                $client = new Client();
                $client->setRefClient($clientData->refClient);
                $client->setNomClient($clientData->nomClient);
                $client->setAdresseLivraisonClient($clientData->adresseLivraisonClient);
                $client->setAdresseFacturationClient($clientData->adresseFacturationClient);
                $client->setContactClient($clientData->contactClient);
                $client->setCoeffClient($clientData->coeffClient);
                $client->setRoles($clientData->catClient);
                $client->setDateInscrClient($clientData->dateInscrClient);
                $client->setReducPourClient($clientData->reducPourClient);
                $client->setPassword($clientData->mdpClient);
                $client->setRefCommercial($commercial);
                $this->em->persist($client);
            }

            foreach ($xml->commandes->commande as $commandeData){
                $client = $this->em->getRepository(Client::class)->find((string) $commandeData->refClient);

                $commande = new Commande();
                $commande->setNumCommande($commandeData->numCommande);
                $commande->setDateCommande($commandeData->dateCommande);
                $commande->setNbExpedCommande($commandeData->nbExpedCommande);
                $commande->setTotalHT($commandeData->totalHT);
                $commande->setTaxeTVA($commandeData->taxeTVA);
                $commande->setTotalTTC($commandeData->totalTTC);
                $commande->setTotalCommande($commandeData->totalCommande);
                $commande->setDelaiPaiement($commandeData->delaiPaiement);
                $commande->setModePaiement($commandeData->modePaiement);
                $commande->setPenaliteRetard($commandeData->penaliteRetard);
                $commande->setTempsConservDocs($commandeData->tempsConservDocs);
                $commande->setRefClient($client);
                $this->em->persist($commande);
            }

            foreach ($xml->envoies->envoie as $envoieData){
                $produit = $this->em->getRepository(Produit::class)->find((string) $envoieData->refProduit);
                $commande = $this->em->getRepository(Commande::class)->find((int) $envoieData->numCommande);

                $envoie = new Envoie();
                $envoie->setRefProduit($produit);
                $envoie->setNumCommande($commande);
                $envoie->setPrixVenteProduitHT($envoieData->prixVenteProduitHT);
                $envoie->setQttProduitCommande($envoieData->qttProduitCommande);
                $this->em->persist($envoie);
            }

            foreach ($xml->selectionnes->selectionne as $selectionneData){
                $produit = $this->em->getRepository(Produit::class)->find((string) $selectionneData->refProduit);
                $client = $this->em->getRepository(Client::class)->find((string) $selectionneData->refClient);

                $selectionne = new Selectionne();
                $selectionne->setRefProduit($produit);
                $selectionne->setRefClient($client);
                $this->em->persist($selectionne);
            }

            foreach ($xml->bonDeLivraisons->bonDeLivraison as $bonDeLivraisonData){
                $commande = $this->em->getRepository(Commande::class)->find((int) $bonDeLivraisonData->numCommande);

                $bonDeLivraison = new BonDeLivraison();
                $bonDeLivraison->setNumBonLivraison($bonDeLivraisonData->numBonLivraison);
                $bonDeLivraison->setDateBonLivraison($bonDeLivraisonData->dateBonLivraison);
                $bonDeLivraison->setNumCommande($commande);
                $this->em->persist($bonDeLivraison);
            }

            foreach ($xml->factures->facture as $factureData){
                $commande = $this->em->getRepository(Commande::class)->find((int) $factureData->numCommande);

                $facture = new Facture();
                $facture->setNumFacture($factureData->numFacture);
                $facture->setDateFacture($factureData->dateFacture);
                $facture->setNumCommande($commande);
                $this->em->persist($facture);
            }

            $this->em->flush();

            $output->writeln('Données importées avec succès.');
        } else {
            $output->writeln('Le fichier XML n\'est pas valide selon le schéma XSD.');
        }

        return Command::SUCCESS;
    }
}