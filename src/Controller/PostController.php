<?php
    namespace App\Controller;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Symfony\Component\Form\Extension\Core\Type\DateType;
    use Symfony\Component\Form\Extension\Core\Type\SubmitType;
    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Form\Extension\Core\Type\TextareaType;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
    use App\Entity\User;
    use App\Entity\Post;
    class PostController extends Controller{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        $posts = $this->getDoctrine()->getRepository(Post::class)->findAll();
        return $this->render('projects/index.html.twig',array('posts' => $posts));
    }

    /**
     * @Route("/project/{id}", name="listproject")
     */
    public function seeProject($id)
    {
        
        return $this->render('projects/index.html.twig');
    }
    /**
     * @Route("/project/new", name="addproject")
     */
  public function addProject(Request $request)
    {
        $post = new Post();
        $form = $this->createFormBuilder($post)
        ->add('name', TextType::class, array('label' => 'Pseudo','attr'=>
        array('class'=> 'form-control')))
        ->add('password', TextType::class, array(
            'required' =>false,
            'label' => 'Mot de passe',
            'attr' => array('class'=> 'form-control', 'type'=>'password')
    ))
        ->add('save',SubmitType::class, array('label' => 'Connexion',
        'attr' => array('class' => 'btn btn-primary mt-3')))
        ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $post = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($post);
            $entityManager->flush();
            return $this->redirectToRoute('home');
        }
        return $this->render('projects/new.html.twig',array(
            'form' => $form->createView()));


    }
}
?>