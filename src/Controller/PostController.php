<?php
    namespace App\Controller;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;

    class PostController extends Controller{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {

        return $this->render('projects/index.html.twig');
    }


    /**
     * @Route("/project/{id}", name="listproject")
     */
    public function seeProject($id)
    {
        
        return $this->render('projects/index.html.twig');
    }

    /**
     * @Route("/connexion", name="connexion")
     */
    public function connexion()
    {

        return $this->render('projects/connexion.html.twig');
    }
}
?>