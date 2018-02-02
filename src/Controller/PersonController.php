<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Person\Person;
use App\Repository\PersonRepository;

class PersonController extends AbstractController
{

    /**
     * @var PersonRepository
     */
    protected $repository;

    /**
     * @param PersonRepository $repository
     */
    function __construct(PersonRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route("/personas", name="personas")
     */
    public function index()
    {
        $personas = $this->repository->findAll();

        return $this->render('persona/index.html.twig', array('personas' => $personas));
    }

    /**
     * @Route("/persona_crear_con_dependencia", name="persona_crear_dependencia")
     */
    public function crear_con_dependencias()
    {
        // Esta es la manera en que no se debe hacer la persistencia a la base de datos
        // llamamos a funciones concretas del EntityManager de Doctrine con lo que quedamos
        // acoplados a esa librería.
        // En la función de más abajo se tira de un repositorio que injectamos desde
        // el constructor del controlador
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to your action: index(EntityManagerInterface $em)
        $em = $this->getDoctrine()->getManager();

        $data['firstName'] = 'Mario';
        $data['lastName'] = 'Fernández Gómez';
        $data['email']= 'mafergo@us.es';
        $data['password']= 'pepepotamo';
        $data['startDate'] = new \DateTime();
        $person = new Person($data);

        $em->persist($person);
        $em->flush();

        return new Response('Saved new person with id '.$person->getId());
    }

    /**
     * @Route("/persona_crear", name="persona_crear")
     */
    public function crear()
    {
        $data['firstName'] = 'Mateo';
        $data['lastName'] = 'Sánchez';
        $data['email']= 'mateosanchez@us.es';
        $data['password']= 'pepepotamo';
        $data['startDate'] = new \DateTime();
        $persona = new Person($data);

        $this->repository->save($persona);

        return $this->render('persona/mostrar.html.twig', array('persona' => $persona));
    }
}