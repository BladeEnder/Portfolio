<?php
    namespace App\Controller;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Symfony\Component\Form\Extension\Core\Type\DateType;
    use Symfony\Component\Form\Extension\Core\Type\SubmitType;
    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Form\Extension\Core\Type\TextareaType;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
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
     * @Route("/project/projectslist", name="projectlist")
     */
    public function listproject()
    {
        $project = $this->getDoctrine()->getRepository(Post::class)->findAll();
        return $this->render('projects/projectslist.html.twig',array('project' => $project));
    }
    /**
     * @Route("/project/new", name="addproject")
     */
    public function addProject(Request $request)
    {
        $post = new Post();
        $form = $this->createFormBuilder($post)
        ->add('title', TextType::class, array('label' => 'Titre','attr'=>array('class'=> 'form-control')))
        ->add('body', TextareaType::class, array(
            'required' =>false,
            'label' => 'Présentation',
            'attr' => array('class'=> 'form-control')))
        ->add('image', TextType::class, array('label' => 'Image','attr'=>
            array('class'=> 'form-control')))
        ->add('git', TextType::class, array('required' => false,'label' => 'Github','attr'=>
            array('class'=> 'form-control')))
        ->add('save',SubmitType::class, array('label' => 'Ajouter',
        'attr' => array('class' => 'btn btn-primary mt-3')))
        ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $post = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($post);
            $entityManager->flush();
            return $this->redirectToRoute('projectlist');
        }
        return $this->render('projects/new.html.twig',array(
            'form' => $form->createView()));


    }
    /**
     * @Route("/project/{id}", name="listproject")
     */
    public function seeProject($id)
    {
        
        return $this->render('projects/index.html.twig');
    }
    
}
?>