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
}
?>